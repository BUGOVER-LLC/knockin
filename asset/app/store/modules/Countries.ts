/** @format */

import { Module, VuexModule } from 'vuex-module-decorators';

@Module({
    name: 'module/country',
    namespaced: true,
    stateFactory: true,
    dynamic: true,
})
export default class Countries extends VuexModule {}
