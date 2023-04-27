/** @format */

import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistence from 'vuex-persist';

Vue.use(Vuex);

import { AbstractModel } from '@/app/store/models/AbstractModel';
import { MessageModel } from '@/app/store/models/MessageModel';

export type ModulesState = {
    abstractModule: AbstractModel;
    moduleMessage: MessageModel;
};

const vuexLocal = new VuexPersistence({
    storage: window.localStorage,
});
export default new Vuex.Store<ModulesState>({
    plugins: [vuexLocal.plugin],
});
