<!-- @format -->

<template lang="html">
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
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import DrawerDrag from '@/app/components/DrawerDrag.vue';

@Component({
    components: { DrawerDrag },
    mixins: [],
})
export default class RightPanel extends Vue {}
</script>

<style scoped lang="scss"></style>
