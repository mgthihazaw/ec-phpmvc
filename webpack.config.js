var webpack = require("webpack");
var path = require("path");
var MiniCssExtractPlugin = require("mini-css-extract-plugin");
let productionMode = process.env.NDE_ENV == "production";
module.exports = {
  //from
  entry: {
    app: ["./resources/assets/js/app.js", "./resources/assets/sass/app.scss"]
  },
  //to
  output: {
    path: path.resolve(__dirname, "./public/"),
    filename: "js/[name].js"
  },
  //use module that we wanted
  module: {
    rules: [
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader
          },

          "css-loader",
          "sass-loader"
        ]
      },

      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: "babel-loader"
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      // Options similar to the same options in webpackOptions.output
      // both options are optional
      filename: "css/[name].css"
    }),
    new webpack.LoaderOptionsPlugin({
      minimize: productionMode
    })
  ]
};
//minified version
if (productionMode) {
  module.exports.plugins.push(new webpack.optimize.UglifyJsPlugin());
}
