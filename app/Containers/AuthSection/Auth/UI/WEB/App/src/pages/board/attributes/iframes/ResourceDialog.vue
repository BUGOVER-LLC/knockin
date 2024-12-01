<!-- @format -->

<template>
    <v-card class="rounded-lg">
        <v-card-title class="accent">
            <span>
                {{
                    editData
                        ? `${$tc('words.edit', 1)} ${$tc('app.subtypes', 2).toLowerCase()}`
                        : `${$tc('words.create', 1)} ${$tc('app.subtypes', 1).toLowerCase()}`
                }}
            </span>
            <v-spacer />
            <v-btn icon @click="dialog = false">
                <v-icon v-text="'mdi-close'" color="grey darken-3" />
            </v-btn>
        </v-card-title>
        <v-divider class="mb-6" />
        <ValidationObserver :ref="ref" v-slot="{ invalid, validated, handleSubmit, validate }">
            <v-card-text>
                <ValidationProvider
                    v-slot="{ errors }"
                    :name="$t('users.first_name')"
                    vid="resourceName"
                    rules="required"
                >
                    {{ $t('users.first_name') }} *
                    <v-text-field
                        :error-messages="errors"
                        outlined
                        filled
                        dense
                        v-model="resourceName"
                        :value="resourceName"
                    />
                </ValidationProvider>

                <ValidationProvider v-slot="{ errors }" :name="$t('words.key')" vid="resourceValue" rules="required">
                    {{ $t('words.key') }} *
                    <v-text-field
                        :error-messages="errors"
                        name="resourceValue"
                        outlined
                        filled
                        dense
                        v-model="resourceValue"
                        :value="resourceValue"
                    />
                </ValidationProvider>

                <ValidationProvider
                    v-slot="{ errors }"
                    :name="$t('words.description')"
                    vid="resourceDescription"
                    rules="max:500"
                >
                    {{ $t('words.description') }}
                    <v-text-field
                        :error-messages="errors"
                        outlined
                        filled
                        dense
                        v-model="resourceDescription"
                        :value="resourceDescription"
                    />
                </ValidationProvider>
            </v-card-text>
            <v-card-actions>
                <v-btn
                    block
                    outlined
                    class="mb-3"
                    text
                    color="primary"
                    @click="editData ? editResource(validate()) : storeResource(validate())"
                    :disabled="invalid"
                >
                    <span>{{ editData ? $t('words.edit') : $t('words.create') }}</span>
                </v-btn>
            </v-card-actions>
        </ValidationObserver>
    </v-card>
</template>

<script lang="ts">
import { OnCreated } from '@/common/contracts/OnCreated';
import { HandlerModel } from '@/store/models/HandlerModel';
import { NotifyType } from '@/store/models/NotifyModel';
import HandlerModule from '@/store/modules/HandlerModule';
import NotifyModule from '@/store/modules/NotifyModule';
import ResourceModule from '@/store/modules/ResourceModule';
import { Vue, Component, Prop, PropSync, Watch } from 'vue-property-decorator';
import { extend, ValidationObserver, ValidationProvider } from 'vee-validate';
import { numeric, required } from 'vee-validate/dist/rules';

extend('required', required);
extend('numeric', numeric);

@Component({
    components: { ValidationObserver, ValidationProvider },
})
export default class ResourceDialog extends Vue implements OnCreated {
    @Prop({ required: false, default: null }) public readonly editData;
    @PropSync('value', { required: true }) public dialog: boolean;

    public ref: string = 'createResourceForm';

    public resourceId: null | number = null;
    public resourceName: string = '';
    public resourceValue: string = '';
    public resourceDescription: string = '';
    public createdAt: null | string = null;

    public get resources() {
        return Object.assign([], ResourceModule.resources);
    }

    public async storeResource(validate: Promise<any>) {
        validate.then(async (valid: boolean) => {
            if (valid) {
                const data = {
                    resourceName: this.resourceName,
                    resourceValue: this.resourceValue,
                    resourceDescription: this.resourceDescription,
                };
                const result = await ResourceModule.createResource(data);
                this.dialog = false;
                NotifyModule.notify({ show: true, type: NotifyType.info, message: result.message });
            }
        });
    }

    @Watch('handler')
    public watchErrorHandler(val: HandlerModel) {
        if (val) {
            this.$refs.createResourceForm
                ? // @ts-ignore
                  this.$refs.createResourceForm.setErrors(val)
                : // @ts-ignore
                  this.$refs.updateResourceForm.setErrors(val);
        }
    }

    public get handler() {
        return HandlerModule.handler;
    }

    public async editResource(validate: Promise<any>) {
        validate.then(async (valid: boolean) => {
            if (valid) {
                const data = {
                    resourceId: this.resourceId,
                    resourceName: this.resourceName,
                    resourceValue: this.resourceValue,
                    resourceDescription: this.resourceDescription,
                };
                const result = await ResourceModule.editResource(data);
                this.dialog = false;
                NotifyModule.notify({ show: true, type: NotifyType.info, message: result.message });
            }
        });
    }

    private initialize() {
        if (this.editData) {
            this.ref = 'updateResourceForm';

            this.resourceId = this.editData.resourceId;
            this.resourceName = this.editData.resourceName;
            this.resourceValue = this.editData.resourceValue;
            this.resourceDescription = this.editData.resourceDescription;
            this.createdAt = this.editData.createdAt;
        } else {
            this.ref = 'createResourceForm';
        }
    }

    public async created() {
        this.initialize();
    }
}
</script>
