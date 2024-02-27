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

import AppBar from '@/app/components/AppBar.vue';
import LeftPanel from '@/app/components/LeftPanel.vue';
import MessagingContent from '@/app/components/MessagingContent.vue';
import MessagingWriter from '@/app/components/MessagingWriter.vue';
import RightPanel from '@/app/components/RightPanel.vue';
import Search from '@/app/components/Search.vue';
import SystemBar from '@/app/components/SystemBar.vue';

@Component({
    components: { MessagingWriter, AppBar, SystemBar, LeftPanel, RightPanel, Search, MessagingContent },
})
export default class Board extends Vue {
    created() {}
}
</script>

<style lang="scss" scoped></style>
