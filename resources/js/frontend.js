import { createApp } from 'vue';
import axios from 'axios';
import App from './App.vue';
import router from './router/router.js';
import '../css/frontend.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import { requestStarted, requestFinished } from './loader';

// Pass { silent: true } in an axios config to skip the global loader (e.g. polling)
axios.interceptors.request.use((config) => {
    if (!config.silent) {
        requestStarted();
    }
    return config;
}, (error) => Promise.reject(error));

axios.interceptors.response.use((response) => {
    if (!response.config.silent) {
        requestFinished();
    }
    return response;
}, (error) => {
    if (!error.config?.silent) {
        requestFinished();
    }
    return Promise.reject(error);
});

axios.interceptors.request.use((config) => {
    const token = localStorage.getItem('token');

    if (token && config.url?.startsWith('/api/')) {
        config.headers.Authorization = `Bearer ${token}`;
    }

    return config;
}, (error) => Promise.reject(error));

createApp(App).use(router).mount('#app');
