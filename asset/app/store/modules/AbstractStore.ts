/** @format */

import { Module, VuexModule } from 'vuex-module-decorators';

@Module({
    name: 'module/abstractStore',
    namespaced: true,
    stateFactory: true,
})
export default class AbstractStore extends VuexModule {}
