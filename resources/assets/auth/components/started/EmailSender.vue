<!-- @format -->

<template lang="html">
    <ValidationProvider v-slot="{ errors }" mode="passive" name="email" rules="min:6|email|required|max:150">
        <VTextField
            v-model="email"
            autofocus
            color="grey"
            hide-details
            label="Email"
            name="email"
            outlined
            placeholder="example@gmail.com"
            type="email"
            @input="emailTrigger"
        />
        <span class="error">{{ errors[0] }}</span>
    </ValidationProvider>
</template>

<script lang="ts">
import { extend, validate, ValidationProvider } from 'vee-validate';
import { email, max, min, required } from 'vee-validate/dist/rules';
import { Component, Emit, Prop, Vue } from 'vue-property-decorator';

extend('required', required);
extend('email', email);
extend('min', min);
extend('max', max);

@Component({
    components: { ValidationProvider },
    mixins: [],
})
export default class EmailSender extends Vue {
    protected email = '';
    protected valid = false;

    @Prop({ required: false }) private readonly emailValue: string = '';

    created() {
        this.email = this.emailValue;
    }

    emailTrigger() {
        validate(this.email, 'required|email', { name: 'email' }).then((result: any) => {
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

<style lang="scss" scoped></style>
