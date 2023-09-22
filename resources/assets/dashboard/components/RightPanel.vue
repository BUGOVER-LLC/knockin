<!-- @format -->

<template lang="html">
    <DrawerDrag :mini="true">
        <template #toolbar>
            <v-toolbar color="grey lighten-4" height="70">
                <v-toolbar-title class="headline text-uppercase"></v-toolbar-title>
            </v-toolbar>
        </template>

        <template #content>
            <v-tabs color="grey" height="35">
                <v-tab v-for="n in ['files', 'documents', 'images']" :key="n"> {{ n }}</v-tab>
                <v-tab-item v-for="n in ['files', 'documents', 'images']" :key="n">
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

import DrawerDrag from '@/dashboard/components/DrawerDrag.vue';

@Component({
    components: { DrawerDrag },
    mixins: [],
})
export default class RightPanel extends Vue {}
</script>

<style lang="scss" scoped></style>
