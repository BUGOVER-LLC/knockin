<!-- @format -->

<template lang="html">
    <v-main>
        <div v-for="(message, index) in messages" :key="index">
            {{ message.body }}
        </div>
    </v-main>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import Messages from '@/app/store/modules/Messages';

@Component({
    components: {},
    mixins: [],
})
export default class MessagingContent extends Vue {
    public get messages(): object {
        console.log(432432432);
        return Messages.messages;
    }
}
</script>

<style scoped lang="scss"></style>
