<template>
  <footer class="mv-w-full mv-bg-surface-container-lowest mv-border-t mv-border-surface-container-high_60 mv-py-space-xl">
    <div class="mv-w-full mv-px-margin-mobile mv-sm-px-margin">
      <div class="d-grid mv-grid-cols-1 mv-gap-gutter-mobile mv-sm-gap-gutter mv-mb-space-xl" :class="variant === 'public' ? 'mv-sm-grid-cols-2' : 'mv-sm-grid-cols-2 mv-lg-grid-cols-4'">
        <div class="d-flex flex-column mv-gap-space-sm">
          <router-link class="d-flex align-items-center mv-gap-space-sm text-decoration-none" to="/">
            <div class="mv-w-8 mv-h-8 mv-rounded-lg mv-bg-primary-container d-flex align-items-center justify-content-center">
              <span class="material-symbols-outlined mv-text-c79a76">play_arrow</span>
            </div>
            <span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Movie<span class="mv-text-primary">Hub</span></span>
          </router-link>
          <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-max-w-xs mt-1">Next-generation cinematic streaming and pay-per-view rentals in 4K HDR. Stream instantly or download offline.</p>
        </div>
        <div >
          <h4 class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface mb-3 text-uppercase mv-tracking-wider">Discover</h4>
          <ul class="d-flex flex-column mv-gap-space-sm mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant list-unstyled mb-0">
            <li><router-link class="mv-hover-text-on-surface mv-transition-colors" to="/">Browse</router-link></li>
            <li><router-link class="mv-hover-text-on-surface mv-transition-colors" to="/movies">Movies</router-link></li>
            <li><router-link class="mv-hover-text-on-surface mv-transition-colors" to="/categories">Categories</router-link></li>
            <li><router-link class="mv-hover-text-on-surface mv-transition-colors" to="/subscribe">Pricing &amp; Plans</router-link></li>
          </ul>
        </div>
        <div>
          <h4 class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface mb-3 text-uppercase mv-tracking-wider">My Account</h4>
          <ul class="d-flex flex-column mv-gap-space-sm mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant list-unstyled mb-0">
            <li><router-link class="mv-hover-text-on-surface mv-transition-colors" to="/my-movies">My Movies</router-link></li>
            <li><router-link class="mv-hover-text-on-surface mv-transition-colors" to="/wallet">Wallet</router-link></li>
            <li><router-link class="mv-hover-text-on-surface mv-transition-colors" to="/payment">Payment</router-link></li>
            <li><router-link class="mv-hover-text-on-surface mv-transition-colors" to="/payment/success">Purchase Receipts</router-link></li>
          </ul>
        </div>
        <div>
          <h4 class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface mb-3 text-uppercase mv-tracking-wider">Platform</h4>
          <ul class="d-flex flex-column mv-gap-space-sm mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant list-unstyled mb-0">
            <li><router-link class="mv-hover-text-on-surface mv-transition-colors" to="/home">About MovieHub</router-link></li>
            <li><router-link class="mv-hover-text-on-surface mv-transition-colors" to="/watch/1">Supported Devices</router-link></li>
            <li><router-link class="mv-hover-text-on-surface mv-transition-colors" to="/login">Login</router-link></li>
            <li><router-link class="mv-hover-text-on-surface mv-transition-colors" to="/register">Create Account</router-link></li>
          </ul>
        </div>
      </div>
      <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between mv-gap-space-sm mv-pt-space-lg mv-border-t mv-border-surface-container-high_40 mv-text-on-surface-variant mv-font-body-sm mv-text-body-sm">
        <p class="mb-0">© 2025 MovieHub Entertainment Inc. All rights reserved.</p>
        <span class="d-flex align-items-center mv-gap-1"><span class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-tertiary"></span> High-speed CDN Online</span>
      </div>
    </div>
  </footer>
</template>

<script setup>
defineProps({
    variant: {
        type: String,
        default: 'public',
    },
});
</script>
