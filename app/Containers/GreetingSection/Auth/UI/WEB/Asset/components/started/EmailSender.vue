<!-- @format -->

<template lang="html">
    <ValidationProvider v-slot="{ errors }" name="email" rules="min:6|email|required|max:150" mode="passive">
        <VTextField
            v-model="email"
            autofocus
            label="Email"
            type="email"
            outlined
            color="grey"
            hide-details
            name="email"
            placeholder="example@gmail.com"
            @input="emailTrigger"
        />
        <span class="error">{{ errors[0] }}</span>
    </ValidationProvider>
</template>

<script lang="ts">
import { ValidationProvider, extend, validate } from 'vee-validate';
import { email, max, min, required } from 'vee-validate/dist/rules';
import { Component, Emit, Prop, Vue } from 'vue-property-decorator';

import { MainComponent } from '../../../../../../../AppSection/Greeting/UI/WEB/Asset/@core/Main/MainComponent';

extend('required', required);
extend('email', email);
extend('min', min);
extend('max', max);

@Component({
    components: { ValidationProvider },
    mixins: [],
})
export default class EmailSender extends Vue implements MainComponent {
    @Prop({ required: false }) private readonly emailValue: string = '';

    protected email = '';
    protected valid = false;

    mounted(): void {}

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

<style scoped lang="scss"></style>
