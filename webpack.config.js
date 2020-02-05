var webpack = require("webpack");
var path = require("path");

module.exports = {
  entry: ["./resources/assets/js/app.js"],
  output: {
    path: path.resolve(__dirname, "./public/js"),
    filename: "app.js"
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: ["style-loader", "css-loader"]
      }
    ]
  }
};
