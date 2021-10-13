const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/admin/main.js', 'public/js')
    .sass('resources/admin/assets/scss/style.scss', 'public/css', {
        sassOptions: {
            quietDeps: true,
        },
    })
    .sourceMaps()
    .vue();

mix.extract(['vue', 'lodash'], 'public/js/vendor-utils-1.js');
mix.extract(['jquery', 'axios'], 'public/js/vendor-utils-2.js');
mix.extract();

mix.copyDirectory('resources/images', 'public/images');

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .version()
//     .vue();

if (mix.inProduction()) {
    mix.version();
}
