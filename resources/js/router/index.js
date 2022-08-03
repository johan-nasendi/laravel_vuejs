import Vue from "vue";

import VueRouter from "vue-router";
Vue.use(VueRouter)

const Home = require('../pages/Home.vue').default
const NotFount = require('../pages/NotFound.vue').default
const About = require('../pages/About.vue').default
const Signin = require('../pages/Login.vue').default
const AddUser = require('../pages/AddUser.vue').default
const AddEdit = require('../pages/EditUser.vue').default
const User = require('../pages/User.vue').default
const Profile = require('../pages/Profile.vue').default
const UploadPhoto = require('../pages/UploadPhoto.vue').default


const routes = [{
        name: 'Root',
        path: '/',
        component: Home
    },
    {
        path: '*',
        component: NotFount
    },
    {
        name: 'About',
        path: '/about',
        component: About
    },
    {
        name: 'Signin',
        path: '/signin',
        component: Signin
    },
    {
        name: 'AddUser',
        path: '/user/create',
        component: AddUser
    },
    {
        name: 'EditUser',
        path: '/user/:id/edit',
        component: AddEdit,
        props: true
    },
    {
        name: 'UploadPhoto',
        path: '/user/:id/photo',
        component: UploadPhoto,
        props: true
    },
    {
        name: 'User',
        path: '/user',
        component: User,
    },
    {
        name: 'Profile',
        path: '/user/:id',
        component: Profile,
        props: true
    },

]
const router = new VueRouter({
    linkActiveClass: 'active',
    mode: 'history',
    routes
})

export default router