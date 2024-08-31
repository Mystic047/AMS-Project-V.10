const mix = require('laravel-mix');

mix.styles([
    'public/backend/assets/modules/bootstrap/css/bootstrap.min.css',
    'public/backend/assets/css/style.css',
    'public/backend/assets/css/components.css',
], 'public/css/app.css');

mix.scripts([
    'public/backend/assets/modules/jquery.min.js',
    'public/backend/assets/modules/popper.js',
    'public/backend/assets/modules/bootstrap/js/bootstrap.min.js',
    'public/backend/assets/modules/nicescroll/jquery.nicescroll.min.js',
    'public/backend/assets/js/scripts.js',
    'public/backend/assets/js/custom.js',
], 'public/js/app.js');

mix.version();

