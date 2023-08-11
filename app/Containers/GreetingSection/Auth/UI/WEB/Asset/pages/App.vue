<template>
    <v-app>
        <slot name="auth-content" />
    </v-app>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component({})
export default class App extends Vue {}
</script>

<style scoped lang="scss"></style>
