<template>
<AppLayout>
  <Header/>
  <main class="mv-w-full mv-pt-10 mv-bg-surface-container-lowest min-vh-100">
    <div class="d-flex flex-column mv-w-full">
      <!-- Immersive Cinematic Hero Showcase (Bleeds under shell header) -->
       <section class="mv-relative mv-w-full mv-nmt-16 mv-pt-16">
        <div class="hero-slider">

          <!-- ==================== SLIDE 1 ==================== -->
          <article
            v-for="(banner, index) in bannerMovies"
            v-show="activeBannerIndex === index"
            :key="banner.id"
            class="hero-slide mv-relative mv-w-full overflow-hidden"
            :aria-hidden="activeBannerIndex !== index"
          >
            <div class="hero-media">
              <div class="hero-media-fill" :style="backgroundStyle(banner)"></div>
              <img class="hero-media-poster" :alt="banner.name" :src="imageOf(banner)" />
              <div class="hero-media-shade"></div>
            </div>
            <div class="mv-relative mv-z-10 mv-w-full mv-px-margin-mobile mv-md-px-margin-mobile mv-sm-px-margin mv-pt-24 mv-pb-16 mv-md-pt-32 mv-md-pb-24 mv-max-w-7xl mx-auto d-flex flex-column justify-content-end mv-min-h-623c22">
              <div class="d-flex flex-wrap align-items-center mv-gap-space-sm mb-3">
                <span class="d-inline-flex align-items-center mv-gap-1p5 mv-px-space-md mv-py-1 mv-rounded-full mv-bg-primary-container_20 mv-text-primary mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-backdrop-blur-md">Featured Premiere</span>
                <span v-if="ratingOf(banner)" class="d-inline-flex align-items-center mv-gap-1 mv-px-space-sm mv-py-0p5 mv-rounded mv-bg-surface-container-high mv-text-tertiary mv-font-label-sm mv-text-label-sm">
                  <span class="mv-text-773d8f bi bi-star-fill" style="font-variation-settings: 'FILL' 1;"></span>
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
              
              </div>
            </div>
          </article>
          <p v-if="!bannerMovies.length" class="mv-px-margin-mobile mv-py-space-xl mv-text-on-surface-variant">No banners yet.</p>
        </div>
        <div v-if="bannerMovies.length" class="hero-slider-controls mv-absolute mv-inset-x-0 mv-bottom-6 mv-z-20 mv-px-margin-mobile mv-md-px-margin-mobile mv-sm-px-margin">
          <div class="mx-auto d-flex mv-max-w-7xl flex-wrap align-items-center justify-content-between mv-gap-space-md">
            <div class="d-flex align-items-center mv-gap-space-sm">
              <span class="mv-font-label-sm mv-text-label-sm mv-text-outline text-uppercase mv-tracking-widest">Now Trending</span>
              <div class="hero-slider-dots" role="group" aria-label="Choose featured banner">
                <button
                  v-for="(banner, index) in bannerMovies"
                  :key="banner.id"
                  type="button"
                  class="hero-slider-dot"
                  :class="{ 'is-active': activeBannerIndex === index }"
                  :aria-label="`Show banner ${index + 1}`"
                  :aria-current="activeBannerIndex === index ? 'true' : null"
                  @click="showBanner(index)"
                ></button>
              </div>
            </div>

            <div class="d-flex align-items-center mv-gap-2">
              <button type="button" aria-label="Previous banner" @click="showPreviousBanner"
                class="d-flex mv-h-9 mv-w-9 align-items-center justify-content-center mv-rounded-full mv-bg-surface-container-high mv-text-on-surface mv-transition-colors mv-hover-bg-primary-container">
                <span class="mv-text-c79a76 bi bi-chevron-left"></span>
              </button>
              <button type="button" aria-label="Next banner" @click="showNextBanner"
                class="d-flex mv-h-9 mv-w-9 align-items-center justify-content-center mv-rounded-full mv-bg-surface-container-high mv-text-on-surface mv-transition-colors mv-hover-bg-primary-container">
                <span class="mv-text-c79a76 bi bi-chevron-right"></span>
              </button>
            </div>
          </div>
        </div>
      </section>
      <!-- Content Workspace -->
      <div class="mv-w-full mv-px-margin-mobile mv-sm-px-margin-mobile mv-sm-px-margin d-flex flex-column mv-gap-space-lg mv-sm-gap-space-xl mv-py-space-xl">
        <!-- SECTION 2: Categories / Genres Section (Screen 1 Category Pill Row) -->
        <section class="d-flex flex-column mv-gap-space-lg" style="min-width: 0; max-width: 100%;">
          <div class="d-flex flex-column align-items-start mv-gap-space-sm flex-sm-row align-items-sm-end justify-content-sm-between">
            <div class="d-flex flex-column mv-gap-space-xs">
              <span class="mv-font-label-sm mv-text-label-sm mv-text-secondary text-uppercase mv-font-bold mv-tracking-widest">Explore
                Catalog</span>
              <h2 class="mv-font-headline-lg-mobile mv-text-headline-lg-mobile mv-sm-font-headline-lg-mobile mv-sm-font-headline-lg mv-sm-text-headline-lg-mobile mv-sm-text-headline-lg mv-font-bold mv-text-on-surface mv-tracking-tight">Categories</h2>
            </div>
            <span v-if="genres.length" class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant d-none d-sm-inline-block">{{ genres.length }}
              Genres</span>
          </div>
          <!-- 8 Stylized Category Cards with Vivid Color-coded Badges -->
          <div class="row-slider-wrap" @mouseenter="stopGenreAutoplay" @mouseleave="startGenreAutoplay">
          <button type="button" class="row-slider-arrow row-slider-arrow-prev" aria-label="Previous genres"
            style="transform: translateY(-50%);" @click="scrollGenres(-1)">
            <span class="bi bi-chevron-left"></span>
          </button>
          <button type="button" class="row-slider-arrow row-slider-arrow-next" aria-label="Next genres"
            style="transform: translateY(-50%);" @click="scrollGenres(1)">
            <span class="bi bi-chevron-right"></span>
          </button>
          <div ref="genreSlider" class="genre-slider"
            @touchstart.passive="stopGenreAutoplay" @touchend.passive="startGenreAutoplay">
            <router-link v-for="genre in genres" :key="genre.id"
              class="genre-slide mv-group d-flex flex-column align-items-center justify-content-center mv-p-space-md mv-rounded-xl mv-bg-surface-container-low mv-hover-bg-surface-container mv-border-0 mv-transition-all mv-shadow-sm text-decoration-none"
              :to="{ path: '/movies', query: { genre_id: genre.id } }">
              <div
                class="mv-w-12 mv-h-12 mv-rounded-full mv-bg-primary-container_30 d-flex align-items-center justify-content-center mv-text-primary mv-group-hover-scale-110 mv-transition-all mb-2 overflow-hidden">
                <img v-if="genre.poster_url || genre.image" :src="genre.poster_url || genre.image" :alt="genre.name"
                  class="mv-w-12 mv-h-12" style="object-fit: cover;">
                <span v-else class="mv-text-59700f bi bi-film"></span>
              </div>
              <span
                class="mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors">{{ genre.name }}</span>
            </router-link>
          </div>
          </div>
        </section>

        <!-- Action and Horror Movies -->
        <section class="d-flex flex-column mv-gap-space-lg">
          <!-- Section Header -->
          <div class="d-flex flex-column align-items-start mv-gap-space-sm flex-sm-row align-items-sm-end justify-content-sm-between">
            <div class="d-flex flex-column mv-gap-space-xs">
              <div class="d-flex align-items-center mv-gap-2">
                <span class="mv-w-2p5 mv-h-2p5 mv-rounded-full mv-bg-primary mv-shadow-d4d852"></span>
                <span class="mv-font-label-sm mv-text-label-sm mv-text-primary text-uppercase mv-font-bold mv-tracking-widest">Action &amp; Horror</span>
              </div>
              <h2 class="mv-font-headline-lg-mobile mv-text-headline-lg-mobile mv-sm-font-headline-lg-mobile mv-sm-font-headline-lg mv-sm-text-headline-lg-mobile mv-sm-text-headline-lg mv-font-bold mv-text-on-surface mv-tracking-tight">Action &amp; Horror Movies
              </h2>
            </div>
            <router-link
              class="mv-group d-flex align-items-center mv-gap-1 mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-primary mv-hover-text-on-surface mv-transition-colors"
              to="/movies">
              <span>View All</span>
              <span
                class="mv-text-c79a76 mv-group-hover-translate-x-1 mv-transition-transform bi bi-arrow-right"></span>
            </router-link>
          </div>
          <p v-if="isLoadingCategoryMovies" class="mv-text-on-surface-variant">Loading action and horror movies...</p>
          <p v-else-if="!featuredMovies.length" class="mv-text-on-surface-variant">
            {{ categoryMovieErrors ? 'Could not load action or horror movies.' : 'No action or horror movies available.' }}
          </p>
          <div v-else class="d-grid mv-grid-cols-2 mv-sm-grid-cols-3 mv-md-grid-cols-4 mv-lg-grid-cols-6 mv-gap-gutter-mobile mv-sm-gap-gutter">
            <router-link
              v-for="movie in featuredMovies"
              :key="`${movie.category}-${movie.id}`"
              :to="`/movie/${movie.id}`"
              class="mv-group d-flex flex-column mv-bg-surface-container-low mv-rounded-xl overflow-hidden mv-hover-bg-surface-container mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-shadow-md mv-hover-shadow-474bee text-decoration-none"
            >
              <div class="mv-relative mv-aspect-bc11a5 mv-w-full overflow-hidden mv-bg-surface-container-high">
                <img
                  class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                  :alt="movie.name"
                  :src="imageOf(movie)"
                />
                <span class="mv-absolute mv-top-2 mv-left-2 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-backdrop-blur mv-text-primary mv-font-label-sm mv-text-label-sm mv-font-bold">
                  {{ movie.category }}
                </span>
                <span v-if="ratingOf(movie)" class="mv-absolute mv-top-2 mv-right-2 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-backdrop-blur mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
                  {{ ratingOf(movie) }} IMDb
                </span>
                <div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-low mv-via-transparent mv-to-transparent mv-opacity-80"></div>
              </div>
              <div class="mv-p-space-sm d-flex flex-column mv-flex-1 justify-content-between mv-gap-space-sm">
                <div>
                  <h3 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate mv-group-hover-text-primary mv-transition-colors">
                    {{ movie.name }}
                  </h3>
                  <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant text-truncate">
                    {{ genreLine(movie) || movie.category }}
                  </p>
                </div>
                <span v-if="yearOf(movie)" class="mv-font-label-sm mv-text-label-sm mv-text-outline">
                  {{ yearOf(movie) }}
                </span>
              </div>
            </router-link>
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
                  <span class="mv-text-27bd7e bi bi-graph-up-arrow"
                    style="font-variation-settings: 'FILL' 1;"></span>
                </div>
                <h3 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Trending Rentals Today</h3>
              </div>
              <span
                class="mv-px-2p5 mv-py-1 mv-rounded-full mv-bg-surface-container mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-semibold d-flex align-items-center mv-gap-1">
                <span class="mv-w-1p5 mv-h-1p5 mv-rounded-full mv-bg-tertiary mv-animate-pulse"></span> Live 24h Rank
              </span>
              <div v-if="latestMoviePageCount > 1" class="d-flex align-items-center mv-gap-1">
                <span class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant">
                  {{ latestMoviePage + 1 }} / {{ latestMoviePageCount }}
                </span>
                <button
                  type="button"
                  aria-label="Previous latest movies"
                  class="d-flex mv-w-8 mv-h-8 align-items-center justify-content-center mv-rounded-full mv-bg-surface-container-high mv-text-on-surface mv-hover-bg-primary-container"
                  @click="showPreviousLatestMovies"
                >
                  <span class="bi bi-chevron-left"></span>
                </button>
                <button
                  type="button"
                  aria-label="Next latest movies"
                  class="d-flex mv-w-8 mv-h-8 align-items-center justify-content-center mv-rounded-full mv-bg-surface-container-high mv-text-on-surface mv-hover-bg-primary-container"
                  @click="showNextLatestMovies"
                >
                  <span class="bi bi-chevron-right"></span>
                </button>
              </div>
            </div>
            <!-- Mini list of trending rentals -->
            <div class="d-grid mv-grid-cols-1 mv-md-grid-cols-2 mv-gap-space-md mv-z-10">
              <p v-if="isLoadingLatestMovies" class="mv-text-on-surface-variant">Loading latest movies...</p>
              <p v-else-if="latestMoviesError" class="mv-text-on-surface-variant" role="alert">{{ latestMoviesError }}</p>
              <p v-else-if="!latestMovies.length" class="mv-text-on-surface-variant">No latest movies available.</p>
              <template v-else>
                <router-link
                  v-for="(movie, index) in visibleLatestMovies"
                  :key="movie.id"
                  :to="`/movie/${movie.id}`"
                  class="d-flex align-items-center mv-gap-space-md mv-p-space-sm mv-rounded-xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-colors text-decoration-none"
                >
                  <span class="mv-font-headline-md mv-text-headline-md mv-font-extrabold mv-text-outline_40 mv-w-6 text-center">
                    {{ String(latestMoviePage * 2 + index + 1).padStart(2, '0') }}
                  </span>
                  <div class="mv-w-12 mv-h-16 mv-rounded-md mv-bg-surface-container-highest overflow-hidden flex-shrink-0">
                    <img class="mv-w-full h-100 mv-object-cover" :alt="`${movie.name} poster`" :src="imageOf(movie)" />
                  </div>
                  <div class="d-flex flex-column mv-flex-1 mv-min-w-0">
                    <span class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate">{{ movie.name }}</span>
                    <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant text-truncate">
                      {{ genreLine(movie) || movie.language || yearOf(movie) }}
                    </span>
                  </div>
                  <span v-if="ratingOf(movie)" class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-primary">
                    {{ ratingOf(movie) }}
                  </span>
                </router-link>
              </template>
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
                <span class="mv-text-59700f bi bi-wallet2"></span>
              </div>
            </div>
            <div class="d-flex flex-column mv-gap-1">
              <div class="d-flex align-items-baseline mv-gap-2">
                <span class="mv-font-headline-xl-mobile mv-sm-font-headline-xl mv-text-headline-xl-mobile mv-sm-text-headline-xl mv-font-extrabold mv-text-on-surface">
                  {{ formatMoney(wallet.balance) }}
                </span>
                <span v-if="walletLoading" class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant">
                  Loading...
                </span>
                <span v-else class="mv-font-label-md mv-text-label-md mv-text-tertiary mv-font-semibold d-flex align-items-center">
                  <span class="mv-text-58f475 bi bi-check-circle"></span> Ready
                </span>
              </div>
              <p v-if="walletError" class="mv-font-body-sm mv-text-body-sm mv-text-error mb-0" role="alert">{{ walletError }}</p>
              <p v-else class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
                Add funds securely with Stripe and use your wallet for movie rentals.
              </p>
            </div>
            <div class="d-flex align-items-center mv-gap-space-sm mv-pt-space-xs">
              <button
                v-for="amount in availableTopUpAmounts"
                :key="amount"
                class="mv-flex-1 mv-py-2 mv-rounded-lg mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-colors"
                :class="{ 'mv-bg-primary-container mv-text-white mv-font-bold': amount === availableTopUpAmounts[availableTopUpAmounts.length - 1] }"
                :disabled="walletLoading || isTopUpSubmitting"
                type="button"
                @click="startWalletTopUp(amount)"
              >
                {{ isTopUpSubmitting && selectedTopUpAmount === amount ? 'Opening...' : `+${formatMoney(amount)}` }}
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
            <span class="mv-text-c79a76 bi bi-x-lg"></span>
          </button>
          <!-- Emerald Confirmation Icon -->
          <div
            class="mv-w-16 mv-h-16 mv-rounded-full mv-bg-tertiary-container_30 mv-text-tertiary d-flex align-items-center justify-content-center mb-3 mv-shadow-58ba74">
            <span class="mv-text-4262a5 bi bi-check-circle"
              style="font-variation-settings: 'FILL' 1;"></span>
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
              <span class="mv-text-c79a76 bi bi-play-fill"
                style="font-variation-settings: 'FILL' 1;"></span>
              <span>Watch Online</span>
            </button>
            <button
              class="mv-flex-1 mv-py-3 mv-rounded-full mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-lg mv-text-label-lg mv-font-semibold d-flex align-items-center justify-content-center mv-gap-1p5 mv-transition-colors"
              onclick="downloadMovie()" type="button">
              <span class="mv-text-c79a76 bi bi-download"></span>
              <span>Download</span>
            </button>
          </div>
        </div>
      </div>
      <!-- Interactive Logic for Wallet and Purchase Flow -->
      
    </div>
  </main>
  <Footer />
</AppLayout>
</template>

<script>

import axios from 'axios';
import AppLayout from '../../layouts/AppLayout.vue';
import Header from '../../layouts/SiteMenu.vue';
import Footer from '../../layouts/SiteFooter.vue';

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
    AppLayout,
    Header,
    Footer
  },
  data() {
    return {
      genres: [],
      bannerMovies: [],
      actionMovies: [],
      horrorMovies: [],
      latestMovies: [],
      latestMoviePage: 0,
      activeBannerIndex: 0,
      isLoadingBanners: true,
      isLoadingCategoryMovies: true,
      isLoadingLatestMovies: true,
      latestMoviesError: '',
      categoryMovieErrors: 0,
      wallet: { balance: 0 },
      currency: 'PKR',
      minimumTopup: 150,
      topUpAmounts: [200, 500, 1000],
      walletLoading: true,
      isTopUpSubmitting: false,
      selectedTopUpAmount: null,
      walletError: '',
    };
  },
  computed: {
    featuredMovies() {
      return [
        ...this.actionMovies.map((movie) => ({ ...movie, category: 'Action' })),
        ...this.horrorMovies.map((movie) => ({ ...movie, category: 'Horror' })),
      ];
    },
    latestMoviePageCount() {
      return Math.ceil(this.latestMovies.length / 2);
    },
    visibleLatestMovies() {
      return this.latestMovies.slice(this.latestMoviePage * 2, this.latestMoviePage * 2 + 2);
    },
    availableTopUpAmounts() {
      return this.topUpAmounts.filter((amount) => amount >= this.minimumTopup);
    },
  },
  mounted() {
    this.fetchMovieBanners();
    this.fetchGenres();
    this.fetchCategoryMovies();
    this.fetchLatestMovies();
    this.fetchWallet();
  },
  beforeUnmount() {
    this.stopBannerAutoplay();
    this.stopGenreAutoplay();
  },
  beforeDestroy() {
    this.stopBannerAutoplay();
    this.stopGenreAutoplay();
  },
  methods: {
    fetchGenres() {
      axios.get('/api/movies-genres')
        .then((response) => {
          this.genres = unwrapList(response.data);
          this.$nextTick(() => this.startGenreAutoplay());
        })
        .catch((error) => {
          console.error('Error fetching genres:', error);
        });
    },
    fetchLatestMovies() {
      axios.get('/api/latest-movies')
        .then((response) => {
          this.latestMovies = unwrapList(response.data);
          this.latestMoviePage = 0;
        })
        .catch((error) => {
          console.error('Error fetching latest movies:', error);
          this.latestMoviesError = 'Unable to load latest movies.';
        })
        .finally(() => {
          this.isLoadingLatestMovies = false;
        });
    },
    fetchCategoryMovies() {
      return Promise.all([
        axios.get('/api/action-movies')
          .then((response) => {
            this.actionMovies = unwrapList(response.data);
          })
          .catch((error) => {
            this.categoryMovieErrors++;
            console.error('Error fetching action movies:', error);
          }),
        axios.get('/api/horror-movies')
          .then((response) => {
            this.horrorMovies = unwrapList(response.data);
          })
          .catch((error) => {
            this.categoryMovieErrors++;
            console.error('Error fetching horror movies:', error);
          }),
      ]).finally(() => {
        this.isLoadingCategoryMovies = false;
      });
    },
    fetchMovieBanners() {
      axios.get('/api/movie-banner')
        .then((response) => {
          this.bannerMovies = unwrapList(response.data);
          this.startBannerAutoplay();
        })
        .catch((error) => {
          console.error('Error fetching movie banners:', error);
        })
        .finally(() => {
          this.isLoadingBanners = false;
        });
    },
    fetchWallet() {
      this.walletLoading = true;
      axios.get('/api/my-wallet')
        .then((response) => {
          this.wallet = response.data.wallet || { balance: 0 };
          this.currency = response.data.currency || 'PKR';
          this.minimumTopup = Number(response.data.minimum_top_up) || 150;
        })
        .catch((error) => {
          console.error('Error fetching wallet:', error);
          this.walletError = error.response?.data?.message || 'Unable to load your wallet balance.';
        })
        .finally(() => {
          this.walletLoading = false;
        });
    },
    startWalletTopUp(amount) {
      const selectedAmount = Number(amount);
      if (!Number.isFinite(selectedAmount) || selectedAmount < this.minimumTopup || selectedAmount > 10000) {
        this.walletError = `Choose an amount from ${this.formatMoney(this.minimumTopup)} to ${this.formatMoney(10000)}.`;
        return;
      }

      this.selectedTopUpAmount = selectedAmount;
      this.isTopUpSubmitting = true;
      this.walletError = '';

      axios.post('/api/payments/checkout', {
        type: 'wallet_top_up',
        amount: selectedAmount,
      })
        .then((response) => {
          if (!response.data?.checkout_url) {
            throw new Error('Stripe Checkout did not return a payment URL.');
          }
          window.location.assign(response.data.checkout_url);
        })
        .catch((error) => {
          console.error('Unable to start wallet top-up:', error);
          this.walletError = error.response?.data?.message || error.message || 'Unable to start Stripe Checkout.';
          this.isTopUpSubmitting = false;
          this.selectedTopUpAmount = null;
        });
    },
    formatMoney(amount) {
      return new Intl.NumberFormat('en', {
        style: 'currency',
        currency: this.currency || 'PKR',
        maximumFractionDigits: 2,
      }).format(Number(amount) || 0);
    },
    startBannerAutoplay() {
      this.stopBannerAutoplay();
      if (this.bannerMovies.length < 2) return;
      this.bannerTimer = setInterval(() => this.advanceBanner(), 5000);
    },
    stopBannerAutoplay() {
      clearInterval(this.bannerTimer);
      this.bannerTimer = null;
    },
    advanceBanner() {
      this.activeBannerIndex = (this.activeBannerIndex + 1) % this.bannerMovies.length;
    },
    startGenreAutoplay() {
      this.stopGenreAutoplay();
      this.genreTimer = setInterval(() => this.advanceGenres(), 3000);
    },
    stopGenreAutoplay() {
      clearInterval(this.genreTimer);
      this.genreTimer = null;
    },
    scrollGenres(direction) {
      const slider = this.$refs.genreSlider;
      if (!slider) return;
      slider.scrollBy({ left: slider.clientWidth * 0.8 * direction, behavior: 'smooth' });
    },
    advanceGenres() {
      const slider = this.$refs.genreSlider;
      if (!slider) return;
      const card = slider.querySelector('.genre-slide');
      const step = card ? card.offsetWidth + 16 : slider.clientWidth * 0.8;
      const atEnd = slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 4;
      slider.scrollTo({ left: atEnd ? 0 : slider.scrollLeft + step, behavior: 'smooth' });
    },
    showBanner(index) {
      this.activeBannerIndex = index;
      this.startBannerAutoplay();
    },
    showPreviousBanner() {
      this.startBannerAutoplay();
      this.activeBannerIndex = this.activeBannerIndex > 0
        ? this.activeBannerIndex - 1
        : this.bannerMovies.length - 1;
    },
    showNextBanner() {
      this.startBannerAutoplay();
      if (this.bannerMovies.length > 0) {
        this.activeBannerIndex = (this.activeBannerIndex + 1) % this.bannerMovies.length;
      }
    },
    showPreviousLatestMovies() {
      if (this.latestMoviePageCount > 1) {
        this.latestMoviePage = (this.latestMoviePage - 1 + this.latestMoviePageCount) % this.latestMoviePageCount;
      }
    },
    showNextLatestMovies() {
      if (this.latestMoviePageCount > 1) {
        this.latestMoviePage = (this.latestMoviePage + 1) % this.latestMoviePageCount;
      }
    },
    imageOf(movie) {
      return movie.thumbnail_image || movie.poster_image || '/frontend/favicon.png';
    },
    backgroundStyle(movie) {
      const image = this.imageOf(movie);
      return image ? { backgroundImage: `url("${image}")` } : {};
    },
    ratingOf(movie) {
      return movie.imdb_rating || movie.rating || null;
    },
    genreLine(movie) {
      if (Array.isArray(movie.genres) && movie.genres.length > 0) {
        return movie.genres
          .map((genre) => typeof genre === 'string' ? genre : genre.name)
          .filter(Boolean)
          .join(', ');
      }

      return null;
    },
    yearOf(movie) {
      const releaseDate = movie.release_date || movie.releaseDate;
      return movie.release_year || movie.releaseYear || (releaseDate ? new Date(releaseDate).getFullYear() : null);
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

.hero-slider {
    position: relative;
    min-height: 38rem;
    background: #0a0e14;
}

.hero-slide {
    min-height: 38rem;
}

.hero-media {
    position: absolute;
    inset: 0;
    overflow: hidden;
    background: #0a0e14;
}

.hero-media-fill,
.hero-media-poster,
.hero-media-shade {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
}

.hero-media-fill {
    background-position: center;
    background-size: cover;
    filter: blur(18px);
    opacity: 0.45;
    transform: scale(1.05);
}

.hero-media-poster {
    object-fit: cover;
    object-position: center 25%;
}

.hero-media-shade {
    background: linear-gradient(90deg, rgba(10, 14, 20, 0.96) 0%, rgba(10, 14, 20, 0.78) 42%, rgba(10, 14, 20, 0.18) 100%),
        linear-gradient(0deg, #0a0e14 0%, transparent 45%);
}

.hero-slider-dot {
    width: 0.75rem;
    height: 0.375rem;
    padding: 0;
    border: 0;
    border-radius: 9999px;
    background: #89929b;
    cursor: pointer;
    transition: width 200ms ease, background-color 200ms ease;
}

.hero-slider-dot.is-active {
    width: 2rem;
    background: #93ccff;
}

.genre-slider {
    width: 100%;
    max-width: 100%;
    min-width: 0;
    display: flex;
    gap: 1rem;
    overflow-x: auto;
    padding: 0.5rem 0.25rem 1rem;
    scroll-behavior: smooth;
    scrollbar-width: none;
}

.genre-slider::-webkit-scrollbar {
    display: none;
}

.genre-slide {
    flex: 0 0 9rem;
    min-width: 0;
}

.row-slider-wrap {
    position: relative;
    min-width: 0;
    max-width: 100%;
}

.row-slider {
    display: flex;
    gap: 1rem;
    overflow-x: auto;
    padding: 0.5rem 0.25rem 1rem;
    scroll-behavior: smooth;
    scroll-snap-type: x mandatory;
    scrollbar-width: none;
}

.row-slider::-webkit-scrollbar {
    display: none;
}

.row-slide {
    display: flex;
    flex: 0 0 calc((100% - 4rem) / 5);
    min-width: 0;
    scroll-snap-align: start;
}

.row-slide > a {
    width: 100%;
    min-height: 100%;
}

.browse-card-content {
    min-height: 6rem;
    gap: 0.5rem;
    padding: 1rem;
}

.row-slider-arrow {
    position: absolute;
    z-index: 2;
    top: 50%;
    display: inline-flex;
    width: 2.5rem;
    height: 2.5rem;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(223, 226, 235, 0.16);
    border-radius: 9999px;
    color: #dfe2eb;
    background: rgba(24, 28, 34, 0.92);
    transform: translateY(-50%);
    cursor: pointer;
}

.row-slider-arrow:hover {
    background: #3198dc;
}

.row-slider-arrow-prev {
    left: -1rem;
}

.row-slider-arrow-next {
    right: -1rem;
}

@media (max-width: 1199.98px) {
    .row-slide {
        flex-basis: calc((100% - 3rem) / 4);
    }
}

@media (max-width: 991.98px) {
    .row-slide {
        flex-basis: calc((100% - 2rem) / 3);
    }
}

@media (max-width: 767.98px) {
    .hero-slider,
    .hero-slide {
        min-height: 34rem;
    }

    .hero-media-shade {
        background: linear-gradient(0deg, rgba(10, 14, 20, 0.98) 0%, rgba(10, 14, 20, 0.7) 58%, rgba(10, 14, 20, 0.15) 100%);
    }

    .row-slide {
        flex-basis: calc((100% - 1rem) / 2);
    }

    .row-slider-arrow-prev {
        left: -0.5rem;
    }

    .row-slider-arrow-next {
        right: -0.5rem;
    }
}

@media (max-width: 575.98px) {
    .hero-slider,
    .hero-slide {
        min-height: 31rem;
    }

    .row-slide {
        flex-basis: 82%;
    }
}
</style>
