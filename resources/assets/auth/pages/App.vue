<!-- @format -->

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component({
    template: '<v-app><slot name="auth-content" /></v-app>',
})
export default class App extends Vue {}
</script>

<style lang="scss" scoped></style>
