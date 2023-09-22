/** @format */

import {Module, VuexModule} from 'vuex-module-decorators';

@Module({
    name: 'module/boardStape',
    namespaced: true,
    stateFactory: true,
})
export default class BoardStapeStore extends VuexModule {
}
