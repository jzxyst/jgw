import Vue from 'vue'
import Vuex from 'vuex'

import global from './global'
import auth from './auth'
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        global,
        auth,
    },
    plugins: [createPersistedState({storage: window.sessionStorage})]
})

export default store