<!-- @format -->

<template lang="html">
    <div>
        <v-app-bar class="primary" dense>
            <v-app-bar-nav-icon />

            <v-toolbar-title>NOIX</v-toolbar-title>

            <v-spacer />

            <v-btn icon>
                <v-icon v-text="'mdi-login'" />
            </v-btn>
        </v-app-bar>
    </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component({})
export default class GreetingIndex extends Vue {}
</script>

<style scoped></style>
