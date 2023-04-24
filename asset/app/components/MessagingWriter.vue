<!-- @format -->

<template lang="html">
    <v-footer app color="transparent" height="72" inset>
        <v-text-field
            autofocus
            class="rounded-lg"
            flat
            hide-details
            solo
            background-color="grey lighten-3"
            height="50"
            v-model="message"
            @keypress="13 === $event.keyCode ? emitMessage() : null"
        >
            <template v-slot:append>
                <v-btn icon large @click="emitMessage">
                    <v-icon x-large color="grey darken-3" v-text="'mdi-send-variant-outline'" />
                </v-btn>
            </template>
        </v-text-field>
    </v-footer>
</template>

<script lang="ts">
import { Component, Vue, Emit } from 'vue-property-decorator';
import Messages from '@/app/store/modules/Messages';

@Component({
    components: {},
    mixins: [],
})
export default class MessagingWriter extends Vue {
    private message: string = '';

    async emitMessage() {
        const date = new Date();

        await Messages.initMessage({
            body: this.message,
            createdAt: `${date.toTimeString()} ${date.toDateString()}`,
            targetId: 'target-1',
            out: true,
            in: false,
            edited: false,
            editedAt: '',
        });

        this.emitMsg();
    }

    @Emit('initMsg')
    private emitMsg() {
        const message = this.message;
        this.message = '';

        return message;
    }
}
</script>

<style scoped lang="scss"></style>
