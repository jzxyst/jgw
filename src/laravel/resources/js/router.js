import Vue from 'vue'
import VueRouter from 'vue-router'

// Import page components.
import Dashboard from './pages/Dashboard.vue'
import SignIn from './pages/SignIn.vue'

// Use VueRouter plugin.
Vue.use(VueRouter);

// Mapping.
const routes = [
    {
        path: '/',
        component: Dashboard
    },
    {
        path: '/signin',
        component: SignIn
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;