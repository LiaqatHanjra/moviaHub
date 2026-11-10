<template>
  <AppLayout>
    <Header />
    <main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100">
      <section class="mv-w-full mv-max-w-5xl mx-auto mv-px-margin-mobile mv-sm-px-margin mv-py-space-xl d-flex flex-column mv-gap-space-lg">
        <div>
          <h1 class="mv-font-headline-lg mv-text-headline-lg mv-font-bold mv-text-on-surface">Profile</h1>
          <p class="mv-font-body-md mv-text-body-md mv-text-on-surface-variant">
            View and manage your account details.
          </p>
        </div>

        <div v-if="loadError" class="alert alert-danger" role="alert">{{ loadError }}</div>
        <div v-if="isLoading" class="mv-text-on-surface-variant" role="status">Loading your profile...</div>

        <section
          v-else
          class="mv-bg-surface-container-low mv-rounded-xl mv-p-space-lg mv-shadow-md"
          aria-labelledby="profile-details-heading"
        >
          <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between mv-gap-space-md mb-4">
            <div class="d-flex align-items-center mv-gap-space-md">
              <img
                v-if="profile.profile_image"
                :src="profile.profile_image"
                alt="Profile"
                class="mv-w-16 mv-h-16 mv-rounded-full"
                style="object-fit: cover;"
              />
              <div
                v-else
                class="mv-w-16 mv-h-16 mv-rounded-full mv-bg-primary d-flex align-items-center justify-content-center mv-text-white mv-font-headline-sm"
                aria-hidden="true"
              >
                {{ userInitials }}
              </div>
              <div>
                <h2 id="profile-details-heading" class="mv-font-title-lg mv-text-title-lg mv-font-bold mv-text-on-surface mb-1">
                  {{ fullName || 'Your Profile' }}
                </h2>
                <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mb-0">{{ profile.email || 'No email address' }}</p>
              </div>
            </div>
            <button
              type="button"
              class="mv-bg-primary mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold mv-px-space-lg mv-py-3 mv-rounded-full"
              @click="openEditDialog"
            >
              <i class="align-middle me-1 bi bi-pencil"></i>
              Edit Profile
            </button>
          </div>

          <dl class="row mb-0">
            <div class="col-md-6 mb-3">
              <dt class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant">Phone</dt>
              <dd class="mv-font-body-md mv-text-body-md mv-text-on-surface mb-0">{{ profile.phone || 'Not provided' }}</dd>
            </div>
            <div class="col-md-6 mb-3">
              <dt class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant">Gender</dt>
              <dd class="mv-font-body-md mv-text-body-md mv-text-on-surface mb-0">{{ profile.gender || 'Not provided' }}</dd>
            </div>
            <div class="col-12">
              <dt class="mv-font-label-md mv-text-label-md mv-text-on-surface-variant">Address</dt>
              <dd class="mv-font-body-md mv-text-body-md mv-text-on-surface mb-0">{{ profile.address || 'Not provided' }}</dd>
            </div>
          </dl>
        </section>
      </section>
    </main>
    <Footer />

    <div
      v-if="showEditDialog"
      class="modal fade show d-block"
      tabindex="-1"
      role="dialog"
      aria-modal="true"
      aria-labelledby="edit-profile-title"
      @click.self="closeEditDialog"
      @keydown.esc="closeEditDialog"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content mv-bg-surface-container-low mv-text-on-surface">
          <div class="modal-header">
            <h2 id="edit-profile-title" class="modal-title fs-5">Edit Profile</h2>
            <button type="button" class="btn-close" aria-label="Close" @click="closeEditDialog"></button>
          </div>
          <form @submit.prevent="updateProfile">
            <div class="modal-body">
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="profileFirstName" class="form-label">First name</label>
                  <input
                    id="profileFirstName"
                    v-model="editProfile.first_name"
                    class="form-control"
                    type="text"
                    autocomplete="given-name"
                    required
                  />
                  <div v-if="errors.first_name" class="invalid-feedback d-block">{{ errors.first_name[0] }}</div>
                </div>
                <div class="col-md-6">
                  <label for="profileLastName" class="form-label">Last name</label>
                  <input
                    id="profileLastName"
                    v-model="editProfile.last_name"
                    class="form-control"
                    type="text"
                    autocomplete="family-name"
                  />
                  <div v-if="errors.last_name" class="invalid-feedback d-block">{{ errors.last_name[0] }}</div>
                </div>
                <div class="col-12">
                  <label for="profileEmail" class="form-label">Email</label>
                  <input id="profileEmail" :value="profile.email" class="form-control" type="email" disabled />
                </div>
                <div class="col-md-6">
                  <label for="profilePhone" class="form-label">Phone</label>
                  <input
                    id="profilePhone"
                    v-model="editProfile.phone"
                    class="form-control"
                    type="tel"
                    autocomplete="tel"
                  />
                  <div v-if="errors.phone" class="invalid-feedback d-block">{{ errors.phone[0] }}</div>
                </div>
                <div class="col-md-6">
                  <label for="profileGender" class="form-label">Gender</label>
                  <input id="profileGender" v-model="editProfile.gender" class="form-control" type="text" />
                  <div v-if="errors.gender" class="invalid-feedback d-block">{{ errors.gender[0] }}</div>
                </div>
                <div class="col-12">
                  <label for="profileAddress" class="form-label">Address</label>
                  <textarea
                    id="profileAddress"
                    v-model="editProfile.address"
                    class="form-control"
                    rows="3"
                    autocomplete="street-address"
                  ></textarea>
                  <div v-if="errors.address" class="invalid-feedback d-block">{{ errors.address[0] }}</div>
                </div>
                <div class="col-12">
                  <label for="profileImage" class="form-label">Profile image</label>
                  <input id="profileImage" class="form-control" type="file" accept="image/*" @change="handleImageUpload" />
                  <div v-if="errors.profile_image" class="invalid-feedback d-block">{{ errors.profile_image[0] }}</div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" :disabled="isSaving" @click="closeEditDialog">
                Cancel
              </button>
              <button
                type="submit"
                class="mv-bg-primary mv-text-white mv-font-label-lg mv-text-label-lg mv-font-bold mv-px-space-lg mv-py-3 mv-rounded-full"
                :disabled="isSaving"
              >
                Update Profile
                <span v-if="isSaving" class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div v-if="showEditDialog" class="modal-backdrop fade show"></div>

    <div
      v-if="showSuccessDialog"
      class="modal fade show d-block"
      tabindex="-1"
      role="dialog"
      aria-modal="true"
      aria-labelledby="profile-success-title"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content mv-bg-surface-container-low mv-text-on-surface">
          <div class="modal-header">
            <h2 id="profile-success-title" class="modal-title fs-5">Profile Updated</h2>
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
import { toast } from 'vue3-toastify';

const emptyProfile = () => ({
  first_name: '',
  last_name: '',
  email: '',
  phone: '',
  gender: '',
  address: '',
  profile_image: '',
});

export default {
  name: 'ProfilePage',
  components: { AppLayout, Header, Footer },
  data() {
    return {
      profile: emptyProfile(),
      editProfile: emptyProfile(),
      imageFile: null,
      errors: {},
      isLoading: true,
      isSaving: false,
      showEditDialog: false,
      showSuccessDialog: false,
      successMessage: '',
      loadError: '',
    };
  },
  computed: {
    fullName() {
      return `${this.profile.first_name} ${this.profile.last_name}`.trim();
    },
    userInitials() {
      return this.fullName
        .split(/\s+/)
        .filter(Boolean)
        .map((part) => part.charAt(0).toUpperCase())
        .slice(0, 2)
        .join('') || 'U';
    },
  },
  async mounted() {
    await this.fetchProfile();
  },
  methods: {
    async fetchProfile() {
      this.isLoading = true;
      this.loadError = '';

      try {
        const response = await axios.get('/api/profile');
        this.profile = { ...emptyProfile(), ...response.data };
      } catch (error) {
        this.loadError = error.response?.data?.message || 'Unable to load your profile. Please try again.';
      } finally {
        this.isLoading = false;
      }
    },
    openEditDialog() {
      this.editProfile = { ...this.profile };
      this.imageFile = null;
      this.errors = {};
      this.showEditDialog = true;
    },
    closeEditDialog() {
      if (!this.isSaving) {
        this.showEditDialog = false;
      }
    },
    closeSuccessDialog() {
      this.showSuccessDialog = false;
    },
    handleImageUpload(event) {
      this.imageFile = event.target.files?.[0] || null;
    },
    async updateProfile() {
      this.isSaving = true;
      this.errors = {};

      const formData = new FormData();
      ['first_name', 'last_name', 'phone', 'gender', 'address'].forEach((field) => {
        formData.append(field, this.editProfile[field] || '');
      });
      if (this.imageFile) {
        formData.append('profile_image', this.imageFile);
      }

      try {
        const response = await axios.post('/api/profile/update', formData);
        this.profile = { ...emptyProfile(), ...response.data.profile };
        localStorage.setItem('userName', this.fullName || 'User');
        if (response.data.profile.profile_image) {
          localStorage.setItem('userImage', response.data.profile.profile_image);
        }
        window.dispatchEvent(new Event('profile-updated'));
        this.successMessage = response.data.message || 'Your profile was updated successfully.';
        this.showEditDialog = false;
        this.showSuccessDialog = true;
      } catch (error) {
        this.errors = error.response?.data?.errors || {};
        if (!Object.keys(this.errors).length) {
          toast.error(error.response?.data?.message || 'Unable to update your profile. Please try again.');
        }
      } finally {
        this.isSaving = false;
      }
    },
  },
};
</script>
