const mix = require('laravel-mix');

mix.js([
    'resources/js/app.js',
    'node_modules/tinymce/tinymce.min.js',
], 'public/js/app.js')
    .sass('resources/sass/app.scss', 'public/css');

mix.copyDirectory('node_modules/tinymce/plugins', 'public/js/tinymce/plugins');
mix.copyDirectory('node_modules/tinymce/themes', 'public/js/tinymce/themes');
mix.copyDirectory('node_modules/tinymce/icons', 'public/js/tinymce/icons');
mix.copyDirectory('node_modules/tinymce/skins', 'public/js/tinymce/skins');