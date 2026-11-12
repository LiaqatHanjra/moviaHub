<template>
  <AppLayout>
    <Header />
    <main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100">
      <section class="mv-w-full mv-max-w-7xl mx-auto mv-px-margin-mobile mv-sm-px-margin mv-py-space-xl">
        <div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-md mb-4">
          <div>
            <h1 class="mv-font-headline-lg mv-text-headline-lg mv-font-bold mv-text-on-surface">My Movies</h1>
            <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant mb-0">
              Movies you have purchased are saved to your library.
            </p>
          </div>
          <router-link to="/movies" class="mv-bg-primary mv-text-white mv-font-label-md mv-text-label-md mv-px-space-lg mv-py-2 mv-rounded-full text-decoration-none">
            Browse movies
          </router-link>
        </div>

        <p v-if="isLoading" class="mv-py-space-xl mv-text-on-surface-variant">Loading your library...</p>
        <div v-else-if="errorMessage" class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-lg" role="alert">
          <p class="mv-text-error mb-0">{{ errorMessage }}</p>
        </div>
        <div v-else-if="movies.length" class="movie-grid">
          <router-link
            v-for="movie in movies"
            :key="movie.id"
            :to="`/movie/${movie.id}`"
            class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-md mv-hover-shadow-695ca5 mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1 d-flex flex-column text-decoration-none"
          >
            <div class="mv-relative mv-aspect-bc11a5 mv-w-full overflow-hidden mv-bg-surface-container-high">
              <img
                class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                :src="movie.poster_image || movie.thumbnail_image || '/frontend/favicon.png'"
                :alt="`${movie.name} poster`"
                loading="lazy"
              />
              <span
                v-if="movie.imdb_rating"
                class="mv-absolute mv-top-2 mv-left-2 d-inline-flex align-items-center mv-gap-0p5 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-backdrop-blur-sm mv-text-tertiary mv-font-label-sm mv-text-label-sm"
              >
                <span class="mv-text-3eb376 bi bi-star-fill" style="font-variation-settings: 'FILL' 1;"></span> {{ movie.imdb_rating }}
              </span>
            </div>
            <div class="movie-card-content d-flex flex-column mv-flex-1 justify-content-between">
              <div>
                <h2 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate mv-group-hover-text-primary mv-transition-colors">{{ movie.name }}</h2>
                <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant text-truncate mb-0">{{ genreLine(movie) || movie.language || 'Movie' }}</p>
                <p class="mv-font-label-sm mv-text-label-sm mv-text-tertiary mb-0 mt-2">
                  {{ remainingDaysLabel(movie) }}
                </p>
              </div>
            </div>
          </router-link>
        </div>
        <div v-else class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-xl text-center">
          <h2 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">Your library is empty</h2>
          <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant">Purchase a movie and it will appear here.</p>
          <router-link to="/movies" class="mv-text-primary mv-font-label-md mv-text-label-md">Browse movies</router-link>
        </div>
        <nav v-if="!isLoading && !errorMessage && pagination.last_page > 1"
          class="library-pagination" aria-label="My movie pages">
          <button type="button" :disabled="pagination.current_page <= 1"
            @click="loadMovies(pagination.current_page - 1)">Previous</button>
          <button v-for="page in visiblePages" :key="page" type="button"
            :aria-label="`Page ${page}`" :aria-current="page === pagination.current_page ? 'page' : null"
            @click="loadMovies(page)">{{ page }}</button>
          <button type="button" :disabled="pagination.current_page >= pagination.last_page"
            @click="loadMovies(pagination.current_page + 1)">Next</button>
        </nav>
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
  name: 'MyMoviesPage',
  components: { AppLayout, Header, Footer },
  data() {
    return {
      movies: [],
      isLoading: true,
      errorMessage: '',
      mobilePageSize: false,
      requestId: 0,
      pagination: { current_page: 1, last_page: 1, total: 0 },
    };
  },
  computed: {
    visiblePages() {
      const first = Math.max(1, this.pagination.current_page - 2);
      const last = Math.min(this.pagination.last_page, this.pagination.current_page + 2);
      return Array.from({ length: last - first + 1 }, (_, index) => first + index);
    },
  },
  mounted() {
    this.mobilePageSize = window.matchMedia('(max-width: 767.98px)').matches;
    window.addEventListener('resize', this.handleViewportChange);
    this.loadMovies(1);
  },
  beforeUnmount() {
    window.removeEventListener('resize', this.handleViewportChange);
    this.requestId++;
  },
  methods: {
    handleViewportChange() {
      const isMobile = window.matchMedia('(max-width: 767.98px)').matches;
      if (isMobile !== this.mobilePageSize) {
        this.mobilePageSize = isMobile;
        this.loadMovies(1);
      }
    },
    async loadMovies(page) {
      const requestId = ++this.requestId;
      this.isLoading = true;
      this.errorMessage = '';
      try {
        const response = await axios.get('/api/my-movies', {
          params: { page, per_page: this.mobilePageSize ? 6 : 10 },
        });
        if (requestId !== this.requestId) return;
        this.movies = response.data.userMovies?.data || response.data.userMovies || [];
        this.pagination = response.data.pagination;
      } catch (error) {
        if (requestId !== this.requestId) return;
        console.error('Error fetching movie library:', error);
        this.errorMessage = error.response?.data?.message || 'Unable to load your movie library.';
      } finally {
        if (requestId === this.requestId) this.isLoading = false;
      }
    },
    genreLine(movie) {
      if (!Array.isArray(movie.genres)) return '';
      return movie.genres
        .map((genre) => (typeof genre === 'string' ? genre : genre.name))
        .filter(Boolean)
        .join(', ');
    },
    remainingDaysLabel(movie) {
      const days = Number(movie.rental_remaining_days);
      return `${days} day${days === 1 ? '' : 's'} remaining`;
    },
  },
};
</script>

<style scoped>
.movie-grid {
  display: grid;
  grid-template-columns: repeat(5, minmax(0, 1fr));
  gap: 1rem;
}

.movie-card-content {
  min-height: 6rem;
  gap: 0.5rem;
  padding: 1rem;
}

.library-pagination {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 0.4rem;
  margin-top: 1.5rem;
}

.library-pagination button {
  border: 0;
  border-radius: 0.4rem;
  padding: 0.5rem 0.75rem;
  background: #30343b;
  color: #fff;
}

.library-pagination button[aria-current="page"] {
  background: #a7f51b;
  color: #101600;
  font-weight: 700;
}

.library-pagination button:disabled {
  opacity: 0.5;
}

@media (max-width: 1199.98px) {
  .movie-grid {
    grid-template-columns: repeat(4, minmax(0, 1fr));
  }
}

@media (max-width: 991.98px) {
  .movie-grid {
    grid-template-columns: repeat(3, minmax(0, 1fr));
  }
}

@media (max-width: 767.98px) {
  .movie-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
}
</style>
