<!-- @format -->

<template>
    <v-app-bar app clipped-right flat height="70" light>
        <v-spacer />

        <v-btn depressed icon @click="emitVideoCall">
            <v-icon v-text="'mdi-video'" />
        </v-btn>

        <v-btn depressed icon @click="emitAudioCall">
            <v-icon v-text="'mdi-phone'" />
        </v-btn>

        <v-divider vertical class="mr-5 ml-3" />

        <v-responsive max-width="155" class="mr-lg-10">
            <v-text-field
                class="rounded-lg"
                append-icon="mdi-search-web"
                dense
                flat
                hide-details
                solo-inverted
                placeholder="search (ctrl+k)"
                @click="toggleSearch"
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
export default class AppBar extends Vue {
    emitVideoCall() {}
    emitAudioCall() {}

    toggleSearch() {}
}
</script>

<style scoped></style>
