require('./bootstrap');

//Imports Libraries of npm
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//Imported Route file
import { routes } from "./routes";

const router = new VueRouter({
    mode: 'history',
    routes
})

//Const App view to load pages in components
const app = new Vue({
    router
}).$mount('#app')
