const path = require('path');
const glob = require('glob');
const args = process.argv.slice(2);

const build = {
    entryPoints: glob.sync('./src/pages/**/*.js').reduce(function (obj, el) {
        obj[path.basename(path.dirname(el)) + '/' + path.parse(el).name] = el;
        return obj;
    }, {}),
    bundle: true,
    outdir: 'public/js',
    outbase: 'src/pages',
    format: 'iife',
    minify: true,
    outExtension: { '.js': '.bundle.js' }
};

if (args.indexOf('--watch') >= 0) {
    build.watch = {
        onRebuild(error, result) {
            if (error) console.error('watch build failed:', error)
            else console.log('watch build succeeded:', result)
        },
    };
}

require('esbuild').build(build).catch(() => process.exit(1))