/** @format */

import { Module, VuexModule } from 'vuex-module-decorators';

@Module({
    name: 'module/board',
    namespaced: true,
    stateFactory: true,
})
export default class Boards extends VuexModule {}
