<template>
  <AppLayout>
    <main class="movie-player-page mv-w-full mv-bg-surface-container-lowest min-vh-100">
      <div class="mv-w-full mv-max-w-7xl mx-auto mv-px-margin-mobile mv-sm-px-margin mv-py-space-lg">
        <div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-md mb-4">
          <div class="d-flex align-items-center mv-gap-space-md">
            <router-link
              :to="`/movie/${$route.params.id}`"
              class="mv-text-on-surface-variant mv-hover-text-primary d-inline-flex align-items-center mv-gap-space-xs text-decoration-none"
            >
              <span class="material-symbols-outlined">arrow_back</span>
              Movie details
            </router-link>
            <span v-if="movie" class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">
              {{ movie.name }}
            </span>
          </div>
          <div v-if="movie && hasTrailer && hasMovie" class="d-flex mv-gap-space-xs" role="group" aria-label="Choose video">
            <button
              type="button"
              class="player-mode-button"
              :class="{ 'is-active': playbackMode === 'trailer' }"
              :aria-pressed="playbackMode === 'trailer'"
              @click="setPlaybackMode('trailer')"
            >
              Trailer
            </button>
            <button
              type="button"
              class="player-mode-button"
              :class="{ 'is-active': playbackMode === 'movie' }"
              :aria-pressed="playbackMode === 'movie'"
              @click="setPlaybackMode('movie')"
            >
              Full movie
            </button>
          </div>
        </div>

        <div v-if="playbackMode === 'movie' && movieSources.length > 1" class="d-flex justify-content-end mb-3">
          <label class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant">
            <span class="mv-font-label-sm mv-text-label-sm">Quality</span>
            <select v-model="selectedQuality" class="player-quality-select" aria-label="Video quality">
              <option v-for="source in movieSources" :key="source.url" :value="source.url">
                {{ source.quality || 'Default' }}
              </option>
            </select>
          </label>
        </div>

        <p v-if="isLoading" class="mv-py-space-xl mv-text-on-surface-variant">Loading video...</p>
        <div v-else-if="errorMessage" class="mv-py-space-xl" role="alert">
          <p class="mv-text-on-surface-variant">{{ errorMessage }}</p>
          <router-link :to="`/movie/${$route.params.id}`" class="mv-text-primary">Back to movie details</router-link>
        </div>
        <div v-else-if="movie" class="d-flex flex-column mv-gap-space-md">
          <div class="player-shell" ref="playerShell">
            <iframe
              v-if="activeSource && activeSource.kind === 'embed'"
              :key="`${playbackMode}-${activeSource.url}`"
              class="player-frame"
              :src="activeSource.url"
              :title="`${movie.name} ${playbackMode}`"
              allow="autoplay; encrypted-media; picture-in-picture; fullscreen"
              allowfullscreen
              referrerpolicy="strict-origin-when-cross-origin"
            ></iframe>
            <video
              v-else-if="activeSource && activeSource.kind === 'video'"
              :key="`${playbackMode}-${activeSource.url}`"
              class="player-video"
              :src="activeSource.url"
              :poster="posterOf(movie)"
              controls
              autoplay
              muted
              playsinline
              preload="metadata"
              @error="handlePlaybackError"
            >
              Your browser does not support HTML video playback.
            </video>
            <div v-else class="player-message">
              <span class="material-symbols-outlined">error</span>
              <p>{{ sourceError || 'No playable video is available for this selection.' }}</p>
            </div>
            <button
              v-if="activeSource"
              type="button"
              class="player-fullscreen"
              aria-label="Enter fullscreen"
              title="Enter fullscreen"
              @click="toggleFullscreen"
            >
              <span class="material-symbols-outlined">fullscreen</span>
            </button>
          </div>

          <div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-sm">
            <div>
              <h1 class="mv-font-headline-md mv-text-headline-md mv-font-bold mv-text-on-surface mb-1">
                {{ movie.name }} <span class="mv-text-outline">· {{ playbackMode === 'trailer' ? 'Trailer' : 'Full movie' }}</span>
              </h1>
              <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mb-0">
                <span v-if="movie.release_year">{{ movie.release_year }}</span>
                <span v-if="movie.release_year && movie.duration"> · </span>
                <span v-if="movie.duration">{{ movie.duration }}</span>
              </p>
            </div>
            <p v-if="playbackError" class="mv-text-error mb-0" role="alert">{{ playbackError }}</p>
          </div>
        </div>
      </div>
    </main>
  </AppLayout>
</template>

<script>
import axios from 'axios';
import AppLayout from '../../layouts/AppLayout.vue';

function parseVideoSource(value) {
  if (typeof value !== 'string' || !value.trim()) {
    return null;
  }

  let url;
  try {
    url = new URL(value.trim(), window.location.origin);
  } catch (error) {
    return null;
  }

  if (!['http:', 'https:'].includes(url.protocol)) {
    return null;
  }

  const host = url.hostname.toLowerCase().replace(/^www\./, '');
  let videoId = '';

  if (host === 'youtu.be') {
    videoId = url.pathname.split('/').filter(Boolean)[0] || '';
  } else if (host === 'youtube.com' || host.endsWith('.youtube.com') || host === 'youtube-nocookie.com') {
    videoId = url.searchParams.get('v') || url.pathname.match(/^\/(?:embed|shorts|live)\/([^/?]+)/)?.[1] || '';
  }

  if (videoId) {
    return {
      kind: 'embed',
      url: `https://www.youtube-nocookie.com/embed/${encodeURIComponent(videoId)}?autoplay=1&controls=1&rel=0&mute=1`,
    };
  }

  if (host === 'vimeo.com' || host.endsWith('.vimeo.com')) {
    const pathParts = url.pathname.split('/').filter(Boolean);
    const videoIndex = pathParts.findIndex((part) => /^\d+$/.test(part));
    if (videoIndex >= 0) {
      const videoId = pathParts[videoIndex];
      const privateHash = pathParts[videoIndex + 1];
      const embedUrl = new URL(`https://player.vimeo.com/video/${videoId}`);
      if (privateHash && !/^\d+$/.test(privateHash)) {
        embedUrl.searchParams.set('h', privateHash);
      }
      embedUrl.searchParams.set('autoplay', '1');
      embedUrl.searchParams.set('muted', '1');
      return { kind: 'embed', url: embedUrl.toString() };
    }
  }

  return { kind: 'video', url: url.toString() };
}

export default {
  name: 'MoviePlayerPage',
  components: { AppLayout },
  data() {
    return {
      movie: null,
      isLoading: true,
      errorMessage: '',
      playbackError: '',
      selectedQuality: '',
    };
  },
  computed: {
    playbackMode() {
      return this.$route.query.type === 'movie' ? 'movie' : 'trailer';
    },
    hasTrailer() {
      return Boolean(this.movie && this.movie.trailer_url);
    },
    hasMovie() {
      return Boolean(this.movie && this.movieSourceUrl);
    },
    movieSourceUrl() {
      return (this.movieSources.find((source) => source.url === this.selectedQuality) || this.movieSources[0] || {}).url || '';
    },
    movieSources() {
      const links = this.movie && Array.isArray(this.movie.video_links)
        ? this.movie.video_links.filter((item) => item && item.url)
        : [];
      const sources = links.map((link) => ({
        quality: link.quality,
        url: link.url,
      }));

      if (!sources.length && this.movie && this.movie.video_url_input) {
        sources.push({
          quality: this.movie.video_upload_type || 'Default',
          url: this.movie.video_url_input,
        });
      }

      return sources;
    },
    activeSource() {
      if (!this.movie) {
        return null;
      }

      const url = this.playbackMode === 'movie' ? this.movieSourceUrl : this.movie.trailer_url;
      return parseVideoSource(url);
    },
    sourceError() {
      if (this.playbackMode === 'movie' && !this.hasMovie) {
        return 'A full movie video is not available.';
      }
      if (this.playbackMode === 'trailer' && !this.hasTrailer) {
        return 'A trailer is not available.';
      }
      return 'This video URL is invalid or uses an unsupported format.';
    },
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.fetchMovie();
      },
    },
    '$route.query.type'() {
      this.playbackError = '';
    },
  },
  methods: {
    async fetchMovie() {
      const movieId = this.$route.params.id;
      const isCurrentRequest = () => String(this.$route.params.id) === String(movieId);
      this.movie = null;
      this.selectedQuality = '';
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

        console.error('Error fetching movie for playback:', error);
        this.errorMessage = error.response && error.response.status === 404
          ? 'This movie could not be found.'
          : 'Unable to load this video. Please try again.';
      } finally {
        if (isCurrentRequest()) {
          this.isLoading = false;
        }
      }
    },
    setPlaybackMode(mode) {
      this.$router.push({
        name: 'movie-player',
        params: { id: this.$route.params.id },
        query: { ...this.$route.query, type: mode },
      });
    },
    posterOf(item) {
      return item.poster_image || item.thumbnail_image || '';
    },
    handlePlaybackError() {
      this.playbackError = 'The video could not be played. Check the video URL or try another quality.';
    },
    async toggleFullscreen() {
      try {
        if (document.fullscreenElement) {
          await document.exitFullscreen();
        } else if (this.$refs.playerShell) {
          await this.$refs.playerShell.requestFullscreen();
        }
      } catch (error) {
        console.error('Unable to toggle player fullscreen:', error);
        this.playbackError = 'Fullscreen mode is not available in this browser.';
      }
    },
  },
};
</script>

<style scoped>
.player-mode-button {
  border: 1px solid rgba(223, 226, 235, 0.18);
  border-radius: 9999px;
  padding: 0.6rem 1rem;
  color: #dfe2eb;
  background: #20242a;
}

.player-mode-button.is-active {
  border-color: #3198dc;
  color: #fff;
  background: #176ca5;
}

.player-quality-select {
  border: 1px solid rgba(223, 226, 235, 0.18);
  border-radius: 0.5rem;
  padding: 0.5rem 0.75rem;
  color: #dfe2eb;
  background: #20242a;
}

.player-shell {
  position: relative;
  width: 100%;
  aspect-ratio: 16 / 9;
  overflow: hidden;
  border-radius: 1rem;
  background: #000;
  box-shadow: 0 1.25rem 3rem rgba(0, 0, 0, 0.45);
}

.player-frame,
.player-video {
  width: 100%;
  height: 100%;
  border: 0;
  background: #000;
}

.player-video {
  object-fit: contain;
}

.player-message {
  display: flex;
  width: 100%;
  height: 100%;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 1.5rem;
  color: #dfe2eb;
  text-align: center;
}

.player-message .material-symbols-outlined {
  margin-bottom: 0.5rem;
  font-size: 2.5rem;
}

.player-fullscreen {
  position: absolute;
  right: 1rem;
  bottom: 1rem;
  z-index: 2;
  display: flex;
  width: 2.75rem;
  height: 2.75rem;
  align-items: center;
  justify-content: center;
  border: 0;
  border-radius: 9999px;
  color: #fff;
  background: rgba(0, 0, 0, 0.72);
  cursor: pointer;
}

.player-fullscreen:hover {
  background: #176ca5;
}

.player-shell:fullscreen {
  width: 100%;
  height: 100%;
  aspect-ratio: auto;
  border-radius: 0;
}
</style>
