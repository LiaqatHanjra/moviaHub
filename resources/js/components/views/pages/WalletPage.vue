<template>
  <AppLayout>
    <Header />
    <main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100">
      <section class="mv-w-full mv-max-w-5xl mx-auto mv-px-margin-mobile mv-sm-px-margin mv-py-space-xl d-flex flex-column mv-gap-space-lg">
        <div>
          <h1 class="mv-font-headline-lg mv-text-headline-lg mv-font-bold mv-text-on-surface">Wallet</h1>
          <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant">
            Add funds securely with Stripe, then use your wallet for movie purchases.
          </p>
        </div>

        <div class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-lg mv-shadow-md">
          <p class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant mb-1">Available balance</p>
          <p class="mv-font-headline-xl-mobile mv-sm-font-headline-xl mv-font-bold mv-text-on-surface mb-0">
            {{ formatMoney(wallet.balance, currency) }}
          </p>
        </div>

        <div class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-lg mv-shadow-md d-flex flex-column mv-gap-space-md">
          <div>
            <h2 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">Add balance</h2>
            <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mb-0">
              Choose an amount between {{ formatMoney(minimumTopup, currency) }} and {{ formatMoney(10000, currency) }}.
              You will complete payment on Stripe.
            </p>
          </div>

          <div class="d-grid mv-grid-cols-2 mv-sm-grid-cols-4 mv-gap-space-sm">
            <button
              v-for="amount in availablePresetAmounts"
              :key="amount"
              type="button"
              class="mv-p-space-md mv-rounded-lg mv-bg-surface-container mv-text-on-surface mv-font-label-md mv-text-label-md"
              :class="{ 'mv-bg-primary-container mv-font-bold': selectedAmount === amount }"
              @click="selectAmount(amount)"
            >
              {{ formatMoney(amount, currency) }}
            </button>
          </div>

          <label class="d-flex flex-column mv-gap-space-xs mv-font-label-md mv-text-label-md mv-text-on-surface" for="walletTopupAmount">
            Or enter a custom amount
            <input
              id="walletTopupAmount"
              v-model.number="selectedAmount"
              type="number"
              :min="minimumTopup"
              max="10000"
              step="0.01"
              class="mv-w-full mv-bg-surface-container mv-px-space-md mv-py-3 mv-rounded-lg mv-text-on-surface"
            />
          </label>

          <p v-if="errorMessage" class="mv-text-error mb-0" role="alert">{{ errorMessage }}</p>
          <button
            type="button"
            class="mv-bg-primary mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold mv-px-space-lg mv-py-3 mv-rounded-full"
            :disabled="isSubmitting || isLoading"
            @click="addFunds"
          >
            {{ isSubmitting ? 'Opening Stripe Checkout...' : `Add ${formatMoney(selectedAmount, currency)}` }}
          </button>
        </div>

        <div id="wallet-transactions" class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-lg mv-shadow-md">
          <h2 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">Transaction history</h2>
          <p v-if="isLoading" class="mv-text-on-surface-variant">Loading wallet activity...</p>
          <p v-else-if="!transactions.length" class="mv-text-on-surface-variant">No wallet activity yet.</p>
          <div v-else class="d-flex flex-column mv-gap-space-sm">
            <article
              v-for="transaction in transactions"
              :key="transaction.id"
              class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-sm mv-p-space-md mv-rounded-lg mv-bg-surface-container"
            >
              <div>
                <h3 class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface mb-1">
                  {{ transaction.description }}
                </h3>
                <time class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant" :datetime="transaction.created_at">
                  {{ formatDate(transaction.created_at) }}
                </time>
              </div>
              <strong :class="Number(transaction.amount) < 0 ? 'mv-text-error' : 'mv-text-tertiary'">
                {{ Number(transaction.amount) < 0 ? '-' : '+' }}
                {{ formatMoney(Math.abs(Number(transaction.amount)), currency) }}
              </strong>
            </article>
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
  name: 'WalletPage',
  components: { AppLayout, Header, Footer },
  data() {
    return {
      wallet: { balance: 0 },
      currency: 'PKR',
      minimumTopup: 150,
      presetAmounts: [200, 500, 1000],
      selectedAmount: 500,
      transactions: [],
      isLoading: true,
      isSubmitting: false,
      errorMessage: '',
    };
  },
  async created() {
    await this.fetchWallet();
  },
  computed: {
    availablePresetAmounts() {
      return this.presetAmounts.filter((amount) => amount >= this.minimumTopup);
    },
  },
  methods: {
    async fetchWallet() {
      this.isLoading = true;
      try {
        const [walletResponse, transactionsResponse] = await Promise.all([
          axios.get('/api/my-wallet'),
          axios.get('/api/transaction-history'),
        ]);
        this.wallet = walletResponse.data.wallet || { balance: 0 };
        this.currency = walletResponse.data.currency || 'PKR';
        this.minimumTopup = Number(walletResponse.data.minimum_top_up) || 150;
        this.selectedAmount = Math.max(this.selectedAmount, this.minimumTopup);
        this.transactions = transactionsResponse.data.transactions || [];
      } catch (error) {
        this.errorMessage = error.response?.data?.message || 'Unable to load your wallet.';
      } finally {
        this.isLoading = false;
      }
    },
    selectAmount(amount) {
      this.selectedAmount = amount;
      this.errorMessage = '';
    },
    async addFunds() {
      const amount = Number(this.selectedAmount);
      if (!Number.isFinite(amount) || amount < this.minimumTopup || amount > 10000) {
        this.errorMessage = `Enter an amount from ${this.minimumTopup} to 10,000.`;
        return;
      }

      this.isSubmitting = true;
      this.errorMessage = '';
      try {
        const response = await axios.post('/api/payments/checkout', {
          type: 'wallet_top_up',
          amount,
        });
        if (!response.data?.checkout_url) {
          throw new Error('Stripe Checkout did not return a payment URL.');
        }
        window.location.assign(response.data.checkout_url);
      } catch (error) {
        this.errorMessage = error.response?.data?.message || error.message || 'Unable to start checkout.';
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
    formatDate(value) {
      return value ? new Date(value).toLocaleString() : '';
    },
  },
};
</script>
