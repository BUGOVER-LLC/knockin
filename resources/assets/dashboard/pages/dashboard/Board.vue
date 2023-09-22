<!-- @format -->

<template lang="html">
    <div>
        <SystemBar/>

        <AppBar/>

        <LeftPanel/>

        <v-main>
            <v-container fluid>
                <Search/>

                <MessagingContent/>

                <MessagingWriter/>
            </v-container>
        </v-main>

        <RightPanel/>
    </div>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';
import MessagingContent from '@/components/MessagingContent.vue';
import Search from '@/components/Search.vue';
import RightPanel from '@/components/RightPanel.vue';
import LeftPanel from '@/components/LeftPanel.vue';
import SystemBar from '@/components/SystemBar.vue';
import AppBar from '@/components/AppBar.vue';
import MessagingWriter from '@/components/MessagingWriter.vue';

@Component({
    components: {MessagingWriter, AppBar, SystemBar, LeftPanel, RightPanel, Search, MessagingContent},
})
export default class Board extends Vue {
    created() {
    }
}
</script>

<style lang="scss" scoped></style>
