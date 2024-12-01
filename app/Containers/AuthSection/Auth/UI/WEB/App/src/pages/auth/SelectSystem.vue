<!-- @format -->

<template>
    <div class="auth-wrapper d-flex align-center justify-center pa-4 row">
        <VCard
            class="auth-card pa-4 pt-7 rounded-lg mb-16"
            max-width="650"
            min-width="450"
            outlined
            max-height="500"
            elevation="4"
        >
            <v-toolbar color="darkblue" dark>
                <v-toolbar-title>{{ toolbarName }}</v-toolbar-title>

                <v-spacer />

                <v-btn
                    v-if="2 === systemSetType && systems.length"
                    icon
                    @click="systemSetType = 1 === systemSetType ? 2 : 1"
                    elevation="4"
                    color="blue"
                >
                    <v-icon>mdi-format-list-bulleted</v-icon>
                </v-btn>
            </v-toolbar>

            <v-window v-model="systemSetType">
                <v-window-item :value="1" v-if="systems.length">
                    <v-list two-line class="mb-5 overflow-auto" style="height: 310px">
                        <v-list-item-group v-model="selected" active-class="blue--text">
                            <template v-for="item in systems">
                                <v-list-item :key="item.systemId">
                                    <template v-slot:default="{ active }">
                                        <v-list-item-content>
                                            <v-list-item-title v-text="item.systemName" />

                                            <v-list-item-subtitle v-text="item.systemDomain" />
                                        </v-list-item-content>

                                        <v-list-item-action>
                                            <v-icon v-if="!active" color="grey lighten-1">mdi-check-outline</v-icon>

                                            <v-icon v-else color="yellow darken-3">mdi-check</v-icon>
                                        </v-list-item-action>
                                    </template>
                                </v-list-item>
                            </template>
                        </v-list-item-group>
                    </v-list>
                    <v-btn
                        :disabled="disabledSelectedEnv"
                        block
                        v-text="$t('auth.go')"
                        color="blue"
                        class="mb-3"
                        outlined
                        @click="sendSelectedSystem()"
                    />
                    <span
                        v-text="$t('auth.or_create_new')"
                        class="text-decoration-underline black--text pointer"
                        @click="systemSetType = 1 === systemSetType ? 2 : 1"
                    />
                </v-window-item>

                <v-window-item :value="2">
                    <div class="mt-6">
                        <ValidationObserver
                            ref="createNewSystemForm"
                            v-slot="{ invalid, validated, handleSubmit, validate }"
                        >
                            <v-form autocomplete="off">
                                <ValidationProvider
                                    rules="required|max:50|min:3"
                                    name="systemName"
                                    v-slot="{ errors, valid }"
                                >
                                    <v-text-field
                                        name="systemName"
                                        outlined
                                        dense
                                        filled
                                        :label="$t('users.first_name')"
                                        v-model="system.systemName"
                                    />
                                </ValidationProvider>

                                <ValidationProvider
                                    rules="required|max:250|min:3"
                                    name="systemDomain"
                                    v-slot="{ errors, valid }"
                                >
                                    <v-text-field
                                        name="systemDomain"
                                        outlined
                                        dense
                                        filled
                                        :label="$tc('words.domain', 1)"
                                        placeholder="example.com"
                                        v-model="system.systemDomain"
                                    />
                                </ValidationProvider>

                                <ValidationProvider name="systemLogo" rules="mimes:image/*" v-slot="{ errors, valid }">
                                    <v-file-input
                                        @change="validate"
                                        dense
                                        name="systemLogo"
                                        outlined
                                        filled
                                        :label="$tc('words.logo')"
                                        v-model="systemLogo"
                                    />
                                </ValidationProvider>

                                <v-btn
                                    :disabled="invalid"
                                    v-text="$t('words.create')"
                                    block
                                    color="blue"
                                    class="mt-5"
                                    outlined
                                    @click="sendCreatedSystem(validate())"
                                />
                            </v-form>
                        </ValidationObserver>
                    </div>
                </v-window-item>
            </v-window>
        </VCard>
    </div>
</template>

<script lang="ts">
import { OnCreated } from '@/common/contracts/OnCreated';
import routesNames from '@/router/routesNames';
import { StoreEnvironment } from '@/services/api/SystemApi';
import { ISystemModel, SystemInstance } from '@/store/models/SystemModel';
import { Vue, Component, Prop, Watch } from 'vue-property-decorator';
import { extend, ValidationObserver, ValidationProvider } from 'vee-validate';
import { email, max, min, numeric, mimes, required } from 'vee-validate/dist/rules';

extend('max', max);
extend('min', min);
extend('numeric', numeric);
extend('required', required);
extend('email', email);
extend('mimes', mimes);

@Component({
    components: { ValidationProvider, ValidationObserver },
})
export default class SelectSystem extends Vue implements OnCreated {
    @Prop({ required: true }) public systems: ISystemModel[];

    public disabledSelectedEnv: boolean = true;
    public selected = null;
    public systemSetType: number = 1;
    public system: SystemInstance = new SystemInstance();

    @Watch('selected')
    public observeSelectedEnv(val: number) {
        this.disabledSelectedEnv = undefined === val;
    }

    public get toolbarName() {
        if (1 === this.systemSetType) {
            return this.$t('auth.select_system');
        }

        return this.$t('auth.create_system');
    }

    public async sendCreatedSystem(validate: Promise<any>) {
        validate.then(async (result: boolean) => {
            if (result) {
                await StoreEnvironment(this.system);
                await this.$router.push({ name: routesNames.produceBoard });
            }
        });
    }

    public async sendSelectedSystem() {
        if (this.selected || 0 === this.selected) {
            await StoreEnvironment(this.systems[this.selected]);
            await this.$router.push({ name: routesNames.produceBoard });
        }
    }

    public created() {
        if (!this.systems.length) {
            this.systemSetType = 2;
        }
    }
}
</script>
