<!-- @format -->

<template lang="html">
    <v-app>
        <slot name="content" />
    </v-app>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component({})
export default class App extends Vue {
    private messages: object = [];

    private window = {
        width: 0,
        height: 0,
    };

    handleResize() {}

    created(): void {}

    mounted(): void {
        window.addEventListener('resize', this.handleResize);
    }
}
</script>

<style lang="scss" scoped></style>
