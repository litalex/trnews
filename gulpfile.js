var elixir = require('laravel-elixir');
var gulp = require('gulp');

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
    mix.sass('main.scss');
});

elixir(function(mix) {
    mix.styles([
        '../../../bower_components/font-awesome/css/font-awesome.css',
        '../../../bower_components/bootstrap/dist/css/bootstrap.css'
    ], 'public/css/app.css');
});

elixir(function(mix) {
    mix.scripts([
        '../../../bower_components/jquery/dist/jquery.js',
        '../../../bower_components/bootstrap/dist/js/bootstrap.js'
    ], 'public/js/app.js');
});