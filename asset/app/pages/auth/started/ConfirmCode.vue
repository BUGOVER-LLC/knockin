<!-- @format -->

<template>
    <div>
        <v-otp-input length="8" v-mask="'#-#-#-#-#-#-#-#-#-#'" />
    </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { VueMaskDirective, VueMaskFilter } from 'v-mask';

@Component({
    directives: { mask: VueMaskDirective },
    filters: { VMask: VueMaskFilter },
})
export default class ConfirmCode extends Vue {}
</script>

<style scoped></style>
