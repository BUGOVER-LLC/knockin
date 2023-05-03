<!-- @format -->

<template>
    <div>
        <div class="text--accent-1">Accept code sent your email! (you have 5 minutes)</div>
        <v-otp-input v-model="code" type="text" :disabled="disabled" :length="length" autofocus @input="triggerOtp" />
        <v-progress-circular v-if="loader" />
    </div>
</template>

<script lang="ts">
import { Component, Emit, PropSync, Vue, Watch } from 'vue-property-decorator';
import { VueMaskDirective, VueMaskFilter } from 'v-mask';
import { MainComponent } from '@/app/@core/Main/MainComponent';

@Component({
    directives: { mask: VueMaskDirective },
    filters: { VMask: VueMaskFilter },
})
export default class ConfirmCode extends Vue implements MainComponent {
    @PropSync('disabledSync') public disabled: boolean = false;

    private loader: boolean = false;
    private length: number = 6;
    private code: string | number = '';

    created(): void {}

    mounted(): void {}

    @Watch('disabled')
    observeDisabled() {
        this.disabled = false;
        this.loader = false;
        this.code = '';
    }

    @Emit('codeValidation')
    private triggerOtp(e: number | string) {
        if (this.length === (e as string).length) {
            this.disabled = true;
            this.loader = true;
            return { code: this.code, valid: true };
        }
    }
}
</script>

<style scoped></style>
