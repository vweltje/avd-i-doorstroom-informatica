let mix = require("laravel-mix");
let notifier = require("node-notifier");

mix.autoload({
  jquery: ["$", "window.jQuery", "jQuery"],
});

mix
  .options({
    processCssUrls: false,
    postCss: [
      require("autoprefixer")({
        grid: true,
      }),
    ],
    uglify: {
      uglifyOptions: {
        compress: true,
      },
    },
  })
  .sourceMaps(true, "source-map");

mix.js("sources/js/main.js", "assets/js/main.js");

mix.sass("sources/scss/root.scss", "assets/css/style.css", {
  sassOptions: {
    outputStyle: "compressed",
  },
});

mix.disableSuccessNotifications();
