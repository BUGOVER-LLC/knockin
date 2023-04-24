<!-- @format -->

<template>
    <v-app id="inspire">
        <SystemBar></SystemBar>

        <AppBar></AppBar>

        <DrawerDrag :right="false">
            <template v-slot:toolbar>
                <v-toolbar color="grey lighten-4" class="pl-16" height="70">
                    <v-toolbar-title class="headline text-uppercase">
                        <span>t a</span><span class="font-weight-light"> b s </span>
                    </v-toolbar-title>
                </v-toolbar>
            </template>

            <template v-slot:content>
                <v-navigation-drawer v-model="drawer" app color="grey lighten-3" mini-variant>
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

                <v-sheet color="grey lighten-5" height="128" width="100%" />

                <v-list class="pl-16" shaped>
                    <v-list-item v-for="n in 5" :key="n" link>
                        <v-list-item-content>
                            <v-list-item-title>Item {{ n }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
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

        <MessagingContent></MessagingContent>

        <MessagingWriter></MessagingWriter>
    </v-app>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import DrawerDrag from '@/app/components/DrawerDrag.vue';
import MessagingWriter from '@/app/components/MessagingWriter.vue';
import MessagingContent from '@/app/components/MessagingContent.vue';
import AppBar from '@/app/components/AppBar.vue';
import SystemBar from '@/app/components/SystemBar.vue';

@Component({
    components: { SystemBar, AppBar, MessagingContent, MessagingWriter, DrawerDrag },
})
export default class GreetingIndex extends Vue {
    private drawer: boolean = true;
}
</script>

<style scoped>
.v-navigation-drawer {
    height: 100vh;
    top: 0 !important;
    max-height: calc(100% - 24px);
    transform: translateX(0%);
    width: 56px;
}
</style>
