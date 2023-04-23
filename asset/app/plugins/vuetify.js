/** @format */

import 'vuetify/dist/vuetify.min.css';
import '@mdi/font/css/materialdesignicons.css'; // Ensure you are using css-loader

import { TiptapVuetifyPlugin } from 'tiptap-vuetify';
import Vue from 'vue';
import Vuetify from 'vuetify';

const vuetify = new Vuetify();

Vue.use(Vuetify);
Vue.use(TiptapVuetifyPlugin, {
    vuetify,
    iconsGroup: 'mdiSvg',
});
// noinspection JSUnusedGlobalSymbols
export default new Vuetify({
    iconfont: 'mdiSvg',
    treeShake: true,
    themes: {
        dark: false,
        light: {
            primary: '#344955',
            secondary: '#F9AA33',
            tertiary: '#232F34',
            quaternary: '#4A6572',
            accent: '#D2DBE0',
            error: '#FF5252',
            info: '#2196F3',
            success: '#4CAF50',
            warning: '#FB8C00',
            smoke: '#f5f5f5',
        },
        options: {
            customProperties: true,
        },
    },
});
