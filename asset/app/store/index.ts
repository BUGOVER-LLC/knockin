/** @format */

import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistence from 'vuex-persist';

Vue.use(Vuex);

import { MessageModel } from './models/MessageModel';

export type ModulesState = {
    moduleMessage: MessageModel;
};
const vuexLocal = new VuexPersistence({
    storage: window.localStorage,
});
export default new Vuex.Store<ModulesState>({
    plugins: [vuexLocal.plugin],
});
