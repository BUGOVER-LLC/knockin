/** @format */

import { Module, VuexModule } from 'vuex-module-decorators';

@Module({
    name: 'module/personalMessage',
    namespaced: true,
    stateFactory: true,
    dynamic: true,
})
export default class PersonalMessages extends VuexModule {}
