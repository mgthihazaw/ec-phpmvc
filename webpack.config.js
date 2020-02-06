var webpack = require("webpack");
var path = require("path");

module.exports = {
  //from
  entry: ["./resources/assets/js/app.js"],
  //to
  output: {
    path: path.resolve(__dirname, "./public/js"),
    filename: "app.js"
  },
  //use module that we wanted
  module: {
    rules: [
      {
        test: /\.s[ac]ss$/,
        use: ["style-loader", "css-loader", "sass-loader"]
      },
      {
        test: /\.css$/,
        use: ["style-loader", "css-loader"]
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: "babel-loader"
      }
    ]
  },
  plugins: []
};
//minified version
if (process.env.NDE_ENV == "production") {
  module.exports.plugins.push(new webpack.optimize.UglifyJsPlugin());
}
