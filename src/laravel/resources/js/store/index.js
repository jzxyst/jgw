import Vue from 'vue'
import Vuex from 'vuex'

import auth from './auth'
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        auth
    },
    plugins: [createPersistedState({storage: window.sessionStorage})]
})

export default store