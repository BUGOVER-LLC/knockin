/** @format */

import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

import { MessageModel } from './models/MessageModel';

export type ModulesState = {
    moduleMessage: MessageModel;
};

export default new Vuex.Store<ModulesState>({});
