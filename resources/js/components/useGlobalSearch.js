import { computed, onBeforeUnmount, ref } from 'vue';
import axios from 'axios';

const searchGroups = [
  { key: 'movies', label: 'Movies' },
  { key: 'tvShows', label: 'TV shows' },
  { key: 'seasons', label: 'Seasons' },
  { key: 'episodes', label: 'Episodes' },
];

export function searchResultPath(group, item) {
  if (group === 'movies' && item.id) return `/movie/${item.id}`;
  if (group === 'tvShows' && item.id) return `/series/${item.id}`;
  if ((group === 'seasons' || group === 'episodes') && item.entertainment_id) {
    return `/series/${item.entertainment_id}`;
  }
  return null;
}

export function useGlobalSearch(options = {}) {
  const searchQuery = ref('');
  const searchResults = ref(null);
  const searchMessage = ref('');
  const searchLoading = ref(false);
  let requestId = 0;
  const hasSearchResults = computed(() => searchGroups.some((group) => searchResults.value?.[group.key]?.length));

  function clearSearch() {
    requestId++;
    searchResults.value = null;
    searchMessage.value = '';
    searchLoading.value = false;
  }

  async function searchCatalog(page = 1) {
    const search = searchQuery.value.trim();
    clearSearch();
    if (search.length < 2) {
      searchMessage.value = 'Enter at least 2 characters to search.';
      return;
    }

    const currentRequest = requestId;
    searchLoading.value = true;
    try {
      const params = { search, summary: 1 };
      const moviePerPage = typeof options.moviePerPage === 'function' ? options.moviePerPage() : options.moviePerPage;
      if (moviePerPage) {
        params.movie_per_page = moviePerPage;
        params.movie_page = Number.isInteger(page) ? page : 1;
      }
      const response = await axios.get('/api/global-search', { params });
      if (currentRequest === requestId) searchResults.value = response.data;
    } catch (error) {
      if (currentRequest === requestId) {
        console.error('Error searching catalog:', error);
        searchMessage.value = 'Unable to search right now. Please try again.';
      }
    } finally {
      if (currentRequest === requestId) searchLoading.value = false;
    }
  }

  onBeforeUnmount(() => { requestId++; });
  return { searchQuery, searchResults, searchMessage, searchLoading, searchGroups, hasSearchResults, searchCatalog, clearSearch, searchResultPath };
}
