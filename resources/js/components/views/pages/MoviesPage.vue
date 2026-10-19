<template>
  <AppLayout>
    <Header />
      <main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100">
        <div class="d-flex flex-column mv-w-full">
          <!-- Main Catalog Space -->
          <div
            class="mv-w-full mv-px-margin-mobile mv-sm-px-margin mv-py-space-lg mv-max-w-7xl mx-auto d-flex flex-column mv-gap-space-xl">
            <!-- Header Title & Filter Workspace -->
            <div class="d-flex flex-column mv-gap-space-md">
              <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mv-gap-space-sm">
                <div>
                  <span
                    class="mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-widest mv-text-primary mv-font-bold">Catalog
                    Vault</span>
                  <h1
                    class="mv-font-headline-xl-mobile mv-sm-font-headline-xl mv-text-headline-xl-mobile mv-sm-text-headline-xl mv-text-on-surface mv-tracking-tight mv-mt-0p5">
                    Explore All Movies</h1>
                  <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant mv-max-w-2xl mt-1">
                    Browse hundreds of blockbusters, indie gems, and regional masterworks presented in pristine 4K Ultra HD
                    &amp; Dolby Atmos.
                  </p>
                </div>
                <div
                  class="d-flex align-items-center mv-gap-space-sm align-self-start align-self-md-auto mv-bg-surface-container-low mv-px-space-md mv-py-2 mv-rounded-full mv-shadow-sm">
                  <span class="mv-w-2p5 mv-h-2p5 mv-rounded-full mv-bg-tertiary mv-animate-pulse"></span>
                  <span class="mv-font-label-md mv-text-label-md mv-text-on-surface mv-font-semibold"
                    id="catalog-count-display">
                    Showing {{ firstMovieNumber }}-{{ lastMovieNumber }} of {{ pagination.total }} movies
                  </span>
                </div>
              </div>
              <div
                class="mv-bg-surface-container mv-rounded-xl mv-p-space-md d-flex flex-column mv-gap-space-md mv-shadow-md">
                <div class="d-grid mv-grid-cols-1 mv-md-grid-cols-12 mv-gap-space-sm align-items-center">
                  <div class="mv-md-col-span-6 mv-relative d-flex align-items-center">
                    <span
                      class="material-symbols-outlined mv-absolute mv-left-3p5 mv-text-outline mv-text-27bd7e pe-none">search</span>
                    <input
                      class="mv-w-full mv-h-11 mv-pl-11 mv-pr-space-md mv-bg-surface-container-lowest mv-text-on-surface mv-font-body-md mv-text-body-md mv-rounded-lg mv-placeholder-text-outline mv-focus-outline-none mv-focus-bg-surface-container-high mv-transition-all"
                      v-model="searchInput"
                      id="movie-search-input"
                      placeholder="Search movie titles..."
                      type="search"
                      @input="scheduleMovieSearch"
                    />
                  </div>
                  <div class="mv-md-col-span-4 mv-relative">
                    <select
                      class="mv-w-full mv-h-11 mv-px-3p5 mv-bg-surface-container-lowest mv-text-on-surface mv-font-label-lg mv-text-label-lg mv-rounded-lg mv-appearance-none mv-cursor-pointer mv-focus-outline-none mv-focus-bg-surface-container-high mv-transition-all mv-pr-10"
                      id="genre-select"
                      v-model="selectedGenreId"
                      @change="loadMovies(1)"
                    >
                      <option value="">All Genres</option>
                      <option v-for="genre in genres" :key="genre.id" :value="String(genre.id)">{{ genre.name }}</option>
                    </select>
                    <span
                      class="material-symbols-outlined mv-absolute mv-right-3 mv-top-3 pe-none mv-text-outline mv-text-27bd7e">keyboard_arrow_down</span>
                  </div>
                  <button
                    type="button"
                    class="mv-md-col-span-2 mv-h-11 mv-rounded-lg mv-bg-surface-container-high mv-text-on-surface mv-font-label-md mv-text-label-md"
                    @click="resetFilters"
                  >
                    Reset filters
                  </button>
                  </div>
              </div>
            </div>
            <!-- Featured movie banners -->
            <div v-if="movieBanners.length" class="mv-relative mv-w-full mv-rounded-2xl overflow-hidden mv-bg-surface-container-low mv-shadow-xl">
              <template v-for="(banner, index) in movieBanners" :key="banner.id">
                <div
                  v-show="activeBannerIndex === index"
                  class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center mv-opacity-40 mv-scale-105"
                  :style="bannerBackground(banner)"
                  role="img"
                  :aria-label="banner.name"
                ></div>
                <div
                  v-show="activeBannerIndex === index"
                  class="mv-absolute mv-inset-0 mv-bg-gradient-to-r mv-from-surface-container-lowest mv-via-surface-container-lowest_85 mv-to-transparent"
                ></div>
              </template>
              <div class="mv-relative mv-z-10 mv-p-space-lg mv-md-p-space-xl d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between mv-gap-space-lg">
                <div class="d-flex flex-column mv-gap-space-xs mv-max-w-xl">
                  <div class="d-flex flex-wrap align-items-center mv-gap-2">
                    <span class="mv-px-2p5 mv-py-0p5 mv-rounded-full mv-bg-primary-container mv-font-label-sm mv-text-label-sm mv-font-bold text-uppercase mv-tracking-wider">
                      Featured Movie
                    </span>
                    <span
                      v-if="currentBanner && currentBanner.imdb_rating"
                      class="mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-highest mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold d-flex align-items-center mv-gap-1"
                    >
                      <span class="material-symbols-outlined mv-text-0ddd99">star</span>
                      IMDb {{ currentBanner.imdb_rating }}
                    </span>
                  </div>
                  <h2 class="mv-font-headline-lg-mobile mv-sm-font-headline-lg mv-text-headline-lg-mobile mv-sm-text-headline-lg mv-text-on-surface mv-font-extrabold mv-tracking-tight mt-1">
                    {{ currentBanner && currentBanner.name }}
                    <span v-if="currentBanner && movieYear(currentBanner)">({{ movieYear(currentBanner) }})</span>
                  </h2>
                  <p v-if="currentBanner && currentBanner.genres && currentBanner.genres.length" class="mv-font-label-md mv-text-label-md mv-text-primary">
                    {{ movieGenres(currentBanner) }}
                  </p>
                  <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant mv-line-clamp-2">
                    {{ currentBanner && currentBanner.description }}
                  </p>
                </div>
                <div class="d-flex align-items-center mv-gap-space-md align-self-stretch align-self-sm-auto">
                  <div class="d-flex flex-column align-items-start align-items-sm-end">
                    <span class="mv-font-label-sm mv-text-label-sm mv-text-outline text-uppercase">Standard Rental</span>
                    <span class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface mv-font-bold">Rs. 50</span>
                  </div>
                  <div class="d-flex align-items-center mv-gap-space-sm">
                    <button
                      class="mv-px-space-lg mv-py-3 mv-rounded-full mv-bg-primary-container mv-font-label-lg mv-text-label-lg mv-font-bold mv-hover-scale-105 mv-transition-all mv-shadow-051d8e d-flex align-items-center mv-gap-2">
                      <span class="material-symbols-outlined mv-text-27bd7e">bolt</span> Rent Now
                    </button>
                    <button
                      v-if="movieBanners.length > 1"
                      type="button"
                      aria-label="Show next featured movie"
                      class="mv-w-11 mv-h-11 mv-rounded-full mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface d-flex align-items-center justify-content-center mv-transition-colors"
                      @click="showNextBanner"
                    >
                      <span class="material-symbols-outlined mv-text-c28550">chevron_right</span>
                    </button>
                  </div>
                </div>
              </div>
              <div v-if="movieBanners.length > 1" class="mv-absolute mv-bottom-4 mv-left-4 d-flex mv-gap-1">
                <button
                  v-for="(banner, index) in movieBanners"
                  :key="`banner-dot-${banner.id}`"
                  type="button"
                  class="mv-w-2 mv-h-2 mv-rounded-full mv-transition-colors"
                  :class="activeBannerIndex === index ? 'mv-bg-primary' : 'mv-bg-surface-bright'"
                  :aria-label="`Show featured movie ${index + 1}`"
                  :aria-current="activeBannerIndex === index ? 'true' : null"
                  @click="activeBannerIndex = index"
                ></button>
              </div>
            </div>
            <p v-else-if="!isLoadingBanners" class="mv-text-on-surface-variant">No featured movies available.</p>
            <!-- Main Content: Movie Grid (16 Cards) -->
            <div class="d-flex flex-column mv-gap-space-lg">
              <div class="d-flex align-items-center justify-content-between">
                <h3
                  class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface mv-font-bold d-flex align-items-center mv-gap-2">
                  <span>All Premieres &amp; Rentals</span>
                  <span
                    class="mv-font-label-sm mv-text-label-sm mv-font-semibold mv-bg-surface-container-high mv-text-primary mv-px-2p5 mv-py-1 mv-rounded-full">{{ pagination.per_page }}
                    per page</span>
                </h3>
                <span class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant">Instant 48-hr streaming
                  pass</span>
              </div>
              <p v-if="isLoadingMovies" class="mv-py-space-xl mv-text-on-surface-variant">Loading movies...</p>
              <p v-else-if="moviesError" class="mv-py-space-xl mv-text-on-surface-variant" role="alert">{{ moviesError }}</p>
              <p v-else-if="!movies.length" class="mv-py-space-xl mv-text-on-surface-variant">No movies found.</p>
              <div
                v-else
                class="d-grid mv-grid-cols-2 mv-sm-grid-cols-2 mv-md-grid-cols-3 mv-lg-grid-cols-4 mv-gap-gutter-mobile mv-sm-gap-gutter"
                id="movie-grid"
              >
                <router-link
                  v-for="movie in movies"
                  :key="movie.id"
                  :to="`/movie/${movie.id}`"
                  class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between text-decoration-none"
                >
                  <div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
                    <img
                      class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                      :src="posterOf(movie)"
                      :alt="`${movie.name} poster`"
                      loading="lazy"
                    />
                    <div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
                    <span
                      v-if="movie.imdb_rating"
                      class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold"
                    >
                      <span class="material-symbols-outlined">star</span>{{ movie.imdb_rating }}
                    </span>
                  </div>
                  <div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
                    <div>
                      <h2 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate mv-group-hover-text-primary">
                        {{ movie.name }}
                      </h2>
                      <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant text-truncate mb-0">
                        <span v-if="movieYear(movie)">{{ movieYear(movie) }}<span v-if="movieGenres(movie)"> | </span></span>{{ movieGenres(movie) || movie.language || 'Movie' }}
                      </p>
                    </div>
                  </div>
                </router-link>
              </div>
            </div>
            <nav
              v-if="pagination.total > 0"
              class="d-flex flex-column flex-sm-row align-items-center justify-content-between mv-gap-space-md mv-py-space-md mv-bg-surface-container-low mv-px-space-lg mv-rounded-xl mv-shadow-sm"
              aria-label="Movie pages"
            >
              <span class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant">
                Showing <strong class="mv-text-on-surface">{{ firstMovieNumber }}?{{ lastMovieNumber }}</strong>
                of <strong class="mv-text-on-surface">{{ pagination.total }}</strong> movies
              </span>
              <div v-if="pagination.last_page > 1" class="d-flex flex-wrap align-items-center justify-content-center mv-gap-1p5">
                <button
                  type="button"
                  class="mv-px-3 mv-py-1p5 mv-rounded-lg mv-bg-surface-container mv-text-on-surface mv-hover-bg-surface-container-high mv-font-label-md mv-text-label-md"
                  :disabled="pagination.current_page <= 1 || isLoadingMovies"
                  @click="loadMovies(pagination.current_page - 1)"
                >Previous</button>
                <button
                  v-for="page in visiblePages"
                  :key="page"
                  type="button"
                  class="mv-w-9 mv-h-9 mv-rounded-lg mv-font-label-md mv-text-label-md"
                  :class="page === pagination.current_page ? 'mv-bg-primary-container mv-font-bold mv-shadow-md' : 'mv-bg-surface-container mv-text-on-surface mv-hover-bg-surface-container-high'"
                  :aria-current="page === pagination.current_page ? 'page' : null"
                  :disabled="isLoadingMovies"
                  @click="loadMovies(page)"
                >{{ page }}</button>
                <button
                  type="button"
                  class="mv-px-3 mv-py-1p5 mv-rounded-lg mv-bg-surface-container mv-text-on-surface mv-hover-bg-surface-container-high mv-font-label-md mv-text-label-md"
                  :disabled="pagination.current_page >= pagination.last_page || isLoadingMovies"
                  @click="loadMovies(pagination.current_page + 1)"
                >Next</button>
              </div>
            </nav>
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

function unwrapList(payload) {
  if (Array.isArray(payload)) {
    return payload.length === 1 && Array.isArray(payload[0]) ? unwrapList(payload[0]) : payload;
  }

  if (payload && Array.isArray(payload.data)) {
    return unwrapList(payload.data);
  }

  return [];
}

export default {
  name: 'MoviesPage',
  components: {
    AppLayout,
    Header,
    Footer
  },
  data() {
    return {
      movieBanners: [],
      activeBannerIndex: 0,
      isLoadingBanners: true,
      movies: [],
      genres: [],
      searchInput: '',
      selectedGenreId: '',
      isLoadingMovies: true,
      moviesError: '',
      pagination: {
        current_page: 1,
        last_page: 1,
        per_page: 20,
        total: 0,
      },
      searchTimeout: null,
      moviesRequestId: 0,
    };
  },
  computed: {
    currentBanner() {
      return this.movieBanners[this.activeBannerIndex] || null;
    },
    firstMovieNumber() {
      return this.pagination.total
        ? (this.pagination.current_page - 1) * this.pagination.per_page + 1
        : 0;
    },
    lastMovieNumber() {
      return Math.min(this.pagination.current_page * this.pagination.per_page, this.pagination.total);
    },
    visiblePages() {
      const first = Math.max(1, this.pagination.current_page - 2);
      const last = Math.min(this.pagination.last_page, this.pagination.current_page + 2);
      return Array.from({ length: last - first + 1 }, (_, index) => first + index);
    },
  },
  mounted() {
    this.fetchMovieBanners();
    this.fetchGenres();
    this.loadMovies();
  },
  beforeUnmount() {
    window.clearTimeout(this.searchTimeout);
  },
  methods: {
    fetchGenres() {
      axios.get('/api/genres')
        .then((response) => {
          this.genres = unwrapList(response.data);
        })
        .catch((error) => {
          console.error('Error fetching movie genres:', error);
        });
    },
    scheduleMovieSearch() {
      window.clearTimeout(this.searchTimeout);
      this.searchTimeout = window.setTimeout(() => {
        this.loadMovies(1);
      }, 300);
    },
    resetFilters() {
      window.clearTimeout(this.searchTimeout);
      this.searchInput = '';
      this.selectedGenreId = '';
      this.loadMovies(1);
    },
    async loadMovies(page = 1) {
      const requestId = ++this.moviesRequestId;
      this.isLoadingMovies = true;
      this.moviesError = '';

      const params = { page };
      const search = this.searchInput.trim();
      if (search) {
        params.search = search;
      }
      if (this.selectedGenreId) {
        params.genre_id = this.selectedGenreId;
      }

      try {
        const response = await axios.get('/api/movies', { params });
        if (requestId !== this.moviesRequestId) {
          return;
        }

        const payload = response.data || {};
        this.movies = unwrapList(payload.data);
        this.pagination = {
          current_page: Number(payload.pagination && payload.pagination.current_page) || 1,
          last_page: Number(payload.pagination && payload.pagination.last_page) || 1,
          per_page: Number(payload.pagination && payload.pagination.per_page) || 20,
          total: Number(payload.pagination && payload.pagination.total) || 0,
        };
      } catch (error) {
        if (requestId !== this.moviesRequestId) {
          return;
        }

        console.error('Error fetching movies:', error);
        this.movies = [];
        this.pagination = {
          current_page: 1,
          last_page: 1,
          per_page: 20,
          total: 0,
        };
        this.moviesError = error.response && error.response.status === 401
          ? 'Please sign in again to browse movies.'
          : 'Unable to load movies. Please try again.';
      } finally {
        if (requestId === this.moviesRequestId) {
          this.isLoadingMovies = false;
        }
      }
    },
    posterOf(movie) {
      return movie.poster_image || movie.thumbnail_image || '/frontend/favicon.png';
    },
    fetchMovieBanners() {
      axios.get('/api/movie-banner')
        .then((response) => {
          this.movieBanners = unwrapList(response.data);
        })
        .catch((error) => {
          console.error('Error fetching movie banners:', error);
        })
        .finally(() => {
          this.isLoadingBanners = false;
        });
    },
    bannerBackground(banner) {
      const image = banner.thumbnail_image || banner.poster_image;
      return image ? { backgroundImage: `url("${image}")` } : {};
    },
    movieYear(movie) {
      const date = movie.release_date;
      return date ? new Date(date).getFullYear() : null;
    },
    movieGenres(movie) {
      return (movie.genres || [])
        .map((genre) => typeof genre === 'string' ? genre : genre.name)
        .filter(Boolean)
        .join(', ');
    },
    showNextBanner() {
      this.activeBannerIndex = (this.activeBannerIndex + 1) % this.movieBanners.length;
    },
  },
};
</script>
