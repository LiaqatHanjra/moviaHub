<template>
    <AppLayout>
      <main id="main" class="main">
        <div class="pagetitle">
          <h1>Users</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item">Users</li>
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
                    <button class="btn btn-primary" @click="showAddUserModal()">Add New User</button>
                   
                    <AlertMessage v-if="alertMessage" :message="alertMessage" :type="alertType" @close="clearAlertMessage" />
                   
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{ user.first_name }} {{ user.last_name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>
                                        <button class="btn btn-primary custom-btn" @click="editUser(user)" v-if="!user.deleted_at">Edit</button>
                                        <button class="btn btn-danger custom-btn" @click="openDeleteModal(user.id)" v-if="!user.deleted_at">Delete</button>
                                        <button class="btn btn-success custom-btn" @click="restoreUser(user.id)" v-if="user.deleted_at">Restore</button>
                                        <button class="btn btn-warning custom-btn" @click="openChangePasswordModal(user)" v-if="!user.deleted_at">Change Password</button>

                                    </td>
                                </tr>
                            </tbody>
                    </table>
                    
                    <!--Create/Edit User Modal Window -->
                    <div v-if="showUserModal" class="modal fade show d-block" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5>{{ selectedUser ? 'Edit User' : 'Add User' }}</h5>
                                <button type="button" class="close" @click="showUserModal = false" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form @submit.prevent="saveUser">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>First Name</label>
                                            <input type="text" v-model="userForm.first_name" class="form-control" required />
                                        </div>
                                        <div class="col-6">
                                            <label>Last Name</label>
                                            <input type="text" v-model="userForm.last_name" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" v-model="userForm.email" class="form-control" required :disabled="selectedUser !== null" />
                                    </div>
                                    <div class="form-group" v-if="!selectedUser">
                                        <label>Password</label>
                                        <input type="password" v-model="userForm.password" class="form-control" required />
                                    </div>
                                    <button type="button" class="btn btn-primary" @click="saveUser" :disabled="isLoading">
                                        <span v-if="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        <span v-if="!isLoading">{{ selectedUser ? 'Update' : 'Create' }}</span>
                                    </button>

                                </form>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!--End of create/Edit User Modal Window  -->

                    <!-- Change Password Modal -->
                    <div v-if="showChangePasswordModal" class="modal fade show d-block" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5>
                                        Change Password for 
                                        <span class="primary-text">{{ selectedUser.first_name }} {{ selectedUser.last_name }}</span>
                                    </h5>

                                    <button type="button" class="close" @click="showChangePasswordModal = false" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="updatePassword">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" v-model="newPassword" class="form-control" required />
                                            <div class="text-danger" v-if="formErrors.password">
                                                <!-- Display the first error for the password field -->
                                                {{ formErrors.password[0] }}
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" v-model="confirmPassword" class="form-control" required />
                                                <div class="text-danger" v-if="formErrors.confirm_password">
                                                    <div v-for="(error, index) in formErrors.confirm_password" :key="index">{{ error }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-warning" :disabled="isLoading">
                                            <span v-if="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            <span v-if="!isLoading">Update Password</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Modals -->

                    <!-- Delete Confirmation Modal -->
                    <div v-if="showDeleteModal" class="modal fade show d-block" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Delete</h5>
                                    <button type="button" class="close" @click="closeDeleteModal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this user?</p>
                                </div>
                                <div class="modal-footer">
                                    <button 
                                        type="button" 
                                        class="btn btn-secondary" 
                                        @click="showDeleteModal = false" 
                                        :disabled="isLoading">
                                        No
                                    </button>
                                    <button 
                                        type="button" 
                                        class="btn btn-danger" 
                                        @click="confirmDelete" 
                                        :disabled="isLoading">
                                        <span v-if="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        <span v-if="!isLoading">Yes</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Delete Confirmation Modal -->

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
import AlertMessage from "../views/AlertMessage.vue";
import { BASE_URL } from "../../config";
// import axios from "axios"; 

export default {
    components: {
        AppLayout,
        AlertMessage, 
    },
    data() {
        return {
        baseUrl: BASE_URL,
          users: [],
          showUserModal: false,
          showChangePasswordModal: false,
          showDeleteModal: false,
          userToDeleteId: null,
          selectedUser: null,
          userForm: {
            first_name: '',
            last_name: '',
            email: '',
            password: '',
          },
            newPassword: '',
            confirmPassword: '', 
            formErrors: {},
            isLoading: false,
            alertMessage: '',
            alertType: 'success',
        };
    },
    mounted() {
        this.fetchUsers();
    },
    methods: {
        fetchUsers() {
            axios.get('/api/admin/users')
                .then(response => {
                    this.users = response.data;
                })
                .catch(error => {
                    this.alertMessage = 'Error fetching users.';
                    this.alertType = 'danger';
                });
        },
        showAddUserModal() {
          this.selectedUser = null;
          this.userForm = { first_name: "",last_name: "", email: "", password: "" };
          this.showUserModal = true;
        },
        editUser(user) {
          this.selectedUser = user;
          this.userForm = { first_name: user.first_name, last_name: user.last_name, email: user.email };
          this.showUserModal = true;
        },
        saveUser() {
            this.isLoading = true;
            const url = this.selectedUser
                ? `api/admin/users/${this.selectedUser.id}`
                : "api/admin/users";
            const method = this.selectedUser ? "put" : "post";
            axios[method](url, {
                first_name: this.userForm.first_name,
                last_name: this.userForm.last_name,
                email: this.userForm.email,
                password: this.userForm.password,
            }).then(() => {
                this.showUserModal = false;
                this.alertMessage = this.selectedUser ? 'User updated successfully.' : 'User created successfully.';
                this.alertType = 'success';
                this.fetchUsers();
            }).catch((error) => {
                this.alertMessage = 'Error saving user.';
                this.alertType = 'danger';
            })
            .finally(() => {
                this.isLoading = false;
            });
        },
        openDeleteModal(userId) {
            this.userToDeleteId = userId;
            this.showDeleteModal = true;
        },
        closeDeleteModal() {
            this.showDeleteModal = false;
            this.userToDeleteId = null;
        },
        confirmDelete() {
            this.isLoading = true;
            axios.delete(`api/admin/users/${this.userToDeleteId}`)
                .then(() => {
                    this.alertMessage = 'User deleted successfully.';
                    this.alertType = 'success';
                    this.closeDeleteModal();
                    this.fetchUsers();
                    this.showDeleteModal = false; 
                })
                .catch((error) => {
                    this.alertMessage = 'Error deleting user.';
                    this.alertType = 'danger';
                })
                .finally(() => {
                    this.isLoading = false;
                });
        },
        restoreUser(userId) {
            axios.get(`api/admin/users/${userId}/restore`).then(() => {
                this.alertMessage = 'User restored successfully.';
                this.alertType = 'success';
                this.fetchUsers();
            }).catch((error) => {
                this.alertMessage = 'Error restoring user.';
                this.alertType = 'danger';
            });
        },
        openChangePasswordModal(user) {
          this.selectedUser = user;
          this.newPassword = '';
          this.showChangePasswordModal = true;
        },
        updatePassword() {
            this.isLoading = true;
            axios
                .put(`api/admin/users/${this.selectedUser.id}/change-password`, {
                    password: this.newPassword,
                    password_confirmation: this.confirmPassword, 
                })
                .then(() => {
                    this.showChangePasswordModal = false;
                    this.formErrors = {}; 
                    this.newPassword = ''; 
                    this.confirmPassword = ''; 
                    this.alertMessage = 'Password updated successfully.';
                    this.alertType = 'success';
                })
                .catch((error) => {
                    if (error.response && error.response.status === 422) {
                        this.formErrors = error.response.data.errors;
                    } else {
                        this.alertMessage = 'Error updating password.';
                        this.alertType = 'danger';
                    }
                })
                .finally(() => {
                    this.isLoading = false; 
                });
        },
        clearAlertMessage() {
            this.alertMessage = '';
        }

    },

};
</script>
<style>
.table {
  width: 100%;
  margin-top: 20px;
  }
  th, td {
  padding: 10px;
  text-align: left;
  }
 .modal {
  display: block;
  background: rgba(0, 0, 0, 0.5);
  }
.custom-btn {
    margin-right: 10px; 
}
.modal-dialog {
  margin: 10% auto;
  }
  .modal-content {
  padding: 20px;
  }
  .close {
  background: none;
  border: none;
  font-size: 24px;
  }
  .form-group {
  margin-bottom: 20px;
  }
  .btn {
    margin-right: 5px;
  }
.primary-text {
  color:  #007bff;
}

</style>