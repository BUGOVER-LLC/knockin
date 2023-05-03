<!-- @format -->

<template lang="html">
    <div>
        <v-app-bar class="primary" dense fixed elevation="0">
            <v-toolbar-title>NOIX</v-toolbar-title>

            <v-spacer />

            <v-btn icon>
                <router-link :to="{ name: 'authIndex' }">
                    <v-icon color="black" v-text="'mdi-login'" />
                </router-link>
            </v-btn>
        </v-app-bar>
    </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component({})
export default class GreetingIndex extends Vue {}
</script>

<style scoped lang="scss"></style>
