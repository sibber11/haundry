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

mix
    .js('resources/js/admin/app.js', 'public/admin/js')
    .js('resources/js/customer/app.js', 'public/customer/js')
    .js('resources/js/firebase-messaging-sw.js', 'public')
    .vue()
    .css('resources/css/admin/app.css', 'public/admin/css')
    .postCss("resources/css/customer/app.css", 'public/customer/css', [require('tailwindcss')])
    .browserSync('haundry.test')
    .disableSuccessNotifications()
