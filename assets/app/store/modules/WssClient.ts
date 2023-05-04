/** @format */

import { Module, VuexModule } from 'vuex-module-decorators';

@Module({
    name: 'moduleWss',
    namespaced: true,
    stateFactory: true,
})
export default class WssClient extends VuexModule {
    public emit = false;
}
