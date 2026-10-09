<template>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <img :src="`${baseUrl}/backend/assets/img/logo.png`" alt="Logo" />
        <span class="d-none d-lg-block">Admin Panel</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->


    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- End Search Icon-->


        <!-- End Notification Nav -->


        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3" v-if="isAuthenticated">
            <a href="#" class="icon header-dropdown" id="profileDropdown" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img :src="image ? `${baseUrl}${image}` : `${baseUrl}/backend/assets/img/image-box.svg`" class="header_image_section" alt="User Avatar" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdownMenu"
                      aria-labelledby="profileDropdown">
                      <li><a class="dropdown-item cursor-pointer" @click="profile">Profile</a></li>
                      <li><a class="dropdown-item cursor-pointer"  @click="changePassword">Change Password</a></li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item cursor-pointer" @click="logout">Logout</a></li>
            </ul>
            <!-- End Profile Dropdown Items -->
        </li>
        <!-- End Profile Nav -->
      </ul>
    </nav>
    <!-- End Icons Navigation -->
  </header>
</template>

<script>
import UserInfo from "../user-logged-in/UserInfo";
import { BASE_URL } from "../../config";
import { EventBus } from '../views/EventBus';
export default {
  mixins: [UserInfo],
  created() {
    this.fetchUserInfo();
  },
  data() {
    return {
      baseUrl: BASE_URL,
      isAuthenticated: false,
      user_name:'',
      image: '',
    };
  },
  mounted() {
        
        this.isAuthenticated = !!localStorage.getItem("token");
        this.user_name = localStorage.getItem("userName");
        EventBus.on('profileImageUpdated', this.updateProfileImage);
      },
      beforeUnmount() {
        EventBus.off('profileImageUpdated', this.updateProfileImage);
      },
  methods: {
    logout() {
      
      localStorage.removeItem("token");
      localStorage.removeItem("admin");
      localStorage.removeItem("userName");

      this.$router.push("/login");
    },
    updateProfileImage(newImageUrl) {
      this.image = `/uploads/${newImageUrl}`;
    },
    userProfile(){
      this.$router.push(`/profile`);
    },
    changePassword(){
      this.$router.push("/change-password");
    },
  },
};
</script>
<style>
.profile_image{
  width: 100%;
}
.header_image_section{
  width: 100%;
  height: 100%;
  border-radius: 100%; 
  object-fit: cover;
}
</style>