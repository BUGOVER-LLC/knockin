<!-- @format -->

<template lang="html">
    <div>
        <SystemBar />

        <AppBar />

        <LeftPanel />

        <RightPanel />

        <v-main>
            <v-container fluid>
                <Search />

                <MessagingContent />

                <MessagingWriter />
            </v-container>
        </v-main>
    </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import MessagingContent from '@/app/components/MessagingContent.vue';
import Search from '@/app/components/Search.vue';
import RightPanel from '@/app/components/RightPanel.vue';
import LeftPanel from '@/app/components/LeftPanel.vue';
import SystemBar from '@/app/components/SystemBar.vue';
import AppBar from '@/app/components/AppBar.vue';
import MessagingWriter from '@/app/components/MessagingWriter.vue';

@Component({
    components: { MessagingWriter, AppBar, SystemBar, LeftPanel, RightPanel, Search, MessagingContent },
})
export default class Board extends Vue {
    created() {
        console.log(34565445352423324234);
    }
}
</script>

<style scoped lang="scss"></style>
