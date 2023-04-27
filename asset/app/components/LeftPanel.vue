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
            <v-navigation-drawer v-if="getWorkspaceCount" v-model="drawer" app color="grey lighten-3" mini-variant>
                <v-avatar class="d-block text-center mx-auto mt-4" color="grey darken-1" size="36" />

                <v-divider class="mx-3 my-5" />

                <v-avatar
                    v-for="n in 6"
                    :key="n"
                    class="d-block text-center mx-auto mb-9"
                    color="grey lighten-1"
                    size="28"
                />
            </v-navigation-drawer>

            <v-list class="pl-14" shaped>
                <v-list-item-group v-model="selectedItem">
                    <v-list-item v-for="n in 5" :key="n" link selectable active-class="selected-member-style">
                        <v-list-item-content>
                            <v-list-item-title>Item {{ n }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>
                <div class="sub-header-member-bottom">
                    <v-divider />
                    <v-skeleton-loader class="mt-2" type="list-item-avatar" />
                </div>
            </v-list>
        </template>
    </DrawerDrag>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import DrawerDrag from '@/app/components/DrawerDrag.vue';
import Workspace from '@/app/store/modules/Workspace';

@Component({
    components: { DrawerDrag },
    mixins: [],
})
export default class LeftPanel extends Vue {
    private drawer: boolean = true;

    private selectedItem: number = 0;

    private getWorkspaceCount(): number {
        return Workspace.count;
    }
}
</script>

<style scoped lang="scss">
.sub-header-member-bottom {
    position: absolute;
    bottom: 10px;
    width: 80%;
    right: 1px;
}
</style>
