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

if(process.env.BUILD_TYPE == 'js')
{
    mix.js('resources/js/app.js', 'public/js');
}

else if(process.env.BUILD_TYPE == 'css')
{
    mix.sass('resources/sass/app.scss', 'public/css');
}