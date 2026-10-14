<template>
  <header class="mv-fixed top-0 start-0 end-0 mv-z-50 mv-bg-surface_90 mv-backdrop-blur-xl mv-border-b mv-border-surface-container-high">
    <div class="mv-h-16 mv-w-full mv-px-margin-mobile mv-sm-px-margin d-flex align-items-center justify-content-between mv-gap-space-xs mv-sm-gap-space-md">
      <div class="d-flex align-items-center mv-gap-space-md mv-xl-gap-space-xl">
        <router-link class="d-flex align-items-center mv-gap-space-sm mv-group" to="/">
          <div class="mv-w-9 mv-h-9 mv-rounded-lg mv-bg-primary-container d-flex align-items-center justify-content-center mv-shadow-da2bcf mv-group-hover-scale-105 mv-transition-transform">
            <span class="material-symbols-outlined mv-text-c28550">play_arrow</span>
          </div>
          <span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-tracking-tight mv-text-on-surface">Movie<span class="mv-text-primary">Hub</span></span>
        </router-link>
       
      </div>

      

      <div v-if="showAccount" class="d-flex align-items-center mv-gap-1 mv-sm-gap-space-md">
        <router-link class="d-flex align-items-center mv-gap-space-xs mv-px-space-md mv-py-1p5 mv-bg-surface-container-low mv-border mv-border-surface-container-high mv-rounded-full mv-hover-border-tertiary_40 mv-transition-colors" to="/wallet">
          <span class="material-symbols-outlined mv-text-tertiary mv-text-c79a76">account_balance_wallet</span>
          <span class="d-none d-sm-inline-block mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface">Wallet</span>
        </router-link>
        <router-link class="d-flex align-items-center mv-gap-space-xs mv-sm-gap-space-sm mv-pl-space-xs text-decoration-none" to="/my-movies">
          <div class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-primary d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined mv-text-white mv-text-c79a76">person</span>
          </div>
          <span class="d-none d-lg-inline mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface">{{ userName }}</span>
        </router-link>
        <button class="btn btn-link mv-text-on-surface-variant mv-font-label-md text-decoration-none p-0" type="button" @click="logout">Sign out</button>
      </div>
      <div v-else class="d-flex align-items-center mv-gap-space-sm flex-shrink-0">
        <a class="d-inline-flex align-items-center justify-content-center mv-px-space-md mv-py-space-sm mv-rounded-full mv-font-label-md mv-text-label-md mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-all" href="/login">Login</a>
        <a class="d-inline-flex align-items-center justify-content-center mv-px-space-lg mv-py-space-sm mv-rounded-full mv-font-label-md mv-text-label-md mv-bg-primary-container mv-hover-bg-secondary-container mv-shadow-8f3b2a mv-transition-all" href="/register">Get Started</a>
      </div>
    </div>
    <nav aria-label="Main navigation" class="d-flex d-xl-none align-items-center mv-gap-space-xs overflow-x-auto mv-px-margin-mobile mv-sm-px-margin mv-pb-space-sm">
      <router-link
        v-for="link in links"
        :key="'m-' + link.to"
        :to="link.to"
        class="flex-shrink-0 mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-transition-colors"
        :class="isActive(link.to) ? 'mv-bg-surface-container-high mv-text-on-surface mv-rounded-full' : 'mv-text-on-surface-variant'"
      >{{ link.label }}</router-link>
    </nav>
  </header>
</template>

<script setup>
import { computed, ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { currentUserName, isLoggedIn, logout } from '../auth';

const route = useRoute();
const router = useRouter();
const query = ref('');
const showAccount = computed(() => isLoggedIn());
const userName = computed(() => currentUserName());

const links = computed(() => {
    const items = [
        { label: 'Home', to: '/' },
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

function isActive(to) {
    if (to === '/') {
        return route.path === '/' || route.path === '/home';
    }

    if (to === '/movies') {
        return route.path === '/movies' || route.path.startsWith('/movie');
    }

    return route.path === to || route.path.startsWith(`${to}/`);
}

function search() {
    router.push({ path: '/movies', query: query.value ? { q: query.value } : {} });
}
</script>
