import js from "@eslint/js";
import globals from "globals";

export default [
  {
    ignores: ["dist/**", "node_modules/**", "vendor/**"],
  },
  js.configs.recommended,
  {
    files: ["src/scripts/**/*.js"],
    languageOptions: {
      globals: globals.browser,
    },
  },
  {
    files: ["tests/js/**/*.js"],
    languageOptions: {
      globals: {
        ...globals.browser,
        ...globals.node,
      },
    },
  },
];
