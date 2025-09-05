/** @type {import('tailwindcss').Config} */
const preset = require("./vendor/filament/support/tailwind.config.preset");

module.exports = {
    darkMode: "class",

    presets: [preset],

    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./vendor/filament/**/*.js",
        "./vendor/filament/**/*.vue",
    ],

    theme: {
        extend: {},
    },

    plugins: [require("@tailwindcss/typography")],
};
