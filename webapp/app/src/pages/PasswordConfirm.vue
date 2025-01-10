<template> </template>

<script lang="ts">
import { ValidationObserver, ValidationProvider } from 'vee-validate';
import { Component, Vue } from 'vue-property-decorator';

import { OnCreated } from '../common/contracts/OnCreated';
import { trans } from '../utils/StringUtils';

@Component({
    methods: { trans },
    components: {
        ValidationObserver,
        ValidationProvider,
    },
})
export default class PasswordConfirm extends Vue implements OnCreated {
    public created() {}
}
</script>
