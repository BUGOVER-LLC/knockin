<!-- @format -->

<template lang="html">
    <v-list class="pl-14 pr-3" shaped>
        <v-list-item-group v-model="selectedItem">
            <v-list-item v-for="n in 25" :key="n" link selectable active-class="selected-member-style">
                <v-list-item-content>
                    <v-list-item-title>Item {{ n }}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list-item-group>
        <div class="sub-header-member-bottom">
            <v-divider />
            <v-skeleton-loader type="list-item-avatar" />
        </div>
    </v-list>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component({
    components: {},
    mixins: [],
})
export default class extends Vue {
    private selectedItem: number = 0;
}
</script>

<style scoped lang="scss">
.sub-header-member-bottom {
    position: absolute;
    bottom: 0;
    width: 80%;
    right: 3px;
}
.selected-member-style {
    background-color: #e0e0e0;
    color: #343232;
}
</style>
