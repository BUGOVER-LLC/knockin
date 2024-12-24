<!-- @format -->

<template>
    <div>
        <div class="text--accent-1">{{ $t('auth.accept_code_accept') }}</div>
        <ValidationProvider v-slot="{ errors }" mode="passive" name="code" rules="required|min:6|max:6">
            <v-otp-input
                :error-messages="errors"
                v-model="code"
                :disabled="disabled"
                :length="length"
                autofocus
                name="code"
                type="text"
                @input.native="triggerOtp"
            />
        </ValidationProvider>
        <v-progress-circular v-if="loader" />
    </div>
</template>

<script lang="ts">
import { VueMaskDirective } from 'v-mask';
import { extend, validate, ValidationProvider } from 'vee-validate';
import { max, min, required } from 'vee-validate/dist/rules';
import { Component, Emit, PropSync, Vue, Watch } from 'vue-property-decorator';

extend('required', required);
extend('min', min);
extend('max', max);

@Component({
    components: { ValidationProvider },
    directives: { mask: VueMaskDirective },
})
export default class ConfirmCodeComponent extends Vue {
    @PropSync('disabledSync') public disabled: boolean;

    public loader: boolean = false;
    public length: number = 6;
    public code: string | number = '';

    @Watch('disabled')
    public observeDisabled() {
        this.disabled = false;
        this.loader = false;
        this.code = '';
    }

    public triggerOtp() {
        const payload = { code: this.code, valid: false };
        if (this.length === (this.code as string).length) {
            validate(this.code, 'required|min:6|max:6', { name: 'code' }).then((result: any) => {
                if (result && result.valid) {
                    this.disabled = true;
                    this.loader = true;
                    payload.code = this.code;
                    payload.valid = true;
                }
                this.emitCode(payload);
            });
        }
    }

    @Emit('codeValidation')
    private emitCode(payload: object) {
        return payload;
    }
}
</script>
