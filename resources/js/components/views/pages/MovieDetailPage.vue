<template>

  <main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100">
    <div class="d-flex flex-column mv-w-full">
      <!-- Subtle Ambient Glow Backdrop Layer -->
      <div class="mv-relative mv-w-full overflow-hidden">
        <div
          class="mv-absolute mv-ntop-40 mv-right-1_4 mv-w-3bc5a2 mv-h-2f12cf mv-rounded-full mv-bg-primary-container_10 mv-blur-a6575e pe-none">
        </div>
        <div
          class="mv-absolute top-50 mv-nleft-48 mv-w-ee879d mv-h-f7c4b3 mv-rounded-full mv-bg-secondary-container_10 mv-blur-0b005b pe-none">
        </div>
        <div class="mv-w-full mv-px-margin-mobile mv-sm-px-margin mv-py-space-lg d-flex flex-column mv-gap-space-xl mv-relative mv-z-10 mv-max-w-7xl mx-auto">
          <!-- Breadcrumb Navigation -->
          <nav aria-label="Breadcrumb"
            class="d-flex align-items-center mv-gap-space-xs mv-font-label-md mv-text-label-md mv-text-on-surface-variant">
            <a class="mv-hover-text-primary mv-transition-colors d-flex align-items-center mv-gap-1" data-path="home" href="/home">
              <span class="material-symbols-outlined mv-text-58f475">home</span>
              <span>Home</span>
            </a>
            <span class="material-symbols-outlined mv-text-0ddd99 mv-text-outline">chevron_right</span>
            <a class="mv-hover-text-primary mv-transition-colors" data-path="movies" href="/movies">Movies</a>
            <span class="material-symbols-outlined mv-text-0ddd99 mv-text-outline">chevron_right</span>
            <span class="mv-hover-text-on-surface mv-transition-colors mv-cursor-pointer">Sci-Fi</span>
            <span class="material-symbols-outlined mv-text-0ddd99 mv-text-outline">chevron_right</span>
            <span class="mv-text-primary mv-font-bold">Dune (Part One)</span>
          </nav>
          <!-- Main Showcase Bento / Dual-Column Layout -->
          <section class="d-grid mv-grid-cols-1 mv-lg-grid-cols-12 mv-gap-space-xl align-items-start">
            <!-- Left Column: Movie Poster with Tier 2 Surface & Glow -->
            <div class="mv-lg-col-span-5 mv-xl-col-span-4 d-flex flex-column mv-gap-space-md">
              <div
                class="mv-relative mv-group mv-rounded-xl overflow-hidden mv-bg-surface-container mv-shadow-2xl mv-transition-all mv-duration-300 mv-hover-shadow-e21970">
                <!-- Badges Layer -->
                <div class="mv-absolute mv-top-space-md mv-left-space-md mv-z-20 d-flex align-items-center mv-gap-space-xs">
                  <span
                    class="mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-text-primary mv-font-label-sm mv-text-label-sm text-uppercase mv-px-2p5 mv-py-1 mv-rounded-full mv-font-bold d-flex align-items-center mv-gap-1 mv-shadow-md">
                    <span class="mv-w-1p5 mv-h-1p5 mv-rounded-full mv-bg-tertiary mv-animate-pulse"></span>
                    TVOD Rental
                  </span>
                </div>
                <div class="mv-absolute mv-top-space-md mv-right-space-md mv-z-20 d-flex flex-column align-items-end mv-gap-1">
                  <span
                    class="mv-bg-primary mv-text-white mv-font-label-sm mv-text-label-sm mv-font-extrabold mv-px-2 mv-py-0p5 mv-rounded mv-shadow">4K
                    UHD</span>
                  <span
                    class="mv-bg-surface-container-high_90 mv-backdrop-blur-sm mv-text-on-surface mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded">HDR10+</span>
                </div>
                <!-- Poster Frame (2:3 Aspect Ratio) -->
                <div class="mv-aspect-bc11a5 mv-w-full overflow-hidden mv-relative">
                  <img
                    class="mv-w-full h-100 mv-object-cover mv-object-center mv-group-hover-scale-105 mv-transition-transform mv-duration-700 mv-ease-out"
                    data-alt="Cinematic official poster of Dune movie featuring Paul Atreides and Lady Jessica standing against gigantic Arrakis orange sand dunes with twin suns, high contrast dramatic cinematic lighting, deep teal shadows and golden sunlight, intricate stillsuit armor details, blockbuster cinema visual style"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuC2uYvm5L5Lt286JbqLUX6us2xMrUqLLG_bU2nipaevjWbYLNcwFikLtvNpZ1E95D5LLPpL8yduXkbL5uSIzj4NDoGE1t2ATRaGu9k9J84uBo9-6xHODtcLbS5KF3zdPqGt2gfbz8siDKJ_tsC9sNPNb6taDNKK1kEdwXf4o65Yn0drRHvZTzUHrzGVltHi9Bfx5XOtP9XinurPIqgZsHH1hdpLQlaLbcKtFoIu7z1s5DLPtG92x66rng" />
                  <div
                    class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_20 mv-to-transparent mv-opacity-80">
                  </div>
                  <!-- Poster Bottom Overlay Metadata -->
                  <div class="mv-absolute bottom-0 mv-inset-x-0 mv-p-space-md d-flex align-items-end justify-content-between mv-z-20">
                    <div>
                      <p class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant text-uppercase mv-tracking-widest">IMDb
                        Score</p>
                      <div class="d-flex align-items-center mv-gap-1p5">
                        <span class="material-symbols-outlined mv-text-5f8b9b mv-text-27bd7e"
                          style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">8.1</span>
                        <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">/10</span>
                      </div>
                    </div>
                    <div
                      class="d-flex align-items-center mv-gap-1 mv-bg-surface-container-low_80 mv-backdrop-blur-md mv-px-3 mv-py-1p5 mv-rounded-full">
                      <span class="material-symbols-outlined mv-text-secondary mv-text-58f475">verified</span>
                      <span class="mv-font-label-sm mv-text-label-sm mv-text-on-surface mv-font-semibold">Warner Bros.</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Quick Action Bar under Poster -->
              <div class="d-grid mv-grid-cols-2 mv-gap-space-sm">
                <button
                  class="mv-py-2p5 mv-px-space-md mv-rounded-full mv-bg-surface-container mv-hover-bg-surface-container-high mv-text-on-surface mv-font-label-md mv-text-label-md d-flex align-items-center justify-content-center mv-gap-space-xs mv-transition-all mv-shadow-sm"
                  type="button">
                  <span class="material-symbols-outlined mv-text-c79a76">bookmark_add</span>
                  <span>Add to Watchlist</span>
                </button>
                <button
                  class="mv-py-2p5 mv-px-space-md mv-rounded-full mv-bg-surface-container mv-hover-bg-surface-container-high mv-text-on-surface mv-font-label-md mv-text-label-md d-flex align-items-center justify-content-center mv-gap-space-xs mv-transition-all mv-shadow-sm"
                  type="button">
                  <span class="material-symbols-outlined mv-text-c79a76">share</span>
                  <span>Share Movie</span>
                </button>
              </div>
            </div>
            <!-- Right Column: Movie Specifications, Pricing & Checkout -->
            <div class="mv-lg-col-span-7 mv-xl-col-span-8 d-flex flex-column mv-gap-space-lg">
              <!-- Title & Genre Section -->
              <div class="d-flex flex-column mv-gap-space-sm">
                <div class="d-flex flex-wrap align-items-center mv-gap-space-xs">
                  <span
                    class="mv-bg-surface-container-high mv-text-secondary mv-font-label-md mv-text-label-md mv-px-3 mv-py-1 mv-rounded-full mv-font-semibold">Action</span>
                  <span
                    class="mv-bg-surface-container-high mv-text-secondary mv-font-label-md mv-text-label-md mv-px-3 mv-py-1 mv-rounded-full mv-font-semibold">Adventure</span>
                  <span
                    class="mv-bg-surface-container-high mv-text-secondary mv-font-label-md mv-text-label-md mv-px-3 mv-py-1 mv-rounded-full mv-font-semibold">Sci-Fi</span>
                  <span
                    class="mv-bg-surface-container-low mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm mv-px-2p5 mv-py-1 mv-rounded-full mv-font-mono">PG-13</span>
                </div>
                <div class="d-flex flex-column flex-md-row align-items-md-baseline justify-content-between mv-gap-space-xs">
                  <h1 class="mv-font-headline-xl-mobile mv-sm-font-headline-xl mv-text-headline-xl-mobile mv-sm-text-headline-xl mv-font-extrabold mv-text-on-surface mv-tracking-tight">
                    Dune
                  </h1>
                  <span class="mv-font-title-md mv-text-title-md mv-text-outline">Part One • 2021</span>
                </div>
                <p class="mv-font-body-md mv-text-body-md mv-text-primary_80 fst-italic mv-font-semibold">
                  "Beyond fear, destiny awaits."
                </p>
              </div>
              <!-- Purchase & Checkout Hub (Tier 2 Floating Card) -->
              <div
                class="mv-bg-surface-container mv-rounded-xl mv-p-space-lg mv-shadow-xl mv-relative overflow-hidden d-flex flex-column mv-gap-space-md">
                <!-- Decorative Accent line in header -->
                <div
                  class="mv-absolute top-0 start-0 end-0 mv-h-1 mv-bg-gradient-to-r mv-from-primary-container mv-via-secondary mv-to-tertiary">
                </div>
                <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between mv-gap-space-md">
                  <div>
                    <span
                      class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant text-uppercase mv-tracking-wider d-block">One-Time
                      Digital Rental (48 Hours)</span>
                    <div class="d-flex align-items-baseline mv-gap-space-xs mt-1">
                      <span class="mv-font-headline-xl-mobile mv-sm-font-headline-xl mv-text-headline-xl-mobile mv-sm-text-headline-xl mv-font-extrabold mv-text-tertiary">Rs. 50</span>
                      <span class="mv-font-body-sm mv-text-body-sm mv-text-outline mv-line-through">Rs. 150</span>
                      <span
                        class="mv-bg-tertiary-container_30 mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-font-bold ms-1">66%
                        OFF</span>
                    </div>
                  </div>
                  <!-- Instant Pay CTAs -->
                  <div class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center mv-gap-space-sm mv-w-full mv-sm-w-auto">
                    <button
                      class="mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold mv-px-space-xl mv-py-3 mv-rounded-full d-flex align-items-center justify-content-center mv-gap-space-xs mv-shadow-a2002d mv-hover-shadow-6f1aa7 mv-transition-all mv-hover-ntranslate-y-0p5"
                      id="buyNowBtn" type="button">
                      <span class="material-symbols-outlined mv-text-27bd7e">shopping_cart_checkout</span>
                      <span>Buy Now</span>
                    </button>
                    <button
                      class="mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-lg mv-text-label-lg mv-font-semibold mv-px-space-lg mv-py-3 mv-rounded-full d-flex align-items-center justify-content-center mv-gap-space-xs mv-transition-colors"
                      id="trailerBtn" type="button">
                      <span class="material-symbols-outlined mv-text-secondary mv-text-27bd7e">play_circle</span>
                      <span>Trailer</span>
                    </button>
                  </div>
                </div>
                <!-- Wallet Balance Status Callout -->
                <div
                  class="mv-bg-surface-container-low mv-rounded-lg mv-p-space-sm d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between mv-gap-space-xs mv-text-on-surface-variant">
                  <div class="d-flex align-items-center mv-gap-space-xs mv-font-body-sm mv-text-body-sm">
                    <span class="material-symbols-outlined mv-text-tertiary mv-text-c79a76">account_balance_wallet</span>
                    <span>Wallet Balance: <strong class="mv-text-on-surface">Rs. 300</strong></span>
                    <span class="mv-text-outline">•</span>
                    <span class="mv-text-tertiary mv-font-medium">Instant 1-Click TVOD Unlock Eligible</span>
                  </div>
                  <a class="mv-font-label-sm mv-text-label-sm mv-text-primary mv-hover-underline mv-font-semibold d-flex align-items-center mv-gap-0p5"
                    data-path="wallet" href="/wallet">
                    <span>Top-up Wallet</span>
                    <span class="material-symbols-outlined mv-text-0ddd99">arrow_forward</span>
                  </a>
                </div>
              </div>
              <!-- Metadata Grid (Key Film Specifications) -->
              <div class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-md mv-shadow-md">
                <h3 class="mv-font-label-md mv-text-label-md text-uppercase mv-tracking-wider mv-text-outline mb-2">Technical
                  Specifications &amp; Details</h3>
                <div class="d-grid mv-grid-cols-2 mv-md-grid-cols-4 mv-gap-space-md">
                  <div class="d-flex flex-column mv-gap-0p5">
                    <span class="mv-font-label-sm mv-text-label-sm mv-text-outline">Language</span>
                    <span class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-on-surface">English</span>
                    <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Urdu / Hindi Dubs</span>
                  </div>
                  <div class="d-flex flex-column mv-gap-0p5">
                    <span class="mv-font-label-sm mv-text-label-sm mv-text-outline">Quality</span>
                    <span class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-secondary">1080p FHD &amp; 4K</span>
                    <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">HEVC / H.265</span>
                  </div>
                  <div class="d-flex flex-column mv-gap-0p5">
                    <span class="mv-font-label-sm mv-text-label-sm mv-text-outline">Download Size</span>
                    <span class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-on-surface">2.5 GB</span>
                    <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Offline ready</span>
                  </div>
                  <div class="d-flex flex-column mv-gap-0p5">
                    <span class="mv-font-label-sm mv-text-label-sm mv-text-outline">Runtime</span>
                    <span class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-on-surface">2h 35m</span>
                    <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">155 minutes</span>
                  </div>
                  <div class="d-flex flex-column mv-gap-0p5">
                    <span class="mv-font-label-sm mv-text-label-sm mv-text-outline">Audio Track</span>
                    <span class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-on-surface">Dolby Atmos 5.1</span>
                    <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Spatial Audio</span>
                  </div>
                  <div class="d-flex flex-column mv-gap-0p5">
                    <span class="mv-font-label-sm mv-text-label-sm mv-text-outline">Subtitles</span>
                    <span class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-on-surface">English, Arabic</span>
                    <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Closed Captions</span>
                  </div>
                  <div class="d-flex flex-column mv-gap-0p5">
                    <span class="mv-font-label-sm mv-text-label-sm mv-text-outline">Director</span>
                    <span class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-on-surface">Denis Villeneuve</span>
                    <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Legendary Ent.</span>
                  </div>
                  <div class="d-flex flex-column mv-gap-0p5">
                    <span class="mv-font-label-sm mv-text-label-sm mv-text-outline">Release Year</span>
                    <span class="mv-font-title-md mv-text-title-md mv-font-semibold mv-text-on-surface">2021</span>
                    <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Theatrical Cut</span>
                  </div>
                </div>
              </div>
              <!-- Description / Synopsis -->
              <div class="d-flex flex-column mv-gap-space-xs">
                <h2 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface d-flex align-items-center mv-gap-space-xs">
                  <span class="material-symbols-outlined mv-text-primary mv-text-c28550">subject</span>
                  <span>Description</span>
                </h2>
                <p class="mv-font-body-lg mv-text-body-lg mv-text-on-surface-variant mv-leading-relaxed">
                  A hero's journey begins. Paul Atreides, a brilliant and gifted young man born into a great destiny
                  beyond his understanding, must travel to the most dangerous and desolate planet in the
                  cosmos—Arrakis—to secure the future of his family and noble house.
                </p>
                <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant_80 mv-leading-relaxed mt-1">
                  As malevolent forces erupt into conflict over the planet's exclusive supply of the most precious
                  resource in existence—a mind-expanding spice that unlocks humanity's greatest potential—only those who
                  conquer their fears will survive the impending storm.
                </p>
              </div>
            </div>
          </section>
          <!-- Section: Cinematic Screenshots & Previews Grid -->
          <section class="d-flex flex-column mv-gap-space-md mt-3">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center mv-gap-space-xs">
                <span class="material-symbols-outlined mv-text-primary mv-text-59700f">photo_library</span>
                <h2 class="mv-font-headline-md mv-text-headline-md mv-font-bold mv-text-on-surface">Screenshots &amp; Previews</h2>
              </div>
              <span class="mv-font-label-md mv-text-label-md mv-text-outline">4 High-Definition Stills</span>
            </div>
            <div class="d-grid mv-grid-cols-1 mv-sm-grid-cols-2 mv-lg-grid-cols-4 mv-gap-gutter-mobile mv-sm-gap-gutter">
              <!-- Screenshot 1 -->
              <div
                class="mv-group mv-relative mv-aspect-video mv-rounded-lg overflow-hidden mv-bg-surface-container mv-cursor-pointer mv-shadow-md mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1 mv-hover-shadow-xl">
                <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-110 mv-transition-transform mv-duration-500 mv-ease-out"
                  data-alt="Dune movie still showing royal ornithopter aircraft flying over colossal golden sand dunes of Arrakis, hazy hot desert atmosphere, hyper-detailed mechanical wings, cinematic wide panoramic perspective, warm amber color tone"
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuDgysqeBwiMSJv6_8iwgte9ArxBi2clxa-We2QLlowJB__kUmKW9M_BSlNCj_Jho5bGPVfl_Nk9fe_vzmRMP1y-vAeV2TB-YsZGbRm7qBpNkn6sAvX8JnL4TXNtQUND_SMlXipmB0xdNdA4424f4k3XbMzHkfoqbXHugl4GZc3WzjDIWRJndYx8VXW90uMh3eLqQsos9MjPoZkglemnQcflkExnqmyJZNlzauIMNNNIMpI2gMRM71GKgg" />
                <div
                  class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest_80 mv-via-transparent mv-to-transparent mv-opacity-0 mv-group-hover-opacity-100 mv-transition-opacity d-flex align-items-end mv-p-space-sm">
                  <span class="mv-font-label-sm mv-text-label-sm mv-text-primary d-flex align-items-center mv-gap-1 mv-font-semibold">
                    <span class="material-symbols-outlined mv-text-58f475">fullscreen</span>
                    Ornithopter Flight
                  </span>
                </div>
              </div>
              <!-- Screenshot 2 -->
              <div
                class="mv-group mv-relative mv-aspect-video mv-rounded-lg overflow-hidden mv-bg-surface-container mv-cursor-pointer mv-shadow-md mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1 mv-hover-shadow-xl">
                <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-110 mv-transition-transform mv-duration-500 mv-ease-out"
                  data-alt="Dune movie close-up scene of Paul Atreides wearing black stillsuit with breathing tube in nose, sandstorm winds blowing curly hair, intense focused gaze with spice blue eyes, harsh golden sunlight hitting cheekbone"
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcRmcJSBRcnxXJLrzXgqkl7pk_K3JppjNyEfQIQ6jTAxhI02jWztFS9ssYL1V_i5yOjHNZXsoVUky1EhFhEKBV2yoV-ge3MltA3SL_NQAFhJ95QKwAMAF6tgfwlanyLb5jTVUXWSPQCc1tqIFBVkZyc7ntfjzMmx87zEkod-L4Q10lmTALXWtGcKxH6EfBfR5xOLisEPwAz4gyR9olvOiK6Pt-Fink8xTBqhhqZnNbq95BZNlfjzZWtw" />
                <div
                  class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest_80 mv-via-transparent mv-to-transparent mv-opacity-0 mv-group-hover-opacity-100 mv-transition-opacity d-flex align-items-end mv-p-space-sm">
                  <span class="mv-font-label-sm mv-text-label-sm mv-text-primary d-flex align-items-center mv-gap-1 mv-font-semibold">
                    <span class="material-symbols-outlined mv-text-58f475">fullscreen</span>
                    Paul in the Deep Desert
                  </span>
                </div>
              </div>
              <!-- Screenshot 3 -->
              <div
                class="mv-group mv-relative mv-aspect-video mv-rounded-lg overflow-hidden mv-bg-surface-container mv-cursor-pointer mv-shadow-md mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1 mv-hover-shadow-xl">
                <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-110 mv-transition-transform mv-duration-500 mv-ease-out"
                  data-alt="Dune movie battle scene at night in Arrakeen city with fiery orange explosions, laser defense beams cutting through smoky darkness, silhouettes of Sardaukar warriors descending on harness ropes"
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuDUxZ8AWtFRLTEm1VyX1uq3z0kn0CSVPEpulW5Qo9xQv8_gjany6Gy7xltSIcdz1KaouwpClYrOaFWdppFmFuK9EOP1J-FqcMlPVD6Cv3u710NZiy7rIAOqoiKLgzhDilxtC-Sp8B6kgx0RE8b_Ny0MlODRve8n_92-UF7psYaWGIqVfna9P1-e8gr-GGCH4uzMbmFEAM0hXrezbYxQWTnvNrrnum2RbC47RsU3W3Z-Mlg5tSdtEyimOQ" />
                <div
                  class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest_80 mv-via-transparent mv-to-transparent mv-opacity-0 mv-group-hover-opacity-100 mv-transition-opacity d-flex align-items-end mv-p-space-sm">
                  <span class="mv-font-label-sm mv-text-label-sm mv-text-primary d-flex align-items-center mv-gap-1 mv-font-semibold">
                    <span class="material-symbols-outlined mv-text-58f475">fullscreen</span>
                    Night Siege of Arrakeen
                  </span>
                </div>
              </div>
              <!-- Screenshot 4 -->
              <div
                class="mv-group mv-relative mv-aspect-video mv-rounded-lg overflow-hidden mv-bg-surface-container mv-cursor-pointer mv-shadow-md mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1 mv-hover-shadow-xl">
                <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-110 mv-transition-transform mv-duration-500 mv-ease-out"
                  data-alt="Dune movie scene inside the imperial stone palace of Caladan with Lady Jessica and Duke Leto standing near monumental dark stone pillars, soft ocean mist daylight entering through giant slit windows"
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuAoL6nXHsa7xBwCoKOkhD26pe5VkyvJTnH3OSC2zxR4MGA-SwkDWfJiNk35Y0LcREB0sqgki2XVvlO5P_zpYsLOpO--OLZw0YAtW6hfsOkMwgXPWNbrV0xPFpMoYkSa8_9vL01ssJWfc13lYvPUf4uVZzo_4JeGosFdG_7_cD9Y9CJviIBmfshGvPCr_linK7tO2cq_ksK7r6CDqIQEAy4hj1oD-Es3rg3nBRdj7TWFKK9z-5rrU30GEQ" />
                <div
                  class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest_80 mv-via-transparent mv-to-transparent mv-opacity-0 mv-group-hover-opacity-100 mv-transition-opacity d-flex align-items-end mv-p-space-sm">
                  <span class="mv-font-label-sm mv-text-label-sm mv-text-primary d-flex align-items-center mv-gap-1 mv-font-semibold">
                    <span class="material-symbols-outlined mv-text-58f475">fullscreen</span>
                    House Atreides Council
                  </span>
                </div>
              </div>
            </div>
          </section>
          <!-- Section: Key Cast & Crew -->
          <section class="d-flex flex-column mv-gap-space-md">
            <h2 class="mv-font-headline-md mv-text-headline-md mv-font-bold mv-text-on-surface">Top Cast</h2>
            <div class="d-grid mv-grid-cols-2 mv-sm-grid-cols-3 mv-md-grid-cols-6 mv-gap-gutter-mobile mv-sm-gap-gutter">
              <div class="d-flex flex-column align-items-center text-center mv-gap-space-xs mv-group">
                <div
                  class="mv-w-20 mv-h-20 mv-rounded-full overflow-hidden mv-bg-surface-container mv-shadow-md mv-group-hover-ring-2 mv-group-hover-ring-primary mv-transition-all">
                  <img class="mv-w-full h-100 mv-object-cover"
                    data-alt="Portrait photo of actor Timothée Chalamet against a studio slate backdrop, soft dramatic key lighting, sharp portrait focus"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuC9bs4uqggzf2wvFDP88oi2rxqDvMJ1ObkfifGZi8PhHvjM0rOJhDusgvieQuUcxe7MkFe4e6kuGWHEfA8FhyUtV5zhLiA1DCKS0j-SLlW4wU-PfCjPLLyaHUWp5i768jqCT_X7I29blQqQ4S0bVaFNqdqcV-lYVpz-UXBpXtJeHNPq3UrzcbT2_1JMxHssZAZ7jKRHT4Hwe-ptZq1sO0UBXIjNCJ2K1GsdRd8SzgRCWi0L4AXud2IYbw" />
                </div>
                <span class="mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface mt-1">Timothée Chalamet</span>
                <span class="mv-font-body-sm mv-text-body-sm mv-text-outline">Paul Atreides</span>
              </div>
              <div class="d-flex flex-column align-items-center text-center mv-gap-space-xs mv-group">
                <div
                  class="mv-w-20 mv-h-20 mv-rounded-full overflow-hidden mv-bg-surface-container mv-shadow-md mv-group-hover-ring-2 mv-group-hover-ring-primary mv-transition-all">
                  <img class="mv-w-full h-100 mv-object-cover"
                    data-alt="Portrait photo of actress Rebecca Ferguson against a dark cinematic grey backdrop, elegant side lighting, high contrast photography"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAq8E9n67mXWvo6HBrpyBxmymRDHSl1S1Jeql-834WJlS_WHoeGp_ZIoKZjoLkMJnRznXeO8_iGuxvL1THF6GHRZlLKSj7F5e_Br6QFDKXjkS2ng6tDAbkidpLiWeXJO--pk0noL4dhNRjJlUySqEg283ygT9krW985KYo-xwl7GWFL0SPUk9X9hJTUf2wlqXd7HcFRIKRo6NHic9lpQuP6w3SsQCynwAAfVhsPzbhfx2irKUSmFeaeWA" />
                </div>
                <span class="mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface mt-1">Rebecca Ferguson</span>
                <span class="mv-font-body-sm mv-text-body-sm mv-text-outline">Lady Jessica</span>
              </div>
              <div class="d-flex flex-column align-items-center text-center mv-gap-space-xs mv-group">
                <div
                  class="mv-w-20 mv-h-20 mv-rounded-full overflow-hidden mv-bg-surface-container mv-shadow-md mv-group-hover-ring-2 mv-group-hover-ring-primary mv-transition-all">
                  <img class="mv-w-full h-100 mv-object-cover"
                    data-alt="Portrait photo of actor Oscar Isaac with trimmed dark beard and sleek hair, studio rim lighting, charcoal backdrop"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZ8_3YJd8YqkqtSBlBJOTU671Ir3l5SE51ksTpCW84hmAa71KlssjqaYl9mwXntxNK967KoSOu5J0NFUVnPD7AAnlHTgviWBI4VBuzyoxC6tpuLpKx5nSo_yKsqq6gyO3rWw5GrVmTgD8urfMEU_GPW037nmYSlDyudK53fDHNhCAgcctL0k8d6X5eTQzbmj0D7lLRAC09uZfiQ_tLuWLBX0ISQUZ3_ZM4xVFrOnliwhVDeAC7hjoJoA" />
                </div>
                <span class="mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface mt-1">Oscar Isaac</span>
                <span class="mv-font-body-sm mv-text-body-sm mv-text-outline">Duke Leto</span>
              </div>
              <div class="d-flex flex-column align-items-center text-center mv-gap-space-xs mv-group">
                <div
                  class="mv-w-20 mv-h-20 mv-rounded-full overflow-hidden mv-bg-surface-container mv-shadow-md mv-group-hover-ring-2 mv-group-hover-ring-primary mv-transition-all">
                  <img class="mv-w-full h-100 mv-object-cover"
                    data-alt="Portrait photo of actress Zendaya against minimalist dark studio backdrop, soft cinematic glow, modern editorial headshot"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuD5I2QRHNxu-_kNnMSXoomXqi4P7Vr_BgPw_qgk9q45OonqeaAwIptDJzw_3thgLV3i0VfJRz9uUZYJg8KE1SmR1L81bYOD12u8887QE1a7aqN3r5rBPuyorkghDDGK4t875m5LxI-eLUOOoDmyVBYjZyyR9d460GR3QeYG7brcYhpuWTc8FOfIeOGaWQiYTeUmimh7PVNwQdf5wc3edPlAVtc5A3030myVHZPITWaqiMP2LFCiBzlzGg" />
                </div>
                <span class="mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface mt-1">Zendaya</span>
                <span class="mv-font-body-sm mv-text-body-sm mv-text-outline">Chani</span>
              </div>
              <div class="d-flex flex-column align-items-center text-center mv-gap-space-xs mv-group">
                <div
                  class="mv-w-20 mv-h-20 mv-rounded-full overflow-hidden mv-bg-surface-container mv-shadow-md mv-group-hover-ring-2 mv-group-hover-ring-primary mv-transition-all">
                  <img class="mv-w-full h-100 mv-object-cover"
                    data-alt="Portrait photo of actor Josh Brolin with intense weathered expression, textured studio lighting, dark navy backdrop"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBaNgbQCRydrgyAFBWMjxLu2TJX9436hjwkaYTDNhLwg9IHKxfmQ0E1sSHRiH-XVuwhBXLx_wcrNc2qagOAvexIybHPrCrTdCjMdRJh1URj20UI9yHVimZX2IPWB6MhfiNBAtgSbDewjuVnhuGwfcHxP36MxsSKTo4r0H98giP7NT4mfp1kffX0noFkKRVMXWoPFYBJWWjIp5mUNwrldtHeo6G5_KNh2I-p8b1gcYTB9Obi3o92YCo2TQ" />
                </div>
                <span class="mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface mt-1">Josh Brolin</span>
                <span class="mv-font-body-sm mv-text-body-sm mv-text-outline">Gurney Halleck</span>
              </div>
              <div class="d-flex flex-column align-items-center text-center mv-gap-space-xs mv-group">
                <div
                  class="mv-w-20 mv-h-20 mv-rounded-full overflow-hidden mv-bg-surface-container mv-shadow-md mv-group-hover-ring-2 mv-group-hover-ring-primary mv-transition-all">
                  <img class="mv-w-full h-100 mv-object-cover"
                    data-alt="Portrait photo of actor Jason Momoa with beard and styled dark hair, warm cinematic key lighting, deep shadow background"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDCcvGNo4lSUcyuRcp78Y0coe4x0EmnCQD_aV9jooRabGRH4M14A8G_XNwPC-FzPjGFy2QqA3sBYEsz1QkA7L8KOrNOitDhb3rCDbJ_rOEIFpLXdt3WI_297sRlHQFZ8pRPsE2xRFZWvWUARsVI5ZuMqo1g2QC-BNG37sEmO_43ilhtLssqTFz-9catwshAYe-YhQNfjLeswVrNsei63b8T6VeWm4m6zoiVm23rb5Qygl2J3AZEzpEXkQ" />
                </div>
                <span class="mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface mt-1">Jason Momoa</span>
                <span class="mv-font-body-sm mv-text-body-sm mv-text-outline">Duncan Idaho</span>
              </div>
            </div>
          </section>
          <!-- Section: Recommended Blockbusters / Related Rails -->
          <section class="d-flex flex-column mv-gap-space-md mv-mb-space-xl">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center mv-gap-space-xs">
                <span class="material-symbols-outlined mv-text-secondary mv-text-59700f">auto_awesome</span>
                <h2 class="mv-font-headline-md mv-text-headline-md mv-font-bold mv-text-on-surface">You May Also Like</h2>
              </div>
              <a class="mv-font-label-md mv-text-label-md mv-text-primary mv-hover-underline mv-font-semibold d-flex align-items-center mv-gap-0p5"
                data-path="movies" href="/movies">
                <span>View All</span>
                <span class="material-symbols-outlined mv-text-58f475">chevron_right</span>
              </a>
            </div>
            <div class="d-grid mv-grid-cols-2 mv-sm-grid-cols-3 mv-lg-grid-cols-5 mv-gap-gutter-mobile mv-sm-gap-gutter">
              <!-- Card 1: Blade Runner 2049 -->
              <div
                class="mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-md d-flex flex-column mv-group mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1 mv-hover-shadow-695ca5">
                <div class="mv-aspect-bc11a5 mv-w-full overflow-hidden mv-relative">
                  <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                    data-alt="Movie poster for Blade Runner 2049 showing Ryan Gosling in long coat standing in neon orange dystopian sandstorm with futuristic police spinner car, cyberpunk lighting, deep teal and amber contrasting tones"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAv7EvrBflcfAdVtWUMuYZ-Wl9N7gTHtnW_-8LZjKPnoGoAcG3QznSL4udaN4obtyePDxghUKug2BlU5CsHE41uJn_A4TpUkTMs1zDjZI939KG99nS21Zknh_YP_8hlQldMt5nvfa0dnNrA3QixxPEZol75aHgp4d-IZQOnsyRnHJ5OQmJ97_TD41HH7tpHbiKDixm5mBJo-7OyVKY2OTvFuvhn_VWka5ZZDEuWUsKKF27LjXSrbWKY6Q" />
                  <span
                    class="mv-absolute mv-top-2 mv-right-2 mv-bg-surface-container-lowest_80 mv-text-primary mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded mv-font-bold">4K</span>
                </div>
                <div class="mv-p-space-sm d-flex flex-column mv-gap-1 mv-flex-1 justify-content-between">
                  <div>
                    <h4 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate">Blade Runner 2049</h4>
                    <p class="mv-font-body-sm mv-text-body-sm mv-text-outline">Sci-Fi • 2017</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mv-pt-space-xs">
                    <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Rs. 50</span>
                    <button
                      class="mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-sm mv-text-label-sm mv-px-3 mv-py-1 mv-rounded-full mv-font-semibold mv-transition-colors"
                      type="button">Rent</button>
                  </div>
                </div>
              </div>
              <!-- Card 2: Interstellar -->
              <div
                class="mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-md d-flex flex-column mv-group mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1 mv-hover-shadow-695ca5">
                <div class="mv-aspect-bc11a5 mv-w-full overflow-hidden mv-relative">
                  <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                    data-alt="Movie poster for Interstellar depicting astronaut walking on frozen alien ice planet with massive gargantua black hole glowing in the starry dark space backdrop, cinematic epic sci-fi visual style"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBwWybt6xxoUCYLIU1ItOCR89hwf9u1iBdWNyytAcrghTTXmlaAnTPgW_yCqjxD_Wq520a2Q9777GC6ekrhqmQ_B1t15gz1QJSex9AYqI_yyq_n2mgMsXAZcgtMO1LCrk2ISMvw4QtLDOvj0kJKM7W1c2AIp7FCo2N2hnTLLon1eq81pO1xDgKaeOi5Mmnj7WhVQi3KgEWz8THHE-6GmuCRFv77H6kmPoamLC7GBMV35fOfYBq9spdBdA" />
                  <span
                    class="mv-absolute mv-top-2 mv-right-2 mv-bg-surface-container-lowest_80 mv-text-primary mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded mv-font-bold">4K</span>
                </div>
                <div class="mv-p-space-sm d-flex flex-column mv-gap-1 mv-flex-1 justify-content-between">
                  <div>
                    <h4 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate">Interstellar</h4>
                    <p class="mv-font-body-sm mv-text-body-sm mv-text-outline">Adventure • 2014</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mv-pt-space-xs">
                    <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Rs. 50</span>
                    <button
                      class="mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-sm mv-text-label-sm mv-px-3 mv-py-1 mv-rounded-full mv-font-semibold mv-transition-colors"
                      type="button">Rent</button>
                  </div>
                </div>
              </div>
              <!-- Card 3: The Batman -->
              <div
                class="mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-md d-flex flex-column mv-group mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1 mv-hover-shadow-695ca5">
                <div class="mv-aspect-bc11a5 mv-w-full overflow-hidden mv-relative">
                  <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                    data-alt="Movie poster for The Batman showing dark cowl silhouette with glowing red flare in heavy Gotham rain, moody noir aesthetic with deep shadows and blood-red reflections"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAoFY2tE0xU4m-SIHwo_kR8Iv0z7DpQi0ybyKwH-34NdUIuHdtyAA-ZvGeCgpxUeoVpaUAU-hh3loeQe9pL0Lw3PymTkDxXHhv5AqOZOMfQhRGzEy7Y2_4RaV0wJ-gePKItypvo-pYm9vu-ibFZzsW1JA4fiaplVzx8KeQUOznF9VdwG2lc6Ci1o8WyR3p-kAD45MAKFmeIMZR1_0giHROcGXOs-q1DWdpUr6bC5PJ7Jbok1dewniCViQ" />
                  <span
                    class="mv-absolute mv-top-2 mv-right-2 mv-bg-surface-container-lowest_80 mv-text-primary mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded mv-font-bold">4K</span>
                </div>
                <div class="mv-p-space-sm d-flex flex-column mv-gap-1 mv-flex-1 justify-content-between">
                  <div>
                    <h4 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate">The Batman</h4>
                    <p class="mv-font-body-sm mv-text-body-sm mv-text-outline">Action • 2022</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mv-pt-space-xs">
                    <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Rs. 50</span>
                    <button
                      class="mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-sm mv-text-label-sm mv-px-3 mv-py-1 mv-rounded-full mv-font-semibold mv-transition-colors"
                      type="button">Rent</button>
                  </div>
                </div>
              </div>
              <!-- Card 4: Oppenheimer -->
              <div
                class="mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-md d-flex flex-column mv-group mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1 mv-hover-shadow-695ca5">
                <div class="mv-aspect-bc11a5 mv-w-full overflow-hidden mv-relative">
                  <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                    data-alt="Movie poster for Oppenheimer showing silhouette in fedora hat facing a colossal blinding atomic explosion swirl of orange flame, particulate embers and dark smoke, dramatic tension"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBdTLAVEcfFh7tfU-i2RdBM3O56GDVJ_Qjd3Glq4C0xbMwoKxgGTCN0N5zsqi6g3O1QfOe1XOBsqvuYk8OuLgzbf2NF1Jny27kbF1f9GQC4ZWWZ2mzynCqHVXpiLXSmVb8ZT7rOYuBsecBY1zzETfrovo1ZOy18Qkaz6Wtt_QeG8XEC3nSSJSJnri1mGWJRCQU39QEgP15G_-cMXcZTiuqRJoE8xZbqYqScp6eqjZR_RynuPMIxeGrTmQ" />
                  <span
                    class="mv-absolute mv-top-2 mv-right-2 mv-bg-surface-container-lowest_80 mv-text-primary mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded mv-font-bold">4K</span>
                </div>
                <div class="mv-p-space-sm d-flex flex-column mv-gap-1 mv-flex-1 justify-content-between">
                  <div>
                    <h4 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate">Oppenheimer</h4>
                    <p class="mv-font-body-sm mv-text-body-sm mv-text-outline">Biography • 2023</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mv-pt-space-xs">
                    <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Rs. 50</span>
                    <button
                      class="mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-sm mv-text-label-sm mv-px-3 mv-py-1 mv-rounded-full mv-font-semibold mv-transition-colors"
                      type="button">Rent</button>
                  </div>
                </div>
              </div>
              <!-- Card 5: John Wick: Chapter 4 -->
              <div
                class="mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-md d-flex flex-column mv-group mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1 mv-hover-shadow-695ca5">
                <div class="mv-aspect-bc11a5 mv-w-full overflow-hidden mv-relative">
                  <img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                    data-alt="Movie poster for John Wick Chapter 4 featuring Keanu Reeves in black tailored suit standing before the illuminated Eiffel Tower at night, vibrant neon violet and amber city reflections"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAiawnXXixeCJryIEdWJFA01837UA_IXDH53TVET6RIV-mC2PJs8vTCqu1Ds8mHpe92xh0_j378Z-f6wEp7cSnfgad5rUFj_wkirfQafOqWBSj8zMaLmJNwdc1ANiXBQ6FTjbiQy8CXngnCIDeGPUfpR1C8id47nkD8YVS5OzOa_Qc34OW4pQtwT5eQnveVpIRNMRqRQmXtUCGWD4yhHBSpcQV1FkquMMbyzXaIMtRZluxfRyxW_0ZoMA" />
                  <span
                    class="mv-absolute mv-top-2 mv-right-2 mv-bg-surface-container-lowest_80 mv-text-primary mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded mv-font-bold">4K</span>
                </div>
                <div class="mv-p-space-sm d-flex flex-column mv-gap-1 mv-flex-1 justify-content-between">
                  <div>
                    <h4 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate">John Wick: Chap. 4</h4>
                    <p class="mv-font-body-sm mv-text-body-sm mv-text-outline">Action • 2023</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mv-pt-space-xs">
                    <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Rs. 50</span>
                    <button
                      class="mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-sm mv-text-label-sm mv-px-3 mv-py-1 mv-rounded-full mv-font-semibold mv-transition-colors"
                      type="button">Rent</button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- Interactive Purchase Confirmation Modal (Screen 7 Flow Integration) -->
      <div
        class="mv-fixed mv-inset-0 mv-z-50 d-flex align-items-center justify-content-center mv-p-space-md mv-bg-surface-container-lowest_85 mv-backdrop-blur-md d-none mv-opacity-0 mv-transition-opacity mv-duration-200"
        id="checkoutModal">
        <div
          class="mv-bg-surface-container mv-rounded-xl mv-max-w-md mv-w-full mv-p-space-lg mv-shadow-2xl mv-relative d-flex flex-column align-items-center text-center">
          <button aria-label="Close dialog"
            class="mv-absolute mv-top-space-md mv-right-space-md mv-text-outline mv-hover-text-on-surface mv-transition-colors"
            id="closeModalBtn" type="button">
            <span class="material-symbols-outlined mv-text-27bd7e">close</span>
          </button>
          <!-- Emerald Confirmation Icon -->
          <div class="mv-w-16 mv-h-16 mv-rounded-full mv-bg-tertiary-container_20 d-flex align-items-center justify-content-center mb-3">
            <span class="material-symbols-outlined mv-text-tertiary mv-text-4262a5"
              style="font-variation-settings: 'FILL' 1;">check_circle</span>
          </div>
          <h3 class="mv-font-headline-md mv-text-headline-md mv-font-extrabold mv-text-on-surface">Confirm TVOD Rental</h3>
          <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant mt-1">Unlock 48-hour streaming license for Dune.
          </p>
          <!-- Receipt summary card -->
          <div
            class="mv-w-full mv-bg-surface-container-low mv-rounded-lg mv-p-space-md mt-3 d-flex flex-column mv-gap-space-xs text-start">
            <div class="d-flex align-items-center justify-content-between mv-font-body-sm mv-text-body-sm">
              <span class="mv-text-on-surface-variant">Movie Rental</span>
              <span class="mv-font-semibold mv-text-on-surface">Dune (2021) 4K</span>
            </div>
            <div class="d-flex align-items-center justify-content-between mv-font-body-sm mv-text-body-sm">
              <span class="mv-text-on-surface-variant">Price</span>
              <span class="mv-font-semibold mv-text-on-surface">Rs. 50</span>
            </div>
            <div class="d-flex align-items-center justify-content-between mv-font-body-sm mv-text-body-sm">
              <span class="mv-text-on-surface-variant">Current Balance</span>
              <span class="mv-font-semibold mv-text-on-surface">Rs. 300</span>
            </div>
            <div class="mv-w-full mv-h-px mv-bg-surface-container-highest my-1"></div>
            <div class="d-flex align-items-center justify-content-between mv-font-label-md mv-text-label-md">
              <span class="mv-text-on-surface mv-font-bold">Remaining Balance</span>
              <span class="mv-text-tertiary mv-font-bold">Rs. 250</span>
            </div>
          </div>
          <!-- Action Buttons -->
          <div class="mv-w-full d-grid mv-grid-cols-2 mv-gap-space-sm mt-4">
            <button
              class="mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold mv-py-2p5 mv-rounded-full d-flex align-items-center justify-content-center mv-gap-1 mv-shadow-md mv-transition-colors"
              id="confirmPurchaseBtn" type="button">
              <span class="material-symbols-outlined mv-text-c79a76">lock_open</span>
              <span>Confirm</span>
            </button>
            <button
              class="mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-lg mv-text-label-lg mv-font-semibold mv-py-2p5 mv-rounded-full mv-transition-colors"
              id="cancelPurchaseBtn" type="button">
              <span>Cancel</span>
            </button>
          </div>
        </div>
      </div>
      <!-- Interactive Trailer Modal -->
      <div
        class="mv-fixed mv-inset-0 mv-z-50 d-flex align-items-center justify-content-center mv-p-space-md mv-bg-surface-container-lowest_90 mv-backdrop-blur-lg d-none mv-opacity-0 mv-transition-opacity mv-duration-200"
        id="trailerModal">
        <div class="mv-bg-surface-container mv-rounded-xl mv-max-w-4xl mv-w-full mv-p-space-md mv-shadow-2xl mv-relative d-flex flex-column">
          <div class="d-flex align-items-center justify-content-between mb-2 mv-px-space-xs">
            <div class="d-flex align-items-center mv-gap-2">
              <span class="material-symbols-outlined mv-text-primary mv-text-27bd7e">smart_display</span>
              <h3 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Dune • Official Main Trailer</h3>
            </div>
            <button aria-label="Close trailer" class="mv-text-outline mv-hover-text-on-surface mv-transition-colors"
              id="closeTrailerBtn" type="button">
              <span class="material-symbols-outlined mv-text-59700f">close</span>
            </button>
          </div>
          <!-- Video Player Frame Simulation -->
          <div
            class="mv-w-full mv-aspect-video mv-rounded-lg overflow-hidden mv-bg-surface-container-lowest mv-relative d-flex align-items-center justify-content-center mv-group">
            <img class="mv-w-full h-100 mv-object-cover"
              data-alt="Dune high production trailer scene showing colossal sandworm erupting from Arrakis desert sand dunes directly in front of Paul and Jessica, hyper realistic particle simulations, epic scale cinematography"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxmn42PM_HTFzck64hSlADBjyIXCE8E-VKuk-LYwfZtegA6RYAM8KG8gH9RsIVFreg1MHFLgTwVcU8AxecMHylugJHHkaROOmAk-bTWmBImjd6mX-VtACcvc0PIwme0NranHofmXOCS1MRzJZdJwfbO6BtUDaEp9NOzSzdepl0F4EGlfMYlnpgwlGWZVkCMYnNrVBWEMogMK1vaZIFGh9dzk7ivupjuN5c85dn28-cSuHno_LEBBRxQQ" />
            <div
              class="mv-absolute mv-inset-0 mv-bg-surface-container-lowest_50 d-flex flex-column align-items-center justify-content-center mv-gap-space-sm">
              <div
                class="mv-w-16 mv-h-16 mv-rounded-full mv-bg-primary_90 mv-text-white d-flex align-items-center justify-content-center mv-shadow-af25e5 mv-cursor-pointer mv-hover-scale-110 mv-transition-transform">
                <span class="material-symbols-outlined mv-text-4262a5"
                  style="font-variation-settings: 'FILL' 1;">play_arrow</span>
              </div>
              <span class="mv-font-label-md mv-text-label-md mv-text-on-surface mv-font-semibold mv-tracking-wider text-uppercase">Click to
                Stream Trailer (4K HDR)</span>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </main>
  
</template>

<script>
import { onMounted } from 'vue';
import { bootPage } from '../runPageScript';

const externals = [
    
];

export default {
    name: 'MovieDetailPage',
    setup() {
        onMounted(() => bootPage(externals, 'KGZ1bmN0aW9uICgpIHsKICAgICAgICAgIHZhciBidXlCdG4gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnYnV5Tm93QnRuJyk7CiAgICAgICAgICB2YXIgY2hlY2tvdXRNb2RhbCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdjaGVja291dE1vZGFsJyk7CiAgICAgICAgICB2YXIgY2xvc2VNb2RhbEJ0biA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdjbG9zZU1vZGFsQnRuJyk7CiAgICAgICAgICB2YXIgY2FuY2VsUHVyY2hhc2VCdG4gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnY2FuY2VsUHVyY2hhc2VCdG4nKTsKICAgICAgICAgIHZhciBjb25maXJtUHVyY2hhc2VCdG4gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnY29uZmlybVB1cmNoYXNlQnRuJyk7CgogICAgICAgICAgdmFyIHRyYWlsZXJCdG4gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndHJhaWxlckJ0bicpOwogICAgICAgICAgdmFyIHRyYWlsZXJNb2RhbCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0cmFpbGVyTW9kYWwnKTsKICAgICAgICAgIHZhciBjbG9zZVRyYWlsZXJCdG4gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnY2xvc2VUcmFpbGVyQnRuJyk7CgogICAgICAgICAgZnVuY3Rpb24gb3Blbk1vZGFsKG1vZGFsKSB7CiAgICAgICAgICAgIG1vZGFsLmNsYXNzTGlzdC5yZW1vdmUoJ2Qtbm9uZScpOwogICAgICAgICAgICBzZXRUaW1lb3V0KCgpID0+IG1vZGFsLmNsYXNzTGlzdC5yZW1vdmUoJ212LW9wYWNpdHktMCcpLCAxMCk7CiAgICAgICAgICB9CgogICAgICAgICAgZnVuY3Rpb24gY2xvc2VNb2RhbChtb2RhbCkgewogICAgICAgICAgICBtb2RhbC5jbGFzc0xpc3QuYWRkKCdtdi1vcGFjaXR5LTAnKTsKICAgICAgICAgICAgc2V0VGltZW91dCgoKSA9PiBtb2RhbC5jbGFzc0xpc3QuYWRkKCdkLW5vbmUnKSwgMjAwKTsKICAgICAgICAgIH0KCiAgICAgICAgICBpZiAoYnV5QnRuICYmIGNoZWNrb3V0TW9kYWwpIHsKICAgICAgICAgICAgYnV5QnRuLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKCkgPT4gb3Blbk1vZGFsKGNoZWNrb3V0TW9kYWwpKTsKICAgICAgICAgIH0KCiAgICAgICAgICBpZiAoY2xvc2VNb2RhbEJ0bikgY2xvc2VNb2RhbEJ0bi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsICgpID0+IGNsb3NlTW9kYWwoY2hlY2tvdXRNb2RhbCkpOwogICAgICAgICAgaWYgKGNhbmNlbFB1cmNoYXNlQnRuKSBjYW5jZWxQdXJjaGFzZUJ0bi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsICgpID0+IGNsb3NlTW9kYWwoY2hlY2tvdXRNb2RhbCkpOwoKICAgICAgICAgIGlmIChjb25maXJtUHVyY2hhc2VCdG4pIHsKICAgICAgICAgICAgY29uZmlybVB1cmNoYXNlQnRuLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKCkgPT4gewogICAgICAgICAgICAgIGNvbmZpcm1QdXJjaGFzZUJ0bi5pbm5lckhUTUwgPSAnPHNwYW4gY2xhc3M9Im1hdGVyaWFsLXN5bWJvbHMtb3V0bGluZWQgbXYtdGV4dC1jNzlhNzYgbXYtYW5pbWF0ZS1zcGluIj5yZWZyZXNoPC9zcGFuPjxzcGFuPlByb2Nlc3NpbmcuLi48L3NwYW4+JzsKICAgICAgICAgICAgICBzZXRUaW1lb3V0KCgpID0+IHsKICAgICAgICAgICAgICAgIGFsZXJ0KCdSZW50YWwgc3VjY2Vzc2Z1bCEgRHVuZSBoYXMgYmVlbiBhZGRlZCB0byBNeSBNb3ZpZXMgd2l0aCA0OGggYWNjZXNzLicpOwogICAgICAgICAgICAgICAgY2xvc2VNb2RhbChjaGVja291dE1vZGFsKTsKICAgICAgICAgICAgICAgIGNvbmZpcm1QdXJjaGFzZUJ0bi5pbm5lckhUTUwgPSAnPHNwYW4gY2xhc3M9Im1hdGVyaWFsLXN5bWJvbHMtb3V0bGluZWQgbXYtdGV4dC1jNzlhNzYiPmxvY2tfb3Blbjwvc3Bhbj48c3Bhbj5Db25maXJtPC9zcGFuPic7CiAgICAgICAgICAgICAgfSwgODAwKTsKICAgICAgICAgICAgfSk7CiAgICAgICAgICB9CgogICAgICAgICAgaWYgKHRyYWlsZXJCdG4gJiYgdHJhaWxlck1vZGFsKSB7CiAgICAgICAgICAgIHRyYWlsZXJCdG4uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoKSA9PiBvcGVuTW9kYWwodHJhaWxlck1vZGFsKSk7CiAgICAgICAgICB9CiAgICAgICAgICBpZiAoY2xvc2VUcmFpbGVyQnRuKSBjbG9zZVRyYWlsZXJCdG4uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoKSA9PiBjbG9zZU1vZGFsKHRyYWlsZXJNb2RhbCkpOwogICAgICAgIH0pKCk7'));
    },
};
</script>
