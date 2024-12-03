<!-- @format -->

<template>
    <div v-if="email" class="auth-wrapper d-flex align-center justify-center pa-4 row">
        <VCard
            class="auth-card pa-4 pt-7 rounded-lg mb-16"
            max-width="600"
            min-width="450"
            outlined
            max-height="500"
            elevation="0"
        >
            <v-card-title class="text-center">
                <span class="text-center">{{ $t('words.login') }}</span>
            </v-card-title>
            <v-card-text>
                <ValidationObserver ref="formPasswordConfirm" v-slot="{ invalid, validated, handleSubmit, validate }">
                    <v-form autocomplete="off">
                        <ValidationProvider rules="required|max:50|min:3" name="email" v-slot="{ errors, valid }">
                            <v-text-field
                                placeholder="example@mail.com"
                                :value="email"
                                filled
                                outlined
                                readonly
                                disabled
                            />
                        </ValidationProvider>

                        <ValidationProvider rules="required|max:50|min:3" name="password" v-slot="{ errors, valid }">
                            <v-text-field :placeholder="$t('auth.password_set')" filled outlined v-model="password" />
                        </ValidationProvider>

                        <div v-if="passwordAccept">
                            <ValidationProvider
                                rules="required|max:50|min:3"
                                name="passwordConfirm"
                                v-slot="{ errors, valid }"
                            >
                                <v-text-field
                                    v-if="passwordAccept"
                                    v-model="passwordConfirm"
                                    :placeholder="$t('auth.repeat_password')"
                                    filled
                                    outlined
                                />
                            </ValidationProvider>
                        </div>
                    </v-form>
                </ValidationObserver>
            </v-card-text>

            <v-card-actions>
                <v-btn block outlined @click="loginByPassword">{{ $t('auth.send_code') }}</v-btn>
            </v-card-actions>
        </VCard>
    </div>
</template>

<script lang="ts">
import { OnCreated } from '@/common/contracts/OnCreated';
import routesNames from '@/router/routesNames';
import { SendSecretAuth } from '@/services/api/AuthApi';
import { Vue, Component, Prop } from 'vue-property-decorator';
import { ValidationObserver, ValidationProvider, extend } from 'vee-validate';
import { max, min, required, email } from 'vee-validate/dist/rules';

extend('required', required);
extend('min', min);
extend('max', max);
extend('email', email);

@Component({
    components: {
        ValidationObserver,
        ValidationProvider,
    },
})
export default class PasswordConfirm extends Vue implements OnCreated {
    @Prop({ required: true }) public passwordAccept: boolean;
    @Prop({ required: true, type: String }) public email: string;

    public password: string = '';
    public passwordConfirm: null | string = null;

    public created() {
        if (!this.email) {
            this.$router.push({ name: routesNames.authIndex });
        }
    }

    public async loginByPassword() {
        try {
            await SendSecretAuth({ email: this.email, password: this.password, passwordConfirm: this.passwordConfirm });
            location.reload();
        } catch (error) {}
    }
}
</script>
