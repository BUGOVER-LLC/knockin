<!-- @format -->

<template>
    <div>
        <v-otp-input length="8" v-mask="'#-#-#-#-#-#-#-#-#-#'" />
    </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { VueMaskDirective, VueMaskFilter } from 'v-mask';
import { MainComponent } from '@/app/@core/Main/MainComponent';

@Component({
    directives: { mask: VueMaskDirective },
    filters: { VMask: VueMaskFilter },
})
export default class ConfirmCode extends Vue implements MainComponent {
    created(): void {}

    mounted(): void {}
}
</script>

<style scoped></style>
