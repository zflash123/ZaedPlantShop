const mix = require('laravel-mix');


mix.scripts([
    'resources/js/bootstrap.js',
],'public/js/my-app.js').version();
mix.styles([
    'resources/css/bootstrap.css',
],'public/css/my-app.css').version();

mix.browserSync("127.0.0.1:8000");