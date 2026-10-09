<template>
    <aside id="sidebar" class="sidebar">
        <img class="site_logo mb-4" :src="`${baseUrl}/backend/assets/img/siteLogo.svg`"  alt="">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <router-link class="nav-link collapsed fst-normal ps-1" to="/products" v-if="isAuthenticated">
                    <i class="bi bi-search"></i>
                    <span>Search (K + r)</span>
                </router-link>
            </li>
            <li class="mb-3 mt-3 ps-1">Collaboration</li>

            <li class="nav-item">
                <router-link class="nav-link collapsed fst-normal ps-1" to="/products" v-if="isAuthenticated">
                    <i class="bi bi-rocket-takeoff"></i>
                    <span>Projects</span>
                </router-link>
            </li>

            <li class="nav-item">
                <router-link class="nav-link collapsed fst-normal ps-1" to="/settings" v-if="isAuthenticated">
                    <i class="bi bi-person-fill"></i>
                    <span>Clients</span>
                </router-link>
            </li>

            <li class="mb-3 mt-4  ps-1">Products</li>

            <li class="nav-item">
                <router-link class="nav-link collapsed fst-normal ps-1" to="/change-password" v-if="isAuthenticated">
                    <i class="bi bi-headphones"></i>
                    <span>Portfolio Player</span>
                </router-link>
            </li>
            <hr class="mt-5 mb-5" />
            <li class="nav-item">
                <router-link class="nav-link collapsed fst-normal ps-1" to="/profile" v-if="isAuthenticated">
                    <i class="bi bi-person-circle"></i>
                    <span>Profile</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link collapsed fst-normal ps-1" to="/profile" v-if="isAuthenticated">
                    <i class="bi bi-credit-card-fill"></i>
                    <span>Billing</span>
                </router-link>
            </li>
            <li class="nav-item" v-if="isAuthenticated">
                <a class="nav-link collapsed fst-normal ps-1" @click="logout" style="cursor: pointer">
                    <i class="bi bi-person-walking"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>
</template>
<script>
import { isAuthenticated, redirectToLoginPage } from '../auth';
import { BASE_URL } from '../../config';
export default {
    data() {
        return {
            adminStatus: false,
            baseUrl:BASE_URL,
        };
    },
    mounted() {
        this.adminStatus = this.isAdmin();
    },
    methods: {
        isAdmin() {
            return localStorage.getItem('admin') === 'true';
        },
        isAuthenticated() {
            return isAuthenticated();
        },
        logout() {

            localStorage.removeItem("token");
            localStorage.removeItem("admin");
            localStorage.removeItem("userName");
            this.$router.push("/");
        },
    },
};
</script>
