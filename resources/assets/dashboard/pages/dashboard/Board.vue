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

import AppBar from '@/components/AppBar.vue';
import LeftPanel from '@/components/LeftPanel.vue';
import MessagingContent from '@/components/MessagingContent.vue';
import MessagingWriter from '@/components/MessagingWriter.vue';
import RightPanel from '@/components/RightPanel.vue';
import Search from '@/components/Search.vue';
import SystemBar from '@/components/SystemBar.vue';

@Component({
    components: { MessagingWriter, AppBar, SystemBar, LeftPanel, RightPanel, Search, MessagingContent },
})
export default class Board extends Vue {
    created() {}
}
</script>

<style lang="scss" scoped></style>
