<!-- @format -->

<template lang="html">
    <ValidationProvider name="email" rules="min:6|email|required" mode="passive" v-slot="{ errors }">
        <VTextField
            v-model="email"
            label="Email"
            type="email"
            outlined
            color="grey"
            hide-details
            name="email"
            placeholder="example@gmail.com"
        />
        <span class="error">{{ errors[0] }}</span>
    </ValidationProvider>
</template>

<script lang="ts">
import { Component, Emit, Vue, Watch } from 'vue-property-decorator';
import { extend, validate, ValidationProvider } from 'vee-validate';
import { email, required } from 'vee-validate/dist/rules';

extend('required', required);
extend('email', email);

@Component({
    components: { ValidationProvider },
    mixins: [],
})
export default class EmailSender extends Vue {
    protected email: string = '';

    protected valid: boolean = false;

    @Watch('email')
    emailTrigger() {
        validate(this.email, 'required|email', { name: 'email' }).then((result: object) => {
            if (result && result.valid) {
                this.valid = result.valid ?? false;
            }
            this.emitter();
        });
    }

    @Emit('validEmail')
    emitter() {
        return { email: this.email, valid: this.valid };
    }
}
</script>

<style scoped lang="scss"></style>
