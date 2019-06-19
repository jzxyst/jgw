const state = {
    user: null,
    api: {
        status: null,
        response: null,
        errors: null
    }
};

const getters = {
    isSignedIn: state => !!state.user,
    hasError: state => !!state.api.errors
};

const mutations = {
    setUser (state, user) {
        state.user = user;
    },
    setApiResponse (state, response) {
        state.api.status = response.status;
        state.api.response = response;
        state.api.errors = response.data.errors;
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
        try {
            const response = await axios.post('/api/signin', data);
            context.commit('setUser', response.data);
            context.commit('setApiResponse', response);
        }
        catch (error) {
            context.commit('setApiResponse', error.response);
        }
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