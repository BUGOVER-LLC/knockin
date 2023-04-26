/** @format */

import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

import { MessageModel } from './models/MessageModel';

export type ModulesState = {
    messages: MessageModel;
};

export default new Vuex.Store<ModulesState>({});
