import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from "../components/Home";
import landing from "../components/Landing";

import Overview from "../components/Overview/Overview";

import suppliers from "../components/Suppliers/suppliers";

import products from "../components/Products/Products";

Vue.use(VueRouter);


// This is bound to change we just have it as that for the purposes of making the GIF
const router = new VueRouter(
    {
        routes: [
            {
                path: '/',
                component: landing,
                name: 'home'
            },
            {
                path: '/signup',
                component: Home,
                name: 'signup'
            },
            {
                path: '/dashboard',
                component: suppliers,
                name: 'dashboard',
            },
            {
                path: '/suppliers',
                component: Overview,
                name: 'suppliers'
            },
            {
                path: '/products',
                component: products,
                name: 'products'
            },

        ],
        mode: 'history',
    }
);

export default router;
