/** @format */

import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistence from 'vuex-persist';

import { AttributeModel } from '@/store/models/AttributeModel';
import { AuthModel } from '@/store/models/AuthModel';
import { HandlerModel } from '@/store/models/HandlerModel';
import { IRoleModel } from '@/store/models/IRoleModel';
import { NotifyModel } from '@/store/models/NotifyModel';
import { PermissionModel } from '@/store/models/PermissionModel';
import { ProfileModel } from '@/store/models/ProfileModel';
import { ResourceModel } from '@/store/models/ResourceModel';
import { RoomModel } from '@/store/models/RoomModel';
import { SystemModel } from '@/store/models/SystemModel';
import { UserModel } from '@/store/models/UserModel';

Vue.use(Vuex);

interface ModulesState {
    auth: AuthModel;
    notify: NotifyModel;
    permission: PermissionModel;
    role: IRoleModel;
    user: UserModel;
    profile: ProfileModel;
    attribute: AttributeModel;
    handler: HandlerModel;
    system: SystemModel;
    resource: ResourceModel;
    room: RoomModel;
}

const vuexLocal: VuexPersistence<object> = new VuexPersistence({
    storage: window.localStorage,
    strictMode: 'production' !== process.env.NODE_ENV,
    key: 'producerStore',
});
export default new Vuex.Store<ModulesState>({
    strict: 'production' !== process.env.NODE_ENV,
    plugins: [vuexLocal.plugin],
    mutations: {
        RESTORE_MUTATION: vuexLocal.RESTORE_MUTATION,
    },
});
