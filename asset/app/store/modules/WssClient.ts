/** @format */

import { Module, VuexModule } from 'vuex-module-decorators';

@Module({
    name: 'module/wss',
    namespaced: true,
    stateFactory: true,
    dynamic: true,
})
export default class WssClient extends VuexModule {}
