let Login = require('../components/auth/Login.vue').default;
let Register = require('../components/auth/Register.vue').default;
let Forget = require('../components/auth/Forget.vue').default;
let Home = require('../components/home/Home.vue').default;
let Index = require('../components/storedata/Index.vue').default;
let Create = require('../components/storedata/Create.vue').default;
let Edit = require('../components/storedata/Edit.vue').default;

export const routes = [
    { path: '/', component: Login, name: '/' },
    { path: '/register', component: Register, name: 'register' },
    { path: '/forget', component: Forget, name: 'forget' },
    { path: '/home', component: Home, name: 'home' },
    { path: '/index', component: Index, name: 'index' },
    { path: '/create', component: Create, name: 'create' },
    { path: '/edit-data/:id', component: Edit, name: 'edit-data' }
]