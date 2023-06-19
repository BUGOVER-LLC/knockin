<!-- @format -->

<template>
    <div>
        <div class="text--accent-1">Accept code sent your email! (you have 5 minutes)</div>
        <ValidationProvider v-slot="{ errors }" name="code" rules="required|min:6|max:6" mode="passive">
            <v-otp-input
                v-model="code"
                type="text"
                name="code"
                :disabled="disabled"
                :length="length"
                autofocus
                @input="triggerOtp"
            />
            <span class="error">{{ errors[0] }}</span>
        </ValidationProvider>
        <v-progress-circular v-if="loader" />
    </div>
</template>

<script lang="ts">
import { VueMaskDirective, VueMaskFilter } from 'v-mask';
import { ValidationProvider, extend, validate } from 'vee-validate';
import { max, min, required } from 'vee-validate/dist/rules';
import { Component, Emit, PropSync, Vue, Watch } from 'vue-property-decorator';

import { MainComponent } from '@/@core/Main/MainComponent';

extend('required', required);
extend('min', min);
extend('max', max);

@Component({
    components: { ValidationProvider },
    directives: { mask: VueMaskDirective },
    filters: { VMask: VueMaskFilter },
})
export default class ConfirmCode extends Vue implements MainComponent {
    @PropSync('disabledSync') public disabled = false;

    private loader = false;
    private length = 6;
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
            validate(this.code, 'required|min:6|max:6', { name: 'code' }).then((result: any) => {
                if (result && result.valid) {
                    this.disabled = true;
                    this.loader = true;
                    return { code: this.code, valid: true };
                }
            });
        }
    }
}
</script>

<style scoped></style>
