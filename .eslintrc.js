module.exports = {
    extends: [
        'eslint:recommended',
        "plugin:vue/essential",
        "plugin:vue/recommended",
        "plugin:vue/strongly-recommended",
        "prettier"
    ],
    env: {
        browser: true,
        node: true,
        es6: true,
        es2021: true
    },
    "parserOptions": {
        ecmaVersion: 2022
    },
    rules: {
        // @add severity as you wish
    }
}
