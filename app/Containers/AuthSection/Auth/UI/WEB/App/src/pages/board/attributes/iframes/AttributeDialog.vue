<!-- @format -->

<template>
    <v-card class="rounded-lg">
        <v-card-title class="accent">
            <span>
                {{
                    editData
                        ? `${$tc('words.edit', 1)} ${$tc('app.branches', 2).toLowerCase()}`
                        : `${$tc('words.create', 1)} ${$tc('app.branches', 1).toLowerCase()}`
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
                    vid="attributeName"
                    rules="required"
                >
                    <span>{{ $t('users.first_name') }} *</span>
                    <v-text-field
                        :error-messages="errors"
                        outlined
                        filled
                        dense
                        v-model="attributeName"
                        :value="attributeName"
                    />
                </ValidationProvider>

                <ValidationProvider v-slot="{ errors }" :name="$t('words.key')" vid="attributeValue" rules="required">
                    <span>{{ $t('words.key') }} *</span>
                    <v-text-field
                        :error-messages="errors"
                        outlined
                        filled
                        dense
                        v-model="attributeValue"
                        :value="attributeValue"
                    />
                </ValidationProvider>

                <ValidationProvider
                    v-slot="{ errors }"
                    :name="$t('words.description')"
                    vid="attributeDescription"
                    rules="max:500"
                >
                    <span>{{ $t('words.description') }}</span>
                    <v-text-field
                        :error-messages="errors"
                        outlined
                        filled
                        dense
                        v-model="attributeDescription"
                        :value="attributeDescription"
                    />
                </ValidationProvider>

                <ValidationProvider v-slot="{ errors }" :name="$tc('app.subtypes', 1)" vid="resourceId" rules="numeric">
                    <span>{{ $tc('app.subtypes', 1) }} *</span>
                    <v-select
                        :error-messages="errors"
                        v-model="resourceId"
                        :value="resourceId"
                        outlined
                        dense
                        filled
                        :items="resources"
                        item-text="resourceName"
                        item-value="resourceId"
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
                    @click="editData ? editAttribute(validate()) : storeAttribute(validate())"
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
import AttributeModule from '@/store/modules/AttributeModule';
import HandlerModule from '@/store/modules/HandlerModule';
import NotifyModule from '@/store/modules/NotifyModule';
import ResourceModule from '@/store/modules/ResourceModule';
import { Vue, Component, Prop, PropSync, Watch } from 'vue-property-decorator';
import { ValidationObserver, ValidationProvider } from 'vee-validate';

@Component({
    components: { ValidationObserver, ValidationProvider },
})
export default class AttributeDialog extends Vue implements OnCreated {
    @Prop({ required: false, default: null }) public readonly editData;
    @PropSync('value', { required: true }) public dialog: boolean;

    public ref: string = 'createAttributeForm';

    public attributeId: null | number = null;
    public attributeName: string = '';
    public attributeValue: string = '';
    public attributeDescription: string = '';
    public resourceId: null | number = null;
    public createdAt: null | string = null;

    public get resources() {
        return Object.assign([], ResourceModule.resources);
    }

    @Watch('handler')
    public watchErrorHandler(val: HandlerModel) {
        if (val) {
            this.$refs.createAttributeForm
                ? // @ts-ignore
                  this.$refs.createAttributeForm.setErrors(val)
                : // @ts-ignore
                  this.$refs.updateAttributeForm.setErrors(val);
        }
    }

    public get handler() {
        return HandlerModule.handler;
    }

    public async storeAttribute(validate: Promise<any>) {
        validate.then(async (valid: boolean) => {
            if (valid) {
                let data = {
                    attributeName: this.attributeName,
                    attributeValue: this.attributeValue,
                    attributeDescription: this.attributeDescription,
                    resourceId: this.resourceId,
                };
                let result = await AttributeModule.createAttribute(data);
                this.dialog = false;
                NotifyModule.notify({ show: true, type: NotifyType.info, message: result.message });
            }
        });
    }

    public async editAttribute(validate: Promise<any>) {
        validate.then(async (valid: boolean) => {
            if (valid) {
                let data = {
                    resourceId: this.resourceId,
                    attributeId: this.attributeId,
                    attributeName: this.attributeName,
                    attributeValue: this.attributeValue,
                    attributeDescription: this.attributeDescription,
                };
                let result = await AttributeModule.editAttribute(data);
                this.dialog = false;
                NotifyModule.notify({ show: true, type: NotifyType.info, message: result.message });
            }
        });
    }

    private initialize() {
        if (this.editData) {
            this.ref = 'updateAttributeForm';

            this.attributeId = this.editData.attributeId;
            this.attributeName = this.editData.attributeName;
            this.attributeValue = this.editData.attributeValue;
            this.attributeDescription = this.editData.attributeDescription;
            this.resourceId = this.editData.resourceId;
            this.createdAt = this.editData.createdAt;
        } else {
            this.ref = 'createAttributeForm';
        }
    }

    public async created() {
        this.initialize();
    }
}
</script>
