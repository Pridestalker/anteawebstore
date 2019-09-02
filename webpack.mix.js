const mix = require('laravel-mix');

mix.sass('assets/styles/main.scss', 'dist/styles/');

mix.js('assets/scripts/main.js', 'dist/scripts/');
