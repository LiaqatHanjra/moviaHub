<template>
  <AppLayout>
    <Header />
      <main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100">
        <div class="d-flex flex-column mv-w-full">
            <div class="mv-w-full mv-px-margin-mobile mv-sm-px-margin mv-py-space-lg">
                
                <!-- Main Grid: Left Side Navigation + Main Content Area -->
                <section class="mv-lg-col-span-12 d-flex flex-column mv-gap-space-lg">
                        
                        <!-- Filter, Sort & Search Toolbar -->
                        <div
                            class="mv-bg-surface-container mv-rounded-xl mv-p-space-md d-flex flex-column flex-md-row align-items-center justify-content-between mv-gap-space-md mv-shadow-sm"
                        >
                            <!-- Filter Tabs -->
                            <div
                                class="d-flex align-items-center mv-gap-space-xs mv-w-full mv-md-w-auto overflow-x-auto mv-pb-1 mv-md-pb-0"
                                id="filter-tabs"
                            >
                                <button
                                    class="filter-btn active mv-px-space-md mv-py-1p5 mv-rounded-full mv-font-label-md mv-text-label-md mv-font-semibold mv-bg-primary mv-text-white mv-transition-all"
                                >
                                    All Titles (4)
                                </button>
                                <button
                                    class="filter-btn mv-px-space-md mv-py-1p5 mv-rounded-full mv-font-label-md mv-text-label-md mv-font-semibold mv-bg-surface-container-high mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-bright mv-transition-all"
                                >
                                    Active Rentals (2)
                                </button>
                                <button
                                    class="filter-btn mv-px-space-md mv-py-1p5 mv-rounded-full mv-font-label-md mv-text-label-md mv-font-semibold mv-bg-surface-container-high mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-bright mv-transition-all"
                                >
                                    Permanent Owned (1)
                                </button>
                                <button
                                    class="filter-btn mv-px-space-md mv-py-1p5 mv-rounded-full mv-font-label-md mv-text-label-md mv-font-semibold mv-bg-surface-container-high mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-bright mv-transition-all"
                                >
                                    Expired (1)
                                </button>
                            </div>
                            <!-- Search & Display Mode -->
                            <div class="d-flex align-items-center mv-gap-space-sm mv-w-full mv-md-w-auto">
                                <div class="mv-relative mv-flex-1 mv-md-w-64">
                                    <span
                                        class="material-symbols-outlined mv-absolute mv-left-3 mv-top-2p5 mv-text-outline mv-text-c79a76"
                                        >search</span
                                    >
                                    <input
                                        class="mv-w-full mv-bg-surface-container-lowest mv-text-on-surface mv-placeholder-text-outline mv-font-body-sm mv-text-body-sm mv-pl-9 mv-pr-space-md mv-py-2 mv-rounded-lg mv-focus-outline-none mv-focus-ring-1 mv-focus-ring-primary mv-transition-all"
                                        id="movie-search"
                                        placeholder="Search your library..."
                                        type="text"
                                    />
                                </div>
                                <button
                                    class="mv-p-2 mv-rounded-lg mv-bg-surface-container-high mv-text-primary mv-hover-bg-surface-bright mv-transition-colors"
                                    title="Grid Layout"
                                >
                                    <span class="material-symbols-outlined mv-text-27bd7e">view_module</span>
                                </button>
                                <button
                                    class="mv-p-2 mv-rounded-lg mv-bg-surface-container-high mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors"
                                    title="List Layout"
                                >
                                    <span class="material-symbols-outlined mv-text-27bd7e">view_list</span>
                                </button>
                            </div>
                        </div>
                        <!-- Purchased Movies List -->
                        <div class="d-flex flex-column mv-gap-space-md" id="movies-container">
                            <!-- Movie 1: Dune: Part Two -->
                            <div
                                class="movie-card mv-bg-surface-container-low mv-hover-bg-surface-container mv-rounded-xl mv-p-space-md d-flex flex-column flex-md-row align-items-center mv-gap-space-lg mv-transition-all mv-shadow-md mv-group mv-relative overflow-hidden"
                                data-status="active"
                            >
                                <!-- Decorative Accent line -->
                                <div class="mv-absolute start-0 top-0 bottom-0 mv-w-1p5 mv-bg-tertiary"></div>
                                <!-- Poster -->
                                <div
                                    class="mv-relative mv-w-full mv-md-w-44 mv-h-64 mv-md-h-60 mv-rounded-lg overflow-hidden flex-shrink-0 mv-shadow-lg mv-bg-surface-container-highest"
                                >
                                    <img
                                        class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                                        data-alt="Official dramatic cinematic film poster of Dune Part Two in ultra high definition featuring Paul Atreides standing in a golden desert sunstorm with futuristic sci-fi armor and glowing blue spice eyes, cinematic warm dust atmospheric movie still"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBuIRMdD4427PXLlUxyTNrI7yStRMthZw6MqDD3bIZWvzkU-3P4r2fdjEKThZXhjcrQHZBdK7JsKpiO25xTiW_5jH2jie1b8qWXrWcKjimkwt7-4sMLRBt2IrmxaF6iN0BApJ3oNOKAw7FBZVWfEsgdC82c3CfSrfUbabQbDBQ8ouugXnf7ISm3MMYZgobjm6qKfDWhZeZMge4T_ihwBmU3_m0U6LF30GT-cS8DzRATZnvXJl8UYLXgdw"
                                    />
                                    <div
                                        class="mv-absolute mv-top-2 mv-left-2 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-ee71ca mv-font-bold mv-text-tertiary mv-tracking-wide text-uppercase d-flex align-items-center mv-gap-1"
                                    >
                                        <span class="mv-w-1p5 mv-h-1p5 mv-rounded-full mv-bg-tertiary"></span>
                                        4K UHD
                                    </div>
                                    <div
                                        class="mv-absolute mv-bottom-2 mv-right-2 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-ee71ca mv-font-bold mv-text-on-surface mv-tracking-wider"
                                    >
                                        166 MIN
                                    </div>
                                </div>
                                <!-- Details & Metadata -->
                                <div
                                    class="mv-flex-1 d-flex flex-column justify-content-between mv-w-full h-100 mv-gap-space-sm"
                                >
                                    <div>
                                        <div
                                            class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-xs mb-1"
                                        >
                                            <div class="d-flex align-items-center mv-gap-2">
                                                <span
                                                    class="mv-px-2p5 mv-py-0p5 mv-rounded-full mv-bg-tertiary-container_30 mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold d-flex align-items-center mv-gap-1p5"
                                                >
                                                    <span
                                                        class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-tertiary mv-animate-ping"
                                                    ></span>
                                                    Active Rental
                                                </span>
                                                <span class="mv-font-body-sm mv-text-body-sm mv-text-outline"
                                                    >• Rented on 25 Sep 2026</span
                                                >
                                            </div>
                                            <span
                                                class="mv-text-tertiary mv-font-label-md mv-text-label-md mv-font-bold d-flex align-items-center mv-gap-1 mv-bg-surface-container-highest mv-px-2 mv-py-0p5 mv-rounded"
                                            >
                                                <span class="material-symbols-outlined mv-text-58f475">schedule</span>
                                                36 Hours Remaining
                                            </span>
                                        </div>
                                        <h3
                                            class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors"
                                        >
                                            Dune: Part Two
                                        </h3>
                                        <p
                                            class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-line-clamp-2 mt-1"
                                        >
                                            Paul Atreides unites with Chani and the Fremen while seeking revenge against the
                                            conspirators who destroyed his family. Facing a choice between the love of his
                                            life and the fate of the universe.
                                        </p>
                                    </div>
                                    <!-- Technical Specs Badges -->
                                    <div class="d-flex flex-wrap align-items-center mv-gap-2 my-1">
                                        <span
                                            class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1"
                                        >
                                            <span class="material-symbols-outlined mv-text-0ddd99 mv-text-primary"
                                                >surround_sound</span
                                            >
                                            Dolby Atmos 5.1
                                        </span>
                                        <span
                                            class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1"
                                        >
                                            <span class="material-symbols-outlined mv-text-0ddd99 mv-text-primary"
                                                >closed_caption</span
                                            >
                                            English, Urdu Subs
                                        </span>
                                        <span
                                            class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1"
                                        >
                                            <span class="material-symbols-outlined mv-text-0ddd99 mv-text-tertiary"
                                                >offline_pin</span
                                            >
                                            Download Ready (7.2 GB)
                                        </span>
                                    </div>
                                    <!-- Action Bar -->
                                    <div
                                        class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-md mv-pt-space-xs"
                                    >
                                        <div class="d-flex align-items-center mv-gap-space-sm">
                                            <!-- Watch Online Button -->
                                            <a
                                                class="mv-px-space-lg mv-py-2p5 mv-rounded-full mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold d-flex align-items-center mv-gap-2 mv-shadow-6d62c9 mv-transition-all"
                                                href="/watch/1"
                                            >
                                                <span
                                                    class="material-symbols-outlined mv-text-27bd7e"
                                                    style="font-variation-settings: &quot;FILL&quot; 1"
                                                    >play_arrow</span
                                                >
                                                <span>Watch Online</span>
                                            </a>
                                            <!-- Download Button -->
                                            <button
                                                class="mv-px-space-md mv-py-2p5 mv-rounded-full mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-semibold d-flex align-items-center mv-gap-2 mv-transition-all"
                                                onclick="triggerDownloadModal('Dune: Part Two', '7.2 GB', '4K UHD • Dolby Atmos')"
                                            >
                                                <span class="material-symbols-outlined mv-text-c79a76">download</span>
                                                <span>Download</span>
                                            </button>
                                        </div>
                                        <div
                                            class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm"
                                        >
                                            <span class="material-symbols-outlined mv-text-58f475 mv-text-outline"
                                                >verified_user</span
                                            >
                                            <span>DRM Protected • Device Slot 1/5</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Movie 2: John Wick: Chapter 4 -->
                            <div
                                class="movie-card mv-bg-surface-container-low mv-hover-bg-surface-container mv-rounded-xl mv-p-space-md d-flex flex-column flex-md-row align-items-center mv-gap-space-lg mv-transition-all mv-shadow-md mv-group mv-relative overflow-hidden"
                                data-status="active"
                            >
                                <div class="mv-absolute start-0 top-0 bottom-0 mv-w-1p5 mv-bg-tertiary"></div>
                                <div
                                    class="mv-relative mv-w-full mv-md-w-44 mv-h-64 mv-md-h-60 mv-rounded-lg overflow-hidden flex-shrink-0 mv-shadow-lg mv-bg-surface-container-highest"
                                >
                                    <img
                                        class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                                        data-alt="Cinematic movie poster for John Wick Chapter 4 in rich neon obsidian tones featuring Keanu Reeves as John Wick holding a katana in front of the illuminated Eiffel tower at night in rain soaked Tokyo aesthetics"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5gYJZC_iTbUoKt_KGWvJ6RnxrPEJkSFvrZGPpFCejgV-psOAoZY5rllW7l2gTBs6-VKCNOp3f49kVqMrWKGhsi2lkJP3bhQv5XC76dSdJYUQ9CnUlg9gLkzJHlRWedA5d9TsRY7GlU0bS7ZDQiOJ5m94oD4xF-34pRif08d1IgShn9uiPgmdyNLJlSudT517Rp8_3UlJhXStZA9FeUqmngTEAmRxzeVETZDZPZQpEmr58LHFNJlkgEQ"
                                    />
                                    <div
                                        class="mv-absolute mv-top-2 mv-left-2 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-ee71ca mv-font-bold mv-text-secondary mv-tracking-wide text-uppercase d-flex align-items-center mv-gap-1"
                                    >
                                        <span class="mv-w-1p5 mv-h-1p5 mv-rounded-full mv-bg-secondary"></span>
                                        1080p FHD
                                    </div>
                                    <div
                                        class="mv-absolute mv-bottom-2 mv-right-2 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-ee71ca mv-font-bold mv-text-on-surface mv-tracking-wider"
                                    >
                                        169 MIN
                                    </div>
                                </div>
                                <div
                                    class="mv-flex-1 d-flex flex-column justify-content-between mv-w-full h-100 mv-gap-space-sm"
                                >
                                    <div>
                                        <div
                                            class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-xs mb-1"
                                        >
                                            <div class="d-flex align-items-center mv-gap-2">
                                                <span
                                                    class="mv-px-2p5 mv-py-0p5 mv-rounded-full mv-bg-tertiary-container_30 mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold d-flex align-items-center mv-gap-1p5"
                                                >
                                                    <span
                                                        class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-tertiary mv-animate-ping"
                                                    ></span>
                                                    Active Rental
                                                </span>
                                                <span class="mv-font-body-sm mv-text-body-sm mv-text-outline"
                                                    >• Rented on 20 Sep 2026</span
                                                >
                                            </div>
                                            <span
                                                class="mv-text-tertiary mv-font-label-md mv-text-label-md mv-font-bold d-flex align-items-center mv-gap-1 mv-bg-surface-container-highest mv-px-2 mv-py-0p5 mv-rounded"
                                            >
                                                <span class="material-symbols-outlined mv-text-58f475">schedule</span>
                                                18 Hours Remaining
                                            </span>
                                        </div>
                                        <h3
                                            class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors"
                                        >
                                            John Wick: Chapter 4
                                        </h3>
                                        <p
                                            class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-line-clamp-2 mt-1"
                                        >
                                            John Wick uncovers a path to defeating The High Table. But before he can earn
                                            his freedom, Wick must face off against a new enemy with powerful alliances
                                            across the globe.
                                        </p>
                                    </div>
                                    <!-- Technical Specs Badges -->
                                    <div class="d-flex flex-wrap align-items-center mv-gap-2 my-1">
                                        <span
                                            class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1"
                                        >
                                            <span class="material-symbols-outlined mv-text-0ddd99 mv-text-primary"
                                                >surround_sound</span
                                            >
                                            Dolby Digital Plus 7.1
                                        </span>
                                        <span
                                            class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1"
                                        >
                                            <span class="material-symbols-outlined mv-text-0ddd99 mv-text-primary"
                                                >closed_caption</span
                                            >
                                            English [CC]
                                        </span>
                                        <span
                                            class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1"
                                        >
                                            <span class="material-symbols-outlined mv-text-0ddd99 mv-text-tertiary"
                                                >check_circle</span
                                            >
                                            Downloaded on iPad Pro
                                        </span>
                                    </div>
                                    <!-- Action Bar -->
                                    <div
                                        class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-md mv-pt-space-xs"
                                    >
                                        <div class="d-flex align-items-center mv-gap-space-sm">
                                            <a
                                                class="mv-px-space-lg mv-py-2p5 mv-rounded-full mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold d-flex align-items-center mv-gap-2 mv-shadow-6d62c9 mv-transition-all"
                                                href="/watch/1"
                                            >
                                                <span
                                                    class="material-symbols-outlined mv-text-27bd7e"
                                                    style="font-variation-settings: &quot;FILL&quot; 1"
                                                    >play_arrow</span
                                                >
                                                <span>Watch Online</span>
                                            </a>
                                            <button
                                                class="mv-px-space-md mv-py-2p5 mv-rounded-full mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-semibold d-flex align-items-center mv-gap-2 mv-transition-all"
                                                onclick="triggerDownloadModal('John Wick: Chapter 4', '5.4 GB', '1080p FHD • 5.1 Audio')"
                                            >
                                                <span class="material-symbols-outlined mv-text-c79a76">download</span>
                                                <span>Download</span>
                                            </button>
                                        </div>
                                        <div
                                            class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm"
                                        >
                                            <span class="material-symbols-outlined mv-text-58f475 mv-text-tertiary"
                                                >sync</span
                                            >
                                            <span>Syncs playback across devices</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Movie 3: Fast X -->
                            <div
                                class="movie-card mv-bg-surface-container-low mv-hover-bg-surface-container mv-rounded-xl mv-p-space-md d-flex flex-column flex-md-row align-items-center mv-gap-space-lg mv-transition-all mv-shadow-md mv-group mv-relative overflow-hidden"
                                data-status="permanent"
                            >
                                <div class="mv-absolute start-0 top-0 bottom-0 mv-w-1p5 mv-bg-primary"></div>
                                <div
                                    class="mv-relative mv-w-full mv-md-w-44 mv-h-64 mv-md-h-60 mv-rounded-lg overflow-hidden flex-shrink-0 mv-shadow-lg mv-bg-surface-container-highest"
                                >
                                    <img
                                        class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500"
                                        data-alt="High adrenaline cinematic poster for Fast X action film showing muscle sports cars speeding through European city street explosions with fiery dramatic cinematic lighting and high octane visual tone"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDk9Zuq5LHPQqPzL0Jbos64mQcN_j3Od7kewFPt6FEqpSHjJMaJ7dOnV3lW7pIEYpfT7k0-_ITwvqLbTeUaiZcZ5yv6GQQOwz-wC79Qjw2vZvIRdeRsafpdoVYs1WydBs3M1gO1qst0uu3X87-xHnCn6ipesGS-9HINLUo-VOvLC-_vV9k7Bj2dgkQzG1EIkE5RE9zA9QzXUtYOgvYXaWot15tpI-aZGqNSej1vVNLT63ftHwnBZCNNSw"
                                    />
                                    <div
                                        class="mv-absolute mv-top-2 mv-left-2 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-ee71ca mv-font-bold mv-text-primary mv-tracking-wide text-uppercase d-flex align-items-center mv-gap-1"
                                    >
                                        <span class="mv-w-1p5 mv-h-1p5 mv-rounded-full mv-bg-primary"></span>
                                        4K UHD
                                    </div>
                                    <div
                                        class="mv-absolute mv-bottom-2 mv-right-2 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-ee71ca mv-font-bold mv-text-on-surface mv-tracking-wider"
                                    >
                                        142 MIN
                                    </div>
                                </div>
                                <div
                                    class="mv-flex-1 d-flex flex-column justify-content-between mv-w-full h-100 mv-gap-space-sm"
                                >
                                    <div>
                                        <div
                                            class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-xs mb-1"
                                        >
                                            <div class="d-flex align-items-center mv-gap-2">
                                                <span
                                                    class="mv-px-2p5 mv-py-0p5 mv-rounded-full mv-bg-primary_20 mv-text-primary mv-font-label-sm mv-text-label-sm mv-font-bold d-flex align-items-center mv-gap-1p5"
                                                >
                                                    <span class="material-symbols-outlined mv-text-0ddd99">lock_open</span>
                                                    Permanent TVOD License
                                                </span>
                                                <span class="mv-font-body-sm mv-text-body-sm mv-text-outline"
                                                    >• Purchased on 15 Sep 2026</span
                                                >
                                            </div>
                                            <span
                                                class="mv-text-primary mv-font-label-md mv-text-label-md mv-font-bold d-flex align-items-center mv-gap-1 mv-bg-surface-container-highest mv-px-2 mv-py-0p5 mv-rounded"
                                            >
                                                <span class="material-symbols-outlined mv-text-58f475">all_inclusive</span>
                                                Lifetime Access
                                            </span>
                                        </div>
                                        <h3
                                            class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors"
                                        >
                                            Fast X
                                        </h3>
                                        <p
                                            class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-line-clamp-2 mt-1"
                                        >
                                            Over many missions and against impossible odds, Dom Toretto and his family have
                                            outsmarted, out-nerved and outdriven every foe in their path. Now, they confront
                                            their lethal past.
                                        </p>
                                    </div>
                                    <!-- Technical Specs Badges -->
                                    <div class="d-flex flex-wrap align-items-center mv-gap-2 my-1">
                                        <span
                                            class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1"
                                        >
                                            <span class="material-symbols-outlined mv-text-0ddd99 mv-text-primary"
                                                >surround_sound</span
                                            >
                                            Dolby Atmos
                                        </span>
                                        <span
                                            class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1"
                                        >
                                            <span class="material-symbols-outlined mv-text-0ddd99 mv-text-primary"
                                                >closed_caption</span
                                            >
                                            Multi-Language Subtitles
                                        </span>
                                        <span
                                            class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1"
                                        >
                                            <span class="material-symbols-outlined mv-text-0ddd99 mv-text-primary">hd</span>
                                            HDR10+ Master
                                        </span>
                                    </div>
                                    <!-- Action Bar -->
                                    <div
                                        class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-md mv-pt-space-xs"
                                    >
                                        <div class="d-flex align-items-center mv-gap-space-sm">
                                            <a
                                                class="mv-px-space-lg mv-py-2p5 mv-rounded-full mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold d-flex align-items-center mv-gap-2 mv-shadow-6d62c9 mv-transition-all"
                                                href="/watch/1"
                                            >
                                                <span
                                                    class="material-symbols-outlined mv-text-27bd7e"
                                                    style="font-variation-settings: &quot;FILL&quot; 1"
                                                    >play_arrow</span
                                                >
                                                <span>Watch Online</span>
                                            </a>
                                            <button
                                                class="mv-px-space-md mv-py-2p5 mv-rounded-full mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-semibold d-flex align-items-center mv-gap-2 mv-transition-all"
                                                onclick="triggerDownloadModal('Fast X', '8.9 GB', '4K UHD HDR • Multi-Audio')"
                                            >
                                                <span class="material-symbols-outlined mv-text-c79a76">download</span>
                                                <span>Download (8.9 GB)</span>
                                            </button>
                                        </div>
                                        <div
                                            class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm"
                                        >
                                            <span class="material-symbols-outlined mv-text-58f475 mv-text-outline"
                                                >storage</span
                                            >
                                            <span>Personal Media Vault</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Additional Feature Card: Upsell & Discover Grid Banner -->
                        <!-- <div
                            class="mv-bg-gradient-to-r mv-from-surface-container-high mv-via-surface-container mv-to-surface-container-high mv-rounded-xl mv-p-space-lg d-flex flex-column flex-md-row align-items-center justify-content-between mv-gap-space-lg mv-shadow-lg mv-relative overflow-hidden"
                        >
                            <div class="d-flex align-items-center mv-gap-space-md">
                                <div
                                    class="mv-w-14 mv-h-14 mv-rounded-xl mv-bg-primary_20 d-flex align-items-center justify-content-center flex-shrink-0"
                                >
                                    <span class="material-symbols-outlined mv-text-primary mv-text-8ef75b"
                                        >local_fire_department</span
                                    >
                                </div>
                                <div class="d-flex flex-column">
                                    <h4 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">
                                        Need more blockbusters?
                                    </h4>
                                    <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant">
                                        Browse our expanding catalog of 800+ 4K Hollywood, Bollywood, and Pakistani cinema
                                        releases.
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mv-gap-space-sm flex-shrink-0">
                                <a
                                    class="mv-px-space-lg mv-py-2p5 mv-rounded-full mv-bg-surface-bright mv-hover-bg-surface-container-highest mv-text-on-surface mv-font-label-lg mv-text-label-lg mv-font-bold mv-transition-all d-flex align-items-center mv-gap-1p5"
                                    href="/movies"
                                >
                                    <span>Browse Catalog</span>
                                    <span class="material-symbols-outlined mv-text-c79a76">arrow_forward</span>
                                </a>
                            </div>
                        </div> -->
                    </section>
            </div>
            <!-- Download Quality Selection Modal (Overlay) -->
            <div
                class="mv-fixed mv-inset-0 mv-z-50 d-flex align-items-center justify-content-center mv-bg-surface-container-lowest_80 mv-backdrop-blur-md d-none mv-transition-opacity"
                id="download-modal"
            >
                <div
                    class="mv-bg-surface-container-low mv-rounded-xl mv-max-w-lg mv-w-full mx-3 mv-p-space-lg d-flex flex-column mv-gap-space-md mv-shadow-2xl mv-relative"
                >
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center mv-gap-2">
                            <span class="material-symbols-outlined mv-text-primary mv-text-59700f">download</span>
                            <h3 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">
                                Download for Offline
                            </h3>
                        </div>
                        <button
                            class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container mv-hover-bg-surface-bright d-flex align-items-center justify-content-center mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors"
                            onclick="closeDownloadModal()"
                        >
                            <span class="material-symbols-outlined mv-text-c79a76">close</span>
                        </button>
                    </div>
                    <div class="mv-bg-surface-container mv-rounded-lg mv-p-space-md d-flex flex-column mv-gap-1">
                        <span class="mv-font-label-sm mv-text-label-sm mv-text-outline">Selected Title</span>
                        <h4
                            class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface"
                            id="modal-movie-title"
                        >
                            Dune: Part Two
                        </h4>
                        <span class="mv-font-body-sm mv-text-body-sm mv-text-primary" id="modal-movie-specs"
                            >4K UHD • Dolby Atmos</span
                        >
                    </div>
                    <div class="d-flex flex-column mv-gap-space-sm">
                        <label class="mv-font-label-md mv-text-label-md mv-text-on-surface mv-font-semibold"
                            >Select Bitrate &amp; Resolution</label
                        >
                        <div class="d-grid mv-grid-cols-1 mv-gap-2">
                            <label
                                class="d-flex align-items-center justify-content-between mv-p-space-sm mv-rounded-lg mv-bg-surface-container mv-cursor-pointer mv-hover-bg-surface-bright mv-transition-colors"
                            >
                                <div class="d-flex align-items-center mv-gap-space-sm">
                                    <input
                                        checked=""
                                        class="mv-accent-primary"
                                        name="download-res"
                                        type="radio"
                                        value="4k"
                                    />
                                    <div class="d-flex flex-column">
                                        <span class="mv-font-label-md mv-text-label-md mv-font-bold mv-text-on-surface"
                                            >Ultra HD (4K HDR)</span
                                        >
                                        <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant"
                                            >Recommended for TVs &amp; iPads • High dynamic range</span
                                        >
                                    </div>
                                </div>
                                <span class="mv-font-label-md mv-text-label-md mv-text-primary mv-font-bold">~7.2 GB</span>
                            </label>
                            <label
                                class="d-flex align-items-center justify-content-between mv-p-space-sm mv-rounded-lg mv-bg-surface-container mv-cursor-pointer mv-hover-bg-surface-bright mv-transition-colors"
                            >
                                <div class="d-flex align-items-center mv-gap-space-sm">
                                    <input class="mv-accent-primary" name="download-res" type="radio" value="1080p" />
                                    <div class="d-flex flex-column">
                                        <span class="mv-font-label-md mv-text-label-md mv-font-bold mv-text-on-surface"
                                            >Full HD (1080p)</span
                                        >
                                        <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant"
                                            >Balanced quality • Standard audio 5.1</span
                                        >
                                    </div>
                                </div>
                                <span class="mv-font-label-md mv-text-label-md mv-text-on-surface mv-font-bold"
                                    >~3.8 GB</span
                                >
                            </label>
                            <label
                                class="d-flex align-items-center justify-content-between mv-p-space-sm mv-rounded-lg mv-bg-surface-container mv-cursor-pointer mv-hover-bg-surface-bright mv-transition-colors"
                            >
                                <div class="d-flex align-items-center mv-gap-space-sm">
                                    <input class="mv-accent-primary" name="download-res" type="radio" value="720p" />
                                    <div class="d-flex flex-column">
                                        <span class="mv-font-label-md mv-text-label-md mv-font-bold mv-text-on-surface"
                                            >Mobile Data Saver (720p)</span
                                        >
                                        <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant"
                                            >Faster download • Best for phones</span
                                        >
                                    </div>
                                </div>
                                <span class="mv-font-label-md mv-text-label-md mv-text-on-surface mv-font-bold"
                                    >~1.4 GB</span
                                >
                            </label>
                        </div>
                    </div>
                    <!-- Device Slot Info -->
                    <div
                        class="mv-bg-surface-container-high_60 mv-rounded-lg mv-p-space-sm d-flex align-items-center justify-content-between mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm"
                    >
                        <span class="d-flex align-items-center mv-gap-1p5">
                            <span class="material-symbols-outlined mv-text-tertiary mv-text-58f475">check_circle</span>
                            Slot 2 of 5 authorized devices
                        </span>
                        <a class="mv-text-primary mv-hover-underline" href="/watch/1">Manage Slots</a>
                    </div>
                    <!-- Action Buttons -->
                    <div class="d-flex align-items-center justify-content-end mv-gap-space-sm mv-pt-space-xs">
                        <button
                            class="mv-px-space-md mv-py-2 mv-rounded-full mv-bg-surface-container mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-colors"
                            onclick="closeDownloadModal()"
                        >
                            Cancel
                        </button>
                        <button
                            class="mv-px-space-lg mv-py-2 mv-rounded-full mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-md mv-text-label-md mv-font-bold d-flex align-items-center mv-gap-1p5 mv-shadow-6a1071 mv-transition-all"
                            onclick="startDownloadSimulation()"
                        >
                            <span class="material-symbols-outlined mv-text-c79a76">file_download</span>
                            <span>Start Download</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
      </main>

    <Footer />
  </AppLayout>
</template>

<script>
import { onMounted } from 'vue';
import AppLayout from '../../layouts/AppLayout.vue';
import Header from '../../layouts/SiteMenu.vue';
import Footer from '../../layouts/SiteFooter.vue';



export default {
    name: 'MyMoviesPage',
    components: {
        AppLayout,
        Header,
        Footer
    },
};
</script>
