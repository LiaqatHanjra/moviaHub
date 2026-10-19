import { createApp } from 'vue';
import axios from 'axios';
import App from './App.vue';
import router from './router/router.js';
import '../css/frontend.css';

axios.interceptors.request.use((config) => {
    const token = localStorage.getItem('token');

    if (token && config.url?.startsWith('/api/')) {
        config.headers.Authorization = `Bearer ${token}`;
    }

    return config;
}, (error) => Promise.reject(error));

createApp(App).use(router).mount('#app');
