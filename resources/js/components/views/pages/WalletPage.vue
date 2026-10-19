<template>
    <AppLayout>
        <Header />
            <main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100"><div class="d-flex flex-column mv-w-full">
            <div class="mv-w-full mv-px-margin-mobile mv-sm-px-margin mv-py-space-lg">
            <!-- Breadcrumb & Status Tracker -->
            <div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-sm mb-4">
            <div class="d-flex align-items-center mv-gap-space-xs mv-font-label-md mv-text-label-md mv-text-on-surface-variant">
            <span class="mv-hover-text-primary mv-transition-colors mv-cursor-pointer">Account</span>
            <span class="material-symbols-outlined mv-text-0ddd99">chevron_right</span>
            <span class="mv-text-primary mv-font-bold">Wallet &amp; Recharge</span>
            </div>
            <div class="d-flex align-items-center mv-gap-space-sm mv-bg-surface-container-high mv-px-space-md mv-py-1p5 mv-rounded-full mv-shadow-sm">
            <span class="d-inline-block mv-w-2 mv-h-2 mv-rounded-full mv-bg-tertiary mv-animate-pulse"></span>
            <span class="mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-text-tertiary">Instant TVOD Balance Available</span>
            </div>
            </div>
            <!-- 12-Column Dashboard Shell -->
            <div class="d-grid mv-grid-cols-12 mv-gap-gutter-mobile mv-sm-gap-gutter align-items-start">
            <!-- Left Persistent Sidebar Navigation (Cols 1-3) -->
            <aside class="mv-col-span-12 mv-lg-col-span-3 d-flex flex-column mv-gap-space-sm mv-bg-surface-container-low mv-p-space-md mv-rounded-xl mv-shadow-md">
            <!-- User Badge Quick View -->
            <div class="d-flex align-items-center mv-gap-space-sm mv-p-space-sm mv-rounded-lg mv-bg-surface-container mb-1">
            <div class="mv-w-10 mv-h-10 mv-rounded-full mv-bg-primary-container d-flex align-items-center justify-content-center mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-shadow-sm">
                        AK
                    </div>
            <div class="d-flex flex-column mv-min-w-0">
            <span class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface text-truncate">Ali Khan</span>
            <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant text-truncate">ali.khan@stream.pk</span>
            </div>
            </div>
            <nav class="d-flex flex-column mv-gap-1 mv-font-label-lg mv-text-label-lg">
            <a class="d-flex align-items-center mv-gap-space-sm mv-px-space-md mv-py-2p5 mv-rounded-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-all" href="/wallet">
            <span class="material-symbols-outlined mv-text-27bd7e">grid_view</span>
            <span>Dashboard</span>
            </a>
            <a class="d-flex align-items-center mv-gap-space-sm mv-px-space-md mv-py-2p5 mv-rounded-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-all" href="/my-movies">
            <span class="material-symbols-outlined mv-text-27bd7e">movie</span>
            <span>My Movies</span>
            <span class="ms-auto mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-surface-variant mv-text-on-surface mv-font-label-sm mv-text-label-sm">3</span>
            </a>
            <!-- Active Wallet Route -->
            <a class="d-flex align-items-center mv-gap-space-sm mv-px-space-md mv-py-2p5 mv-rounded-lg mv-bg-primary-container mv-font-bold mv-shadow-md mv-transition-all" href="/wallet">
            <span class="material-symbols-outlined mv-text-27bd7e" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
            <span>Wallet</span>
            <span class="ms-auto mv-w-2 mv-h-2 mv-rounded-full mv-bg-primary"></span>
            </a>
            <a class="d-flex align-items-center mv-gap-space-sm mv-px-space-md mv-py-2p5 mv-rounded-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-all" href="/payment/success">
            <span class="material-symbols-outlined mv-text-27bd7e">receipt_long</span>
            <span>Purchase History</span>
            </a>
            <a class="d-flex align-items-center mv-gap-space-sm mv-px-space-md mv-py-2p5 mv-rounded-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-all" href="/wallet">
            <span class="material-symbols-outlined mv-text-27bd7e">account_circle</span>
            <span>Profile</span>
            </a>
            <a class="d-flex align-items-center mv-gap-space-sm mv-px-space-md mv-py-2p5 mv-rounded-lg mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-all" href="/wallet">
            <span class="material-symbols-outlined mv-text-27bd7e">tune</span>
            <span>Settings</span>
            </a>
            <div class="mv-h-px mv-bg-surface-container-high my-1"></div>
            <a class="d-flex align-items-center mv-gap-space-sm mv-px-space-md mv-py-2p5 mv-rounded-lg mv-text-error mv-hover-bg-surface-container mv-transition-all" href="/login">
            <span class="material-symbols-outlined mv-text-27bd7e">logout</span>
            <span>Logout</span>
            </a>
            </nav>
            <!-- Mini TVOD Perk Banner -->
            <div class="mt-3 mv-p-space-md mv-rounded-xl mv-bg-surface-container d-flex flex-column mv-gap-space-xs mv-relative overflow-hidden">
            <div class="mv-absolute mv-nright-4 mv-nbottom-4 mv-w-16 mv-h-16 mv-rounded-full mv-bg-primary_10 mv-blur-xl pe-none"></div>
            <div class="d-flex align-items-center mv-gap-1p5 mv-text-primary">
            <span class="material-symbols-outlined mv-text-58f475">bolt</span>
            <span class="mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-font-bold">Fast TVOD Unlock</span>
            </div>
            <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-leading-relaxed">
                        Pre-fund your balance to stream pay-per-view blockbusters with zero 2FA wait.
                    </p>
            </div>
            </aside>
            <!-- Main Workspace (Cols 4-12) -->
            <section class="mv-col-span-12 mv-lg-col-span-9 d-flex flex-column mv-gap-space-lg">
            <!-- Top Section: Balance Card & Stat Mosaic -->
            <div class="d-grid mv-grid-cols-1 mv-md-grid-cols-12 mv-gap-gutter-mobile mv-sm-gap-gutter">
            <!-- Primary Balance Showcase Card (Spans 7 cols) -->
            <div class="mv-md-col-span-7 mv-bg-surface-container-low mv-rounded-xl mv-p-space-lg d-flex flex-column justify-content-between mv-relative overflow-hidden mv-shadow-lg">
            <!-- Ambient luminous gradients -->
            <div class="mv-absolute top-0 end-0 mv-w-48 mv-h-48 mv-bg-tertiary_10 mv-rounded-full mv-blur-3xl pe-none"></div>
            <div class="mv-absolute mv-nbottom-10 mv-nleft-10 mv-w-40 mv-h-40 mv-bg-primary_10 mv-rounded-full mv-blur-2xl pe-none"></div>
            <div class="d-flex align-items-start justify-content-between mv-relative mv-z-10">
            <div class="d-flex align-items-center mv-gap-space-sm">
            <div class="mv-w-12 mv-h-12 mv-rounded-xl mv-bg-tertiary-container_30 d-flex align-items-center justify-content-center mv-text-tertiary mv-shadow-sm">
            <span class="material-symbols-outlined mv-text-deed42" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
            </div>
            <div class="d-flex flex-column">
            <span class="mv-font-label-sm mv-text-label-sm mv-tracking-wider text-uppercase mv-text-on-surface-variant">Available Funds</span>
            <span class="mv-font-title-md mv-text-title-md mv-text-on-surface mv-font-semibold">MovieHub Digital Wallet</span>
            </div>
            </div>
            <span class="mv-px-space-sm mv-py-1 mv-rounded-full mv-bg-tertiary_10 mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-bold d-flex align-items-center mv-gap-1">
            <span class="mv-w-1p5 mv-h-1p5 mv-rounded-full mv-bg-tertiary"></span> Active
                        </span>
            </div>
            <!-- Major Balance Number -->
            <div class="my-4 mv-relative mv-z-10 d-flex flex-column">
            <span class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant text-uppercase mv-tracking-wider">Current Balance</span>
            <div class="d-flex align-items-baseline mv-gap-space-xs mt-1">
            <span class="mv-font-headline-xl-mobile mv-sm-font-headline-xl mv-text-headline-xl-mobile mv-sm-text-headline-xl mv-font-bold mv-text-on-surface mv-tracking-tight" id="displayBalance">Rs. 300</span>
            <span class="mv-font-label-md mv-text-label-md mv-text-tertiary mv-font-semibold">PKR • Instant Credit</span>
            </div>
            </div>
            <!-- Quick Sub-metrics Strip -->
            <div class="mv-pt-space-md mv-bg-surface-container_60 mv-nmx-space-lg mv-nmb-space-lg mv-px-space-lg mv-pb-space-md d-flex flex-wrap align-items-center justify-content-between mv-gap-space-sm mv-relative mv-z-10">
            <div class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant">
            <span class="material-symbols-outlined mv-text-primary mv-text-c79a76">movie_filter</span>
            <span class="mv-font-body-sm mv-text-body-sm"><strong class="mv-text-on-surface">3 Movies</strong> Purchased</span>
            </div>
            <div class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant">
            <span class="material-symbols-outlined mv-text-tertiary mv-text-c79a76">credit_card</span>
            <span class="mv-font-body-sm mv-text-body-sm"><strong class="mv-text-on-surface">Rs. 150</strong> Lifetime Spent</span>
            </div>
            </div>
            </div>
            <!-- Quick Stats & Analytics Card (Spans 5 cols) -->
            <div class="mv-md-col-span-5 mv-bg-surface-container-low mv-rounded-xl mv-p-space-lg d-flex flex-column justify-content-between mv-shadow-lg">
            <div class="d-flex align-items-center justify-content-between">
            <span class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">Wallet Dynamics</span>
            <span class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant">Sep 2026</span>
            </div>
            <!-- Spending inline SVG visualization (Sparkline + Distribution) -->
            <div class="my-3 d-flex flex-column mv-gap-space-xs">
            <div class="d-flex align-items-center justify-content-between mv-text-on-surface-variant mv-font-body-sm mv-text-body-sm">
            <span>Monthly Top-up Inflow</span>
            <span class="mv-text-tertiary mv-font-bold">+Rs. 700</span>
            </div>
            <!-- Mini Sparkline SVG -->
            <div class="mv-w-full mv-h-12 mv-py-1">
            <svg class="mv-w-full h-100 overflow-visible" fill="none" viewbox="0 0 200 48">
            <path class="mv-text-tertiary" d="M 0,38 L 40,32 L 80,42 L 120,20 L 160,28 L 200,6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></path>
            <path class="mv-text-tertiary_10" d="M 0,38 L 40,32 L 80,42 L 120,20 L 160,28 L 200,6 L 200,48 L 0,48 Z" fill="currentColor"></path>
            <circle class="mv-text-tertiary" cx="200" cy="6" fill="currentColor" r="3"></circle>
            </svg>
            </div>
            <div class="d-flex align-items-center justify-content-between mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm mv-pt-space-xs">
            <span>Avg. Rental Cost: <strong class="mv-text-on-surface">Rs. 50</strong></span>
            <span class="mv-text-primary mv-font-semibold">6 Rentals Potential</span>
            </div>
            </div>
            <!-- Security Assurance Note -->
            <div class="d-flex align-items-center mv-gap-space-xs mv-bg-surface-container mv-px-space-sm mv-py-2 mv-rounded-lg mv-text-on-surface-variant mv-font-body-sm mv-text-body-sm">
            <span class="material-symbols-outlined mv-text-primary mv-text-c79a76">verified_user</span>
            <span>Encrypted 256-bit TVOD Checkout</span>
            </div>
            </div>
            </div>
            <!-- Middle Section: Add Balance Form Workspace -->
            <div class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-lg mv-shadow-lg d-flex flex-column mv-gap-space-lg">
            <div>
            <div class="d-flex align-items-center mv-gap-space-xs mv-text-primary mb-1">
            <span class="material-symbols-outlined mv-text-27bd7e">add_circle</span>
            <h2 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Add Balance</h2>
            </div>
            <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant">Select an instant reload amount or enter a custom sum to deposit directly to your wallet.</p>
            </div>
            <!-- Denomination Quick-Amount Pills -->
            <div class="d-flex flex-column mv-gap-space-sm">
            <span class="mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-on-surface">Select Amount</span>
            <div class="d-grid mv-grid-cols-2 mv-sm-grid-cols-4 mv-gap-space-md" id="amountSelector">
            <!-- Rs 100 -->
            <button class="amount-pill mv-group d-flex flex-column align-items-center justify-content-center mv-p-space-md mv-rounded-xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-all mv-text-on-surface mv-cursor-pointer text-center" data-amount="100" type="button">
            <span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold">Rs. 100</span>
            <span class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant mv-group-hover-text-primary mv-transition-colors mv-mt-0p5">2 Rentals</span>
            </button>
            <!-- Rs 200 -->
            <button class="amount-pill mv-group d-flex flex-column align-items-center justify-content-center mv-p-space-md mv-rounded-xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-all mv-text-on-surface mv-cursor-pointer text-center" data-amount="200" type="button">
            <span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold">Rs. 200</span>
            <span class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant mv-group-hover-text-primary mv-transition-colors mv-mt-0p5">4 Rentals</span>
            </button>
            <!-- Rs 500 (Popular / Pre-Selected) -->
            <button class="amount-pill active mv-group mv-relative d-flex flex-column align-items-center justify-content-center mv-p-space-md mv-rounded-xl mv-bg-primary-container mv-font-bold mv-shadow-md mv-cursor-pointer text-center" data-amount="500" type="button">
            <span class="mv-absolute mv-ntop-2 mv-px-space-xs mv-py-0p5 mv-rounded-full mv-bg-tertiary mv-text-on-tertiary mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-font-extrabold mv-shadow-sm">Popular</span>
            <span class="mv-font-headline-sm mv-text-headline-sm mv-font-extrabold">Rs. 500</span>
            <span class="mv-font-label-sm mv-text-label-sm mv-opacity-90 mv-mt-0p5">10 Rentals + HD</span>
            </button>
            <!-- Rs 1000 -->
            <button class="amount-pill mv-group d-flex flex-column align-items-center justify-content-center mv-p-space-md mv-rounded-xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-all mv-text-on-surface mv-cursor-pointer text-center" data-amount="1000" type="button">
            <span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold">Rs. 1000</span>
            <span class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant mv-group-hover-text-primary mv-transition-colors mv-mt-0p5">VIP Season Pass</span>
            </button>
            </div>
            </div>
            <!-- Custom Amount Input -->
            <div class="d-flex flex-column mv-gap-space-xs">
            <label class="mv-font-label-md mv-text-label-md mv-font-semibold mv-text-on-surface-variant" for="customAmount">Or Enter Custom Recharge Amount</label>
            <div class="mv-relative d-flex align-items-center mv-max-w-md">
            <span class="mv-absolute mv-left-space-md mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-primary pe-none">Rs.</span>
            <input class="mv-w-full mv-h-11 mv-pl-12 mv-pr-space-md mv-bg-surface-container mv-rounded-lg mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface mv-placeholder-text-outline mv-focus-outline-none mv-focus-bg-surface-container-high mv-transition-all" id="customAmount" max="10000" min="50" placeholder="500" type="number" value="500"/>
            <button class="mv-absolute mv-right-3 mv-text-outline mv-hover-text-on-surface mv-transition-colors" id="clearAmount" type="button">
            <span class="material-symbols-outlined mv-text-c79a76">cancel</span>
            </button>
            </div>
            <span class="mv-font-body-sm mv-text-body-sm mv-text-outline">Minimum top-up: Rs. 50 • Maximum single recharge: Rs. 10,000</span>
            </div>
            <!-- Payment Channel Selection -->
            <div class="d-flex flex-column mv-gap-space-sm mv-pt-space-xs">
            <span class="mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-on-surface">Select Payment Gateway</span>
            <div class="d-grid mv-grid-cols-1 mv-sm-grid-cols-3 mv-gap-space-md" id="paymentOptions">
            <!-- EasyPaisa -->
            <label class="payment-method-card d-flex align-items-center mv-gap-space-sm mv-p-space-md mv-rounded-xl mv-bg-surface-container mv-cursor-pointer mv-transition-all mv-hover-bg-surface-container-high">
            <input checked="" class="mv-accent-primary mv-w-4 mv-h-4 mv-cursor-pointer" name="paymentMethod" type="radio" value="easypaisa"/>
            <div class="d-flex flex-column">
            <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface d-flex align-items-center mv-gap-1">
                                EasyPaisa
                                <span class="material-symbols-outlined mv-text-tertiary mv-text-58f475">bolt</span>
            </span>
            <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Mobile Account / OTP</span>
            </div>
            </label>
            <!-- JazzCash -->
            <label class="payment-method-card d-flex align-items-center mv-gap-space-sm mv-p-space-md mv-rounded-xl mv-bg-surface-container mv-cursor-pointer mv-transition-all mv-hover-bg-surface-container-high">
            <input class="mv-accent-primary mv-w-4 mv-h-4 mv-cursor-pointer" name="paymentMethod" type="radio" value="jazzcash"/>
            <div class="d-flex flex-column">
            <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">JazzCash</span>
            <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Instant Direct Debit</span>
            </div>
            </label>
            <!-- Debit / Credit Card -->
            <label class="payment-method-card d-flex align-items-center mv-gap-space-sm mv-p-space-md mv-rounded-xl mv-bg-surface-container mv-cursor-pointer mv-transition-all mv-hover-bg-surface-container-high">
            <input class="mv-accent-primary mv-w-4 mv-h-4 mv-cursor-pointer" name="paymentMethod" type="radio" value="card"/>
            <div class="d-flex flex-column">
            <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface d-flex align-items-center mv-gap-1">
                                Debit / Card
                                <span class="material-symbols-outlined mv-text-58f475 mv-text-outline">credit_card</span>
            </span>
            <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Visa / Mastercard / PayPak</span>
            </div>
            </label>
            </div>
            </div>
            <!-- Checkout Call to Action Banner -->
            <div class="mv-pt-space-sm d-flex flex-column flex-sm-row align-items-center justify-content-between mv-gap-space-md mv-bg-surface-container_70 mv-p-space-md mv-rounded-xl">
            <div class="d-flex align-items-center mv-gap-space-sm">
            <div class="mv-w-10 mv-h-10 mv-rounded-full mv-bg-primary-container_20 d-flex align-items-center justify-content-center mv-text-primary">
            <span class="material-symbols-outlined mv-text-c28550">lock</span>
            </div>
            <div class="d-flex flex-column">
            <span class="mv-font-label-md mv-text-label-md mv-font-bold mv-text-on-surface">Recharging to: <strong class="mv-text-tertiary">Ali Khan (0300-***459)</strong></span>
            <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">No convenience fee applied on wallet top-ups.</span>
            </div>
            </div>
            <!-- Primary Action Pill Button -->
            <button class="mv-w-full mv-sm-w-auto mv-px-space-xl mv-py-3 mv-rounded-full mv-bg-primary-container mv-font-label-lg mv-text-label-lg mv-font-bold mv-hover-brightness-110 mv-active-scale-95 mv-transition-all mv-shadow-md d-flex align-items-center justify-content-center mv-gap-2" id="proceedPayBtn" type="button">
            <span>Proceed to Pay</span>
            <span class="mv-font-headline-sm mv-text-headline-sm mv-font-extrabold" id="payBtnAmount">Rs. 500</span>
            <span class="material-symbols-outlined mv-text-c79a76">arrow_forward</span>
            </button>
            </div>
            </div>
            <!-- Bottom Section: Transaction History Feed -->
            <div class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-lg mv-shadow-lg d-flex flex-column mv-gap-space-md">
            <div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-sm">
            <div>
            <h3 class="mv-font-title-md mv-text-title-md mv-font-bold mv-text-on-surface">Transaction History</h3>
            <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Recent wallet deposits and movie rentals deduction logs</p>
            </div>
            <div class="d-flex align-items-center mv-gap-space-xs mv-font-label-md mv-text-label-md">
            <span class="mv-px-space-sm mv-py-1 mv-rounded-full mv-bg-surface-container mv-text-on-surface mv-font-semibold">All Records</span>
            <span class="mv-px-space-sm mv-py-1 mv-rounded-full mv-bg-surface-container-high mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors mv-cursor-pointer">Deposits</span>
            <span class="mv-px-space-sm mv-py-1 mv-rounded-full mv-bg-surface-container-high mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors mv-cursor-pointer">Rentals</span>
            </div>
            </div>
            <!-- Transaction List -->
            <div class="d-flex flex-column mv-gap-space-xs mt-1">
            <!-- Item 1: +Rs. 500 Wallet Recharge -->
            <div class="d-flex align-items-center justify-content-between mv-p-space-md mv-rounded-xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-colors">
            <div class="d-flex align-items-center mv-gap-space-md">
            <div class="mv-w-10 mv-h-10 mv-rounded-full mv-bg-tertiary-container_30 mv-text-tertiary d-flex align-items-center justify-content-center mv-font-bold">
            <span class="material-symbols-outlined mv-text-27bd7e">add</span>
            </div>
            <div class="d-flex flex-column">
            <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Wallet Recharge</span>
            <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant d-flex align-items-center mv-gap-1">
            <span>EasyPaisa Ref: #EP-90218</span>
            <span>•</span>
            <span>25 Sep 2026, 08:42 PM</span>
            </span>
            </div>
            </div>
            <div class="d-flex align-items-center mv-gap-space-md">
            <div class="d-flex flex-column align-items-end">
            <span class="mv-font-headline-sm mv-text-headline-sm mv-font-extrabold mv-text-tertiary">+ Rs. 500</span>
            <span class="mv-font-label-sm mv-text-label-sm mv-text-tertiary">Completed</span>
            </div>
            <div class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-tertiary"></div>
            </div>
            </div>
            <!-- Item 2: -Rs. 50 Movie Purchase (John Wick 4) -->
            <div class="d-flex align-items-center justify-content-between mv-p-space-md mv-rounded-xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-colors">
            <div class="d-flex align-items-center mv-gap-space-md">
            <div class="mv-w-10 mv-h-10 mv-rounded-full mv-bg-error-container_30 mv-text-error d-flex align-items-center justify-content-center mv-font-bold">
            <span class="material-symbols-outlined mv-text-27bd7e">remove</span>
            </div>
            <div class="d-flex flex-column">
            <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Movie Purchase • John Wick: Chapter 4</span>
            <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant d-flex align-items-center mv-gap-1">
            <span>4K UltraHD 48h Rental</span>
            <span>•</span>
            <span>20 Sep 2026, 10:15 PM</span>
            </span>
            </div>
            </div>
            <div class="d-flex align-items-center mv-gap-space-md">
            <div class="d-flex flex-column align-items-end">
            <span class="mv-font-headline-sm mv-text-headline-sm mv-font-extrabold mv-text-error">- Rs. 50</span>
            <span class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant">Streamed</span>
            </div>
            <div class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-outline"></div>
            </div>
            </div>
            <!-- Item 3: +Rs. 200 Wallet Recharge -->
            <div class="d-flex align-items-center justify-content-between mv-p-space-md mv-rounded-xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-colors">
            <div class="d-flex align-items-center mv-gap-space-md">
            <div class="mv-w-10 mv-h-10 mv-rounded-full mv-bg-tertiary-container_30 mv-text-tertiary d-flex align-items-center justify-content-center mv-font-bold">
            <span class="material-symbols-outlined mv-text-27bd7e">add</span>
            </div>
            <div class="d-flex flex-column">
            <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Wallet Recharge</span>
            <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant d-flex align-items-center mv-gap-1">
            <span>JazzCash Ref: #JC-38102</span>
            <span>•</span>
            <span>15 Sep 2026, 03:10 PM</span>
            </span>
            </div>
            </div>
            <div class="d-flex align-items-center mv-gap-space-md">
            <div class="d-flex flex-column align-items-end">
            <span class="mv-font-headline-sm mv-text-headline-sm mv-font-extrabold mv-text-tertiary">+ Rs. 200</span>
            <span class="mv-font-label-sm mv-text-label-sm mv-text-tertiary">Completed</span>
            </div>
            <div class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-tertiary"></div>
            </div>
            </div>
            <!-- Item 4: -Rs. 50 Movie Purchase (Dune) -->
            <div class="d-flex align-items-center justify-content-between mv-p-space-md mv-rounded-xl mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-colors">
            <div class="d-flex align-items-center mv-gap-space-md">
            <div class="mv-w-10 mv-h-10 mv-rounded-full mv-bg-error-container_30 mv-text-error d-flex align-items-center justify-content-center mv-font-bold">
            <span class="material-symbols-outlined mv-text-27bd7e">remove</span>
            </div>
            <div class="d-flex flex-column">
            <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">Movie Purchase • Dune: Part Two</span>
            <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant d-flex align-items-center mv-gap-1">
            <span>1080p Web-DL Rental</span>
            <span>•</span>
            <span>10 Sep 2026, 09:00 PM</span>
            </span>
            </div>
            </div>
            <div class="d-flex align-items-center mv-gap-space-md">
            <div class="d-flex flex-column align-items-end">
            <span class="mv-font-headline-sm mv-text-headline-sm mv-font-extrabold mv-text-error">- Rs. 50</span>
            <span class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant">Streamed</span>
            </div>
            <div class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-outline"></div>
            </div>
            </div>
            </div>
            <!-- Pagination or History Footer -->
            <div class="d-flex align-items-center justify-content-between mv-pt-space-xs mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">
            <span>Showing 4 of 28 transactions</span>
            <button class="mv-text-primary mv-hover-underline mv-font-label-md mv-text-label-md d-flex align-items-center mv-gap-1" type="button">
            <span>View Full Ledger</span>
            <span class="material-symbols-outlined mv-text-58f475">north_east</span>
            </button>
            </div>
            </div>
            </section>
            </div>
            </div>
            <!-- Interactive Client Behavior -->

            </div>
            </main>
       <Footer />
    </AppLayout>
</template>

<script>
import { onMounted } from 'vue';
import { bootPage } from '../runPageScript';
import AppLayout from '../../layouts/AppLayout.vue';
import Header from '../../layouts/SiteMenu.vue';
import Footer from '../../layouts/SiteFooter.vue';


export default {
    name: 'WalletPage',
    components: {
        AppLayout,
        Header,
        Footer
    },
    setup() {
        onMounted(() => bootPage(externals, 'KGZ1bmN0aW9uIGluaXRXYWxsZXRJbnRlcmFjdGlvbnMoKSB7CiAgICAgIHZhciBwaWxscyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5hbW91bnQtcGlsbCcpOwogICAgICB2YXIgY3VzdG9tSW5wdXQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnY3VzdG9tQW1vdW50Jyk7CiAgICAgIHZhciBwYXlCdG5BbW91bnQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgncGF5QnRuQW1vdW50Jyk7CiAgICAgIHZhciBjbGVhckJ0biA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdjbGVhckFtb3VudCcpOwogICAgICB2YXIgcHJvY2VlZEJ0biA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdwcm9jZWVkUGF5QnRuJyk7CgogICAgICBmdW5jdGlvbiB1cGRhdGVBY3RpdmVTdGF0ZShzZWxlY3RlZEFtb3VudCkgewogICAgICAgIHBpbGxzLmZvckVhY2gocGlsbCA9PiB7CiAgICAgICAgICB2YXIgcGlsbFZhbCA9IHBpbGwuZ2V0QXR0cmlidXRlKCdkYXRhLWFtb3VudCcpOwogICAgICAgICAgaWYgKHBpbGxWYWwgPT09IFN0cmluZyhzZWxlY3RlZEFtb3VudCkpIHsKICAgICAgICAgICAgcGlsbC5jbGFzc0xpc3QuYWRkKCdtdi1iZy1wcmltYXJ5LWNvbnRhaW5lcicsICdtdi1mb250LWJvbGQnLCAnbXYtc2hhZG93LW1kJyk7CiAgICAgICAgICAgIHBpbGwuY2xhc3NMaXN0LnJlbW92ZSgnbXYtYmctc3VyZmFjZS1jb250YWluZXInLCAnbXYtdGV4dC1vbi1zdXJmYWNlJyk7CiAgICAgICAgICB9IGVsc2UgewogICAgICAgICAgICBwaWxsLmNsYXNzTGlzdC5yZW1vdmUoJ212LWJnLXByaW1hcnktY29udGFpbmVyJywgJ212LWZvbnQtYm9sZCcsICdtdi1zaGFkb3ctbWQnKTsKICAgICAgICAgICAgcGlsbC5jbGFzc0xpc3QuYWRkKCdtdi1iZy1zdXJmYWNlLWNvbnRhaW5lcicsICdtdi10ZXh0LW9uLXN1cmZhY2UnKTsKICAgICAgICAgIH0KICAgICAgICB9KTsKICAgICAgICBpZiAocGF5QnRuQW1vdW50KSB7CiAgICAgICAgICBwYXlCdG5BbW91bnQudGV4dENvbnRlbnQgPSAnUnMuICcgKyAoc2VsZWN0ZWRBbW91bnQgfHwgMCk7CiAgICAgICAgfQogICAgICB9CgogICAgICBwaWxscy5mb3JFYWNoKHBpbGwgPT4gewogICAgICAgIHBpbGwuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoKSA9PiB7CiAgICAgICAgICB2YXIgdmFsID0gcGlsbC5nZXRBdHRyaWJ1dGUoJ2RhdGEtYW1vdW50Jyk7CiAgICAgICAgICBpZiAoY3VzdG9tSW5wdXQpIGN1c3RvbUlucHV0LnZhbHVlID0gdmFsOwogICAgICAgICAgdXBkYXRlQWN0aXZlU3RhdGUodmFsKTsKICAgICAgICB9KTsKICAgICAgfSk7CgogICAgICBpZiAoY3VzdG9tSW5wdXQpIHsKICAgICAgICBjdXN0b21JbnB1dC5hZGRFdmVudExpc3RlbmVyKCdpbnB1dCcsIChlKSA9PiB7CiAgICAgICAgICB2YXIgbnVtZXJpY1ZhbCA9IGUudGFyZ2V0LnZhbHVlOwogICAgICAgICAgdXBkYXRlQWN0aXZlU3RhdGUobnVtZXJpY1ZhbCk7CiAgICAgICAgfSk7CiAgICAgIH0KCiAgICAgIGlmIChjbGVhckJ0biAmJiBjdXN0b21JbnB1dCkgewogICAgICAgIGNsZWFyQnRuLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKCkgPT4gewogICAgICAgICAgY3VzdG9tSW5wdXQudmFsdWUgPSAnJzsKICAgICAgICAgIGN1c3RvbUlucHV0LmZvY3VzKCk7CiAgICAgICAgICB1cGRhdGVBY3RpdmVTdGF0ZSgnJyk7CiAgICAgICAgfSk7CiAgICAgIH0KCiAgICAgIGlmIChwcm9jZWVkQnRuKSB7CiAgICAgICAgcHJvY2VlZEJ0bi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsICgpID0+IHsKICAgICAgICAgIHZhciBhbXQgPSBjdXN0b21JbnB1dCA/IGN1c3RvbUlucHV0LnZhbHVlIDogJzUwMCc7CiAgICAgICAgICBpZiAoIWFtdCB8fCBOdW1iZXIoYW10KSA8PSAwKSB7CiAgICAgICAgICAgIGFsZXJ0KCdQbGVhc2Ugc2VsZWN0IG9yIGVudGVyIGEgdmFsaWQgcmVjaGFyZ2UgYW1vdW50LicpOwogICAgICAgICAgICByZXR1cm47CiAgICAgICAgICB9CiAgICAgICAgICB2YXIgcHJldlRleHQgPSBwcm9jZWVkQnRuLmlubmVySFRNTDsKICAgICAgICAgIHByb2NlZWRCdG4uaW5uZXJIVE1MID0gJzxzcGFuIGNsYXNzPSJtYXRlcmlhbC1zeW1ib2xzLW91dGxpbmVkIG12LXRleHQtMjdiZDdlIG12LWFuaW1hdGUtc3BpbiI+cmVmcmVzaDwvc3Bhbj4gUHJvY2Vzc2luZyBDaGVja291dC4uLic7CiAgICAgICAgICBwcm9jZWVkQnRuLmRpc2FibGVkID0gdHJ1ZTsKICAgICAgICAgIHNldFRpbWVvdXQoKCkgPT4gewogICAgICAgICAgICBhbGVydCgnUmVjaGFyZ2Ugb3JkZXIgb2YgUnMuICcgKyBhbXQgKyAnIGluaXRpYWxpemVkIHN1Y2Nlc3NmdWxseSEgUmVkaXJlY3RpbmcgdG8gc2VjdXJlIHBheW1lbnQgY2hhbm5lbC4nKTsKICAgICAgICAgICAgcHJvY2VlZEJ0bi5pbm5lckhUTUwgPSBwcmV2VGV4dDsKICAgICAgICAgICAgcHJvY2VlZEJ0bi5kaXNhYmxlZCA9IGZhbHNlOwogICAgICAgICAgfSwgMTIwMCk7CiAgICAgICAgfSk7CiAgICAgIH0KICAgIH0pKCk7'));
    },
};
</script>
