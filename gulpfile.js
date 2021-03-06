var elixir = require('laravel-elixir');

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

//var elixir = require('laravel-elixir');

//require('laravel-elixir-vueify');

elixir(function(mix) {
    mix.sass('style.scss');
    mix.scriptsIn('resources/assets/js');
    mix.version('css/style.css');
    mix.browserSync({
    	proxy: 'redesign.dev'
    });
});