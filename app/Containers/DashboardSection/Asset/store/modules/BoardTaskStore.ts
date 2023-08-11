/** @format */

import { Module, VuexModule } from 'vuex-module-decorators';

@Module({
    name: 'module/boardTask',
    namespaced: true,
    stateFactory: true,
})
export default class BoardTaskStore extends VuexModule {}
