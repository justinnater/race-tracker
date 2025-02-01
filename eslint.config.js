// eslint.config.js
import js from "@eslint/js";
import ts from "@typescript-eslint/eslint-plugin";
import tsParser from "@typescript-eslint/parser";
import vue from "eslint-plugin-vue";
import vueParser from "vue-eslint-parser";

export default [
    js.configs.recommended,
    {
        files: ["**/*.ts", "**/*.vue"],
        languageOptions: {
            parser: vueParser,
            parserOptions: {
                ecmaVersion: "latest",
                sourceType: "module",
                extraFileExtensions: [".vue"],
                parser: tsParser
            },
            globals: {
                window: "readonly",
                document: "readonly",
                console: "readonly",
            }
        },
        plugins: {
            "vue": vue
        },
        rules: {
            "vue/multi-word-component-names": "off",
            "vue/html-self-closing": ["error", { "html": { "void": "always" } }],
            "no-undef": "off",
            "object-curly-spacing": ["error", "always"],
            "no-unused-vars": "off",
        }
    },
    {
        files: ["**/*.ts"],
        languageOptions: {
            parser: tsParser,
            globals: {
                window: "readonly",
                document: "readonly",
                console: "readonly"
            }
        },
        plugins: {
            "@typescript-eslint": ts
        },
        rules: {
            "@typescript-eslint/explicit-function-return-type": "error"
        }
    }
];
