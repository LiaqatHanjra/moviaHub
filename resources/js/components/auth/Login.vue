<template>
    <GuestLayout>
      <div class="card mb-3">
        <div class="card-body">
            <p></p>
          <div v-if="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ successMessage }}
            <button type="button" class="btn-close" @click="clearMessages" aria-label="Close"></button>
          </div>

          <!-- <div v-if="errorMessage" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ errorMessage }}
            <button type="button" class="btn-close" @click="clearMessages" aria-label="Close"></button>
          </div> -->
          <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
            <p class="text-center small">Enter your email & password to login</p>
        </div>

          <form @submit.prevent="login" class="row g-3 needs-validation" novalidate>
            <div class="col-12">
              <label for="yourUsername" class="form-label">Email</label>
                <input v-model="formData.email" type="text" name="email" class="form-control" id="yourUsername" required>
                <div v-if="errors.email" class="text-danger text-sm">{{ errors.email[0] }}</div>
            </div>

            <div class="col-12">
              <label for="yourPassword" class="form-label">Password</label>
              <input v-model="formData.password" type="password" name="password" class="form-control" id="yourPassword" required>
              <div v-if="errors.password" class="text-danger text-sm">{{ errors.password[0] }}</div>
            </div>

            <div class="col-12">
              <button class="btn btn-primary w-100" type="submit">Login</button>
            </div>
          </form>
          <div class="col-12">
            <p class="small mb-0">Forget Password? <router-link to="/forget-password"> Forget Password
                </router-link></p>
            <p class="small mb-0">Don't have account? <router-link to="/register">
                    Create an account
                </router-link>
            </p>
        </div>
        </div>
      </div>
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
        formData: {
          email: '',
          password: '',
        },
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
        axios.post('/api/login', this.formData)
          .then(response => {

            localStorage.setItem('token', 'Bearer '+ response.data.access_token);

            const userName = response.data.user.name || 'User';
            localStorage.setItem('userName', userName);

            if( response.data.user.admin == 1){
              localStorage.setItem('admin', true );
            }else {
              localStorage.setItem('admin', false );
            }

            this.isLoading = false;
            this.$router.push('/dashboard');

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
