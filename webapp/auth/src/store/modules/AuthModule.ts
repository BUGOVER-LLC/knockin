import { getModule, Module, VuexModule } from 'vuex-module-decorators';

import { AuthModel } from '@/store/models/AuthModel';

import store from '../index';
import modulesNames from '../moduleNames';

@Module({ dynamic: true, namespaced: true, store, name: modulesNames.authModule })
class AuthModule extends VuexModule {
    public _authDataCache: Record<string, AuthModel> = {};
}

export default getModule(AuthModule);
