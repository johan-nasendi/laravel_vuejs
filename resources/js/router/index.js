import Vue from "vue";

import VueRouter from "vue-router";
Vue.use(VueRouter)

const Home = require('../pages/Home.vue').default
const About = require('../pages/About.vue').default
const NotFound = require('../pages/NotFound.vue').default

const Login = require('../pages/Login.vue').default
const Register = require('../pages/Register.vue').default
const Dashboard = require('../pages/Dashboard.vue').default

const routes = [{

        name: 'Home',
        path: '/',
        component: Home
    },
    {
        path: '*',
        component: NotFound
    },
    {
        path: '/about',
        component: About
    },
    {
        name: 'Login',
        path: '/login',
        component: Login
    },
    {
        name: 'Register',
        path: '/register',
        component: Register
    },
    {
        name: 'Dashboard',
        path: '/dashboard',
        component: Dashboard,
        beforeEnter: (to, form, next) => {
            axios.get('/api/athenticated').then(() => {
                next()
            }).catch(() => {
                return next({ name: 'Login' })
            })
        }

    }

]
const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'font-semibold',
    routes
})

export default router