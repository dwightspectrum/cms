const path = require('path');
const glob = require('glob');

module.exports = {
    mode: "production",
    entry: glob.sync('./src/pages/**/*.js').reduce(function(obj, el) {
        obj[path.basename(path.dirname(el)) + '/' +path.parse(el).name] = el;
        return obj;
    }, {}),
    output: {
        filename: '[name].bundle.js',
        path: path.resolve(__dirname, 'public/js'),
    },
    resolve: {
        extensions: ['.ts', '.js'],
        alias: {
            mixins: path.resolve(__dirname, 'src/mixins/'),
            modules: path.resolve(__dirname, 'src/modules/'),
        }
    },
    optimization: {
        splitChunks: {
            cacheGroups: {
                commons: {
                    name: 'commons',
                    chunks: 'initial',
                    minChunks: 2
                },
                vendor: {
                    test: /[\\/]node_modules[\\/]/,
                    name: 'vendors',
                    chunks: 'all'
                }
            }
         }
    }
};