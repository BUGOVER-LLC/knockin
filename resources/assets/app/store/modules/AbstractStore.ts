/** @format */

import { Action, getModule, Module, Mutation, VuexModule } from 'vuex-module-decorators';

import store from '@/app/store/index';
import { AbstractModel } from '@/app/store/models/AbstractModel';

@Module({
    name: 'moduleAbstract',
    namespaced: true,
    dynamic: true,
    stateFactory: true,
    store,
    preserveState: null !== localStorage.getItem('vuex'),
})
export default class AbstractStore extends VuexModule implements AbstractModel {
    public searchToggle: boolean = false;
    public searchBody: string = '';

    @Action({ rawError: true, commit: 'mutateTriggerSearch' })
    public initTriggerSearch() {}

    @Mutation
    private mutateTriggerSearch() {
        this.searchToggle = !this.searchToggle;
    }
}

export const AbstractModule = getModule(AbstractStore);
