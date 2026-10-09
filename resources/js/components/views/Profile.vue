<template>
    <AppLayout>
      <main id="main" class="main">
        <div class="pagetitle">
          <h1>Profile</h1> 
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item">Profile</li>
            </ol>
          </nav>
        </div>
        <!-- End Page Title -->
  
        <section class="section">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Update Profile</h5>
                  <div class="col-8">
                    <!-- Success and Error Messages -->
                    <!-- <AlertMessage v-if="alertMessage" :message="alertMessage" :type="alertType" @close="clearAlertMessage" /> -->
                    <!-- Display Profile Image -->
                                  <div class="mb-3" style="position: relative;">
                                    <button
                                        v-if="previewImage"
                                        @click="removePreviewImage"
                                        class="remove-preview-btn"
                                    >
                                        &times;
                                    </button>
                                    <img
                                        :src="previewImage || (profile.image ? getImageUrl(profile.image) : `${baseUrl}/backend/assets/img/image-box.svg`)"
                                        alt="Profile Picture"
                                        class="profile-picture"
                                    />
                                </div>
  
                    <!-- Profile Form -->
                    <form @submit.prevent="updateProfile">
                      <!-- First Name and Last Name in a row -->
                      <div class="row">
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="first_name"
                              v-model="profile.first_name"
                              :class="{ 'is-invalid': errors.first_name }"
                            />
                            <div v-if="errors.first_name" class="invalid-feedback">
                              {{ errors.first_name[0] }}
                            </div>
                          </div>
                        </div>
  
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="last_name"
                              v-model="profile.last_name"
                              :class="{ 'is-invalid': errors.last_name }"
                            />
                            <div v-if="errors.last_name" class="invalid-feedback">
                              {{ errors.last_name[0] }}
                            </div>
                          </div>
                        </div>
                      </div>
  
                      <!-- Email Field -->
                      <div class="row">
                        <div class="col-md-8">
                          <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                              type="email"
                              class="form-control"
                              id="email"
                              v-model="profile.email"
                              :class="{ 'is-invalid': errors.email }"
                              disabled
                            />
                            <div v-if="errors.email" class="invalid-feedback">
                              {{ errors.email[0] }}
                            </div>
                          </div>
                        </div>
                      </div>
  
                      <!-- Profile Image Upload -->
                      <div class="row">
                      <div class="col-md-8">
                        <div class="mb-3">
                          <label for="image" class="form-label">Profile Image</label>
                          <input
                            type="file"
                            class="form-control"
                            id="image"
                            @change="handleImageUpload"
                            :class="{ 'is-invalid': errors.image }"
                          />
                          <div v-if="errors.image" class="invalid-feedback">
                            {{ errors.image[0] }}
                          </div>
                        </div>
                      </div>
                    </div>
  
                      <!-- Submit Button -->
                      <button type="submit" :disabled="isLoading"  class="btn btn-primary">
                          Update Profile
                          <span v-if="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      </button>
                    </form>
                    <!-- End Profile Form -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- End #main -->
    </AppLayout>
  </template>
  
  <script>
  import AppLayout from "../layouts/AppLayout.vue";
  import { BASE_URL } from "../../config";
  // import AlertMessage from "../views/AlertMessage.vue";
  import { EventBus } from "./EventBus";
  import { toast } from "vue3-toastify";
  import { handleError } from '@/utils/useErrorHandler';


  export default {
    components: {
      AppLayout,
      // AlertMessage, 
    },
    data() {
      return {
        baseUrl: BASE_URL,
        profile: {
          first_name: "",
          last_name: "",
          email: "",
          image: null, 
        },
        previewImage: null, 
        image: null, 
        file: null,  
        errors: {},
        // alertMessage: '',
        // alertType: 'success',
        isLoading: false,
      };
    },
    mounted() {
      this.getProfile();
    },
    methods: {
      // Fetch the profile data from the API
      getProfile() {
          axios.get("/api/profile")
              .then(response => {
                  this.profile = {
                      first_name: response.data.data.first_name,
                      last_name: response.data.data.last_name,
                      email: response.data.data.email,
                      image: response.data.data.image || null,
                  };
              })
              .catch(error => {
                  handleError(error.response);
              });
      },
  
      // Update the profile
      async updateProfile() {
          this.isLoading = true;
          this.errors = {};
        
          const formData = new FormData();
          formData.append("first_name", this.profile.first_name);
          formData.append("last_name", this.profile.last_name);
          formData.append("email", this.profile.email);
        
          if (this.profile.file) {
            formData.append('image', this.profile.file);
          }
          axios.post('/api/profile/update', formData)
          .then(response => {
              toast(response.data.message, {
                  type: "success",
                  dangerouslyHTMLString: true
              });
              const updatedImageUrl = response.data.data.profile.image;
              EventBus.emit('profileImageUpdated', updatedImageUrl);

              this.getProfile();
              this.isLoading= false;
                    
          })
          .catch(error => {
              handleError(error.response);
          })
          .finally(() => {
              this.isLoading = false;  
          });
      },
      handleImageUpload(event) {
        this.profile.file = event.target.files[0]; 
      },

      getImageUrl(image) {
        return `${this.baseUrl}/uploads/${image}`;
      },
      handleImageUpload(event) {
          const file = event.target.files[0];
          if (file) {
              this.previewImage = URL.createObjectURL(file);
              this.profile.file = file; // Keep the file for submission
          }
      },
            
      removePreviewImage() {
          this.previewImage = null;
          this.profile.file = null; // Clear the file for submission
      },
      // clearAlertMessage() {
      //   this.alertMessage = '';
      // },
    },
  };
  </script>
  