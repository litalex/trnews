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

elixir(function (mix) {
    mix
        .styles([
            '../../../bower_components/font-awesome/css/font-awesome.css',
            '../../../bower_components/bootstrap/dist/css/bootstrap.css'
        ], 'public/css/app.css')
        .scripts([
            '../../../bower_components/jquery/dist/jquery.js',
            '../../../bower_components/bootstrap/dist/js/bootstrap.js',
            '../../../bower_components/admin-lte/dist/js/app.min.js'
        ], 'public/js/app.js')
        .copy('bower_components/font-awesome/fonts', 'public/fonts');
});

elixir(function (mix) {
    mix
        .styles([
            '../../../bower_components/admin-lte/bootstrap/css/bootstrap.min.css',
            '../../../bower_components/ionicons/css/ionicons.min.css',
            '../../../bower_components/admin-lte/dist/css/AdminLTE.min.css',
            '../../../bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css',
            '../../../bower_components/admin-lte/dist/css/skins/_all-skins.min.css'
        ], 'public/css/admin.css')
        .scripts([
            '../../../bower_components/admin-lte/plugins/jQuery/jquery-2.2.3.min.js',
            '../../../bower_components/admin-lte/bootstrap/js/bootstrap.min.js',
            '../../../bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js',
            '../../../bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js',
            '../../../bower_components/admin-lte/plugins/fastclick/fastclick.js',
            '../../../bower_components/admin-lte/dist/js/app.min.js',
            '../../../bower_components/admin-lte/dist/js/demo.js',
            'admin.js'
        ], 'public/js/admin.js')
        .copy('bower_components/admin-lte/bootstrap/fonts', 'public/fonts');
});

elixir(function (mix) {
    mix
        .styles([
            '../../theme/css/'
        ], 'public/css/theme.css')
        .scripts([
            '../../theme/js/'
        ], 'public/js/theme.js')
        .sass('main.scss')
});
