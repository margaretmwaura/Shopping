import Vue from 'vue';
window.Vue = Vue;

require('./bootstrap');
require('./components');

require('./../sass/app.scss');
import store from "./appstore/store";



import router from "./approuter/router";
import Notifications from 'vue-notification'

import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'

import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'

import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

Vue.use(VueToast);

Vue.use(VueMaterial);
Vue.use(Notifications);


const app = new Vue({
    router,
    store,
    el: '#root',
});
