<!-- @format -->

<template lang="html">
    <DrawerDrag :right="false">
        <template #toolbar>
            <v-toolbar class="pl-16" color="grey lighten-4" flat height="70">
                <v-toolbar-title class="headline text-uppercase">
                    <span>u s</span><span class="font-weight-light"> e r s </span>
                </v-toolbar-title>
            </v-toolbar>
        </template>

        <template #content>
            <WorkspaceList />
            <MembersList />
        </template>
    </DrawerDrag>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

import DrawerDrag from '@/dashboard/components/DrawerDrag.vue';
import MembersList from '@/dashboard/components/MembersList.vue';
import WorkspaceList from '@/dashboard/components/WorkspaceList.vue';

@Component({
    components: { MembersList, WorkspaceList, DrawerDrag },
    mixins: [],
})
export default class LeftPanel extends Vue {}
</script>

<style lang="scss" scoped>
.v-navigation-drawer {
    height: 100vh;
    top: 0 !important;
    max-height: 100% !important;
    transform: translateX(0%);
    width: 56px;
}
</style>
