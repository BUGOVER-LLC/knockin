<!-- @format -->

<template lang="html" src="./EdiUserDialog.html" />

<script lang="ts">
import { OnCreated } from '@/common/contracts/OnCreated';
import { UserEditModel, UserEditModelInstance } from '@/services/api/Model/UserEditModel';
import { PersonType } from '@/services/enums/PersonType';
import { AttributeModel } from '@/store/models/AttributeModel';
import { NotifyType } from '@/store/models/NotifyModel';
import { IRoleModel } from '@/store/models/IRoleModel';
import { UserModel } from '@/store/models/UserModel';
import AttributeModule from '@/store/modules/AttributeModule';
import NotifyModule from '@/store/modules/NotifyModule';
import RoleModule from '@/store/modules/RoleModule';
import UserModule from '@/store/modules/UserModule';
import { Vue, Component, PropSync, Prop, Watch } from 'vue-property-decorator';
import { extend, ValidationObserver, ValidationProvider } from 'vee-validate';
import { email, max, min, numeric, required } from 'vee-validate/dist/rules';
import _ from 'lodash';

extend('max', max);
extend('min', min);
extend('numeric', numeric);
extend('required', required);
extend('email', email);
@Component({
    components: { ValidationProvider, ValidationObserver },
    methods: {
        parentItemText(item) {
            return `${item.firstName} ${item.lastName} ${item.patronymic}`;
        },
    },
})
export default class EditUserDialog extends Vue implements OnCreated {
    @PropSync('value', { required: true }) public dialog: boolean;
    @Prop({ required: true }) public readonly user: UserModel;

    public userModel: UserEditModel = new UserEditModelInstance();
    public selectedRole: IRoleModel | null = null;
    public loadData: boolean = false;

    public get roles(): Record<string, IRoleModel> {
        return RoleModule.roles;
    }

    public get attributes(): AttributeModel[] {
        return Object.assign([], AttributeModule.attributes);
    }

    public get parents(): UserModel[] {
        return Object.assign([], UserModule.usersByRole);
    }

    @Watch('userModel.roleId')
    private checkRoleWatcher(roleId: number) {
        this.setSelectedRoleValue(roleId);
        this.getAttributeByChangesRole();
    }

    private setSelectedRoleValue(roleId: number): void {
        this.selectedRole = _.find(this.roles, { roleId: roleId });
    }

    private async getAttributeByChangesRole(): Promise<void> {
        if (this.selectedRole?.roleValue) {
            if (this.selectedRole.hasSubordinates) {
                this.userModel.parentId = null;
            } else {
                await UserModule.usersByRoleValue(this.selectedRole.roleValue);
                this.userModel.attributeId = null;
            }
        }
    }

    public editUser(validate: Promise<any>): void {
        validate.then(async (valid: boolean) => {
            if (valid) {
                this.loadData = true;
                try {
                    const result = await UserModule.editUser(this.userModel);
                    NotifyModule.notify({ show: true, type: NotifyType.info, message: result.message });
                    this.loadData = false;
                    this.dialog = false;
                } catch (error) {}
            }
        });
    }

    private initializeData(): void {
        this.userModel = {
            userId: this.user.userId,
            email: this.user.email,
            roleId: this.user.roleId,
            attributeId: this.user.attributeId,
            parentId: this.user.parentId,
            active: this.user.active,
            person: this.user.profileId ? PersonType.users : PersonType.citizens,
        };
    }

    private async initializeModels() {
        if (!this.roles.length) {
            await RoleModule.getAllRoles();
            this.setSelectedRoleValue(this.user.roleId);
        }

        if (!this.attributes.length) {
            await AttributeModule.initAttributes();
        }

        if (!this.parents.length && this.selectedRole && !this.selectedRole.hasSubordinates) {
            await UserModule.usersByRoleValue(this.selectedRole.roleValue);
        }
    }

    public async created(): Promise<void> {
        this.loadData = true;
        this.initializeData();
        await this.initializeModels();
        this.loadData = false;
    }
}
</script>
