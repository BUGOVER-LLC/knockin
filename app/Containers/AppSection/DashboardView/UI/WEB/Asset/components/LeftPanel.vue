<!-- @format -->

<template lang="html">
    <DrawerDrag :right="false">
        <template v-slot:toolbar>
            <v-toolbar color="grey lighten-4" class="pl-16" flat height="70">
                <v-toolbar-title class="headline text-uppercase">
                    <span>u s</span><span class="font-weight-light"> e r s </span>
                </v-toolbar-title>
            </v-toolbar>
        </template>

        <template v-slot:content>
            <WorkspaceList />
            <MembersList />
        </template>
    </DrawerDrag>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import DrawerDrag from '@/app/components/DrawerDrag.vue';
import Workspace from '@/Asset/store/modules/WorkspaceStore';
import WorkspaceList from '@/app/components/WorkspaceList.vue';
import MembersList from '@/app/components/MembersList.vue';

@Component({
    components: { MembersList, WorkspaceList, DrawerDrag },
    mixins: [],
})
export default class LeftPanel extends Vue {}
</script>

<style scoped lang="scss">
.v-navigation-drawer {
    height: 100vh;
    top: 0 !important;
    max-height: 100% !important;
    transform: translateX(0%);
    width: 56px;
}
</style>
