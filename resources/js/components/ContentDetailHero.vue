<template>
  <section class="content-detail">
    <div class="content-detail-top">
      <img class="content-detail-poster" :src="item.poster_image || item.thumbnail_image || '/frontend/favicon.png'"
        :alt="`${item.name} poster`" />
      <div class="content-detail-info">
        <h1>{{ item.name }}</h1>
        <div v-if="item.genres && item.genres.length" class="content-detail-genres">
          <span v-for="genre in item.genres" :key="genre.id || genre.name || genre">{{ genre.name || genre }}</span>
        </div>
        <dl class="content-detail-meta">
          <div v-if="item.language"><dt>Language:</dt><dd>{{ item.language }}</dd></div>
          <div v-if="item.release_year || item.release_date"><dt>Release Year:</dt><dd>{{ item.release_year || String(item.release_date).slice(0, 4) }}</dd></div>
          <div v-if="quality"><dt>Quality:</dt><dd>{{ quality }}</dd></div>
          <div v-if="item.duration"><dt>Duration:</dt><dd>{{ item.duration }}</dd></div>
          <div v-if="item.movie_access"><dt>Access:</dt><dd>{{ item.movie_access }}</dd></div>
          <div v-if="item.imdb_rating"><dt>IMDb:</dt><dd>{{ item.imdb_rating }}/10</dd></div>
          <div v-if="item.content_rating"><dt>Rating:</dt><dd>{{ item.content_rating }}</dd></div>
        </dl>
        <slot name="actions"></slot>
      </div>
    </div>
    <section v-if="item.description" class="content-detail-description">
      <h2>Description</h2>
      <p>{{ item.description }}</p>
    </section>
  </section>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
  item: { type: Object, required: true },
});

const quality = computed(() => {
  const videoLinks = Array.isArray(props.item.video_links) ? props.item.video_links : [];
  const downloads = Array.isArray(props.item.download_quality) ? props.item.download_quality : [];
  return [...new Set([...videoLinks, ...downloads]
    .map((link) => link?.quality)
    .filter((value) => value && value !== 'default'))].join(', ');
});
</script>

<style scoped>
.content-detail {
  padding: clamp(0.75rem, 2vw, 1.5rem);
  border-radius: 0.5rem;
  background: #061b2d;
  color: #f5f8ff;
}

.content-detail-top {
  display: grid;
  grid-template-columns: minmax(0, 12rem) minmax(0, 1fr);
  gap: clamp(1rem, 3vw, 2rem);
  align-items: start;
}

.content-detail-poster {
  width: 100%;
  aspect-ratio: 2 / 3;
  border: 1px solid #53677a;
  border-radius: 0.5rem;
  object-fit: cover;
  background: #122a3e;
}

.content-detail-info {
  min-width: 0;
}

.content-detail-info h1 {
  margin: 0 0 0.5rem;
  color: #fff;
  font-size: clamp(1.25rem, 3vw, 2.5rem);
  font-weight: 700;
  overflow-wrap: anywhere;
}

.content-detail-genres {
  display: flex;
  flex-wrap: wrap;
  gap: 0.35rem;
  margin-bottom: 0.8rem;
}

.content-detail-genres span {
  padding: 0.25rem 0.5rem;
  border-radius: 0.3rem;
  background: #173c60;
  color: #d7e7fa;
  font-size: 0.75rem;
}

.content-detail-meta {
  display: grid;
  gap: 0.35rem;
  margin: 0 0 1rem;
  font-size: 0.875rem;
}

.content-detail-meta div {
  display: flex;
  flex-wrap: wrap;
  gap: 0.45rem;
}

.content-detail-meta dt {
  color: #93a6bc;
  font-weight: 600;
}

.content-detail-meta dd {
  margin: 0;
  color: #dce9f8;
}

.content-detail-description {
  margin-top: 1.25rem;
}

.content-detail-description h2 {
  margin: 0 0 0.45rem;
  color: #fff;
  font-size: 1.15rem;
  font-weight: 700;
}

.content-detail-description p {
  margin: 0;
  color: #bacce0;
  line-height: 1.55;
}

@media (max-width: 575.98px) {
  .content-detail-top {
    grid-template-columns: minmax(0, 36%) minmax(0, 1fr);
    gap: 0.8rem;
  }
}
</style>
