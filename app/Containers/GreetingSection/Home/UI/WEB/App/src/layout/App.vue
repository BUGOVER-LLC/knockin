<!-- @format -->

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component({
    template: '<v-app app><slot name="noix-greeting-content" /></v-app>',
})
export default class App extends Vue {}
</script>
