<!-- @format -->

<template>
    <v-app-bar app class="ml-0 pl-0" clipped-right flat height="70" light>
        <v-spacer />

        <v-btn depressed icon @click="emitVideoCall">
            <v-icon v-text="'mdi-video'" />
        </v-btn>

        <v-btn depressed icon @click="emitAudioCall">
            <v-icon v-text="'mdi-phone'" />
        </v-btn>

        <v-divider class="mr-5 ml-3" vertical />

        <v-responsive class="mr-lg-10" max-width="155">
            <v-text-field
                append-icon="mdi-search-web"
                class="rounded-lg"
                dense
                flat
                hide-details
                placeholder="search (ctrl+k)"
                solo-inverted
                @click="toggleSearch"
            />
        </v-responsive>
    </v-app-bar>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

import { AbstractModule } from '@/dashboard/store/modules/AbstractStore';

@Component({
    components: {},
    mixins: [],
})
export default class AppBar extends Vue {
    emitVideoCall() {}

    emitAudioCall() {}

    toggleSearch() {
        AbstractModule.initTriggerSearch();
    }
}
</script>

<style lang="scss"></style>
