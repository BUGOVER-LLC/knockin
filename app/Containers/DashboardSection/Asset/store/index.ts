/** @format */

import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistence from 'vuex-persist';

Vue.use(Vuex);

import { AbstractModel } from '@/store/models/AbstractModel';
import { MessageModel } from '@/store/models/MessageModel';
import { WorkspaceModels } from '@/store/models/WorkspaceModels';

export type ModulesState = {
    abstractModule: AbstractModel;
    moduleMessage: MessageModel;
    moduleWorkspace: WorkspaceModels;
};

const vuexLocal = new VuexPersistence({
    storage: window.localStorage,
});
export default new Vuex.Store<ModulesState>({
    plugins: [vuexLocal.plugin],
});
