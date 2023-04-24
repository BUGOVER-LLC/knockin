/** @format */

import axios from 'axios';
import Vue from 'vue';
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
    private detonate = 1;

    @Mutation
    private mutateMessage(payload: MessageModel) {
        if (this.payload[payload.targetId]) {
            // this.payload = { ...this.payload[payload.targetId], ...payload };
            // Vue.set(this.payload, payload.targetId, payload);
            this.payload[payload.targetId].unshift(payload);
        } else {
            // Vue.set(this.payload, payload.targetId, [payload]);
            this.payload[payload.targetId] = [payload];
            // this.payload = { ...this.payload, ...payload };
        }
    }

    @Mutation
    private mutateDetonator() {
        this.detonate += 1;
    }

    @Action
    public async initMessage(payload) {
        this.mutateMessage(payload);
        this.mutateDetonator();
        await axios.post('/noix/init-msg', payload);
    }

    public get messages() {
        return this.payload['target-1'];
    }

    public get detonator() {
        return this.detonate;
    }
}

export default getModule(Messages);
