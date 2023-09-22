/** @format */

import {Module, VuexModule} from 'vuex-module-decorators';

@Module({
    name: 'module/country',
    namespaced: true,
    stateFactory: true,
})
export default class CountryStore extends VuexModule {
}
