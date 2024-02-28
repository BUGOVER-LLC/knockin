/** @format */

import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistence from 'vuex-persist';

import { AuthModel } from '@/auth/store/models/AuthModel';
import { WorkspaceModel } from '@/auth/store/models/WorkspaceModel';

Vue.use(Vuex);

export type ModulesState = {
    authModule: AuthModel;
    workspaceModule: WorkspaceModel;
};

const vuexLocal = new VuexPersistence({
    storage: window.localStorage,
});
export default new Vuex.Store<ModulesState>({
    plugins: [vuexLocal.plugin],
});
