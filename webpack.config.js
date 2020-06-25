const path = require('path');
module.exports = {
    entry: './asset/js/calender.js',
    output: {
      path: path.resolve(__dirname, 'public/js'),
      filename: 'calender.js',
      publicPath: 'public/js/'
    },
    module: {
        rules: [
            {
                test: /\.css$/,
                use: [
                  // style-loader
                  { loader: 'style-loader' },
                  // css-loader
                  {
                    loader: 'css-loader',
                  }
                ]
            },
            {
              test: /\.(png|jpe?g|gif)$/i,
              use: [
                {
                  loader: 'file-loader',
                },
              ]
            },
        ]
    }
};