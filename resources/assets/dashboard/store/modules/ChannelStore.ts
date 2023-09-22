/** @format */

import {Module, VuexModule} from 'vuex-module-decorators';

@Module({
    name: 'module/channel',
    namespaced: true,
    stateFactory: true,
})
export default class BoardStapes extends VuexModule {
}
