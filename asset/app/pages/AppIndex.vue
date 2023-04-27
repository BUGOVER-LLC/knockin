<!-- @format -->

<template>
    <v-app id="inspire">
        <SystemBar />

        <AppBar />

        <LeftPanel />

        <RightPanel />

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

@Component({
    components: { RightPanel, LeftPanel, SystemBar, AppBar, MessagingContent, MessagingWriter, DrawerDrag },
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

<style scoped lang="scss">
.selected-member-style {
    background-color: #e0e0e0;
    color: #343232;
}
</style>
