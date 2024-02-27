<!-- @format -->

<template lang="html">
    <v-footer app color="transparent" height="72" inset>
        <v-text-field
            v-model="message"
            autofocus
            background-color="grey lighten-3"
            class="rounded-lg"
            flat
            height="50"
            hide-details
            solo
            @keypress="13 === $event.keyCode ? emitMessage() : null"
        >
            <template #append>
                <v-btn icon large @click="emitMessage">
                    <v-icon color="grey darken-3" x-large v-text="'mdi-send-variant-outline'" />
                </v-btn>
            </template>
        </v-text-field>
    </v-footer>
</template>

<script lang="ts">
import { Component, Emit, Vue } from 'vue-property-decorator';

import { MainComponent } from '@/@core/MainComponent';
import { MessageModule } from '@/app/store/modules/MessageStore';

@Component({
    components: {},
    mixins: [],
})
export default class MessagingWriter extends Vue implements MainComponent {
    public message: string = '';

    async emitMessage() {
        const date = new Date();
        const messageData = {
            body: this.message,
            createdAt: `${date.toTimeString()} ${date.toDateString()}`,
            targetId: 'target-1',
            out: true,
            in: false,
            edited: false,
            editedAt: '',
        };

        await MessageModule.initMessage(messageData);

        this.emitMsg(messageData);
    }

    created(): void {}

    mounted(): void {}

    @Emit('initMsg')
    private emitMsg<T extends object>(messageData: T): T {
        this.message = '';
        return messageData;
    }
}
</script>

<style lang="scss" scoped></style>
