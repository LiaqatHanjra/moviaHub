<template>
  <nav v-if="lastPage > 1" class="movie-pagination" :aria-label="label">
    <button v-if="currentPage > 1" type="button" aria-label="Previous page"
      @click="$emit('change', currentPage - 1)">
      <span class="bi bi-chevron-left" aria-hidden="true"></span>
    </button>
    <template v-for="item in pages" :key="item.key">
      <span v-if="item.page === null" class="movie-pagination-gap" aria-hidden="true">...</span>
      <button v-else type="button" :aria-label="`Page ${item.page}`"
        :aria-current="item.page === currentPage ? 'page' : null"
        @click="$emit('change', item.page)">{{ item.page }}</button>
    </template>
    <button v-if="currentPage < lastPage" type="button" aria-label="Next page"
      @click="$emit('change', currentPage + 1)">
      <span class="bi bi-chevron-right" aria-hidden="true"></span>
    </button>
  </nav>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
  currentPage: { type: Number, required: true },
  lastPage: { type: Number, required: true },
  label: { type: String, default: 'Movie pages' },
});

defineEmits(['change']);

const pages = computed(() => {
  const numbers = [...new Set([1, 2, props.currentPage - 1, props.currentPage, props.currentPage + 1, props.lastPage])]
    .filter((page) => page >= 1 && page <= props.lastPage)
    .sort((a, b) => a - b);
  const result = [];
  numbers.forEach((page, index) => {
    if (index && page - numbers[index - 1] > 1) {
      result.push({ key: `gap-${page}`, page: null });
    }
    result.push({ key: `page-${page}`, page });
  });
  return result;
});
</script>

<style scoped>
.movie-pagination {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 0.4rem;
  padding: 0.75rem;
}

.movie-pagination button,
.movie-pagination-gap {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 2.5rem;
  height: 2.5rem;
  padding: 0 0.55rem;
  border: 0;
  border-radius: 0.3rem;
  background: #222126;
  color: #fff;
}

.movie-pagination button[aria-current="page"] {
  background: #a7f51b;
  color: #101600;
}

.movie-pagination button:focus-visible {
  outline: 2px solid #fff;
  outline-offset: 2px;
}
</style>
