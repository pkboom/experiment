let cssImport = require('postcss-import')
let cssNesting = require('postcss-nesting')
let mix = require('laravel-mix')
let tailwindcss = require('tailwindcss')

mix
  .js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    cssImport(),
    cssNesting(),
    tailwindcss('tailwind.config.js'),
  ])
