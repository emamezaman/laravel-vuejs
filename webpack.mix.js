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

 // mix.styles([
 // 	'resources/assets/css/bootstrap.min.css',
 // 	'resources/assets/css/bootstrap-reset.css',
 // 	'resources/assets/css/font-awesome.css',
 // 	'resources/assets/css/style-responsive.css',
 // 	'resources/assets/css/style.css',
 // 	], 'public/css/adminStyle.css');
    mix.js('resources/assets/js/admin.js','public/js/admin.js');
    mix.js('resources/assets/js/app.js','public/js');
    mix.less('resources/assets/less/admin.less', 'public/css/admin.css');
    mix.less('resources/assets/less/index.less', 'public/css/index.css');

   // mix.sass('resources/assets/sass/app.scss', 'public/css');
