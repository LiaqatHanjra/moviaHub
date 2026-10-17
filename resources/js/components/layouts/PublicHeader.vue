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

      


      <div class="d-flex align-items-center mv-gap-space-sm flex-shrink-0">
        <router-link class="d-inline-flex align-items-center justify-content-center mv-px-space-md mv-py-space-sm mv-rounded-full mv-font-label-md mv-text-label-md mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-all" to="/login">Login</router-link>
        <router-link class="d-inline-flex align-items-center justify-content-center mv-px-space-lg mv-py-space-sm mv-rounded-full mv-font-label-md mv-text-label-md mv-bg-primary-container mv-hover-bg-secondary-container mv-shadow-8f3b2a mv-transition-all" to="/register">Get Started</router-link>
      </div>
    </div>
  </header>
</template>

