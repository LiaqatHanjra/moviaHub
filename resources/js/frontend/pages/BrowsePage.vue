<template>


  <main class="mv-w-full mv-pt-16 mv-bg-surface mv-min-h-c05bbc">
    <div class="d-flex flex-column mv-w-full">
      <!-- 1. FEATURED HERO CAROUSEL BANNER -->
      <section class="mv-relative mv-w-full mv-nmt-16 mv-pt-16">
        <div class="hero-slider">

          <!-- ==================== SLIDE 1 ==================== -->
          <article v-for="banner in banners" :key="banner.id" class="hero-slide mv-relative mv-w-full overflow-hidden">
            <div class="mv-absolute mv-inset-0 mv-z-0">
              <div class="mv-w-full h-100 mv-bg-cover mv-bg-center" :style="backgroundStyle(banner)"></div>
              <div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface mv-via-surface_75 mv-to-surface_40"></div>
              <div class="mv-absolute mv-inset-0 mv-bg-gradient-to-r mv-from-surface mv-via-surface_90 mv-to-transparent mv-max-w-4xl"></div>
            </div>
            <div class="mv-relative mv-z-10 mv-w-full mv-px-margin-mobile mv-md-px-margin-mobile mv-sm-px-margin mv-pt-24 mv-pb-16 mv-md-pt-32 mv-md-pb-24 mv-max-w-7xl mx-auto d-flex flex-column justify-content-end mv-min-h-623c22">
              <div class="d-flex flex-wrap align-items-center mv-gap-space-sm mb-3">
                <span class="d-inline-flex align-items-center mv-gap-1p5 mv-px-space-md mv-py-1 mv-rounded-full mv-bg-primary-container_20 mv-text-primary mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-backdrop-blur-md">Featured Premiere</span>
                <span v-if="ratingOf(banner)" class="d-inline-flex align-items-center mv-gap-1 mv-px-space-sm mv-py-0p5 mv-rounded mv-bg-surface-container-high mv-text-tertiary mv-font-label-sm mv-text-label-sm">
                  <span class="material-symbols-outlined mv-text-773d8f" style="font-variation-settings: 'FILL' 1;">star</span>
                  {{ ratingOf(banner) }} IMDb
                </span>
              </div>
              <h1 class="mv-font-headline-xl-mobile mv-sm-font-headline-xl mv-text-headline-xl-mobile mv-sm-text-headline-xl mv-text-on-surface mv-tracking-tight mv-max-w-3xl mv-drop-shadow-md mb-2">{{ banner.name }}</h1>
              <div class="d-flex flex-wrap align-items-center mv-gap-x-space-md mv-gap-y-1 mv-font-title-md mv-text-title-md mv-text-on-surface-variant mb-3">
                <span v-if="genreLine(banner)" class="mv-text-primary mv-font-bold">{{ genreLine(banner) }}</span>
                <span v-if="yearOf(banner)">{{ yearOf(banner) }}</span>
                <span v-if="banner.duration">{{ banner.duration }}</span>
              </div>
              <p class="mv-font-body-lg mv-text-body-lg mv-text-on-surface-variant mv-max-w-2xl mv-mb-space-xl mv-line-clamp-3">{{ banner.description }}</p>
              <div class="d-flex flex-wrap align-items-center mv-gap-space-md">
                <a :href="watchHref(banner.id)" class="d-inline-flex align-items-center mv-gap-space-sm mv-px-6 mv-py-3p5 mv-rounded-full mv-bg-primary-container mv-font-label-lg mv-text-label-lg mv-shadow-72bf0f mv-hover-bg-secondary-container mv-transition-all text-decoration-none">
                  <span class="material-symbols-outlined mv-text-27bd7e" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
                  Watch now
                </a>
              </div>
            </div>
          </article>
          <p v-if="!banners.length" class="mv-px-margin-mobile mv-py-space-xl mv-text-on-surface-variant">No banners yet.</p>
        </div>
        <div v-if="banners.length" class="hero-slider-controls mv-absolute mv-inset-x-0 mv-bottom-6 mv-z-20 mv-px-margin-mobile mv-md-px-margin-mobile mv-sm-px-margin">
          <div class="mx-auto d-flex mv-max-w-7xl flex-wrap align-items-center justify-content-between mv-gap-space-md">
            <div class="d-flex align-items-center mv-gap-space-sm">
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline text-uppercase mv-tracking-widest">Now Trending</span>
              <div class="hero-slider-dots"></div>
            </div>

            <div class="d-flex align-items-center mv-gap-2">
              <button type="button" data-hero-prev aria-label="Previous banner"
                class="d-flex mv-h-9 mv-w-9 align-items-center justify-content-center mv-rounded-full mv-bg-surface-container-high mv-text-on-surface mv-transition-colors mv-hover-bg-primary-container">
                <span class="material-symbols-outlined mv-text-c79a76">chevron_left</span>
              </button>
              <button type="button" data-hero-next aria-label="Next banner"
                class="d-flex mv-h-9 mv-w-9 align-items-center justify-content-center mv-rounded-full mv-bg-surface-container-high mv-text-on-surface mv-transition-colors mv-hover-bg-primary-container">
                <span class="material-symbols-outlined mv-text-c79a76">chevron_right</span>
              </button>
            </div>
          </div>
        </div>
      </section>

      <!-- 2. EXPLORE CATEGORIES GRID -->
      <section class="mv-w-full mv-px-margin-mobile mv-md-px-margin-mobile mv-sm-px-margin mv-py-space-xl mv-bg-surface-container-lowest">
        <div class="mv-max-w-7xl mx-auto">
          <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mb-4">
            <div>
              <div
                class="d-flex align-items-center mv-gap-space-xs mv-text-secondary mv-font-label-md mv-text-label-md text-uppercase mv-tracking-wider mb-1">
                <span class="material-symbols-outlined mv-text-58f475">grid_view</span>
                Curation Engine
              </div>
              <h2 class="mv-font-headline-lg-mobile mv-sm-font-headline-lg mv-text-headline-lg-mobile mv-sm-text-headline-lg mv-text-on-surface mv-tracking-tight">EXPLORE BY CATEGORY</h2>
            </div>
            <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant mt-2 mt-md-0">
              Browse thousands of titles across your favorite regional &amp; global genres
            </p>
          </div>
          <!-- 8-Category Pill/Card Bento -->
          <div class="d-grid mv-grid-cols-2 mv-sm-grid-cols-4 mv-lg-grid-cols-8 mv-gap-space-sm mv-md-gap-space-md">
            <!-- Bollywood -->
            <a class="mv-group d-flex flex-column align-items-center text-center mv-p-space-md mv-rounded-2xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-all mv-duration-300 mv-shadow-sm mv-hover-shadow-239a9c mv-hover-ntranslate-y-1"
              href="/login">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-gradient-to-tr mv-from-pink-600_30 mv-to-rose-400_20 mv-text-rose-400 d-flex align-items-center justify-content-center mb-2 mv-group-hover-scale-110 mv-transition-transform">
                <span class="material-symbols-outlined mv-text-59700f">hotel_class</span>
              </div>
              <span
                class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold mv-group-hover-text-primary mv-transition-colors">Bollywood</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">340+ titles</span>
            </a>
            <!-- Hollywood -->
            <a class="mv-group d-flex flex-column align-items-center text-center mv-p-space-md mv-rounded-2xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-all mv-duration-300 mv-shadow-sm mv-hover-shadow-f6a547 mv-hover-ntranslate-y-1"
              href="/login">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-gradient-to-tr mv-from-primary-container_30 mv-to-secondary_20 mv-text-primary d-flex align-items-center justify-content-center mb-2 mv-group-hover-scale-110 mv-transition-transform">
                <span class="material-symbols-outlined mv-text-59700f">movie</span>
              </div>
              <span
                class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold mv-group-hover-text-primary mv-transition-colors">Hollywood</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">820+ titles</span>
            </a>
            <!-- South Indian -->
            <a class="mv-group d-flex flex-column align-items-center text-center mv-p-space-md mv-rounded-2xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-all mv-duration-300 mv-shadow-sm mv-hover-shadow-5bc903 mv-hover-ntranslate-y-1"
              href="/login">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-gradient-to-tr mv-from-amber-600_30 mv-to-yellow-400_20 mv-text-amber-400 d-flex align-items-center justify-content-center mb-2 mv-group-hover-scale-110 mv-transition-transform">
                <span class="material-symbols-outlined mv-text-59700f">theaters</span>
              </div>
              <span
                class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold mv-group-hover-text-primary mv-transition-colors">South</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">190+ titles</span>
            </a>
            <!-- Punjabi -->
            <a class="mv-group d-flex flex-column align-items-center text-center mv-p-space-md mv-rounded-2xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-all mv-duration-300 mv-shadow-sm mv-hover-shadow-9bae99 mv-hover-ntranslate-y-1"
              href="/login">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-gradient-to-tr mv-from-orange-600_30 mv-to-amber-500_20 mv-text-orange-400 d-flex align-items-center justify-content-center mb-2 mv-group-hover-scale-110 mv-transition-transform">
                <span class="material-symbols-outlined mv-text-59700f">graphic_eq</span>
              </div>
              <span
                class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold mv-group-hover-text-primary mv-transition-colors">Punjabi</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">75+ titles</span>
            </a>
            <!-- Action -->
            <a class="mv-group d-flex flex-column align-items-center text-center mv-p-space-md mv-rounded-2xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-all mv-duration-300 mv-shadow-sm mv-hover-shadow-f6a547 mv-hover-ntranslate-y-1"
              href="#">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-gradient-to-tr mv-from-primary_30 mv-to-primary-container_20 mv-text-primary d-flex align-items-center justify-content-center mb-2 mv-group-hover-scale-110 mv-transition-transform">
                <span class="material-symbols-outlined mv-text-59700f">local_fire_department</span>
              </div>
              <span
                class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold mv-group-hover-text-primary mv-transition-colors">Action</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">510+ titles</span>
            </a>
            <!-- Comedy -->
            <a class="mv-group d-flex flex-column align-items-center text-center mv-p-space-md mv-rounded-2xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-all mv-duration-300 mv-shadow-sm mv-hover-shadow-4c5e9c mv-hover-ntranslate-y-1"
              href="/login">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-gradient-to-tr mv-from-tertiary_30 mv-to-tertiary-container_20 mv-text-tertiary d-flex align-items-center justify-content-center mb-2 mv-group-hover-scale-110 mv-transition-transform">
                <span class="material-symbols-outlined mv-text-59700f">sentiment_very_satisfied</span>
              </div>
              <span
                class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold mv-group-hover-text-primary mv-transition-colors">Comedy</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">260+ titles</span>
            </a>
            <!-- Thriller -->
            <a class="mv-group d-flex flex-column align-items-center text-center mv-p-space-md mv-rounded-2xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-all mv-duration-300 mv-shadow-sm mv-hover-shadow-0bc642 mv-hover-ntranslate-y-1"
              href="/login">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-gradient-to-tr mv-from-purple-600_30 mv-to-indigo-400_20 mv-text-purple-400 d-flex align-items-center justify-content-center mb-2 mv-group-hover-scale-110 mv-transition-transform">
                <span class="material-symbols-outlined mv-text-59700f">visibility</span>
              </div>
              <span
                class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold mv-group-hover-text-primary mv-transition-colors">Thriller</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">310+ titles</span>
            </a>
            <!-- Horror -->
            <a class="mv-group d-flex flex-column align-items-center text-center mv-p-space-md mv-rounded-2xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-all mv-duration-300 mv-shadow-sm mv-hover-shadow-e609d3 mv-hover-ntranslate-y-1"
              href="/login">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-gradient-to-tr mv-from-red-600_30 mv-to-rose-500_20 mv-text-error d-flex align-items-center justify-content-center mb-2 mv-group-hover-scale-110 mv-transition-transform">
                <span class="material-symbols-outlined mv-text-59700f">skull</span>
              </div>
              <span
                class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold mv-group-hover-text-primary mv-transition-colors">Horror</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">140+ titles</span>
            </a>
          </div>
        </div>
      </section>

      <!-- 3. TRENDING & FEATURED MOVIES ROW -->
      <section class="mv-w-full mv-px-margin-mobile mv-md-px-margin-mobile mv-sm-px-margin mv-py-space-xl mv-max-w-7xl mx-auto">
        <div class="d-flex align-items-end justify-content-between mb-4">
          <div>
            <div
              class="d-flex align-items-center mv-gap-space-xs mv-text-primary mv-font-label-md mv-text-label-md text-uppercase mv-tracking-wider mb-1">
              <span class="material-symbols-outlined mv-text-58f475">local_fire_department</span>
              Top TVOD Rentals
            </div>
            <h2 class="mv-font-headline-lg-mobile mv-sm-font-headline-lg mv-text-headline-lg-mobile mv-sm-text-headline-lg mv-text-on-surface mv-tracking-tight">FEATURED MOVIES</h2>
          </div>
          <a class="d-inline-flex align-items-center mv-gap-1 mv-font-label-lg mv-text-label-lg mv-text-primary mv-hover-text-secondary mv-transition-colors"
            href="/movies">
            View All <span class="material-symbols-outlined mv-text-c79a76">arrow_forward</span>
          </a>
        </div>
        <p v-if="!featured.length" class="mv-text-on-surface-variant">Nothing to show yet.</p>
        <div v-else class="row-slider-wrap">
          <button type="button" data-row-prev="featured" aria-label="Previous featured movies" class="row-slider-arrow row-slider-arrow-prev">
            <span class="material-symbols-outlined">chevron_left</span>
          </button>
          <div class="row-slider" data-row="featured">
          <div v-for="movie in featured" :key="movie.id" class="row-slide">
          <a :href="watchHref(movie.id)" class="mv-group d-flex flex-column mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-md mv-hover-shadow-695ca5 mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1 text-decoration-none">
            <div class="mv-relative mv-aspect-bc11a5 mv-w-full overflow-hidden mv-bg-surface-container-high">
              <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" :alt="movie.name" :src="imageOf(movie)" />
              <span v-if="ratingOf(movie)" class="mv-absolute mv-top-2 mv-left-2 d-inline-flex align-items-center mv-gap-0p5 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-backdrop-blur-sm mv-text-tertiary mv-font-label-sm mv-text-label-sm">
                <span class="material-symbols-outlined mv-text-3eb376" style="font-variation-settings: 'FILL' 1;">star</span> {{ ratingOf(movie) }}
              </span>
            </div>
            <div class="mv-p-space-sm mv-md-p-space-md d-flex flex-column mv-flex-1 justify-content-between">
              <div>
                <h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate mv-group-hover-text-primary mv-transition-colors">{{ movie.name }}</h3>
                <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant text-truncate">{{ genreLine(movie) || movie.language }}</p>
              </div>
              <div class="mt-3 mv-pt-space-xs d-flex align-items-center justify-content-between mv-gap-1">
                <span class="mv-font-label-sm mv-text-label-sm mv-text-outline">{{ yearOf(movie) }}</span>
                <span class="mv-px-3 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-font-label-md mv-text-label-md mv-font-bold">Watch</span>
              </div>
            </div>
          </a>
          </div>
          </div>
          <button type="button" data-row-next="featured" aria-label="Next featured movies" class="row-slider-arrow row-slider-arrow-next">
            <span class="material-symbols-outlined">chevron_right</span>
          </button>
        </div>


      </section>

      <!-- 4. POPULAR & TOP RATED MOVIES ROW -->
      <section class="mv-w-full mv-px-margin-mobile mv-md-px-margin-mobile mv-sm-px-margin mv-py-space-xl mv-max-w-7xl mx-auto">
        <div class="d-flex flex-column flex-sm-row align-items-sm-end justify-content-between mv-gap-space-md mb-4">
          <div>
            <div
              class="d-flex align-items-center mv-gap-space-xs mv-text-primary mv-font-label-md mv-text-label-md text-uppercase mv-tracking-wider mb-1">
              <span class="material-symbols-outlined mv-text-58f475">stars</span>
              Critically Acclaimed
            </div>
            <h2 class="mv-font-headline-lg-mobile mv-sm-font-headline-lg mv-text-headline-lg-mobile mv-sm-text-headline-lg mv-text-on-surface mv-tracking-tight">POPULAR BLOCKBUSTERS</h2>
          </div>
          <div class="d-none d-lg-flex align-items-center mv-gap-space-xs overflow-x-auto mv-pb-1">
            <button
              class="mv-px-space-md mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-font-label-md mv-text-label-md mv-font-semibold flex-shrink-0">
              All
            </button>
            <button
              class="mv-px-space-md mv-py-1p5 mv-rounded-full mv-bg-surface-container mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container-high mv-font-label-md mv-text-label-md flex-shrink-0 mv-transition-colors">
              Hollywood
            </button>
            <button
              class="mv-px-space-md mv-py-1p5 mv-rounded-full mv-bg-surface-container mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container-high mv-font-label-md mv-text-label-md flex-shrink-0 mv-transition-colors">
              Bollywood
            </button>
            <button
              class="mv-px-space-md mv-py-1p5 mv-rounded-full mv-bg-surface-container mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container-high mv-font-label-md mv-text-label-md flex-shrink-0 mv-transition-colors">
              Top Grossing
            </button>
          </div>
        </div>
        <p v-if="!latest.length" class="mv-text-on-surface-variant">Nothing to show yet.</p>
        <div v-else class="row-slider-wrap">
          <button type="button" data-row-prev="latest" aria-label="Previous blockbusters" class="row-slider-arrow row-slider-arrow-prev">
            <span class="material-symbols-outlined">chevron_left</span>
          </button>
          <div class="row-slider" data-row="latest">
          <div v-for="movie in latest" :key="movie.id" class="row-slide">
          <a :href="watchHref(movie.id)" class="mv-group d-flex flex-column mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-md mv-hover-shadow-695ca5 mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1 text-decoration-none">
            <div class="mv-relative mv-aspect-bc11a5 mv-w-full overflow-hidden mv-bg-surface-container-high">
              <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" :alt="movie.name" :src="imageOf(movie)" />
              <span v-if="ratingOf(movie)" class="mv-absolute mv-top-2 mv-left-2 d-inline-flex align-items-center mv-gap-0p5 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-backdrop-blur-sm mv-text-tertiary mv-font-label-sm mv-text-label-sm">
                <span class="material-symbols-outlined mv-text-3eb376" style="font-variation-settings: 'FILL' 1;">star</span> {{ ratingOf(movie) }}
              </span>
            </div>
            <div class="mv-p-space-sm mv-md-p-space-md d-flex flex-column mv-flex-1 justify-content-between">
              <div>
                <h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate mv-group-hover-text-primary mv-transition-colors">{{ movie.name }}</h3>
                <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant text-truncate">{{ genreLine(movie) || movie.language }}</p>
              </div>
              <div class="mt-3 mv-pt-space-xs d-flex align-items-center justify-content-between mv-gap-1">
                <span class="mv-font-label-sm mv-text-label-sm mv-text-outline">{{ yearOf(movie) }}</span>
                <span class="mv-px-3 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-font-label-md mv-text-label-md mv-font-bold">Watch</span>
              </div>
            </div>
          </a>
          </div>
          </div>
          <button type="button" data-row-next="latest" aria-label="Next blockbusters" class="row-slider-arrow row-slider-arrow-next">
            <span class="material-symbols-outlined">chevron_right</span>
          </button>
        </div>


      </section>
      <!-- 5. BINGE-WORTHY TV SERIES ROW -->
      <section class="mv-w-full mv-px-margin-mobile mv-md-px-margin-mobile mv-sm-px-margin mv-py-space-xl mv-bg-surface-container-lowest">
        <div class="mv-max-w-7xl mx-auto">
          <div class="d-flex align-items-end justify-content-between mb-4">
            <div>
              <div
                class="d-flex align-items-center mv-gap-space-xs mv-text-tertiary mv-font-label-md mv-text-label-md text-uppercase mv-tracking-wider mb-1">
                <span class="material-symbols-outlined mv-text-58f475">tv</span>
                Complete Season Bundles
              </div>
              <h2 class="mv-font-headline-lg-mobile mv-sm-font-headline-lg mv-text-headline-lg-mobile mv-sm-text-headline-lg mv-text-on-surface mv-tracking-tight">BINGE-WORTHY TV SERIES</h2>
            </div>
          </div>
          <p v-if="!shows.length" class="mv-text-on-surface-variant">No series to show yet.</p>
          <div v-else class="row-slider-wrap">
            <button type="button" data-row-prev="shows" aria-label="Previous series" class="row-slider-arrow row-slider-arrow-prev">
              <span class="material-symbols-outlined">chevron_left</span>
            </button>
            <div class="row-slider" data-row="shows">
            <div v-for="show in shows" :key="show.id" class="row-slide">
            <a :href="watchHref(show.id)" class="mv-group d-flex flex-column mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-md mv-hover-shadow-695ca5 mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1 text-decoration-none">
              <div class="mv-relative mv-aspect-fe4342 mv-sm-aspect-bc11a5 mv-w-full overflow-hidden mv-bg-surface-container-high">
                <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" :alt="show.name" :src="imageOf(show)" />
              </div>
              <div class="mv-p-space-md d-flex flex-column mv-flex-1 justify-content-between">
                <div>
                  <h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold mv-group-hover-text-primary mv-transition-colors">{{ show.name }}</h3>
                  <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">{{ genreLine(show) || show.language }}</p>
                </div>
                <div class="mt-3 mv-pt-space-xs">
                  <span class="d-block mv-w-full mv-py-2 mv-rounded-full mv-bg-surface-container-high mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-bold text-center">Explore Series</span>
                </div>
              </div>
            </a>
            </div>
            </div>
            <button type="button" data-row-next="shows" aria-label="Next series" class="row-slider-arrow row-slider-arrow-next">
              <span class="material-symbols-outlined">chevron_right</span>
            </button>
          </div>


        </div>
      </section>
      <!-- 6. WHY MOVIEHUB / FAST PAY-PER-VIEW PERKS -->
      <section class="mv-w-full mv-px-margin-mobile mv-md-px-margin-mobile mv-sm-px-margin mv-py-space-xl mv-max-w-7xl mx-auto">
        <div class="mv-p-space-lg mv-md-p-space-xl mv-rounded-2xl mv-bg-surface-container mv-relative overflow-hidden mv-shadow-xl">
          <!-- Glow ambient backdrop -->
          <div
            class="mv-absolute top-0 end-0 mv-w-80 mv-h-80 mv-bg-primary-container_10 mv-rounded-full mv-blur-3xl pe-none">
          </div>
          <div class="mv-max-w-2xl mv-mb-space-xl">
            <span class="mv-text-primary mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-font-bold">The Better Way to
              Watch</span>
            <h2 class="mv-font-headline-lg-mobile mv-sm-font-headline-lg mv-text-headline-lg-mobile mv-sm-text-headline-lg mv-text-on-surface mv-tracking-tight mt-1">
              Zero Monthly Commitments. Only Pay for What You Stream.
            </h2>
            <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant mt-2">
              MovieHub eliminates expensive recurring subscriptions. Rent any cinematic blockbuster starting at just Rs.
              50 and stream immediately across all your personal devices.
            </p>
          </div>
          <div class="d-grid mv-grid-cols-1 mv-md-grid-cols-2 mv-lg-grid-cols-4 mv-gap-space-lg">
            <!-- Feature 1 -->
            <div class="d-flex flex-column mv-gap-space-sm mv-p-space-md mv-rounded-xl mv-bg-surface-container-low">
              <div class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-primary-container_20 mv-text-primary d-flex align-items-center justify-content-center">
                <span class="material-symbols-outlined mv-text-2d3e81">high_quality</span>
              </div>
              <h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold">Ultra 4K &amp; Dolby Atmos</h3>
              <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
                Pristine master-bitrate streaming with spatial audio support designed for high-end home theater setups.
              </p>
            </div>
            <!-- Feature 2 -->
            <div class="d-flex flex-column mv-gap-space-sm mv-p-space-md mv-rounded-xl mv-bg-surface-container-low">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-secondary-container_20 mv-text-secondary d-flex align-items-center justify-content-center">
                <span class="material-symbols-outlined mv-text-2d3e81">schedule</span>
              </div>
              <h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold">48-Hour Rental Window</h3>
              <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
                Watch at your own leisure with unlimited re-watches and instant playback pause across mobile and
                desktop.
              </p>
            </div>
            <!-- Feature 3 -->
            <div class="d-flex flex-column mv-gap-space-sm mv-p-space-md mv-rounded-xl mv-bg-surface-container-low">
              <div class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-tertiary-container_20 mv-text-tertiary d-flex align-items-center justify-content-center">
                <span class="material-symbols-outlined mv-text-2d3e81">account_balance_wallet</span>
              </div>
              <h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold">Instant Local Top-Up</h3>
              <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
                Quick 1-click payments via EasyPaisa, JazzCash, UnionPay, Visa, and Mastercard with instantaneous
                balance updates.
              </p>
            </div>
            <!-- Feature 4 -->
            <div class="d-flex flex-column mv-gap-space-sm mv-p-space-md mv-rounded-xl mv-bg-surface-container-low">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-surface-variant_40 mv-text-primary-fixed-dim d-flex align-items-center justify-content-center">
                <span class="material-symbols-outlined mv-text-2d3e81">download_for_offline</span>
              </div>
              <h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold">Offline Downloads</h3>
              <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
                Download your purchased movies in 480p, 720p, or 1080p for offline travel viewing with secure local
                caching.
              </p>
            </div>
          </div>
          <!-- Quick Action Callout Strip -->
          <div
            class="mv-mt-space-xl mv-p-space-md mv-rounded-xl mv-bg-surface-container-high d-flex flex-column flex-sm-row align-items-sm-center justify-content-between mv-gap-space-md">
            <div class="d-flex align-items-center mv-gap-space-md">
              <div
                class="mv-w-10 mv-h-10 mv-rounded-full mv-bg-primary-container d-flex align-items-center justify-content-center flex-shrink-0">
                <span class="material-symbols-outlined mv-text-c28550">card_giftcard</span>
              </div>
              <div>
                <h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold">Ready to start streaming?</h4>
                <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Create an account in 30 seconds and receive
                  Rs. 50 bonus wallet credit.</p>
              </div>
            </div>
            <a class="d-inline-flex align-items-center justify-content-center mv-px-6 mv-py-2p5 mv-rounded-full mv-bg-primary-container mv-font-label-md mv-text-label-md mv-font-bold mv-hover-bg-secondary-container mv-transition-all mv-shadow-8f3b2a flex-shrink-0"
              href="/movie/1">
              Claim Free Movie
            </a>
          </div>
        </div>
      </section>
    </div>
  </main>
  
</template>

<script>
import { nextTick, onBeforeUnmount, onMounted, ref } from 'vue';
import { isLoggedIn } from '../auth';
import { bootPage } from '../runPageScript';

const externals = [
    'https://code.jquery.com/jquery-3.7.1.min.js',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
    '/moviehub-bootstrap/assets/banner-slider.js?v=2'
];

function unwrapList(payload) {
    if (Array.isArray(payload)) {
        if (payload.length === 1 && Array.isArray(payload[0])) {
            return payload[0];
        }
        return payload;
    }
    if (payload && Array.isArray(payload.data)) {
        return payload.data;
    }
    return [];
}

async function loadList(url) {
    const response = await fetch(url, { headers: { Accept: 'application/json' } });
    if (!response.ok) {
        return [];
    }
    return unwrapList(await response.json());
}

function genreLine(item) {
    return (item.genres || []).map((genre) => genre.name).filter(Boolean).join(' • ');
}

function yearOf(item) {
    return item.release_date ? String(item.release_date).slice(0, 4) : '';
}

function ratingOf(item) {
    const value = Number(item.imdb_rating);
    return Number.isFinite(value) && value > 0 ? value.toFixed(1) : '';
}

function imageOf(item) {
    return item.poster_image || '';
}

function backgroundStyle(item) {
    const image = imageOf(item);
    return image ? { backgroundImage: 'url("' + image + '")' } : {};
}

function watchHref(id) {
    const movie = '/movie/' + id;
    if (isLoggedIn()) {
        return movie;
    }
    return '/login?next=' + encodeURIComponent(movie);
}

function initRowSliders() {
    const $ = window.jQuery;
    if (!$ || !$.fn || !$.fn.slick) {
        return;
    }

    $('.row-slider').each(function () {
        const $slider = $(this);
        const count = $slider.children().length;
        if (!count) {
            return;
        }
        if ($slider.hasClass('slick-initialized')) {
            $slider.slick('unslick');
        }
        $slider.slick({
            slidesToShow: Math.min(5, count),
            slidesToScroll: 1,
            infinite: count > 5,
            arrows: false,
            dots: false,
            swipe: true,
            responsive: [
                { breakpoint: 1200, settings: { slidesToShow: Math.min(4, count) } },
                { breakpoint: 992, settings: { slidesToShow: Math.min(3, count) } },
                { breakpoint: 768, settings: { slidesToShow: Math.min(2, count) } },
                { breakpoint: 576, settings: { slidesToShow: 1 } },
            ],
        });
    });

    $(document).off('click.rowSlider').on('click.rowSlider', '[data-row-prev], [data-row-next]', function () {
        const previous = $(this).attr('data-row-prev');
        const next = $(this).attr('data-row-next');
        const row = previous || next;
        const $slider = $(`.row-slider[data-row="${row}"]`);
        if (!$slider.hasClass('slick-initialized')) {
            return;
        }
        $slider.slick(previous ? 'slickPrev' : 'slickNext');
    });
}

function destroyHeroSlider() {
    const $ = window.jQuery;
    const slider = document.querySelector('.hero-slider');
    if ($ && slider && $(slider).hasClass('slick-initialized')) {
        $(slider).slick('unslick');
    }
    if ($) {
        $('.row-slider.slick-initialized').slick('unslick');
        $(document).off('click.rowSlider');
    }
}

export default {
    name: 'BrowsePage',
    setup() {
        const banners = ref([]);
        const featured = ref([]);
        const latest = ref([]);
        const shows = ref([]);

        onMounted(async () => {
            const [bannerRows, featuredRows, latestRows, showRows] = await Promise.all([
                loadList('/api/banners'),
                loadList('/api/top-10-movies'),
                loadList('/api/latest-movies'),
                loadList('/api/papuler-tvshow'),
            ]);
            banners.value = bannerRows;
            featured.value = featuredRows;
            latest.value = latestRows;
            shows.value = showRows;
            await nextTick();
            await bootPage(externals, '');
            if (banners.value.length && typeof window.initHeroSlider === 'function') {
                window.initHeroSlider();
            }
            initRowSliders();
        });
        onBeforeUnmount(destroyHeroSlider);

        return { banners, featured, latest, shows, genreLine, yearOf, ratingOf, imageOf, backgroundStyle, watchHref };
    },
};
</script>
