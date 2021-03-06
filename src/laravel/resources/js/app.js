import './bootstrap'
import Vue from 'vue'
import vuetify from './vuetify'
import router from './router'
import store from './store'
import App from './App.vue'

const initialize = async () => {

    new Vue({
        el: '#app',
        vuetify,
        router,
        store,
        components: { App },
        template: '<App />'
    });
};

initialize();
