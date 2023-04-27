<!-- @format -->

<template>
    <v-system-bar app>
        <v-spacer />

        <v-icon>mdi-alert</v-icon>

        <v-icon>mdi-clock</v-icon>

        <v-icon>mdi-account</v-icon>
    </v-system-bar>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component({})
export default class SystemBar extends Vue {}
</script>

<style scoped lang="scss"></style>
