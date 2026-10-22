<template>
  <AppLayout>
    <Header />
      <main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100">
          <div class="d-flex flex-column mv-w-full">
              <!-- Atmospheric Background Glow Elements -->
              <div class="mv-relative mv-w-full overflow-hidden">
                  <div
                      class="mv-absolute mv-ntop-40 mv-left-1_4 mv-w-ee879d mv-h-f7c4b3 mv-bg-primary_10 mv-rounded-full mv-blur-a6575e pe-none mv-nz-10"
                  ></div>
                  <div
                      class="mv-absolute mv-top-80 mv-right-10 mv-w-082318 mv-h-640857 mv-bg-secondary_10 mv-rounded-full mv-blur-0b005b pe-none mv-nz-10"
                  ></div>
                  <div
                      class="mv-absolute mv-bottom-40 mv-left-10 mv-w-c5d208 mv-h-a7566b mv-bg-tertiary_10 mv-rounded-full mv-blur-e3271f pe-none mv-nz-10"
                  ></div>
                  <div
                      class="mv-w-full mv-px-margin-mobile mv-sm-px-margin mv-py-space-xl d-flex flex-column mv-gap-space-xl"
                  >
                      
                      <!-- Section 3: Browse by Mood / Vibe (Interactive Pill Selector) -->
                      <section
                          class="d-flex flex-column mv-gap-space-md mv-bg-surface-container-low mv-p-space-lg mv-rounded-xl mv-shadow-lg"
                      >
                          <div
                              class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between mv-gap-space-sm"
                          >
                              <div>
                                  <span
                                      class="mv-font-label-sm mv-text-label-sm mv-text-tertiary mv-tracking-wider text-uppercase"
                                      >Emotional Spectrum</span
                                  >
                                  <h2 class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface">
                                      Browse by Mood &amp; Vibe
                                  </h2>
                              </div>
                              <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
                                  Tap a mood to filter instantaneous recommendations
                              </p>
                          </div>
                          <div class="d-flex flex-wrap align-items-center mv-gap-space-sm" id="moodFilters">
                              <button
                                  class="mood-btn mv-px-space-md mv-py-2 mv-bg-primary mv-text-white mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-space-xs mv-transition-all mv-shadow-md mv-active-scale-95"
                                  data-mood="all"
                              >
                                  <span class="material-symbols-outlined mv-text-58f475">apps</span>
                                  All Vibes
                              </button>
                              <button
                                  class="mood-btn mv-px-space-md mv-py-2 mv-bg-surface-container-high mv-hover-bg-surface-container-highest mv-text-on-surface-variant mv-hover-text-on-surface mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-space-xs mv-transition-all mv-active-scale-95"
                                  data-mood="mind-bending"
                              >
                                  <span class="material-symbols-outlined mv-text-58f475 mv-text-primary">psychology</span>
                                  Mind-Bending Plots
                              </button>
                              <button
                                  class="mood-btn mv-px-space-md mv-py-2 mv-bg-surface-container-high mv-hover-bg-surface-container-highest mv-text-on-surface-variant mv-hover-text-on-surface mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-space-xs mv-transition-all mv-active-scale-95"
                                  data-mood="adrenaline"
                              >
                                  <span class="material-symbols-outlined mv-text-58f475 mv-text-error">speed</span>
                                  Adrenaline Rush
                              </button>
                              <button
                                  class="mood-btn mv-px-space-md mv-py-2 mv-bg-surface-container-high mv-hover-bg-surface-container-highest mv-text-on-surface-variant mv-hover-text-on-surface mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-space-xs mv-transition-all mv-active-scale-95"
                                  data-mood="chills"
                              >
                                  <span class="material-symbols-outlined mv-text-58f475 mv-text-secondary">bedtime</span>
                                  Late Night Chills
                              </button>
                              <button
                                  class="mood-btn mv-px-space-md mv-py-2 mv-bg-surface-container-high mv-hover-bg-surface-container-highest mv-text-on-surface-variant mv-hover-text-on-surface mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-space-xs mv-transition-all mv-active-scale-95"
                                  data-mood="feel-good"
                              >
                                  <span class="material-symbols-outlined mv-text-58f475 mv-text-tertiary"
                                      >sentiment_very_satisfied</span
                                  >
                                  Feel Good &amp; Warm
                              </button>
                              <button
                                  class="mood-btn mv-px-space-md mv-py-2 mv-bg-surface-container-high mv-hover-bg-surface-container-highest mv-text-on-surface-variant mv-hover-text-on-surface mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-space-xs mv-transition-all mv-active-scale-95"
                                  data-mood="spectacle"
                              >
                                  <span class="material-symbols-outlined mv-text-58f475 mv-text-secondary-fixed"
                                      >auto_awesome</span
                                  >
                                  Epic Visual Spectacle
                              </button>
                              <button
                                  class="mood-btn mv-px-space-md mv-py-2 mv-bg-surface-container-high mv-hover-bg-surface-container-highest mv-text-on-surface-variant mv-hover-text-on-surface mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-space-xs mv-transition-all mv-active-scale-95"
                                  data-mood="gritty"
                              >
                                  <span class="material-symbols-outlined mv-text-58f475 mv-text-outline"
                                      >shield_with_heart</span
                                  >
                                  Gritty &amp; Realistic
                              </button>
                          </div>
                      </section>
                      <!-- Section 4: Curated Genre Collections Grid -->
                      <section class="d-flex flex-column mv-gap-space-md">
                          <div class="d-flex align-items-center justify-content-between">
                              <div>
                                  <div
                                      class="mv-font-label-sm mv-text-label-sm mv-text-primary mv-tracking-widest text-uppercase"
                                  >
                                      Direct Genre Vaults
                                  </div>
                                  <h2 class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface">
                                      Curated Genre Collections
                                  </h2>
                              </div>
                              <span class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant"
                                  >{{ filteredCategories.length }} Genres Available</span
                              >
                          </div>
                          <div
                              class="d-grid mv-grid-cols-1 mv-sm-grid-cols-2 mv-lg-grid-cols-5 mv-gap-gutter-mobile mv-sm-gap-gutter"
                              id="genreGrid"
                          >
                              <div v-if="isLoadingCategories" class="mv-col-span-full mv-text-center mv-py-space-lg mv-text-on-surface-variant">
                                  Loading categories...
                              </div>
                              <div v-else-if="categoriesError" class="mv-col-span-full mv-text-center mv-py-space-lg">
                                  <p class="mv-text-on-surface-variant mb-3">{{ categoriesError }}</p>
                                  <button
                                      type="button"
                                      class="mv-px-space-md mv-py-2 mv-bg-primary mv-text-white mv-rounded-full mv-font-label-md mv-text-label-md"
                                      @click="fetchCategories"
                                  >
                                      Try again
                                  </button>
                              </div>
                              <div v-else-if="filteredCategories.length === 0" class="mv-col-span-full mv-text-center mv-py-space-lg mv-text-on-surface-variant">
                                  {{ categorySearch ? 'No categories match your search.' : 'No categories are available.' }}
                              </div>
                              <router-link
                                  v-for="(category, index) in filteredCategories"
                                  :key="category.id"
                                  :to="{ path: '/movies', query: { genre_id: category.id } }"
                                  class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden text-decoration-none"
                              >
                                  <div
                                      class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-primary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"
                                  ></div>
                                  <div class="d-flex flex-column mv-gap-space-md">
                                      <div class="d-flex align-items-center justify-content-between">
                                          <div
                                              class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-primary mv-group-hover-bg-primary mv-group-hover-text-white mv-transition-colors"
                                          >
                                              <span class="material-symbols-outlined mv-text-c28550">movie_filter</span>
                                          </div>
                                          <span
                                              class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant"
                                          >
                                              {{ category.slug || `Category ${index + 1}` }}
                                          </span>
                                      </div>
                                      <div>
                                          <h3
                                              class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-primary mv-transition-colors"
                                          >
                                              {{ category.name }}
                                          </h3>
                                          <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">
                                              {{ category.description || 'Explore movies in this category.' }}
                                          </p>
                                      </div>
                                  </div>
                              </router-link>
                              <div v-if="false">
                              <!-- 1. Action & Adventure -->
                              <div
                                  class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden"
                                  data-category="action adventure explosion thrill combat adrenaline"
                              >
                                  <div
                                      class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-primary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"
                                  ></div>
                                  <div class="d-flex flex-column mv-gap-space-md">
                                      <div class="d-flex align-items-center justify-content-between">
                                          <div
                                              class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-primary mv-group-hover-bg-primary mv-group-hover-text-white mv-transition-colors"
                                          >
                                              <span class="material-symbols-outlined mv-text-c28550">rocket_launch</span>
                                          </div>
                                          <span
                                              class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant"
                                              >510+ Titles</span
                                          >
                                      </div>
                                      <div>
                                          <h3
                                              class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-primary mv-transition-colors"
                                          >
                                              Action &amp; Adventure
                                          </h3>
                                          <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">
                                              Explosions, stealth combat &amp; high stakes
                                          </p>
                                      </div>
                                  </div>
                                  <div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Explosion</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Thrill</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Combat</span
                                      >
                                  </div>
                              </div>
                              <!-- 2. Sci-Fi & Cyberpunk -->
                              <div
                                  class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden"
                                  data-category="sci-fi cyberpunk space time travel dystopia mind-bending spectacle"
                              >
                                  <div
                                      class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-secondary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"
                                  ></div>
                                  <div class="d-flex flex-column mv-gap-space-md">
                                      <div class="d-flex align-items-center justify-content-between">
                                          <div
                                              class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-secondary mv-group-hover-bg-secondary mv-group-hover-text-on-secondary mv-transition-colors"
                                          >
                                              <span class="material-symbols-outlined mv-text-c28550">blur_on</span>
                                          </div>
                                          <span
                                              class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant"
                                              >280+ Titles</span
                                          >
                                      </div>
                                      <div>
                                          <h3
                                              class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-secondary mv-transition-colors"
                                          >
                                              Sci-Fi &amp; Cyberpunk
                                          </h3>
                                          <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">
                                              Dystopian futures, cosmos &amp; quantum leaps
                                          </p>
                                      </div>
                                  </div>
                                  <div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Space</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Time Travel</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Dystopia</span
                                      >
                                  </div>
                              </div>
                              <!-- 3. Psychological Thriller & Mystery -->
                              <div
                                  class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden"
                                  data-category="psychological thriller mystery crime suspense noir mind-bending"
                              >
                                  <div
                                      class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-tertiary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"
                                  ></div>
                                  <div class="d-flex flex-column mv-gap-space-md">
                                      <div class="d-flex align-items-center justify-content-between">
                                          <div
                                              class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-tertiary mv-group-hover-bg-tertiary mv-group-hover-text-on-tertiary mv-transition-colors"
                                          >
                                              <span class="material-symbols-outlined mv-text-c28550">visibility</span>
                                          </div>
                                          <span
                                              class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant"
                                              >310+ Titles</span
                                          >
                                      </div>
                                      <div>
                                          <h3
                                              class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-tertiary mv-transition-colors"
                                          >
                                              Psychological Thriller
                                          </h3>
                                          <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">
                                              Twisting narratives, suspense &amp; dark secrets
                                          </p>
                                      </div>
                                  </div>
                                  <div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Crime</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Suspense</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Noir</span
                                      >
                                  </div>
                              </div>
                              <!-- 4. Horror & Paranormal -->
                              <div
                                  class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden"
                                  data-category="horror paranormal supernatural slasher psychological chills"
                              >
                                  <div
                                      class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-error_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"
                                  ></div>
                                  <div class="d-flex flex-column mv-gap-space-md">
                                      <div class="d-flex align-items-center justify-content-between">
                                          <div
                                              class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-error mv-group-hover-bg-error mv-group-hover-text-on-error mv-transition-colors"
                                          >
                                              <span class="material-symbols-outlined mv-text-c28550">dark_mode</span>
                                          </div>
                                          <span
                                              class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant"
                                              >140+ Titles</span
                                          >
                                      </div>
                                      <div>
                                          <h3
                                              class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-error mv-transition-colors"
                                          >
                                              Horror &amp; Paranormal
                                          </h3>
                                          <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">
                                              Hauntings, demonic encounters &amp; slashers
                                          </p>
                                      </div>
                                  </div>
                                  <div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Supernatural</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Slasher</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Psych</span
                                      >
                                  </div>
                              </div>
                              <!-- 5. Comedy & Satire -->
                              <div
                                  class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden"
                                  data-category="comedy satire dark comedy standup rom-com feel-good"
                              >
                                  <div
                                      class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-primary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"
                                  ></div>
                                  <div class="d-flex flex-column mv-gap-space-md">
                                      <div class="d-flex align-items-center justify-content-between">
                                          <div
                                              class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-primary mv-group-hover-bg-primary mv-group-hover-text-white mv-transition-colors"
                                          >
                                              <span class="material-symbols-outlined mv-text-c28550">mood</span>
                                          </div>
                                          <span
                                              class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant"
                                              >260+ Titles</span
                                          >
                                      </div>
                                      <div>
                                          <h3
                                              class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-primary mv-transition-colors"
                                          >
                                              Comedy &amp; Satire
                                          </h3>
                                          <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">
                                              Laugh-out-loud hits &amp; biting social satires
                                          </p>
                                      </div>
                                  </div>
                                  <div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Dark Humor</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Standup</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Rom-Com</span
                                      >
                                  </div>
                              </div>
                              <!-- 6. Drama & Romance -->
                              <div
                                  class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden"
                                  data-category="drama romance emotional biopic classic feel-good"
                              >
                                  <div
                                      class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-tertiary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"
                                  ></div>
                                  <div class="d-flex flex-column mv-gap-space-md">
                                      <div class="d-flex align-items-center justify-content-between">
                                          <div
                                              class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-tertiary mv-group-hover-bg-tertiary mv-group-hover-text-on-tertiary mv-transition-colors"
                                          >
                                              <span class="material-symbols-outlined mv-text-c28550">favorite</span>
                                          </div>
                                          <span
                                              class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant"
                                              >430+ Titles</span
                                          >
                                      </div>
                                      <div>
                                          <h3
                                              class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-tertiary mv-transition-colors"
                                          >
                                              Drama &amp; Romance
                                          </h3>
                                          <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">
                                              Intimate relationships, hardships &amp; triumphs
                                          </p>
                                      </div>
                                  </div>
                                  <div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Emotional</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Biopic</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Classic</span
                                      >
                                  </div>
                              </div>
                              <!-- 7. Crime & Gangster Sagas -->
                              <div
                                  class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden"
                                  data-category="crime gangster sagas underworld heist mafia gritty"
                              >
                                  <div
                                      class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-secondary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"
                                  ></div>
                                  <div class="d-flex flex-column mv-gap-space-md">
                                      <div class="d-flex align-items-center justify-content-between">
                                          <div
                                              class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-secondary mv-group-hover-bg-secondary mv-group-hover-text-on-secondary mv-transition-colors"
                                          >
                                              <span class="material-symbols-outlined mv-text-c28550">shield</span>
                                          </div>
                                          <span
                                              class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant"
                                              >210+ Titles</span
                                          >
                                      </div>
                                      <div>
                                          <h3
                                              class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-secondary mv-transition-colors"
                                          >
                                              Crime &amp; Gangster
                                          </h3>
                                          <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">
                                              Underworld empires, master heists &amp; mobsters
                                          </p>
                                      </div>
                                  </div>
                                  <div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Underworld</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Heist</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Mafia</span
                                      >
                                  </div>
                              </div>
                              <!-- 8. Animation & Anime -->
                              <div
                                  class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden"
                                  data-category="animation anime japanese anime 3d cgi family spectacle"
                              >
                                  <div
                                      class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-primary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"
                                  ></div>
                                  <div class="d-flex flex-column mv-gap-space-md">
                                      <div class="d-flex align-items-center justify-content-between">
                                          <div
                                              class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-primary mv-group-hover-bg-primary mv-group-hover-text-white mv-transition-colors"
                                          >
                                              <span class="material-symbols-outlined mv-text-c28550">animation</span>
                                          </div>
                                          <span
                                              class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant"
                                              >175+ Titles</span
                                          >
                                      </div>
                                      <div>
                                          <h3
                                              class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-primary mv-transition-colors"
                                          >
                                              Animation &amp; Anime
                                          </h3>
                                          <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">
                                              Shonen masterworks, Studio Ghibli &amp; 3D CGI
                                          </p>
                                      </div>
                                  </div>
                                  <div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Anime</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >3D CGI</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Family</span
                                      >
                                  </div>
                              </div>
                              <!-- 9. Historical & Epics -->
                              <div
                                  class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden"
                                  data-category="historical epics period drama war kingdoms spectacle gritty"
                              >
                                  <div
                                      class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-secondary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"
                                  ></div>
                                  <div class="d-flex flex-column mv-gap-space-md">
                                      <div class="d-flex align-items-center justify-content-between">
                                          <div
                                              class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-secondary mv-group-hover-bg-secondary mv-group-hover-text-on-secondary mv-transition-colors"
                                          >
                                              <span class="material-symbols-outlined mv-text-c28550">fort</span>
                                          </div>
                                          <span
                                              class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant"
                                              >95+ Titles</span
                                          >
                                      </div>
                                      <div>
                                          <h3
                                              class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-secondary mv-transition-colors"
                                          >
                                              Historical &amp; Epics
                                          </h3>
                                          <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">
                                              Battlefield chronicles, empires &amp; legends
                                          </p>
                                      </div>
                                  </div>
                                  <div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Period</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >War</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Dynasties</span
                                      >
                                  </div>
                              </div>
                              <!-- 10. Documentaries & Real Stories -->
                              <div
                                  class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden"
                                  data-category="documentaries real stories science true crime sports gritty mind-bending"
                              >
                                  <div
                                      class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-tertiary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"
                                  ></div>
                                  <div class="d-flex flex-column mv-gap-space-md">
                                      <div class="d-flex align-items-center justify-content-between">
                                          <div
                                              class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-tertiary mv-group-hover-bg-tertiary mv-group-hover-text-on-tertiary mv-transition-colors"
                                          >
                                              <span class="material-symbols-outlined mv-text-c28550">videocam</span>
                                          </div>
                                          <span
                                              class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant"
                                              >80+ Titles</span
                                          >
                                      </div>
                                      <div>
                                          <h3
                                              class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-tertiary mv-transition-colors"
                                          >
                                              Documentaries
                                          </h3>
                                          <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">
                                              Deep dives into true crimes, athletes &amp; nature
                                          </p>
                                      </div>
                                  </div>
                                  <div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >True Crime</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Science</span
                                      >
                                      <span
                                          class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant"
                                          >Athletics</span
                                      >
                                  </div>
                              </div>
                              </div>
                          </div>
                      </section>
                      <!-- Section 5: Special Collections & Spotlights -->
                      <section class="d-flex flex-column mv-gap-space-md">
                          <div class="d-flex align-items-center justify-content-between">
                              <div>
                                  <div
                                      class="mv-font-label-sm mv-text-label-sm mv-text-tertiary mv-tracking-widest text-uppercase"
                                  >
                                      Premium Hub Programs
                                  </div>
                                  <h2 class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface">
                                      Curated Premiere Spotlights
                                  </h2>
                              </div>
                              <span class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant"
                                  >Exclusive Collections</span
                              >
                          </div>
                          <div
                              class="d-grid mv-grid-cols-1 mv-md-grid-cols-3 mv-gap-gutter-mobile mv-sm-gap-gutter"
                              id="specialGrid"
                          >
                              <!-- Spotlight 1: 4K Ultra HD & Dolby Atmos -->
                              <div
                                  class="mv-group mv-relative mv-h-64 mv-rounded-xl overflow-hidden mv-cursor-pointer mv-shadow-xl d-flex flex-column justify-content-end mv-p-space-lg mv-bg-surface-container mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1"
                                  data-category="4k ultra hd dolby atmos master collection bitrate"
                              >
                                  <div
                                      class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center mv-transition-transform mv-duration-500 mv-group-hover-scale-105"
                                      data-alt="Abstract cinematic optical soundwave and light spectrum visualization, luminous cyan laser refraction against obsidian deep black backdrop, modern high-fidelity audio equipment aesthetic."
                                      style="
                                          background-image: url(&quot;https://lh3.googleusercontent.com/aida-public/AB6AXuC9hWbUmFVnZfnKqwHsWCythQ1eTE0QHopFvKyyDwFglA81OadweuUY5N3uviAzab1i0Zs3mi67x-QxlMbtgNHZkDBW6-hyfeFKovR5A_Bov58y_SjcH8HG3WRzb2IHfk2no0EIhE8MmZ6z2MBXbqrdzuqUl_zLd0hTUMX2B4YLFwNPyEO9t_QQaCajhGwD0mMJu5gECRMjyqC_6sPuM0ZA2Y5CZEUcsbt8-r4vsESB6UbfReni-tmvMg&quot;);
                                      "
                                  ></div>
                                  <div
                                      class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_80 mv-to-transparent"
                                  ></div>
                                  <div class="mv-relative d-flex flex-column mv-gap-space-xs">
                                      <div class="d-flex align-items-center mv-gap-space-xs">
                                          <span
                                              class="mv-px-2 mv-py-0p5 mv-bg-primary mv-text-white mv-font-label-sm mv-text-label-sm mv-rounded mv-font-bold"
                                              >4K HDR</span
                                          >
                                          <span
                                              class="mv-px-2 mv-py-0p5 mv-bg-surface-container-high mv-text-secondary mv-font-label-sm mv-text-label-sm mv-rounded mv-font-semibold"
                                              >DOLBY ATMOS</span
                                          >
                                      </div>
                                      <h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold">
                                          4K Ultra HD &amp; Atmos Master
                                      </h3>
                                      <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
                                          250+ Certified uncompressed bitrate theatrical masters for true home theatre setups.
                                      </p>
                                      <div
                                          class="mt-1 d-flex align-items-center mv-text-primary mv-font-label-md mv-text-label-md mv-group-hover-translate-x-1 mv-transition-transform"
                                      >
                                          Explore The Master Collection
                                          <span class="material-symbols-outlined mv-text-58f475 ms-1">arrow_forward</span>
                                      </div>
                                  </div>
                              </div>
                              <!-- Spotlight 2: Top IMDb Rated 8.5+ -->
                              <div
                                  class="mv-group mv-relative mv-h-64 mv-rounded-xl overflow-hidden mv-cursor-pointer mv-shadow-xl d-flex flex-column justify-content-end mv-p-space-lg mv-bg-surface-container mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1"
                                  data-category="top imdb rated 8.5 highest rated masterpieces critical acclaim"
                              >
                                  <div
                                      class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center mv-transition-transform mv-duration-500 mv-group-hover-scale-105"
                                      data-alt="Vintage golden laurels resting on textured dark black slate marble, dramatic cinematic side spotlighting, timeless cinema prestige award festival atmosphere with subtle bokeh dots."
                                      style="
                                          background-image: url(&quot;https://lh3.googleusercontent.com/aida-public/AB6AXuDLer8Cuw35rPjB_HfNA976qViqNnOwSP_6shasjhTFyHkjvk-vMrqKuC4r7ruWxeesCovMD99m6D_ig1Zvr2r2lWHZ9HNqZ4u_hKtQ_BvBmNveTx1xD4mVcNraTUdk_G5pdlZLchyFdRo_qSeZqZUR1ORvwkuCTykgeTdsVdcw3x_uilM31lnnDziPaBzsjIk75TO6RqTJEj1metIlykGEJM9ThzWfnJAsEp7G5q9hEqihTWHZWYqOow&quot;);
                                      "
                                  ></div>
                                  <div
                                      class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_80 mv-to-transparent"
                                  ></div>
                                  <div class="mv-relative d-flex flex-column mv-gap-space-xs">
                                      <div class="d-flex align-items-center mv-gap-space-xs">
                                          <span
                                              class="mv-px-2 mv-py-0p5 mv-bg-tertiary-container mv-text-on-tertiary mv-font-label-sm mv-text-label-sm mv-rounded mv-font-bold d-flex align-items-center mv-gap-1"
                                          >
                                              <span
                                                  class="material-symbols-outlined mv-text-773d8f"
                                                  style="font-variation-settings: &quot;FILL&quot; 1"
                                                  >star</span
                                              >
                                              8.5+ IMDb
                                          </span>
                                          <span
                                              class="mv-px-2 mv-py-0p5 mv-bg-surface-container-high mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm mv-rounded"
                                              >Critical Acclaim</span
                                          >
                                      </div>
                                      <h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold">
                                          Top IMDb Masterpieces
                                      </h3>
                                      <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
                                          The highest rated cinematic triumphs in history, vetted by global critics and film
                                          buffs.
                                      </p>
                                      <div
                                          class="mt-1 d-flex align-items-center mv-text-tertiary mv-font-label-md mv-text-label-md mv-group-hover-translate-x-1 mv-transition-transform"
                                      >
                                          Stream Hall of Fame
                                          <span class="material-symbols-outlined mv-text-58f475 ms-1">arrow_forward</span>
                                      </div>
                                  </div>
                              </div>
                              <!-- Spotlight 3: Under Rs. 50 Flash Rentals -->
                              <div
                                  class="mv-group mv-relative mv-h-64 mv-rounded-xl overflow-hidden mv-cursor-pointer mv-shadow-xl d-flex flex-column justify-content-end mv-p-space-lg mv-bg-surface-container mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1"
                                  data-category="under rs 50 flash rentals budget cheap low price wallet friendly"
                              >
                                  <div
                                      class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center mv-transition-transform mv-duration-500 mv-group-hover-scale-105"
                                      data-alt="High tech digital neon ticket dispenser with glowing blue and green laser scanlines, dark obsidian theater entrance with shimmering floor reflections, 4k digital render."
                                      style="
                                          background-image: url(&quot;https://lh3.googleusercontent.com/aida-public/AB6AXuC_rK1gKqxWgfyMpsnyGfpNZ8Mwjuwv0SmhW7F048AERBh8ne63bPOmEq4o_3-KxgYORxvWClU7QfeY8riiIJf84ykT07gSbSXh80jhJYYbF5de3rqS3VsD5zBUz_Zk8246NkwhyA1nmulE5ZFUAR9X9O8t9YBQoV8S8_Y__ecI3G07SHsR7eVt7Q8SnSf6nwEgeV7Qpmmquqin0JEIaQ8ZMxA1N2QLGTXhve08tWE8md6lm6nOVSAb-Q&quot;);
                                      "
                                  ></div>
                                  <div
                                      class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_80 mv-to-transparent"
                                  ></div>
                                  <div class="mv-relative d-flex flex-column mv-gap-space-xs">
                                      <div class="d-flex align-items-center mv-gap-space-xs">
                                          <span
                                              class="mv-px-2 mv-py-0p5 mv-bg-secondary mv-text-on-secondary mv-font-label-sm mv-text-label-sm mv-rounded mv-font-bold"
                                              >FLASH SALE</span
                                          >
                                          <span
                                              class="mv-px-2 mv-py-0p5 mv-bg-surface-container-high mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm mv-rounded"
                                              >From Rs. 29</span
                                          >
                                      </div>
                                      <h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold">
                                          Under Rs. 50 TVOD Vault
                                      </h3>
                                      <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
                                          Weekly rotating budget hits. Instant 48-hour rental window using your MovieHub
                                          wallet.
                                      </p>
                                      <div
                                          class="mt-1 d-flex align-items-center mv-text-secondary mv-font-label-md mv-text-label-md mv-group-hover-translate-x-1 mv-transition-transform"
                                      >
                                          Browse Flash Rentals
                                          <span class="material-symbols-outlined mv-text-58f475 ms-1">arrow_forward</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </section>
                      <!-- Quick Platform Stream Status Strip -->
                      <section
                          class="mv-p-space-lg mv-bg-surface-container mv-rounded-xl d-flex flex-column flex-md-row align-items-center justify-content-between mv-gap-space-md mv-shadow-md"
                      >
                          <div class="d-flex align-items-center mv-gap-space-md">
                              <div
                                  class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-primary_10 d-flex align-items-center justify-content-center mv-text-primary"
                              >
                                  <span class="material-symbols-outlined mv-text-deed42">speed</span>
                              </div>
                              <div>
                                  <h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold">
                                      Instant High-Bitrate Delivery
                                  </h4>
                                  <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
                                      All categories support adaptive 4K UHD streaming with offline download options on
                                      mobile.
                                  </p>
                              </div>
                          </div>
                          <div class="d-flex align-items-center mv-gap-space-sm mv-w-full mv-md-w-auto">
                              <button
                                  class="mv-w-full mv-md-w-auto mv-px-space-lg mv-py-2p5 mv-bg-surface-container-high mv-hover-bg-surface-container-highest mv-text-on-surface mv-rounded-full mv-font-label-md mv-text-label-md mv-transition-colors d-flex align-items-center justify-content-center mv-gap-space-xs"
                              >
                                  <span class="material-symbols-outlined mv-text-c79a76">account_balance_wallet</span>
                                  Top-up Wallet (Rs. 300)
                              </button>
                              <button
                                  class="mv-w-full mv-md-w-auto mv-px-space-lg mv-py-2p5 mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-rounded-full mv-font-label-md mv-text-label-md mv-transition-colors mv-shadow-md d-flex align-items-center justify-content-center mv-gap-space-xs"
                              >
                                  <span class="material-symbols-outlined mv-text-c79a76">play_circle</span>
                                  Latest Releases
                              </button>
                          </div>
                      </section>
                  </div>
              </div>
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
export default {
    name: 'CategoriesPage',
    components: {
        AppLayout,
        Header,
        Footer
    },
    data() {
        return {
            categories: [],
            categorySearch: '',
            isLoadingCategories: false,
            categoriesError: '',
        };
    },
    computed: {
        filteredCategories() {
            const query = this.categorySearch.trim().toLowerCase();
            if (!query) {
                return this.categories;
            }

            return this.categories.filter((category) =>
                [category.name, category.slug, category.description]
                    .filter(Boolean)
                    .some((value) => value.toLowerCase().includes(query))
            );
        },
    },
    mounted() {
        this.fetchCategories();
    },
    methods: {
        async fetchCategories() {
            this.isLoadingCategories = true;
            this.categoriesError = '';

            try {
                const response = await axios.get('/api/categories');
                const categories = response.data && response.data.data;
                console.log('Fetched categories:', categories);

                if (!Array.isArray(categories)) {
                    throw new Error('The categories response was not in the expected format.');
                }

                this.categories = categories;
            } catch (error) {
                console.error('Error fetching categories:', error);
                this.categoriesError = 'Unable to load categories. Please try again.';
            } finally {
                this.isLoadingCategories = false;
            }
        },
    },
};
</script>
