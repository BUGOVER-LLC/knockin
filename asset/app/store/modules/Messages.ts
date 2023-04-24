/** @format */

import axios from 'axios';
import { Action, getModule, Module, Mutation, VuexModule } from 'vuex-module-decorators';

import MessageModel from '@/app/store/models/MessageModel';

import store from '../index';

@Module({
    dynamic: true,
    name: 'module/message',
    namespaced: true,
    stateFactory: true,
    store,
})
class Messages extends VuexModule {
    private payload = [];

    @Mutation
    private mutateMessage(payload: MessageModel) {
        if (this.payload[payload.targetId]) {
            this.payload[payload.targetId].unshift(payload);
        } else {
            this.payload[payload.targetId] = [payload];
        }
    }

    @Action
    public async initMessage(payload) {
        this.mutateMessage(payload);
        await axios.post('init-msg', payload);
    }

    public get messages() {
        return this.payload;
    }
}

export default getModule(Messages);
