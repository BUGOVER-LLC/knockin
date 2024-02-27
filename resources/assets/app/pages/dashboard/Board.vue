<!-- @format -->

<template lang="html">
    <div>
        <SystemBar />

        <AppBar />

        <LeftPanel />

        <v-main>
            <v-container fluid>
                <Search />

                <MessagingContent />

                <MessagingWriter />
            </v-container>
        </v-main>

        <RightPanel />
    </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

import AppBar from '@/dashboard/components/AppBar.vue';
import LeftPanel from '@/dashboard/components/LeftPanel.vue';
import MessagingContent from '@/dashboard/components/MessagingContent.vue';
import MessagingWriter from '@/dashboard/components/MessagingWriter.vue';
import RightPanel from '@/dashboard/components/RightPanel.vue';
import Search from '@/dashboard/components/Search.vue';
import SystemBar from '@/dashboard/components/SystemBar.vue';

@Component({
    components: { MessagingWriter, AppBar, SystemBar, LeftPanel, RightPanel, Search, MessagingContent },
})
export default class Board extends Vue {
    created() {}
}
</script>

<style lang="scss" scoped></style>
