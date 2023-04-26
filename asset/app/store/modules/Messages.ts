/** @format */

import { Action, Module, Mutation, VuexModule, getModule } from 'vuex-module-decorators';

import { MessageModel } from '@/app/store/models/MessageModel';

import store from '../index';

@Module({
    dynamic: true,
    name: 'module/message',
    namespaced: true,
    stateFactory: true,
    store,
})
class Messages extends VuexModule implements MessageModel {
    public payload = [];
    public detonate = 0;

    body = '';
    createdAt = '';
    targetId = '';
    in = false;
    out = true;
    viewed = false;
    edited = false;
    editedAt = null;
    discussion = null;
    type = '';

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

    @Action({ commit: 'mutateDetonator' })
    public async initMessage(payload) {
        this.mutateMessage(payload);
        // await axios.post('/noix/init-msg', payload);
    }
}

export const MessageModule = getModule(Messages);
