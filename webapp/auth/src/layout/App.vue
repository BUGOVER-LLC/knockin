<!-- @format -->

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

@Component({
    template: '<v-src src><slot name="producer-content" /></v-src>',
})
export default class App extends Vue {}
</script>
