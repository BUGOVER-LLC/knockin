/** @format */

import { Module, VuexModule } from 'vuex-module-decorators';

@Module({
    name: 'module/participant',
    namespaced: true,
    stateFactory: true,
})
export default class ParticipantStore extends VuexModule {}
