/** @format */

import { getModule, Module, VuexModule } from 'vuex-module-decorators';

import store from '../index';

@Module({
    dynamic: true,
    name: 'moduleWorkspace',
    namespaced: true,
    stateFactory: true,
    store,
})
class WorkspaceStore extends VuexModule {
    private payload = [];

    public get count() {
        return this.payload.length;
    }
}

export default getModule(WorkspaceStore);
