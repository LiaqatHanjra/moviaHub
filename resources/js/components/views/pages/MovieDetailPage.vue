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
              <span class="material-symbols-outlined mv-text-outline">chevron_right</span>
              <router-link to="/movies" class="mv-hover-text-primary mv-transition-colors">Movies</router-link>
              <span class="material-symbols-outlined mv-text-outline">chevron_right</span>
              <span class="mv-text-primary mv-font-bold">{{ movie.name }}</span>
            </nav>

            <section class="d-grid mv-grid-cols-1 mv-lg-grid-cols-12 mv-gap-space-xl align-items-start">
              <div class="mv-lg-col-span-5 mv-xl-col-span-4">
                <div class="mv-rounded-xl overflow-hidden mv-bg-surface-container mv-shadow-2xl">
                  <div class="mv-relative mv-aspect-bc11a5 mv-w-full overflow-hidden">
                    <img
                      class="mv-w-full h-100 mv-object-cover"
                      :src="posterOf(movie)"
                      :alt="`${movie.name} poster`"
                    />
                    <div class="mv-absolute bottom-0 mv-inset-x-0 mv-p-space-md d-flex align-items-end justify-content-between">
                      <div v-if="movie.imdb_rating">
                        <p class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant text-uppercase">IMDb score</p>
                        <p class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">
                          <span class="material-symbols-outlined mv-text-tertiary align-middle">star</span>
                          {{ movie.imdb_rating }}<span class="mv-font-body-sm mv-text-body-sm">/10</span>
                        </p>
                      </div>
                      <span
                        v-if="movie.content_rating"
                        class="mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-text-on-surface mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-1 mv-rounded"
                      >
                        {{ movie.content_rating }}
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mv-lg-col-span-7 mv-xl-col-span-8 d-flex flex-column mv-gap-space-lg">
                <div class="d-flex flex-column mv-gap-space-sm">
                  <div class="d-flex flex-wrap align-items-center mv-gap-space-xs">
                    <span
                      v-for="genre in movie.genres || []"
                      :key="genre.id || genre.name"
                      class="mv-bg-surface-container-high mv-text-secondary mv-font-label-md mv-text-label-md mv-px-3 mv-py-1 mv-rounded-full mv-font-semibold"
                    >
                      {{ genre.name || genre }}
                    </span>
                    <span
                      v-if="movie.content_rating"
                      class="mv-bg-surface-container-low mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm mv-px-2p5 mv-py-1 mv-rounded-full"
                    >
                      {{ movie.content_rating }}
                    </span>
                  </div>
                  <h1 class="mv-font-headline-xl-mobile mv-sm-font-headline-xl mv-text-headline-xl-mobile mv-sm-text-headline-xl mv-font-extrabold mv-text-on-surface mv-tracking-tight">
                    {{ movie.name }}
                  </h1>
                  <p class="mv-font-title-md mv-text-title-md mv-text-outline">
                    <span v-if="movie.release_year">{{ movie.release_year }}</span>
                    <span v-if="movie.release_year && movie.duration"> • </span>
                    <span v-if="movie.duration">{{ movie.duration }}</span>
                    <span v-if="movie.language"> • {{ movie.language }}</span>
                  </p>
                </div>

                <div class="d-flex flex-wrap mv-gap-space-sm">
                  <router-link
                    v-if="movie.trailer_url"
                    :to="{ name: 'movie-player', params: { id: movie.id }, query: { type: 'trailer' } }"
                    class="mv-bg-primary mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold mv-px-space-xl mv-py-3 mv-rounded-full d-inline-flex align-items-center mv-gap-space-xs text-decoration-none"
                  >
                    <span class="material-symbols-outlined">play_circle</span>
                    Watch trailer
                  </router-link>
                  <router-link
                    v-if="hasMovieSource"
                    :to="{ name: 'movie-player', params: { id: movie.id }, query: { type: 'movie' } }"
                    class="mv-bg-surface-container-high mv-text-on-surface mv-font-label-lg mv-text-label-lg mv-font-bold mv-px-space-xl mv-py-3 mv-rounded-full d-inline-flex align-items-center mv-gap-space-xs text-decoration-none"
                  >
                    <span class="material-symbols-outlined">movie</span>
                    Watch movie
                  </router-link>
                </div>

                <div v-if="movie.description" class="d-flex flex-column mv-gap-space-xs">
                  <h2 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Description</h2>
                  <p class="mv-font-body-lg mv-text-body-lg mv-text-on-surface-variant mv-leading-relaxed">
                    {{ movie.description }}
                  </p>
                </div>

                <div class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-md mv-shadow-md">
                  <h2 class="mv-font-label-md mv-text-label-md text-uppercase mv-tracking-wider mv-text-outline mb-3">
                    Movie details
                  </h2>
                  <dl class="d-grid mv-grid-cols-2 mv-md-grid-cols-4 mv-gap-space-md mb-0">
                    <div v-if="movie.language">
                      <dt class="mv-font-label-sm mv-text-label-sm mv-text-outline">Language</dt>
                      <dd class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-on-surface mb-0">{{ movie.language }}</dd>
                    </div>
                    <div v-if="movie.release_date">
                      <dt class="mv-font-label-sm mv-text-label-sm mv-text-outline">Release date</dt>
                      <dd class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-on-surface mb-0">{{ movie.release_date }}</dd>
                    </div>
                    <div v-if="movie.duration">
                      <dt class="mv-font-label-sm mv-text-label-sm mv-text-outline">Runtime</dt>
                      <dd class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-on-surface mb-0">{{ movie.duration }}</dd>
                    </div>
                    <div v-if="movie.movie_access">
                      <dt class="mv-font-label-sm mv-text-label-sm mv-text-outline">Access</dt>
                      <dd class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-on-surface mb-0">{{ movie.movie_access }}</dd>
                    </div>
                  </dl>
                </div>
              </div>
            </section>

            <section v-if="movie.directors && movie.directors.length" class="d-flex flex-column mv-gap-space-md">
              <h2 class="mv-font-headline-md mv-text-headline-md mv-font-bold mv-text-on-surface">Directors</h2>
              <div class="d-flex flex-wrap mv-gap-space-md">
                <div
                  v-for="director in movie.directors"
                  :key="director.id"
                  class="d-flex align-items-center mv-gap-space-sm mv-bg-surface-container-low mv-rounded-xl mv-p-space-sm"
                >
                  <img class="mv-w-12 mv-h-12 mv-rounded-full mv-object-cover" :src="personImageOf(director)" :alt="director.name" />
                  <span class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-on-surface">{{ director.name }}</span>
                </div>
              </div>
            </section>

            <section v-if="movie.casts && movie.casts.length" class="d-flex flex-column mv-gap-space-md">
              <h2 class="mv-font-headline-md mv-text-headline-md mv-font-bold mv-text-on-surface">Cast</h2>
              <div class="d-grid mv-grid-cols-2 mv-sm-grid-cols-3 mv-md-grid-cols-6 mv-gap-gutter-mobile mv-sm-gap-gutter">
                <div
                  v-for="person in movie.casts"
                  :key="person.id"
                  class="d-flex flex-column align-items-center text-center mv-gap-space-xs mv-bg-surface-container-low mv-rounded-xl mv-p-space-sm"
                >
                  <img
                    class="mv-w-20 mv-h-20 mv-rounded-full mv-object-cover mv-bg-surface-container"
                    :src="personImageOf(person)"
                    :alt="person.name"
                  />
                  <span class="mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface">{{ person.name }}</span>
                </div>
              </div>
            </section>

            <section v-if="movie.reviews && movie.reviews.length" class="d-flex flex-column mv-gap-space-md">
              <h2 class="mv-font-headline-md mv-text-headline-md mv-font-bold mv-text-on-surface">
                Reviews <span class="mv-text-outline">({{ movie.total_review || movie.reviews.length }})</span>
              </h2>
              <article
                v-for="review in movie.reviews"
                :key="review.id"
                class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-md"
              >
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

            <section v-if="movie.more_items && movie.more_items.length" class="d-flex flex-column mv-gap-space-md">
              <h2 class="mv-font-headline-md mv-text-headline-md mv-font-bold mv-text-on-surface">More like this</h2>
              <div class="d-grid mv-grid-cols-2 mv-sm-grid-cols-3 mv-md-grid-cols-4 mv-lg-grid-cols-6 mv-gap-gutter-mobile mv-sm-gap-gutter">
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

export default {
  name: 'MovieDetailPage',
  components: {
    AppLayout,
    Header,
    Footer
  },
  data() {
    return {
      movie: null,
      isLoading: true,
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
    posterOf(item) {
      return item.poster_image || item.thumbnail_image || '/frontend/favicon.png';
    },
    personImageOf(person) {
      return person.profile_image || '/frontend/favicon.png';
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
