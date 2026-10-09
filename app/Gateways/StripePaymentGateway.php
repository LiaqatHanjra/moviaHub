<?php

namespace App\Gateways;

use App\Interfaces\PaymentGateway;
use App\Models\CustomerProfile;
use App\Models\SubscriptionPayment;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Stripe\Stripe;
use App\Models\Plan;

class StripePaymentGateway implements PaymentGateway
{

    public function charge($request, $user, $price)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $requestData = $request->all();

        $paymentMethodId = $requestData['payment_method_id'];
        $stripeCustomerId = $requestData['customer_profile_id'];
        try {
            // Retrieve payment method
            $paymentMethod = PaymentMethod::retrieve($paymentMethodId);

            $cardType = $paymentMethod->card->brand;
            $lastFourDigits = $paymentMethod->card->last4;

            $amount = $price;
            // Create PaymentIntent
            $intent = PaymentIntent::create([
                'payment_method' => $paymentMethodId,
                'amount' => $amount * 100,
                'currency' => 'usd',
                'confirmation_method' => 'automatic',
                'confirm' => true,
                'receipt_email' => env('ADMIN_EMAIL'),
                'return_url' => env('APP_URL'),
                'customer' => $stripeCustomerId,
                'setup_future_usage' => 'off_session',
            ]);

            $chargeId = $intent->latest_charge;

            return response()->json(['success' => true, 'message' => 'Payment successfully received, Your subscription is Created', 'transactionRecord'=> $chargeId]);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}
