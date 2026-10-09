<template>
  <AppLayout>
    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Change Password</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item">Change Password</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="col-8 ">
                  <h5 class="card-title"></h5>
                  <form @submit.prevent="submitPassword">
                    <div class="form-fields row g-2 pb-3">
                      <div class="col-lg-8">
                        <label for="password">New Password</label>
                        <input
                          type="password"
                          class="form-control"
                          v-model="password"
                          placeholder="New Password"
                        />
                        <div v-if="errors.password" class="text text-danger">
                          {{ errors.password[0] }}
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <label for="password">Confirm Password</label>
                        <input
                          type="password"
                          class="form-control"
                          v-model="passwordConfirmation"
                          placeholder="Confirm Password"
                        />
                        <div v-if="errors.password_confirmation" class="text text-danger">
                          {{ errors.password_confirmation[0] }}
                        </div>
                      </div>
                    </div>

                    <div class="row g-2">
                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <button type="submit" :disabled="isLoading" class="btn btn-primary">
                          Submit
                          <span v-if="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </button>
                      </div>
                    </div>
                  </form>
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
import { toast } from 'vue3-toastify';
import { handleError } from '@/utils/useErrorHandler';
import { BASE_URL } from "../../config";

export default {
  components: {
    AppLayout,
  },
  data() {
    return {
      baseUrl: BASE_URL,
      password: "",
      passwordConfirmation: "",
      errors: {},
      isLoading: false,
    };
  },
  methods: {
    async submitPassword() {
        this.isLoading = true;

        if (this.password !== this.passwordConfirmation) {
            this.errors.password_confirmation = ["Passwords do not match"];
            this.isLoading = false;
            return;
        }

        axios
            .post(`/api/change-password`, {
            password: this.password,
            password_confirmation: this.passwordConfirmation,
            })
            .then((response) => {
            this.isLoading = false;
                toast(response.data.message, {
                    type: "success",
                    dangerouslyHTMLString: true
                });
            })
            .catch(error => {
                handleError(error.response);
            })
            .finally(() => {
                this.isLoading = false;  
            });
    },
  },
};
</script>
