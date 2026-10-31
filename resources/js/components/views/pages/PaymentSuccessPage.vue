<template>
  <AppLayout>
    <Header />
    <main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100">
      <section class="mv-w-full mv-max-w-2xl mx-auto mv-px-margin-mobile mv-py-space-xl text-center">
        <div class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-xl mv-shadow-lg">
          <p v-if="isLoading" class="mv-font-title-md mv-text-title-md mv-text-on-surface-variant">
            Verifying your payment with Stripe...
          </p>
          <div v-else>
            <span class="material-symbols-outlined mv-text-tertiary mv-text-5xl">
              {{ isSuccessful ? 'check_circle' : 'error' }}
            </span>
            <h1 class="mv-font-headline-md mv-text-headline-md mv-font-bold mv-text-on-surface">
              {{ isSuccessful ? 'Payment successful' : 'Payment not confirmed' }}
            </h1>
            <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant" role="status">
              {{ message }}
            </p>
            <p
              v-if="isSuccessful && (payment?.type === 'wallet_top_up' || Number(payment?.wallet_credit) > 0)"
              class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface"
            >
              New wallet balance: {{ formatMoney(payment.balance, payment.currency) }}
            </p>
            <p v-if="isSuccessful && Number(payment?.wallet_credit) > 0" class="mv-font-body-md mv-text-body-md mv-text-tertiary">
              {{ formatMoney(payment.wallet_credit, payment.currency) }} from Stripe's minimum charge was credited to your wallet.
            </p>
            <div class="d-flex flex-wrap justify-content-center mv-gap-space-sm mt-4">
              <router-link
                v-if="payment?.type === 'movie_purchase'"
                to="/my-movies"
                class="mv-bg-primary mv-text-white mv-font-label-md mv-text-label-md mv-px-space-lg mv-py-2 mv-rounded-full text-decoration-none"
              >
                Go to my movies
              </router-link>
              <router-link
                to="/wallet"
                class="mv-bg-surface-container-high mv-text-on-surface mv-font-label-md mv-text-label-md mv-px-space-lg mv-py-2 mv-rounded-full text-decoration-none"
              >
                Go to wallet
              </router-link>
            </div>
          </div>
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
  name: 'PaymentSuccessPage',
  components: { AppLayout, Header, Footer },
  data() {
    return {
      isLoading: true,
      isSuccessful: false,
      message: '',
      payment: null,
    };
  },
  async created() {
    const sessionId = this.$route.query.session_id;
    if (!sessionId) {
      this.message = 'No completed Stripe payment was provided.';
      this.isLoading = false;
      return;
    }

    try {
      const response = await axios.post('/api/payments/complete', { session_id: sessionId });
      this.payment = response.data;
      this.isSuccessful = true;
      this.message = response.data.message || 'Your purchase is ready.';
    } catch (error) {
      this.message = error.response?.data?.message || 'We could not confirm your payment. If you were charged, please contact support.';
    } finally {
      this.isLoading = false;
    }
  },
  methods: {
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
