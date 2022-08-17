const path = require('path');
const glob = require('glob');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

let localSite = 'http://shhsmbt.local'

function getEntries(pattern) {
    const entries = [];

    glob.sync(pattern).forEach((file, i) => {
        entries[i] = path.join(__dirname, file);
    });

    return entries;
}

let entry = [
    __dirname + '/src/assets/scss/styles.scss'
];

let js_files = getEntries('src/assets/js/*')

let x = 0;

while (js_files.length > x) {
    entry.push(js_files[x]);

    x++;
}

let image_files = getEntries('src/assets/images/*')

let b = 0;

while (image_files.length > b) {
    entry.push(image_files[b]);

    b++;
}

const output = {
    filename: './js/[name]',    // prepend folder name
    path: path.resolve(__dirname, 'dist'),
};


module.exports = {
    mode: 'development',
    entry: entry,
    output: output,
    watch: true,
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]',
                        outputPath: '/js/'  // folder name
                    }
                }],
            },
            {
                test: /\.(png|svg|jpg|gif)$/,
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]',
                        outputPath: '/images/'  // folder name
                    }
                }],
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/,
                use: [{
                    loader: 'file-loader',
                    options: {
                        outputPath: '/fonts/'  // folder name
                    }
                }]
            },
            {
                test: /\.scss$/,
                exclude: /node_modules/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            sourceMap: true,
                            url: false
                        }
                    },
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true,
                        }
                    },
                ]
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "css/styles.min.css",
            chunkFilename: "css/[id].css"
        }),
        new BrowserSyncPlugin({
            proxy: localSite,
            files: [
                path.resolve(__dirname),
                path.resolve(__dirname, 'src') + '/assets/scss/*.scss',
                path.resolve(__dirname, 'dist') + '/css/*.css',
                path.resolve(__dirname, 'dist') + '/js/*.js',
                path.resolve(__dirname, 'dist') + '/fonts/*'
            ],
            injectCss: true,
        }, {reload: true,}),
    ],
    resolve: {
        extensions: ['.js'],
    }
}