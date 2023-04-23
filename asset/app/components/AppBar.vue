<!-- @format -->

<template>
    <v-app-bar app clipped-right flat height="70" light>
        <v-spacer />

        <v-responsive max-width="156">
            <v-text-field dense flat hide-details rounded solo-inverted />
        </v-responsive>
    </v-app-bar>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component({
    components: {},
    mixins: [],
})
export default class AppBar extends Vue {}
</script>

<style scoped></style>
