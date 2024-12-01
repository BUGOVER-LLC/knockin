<!-- @format -->

<template>
    <v-container fluid>
        <v-data-table
            v-if="roles"
            :items="rolesPayload"
            :headers="headers"
            :fixed-header="true"
            :items-per-page="Number(roles.per_page)"
            :height="window.height"
            loader-height="1"
            hide-default-footer
            item-key="roleId"
            class="elevation-1"
            :loading="loader"
        >
            <template #no-data>
                <div class="justify-center align-center text-center">
                    <h1 class="font-weight-medium mt-10">{{ $t('roles.doesntExists') }}</h1>
                </div>
            </template>

            <template #top>
                <div ref="toolbar">
                    <v-toolbar color="white" flat height="55px">
                        <v-row>
                            <v-col cols="12" offset="8" style="max-width: 45%">
                                <v-text-field
                                    hide-details
                                    outlined
                                    dense
                                    clearable
                                    class="d-flex justify-center align-center rounded-0"
                                    :label="$t('words.search')"
                                    prepend-icon="mdi-search-web"
                                    v-model="searchRole"
                                    @change="searchRoleEvent()"
                                />
                            </v-col>
                        </v-row>
                        <v-spacer />
                        <v-btn :to="{ name: 'createRole' }" color="primary" class="rounded-lg mr-1" tile depressed text>
                            <v-icon v-text="'mdi-plus'" />
                            <span>
                                {{ $t('roles.new') }}
                            </span>
                        </v-btn>
                    </v-toolbar>
                </div>
            </template>

            <template #item.roleDescription="{ item }">
                <span> {{ item.roleDescription ? item.roleDescription.substring(0, 80) : '' }}... </span>
            </template>

            <template #item.roleActive="{ item }">
                <v-icon v-if="item.roleActive" v-text="'mdi-check'" color="green darken-1" />
                <v-icon v-else v-text="'mdi-check'" color="gray lighten-1" />
            </template>

            <template #item.syncPermission="{ item }">
                <v-btn icon :to="{ name: 'editRole', params: { roleId: item.roleId } }">
                    <v-icon v-text="'mdi-book-edit-outline'" color="grey darken-3" />
                </v-btn>
                <v-btn icon @click="clickSelectDelete(item)">
                    <v-icon v-text="'mdi-delete-outline'" color="red darken-3" />
                </v-btn>
            </template>

            <template #footer>
                <TableFooter :paginated="roles" @changeData="queryPaginate" />
            </template>
        </v-data-table>

        <v-dialog v-model="deleteDialog" v-if="deleteDialog" max-width="400" width="100%">
            <ApproveDialog
                v-model="deleteDialog"
                :title="$t('words.delete') + ' ' + $tc('menu.roles', 1)"
                @update:value="roleDeleteDialogTrigger($event)"
            />
        </v-dialog>
    </v-container>
</template>

<script lang="ts">
import ApproveDialog from '@/components/static/ApproveDialog.vue';
import TableFooter from '@/components/static/TableFooter.vue';
import DeleteDialog from '@/components/board/DeleteDialog.vue';
import routesNames from '@/router/routesNames';
import { NotifyType } from '@/store/models/NotifyModel';
import NotifyModule from '@/store/modules/NotifyModule';
import RoleModule from '@/store/modules/RoleModule';
import { Component, Vue } from 'vue-property-decorator';

@Component({
    components: { ApproveDialog, DeleteDialog, TableFooter },
})
export default class RoleIndex extends Vue {
    public roleDialog = false;
    public deleteDialog = false;
    public dialogData = { roleId: 0, roleName: '', roleDescription: '', roleActive: true };
    public searchRole = this.$route.query.search ? String(this.$route.query.search) : '';
    public window = { width: 0, height: 0, heightDif: 220 };

    async queryPaginate(val) {
        await RoleModule.callAllRoles(val);
        // @ts-ignore
        await this.$router.push({
            name: routesNames.boardRole,
            query: {
                page: this.roles.current_page,
                per_page: this.roles.per_page,
                search: this.searchRole,
            },
        });
    }

    public async searchRoleEvent() {
        const page = this.roles.current_page;
        const per_page = this.roles.per_page;
        const search = this.searchRole;
        await this.queryPaginate({ page, per_page, search });
    }

    clickSelectEdit(item) {
        this.dialogData = item;
        this.roleDialog = true;
    }

    clickSelectDelete(item) {
        this.dialogData = item;
        this.deleteDialog = true;
    }

    handleResize() {
        this.window.width = window.innerWidth;
        this.window.height = window.innerHeight - this.window.heightDif;
    }

    public async roleDeleteDialogTrigger(val: boolean) {
        if (!val) {
            this.deleteDialog = false;
            return;
        }

        const res = await RoleModule.deleteRole(this.dialogData.roleId);
        this.deleteDialog = false;
        NotifyModule.notify({ show: true, type: NotifyType.info, message: res.message });
    }

    get roles() {
        return RoleModule.rolesPager;
    }

    get rolesPayload() {
        return RoleModule.rolesPayload;
    }

    get loader() {
        return RoleModule.loader;
    }

    get headers() {
        return RoleModule.rolesHeaders;
    }

    async created() {
        this.handleResize();
        const page = Number(this.$route.query.page) || null;
        const per_page = Number(this.$route.query.per_page) || null;
        const search = this.searchRole;

        await RoleModule.callAllRoles({ page, per_page: per_page, search });
    }
}
</script>

<style lang="scss">
.v-data-table {
    border-radius: 15px !important;
}
.v-data-table header {
    border-radius: 15px !important;
}
</style>
