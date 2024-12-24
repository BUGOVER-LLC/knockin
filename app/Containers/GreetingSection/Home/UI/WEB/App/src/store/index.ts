/** @format */

import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistence from 'vuex-persist';

import { UserModel } from '@/store/models/UserModel';

Vue.use(Vuex);

interface ModulesState {
    user: UserModel;
}

const vuexLocal: VuexPersistence<object> = new VuexPersistence({
    storage: window.localStorage,
    strictMode: 'production' !== process.env.NODE_ENV,
    key: 'producerStore',
});
export default new Vuex.Store<ModulesState>({
    strict: 'production' !== process.env.NODE_ENV,
    plugins: [vuexLocal.plugin],
    mutations: {
        RESTORE_MUTATION: vuexLocal.RESTORE_MUTATION,
    },
});
