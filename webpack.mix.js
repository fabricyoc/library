// webpack.mix.js

let mix = require('laravel-mix');

// mix.js('src/app.js', 'dist').setPublicPath('dist');

// mix.js("resources/js/app.js", "public/js")
//   .postCss("resources/css/app.css", "public/css", [
//     require("tailwindcss"),
//   ]);

mix.js("resources/js/app.js", "public/js")
  .postCss("resources/css/all.css", "public/css")
  .postCss("resources/css/styles.css", "public/css")
  .postCss("resources/css/app.css", "public/css");

mix.options({
    postCss: [
        require('tailwindcss')
    ]
});

