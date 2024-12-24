<!-- @format -->

<template>
    <v-card>
        <v-card-title class="blue-grey">
            <span
                >Delete role <b class="text-decoration-underline">{{ permission.permissionName }}</b></span
            >
        </v-card-title>
        <v-divider />

        <v-card-text>
            <div class="d-flex align-center justify-center pa-8">
                <v-btn v-text="'cancel'" @click="cancelPermission" outlined><v-icon /></v-btn>
                <v-btn v-text="'delete'" class="error" @click="deletePermission">
                    <v-icon v-text="'mdi-delete'" />
                </v-btn>
            </div>
        </v-card-text>
    </v-card>
</template>

<script lang="ts">
import { PermissionModel } from '@/store/models/PermissionModel';
import { Vue, Component, Prop, Emit } from 'vue-property-decorator';

@Component({})
export default class DeleteDialog extends Vue {
    @Prop({ required: true })
    public permission: PermissionModel;

    public result: boolean = false;

    public deletePermission() {
        this.result = true;
        this.triggerEmit();
    }

    public cancelPermission() {
        this.result = false;
        this.triggerEmit();
    }

    @Emit('trigger')
    public triggerEmit(): boolean {
        return this.result;
    }
}
</script>
