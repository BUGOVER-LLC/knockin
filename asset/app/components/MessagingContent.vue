<!-- @format -->

<template lang="html">
    <v-main>
        <div v-for="(message, index) in syncMessages" :key="index">
            {{ message.body }}
        </div>
    </v-main>
</template>

<script lang="ts">
import { Component, Vue, PropSync } from 'vue-property-decorator';
import Messages from '@/app/store/modules/Messages';

@Component({
    components: {},
    mixins: [],
})
export default class MessagingContent extends Vue {
    @PropSync('messages') syncMessages;

    private get detonate() {
        return Messages.messages;
    }
}
</script>

<style scoped lang="scss"></style>
