<template>
  <AppLayout>
    <Header/>
      <main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100">
        <div class="mv-w-full mv-px-margin-mobile mv-sm-px-margin mv-py-space-lg mv-max-w-7xl mx-auto">
          <p v-if="isLoading" class="mv-py-space-xl mv-text-on-surface-variant">Loading movie details...</p>

          <div v-else-if="errorMessage" class="mv-py-space-xl" role="alert">
            <p class="mv-text-on-surface-variant">{{ errorMessage }}</p>
            <router-link to="/home" class="mv-text-primary">Back to home</router-link>
          </div>

          <div v-else-if="movie" class="d-flex flex-column mv-gap-space-xl">
            <nav
              aria-label="Breadcrumb"
              class="d-flex align-items-center mv-gap-space-xs mv-font-label-md mv-text-label-md mv-text-on-surface-variant"
            >
              <router-link to="/home" class="mv-hover-text-primary mv-transition-colors">Home</router-link>
              <span class="mv-text-outline bi bi-chevron-right"></span>
              <router-link to="/movies" class="mv-hover-text-primary mv-transition-colors">Movies</router-link>
              <span class="mv-text-outline bi bi-chevron-right"></span>
              <span class="mv-text-primary mv-font-bold">{{ movie.name }}</span>
            </nav>

            <ContentDetailHero :item="movie">
              <template #actions>
                <div class="detail-actions">
                  <span v-if="movie.requires_purchase && !movie.is_purchased" class="detail-price">
                    {{ formatMoney(movie.rental_price, movie.currency) }}
                  </span>
                  <button
                    v-if="movie.requires_purchase && !movie.is_purchased"
                    type="button" class="detail-action detail-action-primary" @click="goToPayment"
                  >Buy now</button>
                  <router-link
                    v-if="hasMovieSource && (!movie.requires_purchase || movie.is_purchased)"
                    :to="{ name: 'movie-player', params: { id: movie.id }, query: { type: 'movie' } }"
                    class="detail-action detail-action-primary"
                  >
                    <span class="bi bi-film"></span>
                    Watch movie
                  </router-link>
                  <button
                    v-if="movie.requires_purchase && !movie.is_purchased && Number(movie.wallet_balance) >= Number(movie.rental_price)"
                    type="button"
                    class="detail-action detail-action-secondary"
                    :disabled="isPurchasing"
                    @click="purchaseWithWallet"
                  >
                    {{ isPurchasing ? 'Processing...' : 'Use wallet balance' }}
                  </button>
                </div>
                <p v-if="purchaseError" class="mv-text-error" role="alert">{{ purchaseError }}</p>
                <p v-if="movie.is_purchased" class="mv-text-tertiary mv-font-label-md mv-text-label-md">
                  This movie is in your library.
                </p>

              </template>
            </ContentDetailHero>

            <section class="d-flex flex-column mv-gap-space-md">
              <h2 class="mv-font-headline-md mv-text-headline-md mv-font-bold mv-text-on-surface">Similar movies</h2>
              <p v-if="!movie.more_items || !movie.more_items.length" class="mv-text-on-surface-variant">No similar movies available.</p>
              <div v-else class="related-movie-grid d-grid mv-grid-cols-2 mv-sm-grid-cols-3 mv-md-grid-cols-4 mv-lg-grid-cols-6 mv-gap-gutter-mobile mv-sm-gap-gutter">
                <router-link
                  v-for="item in movie.more_items"
                  :key="item.id"
                  :to="`/movie/${item.id}`"
                  class="mv-bg-surface-container-low mv-rounded-xl overflow-hidden mv-shadow-md text-decoration-none"
                >
                  <img class="mv-w-full mv-aspect-bc11a5 mv-object-cover" :src="posterOf(item)" :alt="`${item.name} poster`" />
                  <div class="mv-p-space-sm">
                    <h3 class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-on-surface text-truncate">{{ item.name }}</h3>
                    <p class="mv-font-body-sm mv-text-body-sm mv-text-outline mb-0">
                      {{ genreLine(item) }}<span v-if="item.release_date"> • {{ yearOf(item) }}</span>
                    </p>
                  </div>
                </router-link>
              </div>
            </section>

            <section v-if="movie.reviews && movie.reviews.length" class="d-flex flex-column mv-gap-space-md">
              <h2 class="mv-font-headline-md mv-text-headline-md mv-font-bold mv-text-on-surface">
                Reviews <span class="mv-text-outline">({{ movie.total_review || movie.reviews.length }})</span>
              </h2>
              <article v-for="review in movie.reviews" :key="review.id" class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-md">
                <div class="d-flex align-items-center justify-content-between mv-gap-space-sm">
                  <h3 class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-on-surface mb-0">
                    {{ review.username || 'Viewer' }}
                  </h3>
                  <span v-if="review.rating" class="mv-text-tertiary">{{ review.rating }}/10</span>
                </div>
                <p v-if="review.review" class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant mt-2 mb-0">
                  {{ review.review }}
                </p>
              </article>
            </section>
          </div>
        </div>
      </main>
    <Footer />
  </AppLayout>
</template>

<script>
import axios from 'axios';
import AppLayout from '../../layouts/AppLayout.vue';
import Header from '../../layouts/SiteMenu.vue';
import Footer from '../../layouts/SiteFooter.vue';
import ContentDetailHero from '../../ContentDetailHero.vue';

export default {
  name: 'MovieDetailPage',
  components: {
    AppLayout,
    Header,
    Footer,
    ContentDetailHero
  },
  data() {
    return {
      movie: null,
      isLoading: true,
      isPurchasing: false,
      purchaseError: '',
      errorMessage: '',
    };
  },
  computed: {
    hasMovieSource() {
      return Boolean(
        this.movie
        && (
          this.movie.video_url_input
          || (Array.isArray(this.movie.video_links) && this.movie.video_links.some((link) => link.url))
        )
      );
    },
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.fetchMovie();
      },
    },
  },
  methods: {
    async fetchMovie() {
      const movieId = this.$route.params.id;
      const isCurrentRequest = () => String(this.$route.params.id) === String(movieId);
      this.movie = null;
      this.errorMessage = '';
      this.isLoading = true;

      try {
        const response = await axios.get(`/api/movies/${encodeURIComponent(movieId)}`);
        if (!isCurrentRequest()) {
          return;
        }

        this.movie = response.data && response.data.data;

        if (!this.movie) {
          throw new Error('The movie details response did not include a movie.');
        }
      } catch (error) {
        if (!isCurrentRequest()) {
          return;
        }

        console.error('Error fetching movie details:', error);
        this.errorMessage = error.response && error.response.status === 404
          ? 'This movie could not be found.'
          : 'Unable to load movie details. Please try again.';
      } finally {
        if (isCurrentRequest()) {
          this.isLoading = false;
        }
      }
    },
    goToPayment() {
      if (!this.movie) {
        return;
      }

      this.$router.push({
        path: '/payment',
        query: { movie_id: this.movie.id },
      });
    },
    async purchaseWithWallet() {
      if (this.isPurchasing || !this.movie) {
        return;
      }

      this.isPurchasing = true;
      this.purchaseError = '';
      try {
        const response = await axios.post('/api/payments/wallet-purchase', {
          movie_id: this.movie.id,
        });
        this.movie.is_purchased = true;
        this.movie.wallet_balance = response.data.balance;
      } catch (error) {
        this.purchaseError = error.response?.data?.message || 'Unable to complete this wallet purchase.';
        if (error.response?.status === 422 && error.response.data?.balance !== undefined) {
          this.movie.wallet_balance = error.response.data.balance;
        }
      } finally {
        this.isPurchasing = false;
      }
    },
    formatMoney(amount, currency) {
      return new Intl.NumberFormat('en', {
        style: 'currency',
        currency: currency || 'PKR',
        maximumFractionDigits: 2,
      }).format(Number(amount) || 0);
    },
    posterOf(item) {
      return item.poster_image || item.thumbnail_image || '/frontend/favicon.png';
    },
    genreLine(item) {
      return (item.genres || [])
        .map((genre) => typeof genre === 'string' ? genre : genre.name)
        .filter(Boolean)
        .join(', ');
    },
    yearOf(item) {
      return item.release_year || (item.release_date ? new Date(item.release_date).getFullYear() : '');
    },
  },
};
</script>

<style scoped>
.detail-actions {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 0.5rem;
}

.detail-price {
  color: #fff;
  font-size: 1.25rem;
  font-weight: 700;
}

.detail-action {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.35rem;
  min-height: 2.5rem;
  padding: 0.5rem 1rem;
  border: 0;
  border-radius: 0.35rem;
  color: #fff;
  font-size: 0.875rem;
  font-weight: 700;
  text-decoration: none;
}

.detail-action-primary {
  background: #087df4;
}

.detail-action-secondary {
  background: #173c60;
}

.detail-action:disabled {
  opacity: 0.6;
}

@media (max-width: 575.98px) {
  .related-movie-grid {
    display: grid;
    grid-auto-flow: column;
    grid-auto-columns: minmax(5.5rem, 24%);
    grid-template-columns: none;
    overflow-x: auto;
    padding-bottom: 0.5rem;
  }
}
</style>
