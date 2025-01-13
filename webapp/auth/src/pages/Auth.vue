<template lang="html">
    <v-container id="auth-confirm"></v-container>
</template>

<script lang="ts">
import { ValidationProvider } from 'vee-validate';
import { Component, Vue } from 'vue-property-decorator';

import ConfirmCode from '@/components/started/ConfirmCodeComponent.vue';
import EmailSender from '@/components/started/EmailSenderComponent.vue';
import { trans } from '@/utils/StringUtils';

@Component({
    methods: { trans },
    components: { ConfirmCode, EmailSender, ValidationProvider },
})
export default class AuthStarted extends Vue {}
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
