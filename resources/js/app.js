require('./bootstrap');

import Vue from 'vue';
import router from './router'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret, faUpload, faArrowAltCircleLeft, faTrashAlt, faAdd, faInfoCircle, faSave, faEdit } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(
    faUserSecret,
    faArrowAltCircleLeft,
    faTrashAlt,
    faAdd,
    faInfoCircle,
    faSave,
    faEdit,
    faUpload
)

import VueNoty from 'vuejs-noty'
Vue.use(VueNoty)
import 'vuejs-noty/dist/vuejs-noty.css'

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);
Vue.component('font-awesome-icon', FontAwesomeIcon)

const app = new Vue({
    el: '#app',
    router
});