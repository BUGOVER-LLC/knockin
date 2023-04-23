<!-- @format -->

<template lang="html">
    <v-footer app color="transparent" height="70" inset>
        <tiptap-vuetify v-model="content" :extensions="extensions" />
    </v-footer>
</template>

<script lang="js">
import { Blockquote, Bold, BulletList, Code, HardBreak, Heading, History,HorizontalRule, Italic, Link, ListItem, OrderedList, Paragraph, Strike, TiptapVuetify, Underline } from 'tiptap-vuetify';

export default {
    components: { TiptapVuetify },
    data: () => ({
        // declare extensions you want to use
        extensions: [
            History,
            Blockquote,
            Link,
            Underline,
            Strike,
            Italic,
            ListItem,
            BulletList,
            OrderedList,
            [Heading, {
                options: {
                    levels: [1, 2, 3],
                },
            }],
            Bold,
            Code,
            HorizontalRule,
            Paragraph,
            HardBreak,
        ],
        content: ``,
    }),
}
</script>

<style scoped lang="scss"></style>
