<!-- @format -->

<template>
    <v-app id="inspire">
        <SystemBar />

        <AppBar />

        <LeftPanel />

        <RightPanel />

        <Search />

        <MessagingContent />

        <MessagingWriter />
    </v-app>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import DrawerDrag from '@/app/components/DrawerDrag.vue';
import MessagingWriter from '@/app/components/MessagingWriter.vue';
import MessagingContent from '@/app/components/MessagingContent.vue';
import AppBar from '@/app/components/AppBar.vue';
import SystemBar from '@/app/components/SystemBar.vue';
import { MainComponent } from '@/app/@core/Main/MainComponent';
import LeftPanel from '@/app/components/LeftPanel.vue';
import RightPanel from '@/app/components/RightPanel.vue';
import Search from '@/app/components/Search.vue';

@Component({
    components: { Search, RightPanel, LeftPanel, SystemBar, AppBar, MessagingContent, MessagingWriter, DrawerDrag },
})
export default class GreetingIndex extends Vue implements MainComponent {
    private messages: object = [];
    private window = {
        width: 0,
        height: 0,
    };

    handleResize() {}

    created(): void {}

    mounted(): void {
        window.addEventListener('resize', this.handleResize);
    }
}
</script>

<style scoped lang="scss"></style>
