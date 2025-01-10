<template>
    <div></div>
</template>

<script lang="ts">
import { ValidationObserver, ValidationProvider } from 'vee-validate';
import { Component, Vue } from 'vue-property-decorator';

import { trans } from '../utils/StringUtils';

@Component({
    methods: { trans },
    components: { ValidationProvider, ValidationObserver },
})
export default class SelectSystem extends Vue {}
</script>
