<!-- @format -->

<template>
    <v-app-bar app clipped-right flat height="70" light>
        <v-spacer />

        <v-responsive max-width="160" class="mr-lg-10">
            <v-text-field
                class="rounded-lg"
                append-icon="mdi-search-web"
                dense
                flat
                hide-details
                solo-inverted
                placeholder="search (ctrl+k)"
            />
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
