<template>
<main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100"><div class="d-flex flex-column mv-w-full">
<div class="mv-w-full mv-px-margin-mobile mv-sm-px-margin mv-py-space-lg">
<!-- Breadcrumb & Top Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-md mb-4">
<div class="d-flex align-items-center mv-gap-space-xs mv-font-label-md mv-text-label-md mv-text-on-surface-variant">
<a class="mv-hover-text-primary mv-transition-colors d-flex align-items-center mv-gap-1" href="/wallet">
<span class="material-symbols-outlined mv-text-58f475">home</span>
<span>Account</span>
</a>
<span class="mv-text-outline">/</span>
<span class="mv-text-on-surface mv-font-semibold">My Movies</span>
</div>
<div class="d-flex align-items-center mv-gap-space-sm">
<div class="d-flex align-items-center mv-gap-2 mv-bg-surface-container mv-px-space-md mv-py-1p5 mv-rounded-full mv-shadow-sm">
<span class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-tertiary mv-animate-pulse"></span>
<span class="mv-font-label-md mv-text-label-md mv-text-on-surface">Offline Storage: <span class="mv-text-primary mv-font-bold">14.2 GB / 64 GB</span></span>
</div>
<button class="mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-px-space-md mv-py-1p5 mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-1p5 mv-transition-colors">
<span class="material-symbols-outlined mv-text-58f475 mv-text-secondary">devices</span>
<span>2/5 Devices</span>
</button>
</div>
</div>
<!-- Main Grid: Left Side Navigation + Main Content Area -->
<div class="d-grid mv-grid-cols-1 mv-lg-grid-cols-12 mv-gap-gutter-mobile mv-sm-gap-gutter align-items-start">
<!-- Account Dashboard Sidebar -->
<aside class="mv-lg-col-span-3 mv-w-full mv-bg-surface-container-low mv-rounded-xl mv-p-space-md d-flex flex-column mv-gap-space-lg mv-shadow-md">
<!-- User Brief Profile -->
<div class="d-flex align-items-center mv-gap-space-md mv-p-space-sm mv-rounded-lg mv-bg-surface-container">
<div class="mv-relative mv-w-12 mv-h-12 mv-rounded-full mv-bg-primary-container d-flex align-items-center justify-content-center mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-shadow-inner">
            AK
            <span class="mv-absolute bottom-0 end-0 mv-w-3p5 mv-h-3p5 mv-rounded-full mv-bg-tertiary mv-ring-2 mv-ring-surface-container"></span>
</div>
<div class="d-flex flex-column mv-min-w-0">
<h2 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">Ali Khan</h2>
<div class="d-flex align-items-center mv-gap-1 mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm">
<span class="material-symbols-outlined mv-text-0ddd99 mv-text-tertiary">verified</span>
<span>Ultra HD Member</span>
</div>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline mv-mt-0p5 text-truncate">ali.khan@streamhub.io</span>
</div>
</div>
<!-- Navigation Menu Links -->
<nav class="d-flex flex-column mv-gap-1">
<a class="d-flex align-items-center justify-content-between mv-px-space-md mv-py-2p5 mv-rounded-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-all mv-group" href="/wallet">
<div class="d-flex align-items-center mv-gap-space-md">
<span class="material-symbols-outlined mv-text-outline mv-group-hover-text-primary mv-transition-colors mv-text-27bd7e">dashboard</span>
<span class="mv-font-label-lg mv-text-label-lg">Dashboard</span>
</div>
</a>
<!-- Active Route: My Movies -->
<a class="d-flex align-items-center justify-content-between mv-px-space-md mv-py-2p5 mv-rounded-lg mv-bg-primary-container_20 mv-text-primary mv-font-semibold mv-shadow-sm mv-transition-all" href="/my-movies">
<div class="d-flex align-items-center mv-gap-space-md">
<span class="material-symbols-outlined mv-text-primary mv-text-27bd7e" style="font-variation-settings: 'FILL' 1;">movie</span>
<span class="mv-font-label-lg mv-text-label-lg mv-text-on-surface">My Movies</span>
</div>
<span class="mv-bg-primary mv-text-white mv-px-2 mv-py-0p5 mv-rounded-full mv-font-label-sm mv-text-label-sm mv-font-bold">4</span>
</a>
<a class="d-flex align-items-center justify-content-between mv-px-space-md mv-py-2p5 mv-rounded-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-all mv-group" href="/wallet">
<div class="d-flex align-items-center mv-gap-space-md">
<span class="material-symbols-outlined mv-text-outline mv-group-hover-text-tertiary mv-transition-colors mv-text-27bd7e">account_balance_wallet</span>
<span class="mv-font-label-lg mv-text-label-lg">Wallet &amp; Credits</span>
</div>
<span class="mv-font-label-sm mv-text-label-sm mv-text-tertiary mv-font-bold">Rs. 300</span>
</a>
<a class="d-flex align-items-center justify-content-between mv-px-space-md mv-py-2p5 mv-rounded-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-all mv-group" href="/payment/success">
<div class="d-flex align-items-center mv-gap-space-md">
<span class="material-symbols-outlined mv-text-outline mv-group-hover-text-primary mv-transition-colors mv-text-27bd7e">receipt_long</span>
<span class="mv-font-label-lg mv-text-label-lg">Purchase History</span>
</div>
</a>
<a class="d-flex align-items-center justify-content-between mv-px-space-md mv-py-2p5 mv-rounded-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-all mv-group" href="/my-movies">
<div class="d-flex align-items-center mv-gap-space-md">
<span class="material-symbols-outlined mv-text-outline mv-group-hover-text-primary mv-transition-colors mv-text-27bd7e">bookmark</span>
<span class="mv-font-label-lg mv-text-label-lg">Watchlist</span>
</div>
<span class="mv-bg-surface-container-high mv-text-on-surface-variant mv-px-2 mv-py-0p5 mv-rounded-full mv-font-label-sm mv-text-label-sm">12</span>
</a>
<a class="d-flex align-items-center justify-content-between mv-px-space-md mv-py-2p5 mv-rounded-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-all mv-group" href="/wallet">
<div class="d-flex align-items-center mv-gap-space-md">
<span class="material-symbols-outlined mv-text-outline mv-group-hover-text-primary mv-transition-colors mv-text-27bd7e">manage_accounts</span>
<span class="mv-font-label-lg mv-text-label-lg">Profile</span>
</div>
</a>
<a class="d-flex align-items-center justify-content-between mv-px-space-md mv-py-2p5 mv-rounded-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-all mv-group" href="/wallet">
<div class="d-flex align-items-center mv-gap-space-md">
<span class="material-symbols-outlined mv-text-outline mv-group-hover-text-primary mv-transition-colors mv-text-27bd7e">settings</span>
<span class="mv-font-label-lg mv-text-label-lg">Settings</span>
</div>
</a>
</nav>
<!-- Quick Summary Box -->
<div class="mv-bg-surface-container mv-rounded-lg mv-p-space-md d-flex flex-column mv-gap-space-xs mv-relative overflow-hidden">
<div class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-primary_10 mv-rounded-full mv-blur-xl pe-none"></div>
<span class="mv-font-label-sm mv-text-label-sm mv-text-outline text-uppercase mv-tracking-wider">Account Tier</span>
<p class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold">TVOD Unlimited Pass</p>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Instant playback on Web, Apple TV, Android TV and iOS devices.</p>
<div class="mt-2 mv-pt-space-xs d-flex align-items-center justify-content-between mv-text-tertiary mv-font-label-sm mv-text-label-sm">
<span>HD + 4K HDR Enabled</span>
<span class="material-symbols-outlined mv-text-58f475">high_quality</span>
</div>
</div>
<!-- Logout Action -->
<button class="d-flex align-items-center mv-gap-space-md mv-px-space-md mv-py-2 mv-rounded-lg mv-text-error mv-hover-bg-error-container_20 mv-transition-colors mv-w-full text-start">
<span class="material-symbols-outlined mv-text-27bd7e">logout</span>
<a href="/browse" class="mv-font-label-lg mv-text-label-lg mv-font-semibold">Sign Out</a>
</button>
</aside>
<!-- Main Library Content Pane -->
<section class="mv-lg-col-span-9 d-flex flex-column mv-gap-space-lg">
<!-- Header Banner & Active Rental Status -->
<div class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-lg d-flex flex-column flex-md-row align-items-md-center justify-content-between mv-gap-space-md mv-shadow-md mv-relative overflow-hidden">
<div class="mv-absolute top-0 end-0 mv-w-80 h-100 mv-bg-gradient-to-l mv-from-primary_10 mv-via-primary-container_5 mv-to-transparent pe-none"></div>
<div class="d-flex flex-column mv-gap-space-xs mv-z-10">
<div class="d-flex align-items-center mv-gap-2">
<span class="mv-px-2p5 mv-py-0p5 mv-rounded-full mv-bg-tertiary_20 mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold text-uppercase mv-tracking-wider">Active Library</span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">• 4 Unlocked Licenses</span>
</div>
<h1 class="mv-font-headline-lg-mobile mv-sm-font-headline-lg mv-text-headline-lg-mobile mv-sm-text-headline-lg mv-font-extrabold mv-text-on-surface mv-tracking-tight">Your Purchased &amp; Rented Titles</h1>
<p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant mv-max-w-xl">
              Instant 48h high-bitrate streaming and encrypted offline downloads ready. Stream in native 4K UHD with Dolby Atmos audio tracks.
            </p>
</div>
<div class="d-flex flex-row flex-md-column align-items-start align-items-md-end justify-content-between mv-gap-space-sm mv-z-10 flex-shrink-0">
<div class="mv-bg-surface-container mv-px-space-md mv-py-space-sm mv-rounded-lg text-end">
<span class="mv-font-label-sm mv-text-label-sm mv-text-outline d-block">Active Rentals Expiration</span>
<span class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-tertiary d-flex align-items-center justify-content-md-end mv-gap-1">
<span class="material-symbols-outlined mv-text-c79a76">timer</span>
                36h Remaining
              </span>
</div>
<a class="mv-font-label-md mv-text-label-md mv-text-primary mv-hover-text-secondary-fixed d-flex align-items-center mv-gap-1 mv-transition-colors" href="/browse#legal">
<span>View Rental Policy</span>
<span class="material-symbols-outlined mv-text-0ddd99">arrow_forward</span>
</a>
</div>
</div>
<!-- Filter, Sort & Search Toolbar -->
<div class="mv-bg-surface-container mv-rounded-xl mv-p-space-md d-flex flex-column flex-md-row align-items-center justify-content-between mv-gap-space-md mv-shadow-sm">
<!-- Filter Tabs -->
<div class="d-flex align-items-center mv-gap-space-xs mv-w-full mv-md-w-auto overflow-x-auto mv-pb-1 mv-md-pb-0" id="filter-tabs">
<button class="filter-btn active mv-px-space-md mv-py-1p5 mv-rounded-full mv-font-label-md mv-text-label-md mv-font-semibold mv-bg-primary mv-text-white mv-transition-all">
              All Titles (4)
            </button>
<button class="filter-btn mv-px-space-md mv-py-1p5 mv-rounded-full mv-font-label-md mv-text-label-md mv-font-semibold mv-bg-surface-container-high mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-bright mv-transition-all">
              Active Rentals (2)
            </button>
<button class="filter-btn mv-px-space-md mv-py-1p5 mv-rounded-full mv-font-label-md mv-text-label-md mv-font-semibold mv-bg-surface-container-high mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-bright mv-transition-all">
              Permanent Owned (1)
            </button>
<button class="filter-btn mv-px-space-md mv-py-1p5 mv-rounded-full mv-font-label-md mv-text-label-md mv-font-semibold mv-bg-surface-container-high mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-bright mv-transition-all">
              Expired (1)
            </button>
</div>
<!-- Search & Display Mode -->
<div class="d-flex align-items-center mv-gap-space-sm mv-w-full mv-md-w-auto">
<div class="mv-relative mv-flex-1 mv-md-w-64">
<span class="material-symbols-outlined mv-absolute mv-left-3 mv-top-2p5 mv-text-outline mv-text-c79a76">search</span>
<input class="mv-w-full mv-bg-surface-container-lowest mv-text-on-surface mv-placeholder-text-outline mv-font-body-sm mv-text-body-sm mv-pl-9 mv-pr-space-md mv-py-2 mv-rounded-lg mv-focus-outline-none mv-focus-ring-1 mv-focus-ring-primary mv-transition-all" id="movie-search" placeholder="Search your library..." type="text"/>
</div>
<button class="mv-p-2 mv-rounded-lg mv-bg-surface-container-high mv-text-primary mv-hover-bg-surface-bright mv-transition-colors" title="Grid Layout">
<span class="material-symbols-outlined mv-text-27bd7e">view_module</span>
</button>
<button class="mv-p-2 mv-rounded-lg mv-bg-surface-container-high mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" title="List Layout">
<span class="material-symbols-outlined mv-text-27bd7e">view_list</span>
</button>
</div>
</div>
<!-- Purchased Movies List -->
<div class="d-flex flex-column mv-gap-space-md" id="movies-container">
<!-- Movie 1: Dune: Part Two -->
<div class="movie-card mv-bg-surface-container-low mv-hover-bg-surface-container mv-rounded-xl mv-p-space-md d-flex flex-column flex-md-row align-items-center mv-gap-space-lg mv-transition-all mv-shadow-md mv-group mv-relative overflow-hidden" data-status="active">
<!-- Decorative Accent line -->
<div class="mv-absolute start-0 top-0 bottom-0 mv-w-1p5 mv-bg-tertiary"></div>
<!-- Poster -->
<div class="mv-relative mv-w-full mv-md-w-44 mv-h-64 mv-md-h-60 mv-rounded-lg overflow-hidden flex-shrink-0 mv-shadow-lg mv-bg-surface-container-highest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Official dramatic cinematic film poster of Dune Part Two in ultra high definition featuring Paul Atreides standing in a golden desert sunstorm with futuristic sci-fi armor and glowing blue spice eyes, cinematic warm dust atmospheric movie still" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBuIRMdD4427PXLlUxyTNrI7yStRMthZw6MqDD3bIZWvzkU-3P4r2fdjEKThZXhjcrQHZBdK7JsKpiO25xTiW_5jH2jie1b8qWXrWcKjimkwt7-4sMLRBt2IrmxaF6iN0BApJ3oNOKAw7FBZVWfEsgdC82c3CfSrfUbabQbDBQ8ouugXnf7ISm3MMYZgobjm6qKfDWhZeZMge4T_ihwBmU3_m0U6LF30GT-cS8DzRATZnvXJl8UYLXgdw"/>
<div class="mv-absolute mv-top-2 mv-left-2 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-ee71ca mv-font-bold mv-text-tertiary mv-tracking-wide text-uppercase d-flex align-items-center mv-gap-1">
<span class="mv-w-1p5 mv-h-1p5 mv-rounded-full mv-bg-tertiary"></span>
                4K UHD
              </div>
<div class="mv-absolute mv-bottom-2 mv-right-2 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-ee71ca mv-font-bold mv-text-on-surface mv-tracking-wider">
                166 MIN
              </div>
</div>
<!-- Details & Metadata -->
<div class="mv-flex-1 d-flex flex-column justify-content-between mv-w-full h-100 mv-gap-space-sm">
<div>
<div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-xs mb-1">
<div class="d-flex align-items-center mv-gap-2">
<span class="mv-px-2p5 mv-py-0p5 mv-rounded-full mv-bg-tertiary-container_30 mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold d-flex align-items-center mv-gap-1p5">
<span class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-tertiary mv-animate-ping"></span>
                      Active Rental
                    </span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline">• Rented on 25 Sep 2026</span>
</div>
<span class="mv-text-tertiary mv-font-label-md mv-text-label-md mv-font-bold d-flex align-items-center mv-gap-1 mv-bg-surface-container-highest mv-px-2 mv-py-0p5 mv-rounded">
<span class="material-symbols-outlined mv-text-58f475">schedule</span>
                    36 Hours Remaining
                  </span>
</div>
<h3 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors">Dune: Part Two</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-line-clamp-2 mt-1">
                  Paul Atreides unites with Chani and the Fremen while seeking revenge against the conspirators who destroyed his family. Facing a choice between the love of his life and the fate of the universe.
                </p>
</div>
<!-- Technical Specs Badges -->
<div class="d-flex flex-wrap align-items-center mv-gap-2 my-1">
<span class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99 mv-text-primary">surround_sound</span> Dolby Atmos 5.1
                </span>
<span class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99 mv-text-primary">closed_caption</span> English, Urdu Subs
                </span>
<span class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99 mv-text-tertiary">offline_pin</span> Download Ready (7.2 GB)
                </span>
</div>
<!-- Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-md mv-pt-space-xs">
<div class="d-flex align-items-center mv-gap-space-sm">
<!-- Watch Online Button -->
<a class="mv-px-space-lg mv-py-2p5 mv-rounded-full mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold d-flex align-items-center mv-gap-2 mv-shadow-6d62c9 mv-transition-all" href="/watch/1">
<span class="material-symbols-outlined mv-text-27bd7e" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
<span>Watch Online</span>
</a>
<!-- Download Button -->
<button class="mv-px-space-md mv-py-2p5 mv-rounded-full mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-semibold d-flex align-items-center mv-gap-2 mv-transition-all" onclick="triggerDownloadModal('Dune: Part Two', '7.2 GB', '4K UHD • Dolby Atmos')">
<span class="material-symbols-outlined mv-text-c79a76">download</span>
<span>Download</span>
</button>
</div>
<div class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm">
<span class="material-symbols-outlined mv-text-58f475 mv-text-outline">verified_user</span>
<span>DRM Protected • Device Slot 1/5</span>
</div>
</div>
</div>
</div>
<!-- Movie 2: John Wick: Chapter 4 -->
<div class="movie-card mv-bg-surface-container-low mv-hover-bg-surface-container mv-rounded-xl mv-p-space-md d-flex flex-column flex-md-row align-items-center mv-gap-space-lg mv-transition-all mv-shadow-md mv-group mv-relative overflow-hidden" data-status="active">
<div class="mv-absolute start-0 top-0 bottom-0 mv-w-1p5 mv-bg-tertiary"></div>
<div class="mv-relative mv-w-full mv-md-w-44 mv-h-64 mv-md-h-60 mv-rounded-lg overflow-hidden flex-shrink-0 mv-shadow-lg mv-bg-surface-container-highest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Cinematic movie poster for John Wick Chapter 4 in rich neon obsidian tones featuring Keanu Reeves as John Wick holding a katana in front of the illuminated Eiffel tower at night in rain soaked Tokyo aesthetics" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5gYJZC_iTbUoKt_KGWvJ6RnxrPEJkSFvrZGPpFCejgV-psOAoZY5rllW7l2gTBs6-VKCNOp3f49kVqMrWKGhsi2lkJP3bhQv5XC76dSdJYUQ9CnUlg9gLkzJHlRWedA5d9TsRY7GlU0bS7ZDQiOJ5m94oD4xF-34pRif08d1IgShn9uiPgmdyNLJlSudT517Rp8_3UlJhXStZA9FeUqmngTEAmRxzeVETZDZPZQpEmr58LHFNJlkgEQ"/>
<div class="mv-absolute mv-top-2 mv-left-2 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-ee71ca mv-font-bold mv-text-secondary mv-tracking-wide text-uppercase d-flex align-items-center mv-gap-1">
<span class="mv-w-1p5 mv-h-1p5 mv-rounded-full mv-bg-secondary"></span>
                1080p FHD
              </div>
<div class="mv-absolute mv-bottom-2 mv-right-2 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-ee71ca mv-font-bold mv-text-on-surface mv-tracking-wider">
                169 MIN
              </div>
</div>
<div class="mv-flex-1 d-flex flex-column justify-content-between mv-w-full h-100 mv-gap-space-sm">
<div>
<div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-xs mb-1">
<div class="d-flex align-items-center mv-gap-2">
<span class="mv-px-2p5 mv-py-0p5 mv-rounded-full mv-bg-tertiary-container_30 mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold d-flex align-items-center mv-gap-1p5">
<span class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-tertiary mv-animate-ping"></span>
                      Active Rental
                    </span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline">• Rented on 20 Sep 2026</span>
</div>
<span class="mv-text-tertiary mv-font-label-md mv-text-label-md mv-font-bold d-flex align-items-center mv-gap-1 mv-bg-surface-container-highest mv-px-2 mv-py-0p5 mv-rounded">
<span class="material-symbols-outlined mv-text-58f475">schedule</span>
                    18 Hours Remaining
                  </span>
</div>
<h3 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors">John Wick: Chapter 4</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-line-clamp-2 mt-1">
                  John Wick uncovers a path to defeating The High Table. But before he can earn his freedom, Wick must face off against a new enemy with powerful alliances across the globe.
                </p>
</div>
<!-- Technical Specs Badges -->
<div class="d-flex flex-wrap align-items-center mv-gap-2 my-1">
<span class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99 mv-text-primary">surround_sound</span> Dolby Digital Plus 7.1
                </span>
<span class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99 mv-text-primary">closed_caption</span> English [CC]
                </span>
<span class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99 mv-text-tertiary">check_circle</span> Downloaded on iPad Pro
                </span>
</div>
<!-- Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-md mv-pt-space-xs">
<div class="d-flex align-items-center mv-gap-space-sm">
<a class="mv-px-space-lg mv-py-2p5 mv-rounded-full mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold d-flex align-items-center mv-gap-2 mv-shadow-6d62c9 mv-transition-all" href="/watch/1">
<span class="material-symbols-outlined mv-text-27bd7e" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
<span>Watch Online</span>
</a>
<button class="mv-px-space-md mv-py-2p5 mv-rounded-full mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-semibold d-flex align-items-center mv-gap-2 mv-transition-all" onclick="triggerDownloadModal('John Wick: Chapter 4', '5.4 GB', '1080p FHD • 5.1 Audio')">
<span class="material-symbols-outlined mv-text-c79a76">download</span>
<span>Download</span>
</button>
</div>
<div class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm">
<span class="material-symbols-outlined mv-text-58f475 mv-text-tertiary">sync</span>
<span>Syncs playback across devices</span>
</div>
</div>
</div>
</div>
<!-- Movie 3: Fast X -->
<div class="movie-card mv-bg-surface-container-low mv-hover-bg-surface-container mv-rounded-xl mv-p-space-md d-flex flex-column flex-md-row align-items-center mv-gap-space-lg mv-transition-all mv-shadow-md mv-group mv-relative overflow-hidden" data-status="permanent">
<div class="mv-absolute start-0 top-0 bottom-0 mv-w-1p5 mv-bg-primary"></div>
<div class="mv-relative mv-w-full mv-md-w-44 mv-h-64 mv-md-h-60 mv-rounded-lg overflow-hidden flex-shrink-0 mv-shadow-lg mv-bg-surface-container-highest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="High adrenaline cinematic poster for Fast X action film showing muscle sports cars speeding through European city street explosions with fiery dramatic cinematic lighting and high octane visual tone" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDk9Zuq5LHPQqPzL0Jbos64mQcN_j3Od7kewFPt6FEqpSHjJMaJ7dOnV3lW7pIEYpfT7k0-_ITwvqLbTeUaiZcZ5yv6GQQOwz-wC79Qjw2vZvIRdeRsafpdoVYs1WydBs3M1gO1qst0uu3X87-xHnCn6ipesGS-9HINLUo-VOvLC-_vV9k7Bj2dgkQzG1EIkE5RE9zA9QzXUtYOgvYXaWot15tpI-aZGqNSej1vVNLT63ftHwnBZCNNSw"/>
<div class="mv-absolute mv-top-2 mv-left-2 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-ee71ca mv-font-bold mv-text-primary mv-tracking-wide text-uppercase d-flex align-items-center mv-gap-1">
<span class="mv-w-1p5 mv-h-1p5 mv-rounded-full mv-bg-primary"></span>
                4K UHD
              </div>
<div class="mv-absolute mv-bottom-2 mv-right-2 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-ee71ca mv-font-bold mv-text-on-surface mv-tracking-wider">
                142 MIN
              </div>
</div>
<div class="mv-flex-1 d-flex flex-column justify-content-between mv-w-full h-100 mv-gap-space-sm">
<div>
<div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-xs mb-1">
<div class="d-flex align-items-center mv-gap-2">
<span class="mv-px-2p5 mv-py-0p5 mv-rounded-full mv-bg-primary_20 mv-text-primary mv-font-label-sm mv-text-label-sm mv-font-bold d-flex align-items-center mv-gap-1p5">
<span class="material-symbols-outlined mv-text-0ddd99">lock_open</span>
                      Permanent TVOD License
                    </span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline">• Purchased on 15 Sep 2026</span>
</div>
<span class="mv-text-primary mv-font-label-md mv-text-label-md mv-font-bold d-flex align-items-center mv-gap-1 mv-bg-surface-container-highest mv-px-2 mv-py-0p5 mv-rounded">
<span class="material-symbols-outlined mv-text-58f475">all_inclusive</span>
                    Lifetime Access
                  </span>
</div>
<h3 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors">Fast X</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-line-clamp-2 mt-1">
                  Over many missions and against impossible odds, Dom Toretto and his family have outsmarted, out-nerved and outdriven every foe in their path. Now, they confront their lethal past.
                </p>
</div>
<!-- Technical Specs Badges -->
<div class="d-flex flex-wrap align-items-center mv-gap-2 my-1">
<span class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99 mv-text-primary">surround_sound</span> Dolby Atmos
                </span>
<span class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99 mv-text-primary">closed_caption</span> Multi-Language Subtitles
                </span>
<span class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99 mv-text-primary">hd</span> HDR10+ Master
                </span>
</div>
<!-- Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-md mv-pt-space-xs">
<div class="d-flex align-items-center mv-gap-space-sm">
<a class="mv-px-space-lg mv-py-2p5 mv-rounded-full mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold d-flex align-items-center mv-gap-2 mv-shadow-6d62c9 mv-transition-all" href="/watch/1">
<span class="material-symbols-outlined mv-text-27bd7e" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
<span>Watch Online</span>
</a>
<button class="mv-px-space-md mv-py-2p5 mv-rounded-full mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-semibold d-flex align-items-center mv-gap-2 mv-transition-all" onclick="triggerDownloadModal('Fast X', '8.9 GB', '4K UHD HDR • Multi-Audio')">
<span class="material-symbols-outlined mv-text-c79a76">download</span>
<span>Download (8.9 GB)</span>
</button>
</div>
<div class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm">
<span class="material-symbols-outlined mv-text-58f475 mv-text-outline">storage</span>
<span>Personal Media Vault</span>
</div>
</div>
</div>
</div>
<!-- Movie 4: Oppenheimer -->
<div class="movie-card mv-bg-surface-container-low mv-hover-bg-surface-container mv-rounded-xl mv-p-space-md d-flex flex-column flex-md-row align-items-center mv-gap-space-lg mv-transition-all mv-shadow-md mv-group mv-relative overflow-hidden" data-status="expired">
<div class="mv-absolute start-0 top-0 bottom-0 mv-w-1p5 mv-bg-outline"></div>
<div class="mv-relative mv-w-full mv-md-w-44 mv-h-64 mv-md-h-60 mv-rounded-lg overflow-hidden flex-shrink-0 mv-shadow-lg mv-bg-surface-container-highest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Dramatic cinematography poster for the biographical movie Oppenheimer featuring Cillian Murphy with a vintage brimmed hat against an apocalyptic fiery ember particle explosion background, intense orange and midnight slate contrast" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCU8So0f-CISDNHP7p8uXcQ2cRxjbkyoUL7yF7slSkuFPTNpqW8dL7LxeO9zDEGONlSfXEW9we4ng1ZJL1jCBTFbK59mB5YSzlavYSdWtQ-6dZx-g5ELVAWdvTHM1jX8-MjfFu7kva_79aTdQXsKt_WPAa54brWwkviM-Jlff2lbUOKg9rj24Ff1SQcVTrnY4w492k_Llj0phhB-cGBpFOFORzlENmIvRIt7Nrp8DqCtO0_dgZsRrqk_w"/>
<div class="mv-absolute mv-top-2 mv-left-2 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-ee71ca mv-font-bold mv-text-on-surface-variant mv-tracking-wide text-uppercase d-flex align-items-center mv-gap-1">
                IMAX 4K
              </div>
<div class="mv-absolute mv-bottom-2 mv-right-2 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-ee71ca mv-font-bold mv-text-on-surface mv-tracking-wider">
                180 MIN
              </div>
</div>
<div class="mv-flex-1 d-flex flex-column justify-content-between mv-w-full h-100 mv-gap-space-sm">
<div>
<div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-xs mb-1">
<div class="d-flex align-items-center mv-gap-2">
<span class="mv-px-2p5 mv-py-0p5 mv-rounded-full mv-bg-surface-variant mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm mv-font-bold d-flex align-items-center mv-gap-1p5">
<span class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-outline"></span>
                      Rental Window Expired
                    </span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline">• Rented on 10 Sep 2026</span>
</div>
<span class="mv-text-outline mv-font-label-md mv-text-label-md mv-font-semibold d-flex align-items-center mv-gap-1 mv-bg-surface-container-highest mv-px-2 mv-py-0p5 mv-rounded">
<span class="material-symbols-outlined mv-text-58f475">history</span>
                    Expired 5 days ago
                  </span>
</div>
<h3 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface mv-group-hover-text-primary mv-transition-colors">Oppenheimer</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-line-clamp-2 mt-1">
                  The story of American scientist J. Robert Oppenheimer and his role in the development of the atomic bomb during World War II. Directed by Christopher Nolan.
                </p>
</div>
<!-- Technical Specs Badges -->
<div class="d-flex flex-wrap align-items-center mv-gap-2 my-1">
<span class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99">aspect_ratio</span> IMAX 70mm Aspect
                </span>
<span class="mv-bg-surface-container mv-px-2 mv-py-1 mv-rounded mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99">closed_caption</span> English CC, French
                </span>
</div>
<!-- Action Bar -->
<div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-md mv-pt-space-xs">
<div class="d-flex align-items-center mv-gap-space-sm">
<!-- Re-rent Button -->
<button class="mv-px-space-lg mv-py-2p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-lg mv-text-label-lg mv-font-bold d-flex align-items-center mv-gap-2 mv-transition-all">
<span class="material-symbols-outlined mv-text-c79a76">replay</span>
<span>Re-Rent for Rs. 50</span>
</button>
<a class="mv-px-space-md mv-py-2p5 mv-rounded-full mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-semibold d-flex align-items-center mv-gap-1 mv-transition-all" href="/payment">
<span>Buy License (Rs. 200)</span>
</a>
</div>
<div class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm">
<span class="material-symbols-outlined mv-text-58f475 mv-text-tertiary">local_offer</span>
<span>Wallet Pay: Rs. 300 available</span>
</div>
</div>
</div>
</div>
</div>
<!-- Additional Feature Card: Upsell & Discover Grid Banner -->
<div class="mv-bg-gradient-to-r mv-from-surface-container-high mv-via-surface-container mv-to-surface-container-high mv-rounded-xl mv-p-space-lg d-flex flex-column flex-md-row align-items-center justify-content-between mv-gap-space-lg mv-shadow-lg mv-relative overflow-hidden">
<div class="d-flex align-items-center mv-gap-space-md">
<div class="mv-w-14 mv-h-14 mv-rounded-xl mv-bg-primary_20 d-flex align-items-center justify-content-center flex-shrink-0">
<span class="material-symbols-outlined mv-text-primary mv-text-8ef75b">local_fire_department</span>
</div>
<div class="d-flex flex-column">
<h4 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Need more blockbusters?</h4>
<p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant">
                Browse our expanding catalog of 800+ 4K Hollywood, Bollywood, and Pakistani cinema releases.
              </p>
</div>
</div>
<div class="d-flex align-items-center mv-gap-space-sm flex-shrink-0">
<a class="mv-px-space-lg mv-py-2p5 mv-rounded-full mv-bg-surface-bright mv-hover-bg-surface-container-highest mv-text-on-surface mv-font-label-lg mv-text-label-lg mv-font-bold mv-transition-all d-flex align-items-center mv-gap-1p5" href="/movies">
<span>Browse Catalog</span>
<span class="material-symbols-outlined mv-text-c79a76">arrow_forward</span>
</a>
</div>
</div>
</section>
</div>
</div>
<!-- Download Quality Selection Modal (Overlay) -->
<div class="mv-fixed mv-inset-0 mv-z-50 d-flex align-items-center justify-content-center mv-bg-surface-container-lowest_80 mv-backdrop-blur-md d-none mv-transition-opacity" id="download-modal">
<div class="mv-bg-surface-container-low mv-rounded-xl mv-max-w-lg mv-w-full mx-3 mv-p-space-lg d-flex flex-column mv-gap-space-md mv-shadow-2xl mv-relative">
<div class="d-flex align-items-center justify-content-between">
<div class="d-flex align-items-center mv-gap-2">
<span class="material-symbols-outlined mv-text-primary mv-text-59700f">download</span>
<h3 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Download for Offline</h3>
</div>
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container mv-hover-bg-surface-bright d-flex align-items-center justify-content-center mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" onclick="closeDownloadModal()">
<span class="material-symbols-outlined mv-text-c79a76">close</span>
</button>
</div>
<div class="mv-bg-surface-container mv-rounded-lg mv-p-space-md d-flex flex-column mv-gap-1">
<span class="mv-font-label-sm mv-text-label-sm mv-text-outline">Selected Title</span>
<h4 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface" id="modal-movie-title">Dune: Part Two</h4>
<span class="mv-font-body-sm mv-text-body-sm mv-text-primary" id="modal-movie-specs">4K UHD • Dolby Atmos</span>
</div>
<div class="d-flex flex-column mv-gap-space-sm">
<label class="mv-font-label-md mv-text-label-md mv-text-on-surface mv-font-semibold">Select Bitrate &amp; Resolution</label>
<div class="d-grid mv-grid-cols-1 mv-gap-2">
<label class="d-flex align-items-center justify-content-between mv-p-space-sm mv-rounded-lg mv-bg-surface-container mv-cursor-pointer mv-hover-bg-surface-bright mv-transition-colors">
<div class="d-flex align-items-center mv-gap-space-sm">
<input checked="" class="mv-accent-primary" name="download-res" type="radio" value="4k"/>
<div class="d-flex flex-column">
<span class="mv-font-label-md mv-text-label-md mv-font-bold mv-text-on-surface">Ultra HD (4K HDR)</span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Recommended for TVs &amp; iPads • High dynamic range</span>
</div>
</div>
<span class="mv-font-label-md mv-text-label-md mv-text-primary mv-font-bold">~7.2 GB</span>
</label>
<label class="d-flex align-items-center justify-content-between mv-p-space-sm mv-rounded-lg mv-bg-surface-container mv-cursor-pointer mv-hover-bg-surface-bright mv-transition-colors">
<div class="d-flex align-items-center mv-gap-space-sm">
<input class="mv-accent-primary" name="download-res" type="radio" value="1080p"/>
<div class="d-flex flex-column">
<span class="mv-font-label-md mv-text-label-md mv-font-bold mv-text-on-surface">Full HD (1080p)</span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Balanced quality • Standard audio 5.1</span>
</div>
</div>
<span class="mv-font-label-md mv-text-label-md mv-text-on-surface mv-font-bold">~3.8 GB</span>
</label>
<label class="d-flex align-items-center justify-content-between mv-p-space-sm mv-rounded-lg mv-bg-surface-container mv-cursor-pointer mv-hover-bg-surface-bright mv-transition-colors">
<div class="d-flex align-items-center mv-gap-space-sm">
<input class="mv-accent-primary" name="download-res" type="radio" value="720p"/>
<div class="d-flex flex-column">
<span class="mv-font-label-md mv-text-label-md mv-font-bold mv-text-on-surface">Mobile Data Saver (720p)</span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Faster download • Best for phones</span>
</div>
</div>
<span class="mv-font-label-md mv-text-label-md mv-text-on-surface mv-font-bold">~1.4 GB</span>
</label>
</div>
</div>
<!-- Device Slot Info -->
<div class="mv-bg-surface-container-high_60 mv-rounded-lg mv-p-space-sm d-flex align-items-center justify-content-between mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm">
<span class="d-flex align-items-center mv-gap-1p5">
<span class="material-symbols-outlined mv-text-tertiary mv-text-58f475">check_circle</span>
          Slot 2 of 5 authorized devices
        </span>
<a class="mv-text-primary mv-hover-underline" href="/watch/1">Manage Slots</a>
</div>
<!-- Action Buttons -->
<div class="d-flex align-items-center justify-content-end mv-gap-space-sm mv-pt-space-xs">
<button class="mv-px-space-md mv-py-2 mv-rounded-full mv-bg-surface-container mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-colors" onclick="closeDownloadModal()">
          Cancel
        </button>
<button class="mv-px-space-lg mv-py-2 mv-rounded-full mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-md mv-text-label-md mv-font-bold d-flex align-items-center mv-gap-1p5 mv-shadow-6a1071 mv-transition-all" onclick="startDownloadSimulation()">
<span class="material-symbols-outlined mv-text-c79a76">file_download</span>
<span>Start Download</span>
</button>
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
    name: 'MyMoviesPage',
    setup() {
        onMounted(() => bootPage(externals, 'Ly8gU2ltcGxlIGludGVyYWN0aXZlIGNsaWVudC1zaWRlIGJlaGF2aW9ycwogIGZ1bmN0aW9uIHRyaWdnZXJEb3dubG9hZE1vZGFsKHRpdGxlLCBzaXplLCBzcGVjcykgewogICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ21vZGFsLW1vdmllLXRpdGxlJykudGV4dENvbnRlbnQgPSB0aXRsZTsKICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdtb2RhbC1tb3ZpZS1zcGVjcycpLnRleHRDb250ZW50ID0gc3BlY3M7CiAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZG93bmxvYWQtbW9kYWwnKS5jbGFzc0xpc3QucmVtb3ZlKCdkLW5vbmUnKTsKICB9CgogIGZ1bmN0aW9uIGNsb3NlRG93bmxvYWRNb2RhbCgpIHsKICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkb3dubG9hZC1tb2RhbCcpLmNsYXNzTGlzdC5hZGQoJ2Qtbm9uZScpOwogIH0KCiAgZnVuY3Rpb24gc3RhcnREb3dubG9hZFNpbXVsYXRpb24oKSB7CiAgICB2YXIgYnRuID0gZXZlbnQuY3VycmVudFRhcmdldDsKICAgIGJ0bi5pbm5lckhUTUwgPSAnPHNwYW4gY2xhc3M9Im1hdGVyaWFsLXN5bWJvbHMtb3V0bGluZWQgbXYtYW5pbWF0ZS1zcGluIG12LXRleHQtYzc5YTc2Ij5wcm9ncmVzc19hY3Rpdml0eTwvc3Bhbj4gU3RhcnRpbmcuLi4nOwogICAgc2V0VGltZW91dCgoKSA9PiB7CiAgICAgIGNsb3NlRG93bmxvYWRNb2RhbCgpOwogICAgICBidG4uaW5uZXJIVE1MID0gJzxzcGFuIGNsYXNzPSJtYXRlcmlhbC1zeW1ib2xzLW91dGxpbmVkIG12LXRleHQtYzc5YTc2Ij5maWxlX2Rvd25sb2FkPC9zcGFuPiBTdGFydCBEb3dubG9hZCc7CiAgICAgIGFsZXJ0KCdFbmNyeXB0ZWQgVFZPRCBkb3dubG9hZCBwYWNrYWdlIHN0YXJ0ZWQuIFlvdSBjYW4gd2F0Y2ggdGhpcyBvZmZsaW5lIGZvciB0aGUgZHVyYXRpb24gb2YgeW91ciByZW50YWwgd2luZG93LicpOwogICAgfSwgOTAwKTsKICB9CgogIC8vIEZpbHRlciBpbnRlcmFjdGlvbgogIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJyNmaWx0ZXItdGFicyAuZmlsdGVyLWJ0bicpLmZvckVhY2goYnRuID0+IHsKICAgIGJ0bi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsICgpID0+IHsKICAgICAgZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnI2ZpbHRlci10YWJzIC5maWx0ZXItYnRuJykuZm9yRWFjaChiID0+IHsKICAgICAgICBiLmNsYXNzTGlzdC5yZW1vdmUoJ212LWJnLXByaW1hcnknLCAnbXYtdGV4dC13aGl0ZScpOwogICAgICAgIGIuY2xhc3NMaXN0LmFkZCgnbXYtYmctc3VyZmFjZS1jb250YWluZXItaGlnaCcsICdtdi10ZXh0LW9uLXN1cmZhY2UtdmFyaWFudCcpOwogICAgICB9KTsKICAgICAgYnRuLmNsYXNzTGlzdC5hZGQoJ212LWJnLXByaW1hcnknLCAnbXYtdGV4dC13aGl0ZScpOwogICAgICBidG4uY2xhc3NMaXN0LnJlbW92ZSgnbXYtYmctc3VyZmFjZS1jb250YWluZXItaGlnaCcsICdtdi10ZXh0LW9uLXN1cmZhY2UtdmFyaWFudCcpOwoKICAgICAgdmFyIGZpbHRlclRleHQgPSBidG4udGV4dENvbnRlbnQudG9Mb3dlckNhc2UoKTsKICAgICAgdmFyIGNhcmRzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLm1vdmllLWNhcmQnKTsKCiAgICAgIGNhcmRzLmZvckVhY2goY2FyZCA9PiB7CiAgICAgICAgdmFyIHN0YXR1cyA9IGNhcmQuZ2V0QXR0cmlidXRlKCdkYXRhLXN0YXR1cycpOwogICAgICAgIGlmIChmaWx0ZXJUZXh0LmluY2x1ZGVzKCdhbGwnKSkgewogICAgICAgICAgY2FyZC5jbGFzc0xpc3QucmVtb3ZlKCdkLW5vbmUnKTsKICAgICAgICB9IGVsc2UgaWYgKGZpbHRlclRleHQuaW5jbHVkZXMoJ2FjdGl2ZScpICYmIHN0YXR1cyA9PT0gJ2FjdGl2ZScpIHsKICAgICAgICAgIGNhcmQuY2xhc3NMaXN0LnJlbW92ZSgnZC1ub25lJyk7CiAgICAgICAgfSBlbHNlIGlmIChmaWx0ZXJUZXh0LmluY2x1ZGVzKCdwZXJtYW5lbnQnKSAmJiBzdGF0dXMgPT09ICdwZXJtYW5lbnQnKSB7CiAgICAgICAgICBjYXJkLmNsYXNzTGlzdC5yZW1vdmUoJ2Qtbm9uZScpOwogICAgICAgIH0gZWxzZSBpZiAoZmlsdGVyVGV4dC5pbmNsdWRlcygnZXhwaXJlZCcpICYmIHN0YXR1cyA9PT0gJ2V4cGlyZWQnKSB7CiAgICAgICAgICBjYXJkLmNsYXNzTGlzdC5yZW1vdmUoJ2Qtbm9uZScpOwogICAgICAgIH0gZWxzZSB7CiAgICAgICAgICBjYXJkLmNsYXNzTGlzdC5hZGQoJ2Qtbm9uZScpOwogICAgICAgIH0KICAgICAgfSk7CiAgICB9KTsKICB9KTsKCiAgLy8gU2VhcmNoIGZpbHRlcgogIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdtb3ZpZS1zZWFyY2gnKS5hZGRFdmVudExpc3RlbmVyKCdpbnB1dCcsIChlKSA9PiB7CiAgICB2YXIgdGVybSA9IGUudGFyZ2V0LnZhbHVlLnRvTG93ZXJDYXNlKCk7CiAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcubW92aWUtY2FyZCcpLmZvckVhY2goY2FyZCA9PiB7CiAgICAgIHZhciB0aXRsZSA9IGNhcmQucXVlcnlTZWxlY3RvcignaDMnKS50ZXh0Q29udGVudC50b0xvd2VyQ2FzZSgpOwogICAgICBpZiAodGl0bGUuaW5jbHVkZXModGVybSkpIHsKICAgICAgICBjYXJkLmNsYXNzTGlzdC5yZW1vdmUoJ2Qtbm9uZScpOwogICAgICB9IGVsc2UgewogICAgICAgIGNhcmQuY2xhc3NMaXN0LmFkZCgnZC1ub25lJyk7CiAgICAgIH0KICAgIH0pOwogIH0pOw=='));
    },
};
</script>
