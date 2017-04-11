const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

   mix.styles([
     'resources/assets/css/font-awesome.min.css',
     'resources/assets/css/ie8.css',
     'resources/assets/css/ie9.css',
     'resources/assets/css/main.css'
   ], 'public/css/stylesmix.css');

   mix.scripts([
     'resources/assets/js/jquery.min.js',
     'resources/assets/js/jquery.scrolly.min.js',
     'resources/assets/js/jquery.scrollex.min.js',
     'resources/assets/js/skel.min.js',
     'resources/assets/js/main.js',
     'resources/assets/js/util.js'
   ], 'public/js/scriptsmix.js');
