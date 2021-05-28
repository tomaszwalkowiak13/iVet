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

mix.babel('resources/js/scripts.js', 'public/js/scripts.js')
    .babel('resources/js/admin.js', 'public/js/admin.js')
    .sass('resources/sass/index.scss', 'public/css');
