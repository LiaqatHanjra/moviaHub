
cd /var/www/eventquote-api.techenablers.info/code
pull 

dc -f  docker-compose.npm.yml up 


de code_laravel-vue-boilerplate1_1

bash cache.sh 

composer require symfony/mailgun-mailer symfony/http-client


<!-- for node modules hit this command instead of npm install -->
 npm install --legacy-peer-deps
 

 php artisan db:seed --class=UserSeeder
packages used 

npm install vue3-toastify --legacy-peer-deps

## Stripe wallet and movie payments

Add the following server-side values to `.env` before accepting payments:

```dotenv
STRIPE_SECRET=sk_test_...
STRIPE_WEBHOOK_SECRET=whsec_...
STRIPE_CURRENCY=pkr
MOVIE_RENTAL_PRICE=50
STRIPE_MINIMUM_CHARGE=150
```

Run `php artisan migrate` to create the wallet transaction ledger. Configure a Stripe webhook for
`checkout.session.completed` at `https://your-domain.example/api/payments/stripe/webhook` and set
its signing secret as `STRIPE_WEBHOOK_SECRET`. For local development, Stripe CLI can forward events
to `http://localhost:8000/api/payments/stripe/webhook`. Wallet top-ups and movie rentals use Stripe
Checkout; successful payments are recorded by the signed webhook and verified again when the
customer returns to the site. Keep the Stripe secret and webhook secret out of client-side code.
Movies marked `Free` remain playable without a purchase; other movies require library ownership,
and their default rental price is controlled by `MOVIE_RENTAL_PRICE`.
Stripe may reject charges that convert to less than USD 0.50. With the default Rs 50 rental price,
the checkout charges the configured `STRIPE_MINIMUM_CHARGE` (Rs 150 by default), applies Rs 50 to
the movie purchase, and credits the remainder to the user's wallet. Wallet top-ups must also meet
this configured minimum. Adjust `STRIPE_MINIMUM_CHARGE` if Stripe's minimum for your account or
currency requires a different amount.
The checkout page currently processes card payments through Stripe. JazzCash and EasyPaisa are
shown as selectable options but require their merchant API credentials and provider integrations
before they can process payments.
On successful payment, movie ownership is recorded in `user_movies`, the wallet balance is stored
in `user_wallets`, and each ledger entry is written to `wallet_transactions` with a `wallet_id`
reference to its wallet.
