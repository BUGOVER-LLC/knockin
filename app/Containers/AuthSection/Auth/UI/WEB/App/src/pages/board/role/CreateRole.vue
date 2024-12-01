<!-- @format -->

<template>
    <v-container fluid>
        <v-card class="rounded-lg">
            <v-card-title class="accent">
                <span>{{ $tc('roles.new', 1) }}</span>
                <v-spacer />
            </v-card-title>
            <v-divider class="mb-7" />
            <v-card-text :style="{ height: window.height - 90 + 'px' }" class="overflow-auto">
                <ValidationObserver ref="createRoleForm" v-slot="{ invalid, validated, handleSubmit, validate }">
                    <v-row>
                        <v-col cols="4">
                            <ValidationProvider
                                rules="required|max:100|min:3"
                                :name="`${$tc('roles.role_name', 1)} *`"
                                v-slot="{ errors, valid }"
                                vid="roleKey"
                            >
                                <v-text-field
                                    outlined
                                    class="rounded-md"
                                    :label="`${$tc('roles.role_name', 1)} *`"
                                    v-model="roleModel.roleName"
                                    filled
                                    :error-messages="errors"
                                />
                            </ValidationProvider>
                        </v-col>
                        <v-col cols="4">
                            <ValidationProvider
                                rules="required|max:100|min:3"
                                :name="`${$tc('roles.role_value', 1)} *`"
                                vid="roleName"
                                v-slot="{ errors, valid }"
                            >
                                <v-text-field
                                    filled
                                    outlined
                                    class="rounded-md"
                                    :label="`${$tc('roles.role_value', 1)} *`"
                                    v-model="roleModel.roleValue"
                                    :error-messages="errors"
                                />
                            </ValidationProvider>
                        </v-col>
                        <v-col cols="4">
                            <ValidationProvider
                                rules="max:300|min:3"
                                :name="$tc('roles.role_description', 1)"
                                vid="roleDescription"
                                v-slot="{ errors, valid }"
                            >
                                <v-textarea
                                    filled
                                    rows="1"
                                    outlined
                                    class="rounded-md"
                                    :label="$tc('roles.role_description', 1)"
                                    v-model="roleModel.roleDescription"
                                    :error-messages="errors"
                                />
                            </ValidationProvider>
                            <div class="d-flex column float-right mr-1">
                                <v-radio-group v-model="roleModel.hasSubordinates" class="mr-5">
                                    <v-radio :label="$tc('roles.belongs.building', 2)" :value="false" />
                                    <v-radio :label="$tc('roles.belongs.judge', 2)" :value="true" />
                                </v-radio-group>
                                <v-switch dense :label="$t('words.active')" v-model="roleModel.roleActive" />
                            </div>
                        </v-col>
                    </v-row>
                    <v-divider />

                    <PermissionsList
                        v-if="permissions"
                        :available-permissions-data="permissions"
                        :window-height="window.height"
                        :accesses="accesses"
                        @select="createRole($event, validate())"
                        :button-text="$t('words.create')"
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
import { RoleModel } from '@/store/models/IRoleModel';
import { NotifyType } from '@/store/models/NotifyModel';
import NotifyModule from '@/store/modules/NotifyModule';
import PermissionModule from '@/store/modules/PermissionModule';
import RoleModule from '@/store/modules/RoleModule';
import { Component, Vue } from 'vue-property-decorator';
import { ValidationProvider, ValidationObserver } from 'vee-validate';

@Component({
    components: { PermissionsList, ValidationProvider, ValidationObserver },
})
export default class CreateRole extends Vue implements OnCreated {
    public window = { width: 0, height: 0, heightDif: 120 };
    public roleModel: RoleModel = new RoleModel();
    public accesses: null | [] = null;

    public get permissions() {
        return PermissionModule.permissionPayload;
    }

    handleResize() {
        this.window.width = window.innerWidth;
        this.window.height = window.innerHeight - this.window.heightDif;
        window.addEventListener('resize', this.handleResize);
    }

    public async created() {
        this.handleResize();
        const res = await PermissionModule.freePermissions();
        this.accesses = res.accessor;
    }

    public async createRole(permissions: number[], validate: Promise<any>) {
        validate.then(async (result: boolean) => {
            if (result) {
                this.roleModel.assignedPermissions = permissions;
                const res = await RoleModule.createRole(this.roleModel);
                NotifyModule.notify({ show: true, message: res.message, type: NotifyType.info });
                await this.$router.push({ name: routesNames.boardRole });
            }
        });
    }
}
</script>
