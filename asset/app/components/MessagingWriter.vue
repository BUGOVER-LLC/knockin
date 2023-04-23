<!-- @format -->

<template lang="html">
    <v-footer app color="transparent" height="72" inset>
        <v-text-field autofocus background-color="grey lighten-3" class="rounded-lg" flat hide-details solo />
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

<style scoped lang="scss"></style>
