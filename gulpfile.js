var gulp = require("gulp");
var php = require('gulp-connect-php');
var elixir = require('laravel-elixir'),
    stylus = require('laravel-elixir-stylus');

elixir(function(mix) {
    mix.stylus();

    mix.version("css/mainadmin.css");

    gulp.task('serve', function() {

        // start the php server
        // make sure we use the public directory since this is Laravel
        php.server({
            base: './public'
        });

    });
});
