<template>
    <GuestLayout>
      <div
          class="auth-fixed auth-inset-0 auth-pointer-events-none auth-bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(49,152,220,0.15),rgba(10,14,20,0))]"
      ></div>
      <main class="auth-w-full auth-min-h-screen auth-relative auth-z-10 auth-flex auth-flex-col auth-items-center auth-justify-center">
          <div class="auth-flex auth-flex-col auth-w-full auth-min-h-screen auth-relative auth-items-center auth-justify-center auth-p-4 sm:auth-p-6 lg:auth-p-8">
              <!-- Dynamic Cinematic Dark Backdrop with Vignette -->
              <div class="auth-absolute auth-inset-0 auth-overflow-hidden auth-pointer-events-none auth-z-0">
                  <div
                      class="auth-w-full auth-h-full auth-bg-cover auth-bg-center auth-opacity-60 auth-scale-105 auth-filter auth-blur-sm"
                      data-alt="A cinematic action movie poster with a hero silhouetted in a neon-lit city at night"
                      style="
                          background-image: url(&quot;https://lh3.googleusercontent.com/aida-public/AB6AXuBHcqpZNuJhb8hJ1Wjhp0R_tMeZwU2Ca-zpkLv-yV709dG_llaGhteRVEHXwsh0VbUdW0L546AhdWl320wv62rmJvAKWqwkxa4-i0LnLnKIr4FYZiCTipgdFje0WPjX_C0Y5vV2qhgUVH1igIzZA_v3eulTkJki7F4tAKT4cGWaTKFv_DrLlStL7qBt4EoZoB2gV_t1I5zx7vZlXvdFJFHJAfAU-XKKq3Q525K2__RbihXucGyNE_ZizA&quot;);
                      "
                  ></div>
                  <!-- Dual Gradient Vignette for pure cinematic submersion -->
                  <div
                      class="auth-absolute auth-inset-0 auth-bg-gradient-to-t auth-from-surface-container-lowest auth-via-surface-container-lowest/45 auth-to-surface-container-lowest/30"
                  ></div>
                  <div
                      class="auth-absolute auth-inset-0 auth-bg-[radial-gradient(circle_at_center,transparent_0%,rgba(10,14,20,0.5)_80%)]"
                  ></div>
              </div>
              <!-- Registration Glass Card -->
              <div
                  class="auth-relative auth-z-10 auth-w-full auth-max-w-[480px] auth-bg-surface-container-low/95 auth-backdrop-blur-xl auth-rounded-xl auth-shadow-2xl auth-p-6 sm:auth-p-8 md:auth-p-10 auth-flex auth-flex-col auth-items-center"
              >
                  <!-- MovieHub Branding Badge -->
                  <div class="auth-flex auth-items-center auth-gap-space-sm auth-mb-4">
                      <router-link to="/" class="auth-flex auth-items-center auth-gap-2.5">
                          <div
                              class="auth-w-9 auth-h-9 auth-rounded-lg auth-bg-primary-container auth-flex auth-items-center auth-justify-center auth-shadow-[0_0_16px_rgba(49,152,220,0.35)] group-hover:auth-scale-105 auth-transition-transform"
                          >
                              <span class="material-symbols-outlined auth-text-white-container auth-text-[22px]">play_arrow</span>
                          </div>
                          <span
                              class="auth-font-headline-md auth-text-headline-md auth-tracking-tight auth-text-on-surface auth-flex auth-items-center auth-font-bold"
                          >
                              Movie<span class="auth-text-primary-container">Hub</span>
                          </span>
                      </router-link>
                  </div>
                  <!-- Title and Value Proposition -->
                  <div class="auth-text-center auth-mb-6">
                      <h1 class="auth-font-headline-sm auth-text-headline-sm auth-text-on-surface auth-font-semibold auth-tracking-tight">
                          Create your account
                      </h1>
                      <p class="auth-font-body-sm auth-text-body-sm auth-text-on-surface-variant auth-mt-1">
                          Start streaming blockbusters in 4K HDR
                      </p>
                  </div>
                  <!-- Registration Form -->
                  <form class="auth-w-full auth-flex auth-flex-col auth-gap-4" id="registerForm" onsubmit="event.preventDefault();">
                      <!-- Field: Full Name -->
                      <div class="auth-flex auth-flex-col auth-gap-1.5">
                          <label
                              class="auth-font-label-sm auth-text-label-sm auth-uppercase auth-tracking-wider auth-text-on-surface-variant auth-flex auth-items-center auth-gap-1"
                              for="fullName"
                          >
                              Full Name
                          </label>
                          <div class="auth-relative auth-flex auth-items-center">
                              <span
                                  class="material-symbols-outlined auth-absolute auth-left-3.5 auth-text-outline auth-text-[20px] auth-pointer-events-none"
                              >
                                  person
                              </span>
                              <input
                                  class="auth-w-full auth-h-11 auth-pl-11 auth-pr-4 auth-bg-surface-container auth-rounded-lg auth-font-body-md auth-text-body-md auth-text-on-surface placeholder:auth-text-outline-variant focus:auth-outline-none focus:auth-bg-surface-variant auth-transition-all auth-shadow-inner"
                                  id="fullName"
                                  placeholder="Enter your name"
                                  required=""
                                  type="text"
                              />
                          </div>
                      </div>
                      <!-- Field: Email / Mobile -->
                      <div class="auth-flex auth-flex-col auth-gap-1.5">
                          <label
                              class="auth-font-label-sm auth-text-label-sm auth-uppercase auth-tracking-wider auth-text-on-surface-variant auth-flex auth-items-center auth-gap-1"
                              for="identifier"
                          >
                              Email / Mobile Number
                          </label>
                          <div class="auth-relative auth-flex auth-items-center">
                              <span
                                  class="material-symbols-outlined auth-absolute auth-left-3.5 auth-text-outline auth-text-[20px] auth-pointer-events-none"
                              >
                                  mail
                              </span>
                              <input
                                  class="auth-w-full auth-h-11 auth-pl-11 auth-pr-4 auth-bg-surface-container auth-rounded-lg auth-font-body-md auth-text-body-md auth-text-on-surface placeholder:auth-text-outline-variant focus:auth-outline-none focus:auth-bg-surface-variant auth-transition-all auth-shadow-inner"
                                  id="identifier"
                                  placeholder="Enter your email or mobile number"
                                  required=""
                                  type="text"
                              />
                          </div>
                      </div>
                      <!-- Field: Password -->
                      <div class="auth-flex auth-flex-col auth-gap-1.5">
                          <label
                              class="auth-font-label-sm auth-text-label-sm auth-uppercase auth-tracking-wider auth-text-on-surface-variant auth-flex auth-items-center auth-justify-between"
                              for="password"
                          >
                              <span>Password</span>
                              <span class="auth-text-tertiary auth-font-label-sm auth-text-label-sm auth-lowercase auth-opacity-90">min. 8 chars</span>
                          </label>
                          <div class="auth-relative auth-flex auth-items-center">
                              <span
                                  class="material-symbols-outlined auth-absolute auth-left-3.5 auth-text-outline auth-text-[20px] auth-pointer-events-none"
                              >
                                  lock
                              </span>
                              <input
                                  class="auth-w-full auth-h-11 auth-pl-11 auth-pr-11 auth-bg-surface-container auth-rounded-lg auth-font-body-md auth-text-body-md auth-text-on-surface placeholder:auth-text-outline-variant focus:auth-outline-none focus:auth-bg-surface-variant auth-transition-all auth-shadow-inner"
                                  id="password"
                                  placeholder="Create a password"
                                  required=""
                                  type="password"
                              />
                              <button
                                  class="auth-absolute auth-right-3 auth-text-outline hover:auth-text-on-surface auth-transition-colors auth-p-1 auth-flex auth-items-center auth-justify-center"
                                  id="togglePassBtn"
                                  onclick="const p = document.getElementById('password'); const icon = document.getElementById('passIcon'); if(p.type === 'password'){ p.type = 'text'; icon.textContent = 'visibility'; } else { p.type = 'password'; icon.textContent = 'visibility_off'; }"
                                  type="button"
                              >
                                  <span class="material-symbols-outlined auth-text-[18px]" id="passIcon">visibility_off</span>
                              </button>
                          </div>
                      </div>
                      <!-- Field: Confirm Password -->
                      <div class="auth-flex auth-flex-col auth-gap-1.5">
                          <label
                              class="auth-font-label-sm auth-text-label-sm auth-uppercase auth-tracking-wider auth-text-on-surface-variant"
                              for="confirmPassword"
                          >
                              Confirm Password
                          </label>
                          <div class="auth-relative auth-flex auth-items-center">
                              <span
                                  class="material-symbols-outlined auth-absolute auth-left-3.5 auth-text-outline auth-text-[20px] auth-pointer-events-none"
                              >
                                  verified_user
                              </span>
                              <input
                                  class="auth-w-full auth-h-11 auth-pl-11 auth-pr-11 auth-bg-surface-container auth-rounded-lg auth-font-body-md auth-text-body-md auth-text-on-surface placeholder:auth-text-outline-variant focus:auth-outline-none focus:auth-bg-surface-variant auth-transition-all auth-shadow-inner"
                                  id="confirmPassword"
                                  placeholder="Confirm your password"
                                  required=""
                                  type="password"
                              />
                              <button
                                  class="auth-absolute auth-right-3 auth-text-outline hover:auth-text-on-surface auth-transition-colors auth-p-1 auth-flex auth-items-center auth-justify-center"
                                  id="toggleConfirmPassBtn"
                                  onclick="const p = document.getElementById('confirmPassword'); const icon = document.getElementById('confirmPassIcon'); if(p.type === 'password'){ p.type = 'text'; icon.textContent = 'visibility'; } else { p.type = 'password'; icon.textContent = 'visibility_off'; }"
                                  type="button"
                              >
                                  <span class="material-symbols-outlined auth-text-[18px]" id="confirmPassIcon"
                                      >visibility_off</span
                                  >
                              </button>
                          </div>
                      </div>
                      <!-- Terms & Conditions Consent -->
                      <label class="auth-flex auth-items-start auth-gap-2.5 auth-mt-1 auth-cursor-pointer auth-select-none auth-group">
                          <input
                              checked=""
                              class="auth-mt-1 auth-h-4 auth-w-4 auth-rounded auth-bg-surface-container auth-text-primary-container focus:auth-ring-0 focus:auth-outline-none auth-accent-primary-container auth-cursor-pointer"
                              id="termsCheckbox"
                              required=""
                              type="checkbox"
                          />
                          <span
                              class="auth-font-body-sm auth-text-body-sm auth-text-on-surface-variant group-hover:auth-text-on-surface auth-transition-colors auth-leading-snug"
                          >
                              I agree to the
                              <router-link class="auth-text-primary hover:auth-underline" to="/legal/terms">Terms of Service</router-link>,
                              <router-link class="auth-text-primary hover:auth-underline" to="/legal/licensing">Content Licensing Policy</router-link> and
                              <router-link class="auth-text-primary hover:auth-underline" to="/legal/privacy">Privacy Statement</router-link>.
                          </span>
                      </label>
                      <!-- Primary Action CTA -->
                      <button
                          class="auth-mt-3 auth-w-full auth-h-12 auth-rounded-full auth-bg-gradient-to-r auth-from-primary-container auth-via-primary-container auth-to-secondary-container auth-text-white auth-font-label-lg auth-text-label-lg auth-flex auth-items-center auth-justify-center auth-gap-2 auth-shadow-lg auth-shadow-primary-container/25 hover:auth-shadow-primary-container/40 active:auth-scale-[0.99] auth-transition-all auth-duration-200"
                          id="submitBtn"
                          type="submit"
                      >
                          <span>Register</span>
                          <span class="material-symbols-outlined auth-text-[18px]">arrow_forward</span>
                      </button>
                  </form>
                  <!-- Social / Secondary Sign-Up Options Separator -->
                  <div class="auth-relative auth-w-full auth-my-6 auth-flex auth-items-center auth-justify-center">
                      <div class="auth-absolute auth-inset-0 auth-flex auth-items-center">
                          <div class="auth-w-full auth-bg-surface-variant auth-h-[1px]"></div>
                      </div>
                      <span
                          class="auth-relative auth-bg-surface-container-low auth-px-3 auth-font-label-sm auth-text-label-sm auth-text-outline auth-uppercase auth-tracking-wider"
                      >
                          Instant Access
                      </span>
                  </div>
                  <!-- Quick Sign-Up Pills -->
                  <div class="auth-grid auth-grid-cols-2 auth-gap-3 auth-w-full auth-mb-6">
                      <button
                          class="auth-h-10 auth-px-3 auth-bg-surface-container hover:auth-bg-surface-variant auth-text-on-surface auth-font-label-md auth-text-label-md auth-rounded-lg auth-flex auth-items-center auth-justify-center auth-gap-2 auth-transition-colors"
                          type="button"
                      >
                          <svg class="auth-w-4 auth-h-4 auth-fill-current auth-text-primary" viewbox="0 0 24 24">
                              <path
                                  d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.761H12.545z"
                              ></path>
                          </svg>
                          <span>Google</span>
                      </button>
                      <button
                          class="auth-h-10 auth-px-3 auth-bg-surface-container hover:auth-bg-surface-variant auth-text-on-surface auth-font-label-md auth-text-label-md auth-rounded-lg auth-flex auth-items-center auth-justify-center auth-gap-2 auth-transition-colors"
                          type="button"
                      >
                          <svg class="auth-w-4 auth-h-4 auth-fill-current auth-text-on-surface" viewbox="0 0 24 24">
                              <path
                                  d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.37c.61-.75 1.04-1.8 1.01-2.87-.96.04-2.16.65-2.84 1.44-.54.62-1.01 1.68-.88 2.71 1.07.08 2.1-.53 2.71-1.28z"
                              ></path>
                          </svg>
                          <span>Apple ID</span>
                      </button>
                  </div>
                  <!-- Footer Prompt -->
                  <div class="auth-text-center">
                      <p class="auth-font-body-md auth-text-body-md auth-text-on-surface-variant">
                          Already have an account?
                          <router-link
                              class="auth-text-primary auth-font-semibold hover:auth-text-secondary hover:auth-underline auth-transition-colors auth-ml-1"
                              to="/login"
                          >
                              Login
                          </router-link>
                      </p>
                  </div>
                  <!-- Security & Quality Trust Badges -->
                  <div class="auth-mt-8 auth-pt-4 auth-w-full auth-flex auth-items-center auth-justify-center auth-gap-4 auth-text-on-surface-variant/60">
                      <div class="auth-flex auth-items-center auth-gap-1.5 auth-font-label-sm auth-text-label-sm auth-uppercase auth-tracking-wider">
                          <span class="material-symbols-outlined auth-text-[16px] auth-text-tertiary">lock</span>
                          <span>256-bit Encrypted</span>
                      </div>
                      <div class="auth-w-1 auth-h-1 auth-rounded-full auth-bg-outline-variant"></div>
                      <div class="auth-flex auth-items-center auth-gap-1.5 auth-font-label-sm auth-text-label-sm auth-uppercase auth-tracking-wider">
                          <span class="material-symbols-outlined auth-text-[16px] auth-text-primary">hd</span>
                          <span>Ultra HD Stream</span>
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
        formData: {
          first_name: '',
          last_name: '',
          email: '',
          password: '',
          password_confirmation: '',
        },
        errors: {},
        successMessage: '',
        errorMessage: '',
      };
    },
    methods: {
      register() {
        // Reset messages and errors
        this.successMessage = '';
        this.errorMessage = '';
        this.errors = {};

        // Call your register API
        axios.post('/api/register', this.formData)
          .then(response => {
            // Check the status field in the response
            if (response.data.status) {
              // Success
              this.successMessage = response.data.message;

              this.formData = {
                first_name: '',
                last_name: '',
                email: '',
                password: '',
                password_confirmation: '',
              };
            } else {
              // Error
              this.errorMessage = response.data.message;
              // Set validation errors
              if (response.data.errors) {
                this.errors = response.data.errors;
              }
            }
          })
          .catch(error => {
            // Handle error, show error messages, etc.
            console.error(error.response.data);

            if (error.response && error.response.data) {
              const { data } = error.response;
              if (data.errors) {
                this.errors = data.errors;
              }
            }
            // Display error message to the user
            this.errorMessage = error.response.data.message;
          });
      },
      clearMessages() {
        // Clear success and error messages
        this.successMessage = '';
        this.errorMessage = '';
      },
      isValidationError(message) {
        // Check if the error message contains a validation keyword
        return message.toLowerCase().includes('validation');
      },
    },
  };
  </script>
