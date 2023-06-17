/** @format */

import { Module, VuexModule } from 'vuex-module-decorators';

@Module({
    name: 'module/personalMessage',
    namespaced: true,
    stateFactory: true,
})
export default class PersonalMessageStore extends VuexModule {}
