const mix = require('laravel-mix');

mix.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/stitch.scss', 'public/css/app.css');
