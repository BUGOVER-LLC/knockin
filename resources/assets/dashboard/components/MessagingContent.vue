<!-- @format -->

<template lang="html">
    <div>
        <div v-for="(message, index) in messageContent" :key="index">
            <div
                v-intersect="onIntersect"
                :class="message.out ? 'float-left' : 'float-right'"
                class="col-12 pa-0 ma-1 text-h6"
            >
                {{ message.body }}
                <v-divider inset />
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { Component, Prop, ProvideReactive, Vue, Watch } from 'vue-property-decorator';

import { MainComponent } from '@/@core/Main/MainComponent';
import { MessageModule } from '@/store/modules/MessageStore';

@Component({
    components: {},
    mixins: [],
})
export default class MessagingContent extends Vue implements MainComponent {
    @ProvideReactive()
    messageContent = [];
    @Prop({ required: false, type: String, default: 'target-1' })
    protected readonly target: string = 'target-1';

    public get messageBody() {
        return MessageModule.body;
    }

    @Watch('messageBody', { immediate: false, deep: true })
    observeMsgContent() {
        console.log(this.target);
        this.messageContent = MessageModule.getPayload[this.target];
    }

    public created(): void {
        this.messageContent = MessageModule.getPayload[this.target];
    }

    mounted(): void {}

    private onIntersect(entries, observer) {}
}
</script>

<style lang="scss" scoped></style>
