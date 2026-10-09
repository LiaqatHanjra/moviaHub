import './bootstrap';
import axios from 'axios';

import { createApp } from 'vue';

import router from './router/router'
import 'vue3-toastify/dist/index.css';

import App from './App.vue'

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const token = localStorage.getItem('token');

if (token) {
    axios.defaults.headers.common['Authorization'] = `${token}`;
}

axios.interceptors.request.use(function (config) {
    const token = localStorage.getItem('token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    
    return config;
}, function (error) {
    return Promise.reject(error);
});
const app = createApp(App)
    .use(router) // Use the router
    .mount('#app');
