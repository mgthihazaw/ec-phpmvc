// var elixir = require("laravel-elixir");
var elixir = require("laravel-elixir/dist/tasks/shared/Css").default;

elixir.config.sourcemaps = false;

var gulp = require("gulp");

elixir(function(mix) {
  //compile sass to css
  mix.sass("resources/assets/sass/app.scss", "resources/assets/css");

  //combile css file
  mix.styles(
    ["css/app.css", "bower/vendor/slice-carousel/slick/slick.css"],
    "public/css/all.css", //output file
    "resources/assets"
  );
  var bowerPath = "bower/vendor";
  mix.scripts(
    [
      //jquery
      bowerPath + "/jquery/dist/jquery.min.js",
      //foundation js

      bowerPath + "/foundation-sites/dist/js/foundation.min.js",

      //other dependency
      bowerPath + "/slick-carousel/slick/slick.min/js"
    ],
    "public/js/all.js",
    "resources/assets"
  );
});
