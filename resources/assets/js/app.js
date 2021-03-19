import Vue from 'vue';
window.Vue = Vue;

require('./bootstrap');
require('./components');
import store from "./appstore/store";



import router from "./approuter/router";
import Notifications from 'vue-notification'

import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'

Vue.use(VueMaterial);
Vue.use(Notifications);


const app = new Vue({
    router,
    store,
    el: '#root',
});
