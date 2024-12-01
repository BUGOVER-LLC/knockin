<!-- @format -->

<template>
    <div class="ma-0 pa-0">
        <NotificationComponents />

        <AppBar @toggleProfile="profile = $event" />

        <LeftPanel />

        <v-main class="grey lighten-3 fill-height">
            <v-container fluid fill-height>
                <v-slide-x-transition mode="out-in">
                    <router-view />
                </v-slide-x-transition>
            </v-container>
        </v-main>

        <ProfileInfo v-if="profile" />
    </div>
</template>

<script lang="ts">
import { OnCreated } from '@/common/contracts/OnCreated';
import ProfileInfo from '@/components/started/ProfileInfo.vue';
import { ProfileModel } from '@/store/models/ProfileModel';
import ProfileModule from '@/store/modules/ProfileModule';
import { Component, Vue, Prop } from 'vue-property-decorator';
import AppBar from '@/components/board/AppBar.vue';
import LeftPanel from '@/components/board/LeftPanel.vue';
import NotificationComponents from '@/components/static/NotificationComponents.vue';

@Component({
    components: { ProfileInfo, NotificationComponents, AppBar, LeftPanel },
})
export default class Index extends Vue implements OnCreated {
    @Prop({ required: false }) private producer: null | ProfileModel;

    public profile: boolean = false;

    public async created() {
        if (this.producer) {
            ProfileModule.addProfileData(this.producer);
        } else {
            await ProfileModule.emitProfileData();
        }
    }
}
</script>
