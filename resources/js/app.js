/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css';
import VueBootstrapToasts from "vue-bootstrap-toasts";
import ckeditor from "@ckeditor/ckeditor5-vue";

Vue.use(VueBootstrapToasts);
Vue.use(VueSweetalert2);
Vue.use(VueRouter);
Vue.use(Vuetify);
Vue.use(ckeditor);

import Posts from './components/admin/Posts.vue'
import Categories from './components/admin/Categories.vue'

import Users from './components/admin/Users.vue'
import Account from './components/admin/Account.vue'
import Profile from './components/admin/Profile.vue'




const router = new VueRouter ({
    mode : 'history',
    routes : [

        {
            path : '/admin/blog',
            component : Posts,
            name : 'blog'
        },
        {
            path: '/admin/categories',
            component: Categories,
            name: 'categories'
        },
        //===============================

        {
            path: '/admin/users',
            component: Users,
            name: 'users'
        },
        {
            path: '/admin/account',
            component: Account,
            name: 'account'
        },
        {
            path: '/admin/profile',
            component: Profile,
            name: 'profile'
        },
     
    ]

})

Vue.component('admin-navigation', require('./components/admin/Navigation.vue').default);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router
});
