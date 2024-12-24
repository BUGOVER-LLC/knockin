<!-- @format -->

<template>
    <v-card class="rounded-lg" :loading="loader">
        <v-form>
            <v-card-title class="accent darken-1 rounded-t-lg">
                <span
                    ><b>{{ $tc('words.invitations', 2) }}</b
                    >: {{ user.profile.firstName }} {{ user.profile.lastName }}</span
                >
                <v-spacer />
                <v-btn icon @click="closeDialog">
                    <v-icon v-text="'mdi-close'" color="grey darken-3" />
                </v-btn>
            </v-card-title>

            <v-card-text :style="{ height: window.height + 'px' }" class="overflow-auto">
                <v-timeline v-for="invitation in invitations" :key="invitation.userInvitationId">
                    <v-timeline-item color="red" left icon="mdi-close">
                        <span>{{ $t('words.sent') }}:</span>
                        {{ invitation.passed | formatData }}
                    </v-timeline-item>
                    <v-timeline-item
                        :color="invitation.acceptedAt ? 'green' : 'red'"
                        right
                        :icon="invitation.acceptedAt ? 'mdi-check' : 'mdi-close'"
                    >
                        <span>{{ $t('words.accepted') }}:</span>
                        {{ invitation.acceptedAt | formatData }}
                    </v-timeline-item>
                </v-timeline>
                <v-divider />
            </v-card-text>
        </v-form>
    </v-card>
</template>

<script lang="ts">
import { OnCreated } from '@/common/contracts/OnCreated';
import { UserEditResponse, UserInvitationsModel } from '@/store/models/UserModel';
import UserModule from '@/store/modules/UserModule';
import { Vue, Component, Emit, Prop } from 'vue-property-decorator';
import moment from 'moment';
import _ from 'lodash';

@Component({
    filters: {
        formatData(value) {
            return value ? moment(String(value)).format('HH:mm:ss MM/DD/YYYY') : '';
        },
    },
})
export default class InvitationsDialog extends Vue implements OnCreated {
    @Prop({ required: true }) protected readonly user: UserEditResponse;

    public window = {
        width: 0,
        height: 0,
        heightDif: 800,
    };

    @Emit('closeDialog')
    public closeDialog() {
        return false;
    }

    handleResize() {
        this.window.width = window.innerWidth;
        this.window.height = window.innerHeight - this.window.heightDif;
        window.addEventListener('resize', this.handleResize);
    }

    public get invitations(): Record<string, UserInvitationsModel> {
        const invitations = UserModule.usersInvitations;

        return _.filter(invitations, { userId: this.user.user.userId });
    }

    public get loader() {
        return UserModule.loader;
    }

    public async created() {
        this.handleResize();
        await UserModule.getAllInvitations(this.user.user.userId);
    }
}
</script>
