/** @format */
import Vue from 'vue';
import { Action, Module, Mutation, VuexModule, getModule } from 'vuex-module-decorators';

import store from '@/auth/store';
import { WorkspaceModel } from '@/auth/store/models/WorkspaceModel';
import modulesNames from '@/auth/store/ModuleNames';

@Module({ dynamic: true, namespaced: true, store, name: modulesNames.workspaceModule })
class WorkspaceModule extends VuexModule {
    private workspaceList: Record<string, WorkspaceModel> = {};

    public get workspaces() {
        return this.workspaceList;
    }

    @Mutation
    private fetchWorkspace(payload: { name: string; uid: string; logo: string }) {
        Vue.set(this.workspaceList[payload.uid], payload.uid, payload);
    }

    @Action
    public addWorkspace() {}
}

export default getModule(WorkspaceModule);
