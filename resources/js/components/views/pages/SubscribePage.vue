<template>
<div class="mv-fixed mv-top-16 start-0 bottom-0 mv-w-64 mv-bg-surface mv-border-r mv-border-surface-container-high mv-z-40 d-none d-md-flex flex-column justify-content-between mv-p-space-md"><div class="d-flex flex-column mv-gap-space-md"><div class="mv-px-space-sm mv-py-space-xs"><span class="mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-text-outline mv-font-bold">User Menu</span></div><nav class="d-flex flex-column mv-gap-space-xs" data-active-classes="bg-surface-container-high text-primary font-semibold rounded-lg"><a aria-current="page" class="mv-px-space-md mv-py-2p5 mv-transition-colors mv-bg-surface-container-high mv-text-primary mv-font-semibold mv-rounded-lg" data-path="dashboard" href="/wallet">Dashboard</a><a class="mv-px-space-md mv-py-2p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-colors mv-rounded-lg" data-path="my-movies" href="/my-movies">My Movies</a><a class="mv-px-space-md mv-py-2p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-colors mv-rounded-lg" data-path="wallet" href="/wallet">Wallet</a><a class="mv-px-space-md mv-py-2p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-colors mv-rounded-lg" data-path="purchase-history" href="/payment/success">Purchase History</a><a class="mv-px-space-md mv-py-2p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-colors mv-rounded-lg" data-path="profile" href="/wallet">Profile</a><a class="mv-px-space-md mv-py-2p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-colors mv-rounded-lg" data-path="settings" href="/wallet">Settings</a></nav></div><div class="d-flex flex-column mv-gap-space-sm mv-pt-space-md mv-border-t mv-border-surface-container-high_60"><a class="mv-px-space-md mv-py-2 mv-font-label-md mv-text-label-md mv-text-on-surface-variant mv-hover-text-on-surface d-flex align-items-center justify-content-between" data-path="home" href="/home"><span>Back to Stream</span><span class="material-symbols-outlined mv-text-c79a76">arrow_forward</span></a><a class="mv-px-space-md mv-py-2 mv-font-label-md mv-text-label-md mv-text-error_80 mv-hover-text-error mv-transition-colors d-flex align-items-center justify-content-between" data-path="login" href="/login"><span>Sign Out</span><span class="material-symbols-outlined mv-text-c79a76">logout</span></a></div></div><main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-md-pl-64 mv-bg-surface-container-lowest min-vh-100"><div class="d-flex flex-column mv-w-full">
<!-- Interactive / Modal Backdrop Layer (Hidden by default) -->
<div class="mv-fixed mv-inset-0 mv-z-50 d-flex align-items-center justify-content-center mv-bg-surface-container-lowest_80 mv-backdrop-blur-md mv-opacity-0 pe-none mv-transition-all mv-duration-300" id="quick-recharge-modal">
<div class="mv-bg-surface-container-high mv-rounded-xl mv-p-space-lg mv-w-full mv-max-w-md mv-shadow-2xl mv-relative">
<div class="d-flex align-items-center justify-content-between mb-3">
<div class="d-flex align-items-center mv-gap-space-sm">
<span class="material-symbols-outlined mv-text-primary mv-text-59700f">account_balance_wallet</span>
<h3 class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface mv-font-bold">Top Up Wallet</h3>
</div>
<button class="mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" id="close-modal-btn">
<span class="material-symbols-outlined">close</span>
</button>
</div>
<p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant mb-4">Instant TVOD reload via EasyPaisa, JazzCash, or Debit Card.</p>
<div class="d-grid mv-grid-cols-3 mv-gap-space-sm mb-4">
<button class="amount-pill mv-py-2p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface mv-font-label-md mv-text-label-md mv-hover-bg-primary mv-hover-text-white mv-transition-all">Rs. 100</button>
<button class="amount-pill mv-py-2p5 mv-rounded-full mv-bg-primary-container mv-font-label-md mv-text-label-md mv-shadow-8c4ebd">Rs. 200</button>
<button class="amount-pill mv-py-2p5 mv-rounded-full mv-bg-surface-container-highest mv-text-on-surface mv-font-label-md mv-text-label-md mv-hover-bg-primary mv-hover-text-white mv-transition-all">Rs. 500</button>
</div>
<button class="mv-w-full mv-py-3 mv-rounded-full mv-bg-primary mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold mv-shadow-d057f2 mv-hover-bg-primary-fixed mv-transition-all d-flex align-items-center justify-content-center mv-gap-space-xs" id="confirm-recharge-btn">
<span class="material-symbols-outlined mv-text-27bd7e">bolt</span>
<span>Proceed to Secure Gateway</span>
</button>
</div>
</div>
<!-- Dashboard Main Content Space -->
<div class="mv-p-margin mv-md-p-space-xl mv-max-w-7xl mx-auto d-flex flex-column mv-gap-space-xl">
<!-- Greeting & Header Overview -->
<div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mv-gap-space-md">
<div>
<div class="d-flex align-items-center mv-gap-space-xs mv-text-primary mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mb-1 mv-font-bold">
<span class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-tertiary mv-animate-pulse"></span>
<span>Account Overview</span>
</div>
<h1 class="mv-font-headline-lg-mobile mv-sm-font-headline-lg mv-text-headline-lg-mobile mv-sm-text-headline-lg mv-font-bold mv-text-on-surface mv-tracking-tight">Dashboard</h1>
</div>
<div class="d-flex align-items-center mv-gap-space-sm mv-bg-surface-container-low mv-px-space-md mv-py-1p5 mv-rounded-full">
<span class="material-symbols-outlined mv-text-outline mv-text-c79a76">calendar_today</span>
<span class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant mv-font-medium">Session Active • 27 Sep 2026</span>
</div>
</div>
<!-- Hero Bento Card: Wallet Balance Banner (Green glow / high-tech financial card) -->
<div class="mv-relative overflow-hidden mv-rounded-xl mv-bg-gradient-to-br mv-from-surface-container mv-via-surface-container-low mv-to-surface-container-lowest mv-p-space-lg mv-md-p-space-xl mv-shadow-xl">
<!-- Ambient Backlight Accents -->
<div class="mv-absolute mv-ntop-24 mv-nright-24 mv-w-80 mv-h-80 mv-rounded-full mv-bg-tertiary_10 mv-blur-3xl pe-none"></div>
<div class="mv-absolute mv-nbottom-24 mv-left-1_4 mv-w-72 mv-h-72 mv-rounded-full mv-bg-primary_10 mv-blur-3xl pe-none"></div>
<div class="mv-relative mv-z-10 d-flex flex-column flex-lg-row align-items-lg-center justify-content-between mv-gap-space-lg">
<div class="d-flex flex-column flex-sm-row align-items-sm-center mv-gap-space-lg">
<!-- Neon Icon Holder -->
<div class="mv-w-16 mv-h-16 mv-rounded-xl mv-bg-tertiary-container_30 d-flex align-items-center justify-content-center mv-text-tertiary mv-shadow-a869b0">
<span class="material-symbols-outlined mv-text-4262a5" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
</div>
<div class="d-flex flex-column">
<div class="d-flex align-items-center mv-gap-space-xs">
<span class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant mv-tracking-wide mv-font-semibold text-uppercase">Wallet Balance</span>
<span class="d-inline-flex align-items-center mv-px-1p5 mv-py-0p5 mv-rounded-sm mv-bg-tertiary-container_20 mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold">Auto-Refill On</span>
</div>
<div class="d-flex align-items-baseline mv-gap-space-sm mv-mt-0p5">
<span class="mv-font-headline-xl-mobile mv-sm-font-headline-xl mv-text-headline-xl-mobile mv-sm-text-headline-xl mv-font-extrabold mv-text-on-surface mv-tracking-tight" id="balance-display">Rs. 300</span>
<span class="mv-font-label-md mv-text-label-md mv-text-tertiary mv-font-bold">PKR</span>
</div>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mt-1">Active TVOD credit ready for instant rentals &amp; direct 4K downloads</p>
</div>
</div>
<!-- Add Balance CTA Button -->
<div class="d-flex align-items-center mv-gap-space-md align-self-start align-self-lg-auto">
<button class="mv-px-space-lg mv-py-3 mv-rounded-full mv-bg-primary mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold d-flex align-items-center mv-gap-space-xs mv-shadow-fc3ffe mv-hover-bg-primary-fixed mv-hover-scale-105 mv-active-scale-95 mv-transition-all" id="open-recharge-btn">
<span class="material-symbols-outlined mv-text-27bd7e mv-font-bold">add</span>
<span>Add Balance</span>
</button>
</div>
</div>
</div>
<!-- Quick Stats Metric Rail (3 High-End Cards) -->
<div class="d-grid mv-grid-cols-1 mv-sm-grid-cols-2 mv-lg-grid-cols-3 mv-gap-space-md">
<!-- Total Movies -->
<div class="mv-bg-surface-container mv-p-space-lg mv-rounded-xl d-flex align-items-center justify-content-between mv-shadow-md mv-hover-bg-surface-container-high mv-transition-colors mv-group">
<div class="d-flex flex-column">
<span class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant mv-font-medium">Total Movies</span>
<span class="mv-font-headline-lg-mobile mv-sm-font-headline-lg mv-text-headline-lg-mobile mv-sm-text-headline-lg mv-font-extrabold mv-text-on-surface mt-1 mv-group-hover-text-primary mv-transition-colors">5</span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline mt-1">Library &amp; Wishlisted</span>
</div>
<div class="mv-w-12 mv-h-12 mv-rounded-lg mv-bg-surface-container-highest d-flex align-items-center justify-content-center mv-text-primary mv-group-hover-bg-primary mv-group-hover-text-white mv-transition-all">
<span class="material-symbols-outlined mv-text-2d3e81">movie</span>
</div>
</div>
<!-- Purchased Movies -->
<div class="mv-bg-surface-container mv-p-space-lg mv-rounded-xl d-flex align-items-center justify-content-between mv-shadow-md mv-hover-bg-surface-container-high mv-transition-colors mv-group">
<div class="d-flex flex-column">
<span class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant mv-font-medium">Purchased Movies</span>
<span class="mv-font-headline-lg-mobile mv-sm-font-headline-lg mv-text-headline-lg-mobile mv-sm-text-headline-lg mv-font-extrabold mv-text-tertiary mt-1">3</span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline mt-1">Permanent TVOD Rights</span>
</div>
<div class="mv-w-12 mv-h-12 mv-rounded-lg mv-bg-tertiary-container_20 d-flex align-items-center justify-content-center mv-text-tertiary mv-group-hover-bg-tertiary mv-group-hover-text-on-tertiary mv-transition-all">
<span class="material-symbols-outlined mv-text-2d3e81" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</div>
</div>
<!-- Total Spent -->
<div class="mv-bg-surface-container mv-p-space-lg mv-rounded-xl d-flex align-items-center justify-content-between mv-shadow-md mv-hover-bg-surface-container-high mv-transition-colors mv-group mv-sm-col-span-2 mv-lg-col-span-1">
<div class="d-flex flex-column">
<span class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant mv-font-medium">Total Spent</span>
<span class="mv-font-headline-lg-mobile mv-sm-font-headline-lg mv-text-headline-lg-mobile mv-sm-text-headline-lg mv-font-extrabold mv-text-on-surface mt-1">Rs. 150</span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline mt-1">Across 3 Transactions</span>
</div>
<div class="mv-w-12 mv-h-12 mv-rounded-lg mv-bg-surface-container-highest d-flex align-items-center justify-content-center mv-text-secondary mv-group-hover-bg-secondary mv-group-hover-text-on-secondary mv-transition-all">
<span class="material-symbols-outlined mv-text-2d3e81">receipt_long</span>
</div>
</div>
</div>
<!-- Active Stream / Quick Resume Banner (Editorial Visual Anchor) -->
<div class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-md mv-sm-p-space-lg d-flex flex-column flex-md-row align-items-center mv-gap-space-lg">
<div class="mv-relative mv-w-full mv-md-w-56 mv-h-32 mv-rounded-lg overflow-hidden flex-shrink-0 mv-shadow-lg">
<img class="mv-w-full h-100 mv-object-cover" data-alt="Dark, moody cinematic still of an atmospheric neo-noir sci-fi desert scene with intense orange rim light, deep charcoal shadows, and cinematic blue grade." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDpDu2wafbdDfFTebL6VvA951pEKUjB7noonmwyuWI045GvriiIROlp7uzPqcGCMRoM_HgWF908qYDB2DjMyJZkRrwz37gBDKGwKzPedLKLGTRjsEyC3SAxNFMSSilpoLxB97fj0xgJu6Iol8qKHQg5RQ2NEsFOqOIz9hBRLPC9UAFSXGlZpt7rp3p89AKLE27ol5YudblzhbZfvXxgLXCGgEaW7q1huqbXc53xyk9FbGxd9b2ui8yjtA"/>
<div class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest_90 mv-via-transparent mv-to-transparent"></div>
<div class="mv-absolute mv-bottom-2 mv-left-2 d-flex align-items-center mv-gap-1 mv-bg-surface_80 mv-backdrop-blur-sm mv-px-2 mv-py-0p5 mv-rounded mv-text-on-surface mv-font-label-sm mv-text-label-sm">
<span class="material-symbols-outlined mv-text-0ddd99 mv-text-tertiary">check</span>
<span>Ready to stream</span>
</div>
</div>
<div class="mv-flex-1 mv-w-full d-flex flex-column justify-content-between">
<div class="d-flex flex-column mv-gap-1">
<div class="d-flex align-items-center mv-gap-space-sm">
<span class="mv-font-label-sm mv-text-label-sm mv-text-primary mv-font-bold text-uppercase mv-tracking-wider">Recently Added</span>
<span class="mv-text-outline mv-text-body-sm">•</span>
<span class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant">4K Ultra HD</span>
</div>
<h2 class="mv-font-headline-sm mv-text-headline-sm mv-text-on-surface mv-font-bold">Dune: Part Two (2024)</h2>
<p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant mv-line-clamp-1">Stream in Dolby Atmos or download full 2.5 GB master offline file.</p>
</div>
<div class="mt-3 d-flex align-items-center mv-gap-space-md flex-wrap">
<a class="mv-px-space-md mv-py-2 mv-rounded-full mv-bg-primary mv-text-white mv-font-label-md mv-text-label-md mv-font-bold d-flex align-items-center mv-gap-1 mv-hover-bg-primary-fixed mv-transition-all mv-shadow-8c95a3" href="#">
<span class="material-symbols-outlined mv-text-c79a76">play_arrow</span>
<span>Resume (48m left)</span>
</a>
<a class="mv-px-space-md mv-py-2 mv-rounded-full mv-bg-surface-container-high mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-medium mv-hover-bg-surface-variant mv-transition-colors d-flex align-items-center mv-gap-1" href="/watch/1">
<span class="material-symbols-outlined mv-text-c79a76">download</span>
<span>Offline Options</span>
</a>
</div>
</div>
</div>
<!-- Recent Activity Feed (Screen #4 Feature Specification) -->
<div class="mv-bg-surface-container mv-rounded-xl mv-p-space-lg mv-shadow-md d-flex flex-column mv-gap-space-md">
<!-- Section Top Row -->
<div class="d-flex align-items-center justify-content-between mv-pb-space-sm">
<div class="d-flex align-items-center mv-gap-space-sm">
<div class="mv-w-8 mv-h-8 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-primary">
<span class="material-symbols-outlined mv-text-27bd7e">history</span>
</div>
<h2 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Recent Activity</h2>
</div>
<a class="mv-text-primary mv-hover-text-primary-fixed mv-font-label-md mv-text-label-md mv-font-bold d-flex align-items-center mv-gap-0p5 mv-transition-colors mv-group" href="/payment/success">
<span>View All History</span>
<span class="material-symbols-outlined mv-text-58f475 mv-group-hover-translate-x-1 mv-transition-transform">arrow_forward</span>
</a>
</div>
<!-- Activity Items List -->
<div class="d-flex flex-column mv-gap-space-xs">
<!-- Activity Item 1: John Wick 4 Purchase -->
<div class="mv-bg-surface-container-low mv-hover-bg-surface-container-high mv-p-space-md mv-rounded-xl d-flex align-items-center justify-content-between mv-transition-colors mv-gap-space-md">
<div class="d-flex align-items-center mv-gap-space-md mv-min-w-0">
<div class="mv-w-10 mv-h-10 mv-rounded-full mv-bg-error-container_30 mv-text-error d-flex align-items-center justify-content-center flex-shrink-0">
<span class="material-symbols-outlined mv-text-27bd7e">movie</span>
</div>
<div class="d-flex flex-column mv-min-w-0">
<div class="d-flex align-items-center mv-gap-space-xs flex-wrap">
<span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface text-truncate">Movie Purchase</span>
<span class="mv-text-outline mv-text-body-sm">•</span>
<span class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant text-truncate">John Wick 4</span>
</div>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline">TVOD Rental License • 4K UHD</span>
</div>
</div>
<div class="d-flex flex-column align-items-end flex-shrink-0">
<span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-error mv-tracking-tight">-Rs. 50</span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline">27 Sep 2026</span>
</div>
</div>
<!-- Activity Item 2: Wallet Recharge (Green accent) -->
<div class="mv-bg-surface-container-low mv-hover-bg-surface-container-high mv-p-space-md mv-rounded-xl d-flex align-items-center justify-content-between mv-transition-colors mv-gap-space-md">
<div class="d-flex align-items-center mv-gap-space-md mv-min-w-0">
<div class="mv-w-10 mv-h-10 mv-rounded-full mv-bg-tertiary-container_30 mv-text-tertiary d-flex align-items-center justify-content-center flex-shrink-0">
<span class="material-symbols-outlined mv-text-27bd7e">add_card</span>
</div>
<div class="d-flex flex-column mv-min-w-0">
<div class="d-flex align-items-center mv-gap-space-xs flex-wrap">
<span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface text-truncate">Wallet Recharge</span>
<span class="mv-text-outline mv-text-body-sm">•</span>
<span class="mv-font-body-md mv-text-body-md mv-text-tertiary mv-font-semibold">EasyPaisa Instant</span>
</div>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline">Transaction #EP-94821038</span>
</div>
</div>
<div class="d-flex flex-column align-items-end flex-shrink-0">
<span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-tertiary mv-tracking-tight">+Rs. 500</span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline">25 Sep 2026</span>
</div>
</div>
<!-- Activity Item 3: Dune Purchase -->
<div class="mv-bg-surface-container-low mv-hover-bg-surface-container-high mv-p-space-md mv-rounded-xl d-flex align-items-center justify-content-between mv-transition-colors mv-gap-space-md">
<div class="d-flex align-items-center mv-gap-space-md mv-min-w-0">
<div class="mv-w-10 mv-h-10 mv-rounded-full mv-bg-error-container_30 mv-text-error d-flex align-items-center justify-content-center flex-shrink-0">
<span class="material-symbols-outlined mv-text-27bd7e">movie</span>
</div>
<div class="d-flex flex-column mv-min-w-0">
<div class="d-flex align-items-center mv-gap-space-xs flex-wrap">
<span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface text-truncate">Movie Purchase</span>
<span class="mv-text-outline mv-text-body-sm">•</span>
<span class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant text-truncate">Dune: Part Two</span>
</div>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline">TVOD Permanent License</span>
</div>
</div>
<div class="d-flex flex-column align-items-end flex-shrink-0">
<span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-error mv-tracking-tight">-Rs. 50</span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline">20 Sep 2026</span>
</div>
</div>
<!-- Activity Item 4: Oppenheimer Purchase -->
<div class="mv-bg-surface-container-low mv-hover-bg-surface-container-high mv-p-space-md mv-rounded-xl d-flex align-items-center justify-content-between mv-transition-colors mv-gap-space-md">
<div class="d-flex align-items-center mv-gap-space-md mv-min-w-0">
<div class="mv-w-10 mv-h-10 mv-rounded-full mv-bg-error-container_30 mv-text-error d-flex align-items-center justify-content-center flex-shrink-0">
<span class="material-symbols-outlined mv-text-27bd7e">movie</span>
</div>
<div class="d-flex flex-column mv-min-w-0">
<div class="d-flex align-items-center mv-gap-space-xs flex-wrap">
<span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface text-truncate">Movie Purchase</span>
<span class="mv-text-outline mv-text-body-sm">•</span>
<span class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant text-truncate">Oppenheimer</span>
</div>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline">TVOD Rental License</span>
</div>
</div>
<div class="d-flex flex-column align-items-end flex-shrink-0">
<span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-error mv-tracking-tight">-Rs. 50</span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline">10 Sep 2026</span>
</div>
</div>
</div>
</div>
<!-- Quick Actions Banner / Help Desk Strip -->
<div class="mv-bg-surface-container mv-p-space-md mv-rounded-xl d-flex flex-column flex-sm-row align-items-center justify-content-between mv-gap-space-md">
<div class="d-flex align-items-center mv-gap-space-md">
<div class="mv-w-10 mv-h-10 mv-rounded-full mv-bg-secondary-container_20 mv-text-secondary d-flex align-items-center justify-content-center">
<span class="material-symbols-outlined mv-text-27bd7e">help_center</span>
</div>
<div>
<h4 class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Need help with purchases or playback?</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">24/7 dedicated streaming support available for TVOD subscribers.</p>
</div>
</div>
<a class="mv-px-space-md mv-py-1p5 mv-rounded-full mv-bg-surface-container-high mv-hover-bg-surface-variant mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface mv-transition-colors flex-shrink-0" href="/browse#quick-links">
        Contact Support
      </a>
</div>
</div>
<!-- Inline Dashboard Micro-Interactions Script -->

</div></main>
</template>

<script>
import { onMounted } from 'vue';
import { bootPage } from '../runPageScript';

const externals = [
    
];

export default {
    name: 'SubscribePage',
    setup() {
        onMounted(() => bootPage(externals, 'KGZ1bmN0aW9uIGluaXRVc2VyRGFzaGJvYXJkKCkgewogICAgICB2YXIgb3Blbk1vZGFsQnRuID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ29wZW4tcmVjaGFyZ2UtYnRuJyk7CiAgICAgIHZhciBjbG9zZU1vZGFsQnRuID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2Nsb3NlLW1vZGFsLWJ0bicpOwogICAgICB2YXIgbW9kYWwgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgncXVpY2stcmVjaGFyZ2UtbW9kYWwnKTsKICAgICAgdmFyIGNvbmZpcm1CdG4gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnY29uZmlybS1yZWNoYXJnZS1idG4nKTsKICAgICAgdmFyIGJhbGFuY2VEaXNwbGF5ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2JhbGFuY2UtZGlzcGxheScpOwogICAgICB2YXIgYW1vdW50UGlsbHMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcuYW1vdW50LXBpbGwnKTsKCiAgICAgIHZhciBjdXJyZW50VG9wVXBBbW91bnQgPSAyMDA7CgogICAgICBpZiAob3Blbk1vZGFsQnRuICYmIG1vZGFsKSB7CiAgICAgICAgb3Blbk1vZGFsQnRuLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKCkgPT4gewogICAgICAgICAgbW9kYWwuY2xhc3NMaXN0LnJlbW92ZSgnbXYtb3BhY2l0eS0wJywgJ3BlLW5vbmUnKTsKICAgICAgICB9KTsKICAgICAgfQoKICAgICAgaWYgKGNsb3NlTW9kYWxCdG4gJiYgbW9kYWwpIHsKICAgICAgICBjbG9zZU1vZGFsQnRuLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKCkgPT4gewogICAgICAgICAgbW9kYWwuY2xhc3NMaXN0LmFkZCgnbXYtb3BhY2l0eS0wJywgJ3BlLW5vbmUnKTsKICAgICAgICB9KTsKICAgICAgfQoKICAgICAgYW1vdW50UGlsbHMuZm9yRWFjaChwaWxsID0+IHsKICAgICAgICBwaWxsLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKGUpID0+IHsKICAgICAgICAgIGFtb3VudFBpbGxzLmZvckVhY2gocCA9PiB7CiAgICAgICAgICAgIHAuY2xhc3NMaXN0LnJlbW92ZSgnbXYtYmctcHJpbWFyeS1jb250YWluZXInLCAnbXYtc2hhZG93LThjNGViZCcpOwogICAgICAgICAgICBwLmNsYXNzTGlzdC5hZGQoJ212LWJnLXN1cmZhY2UtY29udGFpbmVyLWhpZ2hlc3QnLCAnbXYtdGV4dC1vbi1zdXJmYWNlJyk7CiAgICAgICAgICB9KTsKICAgICAgICAgIGUuY3VycmVudFRhcmdldC5jbGFzc0xpc3QuYWRkKCdtdi1iZy1wcmltYXJ5LWNvbnRhaW5lcicsICdtdi1zaGFkb3ctOGM0ZWJkJyk7CiAgICAgICAgICBlLmN1cnJlbnRUYXJnZXQuY2xhc3NMaXN0LnJlbW92ZSgnbXYtYmctc3VyZmFjZS1jb250YWluZXItaGlnaGVzdCcsICdtdi10ZXh0LW9uLXN1cmZhY2UnKTsKICAgICAgICAgIAogICAgICAgICAgdmFyIHJhd1RleHQgPSBlLmN1cnJlbnRUYXJnZXQudGV4dENvbnRlbnQgfHwgJyc7CiAgICAgICAgICB2YXIgbWF0Y2ggPSByYXdUZXh0Lm1hdGNoKC9cZCsvKTsKICAgICAgICAgIGlmIChtYXRjaCkgewogICAgICAgICAgICBjdXJyZW50VG9wVXBBbW91bnQgPSBwYXJzZUludChtYXRjaFswXSwgMTApOwogICAgICAgICAgfQogICAgICAgIH0pOwogICAgICB9KTsKCiAgICAgIGlmIChjb25maXJtQnRuICYmIG1vZGFsICYmIGJhbGFuY2VEaXNwbGF5KSB7CiAgICAgICAgY29uZmlybUJ0bi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsICgpID0+IHsKICAgICAgICAgIHZhciBjdXJyZW50VmFsID0gMzAwOwogICAgICAgICAgdmFyIG5ld1ZhbCA9IGN1cnJlbnRWYWwgKyBjdXJyZW50VG9wVXBBbW91bnQ7CiAgICAgICAgICBiYWxhbmNlRGlzcGxheS50ZXh0Q29udGVudCA9ICdScy4gJyArIG5ld1ZhbDsKICAgICAgICAgIAogICAgICAgICAgbW9kYWwuY2xhc3NMaXN0LmFkZCgnbXYtb3BhY2l0eS0wJywgJ3BlLW5vbmUnKTsKICAgICAgICB9KTsKICAgICAgfQogICAgfSkoKTs='));
    },
};
</script>
