<template>
  <header class="mv-fixed top-0 start-0 end-0 mv-z-50 mv-bg-surface_90 mv-backdrop-blur-xl mv-border-b mv-border-surface-container-high">
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

      <div class="mv-flex-1 mv-max-w-md d-none d-xxl-block">
        <form class="mv-relative d-flex align-items-center" @submit.prevent="search">
          <span class="mv-absolute mv-left-space-md mv-text-outline pe-none mv-text-27bd7e bi bi-search"></span>
          <input
            v-model="query"
            class="mv-w-full mv-h-10 mv-pl-10 mv-pr-space-md mv-bg-surface-container-low mv-border mv-border-surface-container-high mv-rounded-full mv-font-body-md mv-text-body-md mv-text-on-surface mv-placeholder-text-outline mv-focus-outline-none mv-focus-border-primary mv-focus-bg-surface-container mv-transition-all"
            placeholder="Search movies, genres..."
            type="search"
          />
        </form>
      </div>

      <div class="d-flex align-items-center mv-gap-space-sm">
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

        <button
          class="btn p-0 border-0 bg-transparent d-xl-none mv-text-on-surface"
          type="button"
          :aria-expanded="mobileMenuOpen"
          aria-controls="mobile-site-menu"
          aria-label="Toggle navigation menu"
          @click="mobileMenuOpen = !mobileMenuOpen"
        >
          <span :class="mobileMenuOpen ? 'bi bi-x-lg' : 'bi bi-list'"></span>
        </button>
      </div>
    </div>

    <div
      v-if="mobileMenuOpen"
      id="mobile-site-menu"
      class="d-xl-none mv-absolute top-100 start-0 end-0 mv-bg-surface-container-lowest mv-border-b mv-border-surface-container-high mv-shadow-lg"
    >
      <nav class="d-flex flex-column mv-p-space-md mv-gap-space-xs">
        <router-link
          v-for="link in links"
          :key="`mobile-${link.to}`"
          :to="link.to"
          class="mv-px-space-md mv-py-space-sm mv-font-label-lg mv-text-label-lg text-decoration-none mv-rounded-lg"
          :class="isActive(link.to) ? 'mv-bg-surface-container-high mv-text-on-surface' : 'mv-text-on-surface-variant mv-hover-text-on-surface'"
          @click="closeMobileMenu"
        >{{ link.label }}</router-link>

        <template v-if="showAccount">
          <div class="mv-border-t mv-border-surface-container-high mt-2 mv-pt-space-xs">
            <router-link
              class="d-flex align-items-center mv-gap-space-sm mv-px-space-md mv-py-space-sm mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant text-decoration-none mv-rounded-lg mv-hover-text-on-surface"
              to="/profile"
              @click="closeMobileMenu"
            >
              <i class="bi bi-person"></i>
              Profile
            </router-link>
            <router-link
              class="d-flex align-items-center mv-gap-space-sm mv-px-space-md mv-py-space-sm mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant text-decoration-none mv-rounded-lg mv-hover-text-on-surface"
              to="/change-password"
              @click="closeMobileMenu"
            >
              <i class="bi bi-key"></i>
              Reset Password
            </router-link>
            <button
              class="btn d-flex align-items-center mv-gap-space-sm w-100 mv-px-space-md mv-py-space-sm mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant text-start mv-hover-text-on-surface"
              type="button"
              @click="handleMobileLogout"
            >
              <i class="bi bi-box-arrow-right"></i>
              Logout
            </button>
          </div>
        </template>
      </nav>
    </div>
  </header>
</template>

<script setup>
import { computed, onBeforeUnmount, onMounted, ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { currentUserName, isLoggedIn, logout } from '../auth';

const props = defineProps({
    variant: {
        type: String,
        default: 'public',
    },
});

const route = useRoute();
const router = useRouter();
const query = ref('');
const accountVersion = ref(0);
const mobileMenuOpen = ref(false);
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
}

onMounted(() => window.addEventListener('profile-updated', refreshAccount));
onBeforeUnmount(() => window.removeEventListener('profile-updated', refreshAccount));

function isActive(to) {
    if (to === '/') {
        return route.path === '/' || route.path === '/browse' || route.path === '/home';
    }

    if (to === '/movies') {
        return route.path === '/movies' || route.path.startsWith('/movie');
    }

    return route.path === to || route.path.startsWith(`${to}/`);
}

function search() {
    router.push({ path: '/movies', query: query.value ? { q: query.value } : {} });
}

function closeMobileMenu() {
    mobileMenuOpen.value = false;
}

function handleMobileLogout() {
    closeMobileMenu();
    logout();
}
</script>
