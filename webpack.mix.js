const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


mix.styles([
    'resources/css/components.min.css',
    'resources/css/preflight.min.css',
    'resources/css/tailwind.min.css',
    'resources/css/utilities.min.css'
], 'public/css/tailwind.css');