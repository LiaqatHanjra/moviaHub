<template>
<header class="mv-fixed top-0 start-0 end-0 mv-z-50 mv-bg-surface_90 mv-backdrop-blur-xl mv-border-b mv-border-surface-container-high"><div class="mv-h-16 mv-w-full mv-px-margin-mobile mv-sm-px-margin d-flex align-items-center justify-content-between mv-gap-space-xs mv-sm-gap-space-md"><div class="d-flex align-items-center mv-gap-space-xs mv-sm-gap-space-xl"><a class="d-flex align-items-center mv-gap-space-sm mv-group" data-path="home" href="/home"><div class="mv-w-9 mv-h-9 mv-rounded-lg mv-bg-primary-container d-flex align-items-center justify-content-center mv-shadow-da2bcf mv-group-hover-scale-105 mv-transition-transform"><span class="material-symbols-outlined mv-text-c28550">play_arrow</span></div><span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-tracking-tight mv-text-on-surface">Movie<span class="mv-text-primary">Hub</span></span></a><nav class="d-none d-xl-flex align-items-center mv-gap-space-xs" data-active-classes="bg-surface-container-high text-on-surface rounded-full"><a class="mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" data-path="home" href="/home">Home</a><a class="mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" data-path="movies" href="/movies">Movies</a><a class="mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" data-path="categories" href="/categories">Categories</a><a class="mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" data-path="my-movies" href="/my-movies">My Movies</a><a class="mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" data-path="wallet" href="/wallet">Wallet</a><a class="mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" data-path="dashboard" href="/wallet">Dashboard</a><a class="mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" data-path="admin-dashboard" href="/admin">Admin</a></nav></div><div class="mv-flex-1 mv-max-w-md d-none d-xxl-block"><div class="mv-relative d-flex align-items-center"><span class="material-symbols-outlined mv-absolute mv-left-space-md mv-text-outline pe-none mv-text-27bd7e">search</span><input class="mv-w-full mv-h-10 mv-pl-10 mv-pr-space-md mv-bg-surface-container-low mv-border mv-border-surface-container-high mv-rounded-full mv-font-body-md mv-text-body-md mv-text-on-surface mv-placeholder-text-outline mv-focus-outline-none mv-focus-border-primary mv-focus-bg-surface-container mv-transition-all" placeholder="Search movies, genres..." type="text"/></div></div><div class="d-flex align-items-center mv-gap-1 mv-sm-gap-space-md"><a class="d-flex align-items-center mv-gap-space-xs mv-px-space-xs mv-sm-px-space-md mv-py-1p5 mv-bg-surface-container-low mv-border mv-border-surface-container-high mv-rounded-full mv-hover-border-tertiary_40 mv-transition-colors" data-path="wallet" href="/wallet"><span class="material-symbols-outlined mv-text-tertiary mv-text-c79a76">account_balance_wallet</span><span class="d-none d-sm-inline-block mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface">Rs. 300</span></a><button aria-label="Notifications" class="mv-w-9 mv-h-9 mv-rounded-full d-flex align-items-center justify-content-center mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-colors mv-relative" type="button"><span class="material-symbols-outlined mv-text-27bd7e">notifications</span><span class="mv-absolute mv-top-2 mv-right-2 mv-w-2 mv-h-2 mv-rounded-full mv-bg-primary mv-ring-2 mv-ring-surface"></span></button><a class="d-flex align-items-center mv-gap-space-sm mv-pl-space-xs mv-group" data-path="dashboard" href="/wallet"><div class="mv-w-8 mv-h-8 mv-rounded-full mv-bg-primary d-flex align-items-center justify-content-center"><span class="material-symbols-outlined mv-text-white mv-text-c79a76">person</span></div><div class="d-none d-lg-flex flex-column text-start"><span class="mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface mv-leading-tight mv-group-hover-text-primary mv-transition-colors">Ali Khan</span><span class="mv-font-label-sm mv-text-label-sm mv-text-tertiary mv-leading-tight">Premium TVOD</span></div><span class="material-symbols-outlined mv-text-outline mv-text-c79a76 d-none d-lg-inline-block mv-group-hover-text-on-surface mv-transition-colors">keyboard_arrow_down</span></a></div></div>    <nav aria-label="Main navigation" class="d-flex d-xl-none align-items-center mv-gap-space-xs overflow-x-auto mv-px-margin-mobile mv-sm-px-margin mv-pb-space-sm">
      <a class="flex-shrink-0 mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" href="/home">Home</a>
      <a class="flex-shrink-0 mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" href="/movies">Movies</a>
      <a class="flex-shrink-0 mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" href="/categories">Categories</a>
      <a class="flex-shrink-0 mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" href="/my-movies">My Movies</a>
      <a class="flex-shrink-0 mv-px-space-md mv-py-1p5 mv-font-label-lg mv-text-label-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors" href="/wallet">Wallet</a>
    </nav></header><main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100"><div class="d-flex flex-column mv-w-full">
<!-- Subtle Ambient Glow Orbs -->
<div class="mv-relative mv-w-full mv-max-w-7xl mx-auto mv-px-margin-mobile mv-md-px-margin-mobile mv-sm-px-margin mv-py-space-lg mv-md-py-space-xl">
<div class="mv-absolute mv-ntop-12 mv-left-1_4 mv-w-96 mv-h-96 mv-bg-primary_10 mv-rounded-full mv-blur-b98468 pe-none"></div>
<div class="mv-absolute mv-top-1_3 mv-right-10 mv-w-80 mv-h-80 mv-bg-tertiary_10 mv-rounded-full mv-blur-5933c5 pe-none"></div>
<!-- Breadcrumb Hierarchy Navigation -->
<nav aria-label="Breadcrumb" class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant mv-font-label-md mv-text-label-md mb-4 mv-relative mv-z-10">
<a class="mv-hover-text-primary mv-transition-colors d-flex align-items-center mv-gap-1" href="/home">
<span class="material-symbols-outlined mv-text-58f475">home</span>
<span>Home</span>
</a>
<span class="material-symbols-outlined mv-text-0ddd99 mv-text-outline">chevron_right</span>
<a class="mv-hover-text-primary mv-transition-colors" href="/movies">Movies</a>
<span class="material-symbols-outlined mv-text-0ddd99 mv-text-outline">chevron_right</span>
<a class="mv-hover-text-primary mv-transition-colors" href="/movie/1">Dune (2021)</a>
<span class="material-symbols-outlined mv-text-0ddd99 mv-text-outline">chevron_right</span>
<span class="mv-text-primary mv-font-bold">Rental Checkout</span>
</nav>
<!-- Main Checkout Stage Grid -->
<div class="d-grid mv-grid-cols-1 mv-lg-grid-cols-12 mv-gap-gutter-mobile mv-sm-gap-gutter mv-lg-gap-space-xl mv-relative mv-z-10">
<!-- LEFT COLUMN: Payment Method Selection & Auth (7 Cols) -->
<div class="mv-lg-col-span-7 d-flex flex-column mv-gap-space-lg">
<!-- Section Header -->
<div class="d-flex flex-column mv-gap-1">
<div class="d-flex align-items-center mv-gap-2">
<span class="mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-primary-container_20 mv-text-primary mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider">Checkout Stage</span>
<span class="mv-text-outline mv-text-label-sm">•</span>
<span class="mv-text-tertiary mv-font-label-sm mv-text-label-sm d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-0ddd99" style="font-variation-settings: 'FILL' 1;">bolt</span> Instant Unlock
            </span>
</div>
<h1 class="mv-font-headline-lg-mobile mv-sm-font-headline-lg mv-text-headline-lg-mobile mv-sm-text-headline-lg mv-text-on-surface mv-tracking-tight">Complete Rental Order</h1>
<p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant">Select your payment method to activate 48-hour high-definition digital streaming.</p>
</div>
<!-- Payment Method Group -->
<div class="d-flex flex-column mv-gap-space-md">
<div class="d-flex align-items-center justify-content-between">
<label class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-bold d-flex align-items-center mv-gap-2">
<span class="material-symbols-outlined mv-text-primary mv-text-27bd7e">account_balance_wallet</span>
              Payment Method
            </label>
<span class="mv-text-label-sm mv-font-label-sm mv-text-on-surface-variant">All transactions are encrypted</span>
</div>
<!-- Method 1: MovieHub Digital Wallet (Active / Recommended) -->
<div class="payment-option mv-relative mv-rounded-xl mv-bg-surface-container-high mv-p-space-md mv-shadow-xl mv-transition-all mv-cursor-pointer mv-group" data-method="wallet" onclick="selectPaymentMethod(this, 'wallet')">
<div class="mv-absolute mv-ntop-2p5 mv-right-space-md mv-px-2p5 mv-py-0p5 mv-rounded-full mv-bg-tertiary mv-text-on-tertiary mv-font-label-sm mv-text-label-sm mv-shadow-sm d-flex align-items-center mv-gap-1 mv-font-bold">
<span class="material-symbols-outlined mv-text-373449">verified</span> 1-Click Instant Unlock • Zero Fees
            </div>
<div class="d-flex align-items-start justify-content-between mv-gap-space-md mt-1">
<div class="d-flex align-items-start mv-gap-space-md">
<div class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container d-flex align-items-center justify-content-center mv-text-primary mv-group-hover-scale-105 mv-transition-transform flex-shrink-0">
<span class="material-symbols-outlined mv-text-59700f">account_balance_wallet</span>
</div>
<div class="d-flex flex-column">
<div class="d-flex align-items-center mv-gap-2">
<span class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">MovieHub Digital Wallet</span>
<span class="mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-bright mv-text-tertiary mv-font-label-sm mv-text-label-sm">Primary</span>
</div>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-mt-0p5">Deduct seamlessly from your active pre-loaded entertainment balance.</p>
<div class="d-flex align-items-center mv-gap-3 mt-2">
<span class="mv-font-label-md mv-text-label-md mv-text-on-surface">Available Balance: <span class="mv-text-tertiary mv-font-bold">Rs. 300</span></span>
<span class="mv-text-outline mv-text-label-sm">•</span>
<span class="mv-text-label-sm mv-font-label-sm mv-text-primary">Balance after: <span class="mv-font-bold mv-text-on-surface">Rs. 250</span></span>
</div>
</div>
</div>
<div class="mv-w-6 mv-h-6 mv-rounded-full mv-bg-primary d-flex align-items-center justify-content-center flex-shrink-0 check-indicator">
<span class="material-symbols-outlined mv-text-white mv-text-58f475 mv-font-bold">check</span>
</div>
</div>
</div>
<!-- Method 2: EasyPaisa -->
<div class="payment-option mv-relative mv-rounded-xl mv-bg-surface-container mv-p-space-md mv-hover-bg-surface-container-high mv-shadow-md mv-transition-all mv-cursor-pointer mv-group" data-method="easypaisa" onclick="selectPaymentMethod(this, 'easypaisa')">
<div class="d-flex align-items-center justify-content-between mv-gap-space-md">
<div class="d-flex align-items-center mv-gap-space-md">
<div class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-tertiary mv-group-hover-scale-105 mv-transition-transform flex-shrink-0 mv-font-bold mv-font-headline-sm">
                  EP
                </div>
<div class="d-flex flex-column">
<div class="d-flex align-items-center mv-gap-2">
<span class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">EasyPaisa Mobile Account</span>
<span class="mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-highest mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm">Instant OTP</span>
</div>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Pay via mobile wallet registered to +92 300 ••••419</p>
</div>
</div>
<div class="mv-w-6 mv-h-6 mv-rounded-full mv-bg-surface-variant d-flex align-items-center justify-content-center flex-shrink-0 check-indicator">
<span class="material-symbols-outlined mv-text-on-surface-variant mv-text-58f475 mv-opacity-0 check-icon">check</span>
</div>
</div>
<!-- Sub-input for EasyPaisa when activated -->
<div class="method-extra d-none mv-pt-space-md mt-3 mv-border-t-0 d-flex flex-column mv-gap-2">
<label class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant">Confirm EasyPaisa Phone Number</label>
<div class="d-flex mv-gap-2">
<input class="mv-bg-surface-container-low mv-px-space-md mv-py-2 mv-rounded-lg mv-font-body-md mv-text-on-surface mv-w-full mv-focus-outline-none mv-focus-bg-surface-bright" placeholder="03XXXXXXXXX" type="text" value="+92 300 8923419"/>
<button class="mv-px-space-md mv-py-2 mv-rounded-lg mv-bg-surface-bright mv-text-primary mv-font-label-md mv-text-label-md flex-shrink-0" type="button">Send OTP</button>
</div>
</div>
</div>
<!-- Method 3: JazzCash -->
<div class="payment-option mv-relative mv-rounded-xl mv-bg-surface-container mv-p-space-md mv-hover-bg-surface-container-high mv-shadow-md mv-transition-all mv-cursor-pointer mv-group" data-method="jazzcash" onclick="selectPaymentMethod(this, 'jazzcash')">
<div class="d-flex align-items-center justify-content-between mv-gap-space-md">
<div class="d-flex align-items-center mv-gap-space-md">
<div class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-error mv-group-hover-scale-105 mv-transition-transform flex-shrink-0 mv-font-bold mv-font-headline-sm">
                  JC
                </div>
<div class="d-flex flex-column">
<div class="d-flex align-items-center mv-gap-2">
<span class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">JazzCash Digital Wallet</span>
<span class="mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-highest mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm">Direct Debit</span>
</div>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Authorize directly from your JazzCash app with MPIN prompt.</p>
</div>
</div>
<div class="mv-w-6 mv-h-6 mv-rounded-full mv-bg-surface-variant d-flex align-items-center justify-content-center flex-shrink-0 check-indicator">
<span class="material-symbols-outlined mv-text-on-surface-variant mv-text-58f475 mv-opacity-0 check-icon">check</span>
</div>
</div>
<div class="method-extra d-none mv-pt-space-md mt-3 d-flex flex-column mv-gap-2">
<label class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant">JazzCash Account Number</label>
<input class="mv-bg-surface-container-low mv-px-space-md mv-py-2 mv-rounded-lg mv-font-body-md mv-text-on-surface mv-w-full mv-focus-outline-none mv-focus-bg-surface-bright" placeholder="03001234567" type="text"/>
</div>
</div>
<!-- Method 4: Debit / Credit Card -->
<div class="payment-option mv-relative mv-rounded-xl mv-bg-surface-container mv-p-space-md mv-hover-bg-surface-container-high mv-shadow-md mv-transition-all mv-cursor-pointer mv-group" data-method="card" onclick="selectPaymentMethod(this, 'card')">
<div class="d-flex align-items-center justify-content-between mv-gap-space-md">
<div class="d-flex align-items-center mv-gap-space-md">
<div class="mv-w-10 mv-h-10 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-secondary mv-group-hover-scale-105 mv-transition-transform flex-shrink-0">
<span class="material-symbols-outlined mv-text-59700f">credit_card</span>
</div>
<div class="d-flex flex-column">
<div class="d-flex align-items-center mv-gap-2">
<span class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">Debit / Credit Card</span>
<div class="d-flex mv-gap-1 mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm">
<span class="mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-highest">Visa</span>
<span class="mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-highest">Mastercard</span>
<span class="mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-highest">PayPak</span>
</div>
</div>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Global cards supported with 3D Secure verification.</p>
</div>
</div>
<div class="mv-w-6 mv-h-6 mv-rounded-full mv-bg-surface-variant d-flex align-items-center justify-content-center flex-shrink-0 check-indicator">
<span class="material-symbols-outlined mv-text-on-surface-variant mv-text-58f475 mv-opacity-0 check-icon">check</span>
</div>
</div>
<!-- Card Fields Expanded State -->
<div class="method-extra d-none mv-pt-space-md mt-3 d-flex flex-column mv-gap-3">
<div class="d-flex flex-column mv-gap-1">
<label class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant">Card Number</label>
<div class="mv-relative d-flex align-items-center">
<input class="mv-w-full mv-bg-surface-container-low mv-px-space-md mv-py-2 mv-rounded-lg mv-font-body-md mv-text-on-surface mv-focus-outline-none mv-focus-bg-surface-bright" placeholder="4214 •••• •••• 9921" type="text"/>
<span class="material-symbols-outlined mv-absolute mv-right-3 mv-text-outline mv-text-27bd7e">lock</span>
</div>
</div>
<div class="d-grid mv-grid-cols-2 mv-gap-3">
<div>
<label class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant">Expiration</label>
<input class="mv-w-full mv-bg-surface-container-low mv-px-space-md mv-py-2 mv-rounded-lg mv-font-body-md mv-text-on-surface mv-focus-outline-none" placeholder="MM/YY" type="text"/>
</div>
<div>
<label class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant">CVV / CVC</label>
<input class="mv-w-full mv-bg-surface-container-low mv-px-space-md mv-py-2 mv-rounded-lg mv-font-body-md mv-text-on-surface mv-focus-outline-none" maxlength="4" placeholder="123" type="password"/>
</div>
</div>
</div>
</div>
</div>
<!-- Security & Guarantee Badge Card -->
<div class="mv-p-space-md mv-rounded-xl mv-bg-surface-container-low d-flex align-items-center justify-content-between mv-gap-space-md mv-shadow-inner">
<div class="d-flex align-items-center mv-gap-space-md">
<div class="mv-w-10 mv-h-10 mv-rounded-full mv-bg-tertiary-container_30 d-flex align-items-center justify-content-center mv-text-tertiary flex-shrink-0">
<span class="material-symbols-outlined mv-text-c28550">verified_user</span>
</div>
<div>
<p class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Encrypted 256-Bit TVOD Checkout</p>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Your transaction is safeguarded by tokenized digital DRM &amp; instant server-side rights assignment.</p>
</div>
</div>
<div class="d-none d-sm-flex flex-column align-items-end flex-shrink-0">
<span class="mv-font-label-sm mv-text-label-sm mv-text-tertiary d-flex align-items-center mv-gap-1 mv-font-bold">
<span class="material-symbols-outlined mv-text-0ddd99">shield</span> SECURE DRM
            </span>
<span class="mv-font-body-sm mv-text-body-sm mv-text-outline">Tier-4 CDN Ready</span>
</div>
</div>
</div>
<!-- RIGHT COLUMN: Order Summary Bento Card (5 Cols) -->
<div class="mv-lg-col-span-5 d-flex flex-column mv-gap-space-lg">
<!-- Sticky Cart Panel -->
<div class="mv-sticky mv-top-20 mv-bg-surface-container-high mv-rounded-xl mv-p-space-lg mv-shadow-2xl d-flex flex-column mv-gap-space-lg">
<div class="d-flex align-items-center justify-content-between">
<h2 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface d-flex align-items-center mv-gap-2">
<span class="material-symbols-outlined mv-text-primary mv-text-27bd7e">receipt_long</span>
              Rental Order Summary
            </h2>
<span class="mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-bright mv-text-secondary mv-font-label-sm mv-text-label-sm mv-font-semibold">TVOD Digital Stream</span>
</div>
<!-- Movie Snapshot Bento -->
<div class="d-flex mv-gap-space-md mv-bg-surface-container-lowest mv-p-space-md mv-rounded-xl">
<div class="mv-w-24 mv-h-36 mv-rounded-lg overflow-hidden flex-shrink-0 mv-shadow-lg mv-relative mv-group">
<img class="mv-w-full h-100 mv-object-cover mv-transition-transform mv-group-hover-scale-105" data-alt="Dune cinematic poster showing Timothee Chalamet standing on vast golden Arrakis desert dunes under high sci-fi celestial sky, dark dramatic cinematic lighting, cyan and orange grading, 4K film still" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBGcm8nhCHmILGE9H7zWMGo96hoJJrPcLEXYXULVt0KjAT9XKJnYIWAqlH5TgpcFx45gRNkNY-JMW-anwgyRF3ToNsGJ25d4XHFPT7f00d8G_haG2ndawKWwRVwkalRPx-0MCqBKak-RCryW5dUXvSC4orAMIkHS-87eYhcW5GKdTt3tXO6VwWqaZjNJxS9t4U1AHWm-mrC_n3O6wnTu5zlYfQ4ds19n3noRtLvaIB7Znf22HQSphzlVw"/>
<div class="mv-absolute mv-top-1 mv-left-1 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface_80 mv-backdrop-blur-sm mv-text-primary mv-font-label-sm mv-text-label-sm mv-font-bold">
                4K UHD
              </div>
</div>
<div class="d-flex flex-column justify-content-between mv-py-0p5 mv-flex-1 mv-min-w-0">
<div class="d-flex flex-column">
<div class="d-flex align-items-center mv-gap-2 flex-wrap mb-1">
<span class="mv-font-label-sm mv-text-label-sm mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-high mv-text-on-surface-variant mv-font-semibold">Sci-Fi / Epic</span>
<span class="mv-font-label-sm mv-text-label-sm mv-text-outline">2021</span>
</div>
<h3 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface text-truncate">Dune: Part One</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-mt-0p5">Dir. Denis Villeneuve • 2h 35m</p>
</div>
<!-- Media Badges -->
<div class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm mt-2 flex-wrap">
<span class="mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container mv-text-secondary d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-373449">high_quality</span> 4K Ultra HD
                </span>
<span class="mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container mv-text-tertiary d-flex align-items-center mv-gap-1">
<span class="material-symbols-outlined mv-text-373449">volume_up</span> Atmos 5.1
                </span>
<span class="mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container mv-text-on-surface-variant">2.5 GB</span>
</div>
</div>
</div>
<!-- Digital Rental Policy Box -->
<div class="mv-p-space-md mv-rounded-xl mv-bg-surface-container d-flex align-items-start mv-gap-space-md">
<span class="material-symbols-outlined mv-text-primary mv-text-c28550 flex-shrink-0 mv-mt-0p5">schedule</span>
<div class="d-flex flex-column">
<span class="mv-font-label-md mv-text-label-md mv-font-bold mv-text-on-surface">Rental Duration &amp; Access</span>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-mt-0p5">
                Once confirmed, this movie remains unlocked in your library. You have <strong>30 days</strong> to begin playback, and <strong>48 hours</strong> of unlimited streams and offline downloads once started.
              </p>
</div>
</div>
<!-- Price Calculation List -->
<div class="d-flex flex-column mv-gap-space-sm mv-pt-space-xs">
<div class="d-flex align-items-center justify-content-between mv-text-body-md mv-font-body-md mv-text-on-surface-variant">
<span>Pay-Per-View Rental Fee</span>
<span class="mv-font-bold mv-text-on-surface">Rs. 50</span>
</div>
<div class="d-flex align-items-center justify-content-between mv-text-body-md mv-font-body-md mv-text-on-surface-variant">
<span class="d-flex align-items-center mv-gap-1">
                Platform Tax &amp; GST (0%)
                <span class="material-symbols-outlined mv-text-0ddd99 mv-text-outline mv-cursor-help" title="No additional tax on digital TVOD streaming">info</span>
</span>
<span class="mv-text-tertiary mv-font-semibold">Rs. 0</span>
</div>
<div class="d-flex align-items-center justify-content-between mv-text-body-md mv-font-body-md mv-text-on-surface-variant">
<span>Instant Digital License</span>
<span class="mv-text-tertiary mv-font-semibold">Included</span>
</div>
<!-- Grand Total Bar -->
<div class="mt-2 mv-pt-space-md mv-bg-surface-container-lowest mv-p-space-md mv-rounded-xl d-flex align-items-center justify-content-between">
<div>
<span class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant text-uppercase mv-tracking-wider d-block">Total Payable Now</span>
<span class="mv-font-label-md mv-text-label-md mv-text-tertiary d-flex align-items-center mv-gap-1 mv-mt-0p5">
<span class="material-symbols-outlined mv-text-0ddd99">check_circle</span> Wallet auto-deduction
                </span>
</div>
<div class="text-end">
<span class="mv-font-headline-md mv-text-headline-md mv-font-extrabold mv-text-on-surface mv-text-primary">Rs. 50</span>
</div>
</div>
</div>
<!-- Primary CTA Buttons -->
<div class="d-flex flex-column mv-gap-space-sm mv-pt-space-xs">
<button class="mv-w-full mv-py-3p5 mv-px-space-lg mv-rounded-full mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold d-flex align-items-center justify-content-center mv-gap-2 mv-shadow-1b37fd mv-hover-shadow-5f550c mv-transition-all mv-cursor-pointer mv-active-scale-95" id="confirmPayBtn" onclick="triggerPurchaseFlow()" type="button">
<span class="material-symbols-outlined mv-text-27bd7e">lock</span>
<span>Confirm &amp; Pay Rs. 50</span>
</button>
<a class="mv-w-full mv-py-2p5 text-center mv-text-on-surface-variant mv-hover-text-on-surface mv-font-label-md mv-text-label-md mv-transition-colors" href="/movie/1">
              Cancel and Return to Movie
            </a>
</div>
<!-- Payment Trust Ticker -->
<div class="d-flex align-items-center justify-content-center mv-gap-space-lg mv-pt-space-xs mv-text-outline mv-font-label-sm mv-text-label-sm">
<span class="d-flex align-items-center mv-gap-1"><span class="material-symbols-outlined mv-text-0ddd99">flash_on</span> Instant Access</span>
<span class="d-flex align-items-center mv-gap-1"><span class="material-symbols-outlined mv-text-0ddd99">cloud_download</span> Offline Mode</span>
<span class="d-flex align-items-center mv-gap-1"><span class="material-symbols-outlined mv-text-0ddd99">devices</span> Multi-Device</span>
</div>
</div>
</div>
</div>
<!-- Related Feature Highlights (Bottom Section) -->
<div class="mv-mt-space-xl mv-pt-space-xl mv-border-t-0 d-flex flex-column mv-gap-space-lg">
<div class="d-flex align-items-center justify-content-between">
<div>
<h3 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Frequently Asked Rental Questions</h3>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Everything you need to know about MovieHub Pay-Per-View rentals.</p>
</div>
</div>
<div class="d-grid mv-grid-cols-1 mv-md-grid-cols-3 mv-gap-gutter-mobile mv-sm-gap-gutter">
<div class="mv-p-space-md mv-rounded-xl mv-bg-surface-container d-flex flex-column mv-gap-2">
<div class="mv-w-8 mv-h-8 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-primary mb-1">
<span class="material-symbols-outlined mv-text-c79a76">play_circle</span>
</div>
<h4 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">When does 48-hour access start?</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">The 48-hour timer only begins the moment you press play on the movie player, not immediately after purchasing.</p>
</div>
<div class="mv-p-space-md mv-rounded-xl mv-bg-surface-container d-flex flex-column mv-gap-2">
<div class="mv-w-8 mv-h-8 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-tertiary mb-1">
<span class="material-symbols-outlined mv-text-c79a76">download_for_offline</span>
</div>
<h4 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">Can I download to watch offline?</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Yes! Once unlocked, you can download Dune in 480p, 720p, or full 1080p for viewing during travel without data.</p>
</div>
<div class="mv-p-space-md mv-rounded-xl mv-bg-surface-container d-flex flex-column mv-gap-2">
<div class="mv-w-8 mv-h-8 mv-rounded-lg mv-bg-surface-container-high d-flex align-items-center justify-content-center mv-text-secondary mb-1">
<span class="material-symbols-outlined mv-text-c79a76">account_balance_wallet</span>
</div>
<h4 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">How do wallet refunds work?</h4>
<p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">If playback fails to start due to network streaming errors, 100% of your Rs. 50 will be auto-credited to your wallet.</p>
</div>
</div>
</div>
</div>
<!-- PURCHASE SUCCESS MODAL (Overlay Dialog Matching Screen #7) -->
<div class="mv-fixed mv-inset-0 mv-z-50 d-flex align-items-center justify-content-center mv-p-space-md mv-bg-surface-container-lowest_80 mv-backdrop-blur-md d-none mv-transition-opacity mv-duration-300 mv-opacity-0" id="successModal">
<div class="mv-relative mv-w-full mv-max-w-md mv-bg-surface-container-low mv-rounded-2xl mv-p-space-xl mv-shadow-b98a2a mv-border mv-border-surface-container-high d-flex flex-column align-items-center text-center mv-duration-200">
<!-- Close icon button -->
<button aria-label="Close dialog" class="mv-absolute mv-top-4 mv-right-4 mv-w-8 mv-h-8 mv-rounded-full mv-bg-surface-container d-flex align-items-center justify-content-center mv-text-outline mv-hover-text-on-surface mv-transition-colors" onclick="closeSuccessModal()" type="button">
<span class="material-symbols-outlined mv-text-c79a76">close</span>
</button>
<!-- Success Tick Badge with Pulse Ring -->
<div class="mv-relative mv-w-20 mv-h-20 mb-3 d-flex align-items-center justify-content-center">
<div class="mv-absolute mv-inset-0 mv-rounded-full mv-bg-tertiary_20 mv-animate-ping mv-opacity-75"></div>
<div class="mv-w-16 mv-h-16 mv-rounded-full mv-bg-tertiary d-flex align-items-center justify-content-center mv-text-on-tertiary mv-shadow-e8c85b">
<span class="material-symbols-outlined mv-text-4262a5 mv-font-bold" style="font-variation-settings: 'FILL' 1;">check</span>
</div>
</div>
<!-- Main Headline -->
<h3 class="mv-font-headline-md mv-text-headline-md mv-font-bold mv-text-on-surface mv-tracking-tight">Purchase Successful!</h3>
<p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant mt-1 mv-max-w-xs">Movie has been added to your account library with full 4K streaming rights.</p>
<!-- Financial Receipt Breakdown Card (Screen #7 exact structure) -->
<div class="mv-w-full mv-bg-surface-container mv-rounded-xl mv-p-space-md my-4 d-flex flex-column mv-gap-2p5 text-start">
<div class="d-flex align-items-center justify-content-between mv-font-body-sm mv-text-body-sm">
<span class="mv-text-on-surface-variant">Movie Title</span>
<span class="mv-text-on-surface mv-font-semibold text-truncate mv-max-w-441c9e">Dune (2021) 4K UHD</span>
</div>
<div class="d-flex align-items-center justify-content-between mv-font-body-sm mv-text-body-sm">
<span class="mv-text-on-surface-variant">Movie Price</span>
<span class="mv-text-on-surface mv-font-bold">Rs. 50</span>
</div>
<div class="d-flex align-items-center justify-content-between mv-font-body-sm mv-text-body-sm">
<span class="mv-text-on-surface-variant">Previous Balance</span>
<span class="mv-text-on-surface-variant">Rs. 300</span>
</div>
<div class="d-flex align-items-center justify-content-between mv-font-body-sm mv-text-body-sm">
<span class="mv-text-on-surface-variant">Amount Deducted</span>
<span class="mv-text-error mv-font-semibold">- Rs. 50</span>
</div>
<div class="mv-pt-2 mt-1 mv-border-t mv-border-surface-container-high_60 d-flex align-items-center justify-content-between mv-font-body-md mv-text-body-md">
<span class="mv-text-on-surface mv-font-bold">Remaining Balance</span>
<span class="mv-text-tertiary mv-font-extrabold mv-text-title-md">Rs. 250</span>
</div>
</div>
<!-- Action Buttons (Screen #7 dual layout) -->
<div class="mv-w-full d-grid mv-grid-cols-2 mv-gap-space-sm">
<a class="mv-w-full mv-py-3 mv-px-space-md mv-rounded-full mv-bg-primary mv-hover-bg-primary-container mv-text-white mv-font-label-md mv-text-label-md mv-font-bold d-flex align-items-center justify-content-center mv-gap-1p5 mv-shadow-da2bcf mv-transition-all mv-cursor-pointer" href="/watch/1">
<span class="material-symbols-outlined mv-text-c79a76">play_arrow</span>
<span>Watch Online</span>
</a>
<a class="mv-w-full mv-py-3 mv-px-space-md mv-rounded-full mv-bg-surface-container-high mv-hover-bg-surface-bright mv-text-on-surface mv-font-label-md mv-text-label-md mv-font-semibold d-flex align-items-center justify-content-center mv-gap-1p5 mv-transition-colors mv-cursor-pointer" href="#">
<span class="material-symbols-outlined mv-text-c79a76">download</span>
<span>Download</span>
</a>
</div>
<div class="mt-3">
<a class="mv-font-body-sm mv-text-body-sm mv-text-outline mv-hover-text-on-surface mv-transition-colors" href="/my-movies" onclick="closeSuccessModal()">
          Go to My Movies Library
        </a>
</div>
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
    name: 'PaymentPage',
    setup() {
        onMounted(() => bootPage(externals, 'ZnVuY3Rpb24gc2VsZWN0UGF5bWVudE1ldGhvZChlbGVtZW50LCBtZXRob2QpIHsKICAgICAgLy8gQ2xlYXIgYWN0aXZlIHN0eWxpbmcgZnJvbSBhbGwgaXRlbXMKICAgICAgZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLnBheW1lbnQtb3B0aW9uJykuZm9yRWFjaChjYXJkID0+IHsKICAgICAgICBjYXJkLmNsYXNzTGlzdC5yZW1vdmUoJ212LWJnLXN1cmZhY2UtY29udGFpbmVyLWhpZ2gnKTsKICAgICAgICBjYXJkLmNsYXNzTGlzdC5hZGQoJ212LWJnLXN1cmZhY2UtY29udGFpbmVyJyk7CiAgICAgICAgCiAgICAgICAgLy8gSGlkZSBuZXN0ZWQgZXhwYW5kYWJsZSBpbnB1dCBjb250YWluZXJzCiAgICAgICAgdmFyIGV4dHJhID0gY2FyZC5xdWVyeVNlbGVjdG9yKCcubWV0aG9kLWV4dHJhJyk7CiAgICAgICAgaWYgKGV4dHJhKSBleHRyYS5jbGFzc0xpc3QuYWRkKCdkLW5vbmUnKTsKCiAgICAgICAgLy8gQ2hlY2sgaW5kaWNhdG9yIHJlc2V0CiAgICAgICAgdmFyIGluZCA9IGNhcmQucXVlcnlTZWxlY3RvcignLmNoZWNrLWluZGljYXRvcicpOwogICAgICAgIGlmIChpbmQpIHsKICAgICAgICAgIGluZC5jbGFzc0xpc3QucmVtb3ZlKCdtdi1iZy1wcmltYXJ5Jyk7CiAgICAgICAgICBpbmQuY2xhc3NMaXN0LmFkZCgnbXYtYmctc3VyZmFjZS12YXJpYW50Jyk7CiAgICAgICAgICB2YXIgaWNvbiA9IGluZC5xdWVyeVNlbGVjdG9yKCcuY2hlY2staWNvbicpOwogICAgICAgICAgaWYgKGljb24pIGljb24uY2xhc3NMaXN0LmFkZCgnbXYtb3BhY2l0eS0wJyk7CiAgICAgICAgfQogICAgICB9KTsKCiAgICAgIC8vIEhpZ2hsaWdodCBzZWxlY3RlZAogICAgICBlbGVtZW50LmNsYXNzTGlzdC5yZW1vdmUoJ212LWJnLXN1cmZhY2UtY29udGFpbmVyJyk7CiAgICAgIGVsZW1lbnQuY2xhc3NMaXN0LmFkZCgnbXYtYmctc3VyZmFjZS1jb250YWluZXItaGlnaCcpOwogICAgICAKICAgICAgdmFyIGV4dHJhID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCcubWV0aG9kLWV4dHJhJyk7CiAgICAgIGlmIChleHRyYSkgZXh0cmEuY2xhc3NMaXN0LnJlbW92ZSgnZC1ub25lJyk7CgogICAgICB2YXIgaW5kID0gZWxlbWVudC5xdWVyeVNlbGVjdG9yKCcuY2hlY2staW5kaWNhdG9yJyk7CiAgICAgIGlmIChpbmQpIHsKICAgICAgICBpbmQuY2xhc3NMaXN0LnJlbW92ZSgnbXYtYmctc3VyZmFjZS12YXJpYW50Jyk7CiAgICAgICAgaW5kLmNsYXNzTGlzdC5hZGQoJ212LWJnLXByaW1hcnknKTsKICAgICAgICB2YXIgaWNvbiA9IGluZC5xdWVyeVNlbGVjdG9yKCcuY2hlY2staWNvbicpOwogICAgICAgIGlmIChpY29uKSBpY29uLmNsYXNzTGlzdC5yZW1vdmUoJ212LW9wYWNpdHktMCcpOwogICAgICB9CiAgICB9CgogICAgZnVuY3Rpb24gdHJpZ2dlclB1cmNoYXNlRmxvdygpIHsKICAgICAgdmFyIGJ0biA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdjb25maXJtUGF5QnRuJyk7CiAgICAgIGJ0bi5pbm5lckhUTUwgPSBgPHNwYW4gY2xhc3M9Im1hdGVyaWFsLXN5bWJvbHMtb3V0bGluZWQgbXYtYW5pbWF0ZS1zcGluIG12LXRleHQtMjdiZDdlIj5wcm9ncmVzc19hY3Rpdml0eTwvc3Bhbj48c3Bhbj5BdXRob3JpemluZyBUcmFuc2FjdGlvbi4uLjwvc3Bhbj5gOwogICAgICBidG4uZGlzYWJsZWQgPSB0cnVlOwoKICAgICAgc2V0VGltZW91dCgoKSA9PiB7CiAgICAgICAgYnRuLmlubmVySFRNTCA9IGA8c3BhbiBjbGFzcz0ibWF0ZXJpYWwtc3ltYm9scy1vdXRsaW5lZCBtdi10ZXh0LTI3YmQ3ZSI+bG9jazwvc3Bhbj48c3Bhbj5Db25maXJtICZhbXA7IFBheSBScy4gNTA8L3NwYW4+YDsKICAgICAgICBidG4uZGlzYWJsZWQgPSBmYWxzZTsKICAgICAgICAKICAgICAgICAvLyBTaG93IG1vZGFsCiAgICAgICAgdmFyIG1vZGFsID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3N1Y2Nlc3NNb2RhbCcpOwogICAgICAgIG1vZGFsLmNsYXNzTGlzdC5yZW1vdmUoJ2Qtbm9uZScpOwogICAgICAgIHNldFRpbWVvdXQoKCkgPT4gewogICAgICAgICAgbW9kYWwuY2xhc3NMaXN0LnJlbW92ZSgnbXYtb3BhY2l0eS0wJyk7CiAgICAgICAgfSwgMTApOwogICAgICB9LCA3MDApOwogICAgfQoKICAgIGZ1bmN0aW9uIGNsb3NlU3VjY2Vzc01vZGFsKCkgewogICAgICB2YXIgbW9kYWwgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnc3VjY2Vzc01vZGFsJyk7CiAgICAgIG1vZGFsLmNsYXNzTGlzdC5hZGQoJ212LW9wYWNpdHktMCcpOwogICAgICBzZXRUaW1lb3V0KCgpID0+IHsKICAgICAgICBtb2RhbC5jbGFzc0xpc3QuYWRkKCdkLW5vbmUnKTsKICAgICAgfSwgMzAwKTsKICAgIH0='));
    },
};
</script>
