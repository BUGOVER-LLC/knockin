<!-- @format -->

<template>
    <v-system-bar app>
        <div v-if="!onLine" class="text-center text-h6 w-100 warning">
            Connection failed. Please check your internet connection !
        </div>

        <v-spacer />

        <v-icon>mdi-alert</v-icon>

        <v-icon>mdi-clock</v-icon>

        <v-icon>mdi-account</v-icon>
    </v-system-bar>
</template>

<script lang="ts">
import { Component, Emit, Vue, Watch } from 'vue-property-decorator';
import { MainComponent } from '@/app/@core/Main/MainComponent';

@Component({})
export default class SystemBar extends Vue implements MainComponent {
    private onLine: boolean = navigator.onLine;
    private showBackOnline: boolean = false;

    mounted() {
        window.addEventListener('online', this.updateOnlineStatus);
        window.addEventListener('offline', this.updateOnlineStatus);
    }

    beforeDestroy() {
        window.removeEventListener('online', this.updateOnlineStatus);
        window.removeEventListener('offline', this.updateOnlineStatus);
    }

    created() {
        this.emitStatus();
    }

    @Watch('onLine')
    private isLine(value) {
        if (value) {
            this.showBackOnline = true;
            setTimeout(() => {
                this.showBackOnline = false;
            }, 1000);
        }
    }

    @Emit('status')
    private emitStatus() {
        return this.onLine;
    }

    private updateOnlineStatus(event: Event) {
        const { type } = event;
        this.onLine = 'online' === type;

        this.emitStatus();
    }
}
</script>

<style lang="scss" scoped></style>
