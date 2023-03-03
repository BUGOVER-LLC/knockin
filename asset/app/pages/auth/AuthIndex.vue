<!-- @format -->

<template>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component({
    components: {},
    mixins: [],
})
export default class AuthIndex extends Vue {
    drawer: null | boolean = null;

    beforeRouteUpdate(to, from, next: string): void {}

    created() {
        console.log(this.drawer);
    }
}
</script>

<style scoped lang="scss"></style>
