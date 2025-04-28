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
], 'public/css/main.css',
    [
        'resources/js/toast-magic.css',
    ], 'public/js/toast-magic.css',
);


mix.js([
    'resources/js/custom.js',
], 'public/js/main.js',
    [
        'resources/js/toast-magic.js',
    ], 'public/js/toast-magic.js',
)

mix.copyDirectory('resources/css/fonts', 'public/css/fonts')
mix.copyDirectory('resources/img', 'public/img')

