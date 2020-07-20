import Vue from 'vue';
import Vuetify from 'vuetify';

Vue.use(Vuetify);

const vuetify = new Vuetify({
    icons: {
        iconfont: 'mdiSvg', // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4' || 'faSvg'
    },
});

export default vuetify;
