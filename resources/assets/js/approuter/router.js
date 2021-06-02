import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from "../components/Home";
import landing from "../components/Landing";

import products from "../components/Products/products";

import suppliers from "../components/Suppliers/suppliers";

import order from "../components/Order/order.vue";

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
                path: '/products',
                component: products,
                name: 'products'
            },
            {
                path: '/order',
                component: order,
                name: 'order'
            },

        ],
        mode: 'history',
    }
);

export default router;
