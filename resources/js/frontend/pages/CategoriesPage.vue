<template>
<header class="mv-fixed top-0 start-0 end-0 mv-z-50 mv-bg-surface_90 mv-backdrop-blur-xl mv-border-b mv-border-surface-container-high"><div class="mv-h-16 mv-w-full mv-px-margin-mobile mv-sm-px-margin d-flex align-items-center justify-content-between mv-gap-space-xs mv-sm-gap-space-md"><div class="d-flex align-items-center mv-gap-space-xs mv-sm-gap-space-xl"><a class="d-flex align-items-center mv-gap-space-sm mv-group" data-path="home" href="/home"><div class="mv-w-9 mv-h-9 mv-rounded-lg mv-bg-primary-container d-flex align-items-center justify-content-center mv-shadow-da2bcf mv-group-hover-scale-105 mv-transition-transform"><span class="material-symbols-outlined mv-text-c28550">play_arrow</span></div><span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-tracking-tight mv-text-on-surface">Movie<span class="mv-text-primary">Hub</span></span></a><nav class="d-none d-xl-flex align-items-center mv-gap-space-xs" data-active-classes="bg-surface-container-high text-on-surface rounded-full"><a class="mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" data-path="home" href="/home">Home</a><a class="mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" data-path="movies" href="/movies">Movies</a><a class="mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" data-path="categories" href="/categories">Categories</a><a class="mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" data-path="my-movies" href="/my-movies">My Movies</a><a class="mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" data-path="wallet" href="/wallet">Wallet</a></nav></div><div class="mv-flex-1 mv-max-w-md d-none d-xxl-block"><div class="mv-relative d-flex align-items-center"><span class="material-symbols-outlined mv-absolute mv-left-space-md mv-text-outline pe-none mv-text-27bd7e">search</span><input class="mv-w-full mv-h-10 mv-pl-10 mv-pr-space-md mv-bg-surface-container-low mv-border mv-border-surface-container-high mv-rounded-full mv-font-body-md mv-text-body-md mv-text-on-surface mv-placeholder-text-outline mv-focus-outline-none mv-focus-border-primary mv-focus-bg-surface-container mv-transition-all" placeholder="Search movies, genres..." type="text"/></div></div><div class="d-flex align-items-center mv-gap-1 mv-sm-gap-space-md"><a class="d-flex align-items-center mv-gap-space-xs mv-px-space-xs mv-sm-px-space-md mv-py-1p5 mv-bg-surface-container-low mv-border mv-border-surface-container-high mv-rounded-full mv-hover-border-tertiary_40 mv-transition-colors" data-path="wallet" href="/wallet"><span class="material-symbols-outlined mv-text-tertiary mv-text-c79a76">account_balance_wallet</span><span class="d-none d-sm-inline-block mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface">Rs. 300</span></a><button aria-label="Notifications" class="mv-w-9 mv-h-9 mv-rounded-full d-flex align-items-center justify-content-center mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-colors mv-relative" type="button"><span class="material-symbols-outlined mv-text-27bd7e">notifications</span><span class="mv-absolute mv-top-2 mv-right-2 mv-w-2 mv-h-2 mv-rounded-full mv-bg-primary mv-ring-2 mv-ring-surface"></span></button><div class="d-flex align-items-center mv-gap-space-xs mv-sm-gap-space-sm mv-pl-space-xs"><div class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-primary d-flex align-items-center justify-content-center"><span class="material-symbols-outlined mv-text-white mv-text-c79a76">person</span></div><div class="d-none d-lg-flex flex-column text-start"><span class="mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface mv-leading-tight">Ali Khan</span><span class="mv-font-label-sm mv-text-label-sm mv-text-tertiary mv-leading-tight">Premium TVOD</span></div><span class="material-symbols-outlined mv-text-outline mv-text-c79a76 d-none d-lg-inline-block">keyboard_arrow_down</span></div></div></div>    <nav aria-label="Main navigation" class="d-flex d-xl-none align-items-center mv-gap-space-xs overflow-x-auto mv-px-margin-mobile mv-sm-px-margin mv-pb-space-sm">
      <a class="flex-shrink-0 mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" href="/home">Home</a>
      <a class="flex-shrink-0 mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" href="/movies">Movies</a>
      <a class="flex-shrink-0 mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" href="/categories">Categories</a>
      <a class="flex-shrink-0 mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" href="/my-movies">My Movies</a>
      <a class="flex-shrink-0 mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" href="/wallet">Wallet</a>
    </nav></header><main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100"><div class="d-flex flex-column mv-w-full">
<!-- Atmospheric Background Glow Elements -->
<div class="mv-relative mv-w-full overflow-hidden">
<div class="mv-absolute mv-ntop-40 mv-left-1_4 mv-w-ee879d mv-h-f7c4b3 mv-bg-primary_10 mv-rounded-full mv-blur-a6575e pe-none mv-nz-10"></div>
<div class="mv-absolute mv-top-80 mv-right-10 mv-w-082318 mv-h-640857 mv-bg-secondary_10 mv-rounded-full mv-blur-0b005b pe-none mv-nz-10"></div>
<div class="mv-absolute mv-bottom-40 mv-left-10 mv-w-c5d208 mv-h-a7566b mv-bg-tertiary_10 mv-rounded-full mv-blur-e3271f pe-none mv-nz-10"></div>
<div class="mv-w-full mv-px-margin-mobile mv-sm-px-margin mv-py-space-xl d-flex flex-column mv-gap-space-xl">
<!-- Section 1: Header & Quick Category Search -->
<header class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mv-gap-space-lg">
<div class="d-flex flex-column mv-max-w-2xl">
<div class="d-inline-flex align-items-center mv-gap-space-xs mv-text-primary mv-font-label-md mv-text-label-md mv-tracking-wider text-uppercase mb-1">
<span class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-primary mv-animate-pulse"></span>
            Curated Catalog &amp; Genres
          </div>
<h1 class="mv-font-headline-xl-mobile mv-sm-font-headline-xl mv-text-headline-xl-mobile mv-sm-text-headline-xl mv-text-on-surface mv-tracking-tight">
            Explore Movie <span class="mv-text-transparent mv-bg-clip-text mv-bg-gradient-to-r mv-from-primary mv-via-secondary mv-to-tertiary">Categories</span>
</h1>
<p class="mv-font-body-lg mv-text-body-lg mv-text-on-surface-variant mt-1">
            Find your next favorite film curated by cinematic genre, regional film industries, mood, and premiere collections.
          </p>
</div>
<!-- Filter Input & View Meta -->
<div class="mv-w-full mv-md-w-80 d-flex flex-column mv-gap-space-xs">
<div class="mv-relative d-flex align-items-center">
<span class="material-symbols-outlined mv-absolute mv-left-space-md mv-text-outline pe-none mv-text-27bd7e">filter_list</span>
<input class="mv-w-full mv-h-11 mv-pl-11 mv-pr-space-md mv-bg-surface-container-low mv-text-on-surface mv-placeholder-text-outline mv-font-body-md mv-text-body-md mv-rounded-full mv-shadow-md mv-focus-bg-surface-container mv-focus-text-on-surface mv-focus-outline-none mv-transition-all" id="categorySearch" placeholder="Filter categories (e.g. Bollywood, Sci-Fi)..." type="text"/>
</div>
<div class="d-flex align-items-center justify-content-between mv-px-space-sm mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm">
<span>Showing <strong class="mv-text-primary mv-font-bold" id="itemCount">18</strong> curated shelves</span>
<span class="d-flex align-items-center mv-gap-1 mv-text-tertiary"><span class="material-symbols-outlined mv-text-0ddd99">bolt</span> Instant TVOD</span>
</div>
</div>
</header>
<!-- Section 2: Regional Powerhouses (Asymmetric Bento Highlight) -->
<section class="d-flex flex-column mv-gap-space-md">
<div class="d-flex align-items-center justify-content-between">
<div class="d-flex align-items-center mv-gap-space-sm">
<div class="mv-w-7 mv-h-7 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-primary">
<span class="material-symbols-outlined mv-text-c79a76">public</span>
</div>
<h2 class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface">Regional Film Industries</h2>
</div>
<span class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant">5 Worldwide Circuits</span>
</div>
<div class="d-grid mv-grid-cols-1 mv-md-grid-cols-12 mv-gap-gutter-mobile mv-sm-gap-gutter" id="regionalGrid">
<!-- Hollywood (Featured Large Bento Card) -->
<div class="mv-group mv-relative mv-md-col-span-6 mv-lg-col-span-5 mv-h-80 mv-rounded-xl overflow-hidden mv-cursor-pointer mv-shadow-xl mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1" data-category="hollywood blockbusters 4k uhd action premieres english">
<div class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center mv-transition-transform mv-duration-500 mv-group-hover-scale-105" data-alt="Cinematic Hollywood blockbuster movie production set with intense anamorphic lens flare, futuristic glowing cyber city backdrop, dark moody sci-fi ambiance, deep navy and cyan light reflections, 8k hyperrealistic render." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCLqW2gG3FXjZG4td-xK6g2uJ32nG4GJGZ3qR3yrALCJdhd_GF8njDoYC_Lc8Bgg1uuPURABHy5WJqb9roNK0Ee-A2sm15p4vLp8Ufia128azPJ6WXeCSKDnd4nSDfoQaHW0MEtK90X-Un7ZqDwKbpKcoVfOLRAnPtK6sU2W3FTISqJ61ddVQUWZlAaN_TZ4SO2HTMKxRjOATgLABTZt1ONemOyDm7-P8QRWWFwbP-CzQ1kID0ERYHRTA')"></div>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_60 mv-to-transparent"></div>
<div class="mv-absolute mv-inset-0 mv-bg-primary_10 mv-opacity-0 mv-group-hover-opacity-100 mv-transition-opacity"></div>
<div class="mv-relative h-100 mv-p-space-lg d-flex flex-column justify-content-between">
<div class="d-flex align-items-center justify-content-between">
<span class="mv-px-space-sm mv-py-1 mv-bg-surface-container-highest_80 mv-backdrop-blur-md mv-rounded-full mv-font-label-sm mv-text-label-sm mv-text-primary d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99">movie_filter</span> 4K UHD Master
                </span>
<span class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container_80 mv-backdrop-blur-md d-flex align-items-center justify-content-center mv-text-on-surface mv-group-hover-bg-primary mv-group-hover-text-white mv-transition-colors">
<span class="material-symbols-outlined mv-text-c79a76">arrow_outward</span>
</span>
</div>
<div class="d-flex flex-column mv-gap-space-xs">
<div class="mv-font-label-sm mv-text-label-sm mv-tracking-widest mv-text-primary text-uppercase">Global Cinema</div>
<h3 class="mv-font-headline-md mv-text-headline-md mv-text-on-surface mv-font-bold">Hollywood Blockbusters</h3>
<div class="d-flex align-items-center mv-gap-space-md mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
<span class="mv-text-on-surface mv-font-semibold">820+ Titles</span>
<span>•</span>
<span>Day-and-Date PPV Releases</span>
</div>
</div>
</div>
</div>
<!-- Bollywood & Hindi Cinema -->
<div class="mv-group mv-relative mv-md-col-span-6 mv-lg-col-span-4 mv-h-80 mv-rounded-xl overflow-hidden mv-cursor-pointer mv-shadow-xl mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1" data-category="bollywood hindi cinema drama romance musical blockbuster new release">
<div class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center mv-transition-transform mv-duration-500 mv-group-hover-scale-105" data-alt="Opulent Indian cinematic set with grand palace architecture, cinematic golden and deep cyan mood lighting, silhouetted protagonist standing amidst dynamic royal courtroom drama, 35mm film still." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC1AMfRFhwFV3KBbTmmA-YiuyPQpY0djni9pPmbM9PGCvwTvj--ui7bonMQCDejTZ1zVgCRTpJhwvZZltsAkI7zPmFke0ieCmcJfH3cG761-Fbw9nRo2hg_vyeNbz3rY69WYbmvbfvIalqV8AN6DjNtaUMdUSDCVp_c3SDND2fLFFBzZGJT_tnANVjNc085SY5hGHzKgNeWWVB9IMYg-5WJ5qGEirTJ0WlzyrD_Ouy0R1iZn2Lw2ZLq4w')"></div>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_60 mv-to-transparent"></div>
<div class="mv-absolute mv-inset-0 mv-bg-secondary_10 mv-opacity-0 mv-group-hover-opacity-100 mv-transition-opacity"></div>
<div class="mv-relative h-100 mv-p-space-lg d-flex flex-column justify-content-between">
<div class="d-flex align-items-center justify-content-between">
<span class="mv-px-space-sm mv-py-1 mv-bg-surface-container-highest_80 mv-backdrop-blur-md mv-rounded-full mv-font-label-sm mv-text-label-sm mv-text-secondary d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99">local_fire_department</span> Trending
                </span>
<span class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container_80 mv-backdrop-blur-md d-flex align-items-center justify-content-center mv-text-on-surface mv-group-hover-bg-secondary mv-group-hover-text-on-secondary mv-transition-colors">
<span class="material-symbols-outlined mv-text-c79a76">arrow_outward</span>
</span>
</div>
<div class="d-flex flex-column mv-gap-space-xs">
<div class="mv-font-label-sm mv-text-label-sm mv-tracking-widest mv-text-secondary text-uppercase">Mumbai Industry</div>
<h3 class="mv-font-headline-md mv-text-headline-md mv-text-on-surface mv-font-bold">Bollywood &amp; Hindi</h3>
<div class="d-flex align-items-center mv-gap-space-md mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
<span class="mv-text-on-surface mv-font-semibold">340+ Titles</span>
<span>•</span>
<span>New Weekly Rentals</span>
</div>
</div>
</div>
</div>
<!-- South Cinema (Tollywood / Kollywood) -->
<div class="mv-group mv-relative mv-md-col-span-12 mv-lg-col-span-3 mv-h-80 mv-rounded-xl overflow-hidden mv-cursor-pointer mv-shadow-xl mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1" data-category="south cinema tollywood kollywood mollywood action drama high octane">
<div class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center mv-transition-transform mv-duration-500 mv-group-hover-scale-105" data-alt="High octane South Indian cinema action freeze-frame with intense neon dusk backlighting, stylized debris in slow motion, rugged action hero silhouette, high drama cinematic composition." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuA7_PViaRd8ecBD54rPjv0ySxSCCftJE-EB9YqUAw7CU006WtSvbq_WVrl1sOHncwnWV_VVwDDtsFVDkrSLfWES3Ar6El_PGDdPXnGXzOJN6q__scAwSM5wHzV0ICLSY5HVTphmhyl1bxc-YeuxEhWJ-Sxc8VAWhBSkD9UEamlROMx5ZYYq8zRBwHkeYVd0O-_UjHPfPDThE3oF0b-SqN1CUvri14VZs_rxvynC6T5NK-Ei0svcMq0JlQ')"></div>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_60 mv-to-transparent"></div>
<div class="mv-absolute mv-inset-0 mv-bg-tertiary_10 mv-opacity-0 mv-group-hover-opacity-100 mv-transition-opacity"></div>
<div class="mv-relative h-100 mv-p-space-lg d-flex flex-column justify-content-between">
<div class="d-flex align-items-center justify-content-between">
<span class="mv-px-space-sm mv-py-1 mv-bg-surface-container-highest_80 mv-backdrop-blur-md mv-rounded-full mv-font-label-sm mv-text-label-sm mv-text-tertiary d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99">trending_up</span> Massive Hits
                </span>
<span class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container_80 mv-backdrop-blur-md d-flex align-items-center justify-content-center mv-text-on-surface mv-group-hover-bg-tertiary mv-group-hover-text-on-tertiary mv-transition-colors">
<span class="material-symbols-outlined mv-text-c79a76">arrow_outward</span>
</span>
</div>
<div class="d-flex flex-column mv-gap-space-xs">
<div class="mv-font-label-sm mv-text-label-sm mv-tracking-widest mv-text-tertiary text-uppercase">Tollywood / Kollywood</div>
<h3 class="mv-font-headline-md mv-text-headline-md mv-text-on-surface mv-font-bold">South Cinema</h3>
<div class="d-flex align-items-center mv-gap-space-sm mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
<span class="mv-text-on-surface mv-font-semibold">190+ Titles</span>
<span>•</span>
<span>Dolby 5.1</span>
</div>
</div>
</div>
</div>
<!-- Punjabi Cinema -->
<div class="mv-group mv-relative mv-md-col-span-6 mv-h-56 mv-rounded-xl overflow-hidden mv-cursor-pointer mv-shadow-xl mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1" data-category="punjabi cinema comedy romance pollywood vibrant desi">
<div class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center mv-transition-transform mv-duration-500 mv-group-hover-scale-105" data-alt="Vibrant Punjabi countryside cinema scene at golden hour dusk with lush mustard fields in deep contrast, warm rim lighting, vintage jeep silhouette, colorful modern cinematic tone." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDG4ok75os6fVcLBfVdPfChiCw3JE4hR_nIWEhvSpgyyza653gDQKNTvF02VKDrkxljcoxbZASCPv6oT0iIIdzXjBuHSgGsh4ujP49bFeo_y0wchFURqWQyXnBZhAowQ6Z93ERjKchRMmIpK1X28_zOL5vtczlg1AwhoVS_tHc3Y4yGB0fM4iCe5ch-avWGNlXMntlXpj0Az8QF1A7mhidan7bTJmIDMUdTNEjBVtZEdsR5xK4OzbObvg')"></div>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_70 mv-to-transparent"></div>
<div class="mv-relative h-100 mv-p-space-lg d-flex flex-column justify-content-between">
<div class="d-flex align-items-center justify-content-between">
<span class="mv-px-space-sm mv-py-0p5 mv-bg-surface-container-high_80 mv-rounded-full mv-font-label-sm mv-text-label-sm mv-text-on-surface">Regional Spotlight</span>
<span class="material-symbols-outlined mv-text-outline mv-group-hover-text-primary mv-transition-colors mv-text-27bd7e">chevron_right</span>
</div>
<div class="d-flex align-items-end justify-content-between">
<div>
<h3 class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface mv-font-bold">Punjabi Cinema</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-mt-0p5">75+ Titles • Comedy, Romance &amp; Desi Dramas</p>
</div>
<div class="mv-px-space-md mv-py-1 mv-bg-surface-container-high mv-rounded-full mv-font-label-md mv-text-label-md mv-text-primary">Rs. 99 avg</div>
</div>
</div>
</div>
<!-- World & Asian Cinema -->
<div class="mv-group mv-relative mv-md-col-span-6 mv-h-56 mv-rounded-xl overflow-hidden mv-cursor-pointer mv-shadow-xl mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1" data-category="world asian cinema korean japanese anime european auteur noir">
<div class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center mv-transition-transform mv-duration-500 mv-group-hover-scale-105" data-alt="Atmospheric neo-noir Asian metropolis with glowing rain-slicked pavement, neon blue and emerald reflections, solitary umbrella figure standing under cinematic streetlights, moody European art-house style." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBOX-x5ftyULq6vNZdKq29nLT7Kg-20D-DmOecUAQcNKD7UOk2DWy_vQ618GXL9NFMQNWb7AkFCVuCOtQDPMTtKXli2ita8Ms6Q4vVvhuEKK3H5SGPePm_1OZL3VuUzCn-jPhaapWMTrlWGcmZOUHHcaHoQWi2VAZ6ByuGuf8_jhQBpCCPk7rdl3LvPdKY56YYBdTuTXcyiTE_w6W2O6dgWmQZkFCOphoO256ePCYtvQ-ZeYWBLaZrG2w')"></div>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_70 mv-to-transparent"></div>
<div class="mv-relative h-100 mv-p-space-lg d-flex flex-column justify-content-between">
<div class="d-flex align-items-center justify-content-between">
<span class="mv-px-space-sm mv-py-0p5 mv-bg-surface-container-high_80 mv-rounded-full mv-font-label-sm mv-text-label-sm mv-text-on-surface">Auteur &amp; Festival</span>
<span class="material-symbols-outlined mv-text-outline mv-group-hover-text-primary mv-transition-colors mv-text-27bd7e">chevron_right</span>
</div>
<div class="d-flex align-items-end justify-content-between">
<div>
<h3 class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface mv-font-bold">World &amp; Asian Cinema</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-mt-0p5">120+ Titles • Korean Thrillers, Japanese Noir, Euro Arthouse</p>
</div>
<div class="mv-px-space-md mv-py-1 mv-bg-surface-container-high mv-rounded-full mv-font-label-md mv-text-secondary">Original Audio</div>
</div>
</div>
</div>
</div>
</section>
<!-- Section 3: Browse by Mood / Vibe (Interactive Pill Selector) -->
<section class="d-flex flex-column mv-gap-space-md mv-bg-surface-container-low mv-p-space-lg mv-rounded-xl mv-shadow-lg">
<div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between mv-gap-space-sm">
<div>
<span class="mv-font-label-sm mv-text-label-sm mv-text-tertiary mv-tracking-wider text-uppercase">Emotional Spectrum</span>
<h2 class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface">Browse by Mood &amp; Vibe</h2>
</div>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Tap a mood to filter instantaneous recommendations</p>
</div>
<div class="d-flex flex-wrap align-items-center mv-gap-space-sm" id="moodFilters">
<button class="mood-btn mv-px-space-md mv-py-2 mv-bg-primary mv-text-white mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-space-xs mv-transition-all mv-shadow-md mv-active-scale-95" data-mood="all">
<span class="material-symbols-outlined mv-text-58f475">apps</span>
            All Vibes
          </button>
<button class="mood-btn mv-px-space-md mv-py-2 mv-bg-surface-container-high mv-hover-bg-surface-container-highest mv-text-on-surface-variant mv-hover-text-on-surface mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-space-xs mv-transition-all mv-active-scale-95" data-mood="mind-bending">
<span class="material-symbols-outlined mv-text-58f475 mv-text-primary">psychology</span>
            Mind-Bending Plots
          </button>
<button class="mood-btn mv-px-space-md mv-py-2 mv-bg-surface-container-high mv-hover-bg-surface-container-highest mv-text-on-surface-variant mv-hover-text-on-surface mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-space-xs mv-transition-all mv-active-scale-95" data-mood="adrenaline">
<span class="material-symbols-outlined mv-text-58f475 mv-text-error">speed</span>
            Adrenaline Rush
          </button>
<button class="mood-btn mv-px-space-md mv-py-2 mv-bg-surface-container-high mv-hover-bg-surface-container-highest mv-text-on-surface-variant mv-hover-text-on-surface mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-space-xs mv-transition-all mv-active-scale-95" data-mood="chills">
<span class="material-symbols-outlined mv-text-58f475 mv-text-secondary">bedtime</span>
            Late Night Chills
          </button>
<button class="mood-btn mv-px-space-md mv-py-2 mv-bg-surface-container-high mv-hover-bg-surface-container-highest mv-text-on-surface-variant mv-hover-text-on-surface mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-space-xs mv-transition-all mv-active-scale-95" data-mood="feel-good">
<span class="material-symbols-outlined mv-text-58f475 mv-text-tertiary">sentiment_very_satisfied</span>
            Feel Good &amp; Warm
          </button>
<button class="mood-btn mv-px-space-md mv-py-2 mv-bg-surface-container-high mv-hover-bg-surface-container-highest mv-text-on-surface-variant mv-hover-text-on-surface mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-space-xs mv-transition-all mv-active-scale-95" data-mood="spectacle">
<span class="material-symbols-outlined mv-text-58f475 mv-text-secondary-fixed">auto_awesome</span>
            Epic Visual Spectacle
          </button>
<button class="mood-btn mv-px-space-md mv-py-2 mv-bg-surface-container-high mv-hover-bg-surface-container-highest mv-text-on-surface-variant mv-hover-text-on-surface mv-rounded-full mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-space-xs mv-transition-all mv-active-scale-95" data-mood="gritty">
<span class="material-symbols-outlined mv-text-58f475 mv-text-outline">shield_with_heart</span>
            Gritty &amp; Realistic
          </button>
</div>
</section>
<!-- Section 4: Curated Genre Collections Grid -->
<section class="d-flex flex-column mv-gap-space-md">
<div class="d-flex align-items-center justify-content-between">
<div>
<div class="mv-font-label-sm mv-text-label-sm mv-text-primary mv-tracking-widest text-uppercase">Direct Genre Vaults</div>
<h2 class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface">Curated Genre Collections</h2>
</div>
<span class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant">10 Genres Available</span>
</div>
<div class="d-grid mv-grid-cols-1 mv-sm-grid-cols-2 mv-lg-grid-cols-5 mv-gap-gutter-mobile mv-sm-gap-gutter" id="genreGrid">
<!-- 1. Action & Adventure -->
<div class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden" data-category="action adventure explosion thrill combat adrenaline">
<div class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-primary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"></div>
<div class="d-flex flex-column mv-gap-space-md">
<div class="d-flex align-items-center justify-content-between">
<div class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-primary mv-group-hover-bg-primary mv-group-hover-text-white mv-transition-colors">
<span class="material-symbols-outlined mv-text-c28550">rocket_launch</span>
</div>
<span class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant">510+ Titles</span>
</div>
<div>
<h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-primary mv-transition-colors">Action &amp; Adventure</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">Explosions, stealth combat &amp; high stakes</p>
</div>
</div>
<div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Explosion</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Thrill</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Combat</span>
</div>
</div>
<!-- 2. Sci-Fi & Cyberpunk -->
<div class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden" data-category="sci-fi cyberpunk space time travel dystopia mind-bending spectacle">
<div class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-secondary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"></div>
<div class="d-flex flex-column mv-gap-space-md">
<div class="d-flex align-items-center justify-content-between">
<div class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-secondary mv-group-hover-bg-secondary mv-group-hover-text-on-secondary mv-transition-colors">
<span class="material-symbols-outlined mv-text-c28550">blur_on</span>
</div>
<span class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant">280+ Titles</span>
</div>
<div>
<h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-secondary mv-transition-colors">Sci-Fi &amp; Cyberpunk</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">Dystopian futures, cosmos &amp; quantum leaps</p>
</div>
</div>
<div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Space</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Time Travel</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Dystopia</span>
</div>
</div>
<!-- 3. Psychological Thriller & Mystery -->
<div class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden" data-category="psychological thriller mystery crime suspense noir mind-bending">
<div class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-tertiary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"></div>
<div class="d-flex flex-column mv-gap-space-md">
<div class="d-flex align-items-center justify-content-between">
<div class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-tertiary mv-group-hover-bg-tertiary mv-group-hover-text-on-tertiary mv-transition-colors">
<span class="material-symbols-outlined mv-text-c28550">visibility</span>
</div>
<span class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant">310+ Titles</span>
</div>
<div>
<h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-tertiary mv-transition-colors">Psychological Thriller</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">Twisting narratives, suspense &amp; dark secrets</p>
</div>
</div>
<div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Crime</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Suspense</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Noir</span>
</div>
</div>
<!-- 4. Horror & Paranormal -->
<div class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden" data-category="horror paranormal supernatural slasher psychological chills">
<div class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-error_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"></div>
<div class="d-flex flex-column mv-gap-space-md">
<div class="d-flex align-items-center justify-content-between">
<div class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-error mv-group-hover-bg-error mv-group-hover-text-on-error mv-transition-colors">
<span class="material-symbols-outlined mv-text-c28550">dark_mode</span>
</div>
<span class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant">140+ Titles</span>
</div>
<div>
<h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-error mv-transition-colors">Horror &amp; Paranormal</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">Hauntings, demonic encounters &amp; slashers</p>
</div>
</div>
<div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Supernatural</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Slasher</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Psych</span>
</div>
</div>
<!-- 5. Comedy & Satire -->
<div class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden" data-category="comedy satire dark comedy standup rom-com feel-good">
<div class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-primary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"></div>
<div class="d-flex flex-column mv-gap-space-md">
<div class="d-flex align-items-center justify-content-between">
<div class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-primary mv-group-hover-bg-primary mv-group-hover-text-white mv-transition-colors">
<span class="material-symbols-outlined mv-text-c28550">mood</span>
</div>
<span class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant">260+ Titles</span>
</div>
<div>
<h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-primary mv-transition-colors">Comedy &amp; Satire</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">Laugh-out-loud hits &amp; biting social satires</p>
</div>
</div>
<div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Dark Humor</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Standup</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Rom-Com</span>
</div>
</div>
<!-- 6. Drama & Romance -->
<div class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden" data-category="drama romance emotional biopic classic feel-good">
<div class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-tertiary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"></div>
<div class="d-flex flex-column mv-gap-space-md">
<div class="d-flex align-items-center justify-content-between">
<div class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-tertiary mv-group-hover-bg-tertiary mv-group-hover-text-on-tertiary mv-transition-colors">
<span class="material-symbols-outlined mv-text-c28550">favorite</span>
</div>
<span class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant">430+ Titles</span>
</div>
<div>
<h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-tertiary mv-transition-colors">Drama &amp; Romance</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">Intimate relationships, hardships &amp; triumphs</p>
</div>
</div>
<div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Emotional</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Biopic</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Classic</span>
</div>
</div>
<!-- 7. Crime & Gangster Sagas -->
<div class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden" data-category="crime gangster sagas underworld heist mafia gritty">
<div class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-secondary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"></div>
<div class="d-flex flex-column mv-gap-space-md">
<div class="d-flex align-items-center justify-content-between">
<div class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-secondary mv-group-hover-bg-secondary mv-group-hover-text-on-secondary mv-transition-colors">
<span class="material-symbols-outlined mv-text-c28550">shield</span>
</div>
<span class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant">210+ Titles</span>
</div>
<div>
<h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-secondary mv-transition-colors">Crime &amp; Gangster</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">Underworld empires, master heists &amp; mobsters</p>
</div>
</div>
<div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Underworld</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Heist</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Mafia</span>
</div>
</div>
<!-- 8. Animation & Anime -->
<div class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden" data-category="animation anime japanese anime 3d cgi family spectacle">
<div class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-primary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"></div>
<div class="d-flex flex-column mv-gap-space-md">
<div class="d-flex align-items-center justify-content-between">
<div class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-primary mv-group-hover-bg-primary mv-group-hover-text-white mv-transition-colors">
<span class="material-symbols-outlined mv-text-c28550">animation</span>
</div>
<span class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant">175+ Titles</span>
</div>
<div>
<h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-primary mv-transition-colors">Animation &amp; Anime</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">Shonen masterworks, Studio Ghibli &amp; 3D CGI</p>
</div>
</div>
<div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Anime</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">3D CGI</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Family</span>
</div>
</div>
<!-- 9. Historical & Epics -->
<div class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden" data-category="historical epics period drama war kingdoms spectacle gritty">
<div class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-secondary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"></div>
<div class="d-flex flex-column mv-gap-space-md">
<div class="d-flex align-items-center justify-content-between">
<div class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-secondary mv-group-hover-bg-secondary mv-group-hover-text-on-secondary mv-transition-colors">
<span class="material-symbols-outlined mv-text-c28550">fort</span>
</div>
<span class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant">95+ Titles</span>
</div>
<div>
<h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-secondary mv-transition-colors">Historical &amp; Epics</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">Battlefield chronicles, empires &amp; legends</p>
</div>
</div>
<div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Period</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">War</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Dynasties</span>
</div>
</div>
<!-- 10. Documentaries & Real Stories -->
<div class="genre-card mv-group d-flex flex-column justify-content-between mv-p-space-md mv-bg-surface-container mv-rounded-xl mv-shadow-md mv-hover-ntranslate-y-1p5 mv-transition-all mv-duration-300 mv-cursor-pointer mv-relative overflow-hidden" data-category="documentaries real stories science true crime sports gritty mind-bending">
<div class="mv-absolute mv-nright-6 mv-nbottom-6 mv-w-24 mv-h-24 mv-bg-tertiary_10 mv-rounded-full mv-blur-xl mv-group-hover-scale-150 mv-transition-transform"></div>
<div class="d-flex flex-column mv-gap-space-md">
<div class="d-flex align-items-center justify-content-between">
<div class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-tertiary mv-group-hover-bg-tertiary mv-group-hover-text-on-tertiary mv-transition-colors">
<span class="material-symbols-outlined mv-text-c28550">videocam</span>
</div>
<span class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface-variant">80+ Titles</span>
</div>
<div>
<h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold mv-group-hover-text-tertiary mv-transition-colors">Documentaries</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">Deep dives into true crimes, athletes &amp; nature</p>
</div>
</div>
<div class="mt-4 mv-pt-space-sm d-flex flex-wrap mv-gap-1">
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">True Crime</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Science</span>
<span class="mv-text-3eb376 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-low mv-text-on-surface-variant">Athletics</span>
</div>
</div>
</div>
</section>
<!-- Section 5: Special Collections & Spotlights -->
<section class="d-flex flex-column mv-gap-space-md">
<div class="d-flex align-items-center justify-content-between">
<div>
<div class="mv-font-label-sm mv-text-label-sm mv-text-tertiary mv-tracking-widest text-uppercase">Premium Hub Programs</div>
<h2 class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface">Curated Premiere Spotlights</h2>
</div>
<span class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant">Exclusive Collections</span>
</div>
<div class="d-grid mv-grid-cols-1 mv-md-grid-cols-3 mv-gap-gutter-mobile mv-sm-gap-gutter" id="specialGrid">
<!-- Spotlight 1: 4K Ultra HD & Dolby Atmos -->
<div class="mv-group mv-relative mv-h-64 mv-rounded-xl overflow-hidden mv-cursor-pointer mv-shadow-xl d-flex flex-column justify-content-end mv-p-space-lg mv-bg-surface-container mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1" data-category="4k ultra hd dolby atmos master collection bitrate">
<div class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center mv-transition-transform mv-duration-500 mv-group-hover-scale-105" data-alt="Abstract cinematic optical soundwave and light spectrum visualization, luminous cyan laser refraction against obsidian deep black backdrop, modern high-fidelity audio equipment aesthetic." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC9hWbUmFVnZfnKqwHsWCythQ1eTE0QHopFvKyyDwFglA81OadweuUY5N3uviAzab1i0Zs3mi67x-QxlMbtgNHZkDBW6-hyfeFKovR5A_Bov58y_SjcH8HG3WRzb2IHfk2no0EIhE8MmZ6z2MBXbqrdzuqUl_zLd0hTUMX2B4YLFwNPyEO9t_QQaCajhGwD0mMJu5gECRMjyqC_6sPuM0ZA2Y5CZEUcsbt8-r4vsESB6UbfReni-tmvMg')"></div>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_80 mv-to-transparent"></div>
<div class="mv-relative d-flex flex-column mv-gap-space-xs">
<div class="d-flex align-items-center mv-gap-space-xs">
<span class="mv-px-2 mv-py-0p5 mv-bg-primary mv-text-white mv-font-label-sm mv-text-label-sm mv-rounded mv-font-bold">4K HDR</span>
<span class="mv-px-2 mv-py-0p5 mv-bg-surface-container-high mv-text-secondary mv-font-label-sm mv-text-label-sm mv-rounded mv-font-semibold">DOLBY ATMOS</span>
</div>
<h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold">4K Ultra HD &amp; Atmos Master</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">250+ Certified uncompressed bitrate theatrical masters for true home theatre setups.</p>
<div class="mt-1 d-flex align-items-center mv-text-primary mv-font-label-md mv-text-label-md mv-group-hover-translate-x-1 mv-transition-transform">
                Explore The Master Collection <span class="material-symbols-outlined mv-text-58f475 ms-1">arrow_forward</span>
</div>
</div>
</div>
<!-- Spotlight 2: Top IMDb Rated 8.5+ -->
<div class="mv-group mv-relative mv-h-64 mv-rounded-xl overflow-hidden mv-cursor-pointer mv-shadow-xl d-flex flex-column justify-content-end mv-p-space-lg mv-bg-surface-container mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1" data-category="top imdb rated 8.5 highest rated masterpieces critical acclaim">
<div class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center mv-transition-transform mv-duration-500 mv-group-hover-scale-105" data-alt="Vintage golden laurels resting on textured dark black slate marble, dramatic cinematic side spotlighting, timeless cinema prestige award festival atmosphere with subtle bokeh dots." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDLer8Cuw35rPjB_HfNA976qViqNnOwSP_6shasjhTFyHkjvk-vMrqKuC4r7ruWxeesCovMD99m6D_ig1Zvr2r2lWHZ9HNqZ4u_hKtQ_BvBmNveTx1xD4mVcNraTUdk_G5pdlZLchyFdRo_qSeZqZUR1ORvwkuCTykgeTdsVdcw3x_uilM31lnnDziPaBzsjIk75TO6RqTJEj1metIlykGEJM9ThzWfnJAsEp7G5q9hEqihTWHZWYqOow')"></div>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_80 mv-to-transparent"></div>
<div class="mv-relative d-flex flex-column mv-gap-space-xs">
<div class="d-flex align-items-center mv-gap-space-xs">
<span class="mv-px-2 mv-py-0p5 mv-bg-tertiary-container mv-text-on-tertiary mv-font-label-sm mv-text-label-sm mv-rounded mv-font-bold d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-773d8f" style="font-variation-settings: 'FILL' 1;">star</span> 8.5+ IMDb
                </span>
<span class="mv-px-2 mv-py-0p5 mv-bg-surface-container-high mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm mv-rounded">Critical Acclaim</span>
</div>
<h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold">Top IMDb Masterpieces</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">The highest rated cinematic triumphs in history, vetted by global critics and film buffs.</p>
<div class="mt-1 d-flex align-items-center mv-text-tertiary mv-font-label-md mv-text-label-md mv-group-hover-translate-x-1 mv-transition-transform">
                Stream Hall of Fame <span class="material-symbols-outlined mv-text-58f475 ms-1">arrow_forward</span>
</div>
</div>
</div>
<!-- Spotlight 3: Under Rs. 50 Flash Rentals -->
<div class="mv-group mv-relative mv-h-64 mv-rounded-xl overflow-hidden mv-cursor-pointer mv-shadow-xl d-flex flex-column justify-content-end mv-p-space-lg mv-bg-surface-container mv-transition-all mv-duration-300 mv-hover-ntranslate-y-1" data-category="under rs 50 flash rentals budget cheap low price wallet friendly">
<div class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center mv-transition-transform mv-duration-500 mv-group-hover-scale-105" data-alt="High tech digital neon ticket dispenser with glowing blue and green laser scanlines, dark obsidian theater entrance with shimmering floor reflections, 4k digital render." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC_rK1gKqxWgfyMpsnyGfpNZ8Mwjuwv0SmhW7F048AERBh8ne63bPOmEq4o_3-KxgYORxvWClU7QfeY8riiIJf84ykT07gSbSXh80jhJYYbF5de3rqS3VsD5zBUz_Zk8246NkwhyA1nmulE5ZFUAR9X9O8t9YBQoV8S8_Y__ecI3G07SHsR7eVt7Q8SnSf6nwEgeV7Qpmmquqin0JEIaQ8ZMxA1N2QLGTXhve08tWE8md6lm6nOVSAb-Q')"></div>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_80 mv-to-transparent"></div>
<div class="mv-relative d-flex flex-column mv-gap-space-xs">
<div class="d-flex align-items-center mv-gap-space-xs">
<span class="mv-px-2 mv-py-0p5 mv-bg-secondary mv-text-on-secondary mv-font-label-sm mv-text-label-sm mv-rounded mv-font-bold">FLASH SALE</span>
<span class="mv-px-2 mv-py-0p5 mv-bg-surface-container-high mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm mv-rounded">From Rs. 29</span>
</div>
<h3 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold">Under Rs. 50 TVOD Vault</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Weekly rotating budget hits. Instant 48-hour rental window using your MovieHub wallet.</p>
<div class="mt-1 d-flex align-items-center mv-text-secondary mv-font-label-md mv-text-label-md mv-group-hover-translate-x-1 mv-transition-transform">
                Browse Flash Rentals <span class="material-symbols-outlined mv-text-58f475 ms-1">arrow_forward</span>
</div>
</div>
</div>
</div>
</section>
<!-- Quick Platform Stream Status Strip -->
<section class="mv-p-space-lg mv-bg-surface-container mv-rounded-xl d-flex flex-column flex-md-row align-items-center justify-content-between mv-gap-space-md mv-shadow-md">
<div class="d-flex align-items-center mv-gap-space-md">
<div class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-primary_10 d-flex align-items-center justify-content-center mv-text-primary">
<span class="material-symbols-outlined mv-text-deed42">speed</span>
</div>
<div>
<h4 class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold">Instant High-Bitrate Delivery</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">All categories support adaptive 4K UHD streaming with offline download options on mobile.</p>
</div>
</div>
<div class="d-flex align-items-center mv-gap-space-sm mv-w-full mv-md-w-auto">
<button class="mv-w-full mv-md-w-auto mv-px-space-lg mv-py-2p5 mv-bg-surface-container-high mv-hover-bg-surface-container-highest mv-text-on-surface mv-rounded-full mv-font-label-md mv-text-label-md mv-transition-colors d-flex align-items-center justify-content-center mv-gap-space-xs">
<span class="material-symbols-outlined mv-text-c79a76">account_balance_wallet</span>
            Top-up Wallet (Rs. 300)
          </button>
<button class="mv-w-full mv-md-w-auto mv-px-space-lg mv-py-2p5 mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-rounded-full mv-font-label-md mv-text-label-md mv-transition-colors mv-shadow-md d-flex align-items-center justify-content-center mv-gap-space-xs">
<span class="material-symbols-outlined mv-text-c79a76">play_circle</span>
            Latest Releases
          </button>
</div>
</section>
</div>
</div>

</div></main><footer class="mv-w-full mv-bg-surface-container-lowest mv-border-t mv-border-surface-container-high_60 mv-py-space-xl"><div class="mv-w-full mv-px-margin-mobile mv-sm-px-margin"><div class="d-grid mv-grid-cols-1 mv-md-grid-cols-4 mv-gap-gutter-mobile mv-sm-gap-gutter mv-mb-space-xl"><div class="d-flex flex-column mv-gap-space-sm"><div class="d-flex align-items-center mv-gap-space-sm"><div class="mv-w-8 mv-h-8 mv-rounded-lg mv-bg-primary-container d-flex align-items-center justify-content-center"><span class="material-symbols-outlined mv-text-c79a76">play_arrow</span></div><span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Movie<span class="mv-text-primary">Hub</span></span></div><p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-max-w-xs mt-1">Next-generation cinematic streaming and pay-per-view rentals in 4K HDR. Stream instantly or download offline.</p></div><div><h4 class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface mb-3 text-uppercase mv-tracking-wider">Discover</h4><ul class="d-flex flex-column mv-gap-space-sm mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant"><li><a class="mv-hover-text-on-surface mv-transition-colors" href="/movies">New Releases</a></li><li><a class="mv-hover-text-on-surface mv-transition-colors" href="/movies">Top 10 Rentals</a></li><li><a class="mv-hover-text-on-surface mv-transition-colors" href="/categories">Action &amp; Thriller</a></li><li><a class="mv-hover-text-on-surface mv-transition-colors" href="/categories">Sci-Fi Blockbusters</a></li></ul></div><div><h4 class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface mb-3 text-uppercase mv-tracking-wider">My Account</h4><ul class="d-flex flex-column mv-gap-space-sm mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant"><li><a class="mv-hover-text-on-surface mv-transition-colors" href="/my-movies">Active Rentals</a></li><li><a class="mv-hover-text-on-surface mv-transition-colors" href="/wallet">Wallet Top-up</a></li><li><a class="mv-hover-text-on-surface mv-transition-colors" href="/my-movies">Watchlist</a></li><li><a class="mv-hover-text-on-surface mv-transition-colors" href="/payment/success">Purchase Receipts</a></li></ul></div><div><h4 class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface mb-3 text-uppercase mv-tracking-wider">Platform</h4><ul class="d-flex flex-column mv-gap-space-sm mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant"><li><a class="mv-hover-text-on-surface mv-transition-colors" href="/watch/1">Supported Devices</a></li><li><a class="mv-hover-text-on-surface mv-transition-colors" href="/watch/1">4K Streaming Guide</a></li><li><a class="mv-hover-text-on-surface mv-transition-colors" href="/browse#legal">Terms of Service</a></li><li><a class="mv-hover-text-on-surface mv-transition-colors" href="/browse#legal">Privacy Policy</a></li></ul></div></div><div class="d-flex flex-column flex-md-row align-items-center justify-content-between mv-pt-space-lg mv-border-t mv-border-surface-container-high_40 mv-text-on-surface-variant mv-font-body-sm mv-text-body-sm"><p>© 2025 MovieHub Entertainment Inc. All rights reserved.</p><div class="d-flex align-items-center mv-gap-space-md mt-2 mt-md-0"><span class="d-flex align-items-center mv-gap-1"><span class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-tertiary"></span> High-speed CDN Online</span><span>4K UltraHD TVOD</span></div></div></div></footer>
</template>

<script>
import { onMounted } from 'vue';
import { bootPage } from '../runPageScript';

const externals = [
    
];

export default {
    name: 'CategoriesPage',
    setup() {
        onMounted(() => bootPage(externals, 'KGZ1bmN0aW9uKCkgewogICAgICB2YXIgc2VhcmNoSW5wdXQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnY2F0ZWdvcnlTZWFyY2gnKTsKICAgICAgdmFyIG1vb2RCdXR0b25zID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLm1vb2QtYnRuJyk7CiAgICAgIHZhciBhbGxDYXJkcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJ1tkYXRhLWNhdGVnb3J5XScpOwogICAgICB2YXIgaXRlbUNvdW50ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2l0ZW1Db3VudCcpOwoKICAgICAgdmFyIGN1cnJlbnRTZWFyY2ggPSAnJzsKICAgICAgdmFyIGFjdGl2ZU1vb2QgPSAnYWxsJzsKCiAgICAgIGZ1bmN0aW9uIHVwZGF0ZUZpbHRlcmluZygpIHsKICAgICAgICB2YXIgdmlzaWJsZSA9IDA7CgogICAgICAgIGFsbENhcmRzLmZvckVhY2goY2FyZCA9PiB7CiAgICAgICAgICB2YXIgY2F0ZWdvcnlUYWdzID0gKGNhcmQuZ2V0QXR0cmlidXRlKCdkYXRhLWNhdGVnb3J5JykgfHwgJycpLnRvTG93ZXJDYXNlKCk7CiAgICAgICAgICB2YXIgbWF0Y2hlc1NlYXJjaCA9ICFjdXJyZW50U2VhcmNoIHx8IGNhdGVnb3J5VGFncy5pbmNsdWRlcyhjdXJyZW50U2VhcmNoKTsKICAgICAgICAgIHZhciBtYXRjaGVzTW9vZCA9IChhY3RpdmVNb29kID09PSAnYWxsJykgfHwgY2F0ZWdvcnlUYWdzLmluY2x1ZGVzKGFjdGl2ZU1vb2QpOwoKICAgICAgICAgIGlmIChtYXRjaGVzU2VhcmNoICYmIG1hdGNoZXNNb29kKSB7CiAgICAgICAgICAgIGNhcmQuc3R5bGUuZGlzcGxheSA9ICcnOwogICAgICAgICAgICB2aXNpYmxlKys7CiAgICAgICAgICB9IGVsc2UgewogICAgICAgICAgICBjYXJkLnN0eWxlLmRpc3BsYXkgPSAnbm9uZSc7CiAgICAgICAgICB9CiAgICAgICAgfSk7CgogICAgICAgIGlmIChpdGVtQ291bnQpIHsKICAgICAgICAgIGl0ZW1Db3VudC50ZXh0Q29udGVudCA9IHZpc2libGU7CiAgICAgICAgfQogICAgICB9CgogICAgICBpZiAoc2VhcmNoSW5wdXQpIHsKICAgICAgICBzZWFyY2hJbnB1dC5hZGRFdmVudExpc3RlbmVyKCdpbnB1dCcsIChlKSA9PiB7CiAgICAgICAgICBjdXJyZW50U2VhcmNoID0gZS50YXJnZXQudmFsdWUudHJpbSgpLnRvTG93ZXJDYXNlKCk7CiAgICAgICAgICB1cGRhdGVGaWx0ZXJpbmcoKTsKICAgICAgICB9KTsKICAgICAgfQoKICAgICAgbW9vZEJ1dHRvbnMuZm9yRWFjaChidG4gPT4gewogICAgICAgIGJ0bi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsICgpID0+IHsKICAgICAgICAgIG1vb2RCdXR0b25zLmZvckVhY2goYiA9PiB7CiAgICAgICAgICAgIGIuY2xhc3NMaXN0LnJlbW92ZSgnbXYtYmctcHJpbWFyeScsICdtdi10ZXh0LXdoaXRlJywgJ212LXNoYWRvdy1tZCcpOwogICAgICAgICAgICBiLmNsYXNzTGlzdC5hZGQoJ212LWJnLXN1cmZhY2UtY29udGFpbmVyLWhpZ2gnLCAnbXYtdGV4dC1vbi1zdXJmYWNlLXZhcmlhbnQnKTsKICAgICAgICAgIH0pOwoKICAgICAgICAgIGJ0bi5jbGFzc0xpc3QucmVtb3ZlKCdtdi1iZy1zdXJmYWNlLWNvbnRhaW5lci1oaWdoJywgJ212LXRleHQtb24tc3VyZmFjZS12YXJpYW50Jyk7CiAgICAgICAgICBidG4uY2xhc3NMaXN0LmFkZCgnbXYtYmctcHJpbWFyeScsICdtdi10ZXh0LXdoaXRlJywgJ212LXNoYWRvdy1tZCcpOwoKICAgICAgICAgIGFjdGl2ZU1vb2QgPSBidG4uZ2V0QXR0cmlidXRlKCdkYXRhLW1vb2QnKSB8fCAnYWxsJzsKICAgICAgICAgIHVwZGF0ZUZpbHRlcmluZygpOwogICAgICAgIH0pOwogICAgICB9KTsKICAgIH0pKCk7'));
    },
};
</script>
