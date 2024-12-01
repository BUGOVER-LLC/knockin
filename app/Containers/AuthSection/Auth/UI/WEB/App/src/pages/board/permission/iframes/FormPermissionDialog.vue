<!-- @format -->

<template>
    <v-card class="rounded-lg">
        <v-card-title class="blue-grey">
            <span>{{ $tc('permissions.new', 1) }}</span>
            <v-spacer />
            <v-btn icon @click="closeDialog">
                <v-icon v-text="'mdi-close'" color="grey darken-3" />
            </v-btn>
        </v-card-title>

        <v-divider class="mb-5" />

        <ValidationObserver ref="permissionForm" v-slot="{ invalid, validated, handleSubmit, validate }">
            <v-card-text>
                <v-form autocomplete="off">
                    <ValidationProvider
                        rules="required|max:150|min:3"
                        :name="$t('users.first_name')"
                        vid="permissionName"
                        v-slot="{ errors, valid }"
                    >
                        <v-text-field
                            outlined
                            filled
                            color="black"
                            v-model="permissionData.permissionName"
                            :label="$t('users.first_name')"
                            :error-messages="errors"
                        />
                    </ValidationProvider>
                    <ValidationProvider
                        rules="required|max:50|min:3"
                        :name="$t('words.key')"
                        vid="permissionName"
                        v-slot="{ errors, valid }"
                    >
                        <v-text-field
                            outlined
                            color="black"
                            filled
                            v-model="permissionData.permissionValue"
                            :label="$t('words.key')"
                            :error-messages="errors"
                        />
                    </ValidationProvider>
                    <ValidationProvider
                        rules="max:500|min:1"
                        :name="$t('words.description')"
                        vid="permissionDescription"
                        v-slot="{ errors, valid }"
                    >
                        <v-textarea
                            outlined
                            color="black"
                            filled
                            rows="3"
                            v-model="permissionData.permissionDescription"
                            :label="$t('words.description')"
                            :error-messages="errors"
                        />
                        <span class="error">{{ errors[0] }}</span>
                    </ValidationProvider>

                    <v-spacer />
                    <v-switch dense light :label="$t('words.active')" v-model="permissionData.permissionActive" />
                </v-form>
            </v-card-text>
            <v-divider />
            <v-card-actions>
                <v-btn
                    @click="permissionData.permissionId ? updatePermission(validate()) : createPermission(validate())"
                    v-text="permissionData.permissionId ? $t('words.edit') : $t('words.create')"
                    :disabled="invalid"
                    block
                    depressed
                    text
                />
            </v-card-actions>
        </ValidationObserver>
    </v-card>
</template>

<script lang="ts">
import { HandlerModel } from '@/store/models/HandlerModel';
import { PermissionModel } from '@/store/models/PermissionModel';
import HandlerModule from '@/store/modules/HandlerModule';
import { Vue, Component, PropSync, Emit, Watch } from 'vue-property-decorator';
import NotifyModule from '@/store/modules/NotifyModule';
import { NotifyType } from '@/store/models/NotifyModel';
import { ValidationObserver, ValidationProvider, extend } from 'vee-validate';
import { max, min, required } from 'vee-validate/dist/rules';
import PermissionModule from '@/store/modules/PermissionModule';

extend('required', required);
extend('min', min);
extend('max', max);

@Component({
    components: { ValidationObserver, ValidationProvider },
})
export default class FormPermissionDialog extends Vue {
    @PropSync('permissionDataProp', { required: false }) public permissionData!: PermissionModel;

    public async createPermission(validate: Promise<any>) {
        validate.then(async (valid: boolean) => {
            if (valid) {
                const result = await PermissionModule.createPermission(this.permissionData);
                NotifyModule.notify({ message: result.message, type: NotifyType.message, show: true });
                this.closeDialog();
            }
        });
    }

    public async updatePermission(validate: Promise<any>) {
        validate.then(async (valid: boolean) => {
            if (valid) {
                const result = await PermissionModule.updatePermission(this.permissionData);
                NotifyModule.notify({ message: result.message, type: NotifyType.message, show: true });
                this.closeDialog();
            }
        });
    }

    @Watch('handler')
    public watchErrorHandler(val: HandlerModel) {
        if (val) {
            // @ts-ignore
            this.$refs.permissionForm.setErrors(val);
        }
    }

    public get handler() {
        return HandlerModule.handler;
    }

    @Emit('closeDialog')
    public closeDialog() {
        return true;
    }
}
</script>
