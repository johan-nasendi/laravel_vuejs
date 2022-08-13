require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './router/index'
import VueNoty from 'vuejs-noty'
import 'vuejs-noty/dist/vuejs-noty.css'

Vue.use(VueRouter)
Vue.use(VueNoty)

Vue.component('header-component', require('./components/Header.vue').default);

const app = new Vue({
    el: '#app',
    router
});