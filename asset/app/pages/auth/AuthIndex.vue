<!-- @format -->

<template>
    <div class="auth-wrapper d-flex align-center justify-center pa-4">
        <VCard class="auth-card pa-4 pt-7" max-width="448">
            <v-card-title class="justify-center">
                <template #prepend>
                    <div class="d-flex">
                        <div />
                    </div>
                </template>

                <VCardTitle class="font-weight-semibold text-2xl text-uppercase"> NOIX </VCardTitle>
            </v-card-title>

            <VCardText class="pt-2">
                <h5 class="text-h5 font-weight-semibold mb-1"> Welcome to NOIX! 👋🏻 </h5>
                <p class="mb-0"> Please sign-in to your account and start the adventure </p>
            </VCardText>

            <VCardText>
                <VForm @submit.prevent="() => {}" autocomplete="off">
                    <VRow>
                        <!-- email -->
                        <VCol cols="12">
                            <VTextField v-model="form.email" label="Email" type="email" outlined />
                        </VCol>

                        <!-- password -->
                        <VCol cols="12">
                            <VTextField v-model="form.password" label="Password" outlined />

                            <!-- remember me checkbox -->
                            <div class="d-flex align-center justify-space-between flex-wrap mt-1 mb-4">
                                <VCheckbox v-model="form.remember" label="Remember me" />

                                <a class="ms-2 mb-1" href="javascript:void(0)"> Forgot Password? </a>
                            </div>

                            <!-- login button -->
                            <VBtn block type="submit" to="/"> Login </VBtn>
                        </VCol>

                        <!-- create account -->
                        <VCol cols="12" class="text-center text-base">
                            <span>New on our platform?</span>
                            <RouterLink class="text-primary ms-2" :to="{ name: 'register' }">
                                Create an account
                            </RouterLink>
                        </VCol>

                        <VCol cols="12" class="d-flex align-center">
                            <VDivider />
                            <span class="mx-4">or</span>
                            <VDivider />
                        </VCol>

                        <!-- auth providers -->
                        <VCol cols="12" class="text-center"> </VCol>
                    </VRow>
                </VForm>
            </VCardText>
        </VCard>

        <VImg class="auth-footer-start-tree d-none d-md-block" :width="250" />

        <VImg class="auth-footer-end-tree d-none d-md-block" :width="350" />

        <!-- bg img -->
        <VImg class="auth-footer-mask d-none d-md-block" />
    </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component({
    mixins: [],
})
export default class AuthIndex extends Vue {
    form = {
        email: '',
        password: '',
        remember: false,
    };

    beforeRouteUpdate(to, from, next: string): void {}

    created() {}
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
