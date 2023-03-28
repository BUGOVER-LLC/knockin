/** @format */

import { Module, VuexModule } from 'vuex-module-decorators';

@Module({
    name: 'module/message',
    namespaced: true,
    stateFactory: true,
    dynamic: true,
})
export default class Messages extends VuexModule {}
