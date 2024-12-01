<!-- @format -->

<template>
    <v-container fluid>
        <v-card class="rounded-lg">
            <v-card-title class="accent">
                <span>{{ $t('words.edit') }} {{ $tc('menu.roles', 1) }}</span>
                <v-spacer />
            </v-card-title>
            <v-divider class="mb-7" />
            <v-card-text :style="{ height: window.height - 90 + 'px' }" class="overflow-auto">
                <ValidationObserver ref="updateRoleForm" v-slot="{ invalid, validated, handleSubmit, validate }">
                    <v-row v-if="role">
                        <v-col cols="4">
                            <ValidationProvider
                                rules="required|max:100|min:3"
                                :name="`${$tc('roles.role_name', 1)} *`"
                                vid="roleName"
                                v-slot="{ errors, valid }"
                            >
                                <v-text-field
                                    filled
                                    outlined
                                    class="rounded-md"
                                    :label="`${$tc('roles.role_name', 1)} *`"
                                    v-model="role.roleName"
                                    :error-messages="errors"
                                />
                            </ValidationProvider>
                        </v-col>
                        <v-col cols="4">
                            <ValidationProvider
                                rules="required|max:100|min:3"
                                vid="roleName"
                                :name="`${$tc('roles.role_value', 1)} *`"
                                v-slot="{ errors, valid }"
                            >
                                <v-text-field
                                    filled
                                    outlined
                                    class="rounded-md"
                                    :label="`${$tc('roles.role_value', 1)} *`"
                                    v-model="role.roleValue"
                                    :error-messages="errors"
                                />
                            </ValidationProvider>
                        </v-col>
                        <v-col cols="4">
                            <ValidationProvider
                                rules="max:300|min:3"
                                :name="$tc('roles.role_description', 1)"
                                vid="roleName"
                                v-slot="{ errors, valid }"
                            >
                                <v-textarea
                                    filled
                                    rows="1"
                                    outlined
                                    class="rounded-md"
                                    :label="$tc('roles.role_description', 1)"
                                    v-model="role.roleDescription"
                                    :error-messages="errors"
                                />
                            </ValidationProvider>
                            <div class="d-flex column float-right mr-1">
                                <v-radio-group v-model="role.hasSubordinates" class="mr-5">
                                    <v-radio :label="$tc('roles.belongs.building', 2)" :value="true" />
                                    <v-radio :label="$tc('roles.belongs.judge', 2)" :value="false" />
                                </v-radio-group>
                                <v-switch dense :label="$t('words.active')" v-model="role.roleActive" />
                            </div>
                        </v-col>
                    </v-row>
                    <v-row v-else>
                        <v-col cols="4">
                            <v-skeleton-loader type="list-item" />
                        </v-col>
                        <v-col cols="4">
                            <v-skeleton-loader type="list-item" />
                        </v-col>
                        <v-col cols="4">
                            <v-skeleton-loader type="list-item" />
                        </v-col>
                    </v-row>

                    <v-divider />
                    <PermissionsList
                        :available-permissions-data="availablePermissions"
                        :selected-permissions-data="selectedPermissions"
                        :accesses="accesses"
                        :window-height="window.height"
                        :button-text="$t('words.edit')"
                        @select="updateRole($event, validate())"
                    />
                </ValidationObserver>
            </v-card-text>
        </v-card>
    </v-container>
</template>

<script lang="ts">
import { OnCreated } from '@/common/contracts/OnCreated';
import PermissionsList from '@/components/roles/PermissionsList.vue';
import routesNames from '@/router/routesNames';
import { RoleInfoById } from '@/services/api/RoleApi';
import { NotifyType } from '@/store/models/NotifyModel';
import { IRoleModel } from '@/store/models/IRoleModel';
import NotifyModule from '@/store/modules/NotifyModule';
import RoleModule from '@/store/modules/RoleModule';
import { Vue, Component } from 'vue-property-decorator';
import { ValidationProvider, ValidationObserver } from 'vee-validate';
import _ from 'lodash';

@Component({
    components: { PermissionsList, ValidationProvider, ValidationObserver },
})
export default class EditRole extends Vue implements OnCreated {
    public selectedPermissions: [] = [];
    public availablePermissions: [] = [];
    public role: null | IRoleModel = null;
    public accesses: null | [] = null;
    public window = { width: 0, height: 0, heightDif: 120 };

    public async created() {
        this.handleResize();

        if (this.$route.params.roleId) {
            const result = await RoleInfoById(Number(this.$route.params.roleId));
            this.role = result._payload.role;
            this.accesses = result._payload.accessors;
            this.availablePermissions = result._payload.availablePermissions;
            this.selectedPermissions = result._payload.selectedPermissions;

            _.differenceBy(this.selectedPermissions, this.availablePermissions, []);
        }
    }

    handleResize() {
        this.window.width = window.innerWidth;
        this.window.height = window.innerHeight - this.window.heightDif;
        window.addEventListener('resize', this.handleResize);
    }

    public async updateRole(permissions: number[], validate: Promise<any>) {
        validate.then(async (result: boolean) => {
            if (this.role) {
                this.role.assignedPermissions = permissions;
                const res = await RoleModule.updateRole(this.role);
                NotifyModule.notify({ show: true, message: res.message, type: NotifyType.info });
                await this.$router.push({ name: routesNames.boardRole });
            }
        });
    }
}
</script>
