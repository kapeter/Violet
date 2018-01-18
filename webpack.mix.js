let mix = require('laravel-mix');

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
mix.copyDirectory('resources/assets/img','public/images');
mix.copyDirectory('resources/assets/media','public/media');

mix.sass('resources/assets/sass/register.scss', 'public/css');

mix.sass('resources/assets/sass/garden.scss', 'public/css');
mix.js('resources/assets/js/app.js', 'public/js');
