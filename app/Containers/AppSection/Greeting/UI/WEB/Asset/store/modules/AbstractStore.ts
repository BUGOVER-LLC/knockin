/** @format */

import { Action, Module, Mutation, VuexModule, getModule } from 'vuex-module-decorators';

import store from '@/store/index';
import { AbstractModel } from '@/store/models/AbstractModel';

@Module({
    name: 'moduleAbstract',
    namespaced: true,
    dynamic: true,
    stateFactory: true,
    store,
    preserveState: null !== localStorage.getItem('vuex'),
})
export default class AbstractStore extends VuexModule implements AbstractModel {
    public searchToggle = false;
    public searchBody = '';

    @Mutation
    private mutateTriggerSearch() {
        this.searchToggle = !this.searchToggle;
    }

    @Action({ rawError: true, commit: 'mutateTriggerSearch' })
    public initTriggerSearch() {
        console.log(this.searchToggle);
    }
}

export const AbstractModule = getModule(AbstractStore);
