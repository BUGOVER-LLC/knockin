<!-- @format -->

<template lang="html">
    <div class="auth-wrapper d-flex align-center justify-center pa-4">
        <VCard class="auth-card pa-4 pt-7 rounded-lg" max-width="460" outlined>
            <v-card-title class="justify-center">
                <VCardTitle class="font-weight-semibold text-2xl text-uppercase"><a href="/">NOIX</a></VCardTitle>
            </v-card-title>

            <VCardText class="pt-2">
                <h5 class="text-h5 font-weight-semibold mb-1 text-center"> Welcome to NOIX! 👋🏻 </h5>
                <p class="mb-0 text-center"> Please sign-in to your account and start the adventure </p>
            </VCardText>

            <VCardText>
                <VForm autocomplete="off" @submit.prevent="() => {}">
                    <VRow>
                        <!-- email -->
                        <VCol class="mb-3" cols="12">
                            <v-window v-model="step">
                                <v-window-item :value="1">
                                    <EmailSender @validEmail="emailValidation = $event" />
                                </v-window-item>
                                <v-window-item :value="2">
                                    <ConfirmCode @codeValidation="codeValidation = $event" />
                                </v-window-item>
                            </v-window>
                        </VCol>

                        <v-col cols="12">
                            <v-btn v-if="2 === step" icon @click="prevStep"><v-icon v-text="'mdi-arrow-left'" /></v-btn>
                            <v-btn v-if="1 === step && emailValidation.sent" icon @click="nextStep" class="float-right">
                                <v-icon v-text="'mdi-arrow-right'" />
                            </v-btn>
                        </v-col>

                        <!-- password -->
                        <VCol cols="12">
                            <!-- login button -->
                            <VBtn
                                v-if="1 === this.step"
                                :disabled="!emailValidation.valid"
                                :loading="loader"
                                block
                                depressed
                                text
                                type="submit"
                                @click="checkSend"
                                color="primary"
                                v-text="textBtn()"
                            />
                        </VCol>

                        <VCol class="d-flex align-center" cols="12">
                            <VDivider />
                            <span class="mx-4">or</span>
                            <VDivider />
                        </VCol>

                        <!-- create account -->
                        <VCol class="text-center text-base" cols="12">
                            <span>New on our platform?</span>
                            <RouterLink :to="{ name: 'register' }" class="text-primary ms-2">
                                Create an account
                            </RouterLink>
                        </VCol>
                    </VRow>
                </VForm>
            </VCardText>
        </VCard>
    </div>
</template>

<script lang="ts">
import { Component, Vue, Watch, Prop } from 'vue-property-decorator';
import { extend, ValidationProvider } from 'vee-validate';
import { email, max, min, required } from 'vee-validate/dist/rules';
import EmailSender from '@/app/pages/auth/started/EmailSender.vue';
import ConfirmCode from '@/app/pages/auth/started/ConfirmCode.vue';
import axios from 'axios';
import { MainComponent } from '@/app/@core/Main/MainComponent';
import { AxiosResponse } from 'axios';

extend('required', required);
extend('min', min);
extend('max', max);
extend('email', email);

@Component({
    components: { ConfirmCode, EmailSender, ValidationProvider },
})
export default class AuthIndex extends Vue implements MainComponent {
    @Prop({ required: false })
    private readonly email: string = '';

    @Prop({ required: false })
    private readonly code: string = '';

    private step: number = 1;
    private emailValidation = { valid: false, email: '', sent: false };
    private codeValidation = { valid: false, code: '', sent: false };
    private loader: boolean = false;

    created() {
        if ('authConfirm' === this.$router.currentRoute.name) {
            this.step = 2;
        }
    }

    mounted(): void {}

    @Watch('codeValidation.valid')
    observeCode(val) {
        if (val && this.emailValidation.email && this.emailValidation.valid) {
            axios
                .post('/auth/check-code', { email: this.emailValidation.email, code: this.codeValidation.code })
                .then();
        }
    }

    prevStep() {
        this.step = 1;
        this.$router.push({ name: 'emailSender' });
    }

    nextStep() {
        this.step = 2;
        this.$router.push({ name: 'authConfirm' });
    }

    textBtn() {
        if (this.emailValidation.email && this.emailValidation.sent) {
            return 'send code again';
        }
        return 'next';
    }

    private async checkSend() {
        if (this.emailValidation.valid) {
            axios
                .post('/auth/check-email', { email: this.emailValidation.email })
                .then((result: AxiosResponse) => {
                    if (422 !== result.status) {
                        this.nextStep();
                        this.emailValidation.sent = true;
                    }
                })
                .catch()
                .finally(() => {
                    this.loader = false;
                });
        }
    }
}
</script>

<style lang="scss" scoped>
.auth-wrapper {
    min-block-size: calc(var(--vh, 1vh) * 100);
}

.auth-footer-mask {
    position: absolute;
    inset-block-end: 0;
    min-inline-size: 100%;
}

.auth-card {
    z-index: 1 !important;
}

.auth-footer-start-tree,
.auth-footer-end-tree {
    position: absolute;
    z-index: 1;
}

.auth-footer-start-tree {
    inset-block-end: 0;
    inset-inline-start: 0;
}

.auth-footer-end-tree {
    inset-block-end: 0;
    inset-inline-end: 0;
}

.auth-illustration {
    z-index: 1;
}

.auth-logo {
    position: absolute;
    z-index: 1;
    inset-block-start: 2rem;
    inset-inline-start: 2.3rem;
}

.auth-bg {
    background-color: rgb(var(--v-theme-surface));
}
</style>
