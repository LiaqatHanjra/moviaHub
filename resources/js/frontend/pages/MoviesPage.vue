<template>
<main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100"><div class="d-flex flex-column mv-w-full">
<!-- Value Strip Banner: Immediate Trust & Operational Clarity -->
<div class="mv-w-full mv-bg-surface-container-low_80 mv-backdrop-blur-md mv-px-margin-mobile mv-sm-px-margin mv-py-3">
<div class="mv-max-w-7xl mx-auto d-flex flex-wrap align-items-center justify-content-between mv-gap-y-2 mv-text-on-surface-variant mv-font-label-md mv-text-label-md">
<div class="d-flex align-items-center mv-gap-space-sm">
<span class="material-symbols-outlined mv-text-primary mv-text-c79a76">timer</span>
<span>48-Hour Rental Playback Window</span>
</div>
<div class="d-flex align-items-center mv-gap-space-sm">
<span class="material-symbols-outlined mv-text-secondary mv-text-c79a76">devices</span>
<span>Simultaneous Streaming on Any Device</span>
</div>
<div class="d-flex align-items-center mv-gap-space-sm">
<span class="material-symbols-outlined mv-text-tertiary mv-text-c79a76">cloud_download</span>
<span>Offline 4K Download Included</span>
</div>
<div class="d-flex align-items-center mv-gap-space-sm">
<span class="material-symbols-outlined mv-text-tertiary-fixed mv-text-c79a76">bolt</span>
<span class="mv-text-on-surface mv-font-semibold">1-Click Instant Wallet Debit</span>
</div>
</div>
</div>
<!-- Main Catalog Space -->
<div class="mv-w-full mv-px-margin-mobile mv-sm-px-margin mv-py-space-lg mv-max-w-7xl mx-auto d-flex flex-column mv-gap-space-xl">
<!-- Header Title & Filter Workspace -->
<div class="d-flex flex-column mv-gap-space-md">
<div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mv-gap-space-sm">
<div>
<span class="mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-widest mv-text-primary mv-font-bold">Catalog Vault</span>
<h1 class="mv-font-headline-xl-mobile mv-sm-font-headline-xl mv-text-headline-xl-mobile mv-sm-text-headline-xl mv-text-on-surface mv-tracking-tight mv-mt-0p5">Explore All Movies</h1>
<p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant mv-max-w-2xl mt-1">
            Browse hundreds of blockbusters, indie gems, and regional masterworks presented in pristine 4K Ultra HD &amp; Dolby Atmos.
          </p>
</div>
<div class="d-flex align-items-center mv-gap-space-sm align-self-start align-self-md-auto mv-bg-surface-container-low mv-px-space-md mv-py-2 mv-rounded-full mv-shadow-sm">
<span class="mv-w-2p5 mv-h-2p5 mv-rounded-full mv-bg-tertiary mv-animate-pulse"></span>
<span class="mv-font-label-md mv-text-label-md mv-text-on-surface mv-font-semibold" id="catalog-count-display">Showing 48 of 850 movies</span>
</div>
</div>
<!-- Complex Control Bar -->
<div class="mv-bg-surface-container mv-rounded-xl mv-p-space-md d-flex flex-column mv-gap-space-md mv-shadow-md">
<!-- Row 1: Search, Dropdowns -->
<div class="d-grid mv-grid-cols-1 mv-md-grid-cols-12 mv-gap-space-sm align-items-center">
<!-- Live Search Bar -->
<div class="mv-md-col-span-4 mv-relative d-flex align-items-center">
<span class="material-symbols-outlined mv-absolute mv-left-3p5 mv-text-outline mv-text-27bd7e pe-none">search</span>
<input class="mv-w-full mv-h-11 mv-pl-11 mv-pr-space-md mv-bg-surface-container-lowest mv-text-on-surface mv-font-body-md mv-text-body-md mv-rounded-lg mv-placeholder-text-outline mv-focus-outline-none mv-focus-bg-surface-container-high mv-transition-all" id="movie-search-input" placeholder="Search by title, director, actor..." type="text"/>
</div>
<!-- Genre Filter -->
<div class="mv-md-col-span-3 mv-relative">
<select class="mv-w-full mv-h-11 mv-px-3p5 mv-bg-surface-container-lowest mv-text-on-surface mv-font-label-lg mv-text-label-lg mv-rounded-lg mv-appearance-none mv-cursor-pointer mv-focus-outline-none mv-focus-bg-surface-container-high mv-transition-all mv-pr-10" id="genre-select">
<option value="all">All Genres</option>
<option value="sci-fi">Sci-Fi</option>
<option value="action">Action &amp; Adventure</option>
<option value="thriller">Thriller &amp; Crime</option>
<option value="drama">Drama &amp; Biography</option>
<option value="horror">Horror &amp; Mystery</option>
<option value="comedy">Comedy</option>
</select>
<span class="material-symbols-outlined mv-absolute mv-right-3 mv-top-3 pe-none mv-text-outline mv-text-27bd7e">keyboard_arrow_down</span>
</div>
<!-- Region / Origin Filter -->
<div class="mv-md-col-span-3 mv-relative">
<select class="mv-w-full mv-h-11 mv-px-3p5 mv-bg-surface-container-lowest mv-text-on-surface mv-font-label-lg mv-text-label-lg mv-rounded-lg mv-appearance-none mv-cursor-pointer mv-focus-outline-none mv-focus-bg-surface-container-high mv-transition-all mv-pr-10" id="region-select">
<option value="all">All Industries</option>
<option value="hollywood">Hollywood Premiere</option>
<option value="bollywood">Bollywood &amp; Hindi</option>
<option value="south">South Cinema (Pan-India)</option>
<option value="punjabi">Punjabi Blockbusters</option>
<option value="international">Cannes &amp; International</option>
</select>
<span class="material-symbols-outlined mv-absolute mv-right-3 mv-top-3 pe-none mv-text-outline mv-text-27bd7e">expand_more</span>
</div>
<!-- Sort Filter -->
<div class="mv-md-col-span-2 mv-relative">
<select class="mv-w-full mv-h-11 mv-px-3 mv-bg-surface-container-lowest mv-text-on-surface mv-font-label-lg mv-text-label-lg mv-rounded-lg mv-appearance-none mv-cursor-pointer mv-focus-outline-none mv-focus-bg-surface-container-high mv-transition-all mv-pr-9" id="sort-select">
<option value="popular">Most Popular</option>
<option value="rated">Highest Rated</option>
<option value="newest">New Releases</option>
<option value="price-asc">Price: Low to High</option>
</select>
<span class="material-symbols-outlined mv-absolute mv-right-2p5 mv-top-3 pe-none mv-text-outline mv-text-27bd7e">sort</span>
</div>
</div>
<!-- Row 2: Resolution Filters & Active Pill Tags -->
<div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-sm mv-pt-2">
<div class="d-flex align-items-center mv-gap-space-xs">
<span class="mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-text-outline me-2">Resolution:</span>
<button class="resolution-btn active mv-px-3p5 mv-py-1p5 mv-rounded-full mv-font-label-md mv-text-label-md mv-bg-primary-container mv-font-semibold mv-transition-all">All</button>
<button class="resolution-btn mv-px-3p5 mv-py-1p5 mv-rounded-full mv-font-label-md mv-text-label-md mv-bg-surface-container-low mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-all">4K UHD</button>
<button class="resolution-btn mv-px-3p5 mv-py-1p5 mv-rounded-full mv-font-label-md mv-text-label-md mv-bg-surface-container-low mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-all">1080p FHD</button>
</div>
<div class="d-flex align-items-center mv-gap-space-sm">
<div class="d-flex align-items-center mv-gap-1p5 mv-px-3 mv-py-1 mv-bg-surface-container-low mv-rounded-full">
<span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Active: <strong class="mv-text-on-surface">Trending All</strong></span>
<button aria-label="Clear active filter" class="mv-hover-text-primary mv-transition-colors d-flex align-items-center">
<span class="material-symbols-outlined mv-text-58f475">close</span>
</button>
</div>
<button class="mv-font-label-md mv-text-label-md mv-text-primary mv-hover-text-secondary-fixed mv-transition-colors mv-underline mv-cursor-pointer" id="reset-filters">
              Reset Filters
            </button>
</div>
</div>
</div>
</div>
<!-- Featured Release Banner: Dune Part Two -->
<div class="mv-relative mv-w-full mv-rounded-2xl overflow-hidden mv-bg-surface-container-low mv-shadow-xl">
<div class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center mv-mix-blend-luminosity mv-opacity-40 mv-scale-105" data-alt="Dune Part Two cinematic still showing vast orange-tinted Arrakis desert dunes under a twin sun sky, intense cinematic composition with glowing blue spice eye highlights and futuristic ornithopter shadows in atmospheric sci-fi lighting." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuABnPRt2te76ItI6AlnpkBw9NoE_SvOwS8nR8zp2LUFUvYdLyPnyKbXRvmRaQ3C0-D7mtNCNXHt4wBwoUbyjVIl6oYU3ciN3ZeDT2Mvt8MxBoNrHl82pVk-lu2mZ1OhBVqWbnUkEAAlCgkvNCXOiSxds5UmgAKkkJq59S7fF76tQLbXHqb1XNKkjg7Pzb7A_U2WN3M37jKAqb9MAt7QwmhKRotwWc0s_IWc-H1yDn8NkK8GjGN7CjlRzw')">
</div>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-r mv-from-surface-container-lowest mv-via-surface-container-lowest_85 mv-to-transparent"></div>
<div class="mv-relative mv-z-10 mv-p-space-lg mv-md-p-space-xl d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between mv-gap-space-lg">
<div class="d-flex flex-column mv-gap-space-xs mv-max-w-xl">
<div class="d-flex flex-wrap align-items-center mv-gap-2">
<span class="mv-px-2p5 mv-py-0p5 mv-rounded-full mv-bg-primary-container mv-font-label-sm mv-text-label-sm mv-font-bold text-uppercase mv-tracking-wider">Premieres Today</span>
<span class="mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-highest mv-text-secondary mv-font-label-sm mv-text-label-sm mv-font-bold">4K HDR10+</span>
<span class="mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-highest mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99">star</span> IMDb 8.8
            </span>
</div>
<h2 class="mv-font-headline-lg-mobile mv-sm-font-headline-lg mv-text-headline-lg-mobile mv-sm-text-headline-lg mv-text-on-surface mv-font-extrabold mv-tracking-tight mt-1">Dune: Part Two (2024)</h2>
<p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant mv-line-clamp-2">
            Paul Atreides unites with Chani and the Fremen while seeking revenge against the conspirators who destroyed his family. A monumental sci-fi spectacle with full IMAX audio.
          </p>
</div>
<div class="d-flex align-items-center mv-gap-space-md align-self-stretch align-self-sm-auto">
<div class="d-flex flex-column align-items-start align-items-sm-end">
<span class="mv-font-label-sm mv-text-label-sm mv-text-outline text-uppercase">Standard Rental</span>
<span class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface mv-font-bold">Rs. 50</span>
</div>
<div class="d-flex align-items-center mv-gap-space-sm">
<button class="mv-px-space-lg mv-py-3 mv-rounded-full mv-bg-primary-container mv-font-label-lg mv-text-label-lg mv-font-bold mv-hover-scale-105 mv-transition-all mv-shadow-051d8e d-flex align-items-center mv-gap-2">
<span class="material-symbols-outlined mv-text-27bd7e">bolt</span> Rent Now
            </button>
<button class="mv-w-11 mv-h-11 mv-rounded-full mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface d-flex align-items-center justify-content-center mv-transition-colors" title="Add to Watchlist">
<span class="material-symbols-outlined mv-text-c28550">bookmark_add</span>
</button>
</div>
</div>
</div>
</div>
<!-- Main Content: Movie Grid (16 Cards) -->
<div class="d-flex flex-column mv-gap-space-lg">
<div class="d-flex align-items-center justify-content-between">
<h3 class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface mv-font-bold d-flex align-items-center mv-gap-2">
<span>All Premieres &amp; Rentals</span>
<span class="mv-font-label-sm mv-text-label-sm mv-font-semibold mv-bg-surface-container-high mv-text-primary mv-px-2p5 mv-py-1 mv-rounded-full">16 per page</span>
</h3>
<span class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant">Instant 48-hr streaming pass</span>
</div>
<!-- 16 Responsive Cards Grid -->
<div class="d-grid mv-grid-cols-2 mv-sm-grid-cols-2 mv-md-grid-cols-3 mv-lg-grid-cols-4 mv-gap-gutter-mobile mv-sm-gap-gutter" id="movie-grid">
<!-- Card 1: Dune: Part Two -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Dune Part Two movie theatrical poster showing Paul Atreides and Chani standing side-by-side with crysknives ready against a dramatic double-sun sunset over Arrakis with blue cinematic atmosphere." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjSDZeHU8aqQYB4fHyS1vUewNIShbCpYjWMD6TI5I2ketbdas1K1tARRSoVr6lRkBqJqXSF4Xnh5EfxgA9OsAafCP_k_E2PvGF8YMyr0MghQ09Q8-F1Qmx_MkXkNAT3BawP3pDDUfbOroNQ5mp0ttf_bd1Uh06eNqgcBqCg3sAcX3b_cHa46r-_0wAhmbLwbd3WDjkeP7tKzvgW2dHaoaLfayZ4PAgS8BmYukFOVslgrkZnE26X6AxiA"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 8.8
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-primary-container mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">4K UHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">Dune: Part Two</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2024 • Sci-Fi / Adventure</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 2: Oppenheimer -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Oppenheimer movie theatrical poster featuring Cillian Murphy wearing a fedora hat looking forward through intense fire embers and atomic shockwave glow in rich amber and obsidian shadows." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAy-9EwwSG_sTdmU6WhX4YpkNtiLJNuqZ0o_6UFZ6iLvK4wjyqIaNsMYdEqT2VpM4Q-Zx8WkViARtZ1GKGvNSWAw6O2rUEbAJhV1EjEBZ9i6g__pBC2_-gmXE32hESSTeXLROMgA0XMN1-QcfVM0mw9gJ06_Zqrv5eazaVlD03Euc6auknnSB39CxHmMWJfiuZZIQoDYCywhg88FfiMN96fDJJPOcWwW-tPUmUHEiA6Q_FZrAE1geC_kA"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 8.9
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-primary-container mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">4K UHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">Oppenheimer</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2023 • Biography / Drama</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 3: John Wick Chapter 4 -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="John Wick Chapter 4 film poster portraying Keanu Reeves in a sleek black suit with neon Paris street lights and an hourglass silhouette in moody cyan and magenta hues." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCRDdq6n6KSgR4-i8DwNqCSHPLY4iw7Kbq-M4uCt1ZwQcGGz2t42-1aZLM4vJIqapULP3O9QTt49-aHWZwf1YF7yk_7RyTcwTbqJ_d4qxEzekEh7ah2pQUXOsyr_hgU1am3qIJbvL4-uSv9NDHFEp4Yg0QcgXuUj-KEQ7kbDc6FCIPiBnVlxzGEAH6ySGpPWx0i-GQ85IHCrhCrEMUl2OafQpW8l-Wf4YiQRgD--VfWy0QtlR5QRlUMfQ"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 8.2
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-primary-container mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">4K UHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">John Wick: Chapter 4</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2023 • Action / Thriller</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 4: The Batman -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="The Batman 2022 movie poster of Robert Pattinson in heavy cowl and armor in rainy Gotham city night under deep red flare lighting with neon reflections on wet asphalt." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD7sIU0e99Xu3t-KdCLLxykEkfapioPlvOpcqpOP_J-en7WZz6GAkqgi7ZviB_FfiwCOaxZXspIN-82hLC3lJt5yVTo3csxqatovg9unw4Wi6QxK_TqQOXMTfsPqp3yFs_-YrvgbCZ9chxF8H_0j7O1cWouctuf9cKtwItFPtE1sDFrhPkgAwPxbnPpPn9pbm7FW8lj4zjT3ePQfh-WfJL89E_hBSntedGtjq0SMpcAROIIo646fDVrVA"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 7.8
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-primary-container mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">4K UHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">The Batman</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2022 • Crime / Mystery</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 5: Interstellar -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Interstellar movie poster depicting an astronaut in a white spacesuit on an icy alien world under a massive swirling wormhole galaxy with crystalline frost reflections." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDfbCV4snehgL7YGCrqEGB7tJo3pMMzo1_6zBMOv-1WW1vCDeHFKwey2ig-_27H1WkkEasWdZ_3VOdavd_XSWHY2fKnFtznOTvWM6TKDd_18Mrh8r_vcTf-0PPYUPDGsaFVsCwosBF2_YWiBKc6e-jrP-KjXlSHuPyTCYMcGj35vAJWL7hX3WzMxRMQKvE9Ee0-H69EsKBMUfLiNxMwXMp3jZw1c0gO_qzO0yigVDzgPM4BKZUP46Wb8w"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 8.7
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-primary-container mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">4K UHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">Interstellar</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2014 • Sci-Fi / Adventure</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 6: Blade Runner 2049 -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Blade Runner 2049 poster featuring Ryan Gosling walking toward a futuristic police spinner through deep glowing orange dust storm ruins with neon cyan holographic silhouettes." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCds73oRe0G3mdW7D7PLqo0CdCbTrcouVs1oTUYTt1Ct7Ew99r1gvwpCVjTG5ESxSlqKSxQbQ0hDkTRzOIR15ahyveeMwaMc9Rr-k3EHLc873VUKqkaUGVp9bj1oQz6yllbhKqakUIMCQKsStoV1dad3ZnstmcdSoAroFEhRWltXijrF952GmMM8tp8gkduHILef52zixISmcCQtDNUMXS-Y719_xNERwHa18HjsddAdF8EM-7LSYOYAw"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 8.0
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-primary-container mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">4K UHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">Blade Runner 2049</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2017 • Sci-Fi / Mystery</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 7: Top Gun Maverick -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Top Gun Maverick movie poster showing Tom Cruise wearing aviator sunglasses standing beside a sleek dark fighter jet on a golden hour runway with heat haze." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAyRZSdQrmse8ucnWWtNJpmL0MK_hkRgHImiSyLWRcFBIzazDEb-Vs54eCAI4irOnH0nSGEGTX3EL6bZZLhaEjBz7oRhAAzuXUhsglLuDIgPmROp4uakpDzV9h5_hyY8Dlmea12WHkzyIRWqhdw_wKgVvQjyvCbi8RlA07gPLrTBDYF0x6D2X2HWtFvoua5HLIhjKMbCHOu7R9M3iv3J-i9tQJM8aPlXCYTHCbhNgRCT0-_vxSsCrdDwQ"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 8.3
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-primary-container mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">4K UHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">Top Gun: Maverick</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2022 • Action / Drama</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 8: Mission: Impossible - Dead Reckoning -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Mission Impossible Dead Reckoning poster showing Ethan Hunt on a motorcycle leaping off an alpine mountain cliff above a speeding vintage train with cool mountain daylight." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7IWLqt1gsjVKB52akJhVmdIXzOJPqiYwaVlrv9gobHOjzxZY6JeF9vVRId0B71pbA_gIvl9TFrKvIm1_5hdTNgbTUSJokln2Qh15qNAUdT4Chel8xKsJaXN5e90gdxrqXSim8i3vyK317OF4vTC7B8s3PRogCakBlgaFopI3fHOJMZ8cZRLbAZPE_6YWZpA0IXWK9pbsqtZRf7vtki-6YoDYOMUWcLeZkyOsDaL5y-Vpb-GRkUWce7w"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 7.7
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-surface-container-highest mv-text-on-surface mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">1080p FHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">Mission: Impossible</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2023 • Action / Adventure</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 9: Spider-Man: Across the Spider-Verse -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Spider-Man Across the Spider-Verse vibrant poster with Miles Morales falling upside down against a neon geometric multiverse of colorful stylized alternate dimensions." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB69vSgBdbJNNehKgpJf1_8RMN-BSheZrQuwzqVBthgt5O6gLEIq_hwQ-0VDZdvRIkP5pNBscbUWeKIRIZc9XxD44FhrFg0Ecpu794jVWWERhvCNSiJ8Yscg3Jd1O3372Fnw9I20M3dRKVzry8oDupM3U887tqy1-dEeU2u4f2u0ShanXKLt9IllrNm0qwL5Rj_ISwhvQSwlQ0Lvs43UIEOlrNRUPx2f-pELWnSbhYkt5eYrEIOcS7MOA"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 8.6
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-primary-container mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">4K UHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">Across the Spider-Verse</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2023 • Animation / Sci-Fi</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 10: Fast X -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Fast X movie poster featuring muscle cars drifting in Rome city street with fiery explosions, smoke trails and high speed cinematic action in warm golden light." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBOVTDJLr3O0qGc6VZQuXBDUvWSllxlYvr6lMmr7jut8YDaXZtVwE3CaywX2wAYBkE0CG44I8ZAl0p1UXyTMzuVXb78AQk3Uc0tCVF0a9zTOQKiD3o-ovhqmdxQbBr71DX8AEgCcv8nK98CIyR8iNI9j3Nad9pyIItrZVGvV8JojKaJpWW6kvY0DRAoNCCQdjBMAH861D061YI6PwODUnE50BTay-DzJIcefBkvXQiLHj42P0zF67UUuw"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 5.8
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-surface-container-highest mv-text-on-surface mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">1080p FHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">Fast X</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2023 • Action / Thriller</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 11: Avatar: The Way of Water -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Avatar The Way of Water cinematic poster featuring Jake Sully and Neytiri under luminous turquoise ocean waves alongside bioluminescent Pandora marine creatures." src="https://lh3.googleusercontent.com/aida-public/AB6AXuArbmkdcCE4627gTgq0dQzgvQ5O32eYfjBo_o4FIEPYyZ67WcGwCqDGMWEz5LIDDGhp9lcrwLuu74hpRp8AwCjKGF8CDUSphhsXraxVPzGJsvZ0phKiEC67svWOpXL9W_oVCs4aG15b__uQmsBbcdvr1p3stOrPVuJ9RgyMAH6Q1OD_RlI6acuuUxSdfwGuXJ79FaShpEaZohsOBSNzjqdHOORR6LcQOj_XXrRVHg_jhF7L2oxSQE7ljw"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 7.6
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-primary-container mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">4K UHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">Avatar: Way of Water</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2022 • Sci-Fi / Fantasy</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 12: Gladiator II -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Gladiator II epic movie poster showing a lone gladiator with dual swords facing an ancient Colosseum sand arena filled with blood-red banners and roaring crowds in dramatic sunlight." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDDmKVbh5dOx-FJseWlEeiC-Bw6jUzPuJIOr0nUvm9Az2KU2H6iRjgioblwF_Nmflcx_9uSbpNyaBmbT1PMVnjOSW06RZjnNzt3CgI-jzwWlXQbFmvGAbay9qzHJBWq4Aks6I8F8UxxEukKFq5DR2iR9Yy7ehN-O09I4E39DdUzldIwI99ZttWQbX-WcKL8nVyetCY2y-zSPeDblaGhwcisvt7i8Do3LeExV6HdjILY4kQka4gmYQS6TQ"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 7.5
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-primary-container mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">4K UHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">Gladiator II</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2024 • Action / History</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 13: Inception -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Inception movie poster featuring a futuristic city street curving up into the sky forming a square gravity-defying architecture with Leonardo DiCaprio standing in the center." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB39gDf45v3P26gaNMtwTtukIVbmxEdInBXDd7WtDmtECtIXarHhsmwDxCzmEAcOc_W-JwVslNgnEop7fhq6Ij2B6C4pJ3C35Uy86tAv0yFK1mRI-N3RZKfAGkdcoDpG1AkmLp2UmyUmjLvgDCno6Wc8FQzQmmFa3GXErY9-iLr29sejIta3-fiXk2c8-AziGBiunehzrIYgP2CWIjWf6_DWT3ZV5e7wVGdb8Umrqt1bQuE8nrrgYpA3w"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 8.8
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-primary-container mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">4K UHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">Inception</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2010 • Sci-Fi / Action</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 14: Tenet -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Tenet movie poster with John David Washington running with an oxygen mask split horizontally with inverted red and blue lighting time-reversal visual effects." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjVYKvWixJ3J93MZgpj_e4UlJ9pODRY43LA7HWgvY8lUOA4zeUadMkWbYbfUeVOa8iYQgL73jY626kPyWxff2bj5cPgpySVh0yT0cAO-72eyGgAGGEjbQBhIsJj4RT0GMb6HZaLZujgyE5Elpj7PvXygsohgBCYTLuW1St-lOwnlK4jaqoHRIlf4o8jmMxZGF-t9nI1sTDtdVQtim1CDG5Ogr8419txUrpngy3LLtppBEHQgr3fEUv6w"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 7.3
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-primary-container mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">4K UHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">Tenet</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2020 • Action / Sci-Fi</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 15: The Dark Knight -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="The Dark Knight poster displaying Batman looking down over Gotham City from high glass skyscrapers with fiery burning bat symbol in the night sky." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCFrOqY5ahkbYCu9Nr3SsIwK6IOwJ1xAKmukvCHT0vN1gkGfEB8sEgvvbu0fa7UufwW_5xw3fwyp-OFLaFGAA7M8qiqfqV0-7PrNNriOOHPyVlEtvqcPZgmovGGsFH-VBDzcmLxpgVjusaKWXQ6B0RuGHywdIloo2oukr4Gf-TACOIKEDnbEvPhApNz4pokqMZAcOs4emQcsMNiIfMueN8r_BstFHLUnHAM7uyiR-qMliWVO9uQVz10rA"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 9.0
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-primary-container mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">4K UHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">The Dark Knight</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2008 • Action / Crime</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
<!-- Card 16: Avengers: Endgame -->
<div class="mv-group mv-bg-surface-container mv-rounded-xl overflow-hidden mv-shadow-sm mv-hover-shadow-xl mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 d-flex flex-column justify-content-between">
<div class="mv-relative mv-w-full mv-aspect-bc11a5 overflow-hidden mv-bg-surface-container-lowest">
<img class="mv-w-full h-100 mv-object-cover mv-group-hover-scale-105 mv-transition-transform mv-duration-500" data-alt="Avengers Endgame movie theatrical poster showcasing Iron Man, Captain America, and Thor standing ready for the final battle against a purple cosmic space nebula." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCCue7ucbmjUMCFFYWsgxTkvN9S4BnXxhgplvwXR2fVlLLTxmYavl7Ue7MUh-ITq8nVIDwrQnVf7DLe_b3Iw3NNqbaeluQP9SmC8dTK_HXujslqzqt02AFJUcGVRCMyFBYvdQlfOyz8-OIzEO_LWQd0TZBWKfJCkmF3y-8o0oG777FLo8jt0oKEhesVNlKSkAGrrwC4Jw8_0yrtr16MoYuoox4CpMCMRSehK0_N4vR0GjaXyouD3srxYQ"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container mv-via-transparent mv-to-transparent mv-opacity-90"></div>
<div class="mv-absolute mv-top-2p5 mv-left-2p5 d-flex align-items-center mv-gap-1 mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-px-2 mv-py-0p5 mv-rounded mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">
<span class="material-symbols-outlined mv-text-773d8f">star</span> 8.4
            </div>
<span class="mv-absolute mv-top-2p5 mv-right-2p5 mv-bg-primary-container mv-px-2 mv-py-0p5 mv-rounded mv-font-label-sm mv-text-label-sm mv-font-bold">4K UHD</span>
</div>
<div class="mv-p-space-md d-flex flex-column mv-gap-2 mv-nmt-4 mv-relative mv-z-10">
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold text-truncate">Avengers: Endgame</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">2019 • Action / Sci-Fi</p>
</div>
<div class="d-flex align-items-center justify-content-between mv-pt-1">
<span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Rs. 50</span>
<div class="d-flex align-items-center mv-gap-1p5">
<button class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container-high mv-hover-text-primary mv-text-on-surface-variant d-flex align-items-center justify-content-center mv-transition-colors" title="Bookmark">
<span class="material-symbols-outlined mv-text-c79a76">bookmark_border</span>
</button>
<button class="mv-px-3p5 mv-py-1p5 mv-rounded-full mv-bg-primary-container mv-hover-bg-primary mv-hover-text-white mv-font-label-md mv-text-label-md mv-font-semibold mv-transition-all">
                  Rent
                </button>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Pagination Navigation -->
<div class="d-flex flex-column flex-sm-row align-items-center justify-content-between mv-gap-space-md mv-py-space-md mv-bg-surface-container-low mv-px-space-lg mv-rounded-xl mv-shadow-sm">
<span class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant">
        Showing <strong class="mv-text-on-surface">1–16</strong> of <strong class="mv-text-on-surface">850</strong> movies
      </span>
<div class="d-flex flex-wrap align-items-center justify-content-center mv-gap-1p5">
<button class="d-none d-sm-flex mv-px-3 mv-py-1p5 mv-rounded-lg mv-bg-surface-container mv-text-outline mv-hover-text-on-surface mv-hover-bg-surface-container-high mv-transition-colors mv-font-label-md mv-text-label-md align-items-center mv-gap-1 mv-cursor-pointer">
<span class="material-symbols-outlined mv-text-c79a76">chevron_left</span>
<span>Previous</span>
</button>
<button class="mv-w-9 mv-h-9 mv-rounded-lg mv-bg-primary-container mv-font-label-md mv-text-label-md mv-font-bold mv-shadow-md">
          1
        </button>
<button class="d-none d-sm-block mv-w-9 mv-h-9 mv-rounded-lg mv-bg-surface-container mv-hover-bg-surface-container-high mv-text-on-surface mv-font-label-md mv-text-label-md mv-transition-colors">
          2
        </button>
<button class="d-none d-sm-block mv-w-9 mv-h-9 mv-rounded-lg mv-bg-surface-container mv-hover-bg-surface-container-high mv-text-on-surface mv-font-label-md mv-text-label-md mv-transition-colors">
          3
        </button>
<button class="d-none d-sm-block mv-w-9 mv-h-9 mv-rounded-lg mv-bg-surface-container mv-hover-bg-surface-container-high mv-text-on-surface mv-font-label-md mv-text-label-md mv-transition-colors">
          4
        </button>
<span class="d-none d-sm-inline mv-px-2 mv-text-outline mv-font-label-md mv-text-label-md">...</span>
<button class="mv-w-9 mv-h-9 mv-rounded-lg mv-bg-surface-container mv-hover-bg-surface-container-high mv-text-on-surface mv-font-label-md mv-text-label-md mv-transition-colors">
          54
        </button>
<button class="mv-px-3 mv-py-1p5 mv-rounded-lg mv-bg-surface-container mv-text-on-surface mv-hover-bg-surface-container-high mv-transition-colors mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-1 mv-cursor-pointer">
<span>Next</span>
<span class="material-symbols-outlined mv-text-c79a76">chevron_right</span>
</button>
</div>
</div>
</div>

</div></main>
</template>

<script>
import { onMounted } from 'vue';
import { bootPage } from '../runPageScript';

const externals = [
    
];

export default {
    name: 'MoviesPage',
    setup() {
        onMounted(() => bootPage(externals, 'Ly8gTWljcm8taW50ZXJhY3Rpb25zIGZvciBpbnRlcmFjdGl2ZSBmaWx0ZXJpbmcgcGlsbHMKICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5yZXNvbHV0aW9uLWJ0bicpLmZvckVhY2goYnRuID0+IHsKICAgICAgYnRuLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKCkgPT4gewogICAgICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5yZXNvbHV0aW9uLWJ0bicpLmZvckVhY2goYiA9PiB7CiAgICAgICAgICBiLmNsYXNzTGlzdC5yZW1vdmUoJ212LWJnLXByaW1hcnktY29udGFpbmVyJywgJ212LWZvbnQtc2VtaWJvbGQnKTsKICAgICAgICAgIGIuY2xhc3NMaXN0LmFkZCgnbXYtYmctc3VyZmFjZS1jb250YWluZXItbG93JywgJ212LXRleHQtb24tc3VyZmFjZS12YXJpYW50Jyk7CiAgICAgICAgfSk7CiAgICAgICAgYnRuLmNsYXNzTGlzdC5yZW1vdmUoJ212LWJnLXN1cmZhY2UtY29udGFpbmVyLWxvdycsICdtdi10ZXh0LW9uLXN1cmZhY2UtdmFyaWFudCcpOwogICAgICAgIGJ0bi5jbGFzc0xpc3QuYWRkKCdtdi1iZy1wcmltYXJ5LWNvbnRhaW5lcicsICdtdi1mb250LXNlbWlib2xkJyk7CiAgICAgIH0pOwogICAgfSk7CgogICAgLy8gUmVzZXQgZmlsdGVycyBhY3Rpb24KICAgIHZhciByZXNldEJ0biA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdyZXNldC1maWx0ZXJzJyk7CiAgICBpZiAocmVzZXRCdG4pIHsKICAgICAgcmVzZXRCdG4uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoKSA9PiB7CiAgICAgICAgdmFyIHNlYXJjaElucHV0ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ21vdmllLXNlYXJjaC1pbnB1dCcpOwogICAgICAgIHZhciBnZW5yZVNlbGVjdCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdnZW5yZS1zZWxlY3QnKTsKICAgICAgICB2YXIgcmVnaW9uU2VsZWN0ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3JlZ2lvbi1zZWxlY3QnKTsKICAgICAgICB2YXIgc29ydFNlbGVjdCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdzb3J0LXNlbGVjdCcpOwoKICAgICAgICBpZiAoc2VhcmNoSW5wdXQpIHNlYXJjaElucHV0LnZhbHVlID0gJyc7CiAgICAgICAgaWYgKGdlbnJlU2VsZWN0KSBnZW5yZVNlbGVjdC52YWx1ZSA9ICdhbGwnOwogICAgICAgIGlmIChyZWdpb25TZWxlY3QpIHJlZ2lvblNlbGVjdC52YWx1ZSA9ICdhbGwnOwogICAgICAgIGlmIChzb3J0U2VsZWN0KSBzb3J0U2VsZWN0LnZhbHVlID0gJ3BvcHVsYXInOwoKICAgICAgICB2YXIgYWxsUmVzb2x1dGlvbkJ0biA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5yZXNvbHV0aW9uLWJ0bicpOwogICAgICAgIGlmIChhbGxSZXNvbHV0aW9uQnRuKSBhbGxSZXNvbHV0aW9uQnRuLmNsaWNrKCk7CiAgICAgIH0pOwogICAgfQ=='));
    },
};
</script>
