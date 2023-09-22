<!-- @format -->

<template>
    <v-navigation-drawer app clipped right>
        <v-list>
            <v-list-item v-for="n in 5" :key="n" link>
                <v-list-item-content>
                    <v-list-item-title>Item {{ n }}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<script lang="ts">
import {Component, Vue} from 'vue-property-decorator';

@Component({
    components: {},
    mixins: [],
})
export default class ChannelsNavigation extends Vue {
}
</script>

<style scoped></style>
