<!-- @format -->

<template lang="html">
    <v-main>
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
    </v-main>
</template>

<script lang="ts">
import { Component, Vue, Watch, ProvideReactive, Prop } from 'vue-property-decorator';
import { MessageModule } from '@/app/store/modules/Messages';
import { MainComponent } from '@/app/@core/Main/MainComponent';

@Component({
    components: {},
    mixins: [],
})
export default class MessagingContent extends Vue implements MainComponent {
    @Prop({ required: false, type: String, default: 'target-1' })
    protected readonly target: string = 'target-1';

    @ProvideReactive()
    messageContent = [];

    public get messageBody() {
        return MessageModule.body;
    }

    @Watch('messageBody', { immediate: false, deep: true })
    observeMsgContent() {
        console.log(this.target);
        this.messageContent = MessageModule.getPayload[this.target];
    }

    private onIntersect(entries, observer) {}

    public created(): void {
        this.messageContent = MessageModule.getPayload[this.target];
    }

    mounted(): void {}
}
</script>

<style scoped lang="scss"></style>
