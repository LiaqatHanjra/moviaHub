<template>
  <AppLayout>
    <Header />
    <main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100">
      <div class="mv-w-full mv-px-margin-mobile mv-sm-px-margin mv-py-space-lg mv-max-w-7xl mx-auto">
        <p v-if="isLoading" class="mv-py-space-xl mv-text-on-surface-variant">Loading series details...</p>
        <div v-else-if="errorMessage" class="mv-py-space-xl" role="alert">
          <p class="mv-text-on-surface-variant">{{ errorMessage }}</p>
          <router-link to="/home" class="mv-text-primary">Back to home</router-link>
        </div>
        <div v-else-if="series" class="d-flex flex-column mv-gap-space-xl">
          <nav aria-label="Breadcrumb" class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant">
            <router-link to="/home" class="mv-hover-text-primary">Home</router-link>
            <span class="bi bi-chevron-right" aria-hidden="true"></span>
            <span class="mv-text-primary">{{ series.name }}</span>
          </nav>
          <section class="d-grid mv-grid-cols-1 mv-lg-grid-cols-12 mv-gap-space-xl align-items-start">
            <div class="mv-lg-col-span-5 mv-xl-col-span-4">
              <div class="mv-rounded-xl overflow-hidden mv-bg-surface-container mv-shadow-2xl">
                <img class="mv-w-full mv-aspect-bc11a5 mv-object-cover"
                  :src="series.poster_image || series.thumbnail_image || '/frontend/favicon.png'"
                  :alt="`${series.name} poster`" />
              </div>
            </div>
            <div class="mv-lg-col-span-7 mv-xl-col-span-8 d-flex flex-column mv-gap-space-lg">
              <div class="d-flex flex-wrap mv-gap-space-xs">
                <span v-for="genre in series.genres || []" :key="genre.id || genre.name"
                  class="mv-bg-surface-container-high mv-text-secondary mv-px-3 mv-py-1 mv-rounded-full">
                  {{ genre.name || genre }}
                </span>
              </div>
              <div>
                <h1 class="mv-font-headline-xl-mobile mv-sm-font-headline-xl mv-text-headline-xl-mobile mv-sm-text-headline-xl mv-font-extrabold mv-text-on-surface">{{ series.name }}</h1>
                <p class="mv-font-title-md mv-text-title-md mv-text-outline">
                  <span v-if="series.release_year">{{ series.release_year }}</span>
                  <span v-if="series.language"> {{ series.language }}</span>
                  <span v-if="series.imdb_rating"> | {{ series.imdb_rating }} IMDb</span>
                  <span v-if="series.content_rating"> | {{ series.content_rating }}</span>
                </p>
              </div>
              <div v-if="series.description">
                <h2 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Description</h2>
                <p class="mv-font-body-lg mv-text-body-lg mv-text-on-surface-variant">{{ series.description }}</p>
              </div>
            </div>
          </section>
          <section class="d-flex flex-column mv-gap-space-md">
            <h2 class="mv-font-headline-md mv-text-headline-md mv-font-bold mv-text-on-surface">Episodes</h2>
            <p v-if="!series.episodes || !series.episodes.length" class="mv-text-on-surface-variant">No episodes available.</p>
            <div v-else class="d-grid mv-grid-cols-2 mv-sm-grid-cols-3 mv-md-grid-cols-4 mv-lg-grid-cols-6 mv-gap-gutter-mobile mv-sm-gap-gutter">
              <router-link v-for="episode in series.episodes" :key="episode.id"
                :to="{ name: 'episode-player', params: { seriesId: series.id, id: episode.id } }"
                class="mv-group d-flex flex-column mv-bg-surface-container-low mv-rounded-xl overflow-hidden mv-hover-bg-surface-container mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-shadow-md text-decoration-none">
                <div class="mv-relative mv-aspect-bc11a5 mv-w-full overflow-hidden mv-bg-surface-container-high">
                  <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                    :src="episode.poster_image || series.poster_image || series.thumbnail_image || '/frontend/favicon.png'"
                    :alt="`${episode.name} poster`" />
                  <span class="episode-play-icon bi bi-play-fill" aria-hidden="true"></span>
                </div>
                <div class="mv-p-space-sm">
                  <h3 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">{{ episode.name }}</h3>
                  <p v-if="episode.episode_number" class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mb-0">
                    Episode {{ episode.episode_number }}
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
  name: 'SeriesDetailPage',
  components: { AppLayout, Header, Footer },
  data() {
    return { series: null, isLoading: true, errorMessage: '' };
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.fetchSeries();
      },
    },
  },
  methods: {
    async fetchSeries() {
      const id = this.$route.params.id;
      const isCurrentRequest = () => String(this.$route.params.id) === String(id);
      this.series = null;
      this.errorMessage = '';
      this.isLoading = true;
      try {
        const response = await axios.get(`/api/tvshows/${encodeURIComponent(id)}`, { params: { summary: 1 } });
        if (!isCurrentRequest()) return;
        if (!response.data?.data) throw new Error('The series details response did not include a series.');
        this.series = response.data.data;
      } catch (error) {
        if (!isCurrentRequest()) return;
        console.error('Error fetching series details:', error);
        this.errorMessage = error.response?.status === 404
          ? 'This series could not be found.'
          : 'Unable to load series details. Please try again.';
      } finally {
        if (isCurrentRequest()) this.isLoading = false;
      }
    },
  },
};
</script>

<style scoped>
.episode-play-icon {
  position: absolute;
  right: 0.5rem;
  bottom: 0.5rem;
  display: flex;
  width: 2.5rem;
  height: 2.5rem;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: rgba(0, 0, 0, 0.75);
  color: #fff;
  font-size: 1.5rem;
}
</style>
