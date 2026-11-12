<template>
  <header ref="siteHeader" class="mv-fixed top-0 start-0 end-0 mv-z-50 mv-bg-surface_90 mv-backdrop-blur-xl mv-border-b mv-border-surface-container-high">
    <div class="mv-h-16 mv-w-full mv-px-margin-mobile mv-sm-px-margin d-flex align-items-center justify-content-between mv-gap-space-xs mv-sm-gap-space-md">
      <div class="d-flex align-items-center mv-gap-space-md mv-xl-gap-space-xl">
        <router-link class="d-flex align-items-center mv-gap-space-sm mv-group" to="/home">
          <div class="mv-w-9 mv-h-9 mv-rounded-lg mv-bg-primary-container d-flex align-items-center justify-content-center mv-shadow-da2bcf mv-group-hover-scale-105 mv-transition-transform">
            <span class="mv-text-c28550 bi bi-play-fill"></span>
          </div>
          <span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-tracking-tight mv-text-on-surface">Movie<span class="mv-text-primary">Hub</span></span>
        </router-link>
        <nav class="d-none d-xl-flex align-items-center mv-gap-space-xs">
          <router-link
            v-for="link in links"
            :key="link.to"
            :to="link.to"
            class="mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-transition-colors"
            :class="isActive(link.to) ? 'mv-bg-surface-container-high mv-text-on-surface mv-rounded-full' : 'mv-text-on-surface-variant mv-hover-text-on-surface'"
          >{{ link.label }}</router-link>
        </nav>
      </div>

      <div class="header-search mv-flex-1 mv-max-w-md d-none d-md-block" @keydown.esc="clearSearch">
        <form class="mv-relative d-flex align-items-center" role="search" @submit.prevent="searchCatalog">
          <span class="mv-absolute mv-left-space-md mv-text-outline pe-none mv-text-27bd7e bi bi-search"></span>
          <label class="visually-hidden" for="header-global-search">Search movies and shows</label>
          <input
            id="header-global-search"
            v-model="searchQuery"
            class="mv-w-full mv-h-10 mv-pl-10 mv-pr-space-md mv-bg-surface-container-low mv-border mv-border-surface-container-high mv-rounded-full mv-font-body-md mv-text-body-md mv-text-on-surface mv-placeholder-text-outline mv-focus-outline-none mv-focus-border-primary mv-focus-bg-surface-container mv-transition-all"
            placeholder="Search movies and shows..."
            type="search"
            maxlength="100"
            @input="clearSearch"
          />
          <button type="submit" class="header-search-submit" :disabled="searchLoading" aria-label="Search">
            <span class="bi bi-arrow-right" aria-hidden="true"></span>
          </button>
        </form>
        <div v-if="searchMessage || searchResults" class="header-search-results" aria-live="polite">
          <p v-if="searchMessage" class="header-search-message" role="status">{{ searchMessage }}</p>
          <template v-if="searchResults">
            <template v-for="group in searchGroups" :key="group.key">
              <div v-if="searchResults[group.key] && searchResults[group.key].length" class="header-search-group">
                <h2>{{ group.label }}</h2>
                <div v-if="group.key === 'movies' && route.path === '/home'" class="header-movie-grid">
                  <router-link v-for="item in searchResults.movies" :key="item.id" :to="`/movie/${item.id}`"
                    class="header-movie-card" @click="clearSearch">
                    <img :src="item.poster_image || item.thumbnail_image || '/frontend/favicon.png'" :alt="item.name" />
                    <span>{{ item.name }}</span>
                  </router-link>
                </div>
                <template v-else>
                  <template v-for="item in searchResults[group.key]" :key="item.id">
                    <router-link v-if="searchResultPath(group.key, item)" :to="searchResultPath(group.key, item)"
                      @click="clearSearch">{{ item.name }}</router-link>
                    <span v-else>{{ item.name }}</span>
                  </template>
                </template>
                <MoviePagination v-if="group.key === 'movies' && searchResults.movie_pagination"
                  label="Search movie pages" :current-page="searchResults.movie_pagination.current_page"
                  :last-page="searchResults.movie_pagination.last_page" @change="searchCatalog" />
              </div>
            </template>
            <p v-if="!hasSearchResults" class="header-search-message">No results found.</p>
          </template>
        </div>
      </div>

      <div class="header-account-actions d-flex align-items-center mv-gap-space-sm">
        <div class="dropdown d-none d-xl-block">
        <button
          class="btn p-0 border-0 bg-transparent"
          type="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          <!-- Show user image if available -->
          <img
            v-if="userImage"
            :src="userImage"
            :alt="userName || 'User'"
            class="mv-w-8 mv-h-8 mv-rounded-full"
            style="object-fit: cover;"
          />

          <!-- Show initials if image is not available -->
          <div
            v-else
            class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-primary d-flex align-items-center justify-content-center mv-text-white mv-font-semibold"
          >
            {{ userInitials }}
          </div>
        </button>

        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <router-link class="dropdown-item py-2 px-3" to="/profile">
              <i class="me-2 bi bi-person"></i>
              Profile
            </router-link>
          </li>

          <li>
            <router-link class="dropdown-item py-2 px-3" to="/change-password">
              <i class="me-2 bi bi-key"></i>
              Reset Password
            </router-link>
          </li>

          <li>
            <button
              class="dropdown-item py-2 px-3"
              type="button"
              @click="logout"
            >
              <i class="me-2 bi bi-box-arrow-right"></i>
              Logout
            </button>
          </li>
        </ul>
        </div>

        <div v-if="showAccount" class="mobile-account-summary d-xl-none">
          <router-link class="mobile-profile-link" to="/profile" :aria-label="`Profile: ${userName}`">
            <img v-if="userImage && !profileImageFailed" :src="userImage" alt=""
              class="mobile-profile-image" @error="profileImageFailed = true" />
            <span v-else class="mobile-profile-initials" aria-hidden="true">{{ userInitials }}</span>
            <span class="mobile-profile-name">{{ userName }}</span>
          </router-link>
        </div>

        <button
          ref="menuToggle"
          class="mobile-menu-toggle btn p-0 border-0 bg-transparent d-xl-none mv-text-on-surface"
          type="button"
          :aria-expanded="mobileMenuOpen"
          aria-controls="mobile-site-menu"
          :aria-label="mobileMenuOpen ? 'Close navigation menu' : 'Open navigation menu'"
          @click="mobileMenuOpen = !mobileMenuOpen"
        >
          <span :class="mobileMenuOpen ? 'bi bi-x-lg' : 'bi bi-list'" aria-hidden="true"></span>
        </button>
      </div>
    </div>

    <div
      v-show="mobileMenuOpen"
      id="mobile-site-menu"
      class="mobile-site-menu d-xl-none mv-absolute top-100 start-0 end-0 mv-bg-surface-container-lowest mv-border-b mv-border-surface-container-high mv-shadow-lg"
    >
      <nav class="d-flex flex-column mv-p-space-md mv-gap-space-xs" aria-label="Mobile navigation">
        <router-link
          v-for="link in links"
          :key="`mobile-${link.to}`"
          :to="link.to"
          class="mv-px-space-md mv-py-space-sm mv-font-label-lg mv-text-label-lg text-decoration-none mv-rounded-lg"
          :class="isActive(link.to) ? 'mv-bg-surface-container-high mv-text-on-surface' : 'mv-text-on-surface-variant mv-hover-text-on-surface'"
          :aria-current="isActive(link.to) ? 'page' : null"
          @click="closeMobileMenu"
        >{{ link.label }}</router-link>

        <template v-if="showAccount">
          <div class="mv-border-t mv-border-surface-container-high mt-2 mv-pt-space-xs">
            <router-link
              class="d-flex align-items-center mv-gap-space-sm mv-px-space-md mv-py-space-sm mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant text-decoration-none mv-rounded-lg mv-hover-text-on-surface"
              to="/profile"
              @click="closeMobileMenu"
            >
              <i class="bi bi-person" aria-hidden="true"></i>
              Profile
            </router-link>
            <router-link
              class="d-flex align-items-center mv-gap-space-sm mv-px-space-md mv-py-space-sm mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant text-decoration-none mv-rounded-lg mv-hover-text-on-surface"
              to="/change-password"
              @click="closeMobileMenu"
            >
              <i class="bi bi-key" aria-hidden="true"></i>
              Reset Password
            </router-link>
            <button
              class="btn d-flex align-items-center mv-gap-space-sm w-100 mv-px-space-md mv-py-space-sm mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant text-start mv-hover-text-on-surface"
              type="button"
              @click="handleMobileLogout"
            >
              <i class="bi bi-box-arrow-right" aria-hidden="true"></i>
              Logout
            </button>
          </div>
        </template>
      </nav>
    </div>
  </header>
</template>

<script setup>
import { computed, onBeforeUnmount, onMounted, ref, watch } from 'vue';
import { useRoute } from 'vue-router';
import { currentUserName, isLoggedIn, logout } from '../auth';
import { useGlobalSearch } from '../useGlobalSearch';
import MoviePagination from '../MoviePagination.vue';

const props = defineProps({
    variant: {
        type: String,
        default: 'public',
    },
});

const route = useRoute();
const { searchQuery, searchResults, searchMessage, searchLoading, searchGroups, hasSearchResults, searchCatalog, clearSearch, searchResultPath } = useGlobalSearch({
    moviePerPage: () => route.path === '/home' ? 10 : null,
});
const accountVersion = ref(0);
const mobileMenuOpen = ref(false);
const siteHeader = ref(null);
const menuToggle = ref(null);
const profileImageFailed = ref(false);
const showAccount = computed(() => isLoggedIn());
const userName = computed(() => {
    accountVersion.value;
    return currentUserName();
});
const userImage = computed(() => {
    accountVersion.value;
    return localStorage.getItem('userImage') || '';
});

const links = computed(() => {
    const items = [
        { label: 'Home', to: '/home' },
        { label: 'Movies', to: '/movies' },
        { label: 'Categories', to: '/categories' },
    ];

    if (showAccount.value) {
        items.push(
            { label: 'My Movies', to: '/my-movies' },
            { label: 'Wallet', to: '/wallet' },
        );
    }

    return items;
});

const userInitials = computed(() => {
    if (!userName.value) return 'U';

    return userName.value
      .trim()
      .split(/\s+/)
      .map(name => name.charAt(0).toUpperCase())
      .slice(0, 2)
      .join('');
});

function refreshAccount() {
    accountVersion.value += 1;
    profileImageFailed.value = false;
}

function handleOutsideClick(event) {
    if (mobileMenuOpen.value && !siteHeader.value?.contains(event.target)) closeMobileMenu();
}

function handleMenuKeydown(event) {
    if (event.key === 'Escape' && mobileMenuOpen.value) {
        closeMobileMenu();
        menuToggle.value?.focus();
    }
}

function handleMenuResize() {
    if (window.innerWidth >= 1200) closeMobileMenu();
}

onMounted(() => {
    window.addEventListener('profile-updated', refreshAccount);
    window.addEventListener('resize', handleMenuResize);
    document.addEventListener('click', handleOutsideClick);
    document.addEventListener('keydown', handleMenuKeydown);
});
onBeforeUnmount(() => {
    window.removeEventListener('profile-updated', refreshAccount);
    window.removeEventListener('resize', handleMenuResize);
    document.removeEventListener('click', handleOutsideClick);
    document.removeEventListener('keydown', handleMenuKeydown);
});

watch(() => route.fullPath, () => {
    closeMobileMenu();
});

function isActive(to) {
    if (to === '/') {
        return route.path === '/' || route.path === '/browse' || route.path === '/home';
    }

    if (to === '/movies') {
        return route.path === '/movies' || route.path.startsWith('/movie');
    }

    return route.path === to || route.path.startsWith(`${to}/`);
}

function closeMobileMenu() {
    mobileMenuOpen.value = false;
}

function handleMobileLogout() {
    closeMobileMenu();
    logout();
}
</script>

<style scoped>
.header-account-actions {
    min-width: 0;
}

@media (max-width: 1199.98px) {
    .mobile-account-summary.d-xl-none {
        display: flex;
        align-items: center;
        min-width: 0;
        gap: 0.3rem;
    }
}

.mobile-profile-link {
    display: inline-flex;
    align-items: center;
    min-width: 0;
    gap: 0.3rem;
    border-radius: 0.3rem;
    padding: 0.25rem 0.35rem;
    background: #101c2d;
    color: #fff;
    font-size: 0.7rem;
    font-weight: 600;
    text-decoration: none;
    white-space: nowrap;
}

.mobile-profile-image,
.mobile-profile-initials {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 1.75rem;
    width: 1.75rem;
    height: 1.75rem;
    border-radius: 50%;
    background: #168de1;
    object-fit: cover;
}

.mobile-profile-name {
    max-width: 5rem;
    overflow: hidden;
    text-overflow: ellipsis;
}

.mobile-profile-link:focus-visible {
    outline: 2px solid #a7f51b;
    outline-offset: 2px;
}

@media (max-width: 767.98px) {
    .header-account-actions {
        gap: 0.15rem !important;
    }

    .mobile-menu-toggle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.75rem;
        height: 2.75rem;
        font-size: 1.65rem;
        line-height: 1;
    }

    @media (max-width: 420px) {
        .mobile-profile-name {
            display: none;
        }

        .mobile-account-summary.d-xl-none {
            gap: 0.15rem;
        }

        .mobile-profile-link {
            padding: 0.2rem;
        }
    }

    .mobile-menu-toggle:focus-visible {
        outline: 2px solid #a7f51b;
        outline-offset: 2px;
        border-radius: 0.3rem;
    }

    .mobile-site-menu {
        max-height: calc(100dvh - 4rem);
        overflow-y: auto;
        background: #101216;
    }

    .mobile-site-menu nav {
        padding: 0.75rem 1rem 1rem;
        gap: 0.25rem;
    }

    .mobile-site-menu nav a,
    .mobile-site-menu nav button {
        min-height: 2.75rem;
        padding: 0.65rem 0.8rem;
        color: #e4e6eb;
    }

    .mobile-site-menu nav a[aria-current="page"] {
        background: #272d34;
        color: #a7f51b;
    }
}

.header-search {
    position: relative;
    min-width: 0;
}

.header-search input {
    padding-right: 2.5rem;
}

.header-search-submit {
    position: absolute;
    right: 0.4rem;
    width: 2rem;
    height: 2rem;
    border: 0;
    border-radius: 50%;
    background: transparent;
    color: #dfe2eb;
}

.header-search-submit:disabled {
    opacity: 0.5;
}

.header-search-results {
    position: absolute;
    top: calc(100% + 0.5rem);
    left: 0;
    right: 0;
    max-height: min(60vh, 24rem);
    overflow-y: auto;
    border: 1px solid #30343b;
    border-radius: 0.5rem;
    background: #191d23;
    box-shadow: 0 0.75rem 2rem rgba(0, 0, 0, 0.4);
}

.header-search-message,
.header-search-group h2 {
    margin: 0;
    padding: 0.65rem 0.8rem;
    color: #dfe2eb;
    font-size: 0.85rem;
}

.header-search-group h2 {
    color: #93ccff;
}

.header-search-group a,
.header-search-group span {
    display: block;
    padding: 0.6rem 0.8rem;
    border-top: 1px solid #30343b;
    color: #fff;
    text-decoration: none;
}

.header-search-group a:hover,
.header-search-group a:focus-visible {
    background: #30343b;
}

.header-movie-grid {
    display: grid;
    grid-template-columns: repeat(5, minmax(0, 1fr));
    gap: 0.4rem;
    padding: 0 0.5rem;
}

.header-search-group .header-movie-card {
    min-width: 0;
    padding: 0;
    border: 0;
}

.header-movie-card img {
    width: 100%;
    aspect-ratio: 2 / 3;
    object-fit: cover;
}

.header-search-group .header-movie-card span {
    padding: 0.25rem 0;
    border: 0;
    font-size: 0.75rem;
    overflow-wrap: anywhere;
}

</style>
