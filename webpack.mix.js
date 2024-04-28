let mix = require("laravel-mix");

require("laravel-mix-polyfill");

if (!mix.inProduction()) {
  mix.webpackConfig({
    devtool: "inline-source-map",
  });
}

mix
  .sourceMaps()
  .js("public/src/js/app.js", "public/js")
  .js("admin/src/js/admin-app.js", "admin/js")
  .sass("public/src/styles/style.scss", "public/css")
  .sass("admin/src/styles/admin-styles.scss", "admin/css")
  .setPublicPath("/");

mix.browserSync({
  proxy: "http://skinnurture.local/",
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
