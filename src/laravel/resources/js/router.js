import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store'

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
        component: SignIn,
        beforeEnter (to, from, next) {
            if (store.getters['auth/check']) {
                next('/')
            } else {
                next()
            }
        }
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;