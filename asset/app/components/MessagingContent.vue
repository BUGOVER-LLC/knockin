<!-- @format -->

<template lang="html">
    <v-main>
        {{ syncMessages }}
        <div v-for="(message, index) in syncMessages" :key="index">
            {{ message.body }}
        </div>
    </v-main>
</template>

<script lang="ts">
import { Component, Vue, PropSync } from 'vue-property-decorator';
import { MessageModule } from '@/app/store/modules/Messages';

@Component({
    components: {},
    mixins: [],
})
export default class MessagingContent extends Vue {
    @PropSync('message', { required: false, type: Object })
    public syncMessages: object = {};

    public get detonator() {
        return MessageModule.detonate;
    }

    public mounted() {}
}
</script>

<style scoped lang="scss"></style>
