var gulp = require("gulp");
var elixir = require('laravel-elixir');
var stylus = require('laravel-elixir-stylus');
//var php = require('gulp-connect-php');

elixir(function(mix) {

    mix.stylus([
        'mainadmin.styl'
    ],'public/css/');

    mix.styles([
        'bootstrap.min.css',
        'font-awesome.min.css',
        'prettyPhoto.css',
        'animate.css',
        'mainloja.css',
        'responsive.css'
    ],'public/css/all.min.css');

    mix.scripts ([
        'jquery.js',
        'bootstrap.min.js',
        'jquery.scrollUp.min.js',
        'price-range.js',
        'jquery.prettyPhoto.js',
        'main.js'
    ],'public/js/all.min.js');

    mix.version(['css/mainadmin.css', 'css/all.min.css', 'js/all.min.js']);

    mix.copy('resources/assets/fonts', 'public/build/fonts');


//    TESTES
//    mix.stylus();
//
//    mix.version("css/mainadmin.css");

//    gulp.task('serve', function() {
//
//        // start the php server
//        // make sure we use the public directory since this is Laravel
//        php.server({
//            base: './public'
//        });
//
//    });

//roda e continua rodando para ver alterações
// gulp watch

//prepara o arquivos para ambiente de produção
// gulp --production

});
