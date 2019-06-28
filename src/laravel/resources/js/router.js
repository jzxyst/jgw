import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store'

// Import page components.
import Dashboard from './pages/Dashboard.vue'
import SignIn from './pages/SignIn.vue'
import NotFound from "./pages/errors/NotFound";
import DefaultLayout from "./components/layouts/DefaultLayout";

// Use VueRouter plugin.
Vue.use(VueRouter);

// Mapping.
const routes = [
    { path: '*', component: NotFound, meta: { isPublic: true } },
    {
        path: '/signin',
        component: SignIn,
        meta: { isPublic: true },
        beforeEnter (to, from, next) {
            if (store.getters['auth/isSignedIn']) {
                next('/')
            } else {
                next()
            }
        }
    },
    {
        path: '/',
        component: DefaultLayout,
        children: [
            { path: '/dashboard', component: Dashboard, alias: '/' }
        ]
    },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => !record.meta.isPublic) && !store.getters['auth/isSignedIn']) {
        next({ path: '/signin', query: { redirect: to.fullPath }});
    } else {
        next();
    }
});

export default router;