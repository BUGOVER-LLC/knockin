<!-- @format -->

<template lang="html">
    <div></div>
</template>

<script lang="ts">
import { Vue, Component } from 'vue-property-decorator';
import CreateComponent from '@/auth/components/workspace/CreateComponent.vue';
import ChoiceComponent from '@/auth/components/workspace/ChoisComponent.vue';
import axios from 'axios';

@Component({
    components: {
        CreateComponent,
        ChoiceComponent,
    },
})
export default class SelectWorkspace extends Vue {
    private workspaces: object = {};

    created() {
        console.log(111);
        axios.get(`'/workspaces'`).then().catch();
    }
}
</script>

<style scoped lang="scss"></style>
