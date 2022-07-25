require('./bootstrap');

//Imports Libraries of npm
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//Imported Route file
import { routes } from "./routes/routes";

//Import User Class
import user from './helper/user';
window.user = user

import VueCompositionAPI from '@vue/composition-api' 
Vue.use(VueCompositionAPI)

const router = new VueRouter({
    mode: 'history',
    routes
})

//Const App view to load pages in components
const app = new Vue({
    router
}).$mount('#app')
