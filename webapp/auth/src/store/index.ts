import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistence from 'vuex-persist';

import { AuthModel } from '@/store/models/AuthModel';

Vue.use(Vuex);

interface ModulesState {
    auth: AuthModel;
}

const vuexLocal: VuexPersistence<object> = new VuexPersistence({
    storage: window.localStorage,
    strictMode: 'production' !== process.env.NODE_ENV,
    key: 'producerStore',
});
export default new Vuex.Store<ModulesState>({
    strict: 'production' !== process.env.NODE_ENV,
    devtools: 'production' !== process.env.NODE_ENV,
    plugins: [vuexLocal.plugin],
    mutations: {
        RESTORE_MUTATION: vuexLocal.RESTORE_MUTATION,
    },
});
