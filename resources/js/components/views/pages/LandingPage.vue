<template>
<AppLayout>
  <main class="mv-w-full mv-pt-10 mv-bg-surface-container-lowest min-vh-100">
    <div class="d-flex flex-column mv-w-full">
      <!-- Immersive Cinematic Hero Showcase (Bleeds under shell header) -->
      <section class="landing-hero mv-relative mv-w-full mv-nmt-16 overflow-hidden mv-bg-surface-container-lowest">
        <!-- Atmospheric Ambient Glows -->
        <div
          class="mv-absolute mv-ntop-24 mv-nleft-20 mv-w-3bc5a2 mv-h-2f12cf mv-rounded-full mv-bg-primary_10 mv-blur-a6575e pe-none">
        </div>
        <div
          class="mv-absolute mv-top-1_3 mv-nright-24 mv-w-ee879d mv-h-f7c4b3 mv-rounded-full mv-bg-secondary-container_15 mv-blur-16d7a4 pe-none">
        </div>
        <div v-if="bannerMovies.length" class="landing-hero-slides">
          <article
            v-for="(movie, index) in bannerMovies"
            v-show="activeBannerIndex === index"
            :key="movie.id"
            class="landing-hero-slide mv-relative mv-w-full mv-min-h-2a5f5a mv-sm-min-h-e4206d d-flex align-items-end"
            :aria-hidden="activeBannerIndex !== index"
          >
            <div class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center"
              :style="bannerBackground(movie)"
              role="img"
              :aria-label="movie.name"></div>
            <div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_70 mv-to-surface-container-lowest_30"></div>
            <div class="mv-absolute mv-inset-0 mv-bg-gradient-to-r mv-from-surface-container-lowest mv-via-surface-container-lowest_80 mv-to-transparent"></div>
            <div class="mv-relative mv-z-10 mv-w-full mv-px-margin-mobile mv-sm-px-margin-mobile mv-sm-px-margin mv-pt-36 mv-pb-space-xl mv-max-w-5xl d-flex flex-column mv-gap-space-md">
              <div class="d-flex flex-wrap align-items-center mv-gap-space-sm">
                <span class="mv-px-2p5 mv-py-1 mv-rounded-sm mv-bg-primary-container_20 mv-text-primary mv-font-label-sm mv-text-label-sm mv-tracking-widest text-uppercase mv-font-bold mv-backdrop-blur-md">
                  Featured TVOD Premiere
                </span>
                <span class="mv-px-2p5 mv-py-1 mv-rounded-sm mv-bg-surface-container-high_90 mv-text-on-surface mv-font-label-sm mv-text-label-sm text-uppercase mv-font-semibold">
                  Ultra HD 4K
                </span>
                <span v-if="movie.imdb_rating" class="mv-px-2 mv-py-1 mv-rounded-sm mv-bg-surface-container-high_60 mv-text-tertiary mv-font-label-sm mv-text-label-sm text-uppercase mv-font-semibold d-flex align-items-center mv-gap-1">
                  <span class="material-symbols-outlined mv-text-0ddd99" style="font-variation-settings: 'FILL' 1;">star</span>
                  {{ movie.imdb_rating }} IMDb
                </span>
              </div>
              <div class="d-flex flex-column">
                <h1 class="mv-font-headline-xl-mobile mv-text-headline-xl-mobile mv-sm-font-headline-xl-mobile mv-sm-font-headline-xl mv-sm-text-headline-xl-mobile mv-sm-text-headline-xl mv-lg-text-50dd1f mv-lg-leading-1e4af5 mv-font-extrabold mv-tracking-tight mv-text-on-surface text-uppercase mv-drop-shadow-2xl mv-max-w-3xl">
                  {{ movie.name }}
                </h1>
                <div class="d-flex flex-wrap align-items-center mv-gap-space-sm mv-text-on-surface-variant mv-font-label-lg mv-text-label-lg mt-1">
                  <template v-for="(genre, genreIndex) in movie.genres || []" :key="genre.id || genre.name || genreIndex">
                    <span v-if="genreIndex" aria-hidden="true">•</span>
                    <span class="mv-text-on-surface mv-font-medium">{{ typeof genre === 'string' ? genre : genre.name }}</span>
                  </template>
                  <span v-if="movieYear(movie)" class="mv-text-outline">|</span>
                  <span v-if="movieYear(movie)">{{ movieYear(movie) }}</span>
                  <span v-if="movie.duration" class="mv-text-outline">|</span>
                  <span v-if="movie.duration">{{ movie.duration }}</span>
                  <span class="mv-text-outline">|</span>
                  <span class="mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-high mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant">HDR10+</span>
                </div>
              </div>
              <p class="mv-font-body-lg mv-text-body-lg mv-text-on-surface-variant mv-max-w-2xl mv-line-clamp-2 mv-leading-relaxed">
                {{ movie.description }}
              </p>
              <div class="d-flex flex-wrap align-items-center mv-gap-space-lg mv-pt-space-xs">
                <div class="d-flex align-items-baseline mv-gap-1p5 mv-px-space-md mv-py-2 mv-rounded-lg mv-bg-surface-container-high_80 mv-backdrop-blur-md mv-shadow-lg">
                  <span class="mv-font-label-sm mv-text-label-sm mv-text-outline text-uppercase mv-tracking-wider">Rental</span>
                  <span class="mv-font-headline-md mv-text-headline-md mv-font-extrabold mv-text-on-surface mv-tracking-tight">Rs. 50</span>
                </div>
                <button
                  class="mv-group mv-px-space-xl mv-py-3p5 mv-rounded-full mv-bg-primary-container mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold d-flex align-items-center mv-gap-space-sm mv-shadow-391fe7 mv-hover-bg-primary mv-hover-shadow-75ac0d mv-hover-scale-5637fb mv-active-scale-443bba mv-transition-all"
                  type="button"
                  @click="goToMovie(movie)">
                  <span class="material-symbols-outlined mv-text-27bd7e mv-group-hover-translate-x-0p5 mv-transition-transform" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
                  <span>Buy Now</span>
                </button>
                <button
                  v-if="movie.trailer_url"
                  class="mv-px-space-lg mv-py-3p5 mv-rounded-full mv-bg-surface-container-high_60 mv-hover-bg-surface-container mv-text-on-surface mv-font-label-lg mv-text-label-lg mv-font-semibold d-flex align-items-center mv-gap-space-sm mv-transition-colors"
                  type="button"
                  @click="playTrailer(movie)">
                  <span class="material-symbols-outlined mv-text-27bd7e">movie</span>
                  <span>Trailer</span>
                </button>
                <button aria-label="Add to Watchlist"
                  class="mv-w-12 mv-h-12 mv-rounded-full mv-bg-surface-container-high_60 mv-hover-bg-surface-container mv-text-on-surface d-flex align-items-center justify-content-center mv-transition-colors"
                  type="button">
                  <span class="material-symbols-outlined mv-text-c28550">bookmark_add</span>
                </button>
              </div>
            </div>
          </article>
          <div v-if="bannerMovies.length > 1" class="landing-hero-controls mv-absolute mv-inset-x-0 mv-bottom-6 mv-z-20 mv-px-margin-mobile mv-sm-px-margin-mobile mv-sm-px-margin">
            <div class="mx-auto d-flex align-items-center justify-content-between mv-max-w-5xl mv-gap-space-md">
              <div class="d-flex align-items-center mv-gap-space-sm">
                <span class="mv-font-label-sm mv-text-label-sm mv-text-outline text-uppercase mv-tracking-widest">Featured Movies</span>
                <div class="d-flex align-items-center mv-gap-2" role="group" aria-label="Choose featured movie">
                  <button
                    v-for="(movie, index) in bannerMovies"
                    :key="`landing-banner-${movie.id}`"
                    type="button"
                    class="landing-hero-dot"
                    :class="{ 'is-active': activeBannerIndex === index }"
                    :aria-label="`Show featured movie ${index + 1}`"
                    :aria-current="activeBannerIndex === index ? 'true' : null"
                    @click="showBanner(index)"
                  ></button>
                </div>
              </div>
              <div class="d-flex align-items-center mv-gap-2">
                <button type="button" aria-label="Previous featured movie" @click="showPreviousBanner"
                  class="d-flex mv-w-9 mv-h-9 align-items-center justify-content-center mv-rounded-full mv-bg-surface-container-high mv-text-on-surface mv-transition-colors mv-hover-bg-primary-container">
                  <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <button type="button" aria-label="Next featured movie" @click="showNextBanner"
                  class="d-flex mv-w-9 mv-h-9 align-items-center justify-content-center mv-rounded-full mv-bg-surface-container-high mv-text-on-surface mv-transition-colors mv-hover-bg-primary-container">
                  <span class="material-symbols-outlined">chevron_right</span>
                </button>
              </div>
            </div>
          </div>
        </div>
        <p v-else-if="!isLoadingBanners" class="mv-relative mv-z-10 mv-px-margin-mobile mv-py-space-xl mv-text-on-surface-variant">
          No featured movies available.
        </p>
      </section>
      <!-- Content Workspace -->
      <div class="mv-w-full mv-px-margin-mobile mv-sm-px-margin-mobile mv-sm-px-margin d-flex flex-column mv-gap-space-lg mv-sm-gap-space-xl mv-py-space-xl">
        <!-- SECTION 2: Categories / Genres Section (Screen 1 Category Pill Row) -->
        <section class="d-flex flex-column mv-gap-space-lg">
          <div class="d-flex flex-column align-items-start mv-gap-space-sm flex-sm-row align-items-sm-end justify-content-sm-between">
            <div class="d-flex flex-column mv-gap-space-xs">
              <span class="mv-font-label-sm mv-text-label-sm mv-text-secondary text-uppercase mv-font-bold mv-tracking-widest">Explore
                Catalog</span>
              <h2 class="mv-font-headline-lg-mobile mv-text-headline-lg-mobile mv-sm-font-headline-lg-mobile mv-sm-font-headline-lg mv-sm-text-headline-lg-mobile mv-sm-text-headline-lg mv-font-bold mv-text-on-surface mv-tracking-tight">Categories</h2>
            </div>
            <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant d-none d-sm-inline-block">8 Curated
              Genres</span>
          </div>
          <!-- 8 Stylized Category Cards with Vivid Color-coded Badges -->
          <div class="d-grid mv-grid-cols-2 mv-sm-grid-cols-4 mv-lg-grid-cols-8 mv-gap-space-md">
            <!-- 1. Bollywood -->
            <button
              class="mv-group d-flex flex-column align-items-center justify-content-center mv-p-space-md mv-rounded-xl mv-bg-surface-container-low mv-hover-bg-surface-container mv-border-0 mv-hover-ntranslate-y-1 mv-transition-all mv-shadow-sm"
              type="button">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-full mv-bg-error-container_40 d-flex align-items-center justify-content-center mv-text-error mv-group-hover-scale-110 mv-group-hover-bg-error-container mv-transition-all mb-2 mv-shadow-442b24">
                <span class="material-symbols-outlined mv-text-59700f"
                  style="font-variation-settings: 'FILL' 1;">star</span>
              </div>
              <span
                class="mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors">Bollywood</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">340+ titles</span>
            </button>
            <!-- 2. Hollywood -->
            <button
              class="mv-group d-flex flex-column align-items-center justify-content-center mv-p-space-md mv-rounded-xl mv-bg-surface-container-low mv-hover-bg-surface-container mv-border-0 mv-hover-ntranslate-y-1 mv-transition-all mv-shadow-sm"
              type="button">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-full mv-bg-primary-container_30 d-flex align-items-center justify-content-center mv-text-primary mv-group-hover-scale-110 mv-group-hover-bg-primary-container_50 mv-transition-all mb-2 mv-shadow-cebb15">
                <span class="material-symbols-outlined mv-text-59700f">movie</span>
              </div>
              <span
                class="mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors">Hollywood</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">820+ titles</span>
            </button>
            <!-- 3. South -->
            <button
              class="mv-group d-flex flex-column align-items-center justify-content-center mv-p-space-md mv-rounded-xl mv-bg-surface-container-low mv-hover-bg-surface-container mv-border-0 mv-hover-ntranslate-y-1 mv-transition-all mv-shadow-sm"
              type="button">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-full mv-bg-secondary-container_30 d-flex align-items-center justify-content-center mv-text-secondary mv-group-hover-scale-110 mv-group-hover-bg-secondary-container_50 mv-transition-all mb-2 mv-shadow-a32055">
                <span class="material-symbols-outlined mv-text-59700f">theaters</span>
              </div>
              <span
                class="mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors">South</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">190+ titles</span>
            </button>
            <!-- 4. Punjabi -->
            <button
              class="mv-group d-flex flex-column align-items-center justify-content-center mv-p-space-md mv-rounded-xl mv-bg-surface-container-low mv-hover-bg-surface-container mv-border-0 mv-hover-ntranslate-y-1 mv-transition-all mv-shadow-sm"
              type="button">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-full mv-bg-surface-container-highest d-flex align-items-center justify-content-center mv-text-primary-fixed mv-group-hover-scale-110 mv-group-hover-bg-surface-bright mv-transition-all mb-2 mv-shadow-1147ed">
                <span class="material-symbols-outlined mv-text-59700f">music_video</span>
              </div>
              <span
                class="mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors">Punjabi</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">75+ titles</span>
            </button>
            <!-- 5. Action -->
            <button
              class="mv-group d-flex flex-column align-items-center justify-content-center mv-p-space-md mv-rounded-xl mv-bg-surface-container-low mv-hover-bg-surface-container mv-border-0 mv-hover-ntranslate-y-1 mv-transition-all mv-shadow-sm"
              type="button">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-full mv-bg-primary-container_40 d-flex align-items-center justify-content-center mv-text-primary mv-group-hover-scale-110 mv-group-hover-bg-primary-container mv-transition-all mb-2 mv-shadow-e55f09">
                <span class="material-symbols-outlined mv-text-59700f"
                  style="font-variation-settings: 'FILL' 1;">local_fire_department</span>
              </div>
              <span
                class="mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors">Action</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">510+ titles</span>
            </button>
            <!-- 6. Comedy -->
            <button
              class="mv-group d-flex flex-column align-items-center justify-content-center mv-p-space-md mv-rounded-xl mv-bg-surface-container-low mv-hover-bg-surface-container mv-border-0 mv-hover-ntranslate-y-1 mv-transition-all mv-shadow-sm"
              type="button">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-full mv-bg-tertiary-container_30 d-flex align-items-center justify-content-center mv-text-tertiary mv-group-hover-scale-110 mv-group-hover-bg-tertiary-container_50 mv-transition-all mb-2 mv-shadow-7c68e7">
                <span class="material-symbols-outlined mv-text-59700f"
                  style="font-variation-settings: 'FILL' 1;">sentiment_very_satisfied</span>
              </div>
              <span
                class="mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors">Comedy</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">260+ titles</span>
            </button>
            <!-- 7. Thriller -->
            <button
              class="mv-group d-flex flex-column align-items-center justify-content-center mv-p-space-md mv-rounded-xl mv-bg-surface-container-low mv-hover-bg-surface-container mv-border-0 mv-hover-ntranslate-y-1 mv-transition-all mv-shadow-sm"
              type="button">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-full mv-bg-secondary-container_40 d-flex align-items-center justify-content-center mv-text-secondary mv-group-hover-scale-110 mv-group-hover-bg-secondary-container mv-transition-all mb-2 mv-shadow-9b2bb9">
                <span class="material-symbols-outlined mv-text-59700f"
                  style="font-variation-settings: 'FILL' 1;">bolt</span>
              </div>
              <span
                class="mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors">Thriller</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">310+ titles</span>
            </button>
            <!-- 8. Horror -->
            <button
              class="mv-group d-flex flex-column align-items-center justify-content-center mv-p-space-md mv-rounded-xl mv-bg-surface-container-low mv-hover-bg-surface-container mv-border-0 mv-hover-ntranslate-y-1 mv-transition-all mv-shadow-sm"
              type="button">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-full mv-bg-error-container_60 d-flex align-items-center justify-content-center mv-text-error mv-group-hover-scale-110 mv-group-hover-bg-error-container mv-transition-all mb-2 mv-shadow-ee3973">
                <span class="material-symbols-outlined mv-text-59700f">skull</span>
              </div>
              <span
                class="mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors">Horror</span>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline mv-mt-0p5">140+ titles</span>
            </button>
          </div>
        </section>

        <!-- SECTION 1: Featured Movies Rail -->
        <section class="d-flex flex-column mv-gap-space-lg">
          <!-- Section Header -->
          <div class="d-flex flex-column align-items-start mv-gap-space-sm flex-sm-row align-items-sm-end justify-content-sm-between">
            <div class="d-flex flex-column mv-gap-space-xs">
              <div class="d-flex align-items-center mv-gap-2">
                <span class="mv-w-2p5 mv-h-2p5 mv-rounded-full mv-bg-primary mv-shadow-d4d852"></span>
                <span class="mv-font-label-sm mv-text-label-sm mv-text-primary text-uppercase mv-font-bold mv-tracking-widest">Pay-Per-View
                  Cinema</span>
              </div>
              <h2 class="mv-font-headline-lg-mobile mv-text-headline-lg-mobile mv-sm-font-headline-lg-mobile mv-sm-font-headline-lg mv-sm-text-headline-lg-mobile mv-sm-text-headline-lg mv-font-bold mv-text-on-surface mv-tracking-tight">Featured Movies
              </h2>
            </div>
            <a class="mv-group d-flex align-items-center mv-gap-1 mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-primary mv-hover-text-on-surface mv-transition-colors"
              href="/movies">
              <span>View All</span>
              <span
                class="material-symbols-outlined mv-text-c79a76 mv-group-hover-translate-x-1 mv-transition-transform">arrow_forward</span>
            </a>
          </div>
          <!-- Responsive Grid of 6 Poster Cards matching Screen 1 -->
          <div class="d-grid mv-grid-cols-2 mv-sm-grid-cols-3 mv-md-grid-cols-4 mv-lg-grid-cols-6 mv-gap-gutter-mobile mv-sm-gap-gutter">
            <!-- CARD 1: John Wick 4 -->
            <div
              class="mv-group d-flex flex-column mv-bg-surface-container-low mv-rounded-xl overflow-hidden mv-hover-bg-surface-container mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-shadow-md mv-hover-shadow-474bee">
              <div class="mv-relative mv-aspect-bc11a5 mv-w-full overflow-hidden mv-bg-surface-container-high">
                <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                  data-alt="Movie poster for John Wick 4 featuring close-up stylized headshot of Keanu Reeves in rain with saturated neon cyan and ruby red lighting, slick assassin look."
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuAPxpreFgltT-meiL5RKKzr3UAUaDZjJJJUZeFYUrgq4azbFrFXrvong96-k2aMnkoO82H3XhZL04h8Qe4pfMgeGQwDhaBVUzuXARfd-BI5pApUSv7VdWfyvkwbfnfE2IqpOja-D8xPeFS6UJ-AwasWnMtM1_QxLp1sgSRvH19Wys_KzANI3SpR3VrEVNyvmXK9DHDprNf4yT9MaqI1x9_5VacdajXbKVqMMxqZ_12g-meltJ9JbA3VRQ" />
                <span
                  class="mv-absolute mv-top-2 mv-right-2 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-backdrop-blur mv-text-primary mv-font-label-sm mv-text-label-sm mv-font-bold">4K</span>
                <div
                  class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-low mv-via-transparent mv-to-transparent mv-opacity-80">
                </div>
              </div>
              <div class="mv-p-space-sm d-flex flex-column mv-flex-1 justify-content-between mv-gap-space-sm">
                <div>
                  <h3
                    class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate mv-group-hover-text-primary mv-transition-colors">
                    John Wick 4</h3>
                  <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant text-truncate">Action • Thriller</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mv-pt-space-xs">
                  <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Rs. 50</span>
                  <button
                    class="mv-px-3 mv-py-1 mv-rounded-full mv-bg-primary-container mv-text-white mv-font-label-sm mv-text-label-sm mv-font-bold mv-hover-bg-primary mv-transition-colors mv-shadow-sm"
                    onclick="handlePurchase('John Wick 4', 50)" type="button">
                    Buy Now
                  </button>
                </div>
              </div>
            </div>
            <!-- CARD 2: Fast X -->
            <div
              class="mv-group d-flex flex-column mv-bg-surface-container-low mv-rounded-xl overflow-hidden mv-hover-bg-surface-container mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-shadow-md mv-hover-shadow-474bee">
              <div class="mv-relative mv-aspect-bc11a5 mv-w-full overflow-hidden mv-bg-surface-container-high">
                <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                  data-alt="Dramatic theatrical poster for Fast X with muscle cars drifting against glowing twilight skyline, exploding asphalt sparks, vibrant blue and amber neon aesthetic."
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuANaBZWgcRNZy-t2d3RzunAjTpuo7Ejm3GAZGfMdmuyUNwBQJnVC9WcqYngdKqZTJTC61hLJ1b8C9IVQjWJRV9RX-t6wEyPsPy1LAs_vqV3iL5Iukv1uW_1Psype4u8YZFUJNdsN5CYt57RRnZW4UgD9vfItssa6ecAwS8HbvehrnWFIZy72sT0mI-hHWv_oDJnqh1tx1uQcuKoM5N6-D_gkjEnnOewheyUUmuGmuClPdRlaYkgUBfnZw" />
                <span
                  class="mv-absolute mv-top-2 mv-right-2 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-backdrop-blur mv-text-secondary mv-font-label-sm mv-text-label-sm mv-font-bold">4K</span>
                <div
                  class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-low mv-via-transparent mv-to-transparent mv-opacity-80">
                </div>
              </div>
              <div class="mv-p-space-sm d-flex flex-column mv-flex-1 justify-content-between mv-gap-space-sm">
                <div>
                  <h3
                    class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate mv-group-hover-text-primary mv-transition-colors">
                    Fast X</h3>
                  <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant text-truncate">Action • Racing</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mv-pt-space-xs">
                  <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Rs. 50</span>
                  <button
                    class="mv-px-3 mv-py-1 mv-rounded-full mv-bg-primary-container mv-text-white mv-font-label-sm mv-text-label-sm mv-font-bold mv-hover-bg-primary mv-transition-colors mv-shadow-sm"
                    onclick="handlePurchase('Fast X', 50)" type="button">
                    Buy Now
                  </button>
                </div>
              </div>
            </div>
            <!-- CARD 3: Oppenheimer -->
            <div
              class="mv-group d-flex flex-column mv-bg-surface-container-low mv-rounded-xl overflow-hidden mv-hover-bg-surface-container mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-shadow-md mv-hover-shadow-474bee">
              <div class="mv-relative mv-aspect-bc11a5 mv-w-full overflow-hidden mv-bg-surface-container-high">
                <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                  data-alt="Theatrical portrait poster of Oppenheimer in fedora hat facing glowing fiery atomic particle explosion, intensely cinematic burnt-orange and deep black tones."
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuAP3fQEVJ024FqUquUbYCEvQAvEvrP943DQU-HUDMgkZLx0LXLC28ZPBq4i75IDBCJMfQvxKeuMqzn057D3rflMFCD4D-d4HJ-F5UgaM3kTMz5DsLKRzTQvxl6DaRkDLi562s_kRTGDVOYeasZR71e9gGGDHSDnv2akNDbiG_QJe0jPPUeOeE48qNpPJBzQUeSM6fz3EKroHK_5OvAF6Arm58zco2sc9lvcguSrgA3NPLTOmCwB_Nm1pQ" />
                <span
                  class="mv-absolute mv-top-2 mv-right-2 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-backdrop-blur mv-text-primary mv-font-label-sm mv-text-label-sm mv-font-bold">IMAX</span>
                <div
                  class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-low mv-via-transparent mv-to-transparent mv-opacity-80">
                </div>
              </div>
              <div class="mv-p-space-sm d-flex flex-column mv-flex-1 justify-content-between mv-gap-space-sm">
                <div>
                  <h3
                    class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate mv-group-hover-text-primary mv-transition-colors">
                    Oppenheimer</h3>
                  <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant text-truncate">Drama • Biography</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mv-pt-space-xs">
                  <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Rs. 50</span>
                  <button
                    class="mv-px-3 mv-py-1 mv-rounded-full mv-bg-primary-container mv-text-white mv-font-label-sm mv-text-label-sm mv-font-bold mv-hover-bg-primary mv-transition-colors mv-shadow-sm"
                    onclick="handlePurchase('Oppenheimer', 50)" type="button">
                    Buy Now
                  </button>
                </div>
              </div>
            </div>
            <!-- CARD 4: The Batman -->
            <div
              class="mv-group d-flex flex-column mv-bg-surface-container-low mv-rounded-xl overflow-hidden mv-hover-bg-surface-container mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-shadow-md mv-hover-shadow-474bee">
              <div class="mv-relative mv-aspect-bc11a5 mv-w-full overflow-hidden mv-bg-surface-container-high">
                <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                  data-alt="Atmospheric movie poster for The Batman in rain-slicked dark Gotham alley, high contrast crimson red flare illumination and silhouette cowl."
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuBF4bh6CIibQxcDi5SAHXYK_lGw26iWWWBEsptEfoQ1wdwymzfknaKWWBiWYMLi5RuWdODQzngmv4chxmqDIy8jFl49ls-D65ZNWJCBVbbJB84i6fRAtnMxPigqQ2csBN55tqVEgBkSyNWKahkCpiWjip_RQi5vEbDA6NKFEZ4y9gHrm8C7_vgtQOb9Tur00Tp6oZu_gKK0OOiDU05x2tcifXRIw-Mob-V9UYFSbdnXm8d2BmwffVIp1A" />
                <span
                  class="mv-absolute mv-top-2 mv-right-2 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-backdrop-blur mv-text-primary mv-font-label-sm mv-text-label-sm mv-font-bold">4K</span>
                <div
                  class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-low mv-via-transparent mv-to-transparent mv-opacity-80">
                </div>
              </div>
              <div class="mv-p-space-sm d-flex flex-column mv-flex-1 justify-content-between mv-gap-space-sm">
                <div>
                  <h3
                    class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate mv-group-hover-text-primary mv-transition-colors">
                    The Batman</h3>
                  <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant text-truncate">Action • Crime</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mv-pt-space-xs">
                  <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Rs. 50</span>
                  <button
                    class="mv-px-3 mv-py-1 mv-rounded-full mv-bg-primary-container mv-text-white mv-font-label-sm mv-text-label-sm mv-font-bold mv-hover-bg-primary mv-transition-colors mv-shadow-sm"
                    onclick="handlePurchase('The Batman', 50)" type="button">
                    Buy Now
                  </button>
                </div>
              </div>
            </div>
            <!-- CARD 5: Spider-Man -->
            <div
              class="mv-group d-flex flex-column mv-bg-surface-container-low mv-rounded-xl overflow-hidden mv-hover-bg-surface-container mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-shadow-md mv-hover-shadow-474bee">
              <div class="mv-relative mv-aspect-bc11a5 mv-w-full overflow-hidden mv-bg-surface-container-high">
                <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                  data-alt="Stylized animated film poster of Spider-Man falling through neon multiverse vortex portal with vibrant electric magenta and cyan comic halftone textures."
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuBb1GZbZRXbhUobUyQRj5jqdk8RoBFeRE_SB2xc-ftjWDjCkUT2qDX3y9dHKOiUSfegNqmBeL3QBnK4Mrx9TbTY5XtDI8In5FX_25xJ9fEp6plFeYWJljIEwHjR-GYwVgFD9pJb0986dQlO9edUFxMP3uOCUH8eb8LzpaKq7IFsXVROfmGFkDhTVgOPRVqLESgUh7Szeb6Gx9b4FAWvVCRPR3SKYkFAEqcWGVzBRlIa_kRDfUQXSg6QTA" />
                <span
                  class="mv-absolute mv-top-2 mv-right-2 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-backdrop-blur mv-text-secondary mv-font-label-sm mv-text-label-sm mv-font-bold">HDR</span>
                <div
                  class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-low mv-via-transparent mv-to-transparent mv-opacity-80">
                </div>
              </div>
              <div class="mv-p-space-sm d-flex flex-column mv-flex-1 justify-content-between mv-gap-space-sm">
                <div>
                  <h3
                    class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate mv-group-hover-text-primary mv-transition-colors">
                    Spider-Man</h3>
                  <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant text-truncate">Animation • Sci-Fi</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mv-pt-space-xs">
                  <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Rs. 50</span>
                  <button
                    class="mv-px-3 mv-py-1 mv-rounded-full mv-bg-primary-container mv-text-white mv-font-label-sm mv-text-label-sm mv-font-bold mv-hover-bg-primary mv-transition-colors mv-shadow-sm"
                    onclick="handlePurchase('Spider-Man: Across the Spider-Verse', 50)" type="button">
                    Buy Now
                  </button>
                </div>
              </div>
            </div>
            <!-- CARD 6: Dune Part Two -->
            <div
              class="mv-group d-flex flex-column mv-bg-surface-container-low mv-rounded-xl overflow-hidden mv-hover-bg-surface-container mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-shadow-md mv-hover-shadow-474bee">
              <div class="mv-relative mv-aspect-bc11a5 mv-w-full overflow-hidden mv-bg-surface-container-high">
                <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                  data-alt="Epic sci-fi theatrical poster for Dune featuring Paul Atreides and Chani on vast desert sand dunes under blazing twin suns with warm golden cinematic glow."
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuDGckYlVlJzgkK8LfhnPj4-Rwuyi_Hg5JQrD_QPdMjOuSiMuZG3cs1RMGFFvgvGxhbkyY7aKuixMnOgXJ5Xpk1qhxM5Io0aaZiXBVtFK5mNHZ8MhjCmwmemXM2D8Aiyq0fjpjDGu-IDNM3v2_JIVfbF3OuWu71iSqqH0auF0awRavbPxKPm0UJvMbG1IMyMM2oj6COMPDcSo44iCogljgdJokTnOYr4yrx4R4NRvrW_bidyu_VstGN2wg" />
                <span
                  class="mv-absolute mv-top-2 mv-right-2 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-backdrop-blur mv-text-primary mv-font-label-sm mv-text-label-sm mv-font-bold">4K</span>
                <div
                  class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-low mv-via-transparent mv-to-transparent mv-opacity-80">
                </div>
              </div>
              <div class="mv-p-space-sm d-flex flex-column mv-flex-1 justify-content-between mv-gap-space-sm">
                <div>
                  <h3
                    class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate mv-group-hover-text-primary mv-transition-colors">
                    Dune: Part Two</h3>
                  <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant text-truncate">Sci-Fi • Adventure</p>
                </div>
                <div class="d-flex align-items-center justify-content-between mv-pt-space-xs">
                  <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Rs. 50</span>
                  <button
                    class="mv-px-3 mv-py-1 mv-rounded-full mv-bg-primary-container mv-text-white mv-font-label-sm mv-text-label-sm mv-font-bold mv-hover-bg-primary mv-transition-colors mv-shadow-sm"
                    onclick="handlePurchase('Dune: Part Two', 50)" type="button">
                    Buy Now
                  </button>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- SECTION 3: Trending Rentals & Live Fast-Check Banner -->
        <section class="d-grid mv-grid-cols-1 mv-lg-grid-cols-3 mv-gap-gutter-mobile mv-sm-gap-gutter align-items-stretch">
          <!-- Top 10 Streaming TVOD Callout (2 Cols) -->
          <div
            class="mv-lg-col-span-2 mv-p-space-lg mv-rounded-2xl mv-bg-surface-container-low d-flex flex-column justify-content-between mv-gap-space-md mv-relative overflow-hidden mv-shadow-lg">
            <div class="d-flex align-items-center justify-content-between mv-z-10">
              <div class="d-flex align-items-center mv-gap-space-sm">
                <div
                  class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-tertiary-container d-flex align-items-center justify-content-center mv-text-on-tertiary-container">
                  <span class="material-symbols-outlined mv-text-27bd7e"
                    style="font-variation-settings: 'FILL' 1;">trending_up</span>
                </div>
                <h3 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Trending Rentals Today</h3>
              </div>
              <span
                class="mv-px-2p5 mv-py-1 mv-rounded-full mv-bg-surface-container mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-semibold d-flex align-items-center mv-gap-1">
                <span class="mv-w-1p5 mv-h-1p5 mv-rounded-full mv-bg-tertiary mv-animate-pulse"></span> Live 24h Rank
              </span>
            </div>
            <!-- Mini list of trending rentals -->
            <div class="d-grid mv-grid-cols-1 mv-md-grid-cols-2 mv-gap-space-md mv-z-10">
              <div
                class="d-flex align-items-center mv-gap-space-md mv-p-space-sm mv-rounded-xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-colors">
                <span class="mv-font-headline-md mv-text-headline-md mv-font-extrabold mv-text-outline_40 mv-w-6 text-center">01</span>
                <div class="mv-w-12 mv-h-16 mv-rounded-md mv-bg-surface-container-highest overflow-hidden flex-shrink-0">
                  <img class="mv-w-full h-100 mv-object-cover" data-alt="Dark moody thumbnail for John Wick 4 movie card"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuB118x45sRwou-ys3HGHwl-4XW8gsDcRCVC59ngTWb-rhXnQO1gdT51W99GLW8tGivznLFUeqpRYYMB-uVS5S0-p1n_eQOqbb5e1LWH4Sd-g3nWObeAsc4pxqQ3xt0KUKpuH7DNxJREpUM7IHdQS_3w9U5AlDUSFUvVqK6uRZ1zQ3-eqWVWOIpDTx1yBM7-z-MgBFAa9YVw90vnZCrWaHZ_3PUEc8ugrnP_THunPxypI7AMPN_MfhXpKA" />
                </div>
                <div class="d-flex flex-column mv-flex-1 mv-min-w-0">
                  <span class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate">John Wick 4</span>
                  <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">1,420 rentals today</span>
                </div>
                <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-primary">Rs. 50</span>
              </div>
              <div
                class="d-flex align-items-center mv-gap-space-md mv-p-space-sm mv-rounded-xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-colors">
                <span class="mv-font-headline-md mv-text-headline-md mv-font-extrabold mv-text-outline_40 mv-w-6 text-center">02</span>
                <div class="mv-w-12 mv-h-16 mv-rounded-md mv-bg-surface-container-highest overflow-hidden flex-shrink-0">
                  <img class="mv-w-full h-100 mv-object-cover"
                    data-alt="Theatrical portrait of Oppenheimer in fedora with warm nuclear flame background"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAb3GTLEfV9rNSxR5bFBhMQ1y3TVMc7u4wi3WKbt2pTE3NkJUUVRHsL98D_dHXWD2WbxyNu90LuPoFHIIdMkKlRAwWT1cFu6QFhyNBoD-2aJI0kuMyXNIor7hoXLMJ7U5AbIoI3LScNR8C3SIeNvEFssJaU_-qPEQxXjB98eO9XPMrKTD0bmO0SMEh_K2qne2FC7NqKFzVUY-zQ6sGJmdPcRTokSqlskZ2DZIIKHXPgW76e1wVoxfPLPw" />
                </div>
                <div class="d-flex flex-column mv-flex-1 mv-min-w-0">
                  <span class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate">Oppenheimer</span>
                  <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">980 rentals today</span>
                </div>
                <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-primary">Rs. 50</span>
              </div>
            </div>
            <!-- Subtext Info -->
            <div
              class="d-flex align-items-center justify-content-between mv-pt-space-xs mv-text-on-surface-variant mv-font-body-sm mv-text-body-sm mv-z-10">
              <span>Rentals valid for 48 hours once playback commences • Unlimited rewatches</span>
              <a class="mv-text-secondary mv-font-label-md mv-text-label-md mv-font-bold mv-hover-underline" href="#">View Top 50 →</a>
            </div>
          </div>
          <!-- Wallet Quick Top-Up & Promo Card (1 Col) -->
          <div
            class="mv-p-space-lg mv-rounded-2xl mv-bg-gradient-to-br mv-from-surface-container-low mv-via-surface-container mv-to-surface-container-low d-flex flex-column justify-content-between mv-gap-space-md mv-shadow-lg">
            <div class="d-flex align-items-start justify-content-between">
              <div class="d-flex flex-column">
                <span class="mv-font-label-sm mv-text-label-sm mv-text-tertiary mv-font-bold text-uppercase mv-tracking-wider">Fast TVOD
                  Checkout</span>
                <h3 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface mt-1">Wallet Balance</h3>
              </div>
              <div class="mv-w-10 mv-h-10 mv-rounded-xl mv-bg-tertiary-container_30 mv-text-tertiary d-flex align-items-center justify-content-center">
                <span class="material-symbols-outlined mv-text-59700f">account_balance_wallet</span>
              </div>
            </div>
            <div class="d-flex flex-column mv-gap-1">
              <div class="d-flex align-items-baseline mv-gap-2">
                <span class="mv-font-headline-xl-mobile mv-sm-font-headline-xl mv-text-headline-xl-mobile mv-sm-text-headline-xl mv-font-extrabold mv-text-on-surface">Rs. 300</span>
                <span class="mv-font-label-md mv-text-label-md mv-text-tertiary mv-font-semibold d-flex align-items-center">
                  <span class="material-symbols-outlined mv-text-58f475">check_circle</span> Ready
                </span>
              </div>
              <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Sufficient credit to instantly rent up to 6
                Ultra HD movies.</p>
            </div>
            <div class="d-flex align-items-center mv-gap-space-sm mv-pt-space-xs">
              <button
                class="mv-flex-1 mv-py-2 mv-rounded-lg mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-colors"
                onclick="topupWallet(100)" type="button">
                +Rs. 100
              </button>
              <button
                class="mv-flex-1 mv-py-2 mv-rounded-lg mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-colors"
                onclick="topupWallet(200)" type="button">
                +Rs. 200
              </button>
              <button
                class="mv-flex-1 mv-py-2 mv-rounded-lg mv-bg-primary-container mv-text-white mv-font-label-md mv-text-label-md mv-font-bold mv-hover-bg-primary mv-transition-colors"
                onclick="topupWallet(500)" type="button">
                +Rs. 500
              </button>
            </div>
          </div>
        </section>
      </div>
      <!-- PURCHASE CONFIRMATION MODAL (Matching Screen 7 in Reference) -->
      <div
        class="mv-fixed mv-inset-0 mv-z-50 d-flex align-items-center justify-content-center mv-p-space-md mv-bg-surface-container-lowest_80 mv-backdrop-blur-md d-none mv-opacity-0 mv-transition-opacity mv-duration-300"
        id="purchaseModal">
        <div
          class="mv-relative mv-w-full mv-max-w-md mv-max-h-73e076 overflow-y-auto mv-p-space-md mv-sm-p-space-xl mv-rounded-2xl mv-bg-surface-container-low mv-shadow-2xl d-flex flex-column align-items-center text-center mv-scale-95 mv-transition-transform mv-duration-300">
          <!-- Close button -->
          <button
            class="mv-absolute mv-top-4 mv-right-4 mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-text-on-surface-variant mv-hover-text-on-surface d-flex align-items-center justify-content-center"
            onclick="closeModal()" type="button">
            <span class="material-symbols-outlined mv-text-c79a76">close</span>
          </button>
          <!-- Emerald Confirmation Icon -->
          <div
            class="mv-w-16 mv-h-16 mv-rounded-full mv-bg-tertiary-container_30 mv-text-tertiary d-flex align-items-center justify-content-center mb-3 mv-shadow-58ba74">
            <span class="material-symbols-outlined mv-text-4262a5"
              style="font-variation-settings: 'FILL' 1;">check_circle</span>
          </div>
          <h3 class="mv-font-headline-md mv-text-headline-md mv-font-bold mv-text-on-surface">Purchase Successful!</h3>
          <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant mt-1" id="modalMovieMsg">Movie has been added to
            your account.</p>
          <!-- Financial Summary Breakdown Container -->
          <div
            class="mv-w-full my-4 mv-p-space-md mv-rounded-xl mv-bg-surface-container d-flex flex-column mv-gap-space-sm text-start">
            <div class="d-flex align-items-center justify-content-between mv-font-body-sm mv-text-body-sm">
              <span class="mv-text-on-surface-variant">Movie Title</span>
              <span class="mv-font-bold mv-text-on-surface text-truncate mv-max-w-4a58f5" id="modalMovieName">John Wick 4</span>
            </div>
            <div class="d-flex align-items-center justify-content-between mv-font-body-sm mv-text-body-sm">
              <span class="mv-text-on-surface-variant">Movie Price</span>
              <span class="mv-font-bold mv-text-on-surface" id="modalPrice">Rs. 50</span>
            </div>
            <div class="d-flex align-items-center justify-content-between mv-font-body-sm mv-text-body-sm">
              <span class="mv-text-on-surface-variant">Previous Balance</span>
              <span class="mv-text-on-surface" id="modalPrevBalance">Rs. 300</span>
            </div>
            <div class="d-flex align-items-center justify-content-between mv-font-body-sm mv-text-body-sm">
              <span class="mv-text-on-surface-variant">Amount Deducted</span>
              <span class="mv-text-error mv-font-medium" id="modalDeducted">- Rs. 50</span>
            </div>
            <div class="mv-w-full mv-h-px mv-bg-surface-container-high my-1"></div>
            <div class="d-flex align-items-center justify-content-between mv-font-label-lg mv-text-label-lg">
              <span class="mv-text-on-surface mv-font-semibold">Remaining Balance</span>
              <span class="mv-font-bold mv-text-tertiary" id="modalRemaining">Rs. 250</span>
            </div>
          </div>
          <!-- Action Buttons Row (Watch Online / Download) -->
          <div class="mv-w-full d-flex flex-column flex-sm-row align-items-center mv-gap-space-md">
            <button
              class="mv-flex-1 mv-py-3 mv-rounded-full mv-bg-primary-container mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold d-flex align-items-center justify-content-center mv-gap-1p5 mv-shadow-be49ab mv-hover-bg-primary mv-transition-all"
              onclick="startWatching()" type="button">
              <span class="material-symbols-outlined mv-text-c79a76"
                style="font-variation-settings: 'FILL' 1;">play_arrow</span>
              <span>Watch Online</span>
            </button>
            <button
              class="mv-flex-1 mv-py-3 mv-rounded-full mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-lg mv-text-label-lg mv-font-semibold d-flex align-items-center justify-content-center mv-gap-1p5 mv-transition-colors"
              onclick="downloadMovie()" type="button">
              <span class="material-symbols-outlined mv-text-c79a76">download</span>
              <span>Download</span>
            </button>
          </div>
        </div>
      </div>
      <!-- Interactive Logic for Wallet and Purchase Flow -->
      
    </div>
  </main>
</AppLayout>
</template>

<script>

import axios from 'axios';
import AppLayout from '../../layouts/AppLayout.vue';

function unwrapList(payload) {
  if (Array.isArray(payload)) {
    return payload.length === 1 && Array.isArray(payload[0]) ? unwrapList(payload[0]) : payload;
  }

  if (payload && Array.isArray(payload.data)) {
    return unwrapList(payload.data);
  }

  return [];
}

export default {
  name: 'HomePage',
  components: {
    AppLayout
  },
  data() {
    return {
      bannerMovies: [],
      activeBannerIndex: 0,
      isLoadingBanners: true,
    };
  },
  mounted() {
    this.fetchMovieBanners();
  },
  methods: {
    fetchMovieBanners() {
      axios.get('/api/movie-banner')
        .then((response) => {
          this.bannerMovies = unwrapList(response.data);
        })
        .catch((error) => {
          console.error('Error fetching movie banners:', error);
        })
        .finally(() => {
          this.isLoadingBanners = false;
        });
    },
    showBanner(index) {
      this.activeBannerIndex = index;
    },
    showPreviousBanner() {
      this.activeBannerIndex = this.activeBannerIndex > 0
        ? this.activeBannerIndex - 1
        : this.bannerMovies.length - 1;
    },
    showNextBanner() {
      this.activeBannerIndex = (this.activeBannerIndex + 1) % this.bannerMovies.length;
    },
    bannerBackground(movie) {
      const image = movie.thumbnail_image || movie.poster_image;
      return image ? { backgroundImage: `url("${image}")` } : {};
    },
    movieYear(movie) {
      return movie.release_date ? new Date(movie.release_date).getFullYear() : null;
    },
    goToMovie(movie) {
      this.$router.push(`/movie/${movie.id}`);
    },
  }
};

</script>

<style scoped>
.landing-hero {
  min-height: 40rem;
}

.landing-hero-slides,
.landing-hero-slide {
  min-height: 40rem;
}

.landing-hero-slide > .mv-bg-cover {
  background-size: cover;
  background-position: center;
  transform: scale(1.03);
}

.landing-hero-controls {
  pointer-events: none;
}

.landing-hero-controls button,
.landing-hero-controls [role="group"] {
  pointer-events: auto;
}

.landing-hero-dot {
  width: 0.75rem;
  height: 0.375rem;
  padding: 0;
  border: 0;
  border-radius: 9999px;
  background: #31353c;
  transition: width 200ms ease, background-color 200ms ease;
}

.landing-hero-dot.is-active {
  width: 2rem;
  background: #93ccff;
}
</style>
