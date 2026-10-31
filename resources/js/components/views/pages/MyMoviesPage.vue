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
        <div v-else-if="movies.length" class="d-grid mv-grid-cols-1 mv-sm-grid-cols-2 mv-lg-grid-cols-3 mv-gap-space-lg">
          <article
            v-for="movie in movies"
            :key="movie.id"
            class="mv-bg-surface-container-low mv-rounded-xl overflow-hidden mv-shadow-md"
          >
            <img
              class="mv-w-full mv-aspect-bc11a5 mv-object-cover"
              :src="movie.poster_image || movie.thumbnail_image || '/frontend/favicon.png'"
              :alt="`${movie.name} poster`"
            />
            <div class="mv-p-space-md">
              <h2 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">{{ movie.name }}</h2>
              <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">{{ movie.description }}</p>
              <router-link
                :to="`/movie/${movie.id}`"
                class="mv-inline-flex mv-bg-primary mv-text-white mv-font-label-md mv-text-label-md mv-px-space-lg mv-py-2 mv-rounded-full text-decoration-none"
              >
                View movie
              </router-link>
            </div>
          </article>
        </div>
        <div v-else class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-xl text-center">
          <h2 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">Your library is empty</h2>
          <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant">Purchase a movie and it will appear here.</p>
          <router-link to="/movies" class="mv-text-primary mv-font-label-md mv-text-label-md">Browse movies</router-link>
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
  name: 'MyMoviesPage',
  components: { AppLayout, Header, Footer },
  data() {
    return {
      movies: [],
      isLoading: true,
      errorMessage: '',
    };
  },
  async created() {
    try {
      const response = await axios.get('/api/my-movies');
      this.movies = response.data?.userMovies?.data || response.data?.userMovies || [];
    } catch (error) {
      this.errorMessage = error.response?.data?.message || 'Unable to load your movie library.';
    } finally {
      this.isLoading = false;
    }
  },
};
</script>
