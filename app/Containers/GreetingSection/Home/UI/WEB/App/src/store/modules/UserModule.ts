/** @format */

import { getModule, Module, VuexModule } from 'vuex-module-decorators';

import store from '@/store';
import modulesNames from '@/store/moduleNames';

@Module({ dynamic: true, namespaced: true, store, name: modulesNames.userModule })
class UserModule extends VuexModule {}

export default getModule(UserModule);
