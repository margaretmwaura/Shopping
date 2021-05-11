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

import VueTelInput from 'vue-tel-input'
import 'vue-tel-input/dist/vue-tel-input.css'

import VModal from "vue-js-modal";
Vue.use(VModal);

Vue.use(VueTelInput);

Vue.use(VueToast);

Vue.use(VueMaterial);
Vue.use(Notifications);

Vue.config.productionTip = false;
const app = new Vue({
    router,
    store,
    el: '#root',
});
