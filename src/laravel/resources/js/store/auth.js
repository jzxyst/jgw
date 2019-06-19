const state = {
    user: null
};

const getters = {
    isSignedIn: state => !!state.user,
};

const mutations = {
    setUser (state, user) {
        state.user = user;
    }
};

const actions = {

    /**
     * Call sign API.
     * @param context
     * @returns {Promise<void>}
     */
    async sign (context) {
        const response = await axios.get('/api/sign');
        const user = response.data || null;
        context.commit('setUser', user)
    },

    /**
     * Call sign in API.
     * @param context
     * @param data
     * @returns {Promise<void>}
     */
    async signIn (context, data) {
        const response = await axios.post('/api/signin', data);
        context.commit('setUser', response.data);
    },

    /**
     * Call sign out API.
     * @param context
     * @param data
     * @returns {Promise<void>}
     */
    async signOut (context, data) {
        const response = await axios.post('/api/signout', data);
        context.commit('setUser', null);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}