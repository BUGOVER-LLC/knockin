<!-- @format -->

<template lang="html">
    <div class="auth-wrapper d-flex align-center justify-center pa-4">
        <VCard class="auth-card pa-4 pt-7 rounded-lg" max-width="460" outlined>
            <v-card-title class="justify-center">
                <VCardTitle class="font-weight-semibold text-2xl text-uppercase"><a href="/">NOIX</a> </VCardTitle>
            </v-card-title>

            <VCardText class="pt-2">
                <h5 class="text-h5 font-weight-semibold mb-1 text-center"> Welcome to NOIX! 👋🏻 </h5>
                <p class="mb-0 text-center"> Please sign-in to your account and start the adventure </p>
            </VCardText>

            <VCardText>
                <VForm autocomplete="off" @submit.prevent="() => {}">
                    <VRow>
                        <!-- email -->
                        <VCol cols="12" class="mb-3">
                            <ValidationProvider
                                name="email"
                                rules="min:6|email|required"
                                mode="passive"
                                v-slot="{ errors }"
                            >
                                <VTextField
                                    v-model="form.email"
                                    label="Email"
                                    type="email"
                                    outlined
                                    color="grey"
                                    hide-details
                                    name="email"
                                />
                                <span class="error">{{ errors[0] }}</span>
                            </ValidationProvider>
                        </VCol>

                        <!-- password -->
                        <VCol cols="12">
                            <!-- login button -->
                            <VBtn block type="submit" text depressed @click="checkSend"> next </VBtn>
                        </VCol>

                        <VCol cols="12" class="d-flex align-center">
                            <VDivider />
                            <span class="mx-4">or</span>
                            <VDivider />
                        </VCol>

                        <!-- create account -->
                        <VCol cols="12" class="text-center text-base">
                            <span>New on our platform?</span>
                            <RouterLink class="text-primary ms-2" :to="{ name: 'register' }">
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
import { Vue, Component } from 'vue-property-decorator';
import { ValidationProvider, extend, validate } from 'vee-validate';
import { required, min, max, email } from 'vee-validate/dist/rules';
extend('required', required);
extend('min', min);
extend('max', max);
extend('email', email);

@Component({
    components: { ValidationProvider },
})
export default class AuthIndex extends Vue {
    public form: any[string] = {
        workspace: '',
        email: '',
        pwd: '',
        remember: false,
    };

    mounted() {
        console.log();
    }

    private checkSend() {
        validate(this.form.email, 'required', { name: 'email' }).then(result => {
            console.log(result);
        });
    }
}
</script>

<style scoped lang="scss">
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
