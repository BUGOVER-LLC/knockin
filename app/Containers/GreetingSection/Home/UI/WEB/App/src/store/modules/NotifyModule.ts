/** @format */

import Vue from 'vue';
import { Action, Module, Mutation, VuexModule, getModule } from 'vuex-module-decorators';

import store from '@/store';
import { NotifyModel, NotifyType } from '@/store/models/NotifyModel';
import modulesNames from '@/store/moduleNames';

@Module({ dynamic: true, namespaced: true, store, name: modulesNames.notifyModule })
class NotifyModule extends VuexModule {
    private readonly _notifyData: Record<string, NotifyModel> = {};

    @Mutation
    private fetchNotify(model: NotifyModel) {
        Vue.set(this._notifyData, 0, model);
    }

    @Action({ commit: 'fetchNotify', rawError: false })
    public notify(model: NotifyModel) {
        return model;
    }

    public get notification() {
        return this._notifyData[0] || { show: false, message: '', type: NotifyType.info };
    }
}

export default getModule(NotifyModule);
