const path = require('path');
module.exports = {
    entry: './asset/js/calender.js',
    output: {
      path: path.resolve(__dirname, 'public/js'),
      filename: 'calender.js'
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
                  },
                  // sass-loader
                  { loader: 'sass-loader' }
                ]
            }
        ]
    }
};