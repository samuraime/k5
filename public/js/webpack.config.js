var path = require('path');

module.exports = {
    entry: [
        path.resolve(__dirname, './index')
    ],

    output: {
        // path: path.resolve(__dirname, 'build'),
        filename: 'bundle.js',
    },
    module: {
        loaders: [{
          test: /\.js$/,
          loaders: ['babel'],
        }]
    }
};