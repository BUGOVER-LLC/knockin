/** @format */

import { Action, Module, Mutation, VuexModule, getModule } from 'vuex-module-decorators';

import { Profile, UpdateProfile } from '@/services/api/ProfileApi';
import store from '@/store';
import { ProfileModel } from '@/store/models/ProfileModel';
import modulesNames from '@/store/moduleNames';

@Module({ dynamic: true, namespaced: true, store, name: modulesNames.profileModule })
class ProfileModule extends VuexModule {
    private _profile: ProfileModel;

    @Mutation
    private fetchProfile(profile: ProfileModel) {
        this._profile = profile;
    }

    @Action({ rawError: true })
    public async editProfile(profile: ProfileModel) {
        const res = await UpdateProfile(profile);
        this.fetchProfile(res);
    }

    @Action({ rawError: true })
    public addProfileData(profile: ProfileModel) {
        this.fetchProfile(profile);
    }

    @Action({ rawError: true })
    public async emitProfileData() {
        const result = await Profile();
        this.fetchProfile(result);
    }

    public get profile(): ProfileModel {
        return this._profile;
    }
}

export default getModule(ProfileModule);
