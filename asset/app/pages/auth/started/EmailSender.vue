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
import { Component, Vue } from 'vue-property-decorator';
import { ValidationProvider, extend } from 'vee-validate';
import { required, email } from 'vee-validate/dist/rules';

extend('required', required);
extend('email', email);

@Component({
    components: { ValidationProvider },
    mixins: [],
})
export default class EmailSender extends Vue {
    public email: string = '';
}
</script>

<style scoped lang="scss"></style>
