/** @format */

import { extend, localize } from 'vee-validate';
import en from 'vee-validate/dist/locale/en.json';
import { email, min, required } from 'vee-validate/dist/rules';

// Install rules
extend('required', required);
extend('min', min);
extend('email', email);
extend('confirmed', email);

// Install messages
localize({
    en,
});
