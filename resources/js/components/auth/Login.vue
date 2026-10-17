<template>
    <GuestLayout>
        <div
            class="auth-fixed auth-inset-0 auth-pointer-events-none auth-bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(49,152,220,0.15),rgba(10,14,20,0))]"
        ></div>
        <main class="auth-w-full auth-min-h-screen auth-relative auth-z-10 auth-flex auth-flex-col auth-items-center auth-justify-center">
            <div
                class="auth-flex auth-flex-col auth-w-full auth-relative auth-min-h-screen auth-items-center auth-justify-center auth-p-space-md sm:auth-p-space-lg auth-select-none auth-overflow-hidden"
            >
                <!-- Ambient Backdrop Poster Mosaic with Deep Cinematic Scrim -->
                <div class="auth-absolute auth-inset-0 auth-pointer-events-none auth-z-0 auth-overflow-hidden auth-opacity-50">
                    <div
                        class="auth-grid auth-grid-cols-3 sm:auth-grid-cols-4 md:auth-grid-cols-6 auth-gap-3 sm:auth-gap-4 auth--rotate-6 auth-scale-110 auth--translate-y-12 auth-blur-[1.5px] auth-brightness-75"
                    >
                        <!-- Row of montage cards -->
                        <div class="auth-h-64 auth-rounded-lg auth-bg-surface-container auth-overflow-hidden auth-shadow-2xl">
                            <img
                                class="auth-w-full auth-h-full auth-object-cover"
                                data-alt="Dark dramatic movie poster featuring action hero silhouette in neon rain city streets with electric blue and teal backlight"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHcqpZNuJhb8hJ1Wjhp0R_tMeZwU2Ca-zpkLv-yV709dG_llaGhteRVEHXwsh0VbUdW0L546AhdWl320wv62rmJvAKWqwkxa4-i0LnLnKIr4FYZiCTipgdFje0WPjX_C0Y5vV2qhgUVH1igIzZA_v3eulTkJki7F4tAKT4cGWaTKFv_DrLlStL7qBt4EoZoB2gV_t1I5zx7vZlXvdFJFHJAfAU-XKKq3Q525K2__RbihXucGyNE_ZizA"
                            />
                        </div>
                        <div class="auth-h-64 auth-rounded-lg auth-bg-surface-container auth-overflow-hidden auth-shadow-2xl">
                            <img
                                class="auth-w-full auth-h-full auth-object-cover"
                                data-alt="Futuristic sci-fi film poster with gigantic space dune landscapes and two warriors in tactical gear under dual suns"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC8ISqboPkLGFt2rsPbYecWp8TEdiK_ozfoWZ-ltQb5T95Vq0WDGZBMQIMtLOpBYoeRUjCB2lyUt0wH_ljienXT9t2BWFttCOturVDn9sUQC6mFx7q_iozHZHhz4RjJBlTXG5p68-rdVMISlxm9p5fvUXiTYR99lP-Vuii27G0-c-fVyrrVODnV3Sa_drIu8hOId-j5YVV_3bVhKWepl2To76y8gEBa0ti6Rwqi07Do-DEB98DpyJnxFw"
                            />
                        </div>
                        <div class="auth-h-64 auth-rounded-lg auth-bg-surface-container auth-overflow-hidden auth-shadow-2xl">
                            <img
                                class="auth-w-full auth-h-full auth-object-cover"
                                data-alt="Neo-noir detective thriller movie poster drenched in obsidian shadows, crimson smoke, and cold ambient glow"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAgU_K5lTpImH45aAx8Si8nq6yriVpuLjhz2sfGBt8HkpcHbKf3bfqVd-gogdi5yIkS6da9Zf7gAxFf7XsVpjD2YQ--vfqCjw9rIjdKKZa8oy5v5jBgJnyRmCE70yK39KnfuIhLlz6jZfWui7wP8l4vzL6cKXFhKC_RKB713l0W3aCjXBIPExspaI2iDKz8B_Fl7TVloXIxg6e1r1HCT2Rmi3Amk0xmmWuuMyDV0EPrXXTxQJlOz2Viyw"
                            />
                        </div>
                        <div class="auth-h-64 auth-rounded-lg auth-bg-surface-container auth-overflow-hidden auth-shadow-2xl">
                            <img
                                class="auth-w-full auth-h-full auth-object-cover"
                                data-alt="High octane street racing poster with sleek dark hypercars drifting through night neon tunnels with light streaks"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxAarBNvdWomeF0QUN9-79XquS9ZbUuN5k_Pp0Z_LwZ6Wg5Ez-TSTJKEhpp5je0f4UZjIeKjWp8dRW6od3YyofkZy2FbZXAxBieF29GqoBj0RUwgAbWtRRToROqhi0hUPkykFm1lqce9nlIPVBO1Tr8VAqY1Svmhxadkhp6XoRT2T6XOSWt-sP6_A-CZmLaY5640oyAdUhJ61qDG6tcY9S3nG_OjIRP78syJ7yqZQGKUPLor7C_o5dVg"
                            />
                        </div>
                        <div class="auth-h-64 auth-rounded-lg auth-bg-surface-container auth-overflow-hidden auth-shadow-2xl">
                            <img
                                class="auth-w-full auth-h-full auth-object-cover"
                                data-alt="Intense psychological drama poster with split cinematic character portrait bathed in fiery amber and deep ocean blues"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBWYGuynUpltjagh9FS5qERz6t-aJGnRat7uBnsOzLplU7IyvWA-G63cgVUazLq8JMfhK414XHM0R4Gd2ljRI3ATRiXuZF6KXPpb6murmk8d46bQi0u5KkoLKBnh5PYvdlRh_tyA-x1uPCmnbwF9McfOekTx9Ii0gCMx8TgCn0Fooph1CZW75Z4qEoppRTnk3a6dubqZ7NnYGX89WIV5PORRUaEngjkdtRSufgolHW4Cgo5-vNy8o9kvA"
                            />
                        </div>
                        <div class="auth-h-64 auth-rounded-lg auth-bg-surface-container auth-overflow-hidden auth-shadow-2xl">
                            <img
                                class="auth-w-full auth-h-full auth-object-cover"
                                data-alt="Cyberpunk underworld thriller poster with hooded operative glancing over shoulder into illuminated futuristic alleyway"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCxSm1O9mIngg6cPtUgDsOF0K3s_sve03IFyH22ajSqoclUkbLFB11S7YNzLlw1TNEpCwaoOQrb9-ZxodRWqM-T6x4voESu2SSljiuBvX3MYvYmn5Nv0fCQyFvaxPzitwuDSWhdYi7CYvD-IyLxUfuOrmIWbSHnvITEosPoLyf7HJCSl0EFrKUJsrfdTTqUOdhOSWtBHY_Zw5oW5_dJU6N8rHadolbnisMp6SVHzVjaWa6lRYA_tZYjDA"
                            />
                        </div>
                        <div class="auth-h-64 auth-rounded-lg auth-bg-surface-container auth-overflow-hidden auth-shadow-2xl">
                            <img
                                class="auth-w-full auth-h-full auth-object-cover"
                                data-alt="Action franchise poster showing suited hitman aiming handgun with bokeh city lights and shattered stained glass background"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAT8dzi70LgcunO8Y1cfsmvxolF6CYzPDRbJyZU-3pItlUPJtWcgS0Sp-IjZ-9Pw3oGIY8ATzwdwVIXBPxfha1uxSHzk5QkYLIhtV81S74a5zPD8LK4G5QK-lU8pndJrJV7amEUjVzdsga73ZyINH9pMKFq5kRkobM3uHC7lD-5kxiQcwipYRDGDjqqzhJFVlaRpPlLEYvTXdsKV7E42guipEQrmjGvP30czWBO7iy6s3afTj8vO4kOjQ"
                            />
                        </div>
                        <div class="auth-h-64 auth-rounded-lg auth-bg-surface-container auth-overflow-hidden auth-shadow-2xl">
                            <img
                                class="auth-w-full auth-h-full auth-object-cover"
                                data-alt="Epic medieval fantasy film poster with crowned warrior staring at monolithic ruined citadel under storm lightning"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAeYyRoPIjSX4d7XemJQV28w9Wcoez39M4U5qNa6U0S4fMX-6jWudxi42M6ZE6FQOb0NyJGHyVGxv7XyKKA1GQQW6AzX190HsV56mZIfWxpWbyUVIxXpGqVrl8CWZ8k1fUtRVh1MpkmAGMZByoTRQk71kX_3Uk73gAArQtkjMVONAa4DyqPgAxF4_lsqXBAjwckz65BaYzb1FgtgDZd7By0nxOgv5Q_onm0YkA-O42h68YwdY4SRvePlA"
                            />
                        </div>
                        <div class="auth-h-64 auth-rounded-lg auth-bg-surface-container auth-overflow-hidden auth-shadow-2xl">
                            <img
                                class="auth-w-full auth-h-full auth-object-cover"
                                data-alt="Modern supernatural horror poster with misty forest and lone mysterious cabin glowing with electric luminescence"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjgnath6tKYfwq3sIDvCVFAIQoZJYArFnrr1Xos47weH_89txVQkdyQB2pbqTuTlwb4ospbiMbYrxEG1FmgQAX4Xde6KxMdhFp2vjU9G7s_5MBGbV3kjrY-gFseko_8O5yWhqciSE_QrdkViykdBtMoLQjoErqfx15q9JbsuEuW8OOnF620KRnUejbGwbgSvxEUzzmEZpjrZxmc19qYNqd-pBkqm-IZIxIqk98-RH4p9Hb4T18HN4yuw"
                            />
                        </div>
                        <div class="auth-h-64 auth-rounded-lg auth-bg-surface-container auth-overflow-hidden auth-shadow-2xl">
                            <img
                                class="auth-w-full auth-h-full auth-object-cover"
                                data-alt="Interstellar space exploration movie poster with astronaut floating towards an iridescent glowing black hole accretion disk"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDyly1zNqUSfYsLd_hX9CO4TB4I9XTBLSu25ilFQr1ArkHCuhYUjIKjFY-ENu2wooDkvbIzS1-dbKap1IEnVXnyYnaQazVsUufEB7UCrAKzcu1veNfAmJCIwLFtjHQlT-qnMljS_GYVh8Vucr4xMVX5OtJPnvpgWzA6rnvNIhIi-o5cQ4tyYbD6_MMX35VIJFFS_79FEAqI16rK6j-0cA9FWdTlhumFffoC9C8gnjy3BFQJxA8WnfTToA"
                            />
                        </div>
                        <div class="auth-h-64 auth-rounded-lg auth-bg-surface-container auth-overflow-hidden auth-shadow-2xl">
                            <img
                                class="auth-w-full auth-h-full auth-object-cover"
                                data-alt="High stakes military heist film poster with helicopters silhouette flying over desert canyon during twilight"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCJNJ1Nv3a6IeGeUc0oDU4xsfCV3IuRFTUCl7ZOIkYLCdN5h6JHK1HuYEMEW6g_8FPTt8uRh_zlsu8Ze0yWEsZsrlo9tUHt9mjIl8lpjl6kr5oOIAPljHDhI2VE-1s4QwnE3EHbGVH63i9svHqgb-E0CLCP9IHyij0d2ynSBvfs98D477vCDMrnUZzkXg-L9egRaJ5tXdHh3_obSE6O-tIsXuH_E6frgSroM0C4k4r_Mb2hTpBgPfgR6w"
                            />
                        </div>
                        <div class="auth-h-64 auth-rounded-lg auth-bg-surface-container auth-overflow-hidden auth-shadow-2xl">
                            <img
                                class="auth-w-full auth-h-full auth-object-cover"
                                data-alt="Martial arts action film poster with duelists engaged in mid-air combat above neon lit pagoda rooftops"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC3jXONKwrfS7t2lucvvwV-O9n4WONvgI6BIwVqsat-0Ff4haTopoJortSBFH6Tgz6KWgWkPp-GHYPsyjyxRyQDtiy59rPIp158UMFfosVeMjD93ilU-OtJ-T6T9IRzTCaX_P4qPcqpACjSGIElfIoGfL8poWkJaqfHThK9Ql0LTXhPxC-yMOGYeckaZ-Qs9rIaR5KsvZyqWdoYaSTj3hrR0Yysc67aU5zoxiRCPzgq5y32iE9BuQhALA"
                            />
                        </div>
                    </div>
                </div>
                <!-- Radial Vignette Scrim Layers for Cinematic Depth -->
                <div class="auth-absolute auth-inset-0 auth-pointer-events-none auth-z-[1] auth-bg-surface-container-lowest/50 auth-backdrop-blur-sm"></div>
                <div
                    class="auth-absolute auth-inset-0 auth-pointer-events-none auth-z-[1] auth-bg-gradient-to-t auth-from-surface-container-lowest auth-via-surface-container-lowest/35 auth-to-transparent"
                ></div>
                <div
                    class="auth-absolute auth--top-32 auth-left-1/2 auth--translate-x-1/2 auth-w-96 auth-h-96 auth-bg-primary-container/20 auth-rounded-full auth-blur-[120px] auth-pointer-events-none auth-z-[1]"
                ></div>
                <!-- Central Authentication Card (Screen #3 Specification) -->
                <div class="auth-relative auth-z-10 auth-w-full auth-max-w-[430px] auth-my-auto">
                    <div
                        class="auth-relative auth-rounded-2xl auth-bg-surface-container-low/95 auth-p-6 sm:auth-p-9 auth-shadow-2xl auth-shadow-surface-container-lowest/90 auth-backdrop-blur-2xl auth-transition-all auth-duration-300"
                    >
                        <!-- Top Brand Header -->
                        <div class="auth-flex auth-flex-col auth-items-center auth-text-center auth-mb-7">
                            <div class="auth-flex auth-items-center auth-gap-2 auth-mb-4 auth-group auth-cursor-pointer">
                                <div
                                    class="auth-w-10 auth-h-10 auth-rounded-xl auth-overflow-hidden auth-shadow-lg auth-shadow-primary-container/30 auth-flex auth-items-center auth-justify-center auth-bg-surface-container"
                                >
                                    <router-link to="/">
                                        <div
                                            class="auth-w-9 auth-h-9 auth-rounded-lg auth-bg-primary-container auth-flex auth-items-center auth-justify-center auth-shadow-[0_0_16px_rgba(49,152,220,0.35)] group-hover:auth-scale-105 auth-transition-transform"
                                        >
                                            <span class="material-symbols-outlined auth-text-white-container auth-text-[22px]"
                                                >play_arrow</span
                                            >
                                        </div>

                                        <span class="auth-font-headline-md auth-text-headline-md auth-tracking-tight auth-text-on-surface">
                                            Movie<span class="auth-text-primary auth-font-headline-xl-mobile sm:auth-font-headline-xl"
                                                >Hub</span
                                            >
                                        </span>
                                    </router-link>
                                </div>
                                <h1
                                    class="auth-font-headline-lg-mobile sm:auth-font-headline-lg auth-text-headline-lg-mobile sm:auth-text-headline-lg auth-text-on-surface auth-mb-1.5 auth-tracking-tight"
                                >
                                    Welcome Back
                                </h1>
                                <p class="auth-font-body-md auth-text-body-md auth-text-on-surface-variant">Login to your account</p>
                            </div>
                            <!-- Login Form Formwork -->
                            <form class="auth-flex auth-flex-col auth-gap-4" id="loginForm" @submit.prevent="login">
                                <p v-if="errorMessage" class="auth-text-error auth-font-body-sm auth-text-body-sm" role="alert">
                                    {{ errorMessage }}
                                </p>
                                <!-- Email / Mobile Input Field -->
                                <div class="auth-flex auth-flex-col auth-gap-1.5 auth-text-left">
                                    <label class="auth-font-label-md auth-text-label-md auth-text-on-surface-variant auth-pl-0.5" for="emailInput">
                                        Email / Mobile
                                    </label>
                                    <div
                                        class="auth-relative auth-flex auth-items-center auth-rounded-xl auth-bg-surface-container auth-transition-all auth-duration-200 focus-within:auth-bg-surface-container-high focus-within:auth-shadow-[0_0_0_2px_rgba(49,152,220,0.5)]"
                                    >
                                        <div class="auth-absolute auth-left-3.5 auth-flex auth-items-center auth-pointer-events-none auth-text-outline">
                                            <span class="material-symbols-outlined auth-text-[19px]">mail</span>
                                        </div>
                                        <input
                                            autocomplete="username"
                                            class="auth-w-full auth-h-11 auth-pl-10 auth-pr-3.5 auth-bg-transparent auth-font-body-md auth-text-body-md auth-text-on-surface placeholder:auth-text-outline-variant placeholder:auth-font-body-sm focus:auth-outline-none"
                                            id="emailInput"
                                            placeholder="Enter your email or mobile number"
                                            required=""
                                            type="email"
                                            v-model="email"
                                        />
                                    </div>
                                </div>
                                <!-- Password Input Field -->
                                <div class="auth-flex auth-flex-col auth-gap-1.5 auth-text-left">
                                    <label
                                        class="auth-font-label-md auth-text-label-md auth-text-on-surface-variant auth-pl-0.5"
                                        for="passwordInput"
                                    >
                                        Password
                                    </label>
                                    <div
                                        class="auth-relative auth-flex auth-items-center auth-rounded-xl auth-bg-surface-container auth-transition-all auth-duration-200 focus-within:auth-bg-surface-container-high focus-within:auth-shadow-[0_0_0_2px_rgba(49,152,220,0.5)]"
                                    >
                                        <div class="auth-absolute auth-left-3.5 auth-flex auth-items-center auth-pointer-events-none auth-text-outline">
                                            <span class="material-symbols-outlined auth-text-[19px]">lock</span>
                                        </div>
                                        <input
                                            autocomplete="current-password"
                                            class="auth-w-full auth-h-11 auth-pl-10 auth-pr-11 auth-bg-transparent auth-font-body-md auth-text-body-md auth-text-on-surface placeholder:auth-text-outline-variant placeholder:auth-font-body-sm focus:auth-outline-none"
                                            id="passwordInput"
                                            placeholder="Enter your password"
                                            required=""
                                            type="password"
                                            v-model="password"
                                        />
                                        <button
                                            aria-label="Toggle password visibility"
                                            class="auth-absolute auth-right-3.5 auth-flex auth-items-center auth-justify-center auth-text-outline hover:auth-text-on-surface auth-transition-colors focus:auth-outline-none"
                                            id="togglePasswordBtn"
                                            type="button"
                                        >
                                            <span class="material-symbols-outlined auth-text-[19px]" id="pwdEyeIcon"
                                                >visibility</span
                                            >
                                        </button>
                                    </div>
                                </div>
                                <!-- Options: Remember Me & Forgot Password -->
                                <div class="auth-flex auth-items-center auth-justify-between auth-pt-0.5 auth-pb-1">
                                    <label class="auth-flex auth-items-center auth-gap-2 auth-cursor-pointer auth-select-none auth-group">
                                        <div class="auth-relative auth-flex auth-items-center">
                                            <input class="auth-peer auth-sr-only" id="rememberMe" type="checkbox" v-model="remember" />
                                            <div
                                                class="auth-w-4 auth-h-4 auth-rounded auth-bg-surface-container peer-checked:auth-bg-primary-container peer-focus-visible:auth-ring-2 peer-focus-visible:auth-ring-primary auth-transition-all auth-flex auth-items-center auth-justify-center"
                                            >
                                                <span
                                                    class="material-symbols-outlined auth-text-white-container auth-text-[14px] auth-opacity-0 peer-checked:auth-opacity-100 auth-transition-opacity auth-font-bold"
                                                    >check</span
                                                >
                                            </div>
                                        </div>
                                        <span
                                            class="auth-font-body-sm auth-text-body-sm auth-text-on-surface-variant group-hover:auth-text-on-surface auth-transition-colors"
                                        >
                                            Remember Me
                                        </span>
                                    </label>
                                    <router-link
                                        class="auth-font-label-md auth-text-label-md auth-text-primary hover:auth-text-secondary-fixed auth-transition-colors auth-underline-offset-4 hover:auth-underline"
                                        to="/forget-password"
                                    >
                                        Forgot Password?
                                    </router-link>
                                </div>
                                <!-- Primary Action Button -->
                                <button
                                    class="auth-relative auth-overflow-hidden auth-w-full auth-h-12 auth-mt-1 auth-rounded-xl auth-bg-primary-container auth-text-white auth-font-headline-sm auth-text-headline-sm auth-flex auth-items-center auth-justify-center auth-gap-2 auth-transition-all auth-duration-300 auth-shadow-[0_8px_20px_-4px_rgba(49,152,220,0.45)] hover:auth-shadow-[0_12px_24px_-2px_rgba(49,152,220,0.6)] hover:auth-brightness-110 active:auth-scale-[0.98]"
                                    id="loginSubmitBtn"
                                    type="submit"
                                    :disabled="isLoading"
                                >
                                    
                                        Login
                                    
                                    <span class="auth-hidden material-symbols-outlined auth-text-[20px] auth-animate-spin" id="btnSpinner"
                                        >progress_activity</span
                                    >
                                </button>
                            </form>
                            <!-- Switch to Register Link -->
                            <div class="auth-text-center auth-mt-7 auth-pt-4">
                                <p class="auth-font-body-sm auth-text-body-sm auth-text-on-surface-variant">
                                    Don't have an account?
                                    <router-link
                                        class="auth-font-label-lg auth-text-label-lg auth-text-primary hover:auth-text-secondary-fixed auth-transition-colors auth-ml-1 auth-font-semibold auth-underline-offset-4 hover:auth-underline"
                                        to="/register"
                                    >
                                        Register
                                    </router-link>
                                </p>
                            </div>
                        </div>
                        <!-- Quick Footer Badges / Trust Markers -->
                        <div class="auth-flex auth-items-center auth-justify-center auth-gap-6 auth-mt-6 auth-text-outline auth-font-label-sm auth-text-label-sm">
                            <div class="auth-flex auth-items-center auth-gap-1.5">
                                <span class="material-symbols-outlined auth-text-[16px] auth-text-tertiary">verified_user</span>
                                <span>Secure Stream TVOD</span>
                            </div>
                            <div class="auth-w-1 auth-h-1 auth-rounded-full auth-bg-surface-variant"></div>
                            <div class="auth-flex auth-items-center auth-gap-1.5">
                                <span class="material-symbols-outlined auth-text-[16px] auth-text-primary">hd</span>
                                <span>Ultra 4K Atmos</span>
                            </div>
                            <div class="auth-w-1 auth-h-1 auth-rounded-full auth-bg-surface-variant"></div>
                            <div class="auth-flex auth-items-center auth-gap-1.5">
                                <span class="material-symbols-outlined auth-text-[16px]">bolt</span>
                                <span>Instant Access</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </GuestLayout>
  </template>

  <script>
  import GuestLayout from '../layouts/GuestLayout.vue';
  import axios from 'axios';

  export default {
    components: {
      GuestLayout,
    },
    data() {
      return {
        isLoading: false,
        email: '',
        password: '',
        remember: false,
        errors: {},
        successMessage: '',
        errorMessage: '',
        subscription:false
      };
    },
    methods: {
      login() {
        // Reset messages
        this.successMessage = '';
        this.errorMessage = '';
        this.isLoading = true;
        // Call your login API
        axios.post('/api/login', {
          email: this.email,
          password: this.password,
          remember: this.remember,
        })
          .then(response => {
            console.log('Login successful:', response.data);
            const user = response.data.data || response.data;
            const isAdmin = Number(user.admin) === 1;

            localStorage.setItem('token', `Bearer ${user.api_token}`);
            localStorage.setItem('userName', user.name || 'User');
            localStorage.setItem('admin', isAdmin ? 'true' : 'false');
            this.isLoading = false;

            if (isAdmin) {
              const form = document.createElement('form');
              form.method = 'POST';
              form.action = '/login';

              const fields = {
                _token: document.querySelector('meta[name="csrf-token"]')?.content || '',
                email: this.email,
                password: this.password,
              };
              if (this.remember) {
                fields.remember = '1';
              }
              Object.entries(fields).forEach(([name, value]) => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = name;
                input.value = value;
                form.appendChild(input);
              });
              document.body.appendChild(form);
              form.submit();
              return;
            }

            this.$router.push('/home');

          })
          .catch(error => {
            this.isLoading = false;
            // Display error message to the user
            if (error.response && error.response.data) {
              const { data } = error.response;
              if (data.errors) {
                this.errors = data.errors;
              }
              this.errorMessage = data.message || 'An error occurred';
            }
          });
      },
      clearMessages() {
        // Clear success and error messages
        this.successMessage = '';
        this.errorMessage = '';
      },
    },
  };
  </script>
