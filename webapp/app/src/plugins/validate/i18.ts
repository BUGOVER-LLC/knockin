import en from 'vee-validate/dist/locale/en.json';
import ru from 'vee-validate/dist/locale/ru.json';
import Vue from 'vue';
import VueI18n from 'vue-i18n';

import am from './am.json';
Vue.use(VueI18n);

const i18n = new VueI18n({
    locale: am.code,
    messages: {
        am: {
            validation: am.messages,
        },
        en: {
            validation: en.messages,
        },
        ru: {
            validation: ru.messages,
        },
    },
});

export { i18n };
