const elixir = require('laravel-elixir');

//require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        './public/css/app.css',
        './public/css/global.css',
        './public/css/home.css',
        './public/css/mid.css',
        './public/css/right.css',
        './public/css/left.css'
    ]);

    mix.scripts([
        './public/js/app.js',
        './public/js/jquery-3.1.1.min.js',
        './public/js/mid.js',
        './public/js/right.js',
        './public/js/home.js'
//        './public/js/left.js'
    ]);

});