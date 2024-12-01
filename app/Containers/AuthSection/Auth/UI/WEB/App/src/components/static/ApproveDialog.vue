<!-- @format -->

<template>
    <v-card prepend-icon="mdi-map-marker">
        <v-card-title>{{ title }}</v-card-title>

        <v-card-text>{{ content }}</v-card-text>

        <v-card-actions>
            <v-spacer />

            <v-btn @click="dialog = false" text> {{ $t('words.disagree') }} </v-btn>
            <v-btn @click="dialog = true" depressed>
                <span class="text--secondary">{{ $t('auth.send_code') }}</span>
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script lang="ts">
import { Vue, Component, PropSync, Prop } from 'vue-property-decorator';

@Component({})
export default class ApproveDialog extends Vue {
    @PropSync('value', { required: true }) public dialog: boolean;
    @Prop({ required: false }) public readonly title: string;
    @Prop({ required: false }) public readonly content: string;
}
</script>
