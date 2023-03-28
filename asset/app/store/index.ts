/** @format */

import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

import AbstractStore from '@/app/store/modules/AbstractStore';
import Boards from '@/app/store/modules/Boards';
import BoardStapes from '@/app/store/modules/BoardStapes';
import BoardTasks from '@/app/store/modules/BoardTasks';
import Channels from '@/app/store/modules/Channels';

export default new Vuex.Store({
    devtools: 'production' !== process.env.NODE_ENV,
    strict: true,
    modules: {
        AbstractStore,
        Boards,
        BoardStapes,
        BoardTasks,
        Channels,
    },
});
