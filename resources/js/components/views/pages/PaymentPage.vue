<template>
  <AppLayout>
    <Header />
    <main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100">
      <section class="mv-w-full mv-max-w-5xl mx-auto mv-px-margin-mobile mv-sm-px-margin mv-py-space-xl">
        <router-link
          v-if="movie"
          :to="`/movie/${movie.id}`"
          class="mv-text-primary mv-font-label-md mv-text-label-md"
        >
          &larr; Back to movie
        </router-link>

        <p v-if="isLoading" class="mv-py-space-xl mv-text-on-surface-variant">Loading your order...</p>
        <div v-else-if="errorMessage && !movie" class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-lg" role="alert">
          <p class="mv-text-error mb-0">{{ errorMessage }}</p>
        </div>
        <div v-else-if="movie" class="d-grid mv-grid-cols-1 mv-lg-grid-cols-12 mv-gap-space-lg mt-4">
          <div class="mv-lg-col-span-7 mv-bg-surface-container-low mv-rounded-xl mv-p-space-lg">
            <p class="mv-font-label-sm mv-text-label-sm mv-text-primary text-uppercase">Secure checkout</p>
            <h1 class="mv-font-headline-lg mv-text-headline-lg mv-font-bold mv-text-on-surface">Choose a payment method</h1>
            <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant">
              Select a payment method. Any Stripe minimum-charge difference is credited to your wallet.
            </p>

            <div class="d-flex flex-column mv-gap-space-sm mt-4">
              <label
                v-for="method in paymentMethods"
                :key="method.value"
                class="d-flex align-items-start mv-gap-space-md mv-p-space-md mv-rounded-xl mv-bg-surface-container mv-cursor-pointer"
                :class="{ 'mv-bg-surface-container-high': selectedMethod === method.value }"
              >
                <input
                  v-model="selectedMethod"
                  class="mv-mt-1"
                  type="radio"
                  name="paymentMethod"
                  :value="method.value"
                />
                <span class="d-flex flex-column">
                  <span class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">{{ method.label }}</span>
                  <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">{{ method.description }}</span>
                </span>
              </label>
            </div>

            <p v-if="selectedMethod !== 'stripe'" class="mv-bg-surface-container mv-rounded-lg mv-p-space-md mv-text-on-surface-variant mt-3" role="status">
              {{ selectedMethodMessage }}
            </p>
            <p v-if="errorMessage" class="mv-text-error mt-3" role="alert">{{ errorMessage }}</p>

            <button
              type="button"
              class="mv-w-full mv-bg-primary mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold mv-px-space-lg mv-py-3 mv-rounded-full mt-3"
              :disabled="isSubmitting || !canPayWithSelectedMethod"
              @click="submitPayment"
            >
              {{ isSubmitting ? 'Opening Stripe Checkout...' : `Pay ${formatMoney(stripeChargeAmount, movie.currency)} with ${selectedMethodLabel}` }}
            </button>
          </div>

          <aside class="mv-lg-col-span-5 mv-bg-surface-container-low mv-rounded-xl mv-p-space-lg">
            <h2 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">Order summary</h2>
            <div class="d-flex align-items-center mv-gap-space-md mv-py-space-md">
              <img
                class="mv-w-20 mv-h-28 mv-object-cover mv-rounded-lg"
                :src="movie.poster_image || movie.thumbnail_image || '/frontend/favicon.png'"
                :alt="`${movie.name} poster`"
              />
              <div>
                <h3 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">{{ movie.name }}</h3>
                <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mb-0">Digital movie rental</p>
              </div>
            </div>
            <div class="d-flex justify-content-between mv-pt-space-md mv-font-body-md mv-text-body-md">
              <span class="mv-text-on-surface-variant">Movie rental</span>
              <strong class="mv-text-on-surface">{{ formatMoney(movie.rental_price, movie.currency) }}</strong>
            </div>
            <div v-if="walletCreditAmount > 0" class="d-flex justify-content-between mv-pt-space-xs mv-font-body-md mv-text-body-md">
              <span class="mv-text-on-surface-variant">Credited to your wallet</span>
              <strong class="mv-text-tertiary">+ {{ formatMoney(walletCreditAmount, movie.currency) }}</strong>
            </div>
            <div class="d-flex justify-content-between mv-border-t mv-pt-space-md mv-font-title-md mv-text-title-md">
              <span class="mv-text-on-surface-variant">Stripe card charge</span>
              <strong class="mv-text-on-surface">{{ formatMoney(stripeChargeAmount, movie.currency) }}</strong>
            </div>
            <p v-if="walletCreditAmount > 0" class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-3 mb-0">
              The movie costs {{ formatMoney(movie.rental_price, movie.currency) }}. Stripe requires a minimum card charge;
              the remaining {{ formatMoney(walletCreditAmount, movie.currency) }} will be added to your wallet.
            </p>
            <p v-if="movie.requires_purchase === false" class="mv-text-tertiary mt-3 mb-0">
              This movie is free and does not need checkout.
            </p>
            <p v-else-if="movie.is_purchased" class="mv-text-tertiary mt-3 mb-0">
              This movie is already in your library.
            </p>
          </aside>
        </div>
      </section>
    </main>
    <Footer />
  </AppLayout>
</template>

<script>
import axios from 'axios';
import AppLayout from '../../layouts/AppLayout.vue';
import Header from '../../layouts/SiteMenu.vue';
import Footer from '../../layouts/SiteFooter.vue';

export default {
  name: 'PaymentPage',
  components: { AppLayout, Header, Footer },
  data() {
    return {
      movie: null,
      selectedMethod: 'stripe',
      paymentMethods: [
        {
          value: 'stripe',
          label: 'Stripe',
          description: 'Pay securely with a debit or credit card.',
        },
        {
          value: 'jazzcash',
          label: 'JazzCash',
          description: 'Pay using your JazzCash account.',
        },
        {
          value: 'easypaisa',
          label: 'EasyPaisa',
          description: 'Pay using your EasyPaisa account.',
        },
      ],
      isLoading: true,
      isSubmitting: false,
      errorMessage: '',
    };
  },
  computed: {
    stripeChargeAmount() {
      return Math.max(
        Number(this.movie?.rental_price) || 0,
        Number(this.movie?.stripe_minimum_charge) || 150
      );
    },
    walletCreditAmount() {
      return Math.max(0, this.stripeChargeAmount - (Number(this.movie?.rental_price) || 0));
    },
    selectedMethodLabel() {
      return this.paymentMethods.find((method) => method.value === this.selectedMethod)?.label || 'payment provider';
    },
    selectedMethodMessage() {
      return `${this.selectedMethodLabel} payments are not configured yet. Stripe is currently available for checkout.`;
    },
    canPayWithSelectedMethod() {
      return Boolean(
        this.movie
        && this.movie.requires_purchase
        && !this.movie.is_purchased
        && this.selectedMethod === 'stripe'
      );
    },
  },
  watch: {
    '$route.query.movie_id': {
      immediate: true,
      handler() {
        this.fetchMovie();
      },
    },
  },
  methods: {
    async fetchMovie() {
      const movieId = this.$route.query.movie_id;
      this.movie = null;
      this.errorMessage = '';
      this.isLoading = true;

      if (!movieId) {
        this.errorMessage = 'Select a movie before continuing to checkout.';
        this.isLoading = false;
        return;
      }

      try {
        const response = await axios.get(`/api/movies/${encodeURIComponent(movieId)}`);
        this.movie = response.data?.data || null;
        if (!this.movie || this.movie.type !== 'movie') {
          throw new Error('The selected movie could not be loaded.');
        }
      } catch (error) {
        this.errorMessage = error.response?.data?.message || error.message || 'Unable to load this movie checkout.';
      } finally {
        this.isLoading = false;
      }
    },
    async submitPayment() {
      if (!this.canPayWithSelectedMethod || this.isSubmitting) {
        return;
      }

      this.isSubmitting = true;
      this.errorMessage = '';
      try {
        const response = await axios.post('/api/payments/checkout', {
          type: 'movie_purchase',
          movie_id: this.movie.id,
          amount: this.movie.rental_price,
        });
        if (!response.data?.checkout_url) {
          throw new Error('Stripe Checkout did not return a payment URL.');
        }
        window.location.assign(response.data.checkout_url);
      } catch (error) {
        this.errorMessage = error.response?.data?.message || error.message || 'Unable to start checkout. Please try again.';
        this.isSubmitting = false;
      }
    },
    formatMoney(amount, currency) {
      return new Intl.NumberFormat('en', {
        style: 'currency',
        currency: currency || 'PKR',
        maximumFractionDigits: 2,
      }).format(Number(amount) || 0);
    },
  },
};
</script>
