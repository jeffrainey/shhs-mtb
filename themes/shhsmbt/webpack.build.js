const path = require('path');
const glob = require('glob');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

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

let j = 0;

while (js_files.length > j){
    entry.push(js_files[j]);

    j++;
}

let image_files = getEntries('src/assets/images/*')

let i = 0;

while (image_files.length > i){
    entry.push(image_files[i]);

    i++;
}

// let font_files = getEntries('src/assets/fonts/*/*')
//
// let f = 0;
//
// while (image_files.length > f){
//     entry.push(font_files[f]);
//
//     f++;
// }

const output = {
    filename: './js/[name]',    // prepend folder name
    path: path.resolve(__dirname, 'dist'),
};


module.exports = {
    mode: 'production',
    entry: entry,
    output: output,
    plugins:[
        new MiniCssExtractPlugin({
            filename: 'css/[name].css',  // prepend folder name
            chunkFilename: 'css/[name].css',    // prepend folder name
            ignoreOrder: false,
        }),
    ],
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
                    {
                        loader: 'file-loader',
                        options: { outputPath: '/css/', name: '[name].min.css'}
                    },
                    'sass-loader'
                ]
            }
        ]
    },
    resolve: {
        extensions: ['.js'],
    }
}