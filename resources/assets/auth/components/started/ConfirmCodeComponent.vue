<!-- @format -->

<template>
    <div>
        <div class="text--accent-1">Accept code sent your email! (you have 5 minutes)</div>
        <ValidationProvider v-slot="{ errors }" mode="passive" name="code" rules="required|min:6|max:6">
            <v-otp-input
                v-model="code"
                :disabled="disabled"
                :length="length"
                autofocus
                name="code"
                type="text"
                @input.native="triggerOtp"
            />
            <span class="error">{{ errors[0] }}</span>
        </ValidationProvider>
        <a @click="triggerOtp" v-text="'Resend again'" />
        <v-progress-circular v-if="loader" />
    </div>
</template>

<script lang="ts">
import { VueMaskDirective, VueMaskFilter } from 'v-mask';
import { extend, validate, ValidationProvider } from 'vee-validate';
import { max, min, required } from 'vee-validate/dist/rules';
import { Component, Emit, PropSync, Vue, Watch } from 'vue-property-decorator';

extend('required', required);
extend('min', min);
extend('max', max);

@Component({
    components: { ValidationProvider },
    directives: { mask: VueMaskDirective },
    filters: { VMask: VueMaskFilter },
})
export default class ConfirmCodeComponent extends Vue {
    @PropSync('disabledSync') public disabled = false;

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

<style scoped lang="scss"></style>
