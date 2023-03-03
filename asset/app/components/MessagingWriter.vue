<!-- @format -->

<template>
    <v-footer app color="transparent" height="72" inset>
        <v-text-field background-color="grey lighten-1" dense flat hide-details rounded solo />
    </v-footer>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component({
    components: {},
    mixins: [],
})
export default class MessagingWriter extends Vue {}
</script>

<style scoped></style>
