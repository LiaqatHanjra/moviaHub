<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Entertainment;
use App\Models\User;
use App\Models\UserMovies;
use App\Models\UserWallet;
use App\Models\WalletTransaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Stripe\Checkout\Session as CheckoutSession;
use Stripe\Exception\ApiErrorException;
use Stripe\Exception\SignatureVerificationException;
use Stripe\StripeClient;
use Stripe\Webhook;

class PaymentController extends Controller
{
    public function createCheckoutSession(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'type' => ['required', Rule::in(['wallet_top_up', 'movie_purchase'])],
            'amount' => ['nullable', 'numeric', 'decimal:0,2'],
            'movie_id' => ['required_if:type,movie_purchase', 'integer'],
        ]);
        $user = $request->user();
        $currency = strtolower((string) config('services.stripe.currency', 'pkr'));
        $minimumChargeMinor = $this->toMinorUnits(config('services.stripe.minimum_charge', 150));
        if ($minimumChargeMinor < 1) {
            return response()->json(['message' => 'The Stripe minimum charge is not configured correctly.'], 500);
        }
        $metadata = [
            'type' => $validated['type'],
            'user_id' => (string) $user->id,
            'currency' => $currency,
        ];

        if ($validated['type'] === 'wallet_top_up') {
            $topUpData = $request->validate([
                'amount' => [
                    'required',
                    'numeric',
                    'decimal:0,2',
                    'min:' . number_format($minimumChargeMinor / 100, 2, '.', ''),
                    'max:10000',
                ],
            ]);
            $amountMinor = $this->toMinorUnits($topUpData['amount']);
            $description = 'MovieHub wallet top-up';
            $successUrl = url('/payment/success?session_id={CHECKOUT_SESSION_ID}');
            $cancelUrl = url('/wallet?payment=cancelled');
        } else {
            $movie = Entertainment::query()
                ->whereKey($validated['movie_id'])
                ->where('type', 'movie')
                ->where('status', true)
                ->firstOrFail();
            if (strtolower((string) $movie->movie_access) === 'free') {
                return response()->json(['message' => 'Free movies do not require purchase.'], 422);
            }

            if (UserMovies::query()
                ->where('user_id', $user->id)
                ->where('movie_id', $movie->id)
                ->exists()) {
                return response()->json([
                    'message' => 'This movie is already in your library.',
                ], 409);
            }

            $moviePriceMinor = $this->toMinorUnits(config('services.stripe.movie_rental_price', 50));
            if ($moviePriceMinor < 1) {
                return response()->json(['message' => 'The movie rental price is not configured correctly.'], 500);
            }
            if (
                isset($validated['amount'])
                && $this->toMinorUnits($validated['amount']) !== $moviePriceMinor
            ) {
                return response()->json([
                    'message' => 'The movie rental price has changed. Refresh the page and try again.',
                ], 422);
            }
            $amountMinor = max($moviePriceMinor, $minimumChargeMinor);
            $walletCreditMinor = $amountMinor - $moviePriceMinor;
            $metadata['movie_price_minor'] = (string) $moviePriceMinor;
            $metadata['wallet_credit_minor'] = (string) $walletCreditMinor;
            $description = $walletCreditMinor > 0
                ? 'Movie rental with wallet credit: ' . $movie->name
                : 'Movie rental: ' . $movie->name;
            $metadata['movie_id'] = (string) $movie->id;
            $successUrl = url('/payment/success?session_id={CHECKOUT_SESSION_ID}');
            $cancelUrl = url('/movie/' . $movie->id . '?payment=cancelled');
        }

        if ($amountMinor < 1) {
            return response()->json(['message' => 'The payment amount is not configured correctly.'], 500);
        }

        $metadata['amount_minor'] = (string) $amountMinor;

        try {
            $session = $this->stripeClient()->checkout->sessions->create([
                'mode' => 'payment',
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => $currency,
                        'unit_amount' => $amountMinor,
                        'product_data' => ['name' => $description],
                    ],
                    'quantity' => 1,
                ]],
                'customer_email' => $user->email,
                'client_reference_id' => (string) $user->id,
                'metadata' => $metadata,
                'payment_intent_data' => ['metadata' => $metadata],
                'success_url' => $successUrl,
                'cancel_url' => $cancelUrl,
            ]);
        } catch (ApiErrorException $exception) {
            Log::error('Unable to create Stripe Checkout session.', [
                'user_id' => $user->id,
                'exception' => $exception->getMessage(),
            ]);

            return response()->json([
                'message' => 'Unable to start Stripe Checkout. Please try again.',
            ], 502);
        }

        return response()->json([
            'checkout_url' => $session->url,
            'currency' => strtoupper($currency),
            'amount' => number_format($amountMinor / 100, 2, '.', ''),
        ]);
    }

    public function purchaseWithWallet(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'movie_id' => ['required', 'integer'],
        ]);
        $user = $request->user();
        $movie = Entertainment::query()
            ->whereKey($validated['movie_id'])
            ->where('type', 'movie')
            ->where('status', true)
            ->firstOrFail();
        if (strtolower((string) $movie->movie_access) === 'free') {
            return response()->json(['message' => 'Free movies do not require purchase.'], 422);
        }
        $amountMinor = $this->toMinorUnits(config('services.stripe.movie_rental_price', 50));

        $purchase = DB::transaction(function () use ($user, $movie, $amountMinor): array {
            User::query()->whereKey($user->id)->lockForUpdate()->firstOrFail();

            if (UserMovies::query()
                ->where('user_id', $user->id)
                ->where('movie_id', $movie->id)
                ->exists()) {
                return ['already_purchased' => true];
            }

            $wallet = UserWallet::query()->firstOrCreate(
                ['user_id' => $user->id],
                ['balance' => 0]
            );
            $balanceMinor = $this->toMinorUnits($wallet->balance);

            if ($balanceMinor < $amountMinor) {
                return [
                    'insufficient_balance' => true,
                    'balance' => $wallet->balance,
                ];
            }

            $wallet->balance = number_format(($balanceMinor - $amountMinor) / 100, 2, '.', '');
            $wallet->save();

            UserMovies::query()->create([
                'user_id' => $user->id,
                'movie_id' => $movie->id,
                'total_movies' => 1,
            ]);

            $userWallet = UserWallet::where('user_id', $user->id)->first();

            

            if ($userWallet) {
                $balance = $userWallet->balance;
            } else {
                $balance = 0;
            }

            WalletTransaction::query()->create([
                'wallet_id' => $userWallet ? $userWallet->id : $wallet->id,
                'user_id' => $user->id,
                'balance' => $balance + number_format($amountMinor / 100, 2, '.', ''),
                'type' => 'movie_purchase',
                'amount' => number_format($amountMinor / 100, 2, '.', ''),
                'description' => 'Movie purchase using wallet: ' . $movie->name,
                'movie_id' => $movie->id,
            ]);

            return ['balance' => $wallet->balance];
        });

        if (!empty($purchase['already_purchased'])) {
            return response()->json(['message' => 'This movie is already in your library.'], 409);
        }
        if (!empty($purchase['insufficient_balance'])) {
            return response()->json([
                'message' => 'Your wallet balance is too low to rent this movie.',
                'balance' => $purchase['balance'],
                'required_amount' => number_format($amountMinor / 100, 2, '.', ''),
            ], 422);
        }

        return response()->json([
            'message' => 'Movie purchased with your wallet balance.',
            'balance' => $purchase['balance'],
            'currency' => strtoupper((string) config('services.stripe.currency', 'pkr')),
            'movie_id' => $movie->id,
        ]);
    }

    public function completeCheckout(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'session_id' => ['required', 'string', 'starts_with:cs_'],
        ]);
        $user = $request->user();

        try {
            $session = $this->stripeClient()->checkout->sessions->retrieve($validated['session_id']);
        } catch (ApiErrorException $exception) {
            Log::error('Unable to retrieve Stripe Checkout session.', [
                'user_id' => $user->id,
                'exception' => $exception->getMessage(),
            ]);

            return response()->json([
                'message' => 'Unable to verify this payment. Please try again.',
            ], 502);
        }

        if ((string) ($session->metadata->user_id ?? '') !== (string) $user->id) {
            return response()->json(['message' => 'This payment does not belong to your account.'], 403);
        }

        if (!$this->isPaidSession($session)) {
            return response()->json(['message' => 'Payment has not completed.'], 409);
        }

        $fulfillment = $this->fulfillSession($session);

        return response()->json([
            'message' => 'Payment completed successfully.',
            'type' => $fulfillment['type'],
            'balance' => $fulfillment['balance'],
            'currency' => strtoupper((string) config('services.stripe.currency', 'pkr')),
            'movie_id' => $fulfillment['movie_id'],
            'wallet_credit' => $fulfillment['wallet_credit'],
        ]);
    }

    public function stripeWebhook(Request $request): JsonResponse
    {
        $webhookSecret = (string) config('services.stripe.webhook_secret');
        if ($webhookSecret === '') {
            return response()->json(['message' => 'Stripe webhook is not configured.'], 503);
        }

        try {
            $event = Webhook::constructEvent(
                $request->getContent(),
                (string) $request->header('Stripe-Signature'),
                $webhookSecret
            );
        } catch (\UnexpectedValueException|SignatureVerificationException $exception) {
            return response()->json(['message' => 'Invalid Stripe webhook signature.'], 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            if ($this->isPaidSession($session)) {
                $this->fulfillSession($session);
            }
        }

        return response()->json(['received' => true]);
    }

    private function fulfillSession(CheckoutSession $session): array
    {
        $metadata = $session->metadata;
        $userId = (int) ($metadata->user_id ?? 0);
        $amountMinor = (int) ($metadata->amount_minor ?? 0);
        $currency = strtolower((string) ($metadata->currency ?? ''));

        if (
            $userId < 1
            || $amountMinor < 1
            || (int) $session->amount_total !== $amountMinor
            || strtolower((string) $session->currency) !== $currency
            || $currency !== strtolower((string) config('services.stripe.currency', 'pkr'))
        ) {
            abort(422, 'Stripe payment details do not match the expected order.');
        }

        return DB::transaction(function () use ($session, $metadata, $userId, $amountMinor): array {
            User::query()->whereKey($userId)->lockForUpdate()->firstOrFail();

            $existing = WalletTransaction::query()
                ->where('stripe_checkout_session_id', $session->id)
                ->first();
            if ($existing) {
                $wallet = UserWallet::query()->firstOrCreate(
                    ['user_id' => $userId],
                    ['balance' => 0]
                );

                return [
                    'type' => $existing->type,
                    'balance' => $wallet->balance,
                    'movie_id' => $existing->movie_id,
                    'wallet_credit' => number_format(((int) ($metadata->wallet_credit_minor ?? 0)) / 100, 2, '.', ''),
                ];
            }

            $wallet = UserWallet::query()->firstOrCreate(
                ['user_id' => $userId],
                ['balance' => 0]
            );
            $amount = number_format($amountMinor / 100, 2, '.', '');

            if ($metadata->type === 'wallet_top_up') {
                $newBalanceMinor = $this->toMinorUnits($wallet->balance) + $amountMinor;
                $wallet->balance = number_format($newBalanceMinor / 100, 2, '.', '');
                $wallet->save();

                WalletTransaction::query()->create([
                    'wallet_id' => $wallet->id,
                    'user_id' => $userId,
                    'type' => 'wallet_top_up',
                    'amount' => $amount,
                    'description' => 'Wallet top-up',
                    'stripe_checkout_session_id' => $session->id,
                    'stripe_payment_intent_id' => $session->payment_intent,
                ]);

                return [
                    'type' => 'wallet_top_up',
                    'balance' => $wallet->balance,
                    'movie_id' => null,
                    'wallet_credit' => '0.00',
                ];
            }

            if ($metadata->type !== 'movie_purchase') {
                abort(422, 'Unsupported Stripe payment type.');
            }

            $moviePriceMinor = (int) ($metadata->movie_price_minor ?? 0);
            $walletCreditMinor = (int) ($metadata->wallet_credit_minor ?? 0);
            if (
                $moviePriceMinor < 1
                || $walletCreditMinor < 0
                || $moviePriceMinor + $walletCreditMinor !== $amountMinor
            ) {
                abort(422, 'Stripe movie payment allocation is invalid.');
            }

            $movieId = (int) ($metadata->movie_id ?? 0);
            $movie = Entertainment::query()
                ->whereKey($movieId)
                ->where('type', 'movie')
                ->firstOrFail();

            UserMovies::query()->firstOrCreate(
                ['user_id' => $userId, 'movie_id' => $movie->id],
                ['total_movies' => 1]
            );

            if ($walletCreditMinor > 0) {
                $newBalanceMinor = $this->toMinorUnits($wallet->balance) + $walletCreditMinor;
                $wallet->balance = number_format($newBalanceMinor / 100, 2, '.', '');
                $wallet->save();
            }

            $moviePrice = number_format($moviePriceMinor / 100, 2, '.', '');
            WalletTransaction::query()->create([
                'wallet_id' => $wallet->id,
                'user_id' => $userId,
                'type' => 'movie_purchase',
                'amount' => '-' . $moviePrice,
                'description' => 'Movie purchase with Stripe: ' . $movie->name,
                'movie_id' => $movie->id,
                'stripe_checkout_session_id' => $session->id,
                'stripe_payment_intent_id' => $session->payment_intent,
            ]);

            if ($walletCreditMinor > 0) {
                WalletTransaction::query()->create([
                    'wallet_id' => $wallet->id,
                    'user_id' => $userId,
                    'type' => 'wallet_top_up',
                    'amount' => number_format($walletCreditMinor / 100, 2, '.', ''),
                    'description' => 'Stripe minimum charge remainder credited from ' . $movie->name,
                    'movie_id' => $movie->id,
                    'stripe_payment_intent_id' => $session->payment_intent,
                ]);
            }

            return [
                'type' => 'movie_purchase',
                'balance' => $wallet->balance,
                'movie_id' => $movie->id,
                'wallet_credit' => number_format($walletCreditMinor / 100, 2, '.', ''),
            ];
        });
    }

    private function isPaidSession(CheckoutSession $session): bool
    {
        return $session->status === 'complete' && $session->payment_status === 'paid';
    }

    private function toMinorUnits($amount): int
    {
        $formattedAmount = number_format((float) $amount, 2, '.', '');
        [$whole, $fraction] = array_pad(explode('.', $formattedAmount, 2), 2, '00');

        return ((int) $whole * 100) + (int) substr(str_pad($fraction, 2, '0'), 0, 2);
    }

    private function stripeClient(): StripeClient
    {
        $secret = (string) config('services.stripe.secret');
        if ($secret === '') {
            abort(503, 'Stripe payments are not configured.');
        }

        return new StripeClient($secret);
    }
}
