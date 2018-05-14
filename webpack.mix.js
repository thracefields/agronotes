let mix = require('laravel-mix');

mix.disableNotifications();

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

mix.scripts([ 
    
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/fullcalendar/dist/fullcalendar.min.js',
    'node_modules/fullcalendar/dist/locale/bg.js',
    'node_modules/parsleyjs/dist/parsley.min.js',
    'node_modules/parsleyjs/dist/i18n/bg.js'
], 'public/js/vendor.js');

mix.browserSync('localhost:8000');