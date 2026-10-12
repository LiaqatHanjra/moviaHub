import { createRouter, createWebHistory } from 'vue-router';
import { isLoggedIn } from './auth';
import LandingPage from './pages/LandingPage.vue';
import BrowsePage from './pages/BrowsePage.vue';
import MoviesPage from './pages/MoviesPage.vue';
import MovieDetailPage from './pages/MovieDetailPage.vue';
import WatchMoviePage from './pages/WatchMoviePage.vue';
import CategoriesPage from './pages/CategoriesPage.vue';
import MyMoviesPage from './pages/MyMoviesPage.vue';
import WalletPage from './pages/WalletPage.vue';
import SubscribePage from './pages/SubscribePage.vue';
import PaymentPage from './pages/PaymentPage.vue';
import PaymentSuccessPage from './pages/PaymentSuccessPage.vue';

const publicPage = (title) => ({ title, layout: 'public' });
const authPage = (title) => ({ title, layout: 'auth', requiresAuth: true });

const routes = [
    { path: '/', component: BrowsePage, meta: publicPage('Browse') },
    { path: '/browse', component: BrowsePage, meta: publicPage('Browse') },
    { path: '/home', component: LandingPage, meta: publicPage('Home') },
    { path: '/movies', component: MoviesPage, meta: publicPage('Movies') },
    { path: '/movie/:id', component: MovieDetailPage, meta: publicPage('Movie') },
    { path: '/categories', component: CategoriesPage, meta: publicPage('Categories') },
    { path: '/subscribe', component: SubscribePage, meta: publicPage('Subscribe') },
    { path: '/watch/:id', component: WatchMoviePage, meta: publicPage('Watch') },
    { path: '/my-movies', component: MyMoviesPage, meta: authPage('My Movies') },
    { path: '/wallet', component: WalletPage, meta: authPage('Wallet') },
    { path: '/payment', component: PaymentPage, meta: authPage('Payment') },
    { path: '/payment/success', component: PaymentSuccessPage, meta: authPage('Payment Success') },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior() {
        return { top: 0 };
    },
});

router.beforeEach((to) => {
    if (to.meta.requiresAuth && !isLoggedIn()) {
        const next = encodeURIComponent(to.fullPath);
        window.location.assign(`/login?next=${next}`);
        return false;
    }

    return true;
});

router.afterEach((to) => {
    if (to.meta.title) {
        document.title = `MovieHub - ${to.meta.title}`;
    }
});

export default router;
