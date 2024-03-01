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
                                <v-window-item :eager="true" :value="1">
                                    <EmailSender :email-value="email" @validEmail="emailValidation = $event" />
                                </v-window-item>
                                <v-window-item :value="2">
                                    <ConfirmCode
                                        :disabled-sync="disabledOtp"
                                        @codeValidation="codeValidation = $event"
                                    />
                                </v-window-item>
                                <v-window-item :value="3">
                                    <WorkspacesListComponent />
                                </v-window-item>
                            </v-window>
                        </VCol>

                        <v-col cols="12">
                            <v-btn v-if="2 === step" icon @click="prevStep">
                                <v-icon v-text="'mdi-arrow-left'" />
                            </v-btn>
                            <v-btn v-if="1 === step && emailValidation.sent" class="float-right" icon @click="nextStep">
                                <v-icon v-text="'mdi-arrow-right'" />
                            </v-btn>
                        </v-col>

                        <!-- password -->
                        <VCol cols="12">
                            <!-- login button -->
                            <VBtn
                                v-if="1 === step"
                                :disabled="!emailValidation.valid"
                                :loading="loader"
                                block
                                color="primary"
                                depressed
                                text
                                type="submit"
                                @click="checkSend"
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
                        </VCol>
                    </VRow>
                </VForm>
            </VCardText>
        </VCard>
    </div>
</template>

<script lang="ts">
import { extend, ValidationProvider } from 'vee-validate';
import { email, max, min, required } from 'vee-validate/dist/rules';
import { Component, Prop, Vue, Watch, PropSync } from 'vue-property-decorator';

import ConfirmCode from '@/auth/components/started/ConfirmCodeComponent.vue';
import EmailSender from '@/auth/components/started/EmailSenderComponent.vue';
import WorkspacesListComponent from '@/auth/components/started/WorkspacesListComponent.vue';
import AuthModule from '@/auth/store/modules/AuthModule';

extend('required', required);
extend('min', min);
extend('max', max);
extend('email', email);

@Component({
    components: { WorkspacesListComponent, ConfirmCode, EmailSender, ValidationProvider },
})
export default class AuthIndex extends Vue {
    @Prop({ required: true }) public readonly code: boolean = false;
    @Prop({ required: false }) public readonly email: string = '';
    @PropSync('currentStep') public step: number = 1;

    public loader: boolean = false;
    public disabledOtp: boolean = false;

    public emailValidation = { valid: false, email: '', sent: false };
    public codeValidation = { valid: false, code: '', sent: false };

    created() {
        'emailSender' !== this.$router.currentRoute.name ? this.prevStep() : null;

        this.reDirector();

        if (this.email) {
            this.emailValidation = { valid: true, email: this.email, sent: false };
        }
    }

    @Watch('codeValidation')
    async observeCode(val: string | number) {
        if (val && this.emailValidation.valid && this.codeValidation) {
            this.disabledOtp = true;
            try {
                await AuthModule.addAcceptCode(this.codeValidation.code, this.email);
                this.$router.push({ name: 'selectWorkspace' });
            } finally {
                this.disabledOtp = false;
            }
        }
    }

    public prevStep() {
        this.step = 1;
        this.$router.push({ name: 'emailSender' });
    }

    public nextStep() {
        this.step = 2;
        this.$router.push({ name: 'authConfirm' });
    }

    public textBtn() {
        if (this.emailValidation.email && this.emailValidation.sent) {
            return 'send code again';
        }

        return 'next';
    }

    private reDirector() {
        if (this.code && 'authConfirm' !== this.$router.currentRoute.name) {
            this.nextStep();
        } else if ('authConfirm' === this.$router.currentRoute.name && this.code) {
            this.step = 2;
        } else if (1 === this.step && 'authConfirm' === this.$router.currentRoute.name) {
            this.$router.push({ name: 'emailSender' });
        }
    }

    public async checkSend() {
        if (this.emailValidation.valid) {
            try {
                await AuthModule.addEmail(this.emailValidation.email);
                this.nextStep();
                this.emailValidation.sent = true;
            } finally {
                this.loader = false;
            }
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
