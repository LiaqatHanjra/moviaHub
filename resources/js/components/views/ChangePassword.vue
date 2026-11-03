<template>
  <AppLayout>
    <Header />
    <main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100">
      <section class="mv-w-full mv-max-w-3xl mx-auto mv-px-margin-mobile mv-sm-px-margin mv-py-space-xl mv-gap-space-lg">
        <div class="mb-4">
          <h1 class="mv-font-headline-lg mv-text-headline-lg mv-font-bold mv-text-on-surface">Reset Password</h1>
          <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant">
            Enter your current password and choose a new one.
          </p>
        </div>

        <form
          class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-lg mv-shadow-md"
          @submit.prevent="submitPassword"
        >
          <div v-if="errorMessage" class="alert alert-danger" role="alert">{{ errorMessage }}</div>
          <div class="mb-3">
            <label for="currentPassword" class="form-label">Current password</label>
            <input
              id="currentPassword"
              v-model="currentPassword"
              class="form-control"
              type="password"
              autocomplete="current-password"
              required
            />
            <div v-if="errors.old_password" class="invalid-feedback d-block">{{ errors.old_password[0] }}</div>
          </div>
          <div class="mb-3">
            <label for="newPassword" class="form-label">New password</label>
            <input
              id="newPassword"
              v-model="password"
              class="form-control"
              type="password"
              autocomplete="new-password"
              required
            />
            <div v-if="errors.password" class="invalid-feedback d-block">{{ errors.password[0] }}</div>
          </div>
          <div class="mb-4">
            <label for="confirmPassword" class="form-label">Confirm new password</label>
            <input
              id="confirmPassword"
              v-model="passwordConfirmation"
              class="form-control"
              type="password"
              autocomplete="new-password"
              required
            />
          </div>
          <button
            type="submit"
            class="mv-bg-primary mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold mv-px-space-lg mv-py-3 mv-rounded-full"
            :disabled="isLoading"
          >
            Update Password
            <span v-if="isLoading" class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>
          </button>
        </form>
      </section>
    </main>
    <Footer />

    <div
      v-if="showSuccessDialog"
      class="modal fade show d-block"
      tabindex="-1"
      role="dialog"
      aria-modal="true"
      aria-labelledby="password-success-title"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content mv-bg-surface-container-low mv-text-on-surface">
          <div class="modal-header">
            <h2 id="password-success-title" class="modal-title fs-5">Password Updated</h2>
            <button type="button" class="btn-close" aria-label="Close" @click="closeSuccessDialog"></button>
          </div>
          <div class="modal-body">
            <p class="mb-0">{{ successMessage }}</p>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="mv-bg-primary mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold mv-px-space-lg mv-py-3 mv-rounded-full"
              @click="closeSuccessDialog"
            >
              Done
            </button>
          </div>
        </div>
      </div>
    </div>
    <div v-if="showSuccessDialog" class="modal-backdrop fade show"></div>
  </AppLayout>
</template>

<script>
import axios from 'axios';
import AppLayout from '../layouts/AppLayout.vue';
import Header from '../layouts/SiteMenu.vue';
import Footer from '../layouts/SiteFooter.vue';

export default {
  name: 'ChangePasswordPage',
  components: { AppLayout, Header, Footer },
  data() {
    return {
      currentPassword: '',
      password: '',
      passwordConfirmation: '',
      errors: {},
      errorMessage: '',
      isLoading: false,
      showSuccessDialog: false,
      successMessage: '',
    };
  },
  methods: {
    closeSuccessDialog() {
      this.showSuccessDialog = false;
    },
    async submitPassword() {
      this.isLoading = true;
      this.errors = {};
      this.errorMessage = '';

      try {
        const response = await axios.post('/api/change-password', {
          old_password: this.currentPassword,
          password: this.password,
          password_confirmation: this.passwordConfirmation,
        });
        this.currentPassword = '';
        this.password = '';
        this.passwordConfirmation = '';
        this.successMessage = response.data.message || 'Your password was changed successfully.';
        this.showSuccessDialog = true;
      } catch (error) {
        this.errors = error.response?.data?.errors || {};
        this.errorMessage = error.response?.data?.message || 'Unable to update your password. Please try again.';
      } finally {
        this.isLoading = false;
      }
    },
  },
};
</script>
