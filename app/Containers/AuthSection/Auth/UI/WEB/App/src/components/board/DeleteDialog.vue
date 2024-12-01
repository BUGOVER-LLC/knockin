<!-- @format -->

<template>
    <v-card>
        <v-card-title class="blue-grey">
            <span
                >Delete role <b class="text-decoration-underline">{{ role.roleName }}</b></span
            >
        </v-card-title>
        <v-divider />

        <v-card-text>
            <div class="d-flex align-center justify-center pa-8">
                <v-btn v-text="'cancel'" @click="cancelRole" outlined><v-icon /></v-btn>
                <v-btn v-text="'delete'" class="error" @click="deleteRole">
                    <v-icon v-text="'mdi-delete'" />
                </v-btn>
            </div>
        </v-card-text>
    </v-card>
</template>

<script lang="ts">
import { IRoleModel } from '@/store/models/IRoleModel';
import { Vue, Component, Prop, Emit } from 'vue-property-decorator';

@Component({})
export default class DeleteDialog extends Vue {
    @Prop({ required: true }) public role: IRoleModel;

    public result: boolean = false;

    public deleteRole() {
        this.result = true;
        this.triggerEmit();
    }

    public cancelRole() {
        this.result = false;
        this.triggerEmit();
    }

    @Emit('trigger')
    public triggerEmit(): boolean {
        return this.result;
    }
}
</script>
