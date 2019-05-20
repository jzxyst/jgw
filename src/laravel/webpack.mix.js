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

mix.react('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .babelConfig({
        cacheDirectory: true,
        presets: [
            [
                '@babel/preset-env',
                {
                    modules: false,
                    forceAllTransforms: true
                }
            ]
        ],
        plugins: [
            '@babel/plugin-proposal-object-rest-spread',
            [
                '@babel/plugin-transform-runtime',
                {
                    helpers: false
                }
            ],
            "@babel/plugin-proposal-class-properties"
        ]
    });