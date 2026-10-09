import {createWebHistory,createRouter} from 'vue-router'

import Login from '../components/auth/Login.vue';
import Register from '../components/auth/Register.vue';
import ForgetPassword from '../components/auth/ForgetPassword.vue';
import ResetPassword from '../components/auth/ResetPassword.vue';
import Dashboard from '../components/views/Dashboard.vue';
import Activation from '../components/auth/Activation.vue';
import Projects from '../components/views/Projects.vue';
import ChangePassword from '../components/views/ChangePassword.vue';
import Profile from '../components/views/Profile.vue';
import Settings from '../components/views/Settings.vue';
import User from '../components/views/User.vue';

const routes = [

    // AUTH ROUTES
    {
        path:'/',
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
    // AUTH ROUTES END
    {
        path:'/dashboard',
        component:Dashboard,
        meta: {
            title: 'Dashboard',
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
        path:'/settings',
        component: Settings,
        meta: {
            title: 'Settings',
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
    }

]

const router   = createRouter({
    history:createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('token');
    const isAdmin = localStorage.getItem('admin');

    const publicPages = ['/', '/register','/activation','/forget-password'];

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
    }else if (authRequired && isAdmin !== 'true') {
        next();  // Allow access for regular users
      } else {
        next(); // for admin user
      }
});


export default router;

