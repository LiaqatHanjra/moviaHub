import { createRouter, createWebHistory } from 'vue-router';
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

const routes = [
    { path: '/home', component: LandingPage, meta: { title: 'Home' } },
    { path: '/browse', component: BrowsePage, meta: { title: 'Browse' } },
    { path: '/movies', component: MoviesPage, meta: { title: 'Movies' } },
    { path: '/movie/:id', component: MovieDetailPage, meta: { title: 'Movie' } },
    { path: '/watch/:id', component: WatchMoviePage, meta: { title: 'Watch' } },
    { path: '/categories', component: CategoriesPage, meta: { title: 'Categories' } },
    { path: '/my-movies', component: MyMoviesPage, meta: { title: 'My Movies' } },
    { path: '/wallet', component: WalletPage, meta: { title: 'Wallet' } },
    { path: '/subscribe', component: SubscribePage, meta: { title: 'Subscribe' } },
    { path: '/payment', component: PaymentPage, meta: { title: 'Payment' } },
    { path: '/payment/success', component: PaymentSuccessPage, meta: { title: 'Payment Success' } },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior() {
        return { top: 0 };
    },
});

router.afterEach((to) => {
    if (to.meta.title) {
        document.title = `MovieHub - ${to.meta.title}`;
    }
});

export default router;
