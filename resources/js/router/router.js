import {createWebHistory,createRouter} from 'vue-router'

import Login from '../components/auth/Login.vue';
import Register from '../components/auth/Register.vue';
import ForgetPassword from '../components/auth/ForgetPassword.vue';
import ResetPassword from '../components/auth/ResetPassword.vue';
import Dashboard from '../components/views/Dashboard.vue';
import Activation from '../components/auth/Activation.vue';
import ChangePassword from '../components/views/ChangePassword.vue';
import Profile from '../components/views/Profile.vue';
import Settings from '../components/views/Settings.vue';
import User from '../components/views/User.vue';
import LandingPage from '../components/views/pages/LandingPage.vue';
import BrowsePage from '../components/views/pages/BrowsePage.vue';
import MoviesPage from '../components/views/pages/MoviesPage.vue';
import MovieDetailPage from '../components/views/pages/MovieDetailPage.vue';
import WatchMoviePage from '../components/views/pages/WatchMoviePage.vue';
import CategoriesPage from '../components/views/pages/CategoriesPage.vue';
import MyMoviesPage from '../components/views/pages/MyMoviesPage.vue';
import WalletPage from '../components/views/pages/WalletPage.vue';
import SubscribePage from '../components/views/pages/SubscribePage.vue';
import PaymentPage from '../components/views/pages/PaymentPage.vue';
import PaymentSuccessPage from '../components/views/pages/PaymentSuccessPage.vue';



const routes = [

     {
        path:'/',
        component:BrowsePage,
        meta: {
            title: 'Browse Page',
            guest: true,
        },
    },
    {
        path:'/browse',
        component:BrowsePage,
        meta: {
            title: 'Browse Page',
            guest: true,
        },
    },
    {
        path:'/login',
        component:Login,
        meta: {
            title: 'Login',
            guest: true,
        },
    },
    {
        path:'/register',
        component:Register,
        meta: {
            title: 'Register',
            guest: true,
        },
    },
    {
        path:'/forget-password',
        component:ForgetPassword,
        meta: {
            title: 'Forget Password',
            guest: true,
        },
    },
    {
        path:'/reset-password/:token',
        component:ResetPassword,
        meta: {
            title: 'Reset Password',
            guest: true,
        },
    },
    {
        path: '/activation/:token',
        component: Activation,
        meta: {
            title: 'Activation',
            // guest: true,
        },
    },
    // END PUBLIC ROUTES

    // AUTH ROUTES Start
    {
        path:'/home',
        component:LandingPage,
        meta: {
            title: 'Landing Page',
            requiresAuth: true,
        },
    },
    {
        path:'/movies',
        component: MoviesPage,
        meta: {
            title: 'Movies',
            requiresAuth: true,
        },
    },
    {
        path:'/movie/:id',
        component: MovieDetailPage,
        meta: {
            title: 'Movie',
            requiresAuth: true,
        },
    },
    {
        path:'/watch/:id',
        component: WatchMoviePage,
        meta: {
            title: 'Watch Movie',
            requiresAuth: true,
        },
    },
    {
        path:'/categories',
        component: CategoriesPage,
        meta: {
            title: 'Categories',
            requiresAuth: true,
        },
    },
    {
        path:'/my-movies',
        component: MyMoviesPage,
        meta: {
            title: 'My Movies',
            requiresAuth: true,
        },
    },
    {
        path:'/wallet',
        component: WalletPage,
        meta: {
            title: 'Wallet',
            requiresAuth: true,
        },
    },
    {
        path:'/subscribe',
        component: SubscribePage,
        meta: {
            title: 'Subscribe',
            requiresAuth: true,
        },
    },
    {
        path:'/payment',
        component: PaymentPage,
        meta: {
            title: 'Payment',
            requiresAuth: true,
        },
    },
    {
        path:'/payment/success',
        component: PaymentSuccessPage,
        meta: {
            title: 'Payment Success',
            requiresAuth: true,
        },
    },
    {
        path:'/change-password',
        component: ChangePassword,
        meta: {
            title: 'Change Password',
            requiresAuth: true,
        },
    },
    {
        path:'/profile',
        component: Profile,
        meta: {
            title: 'Profile',
            requiresAuth: true,
        },
    },
    {
        path:'/users',
        component: User,
        meta: {
            title: 'User',
            requiresAuth: true,
        },
    },
    {
        path: '/:pathMatch(.*)*',
        redirect: '/',
    },

]

const router   = createRouter({
    history:createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('token');
    const isAdmin = localStorage.getItem('admin');

    const publicPages = ['/','/login','/register','/activation','/forget-password'];

    const authRequired = !publicPages.includes(to.path);

      // Handle specific routes with tokens
    if (to.path.startsWith('/activation') || to.path.startsWith('/reset-password')) {
        next();
        return;
    }

    // Redirect to login if authentication is required but no token is found
    if (authRequired && !token) {
        next('/');
        return;
    }

    if (authRequired && !token) {
        next('/');
    }else if (authRequired) {
        next();  // Allow access for regular users
      } else {
        next(); // for admin user
      }
});

router.afterEach((to) => {
    if (to.meta.title) {
        document.title = `MovieHub - ${to.meta.title}`;
    }
});


export default router;
