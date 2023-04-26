/** @format */

import axios from 'axios';
import Vue from 'vue';
import { Action, getModule, Module, Mutation, VuexModule } from 'vuex-module-decorators';

import store from '../index';

@Module({
    dynamic: true,
    name: 'module/message',
    namespaced: true,
    stateFactory: true,
    store,
})
class Workspace extends VuexModule {
    private payload = [];

    public get count() {
        return this.payload.length;
    }
}

export default getModule(Workspace);
