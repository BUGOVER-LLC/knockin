<!-- @format -->
<template>
    <v-card>
        <v-list three-line>
            <template v-for="(item, index) in workspaces">
                <v-list-item :key="item.title">
                    <v-list-item-avatar>
                        <v-img :src="item.logo" />
                    </v-list-item-avatar>

                    <v-list-item-content>
                        <v-list-item-title v-html="item.name"></v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </template>
        </v-list>
    </v-card>
</template>

<script lang="ts">
import { Vue, Component } from 'vue-property-decorator';
import WorkspaceModule from '@/auth/store/modules/WorkspaceModule';
@Component({})
export default class WorkspacesListComponent extends Vue {
    get workspaces(): object[] {
        return WorkspaceModule.workspaces;
    }

    created() {
        this.workspaces;
    }
}
</script>

<style scoped lang="scss"></style>
