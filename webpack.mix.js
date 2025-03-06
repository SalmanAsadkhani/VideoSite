const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.styles([
    'resources/css/style.css',
], 'public/css/main.css');


mix.js([
    'resources/js/custom.js',
], 'public/js/main.js')

mix.copyDirectory('resources/css/fonts', 'public/css/fonts')
mix.copyDirectory('resources/img', 'public/img')

