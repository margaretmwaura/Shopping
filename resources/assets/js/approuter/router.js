import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from "../components/Home";
import Landing from "../components/Landing";

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
        ],
        mode: 'history',
    }
);

export default router;
