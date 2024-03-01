/** @format */

import { Action, Module, Mutation, VuexModule, getModule } from 'vuex-module-decorators';

import { SendCodeAuth, SendEmailAuth } from '@/auth/services/api/AuthApi';
import { AuthModel } from '@/auth/store/models/AuthModel';

import store from '../index';
import modulesNames from './../ModuleNames';

@Module({ dynamic: true, namespaced: true, store, name: modulesNames.authModule })
class AuthModule extends VuexModule implements AuthModel {
    public email: string = '';
    public acceptCode: string = '';
    public step: number = 1;

    @Mutation
    private fetchEmail(email: string) {
        this.email = email;
    }

    @Mutation
    private fetchCode(code: string) {
        this.acceptCode = code;
    }

    @Action({ rawError: true, commit: 'fetchEmail' })
    public async addEmail(email: string) {
        await SendEmailAuth(email);
        return email;
    }

    @Action({ rawError: true, commit: 'fetchCode' })
    public async addAcceptCode(acceptCode: string, email: string) {
        await SendCodeAuth(acceptCode, email);
        return acceptCode;
    }

    get authEmail() {
        return this.email;
    }

    get authCode() {
        return this.acceptCode;
    }

    get authStep() {
        return this.step;
    }
}

export default getModule(AuthModule);
