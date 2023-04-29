<!-- @format -->

<template>
    <div>
        <div class="text--accent-1">Accept code sent your email! (you have 10 minutes)</div>
        <v-otp-input :length="length" v-mask="'#-#-#-#-#-#'" @input="triggerOtp" v-model="code" />
    </div>
</template>

<script lang="ts">
import { Component, Vue, Emit } from 'vue-property-decorator';
import { VueMaskDirective, VueMaskFilter } from 'v-mask';
import { MainComponent } from '@/app/@core/Main/MainComponent';

@Component({
    directives: { mask: VueMaskDirective },
    filters: { VMask: VueMaskFilter },
})
export default class ConfirmCode extends Vue implements MainComponent {
    private length: number = 6;
    private code: string | number = '';

    created(): void {}

    mounted(): void {}

    @Emit('codeValidation')
    private triggerOtp(e: number | string) {
        if (this.length === (e as string).length) {
            return { code: this.code, valid: true };
        }
    }
}
</script>

<style scoped></style>
