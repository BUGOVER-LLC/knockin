<!-- @format -->

<template lang="html">
    <v-navigation-drawer v-if="getWorkspaceCount" v-model="drawer" app color="grey lighten-3" mini-variant>
        <v-avatar class="d-block text-center mx-auto mt-4" color="grey darken-1" size="36" />

        <v-divider class="mx-3 my-4" />

        <v-avatar v-for="n in 6" :key="n" class="d-block text-center mx-auto mb-9" color="grey lighten-1" size="28" />
    </v-navigation-drawer>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import Workspace from '@/app/store/modules/WorkspaceStore';

@Component({
    components: {},
    mixins: [],
})
export default class extends Vue {
    private drawer: boolean = true;

    private getWorkspaceCount(): number {
        return Workspace.count;
    }
}
</script>

<style scoped lang="scss"></style>
