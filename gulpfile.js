/**
 * Gulpfile.
 *
 * Gulp with WordPress.
 *
 * Implements:
 *      1. Live reloads browser with BrowserSync.
 *      2. CSS: Sass to CSS conversion, error catching, Autoprefixing, Sourcemaps,
 *         CSS minification, and Merge Media Queries.
 *      3. JS: Concatenates & uglifies Vendor and Custom JS files.
 *      4. Images: Minifies PNG, JPEG, GIF and SVG images.
 *      5. Watches files for changes in CSS or JS.
 *      6. Watches files for changes in PHP.
 *      7. Corrects the line endings.
 *      8. InjectCSS instead of browser page reload.
 *      9. Generates .pot file for i18n and l10n.
 *
 * @author Nikola Ivanov
 * @version 1.0.0
 */

/**
 * Configuration.
 *
 * Project Configuration for gulp tasks.
 *
 * In paths you can add <<glob or array of globs>>. Edit the variables as per your project requirements.
 */

// START Editing Project Variables.
// Project related.
var project = 'theme_folder'; // Project Name.
var projectURL = 'localhost/theme_folder'; // Local project URL of your already running WordPress site. Could be something like local.dev or localhost:8888.
var productURL = './'; // Theme/Plugin URL. Leave it like it is, since our gulpfile.js lives in the root folder.


// Style related.
var styleSRC = './scss/style.scss'; // Path to main .scss file.
var styleDestination = './'; // Path to place the compiled CSS file.
// Default set to root folder.


// Watch files paths.
var styleWatchFiles = './scss/**/*.scss'; // Path to all *.scss files inside css folder and inside them.
var customJSWatchFiles = './js/*.js'; // Path to all JS files.
var projectPHPWatchFiles = './**/*.php'; // Path to all PHP files.


// Browsers you care about for autoprefixing.
// Browserlist https        ://github.com/ai/browserslist
const AUTOPREFIXER_BROWSERS = [
  'last 2 version',
  '> 1%',
  'ie >= 9',
  'ie_mob >= 10',
  'ff >= 30',
  'chrome >= 34',
  'safari >= 7',
  'opera >= 23',
  'ios >= 7',
  'android >= 4',
  'bb >= 10'
];

// STOP Editing Project Variables.

/**
 * Load Plugins.
 *
 * Load gulp plugins and passing them semantic names.
 */
var gulp = require('gulp'); // Gulp of-course

// CSS
var sass = require('gulp-sass'); // Gulp pluign for Sass compilation.
var minifycss = require('gulp-uglifycss'); // Minifies CSS files.
var autoprefixer = require('gulp-autoprefixer'); // Autoprefixing magic.
var mmq = require('gulp-merge-media-queries'); // Combine matching media queries into one media query definition.

// JS
var bro = require("gulp-bro");
var babelify = require("babelify");
var uglify = require('gulp-uglify'); // Minifies JS files

// Utility related plugins.
var rename = require('gulp-rename'); // Renames files E.g. style.css -> style.min.css
var lineec = require('gulp-line-ending-corrector'); // Consistent Line Endings for non UNIX systems. Gulp Plugin for Line Ending Corrector (A utility that makes sure your files have consistent line endings)
var filter = require('gulp-filter'); // Enables you to work on a subset of the original files by filtering them using globbing.
var sourcemaps = require('gulp-sourcemaps'); // Maps code in a compressed file (E.g. style.css) back to it’s original position in a source file (E.g. structure.scss, which was later combined with other css files to generate style.css)
var notify = require('gulp-notify'); // Sends message notification to you
var browserSync = require('browser-sync').create(); // Reloads browser and injects CSS. Time-saving synchronised browser testing.
var reload = browserSync.reload; // For manual browser reload.

/**
 * Task: `browser-sync`.
 *
 * Live Reloads, CSS injections, Localhost tunneling.
 *
 * This task does the following:
 *    1. Sets the project URL
 *    2. Sets inject CSS
 *    3. You may define a custom port
 *    4. You may want to stop the browser from openning automatically
 */
gulp.task('browser-sync', function () {
  browserSync.init({

    // For more options
    // @link http://www.browsersync.io/docs/options/

    // Project URL.
    proxy: projectURL,

    // `true` Automatically open the browser with BrowserSync live server.
    // `false` Stop the browser from automatically opening.
    open: true,

    // Inject CSS changes.
    // Commnet it to reload browser for every CSS change.
    // injectChanges: true,

    // Use a specific port (instead of the one auto-detected by Browsersync).
    // port: 80, // 80 works with windows xampp

  });
});





gulp.task('styles', function () {
  gulp.src(styleSRC)
    .pipe(sourcemaps.init())
    .pipe(sass({
      errLogToConsole: true,
      outputStyle: 'compact',
      // outputStyle: 'compressed',
      // outputStyle: 'nested',
      // outputStyle: 'expanded',
      precision: 10
    }))
    .on('error', console.error.bind(console))
    .pipe(sourcemaps.write({
      includeContent: false
    }))
    .pipe(sourcemaps.init({
      loadMaps: true
    }))
    .pipe(autoprefixer(AUTOPREFIXER_BROWSERS))
    .pipe(sourcemaps.write('./'))
    .pipe(lineec()) // Consistent Line Endings for non UNIX systems.
    .pipe(gulp.dest(styleDestination))
    .pipe(filter('**/*.css')) // Filtering stream to only css files
    .pipe(mmq({ 
      log: true
    })) // Merge Media Queries only for .min.css version.
    .pipe(browserSync.stream()) // Reloads style.css if that is enqueued.
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(minifycss({
      maxLineLen: 10
    }))
    .pipe(lineec()) // Consistent Line Endings for non UNIX systems.
    .pipe(gulp.dest(styleDestination))

    .pipe(filter('**/*.css')) // Filtering stream to only css files
    .pipe(browserSync.stream()) // Reloads style.min.css if that is enqueued.
    // .pipe(notify({
    //   message: 'TASK: "styles" Completed! 💯',
    //   onLast: true
    // }))
});






// This should be run manually only when all css changes are finished to minify the file
gulp.task('minifycss', function () {
  gulp.src('./style.min.css')
    .pipe(rename('./style.css'))
    .pipe(gulp.dest(styleDestination))
    // .pipe(notify({
    //   message: 'TASK: "Minify CSS" Completed! 💯',
    //   onLast: true
    // }))
});





/* es6, bundling and minification */
gulp.task('customJS', function() {
  gulp.src('./js/main.js')
    .pipe(sourcemaps.init())
    .pipe(bro({
      transform: [
        babelify,
      ]
    }))
    .pipe(rename('app.min.js'))
    .pipe(uglify())
    .pipe(lineec())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./js-compiled'))
    // .pipe(notify({
    //   message: 'TASK: "customJs" Completed! 💯',
    //   onLast: true
    // }));
});






/**
 * Watch Tasks.
 *
 * Watches for file changes and runs specific tasks.
 */
gulp.task('default', ['styles', 'customJS', 'browser-sync'], function () {
  gulp.watch(projectPHPWatchFiles, reload); // Reload on PHP file changes.
  gulp.watch(styleWatchFiles, ['styles']); // Reload on SCSS file changes.
  gulp.watch(customJSWatchFiles, ['customJS', reload]); // Reload on customJS file changes.
});
