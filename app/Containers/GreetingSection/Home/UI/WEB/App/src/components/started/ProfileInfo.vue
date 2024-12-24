<!-- @format -->

<template>
    <v-navigation-drawer right app width="400px" absolute bottom>
        <v-container fluid>
            <v-img
                class=""
                height="200px"
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAZlBMVEX////13Kr/677cvpHrzZv126n/6bn75bbjxpjgw5X88+P12qXt0J7v06Djx5j/673v1KX237D/7cTqypT/78v/89r/8ND/+e3/+/P//fn/+vD/9uL/7sf/8tb/9d7/+/H26dT458bI+ThNAAAEeElEQVR4nO2d6ZqiMBBFkWnQBkfGXdyafv+XHNxQQkhhSMjiPX/T8uV09FIFGIMAAAAAAAAAAAAAAHweySqMw1ViehraSMI4C8Mwi0M/HbeLOHwQL7amp6Oc3eq6fg+yeLUzPSWl5Kea383xlJueljrWDb+b49n0xBRxCHl+V8fwYHpyCngNmCbuRw4TMLy3qtORk28Iv5vjxtnIaQZoi2O2Nj1VKQ5ZN7+bo3uRs20NUD6uRc7+2PEN+rKMLkVOTgVom6MrkdM1YDiOTkTOmfAbE+toeyWXEAEzHkUjwtHq5rGs0ISC2eiG+I/sjVWqQsvmowdzwtHKWOW0gHWefldH4d/a2DySAVN+AF8hP46WRQ4dMDyoyLGnkusaME3E/xdbIodsAeetgk5EDh0wkUCw/DxSkWO6klsTLRIbMBxF6uNotJKjWkDar5ujqcgRX2NqC1A+hKORyPkhK5gu61etIxU5x/3AftQ1pkwUoHzsihwqQMfvrF8FVeWcBvNTEzBN6MgZppJLFjIVmqJ1HKB53EtXaF0x2zxqCJgmZCWnL3LebAH1OepqHs+aAqaJmchpvwuo2q+To/LmUb4FlEdcE6qNnF4toDxUlaOseSTvAurx6+KoppLr3wL2QX/zqKtC64ru5lFlCyiP2LFP5PwQdwGVVDBdIJvHHyk/gwHDcRTORC5y9LSA0kSqm0fTAcNRVFrJyV2k14+q5lF/CygP1Tx2uV5FPmYwZMA0ISs5KnIGawH1OYqbx+FaQHn6RA7dAtqCXCVHVWgmA6bJ+3ce6ccMIvNv0CcReRuAaR7pB0FlH3PSBzXhWiVHtYBu8mwe33kQ1C3ukXMUB4zbxMfLO9T0LLRSnhwXpuegl2wRmJ6CdmDoPjB0nw8wJO7Ku055tjj4XNKURU1Zt3X5fpmrlA3GpTDdn8e+cr5fe8vTyE/Sqv9NTbfsmkhzGLpOZRiYnok2qus0hZ+LmL5cGi5S/xzTtH5LMZn+qzG9M5tcmU353IcnbcN3BhlmBNhbbfvlF5c/d/ijFg8v2Rtt/htuvTNk71zsvDNsPPRm3xx7DrOCQcFdxO/HYb65R7F3eFk0DIPiq+lYHYV/HGuHl18cwcs5cTSvuJwzXw5yYcacUpnhiXj4+73hiXh4xhl+mXzbYycJU9goNWSHCQUJwyepB4biYRjCEIYwhCEMYQhDGMIQhjCEIQxhCEMYwhCGMIQhDGEIQxjCEIYwhCEMYQhDGMIQhjCEIQxhCEMYwhCGMIQhDGEIQxjCEIYwhCEMYQhDGH6uYdTLkH01ZRiJh5lXs98Drr+6xdD7b6sTOw7MeKNu7TjAPYrV20IQw6wgdm+xT+Hd3Vv8X0PvDfNi+pfLY7sp/qjFw9Oi9ksev17uZvb7FDz553fhZcM201PRRvUh9HMJP2rvS/8NA2932b0bbtemNzTWxvpaulG/QuYy192u/d+x3P9d501PQTswdB8Yuk+w8TxLN8HO4xP+5ZfX8usvH/rLqrGbMAAAAAAAAAAAAAAwxH/+sGhCmE7SHgAAAABJRU5ErkJggg=="
            >
            </v-img>
            <v-row justify="center">
                <v-col align-self="start" class="d-flex justify-center align-center pa-0" cols="12">
                    <v-avatar class="profile avatar-center-heigth avatar-shadow" color="grey" size="164">
                        <v-btn class="upload-btn" x-large icon>
                            <v-icon> mdi-camera</v-icon>
                        </v-btn>
                        <input ref="uploader" class="d-none" type="file" accept="image/*" />
                    </v-avatar>
                </v-col>
            </v-row>

            <v-card-subtitle>
                <b class="ml-2"></b>
                <v-btn icon>
                    <v-icon small />
                </v-btn>
            </v-card-subtitle>

            <ValidationObserver ref="profileForm" v-slot="{ invalid, validated, handleSubmit, validate }">
                <v-form autocomplete="off">
                    <ValidationProvider rules="required|max:50|min:3" name="profileEmail" v-slot="{ errors, valid }">
                        <v-text-field
                            :label="$t('words.email')"
                            class="pa-2"
                            prepend-inner-icon="mdi-email"
                            :value="profile.email"
                            :error-messages="errors"
                            readonly
                            disabled
                        />
                        <v-spacer />
                    </ValidationProvider>
                    <v-text-field
                        readonly
                        disabled
                        class="pa-2"
                        prepend-inner-icon="mdi-lock"
                        :label="$t('words.password')"
                        type="password"
                        :value="profile.password"
                    />
                    <v-switch
                        v-model="isUpdatePassword"
                        dense
                        inset
                        class="pa-2"
                        :label="$t('words.change_password')"
                    />
                    <v-spacer />

                    <v-expand-transition v-if="isUpdatePassword">
                        <div>
                            <ValidationProvider
                                rules="max:50|min:3"
                                name="profileNewPassword"
                                v-slot="{ errors, valid }"
                            >
                                <v-text-field
                                    class="pa-2"
                                    :error-messages="errors"
                                    prepend-inner-icon="mdi-lock-outline"
                                    :label="$t('words.new_password')"
                                    v-model="profileVModel.newPassword"
                                />
                                <v-spacer />
                            </ValidationProvider>
                            <ValidationProvider
                                rules="max:50|min:3"
                                name="profileNewPasswordRepeat"
                                v-slot="{ errors, valid }"
                            >
                                <v-text-field
                                    :error-messages="errors"
                                    class="pa-2"
                                    prepend-inner-icon="mdi-lock-outline"
                                    :label="$t('auth.repeat_password')"
                                    v-model="repeatedPassword"
                                />
                                <v-spacer />
                            </ValidationProvider>
                        </div>
                    </v-expand-transition>
                    <v-row>
                        <v-col class="d-flex justify-center align-center pa-6" cols="12">
                            <v-btn rounded color="primary" light @click="updateProfile()">{{ $t('words.save') }}</v-btn>
                        </v-col>
                    </v-row>
                </v-form>
            </ValidationObserver>
        </v-container>
        <v-tooltip top>
            <template #activator="{ on, attrs }">
                <v-btn
                    depressed
                    tile
                    text
                    style="position: fixed; bottom: 15px; left: 10px"
                    v-bind="attrs"
                    v-on="on"
                    :href="$router.resolve({ name: 'setEnvironment' }).href"
                >
                    <span v-text="$tc('menu.app', 2)" />
                    <v-icon v-text="'mdi-format-list-bulleted'" />
                </v-btn>
            </template>
            <span>Ընտրել {{ $tc('menu.app', 1) }}</span>
        </v-tooltip>
        <v-spacer />
        <v-form ref="logout" :action="logoutUrl" method="post" autocomplete="off">
            <input :value="$csrf" name="_token" type="hidden" />
            <v-tooltip top>
                <template #activator="{ on, attrs }">
                    <v-btn
                        depressed
                        tile
                        text
                        style="position: fixed; bottom: 15px; right: 10px"
                        @click="$refs.logout.$el.submit()"
                        v-bind="attrs"
                        v-on="on"
                    >
                        {{ $t('words.logout') }}
                        <v-icon color="red darken-3" right v-text="'mdi-logout-variant'" />
                    </v-btn>
                </template>
                <span>{{ $t('words.logout') }}</span>
            </v-tooltip>
        </v-form>
    </v-navigation-drawer>
</template>

<script lang="ts">
import { ProfileModel } from '@/store/models/ProfileModel';
import ProfileModule from '@/store/modules/ProfileModule';
import _ from 'lodash';
import { extend, ValidationObserver, ValidationProvider } from 'vee-validate';
import { max, min, required } from 'vee-validate/dist/rules';
import { Component, Vue } from 'vue-property-decorator';

extend('max', max);
extend('min', min);
extend('required', required);

@Component({
    components: { ValidationObserver, ValidationProvider },
})
export default class ProfileInfo extends Vue {
    public isUpdatePassword: boolean = false;
    public initialProfile: null | object = null;
    public repeatedPassword: null | string = null;
    public profileVModel: ProfileModel = {
        email: '',
        producerId: 0,
        password: '',
        username: '',
        newPassword: '',
    };
    protected readonly logoutUrl: string = '/producer/profile/logout';

    public get profile(): ProfileModel {
        return ProfileModule.profile;
    }

    public get isChangeInitial() {
        return _.isEqual(this.initialProfile, this.profile);
    }

    public async updateProfile() {
        await ProfileModule.editProfile(this.profileVModel);
    }

    private created() {
        this.initialProfile = this.profile;
    }
}
</script>
