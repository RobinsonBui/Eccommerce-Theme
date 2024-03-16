let mix = require("laravel-mix");

require("laravel-mix-polyfill");

if (!mix.inProduction()) {
  mix.webpackConfig({
    devtool: "inline-source-map",
  });
}

mix
  .sourceMaps()
  .js("src/js/app.js", "public/js")
  .sass("src/styles/style.scss", "css")
  .setPublicPath("public");

mix.browserSync({
  proxy: "http://ecoommerce.local/",
  ui: {
    port: 8080,
  },
});

mix.options({
  postCss: [
    require("autoprefixer")({
      browsers: ["last 40 versions"],
    }),
  ],
});
