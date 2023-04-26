<!-- @format -->

<template>
    <v-app id="inspire">
        <SystemBar />

        <AppBar />

        <DrawerDrag :right="false">
            <template v-slot:toolbar>
                <v-toolbar color="grey lighten-4" class="pl-16" flat height="70">
                    <v-toolbar-title class="headline text-uppercase">
                        <span>u s</span><span class="font-weight-light"> e r s </span>
                    </v-toolbar-title>
                </v-toolbar>
            </template>

            <template v-slot:content>
                <v-navigation-drawer v-if="getWorkspaceCount" v-model="drawer" app color="grey lighten-3" mini-variant>
                    <v-avatar class="d-block text-center mx-auto mt-4" color="grey darken-1" size="36" />

                    <v-divider class="mx-3 my-5" />

                    <v-avatar
                        v-for="n in 6"
                        :key="n"
                        class="d-block text-center mx-auto mb-9"
                        color="grey lighten-1"
                        size="28"
                    />
                </v-navigation-drawer>

                <v-list class="pl-14" shaped>
                    <v-list-item v-for="n in 5" :key="n" link selectable active-class="green lighten-3">
                        <v-list-item-content>
                            <v-list-item-title>Item {{ n }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>

                    <div style="position: absolute; bottom: 10px; width: 80%; right: 1px">
                        <v-divider />
                        <v-skeleton-loader class="mt-2" type="list-item-avatar" />
                    </div>
                </v-list>
            </template>
        </DrawerDrag>

        <DrawerDrag :mini="true">
            <template v-slot:toolbar>
                <v-toolbar color="grey lighten-4" height="70">
                    <v-toolbar-title class="headline text-uppercase">
                        <span>t a</span><span class="font-weight-light"> b s </span>
                    </v-toolbar-title>
                </v-toolbar>
            </template>

            <template v-slot:content>
                <v-tabs>
                    <v-tab v-for="n in 3" :key="n"> Item {{ n }} </v-tab>
                    <v-tab-item v-for="n in 3" :key="n">
                        <v-card flat>
                            <v-card-text></v-card-text>
                        </v-card>
                    </v-tab-item>
                </v-tabs>
            </template>
        </DrawerDrag>

        <MessagingContent />

        <MessagingWriter @initMsg="sendMessage($event)" />
    </v-app>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import DrawerDrag from '@/app/components/DrawerDrag.vue';
import MessagingWriter from '@/app/components/MessagingWriter.vue';
import MessagingContent from '@/app/components/MessagingContent.vue';
import AppBar from '@/app/components/AppBar.vue';
import SystemBar from '@/app/components/SystemBar.vue';
import Workspace from '@/app/store/modules/Workspace';
import { MainComponent } from '@/app/@core/Main/MainComponent';

@Component({
    components: { SystemBar, AppBar, MessagingContent, MessagingWriter, DrawerDrag },
})
export default class GreetingIndex extends Vue implements MainComponent {
    private drawer: boolean = true;
    private messages: object = [];
    private window = {
        width: 0,
        height: 0,
    };

    private sendMessage(message) {
        this.messages = message;
    }

    private getWorkspaceCount(): number {
        return Workspace.count;
    }

    handleResize() {}

    created(): void {}

    mounted(): void {
        window.addEventListener('resize', this.handleResize);
    }
}
</script>

<style scoped lang="scss">
.v-navigation-drawer {
    height: 100vh;
    top: 0 !important;
    max-height: 100% !important;
    transform: translateX(0%);
    width: 56px;
}
</style>
