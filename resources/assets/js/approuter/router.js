import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from "../components/Home";
import Landing from "../components/Landing";

import Dashboard from "../components/Dashboard/Dashboard";

Vue.use(VueRouter);

const router = new VueRouter(
    {
        routes: [
            {
                path: '/',
                component: Landing,
                name: 'home'
            },
            {
                path: '/signup',
                component: Home,
                name: 'signup'
            },
            {
                path: '/dashboard',
                component: Dashboard,
                name: 'dashboard'
            },
        ],
        mode: 'history',
    }
);

export default router;
