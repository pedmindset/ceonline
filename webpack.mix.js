const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const purgeCss = require("laravel-mix-purgecss");

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

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/websocket.js', 'public/js')
   .copy('node_modules/line-awesome/dist/line-awesome/fonts', 'public/fonts')
   .copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/fonts')
   .sass('resources/sass/bootstrapcss.scss', 'public/css')
   .sass('resources/sass/app.scss', 'public/css')
   .options({
      processCssUrls: false,
      postCss: [ tailwindcss('./tailwind.config.js') ],
    }).purgeCss({
      defaultExtractor: content => content.match(/[\w-/.:]+(?<!:)/g) || []
  });

