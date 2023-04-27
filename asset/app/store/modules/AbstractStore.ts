/** @format */

import { Module, VuexModule, getModule, Action, Mutation } from 'vuex-module-decorators';

import store from '../index';
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
    public searchToggle = false;
    public searchBody = '';

    @Mutation
    private mutateTriggerSearch() {
        this.searchToggle = !this.searchToggle;
    }

    @Action({ rawError: true, commit: 'mutateTriggerSearch' })
    public initTriggerSearch() {}

    public getToggle() {
        return this.searchToggle;
    }
}

export const AbstractModule = getModule(AbstractStore);
