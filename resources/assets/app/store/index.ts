/** @format */

import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistence from 'vuex-persist';

import { AbstractModel } from '@/dashboard/store/models/AbstractModel';
import { MessageModel } from '@/dashboard/store/models/MessageModel';
import { WorkspaceModels } from '@/dashboard/store/models/WorkspaceModels';

Vue.use(Vuex);

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
