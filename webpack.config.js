const Encore = require('@symfony/webpack-encore');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
     */
    .addEntry('app', './assets/app.js')

    // enables the Symfony UX Stimulus bridge (used in assets/bootstrap.js)
    // .enableStimulusBridge('./assets/controllers.json')

    // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
    .splitEntryChunks()

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    /*
     * FEATURE CONFIG
     *5AGOVAXTT9-eyJsaWNlbnNlSWQiOiI1QUdPVkFYVFQ5IiwibGljZW5zZWVOYW1lIjoiTWFnbWEiLCJhc3NpZ25lZU5hbWUiOiJMZW8gSG9sZGltYW4iLCJhc3NpZ25lZUVtYWlsIjoibGVvaG9sZGltYW43QGdtYWlsLmNvbSIsImxpY2Vuc2VSZXN0cmljdGlvbiI6IkZvciBub24tY29tbWVyY2lhbCBvcGVuIHNvdXJjZSBkZXZlbG9wbWVudCBvbmx5IiwiY2hlY2tDb25jdXJyZW50VXNlIjp0cnVlLCJwcm9kdWN0cyI6W3siY29kZSI6IkRDIiwicGFpZFVwVG8iOiIyMDIxLTA4LTE5IiwiZXh0ZW5kZWQiOmZhbHNlfSx7ImNvZGUiOiJJSSIsInBhaWRVcFRvIjoiMjAyMS0wOC0xOSIsImV4dGVuZGVkIjpmYWxzZX0seyJjb2RlIjoiREIiLCJwYWlkVXBUbyI6IjIwMjEtMDgtMTkiLCJleHRlbmRlZCI6ZmFsc2V9LHsiY29kZSI6IlJNIiwicGFpZFVwVG8iOiIyMDIxLTA4LTE5IiwiZXh0ZW5kZWQiOmZhbHNlfSx7ImNvZGUiOiJXUyIsInBhaWRVcFRvIjoiMjAyMS0wOC0xOSIsImV4dGVuZGVkIjpmYWxzZX0seyJjb2RlIjoiUlNWIiwicGFpZFVwVG8iOiIyMDIxLTA4LTE5IiwiZXh0ZW5kZWQiOnRydWV9LHsiY29kZSI6IlJTVSIsInBhaWRVcFRvIjoiMjAyMS0wOC0xOSIsImV4dGVuZGVkIjpmYWxzZX0seyJjb2RlIjoiUEMiLCJwYWlkVXBUbyI6IjIwMjEtMDgtMTkiLCJleHRlbmRlZCI6ZmFsc2V9LHsiY29kZSI6IlJDIiwicGFpZFVwVG8iOiIyMDIxLTA4LTE5IiwiZXh0ZW5kZWQiOmZhbHNlfSx7ImNvZGUiOiJSRCIsInBhaWRVcFRvIjoiMjAyMS0wOC0xOSIsImV4dGVuZGVkIjpmYWxzZX0seyJjb2RlIjoiRE0iLCJwYWlkVXBUbyI6IjIwMjEtMDgtMTkiLCJleHRlbmRlZCI6ZmFsc2V9LHsiY29kZSI6IkNMIiwicGFpZFVwVG8iOiIyMDIxLTA4LTE5IiwiZXh0ZW5kZWQiOmZhbHNlfSx7ImNvZGUiOiJSUzAiLCJwYWlkVXBUbyI6IjIwMjEtMDgtMTkiLCJleHRlbmRlZCI6ZmFsc2V9LHsiY29kZSI6IlJTQyIsInBhaWRVcFRvIjoiMjAyMS0wOC0xOSIsImV4dGVuZGVkIjp0cnVlfSx7ImNvZGUiOiJHTyIsInBhaWRVcFRvIjoiMjAyMS0wOC0xOSIsImV4dGVuZGVkIjpmYWxzZX0seyJjb2RlIjoiUlNGIiwicGFpZFVwVG8iOiIyMDIxLTA4LTE5IiwiZXh0ZW5kZWQiOnRydWV9LHsiY29kZSI6IlBTIiwicGFpZFVwVG8iOiIyMDIxLTA4LTE5IiwiZXh0ZW5kZWQiOmZhbHNlfSx7ImNvZGUiOiJEUE4iLCJwYWlkVXBUbyI6IjIwMjEtMDgtMTkiLCJleHRlbmRlZCI6ZmFsc2V9LHsiY29kZSI6IkFDIiwicGFpZFVwVG8iOiIyMDIxLTA4LTE5IiwiZXh0ZW5kZWQiOmZhbHNlfSx7ImNvZGUiOiJQREIiLCJwYWlkVXBUbyI6IjIwMjEtMDgtMTkiLCJleHRlbmRlZCI6dHJ1ZX0seyJjb2RlIjoiUFdTIiwicGFpZFVwVG8iOiIyMDIxLTA4LTE5IiwiZXh0ZW5kZWQiOnRydWV9LHsiY29kZSI6IlBHTyIsInBhaWRVcFRvIjoiMjAyMS0wOC0xOSIsImV4dGVuZGVkIjp0cnVlfSx7ImNvZGUiOiJQUFMiLCJwYWlkVXBUbyI6IjIwMjEtMDgtMTkiLCJleHRlbmRlZCI6dHJ1ZX0seyJjb2RlIjoiUFBDIiwicGFpZFVwVG8iOiIyMDIxLTA4LTE5IiwiZXh0ZW5kZWQiOnRydWV9LHsiY29kZSI6IlBSQiIsInBhaWRVcFRvIjoiMjAyMS0wOC0xOSIsImV4dGVuZGVkIjp0cnVlfSx7ImNvZGUiOiJQU1ciLCJwYWlkVXBUbyI6IjIwMjEtMDgtMTkiLCJleHRlbmRlZCI6dHJ1ZX0seyJjb2RlIjoiUFNJIiwicGFpZFVwVG8iOiIyMDIxLTA4LTE5IiwiZXh0ZW5kZWQiOnRydWV9LHsiY29kZSI6IkRQIiwicGFpZFVwVG8iOiIyMDIxLTA4LTE5IiwiZXh0ZW5kZWQiOnRydWV9LHsiY29kZSI6IlJTIiwicGFpZFVwVG8iOiIyMDIx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
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    .configureBabel((config) => {
        config.plugins.push('@babel/plugin-proposal-class-properties');
    })

    // enables @babel/preset-env polyfills
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })

    // enables Sass/SCSS support
    //.enableSassLoader()

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you use React
    //.enableReactPreset()

    // uncomment to get integrity="..." attributes on your script & link tags
    // requires WebpackEncoreBundle 1.4 or higher
    //.enableIntegrityHashes(Encore.isProduction())

    // uncomment if you're having problems with a jQuery plugin
    //.autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
