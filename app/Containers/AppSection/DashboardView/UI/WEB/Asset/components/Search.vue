<!-- @format -->

<template lang="html">
    <v-dialog eager v-if="isView" v-model="isView" no-click-animation>
        <h1>SEARCH</h1>
    </v-dialog>
</template>

<script lang="ts">
import { Component, Vue, Watch } from 'vue-property-decorator';
import { AbstractModule } from '@/Asset/store/modules/AbstractStore';

@Component({
    components: {},
    mixins: [],
})
export default class Search extends Vue {
    get isView() {
        return AbstractModule.searchToggle;
    }
}
</script>

<style scoped lang="scss"></style>
