const path = require('path');

module.exports = {
  entry: [
    './src/js/index.js',
    './src/js/nav-scroll.js'
  ],
  output: {
    filename: 'main.js',
    path: path.resolve(__dirname, './dist/js/'),
  },
};