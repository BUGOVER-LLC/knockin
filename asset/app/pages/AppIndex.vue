<!-- @format -->

<template>
    <v-app id="inspire">
        <SystemBar></SystemBar>

        <AppBar></AppBar>

        <v-navigation-drawer v-model="drawer" app width="300">
            <v-navigation-drawer v-model="drawer" absolute color="grey lighten-3" mini-variant>
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

            <v-list class="pl-14" shaped>
                <v-list-item v-for="n in 5" :key="n" link>
                    <v-list-item-content>
                        <v-list-item-title>Item {{ n }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <DrawerDrag></DrawerDrag>

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

<style scoped></style>
