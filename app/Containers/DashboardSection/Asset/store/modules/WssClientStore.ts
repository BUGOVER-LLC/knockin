/** @format */

import {Module, VuexModule} from 'vuex-module-decorators';

@Module({
    name: 'moduleWss',
    namespaced: true,
    stateFactory: true,
})
export default class WssClientStore extends VuexModule {
    public emit = false;
}
