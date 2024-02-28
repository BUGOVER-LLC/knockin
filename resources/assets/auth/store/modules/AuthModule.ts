/** @format */

import { VuexModule } from 'vuex-module-decorators';

import { AuthModel } from '@/auth/store/models/AuthModel';

export default class AuthModule extends VuexModule implements AuthModel {
    public email: string = '';
    public acceptCode: string = '';
    public step: number = 1;
}
