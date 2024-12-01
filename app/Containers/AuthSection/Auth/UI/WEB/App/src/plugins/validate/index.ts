/** @format */

import { configure, extend } from 'vee-validate';
import {
    alpha,
    alpha_dash,
    alpha_num,
    alpha_spaces,
    between,
    confirmed,
    digits,
    dimensions,
    double,
    email,
    excluded,
    ext,
    image,
    integer,
    is,
    is_not,
    length,
    max,
    max_value,
    mimes,
    min,
    min_value,
    numeric,
    oneOf,
    regex,
    required,
    required_if,
    size,
} from 'vee-validate/dist/rules';

import { i18n } from './i18';

configure({
    //@ts-expect-error
    defaultMessage: (field, values) => {
        values._field_ = i18n.t(`${field}`);

        return i18n.t(`validation.${values._rule_}`, values);
    },
});

extend('required', required);
extend('email', email);
extend('min', min);
extend('alpha', alpha);
extend('double', double);
extend('digits', digits);
extend('dimensions', dimensions);
extend('confirmed', confirmed);
extend('between', between);
extend('alpha_spaces', alpha_spaces);
extend('alpha_num', alpha_num);
extend('alpha_dash', alpha_dash);
extend('ext', ext);
extend('excluded', excluded);
extend('image', image);
extend('is', is);
extend('integer', integer);
extend('length', length);
extend('is_not', is_not);
extend('max', max);
extend('max_value', max_value);
extend('mimes', mimes);
extend('min_value', min_value);
extend('numeric', numeric);
extend('oneOf', oneOf);
extend('regex', regex);
extend('required_if', required_if);
extend('size', size);
