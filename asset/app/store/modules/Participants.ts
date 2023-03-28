/** @format */

import { Module, VuexModule } from 'vuex-module-decorators';

@Module({
    name: 'module/participant',
    namespaced: true,
    stateFactory: true,
    dynamic: true,
})
export default class Participants extends VuexModule {}
