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
    async sign (context) {
        const response = await axios.get('/api/sign');
        const user = response.data || null;
        context.commit('setUser', user)
    },
    async signIn (context, data) {
        const response = await axios.post('/api/signin', data);
        context.commit('setUser', response.data);
    },
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