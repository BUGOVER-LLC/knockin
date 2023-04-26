<!-- @format -->

<template lang="html">
    <v-main>
        <div v-for="(message, index) in messageContent" :key="index">
            <p :class="message.out ? 'float-left' : 'float-right'" class="col-12 pa-0 ma-1">
                {{ message.body }}
            </p>
        </div>
    </v-main>
</template>

<script lang="ts">
import { Component, Vue, Watch, ProvideReactive, InjectReactive } from 'vue-property-decorator';
import { MessageModule } from '@/app/store/modules/Messages';
import { MainComponent } from '@/app/@core/Main/MainComponent';

@Component({
    components: {},
    mixins: [],
})
export default class MessagingContent extends Vue implements MainComponent {
    @ProvideReactive() messageContent = [];

    public get messageBody() {
        return MessageModule.body;
    }

    @Watch('messageBody', { immediate: false, deep: true })
    observeMsgContent() {
        this.messageContent = MessageModule.getPayload['target-1'];
    }

    public created(): void {
        this.messageContent = MessageModule.getPayload['target-1'];
    }

    mounted(): void {}
}
</script>

<style scoped lang="scss"></style>
