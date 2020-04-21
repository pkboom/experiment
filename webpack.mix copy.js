let cssImport = require("postcss-import");
let cssNesting = require("postcss-nesting");
let mix = require("laravel-mix");
let path = require("path");
let tailwindcss = require("tailwindcss");
require("laravel-mix-purgecss");

mix.js("resources/js/app.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [
        cssImport(),
        cssNesting(),
        tailwindcss("tailwind.config.js")
    ])
    .webpackConfig({
        resolve: {
            alias: {
                vue$: "vue/dist/vue.runtime.esm.js",
                "@": path.resolve("resources/js")
            }
        }
    })
    .purgeCss();

if (mix.inProduction()) {
    mix.version();
}
