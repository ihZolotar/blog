// Load plugins
const browsersync = require("browser-sync").create();
const gulp = require("gulp");

// Copy third party libraries from /node_modules into /public
gulp.task('public', function (cb) {

    // Bootstrap
    gulp.src([
        './node_modules/bootstrap/dist/**/*',
        '!./node_modules/bootstrap/dist/css/bootstrap-grid*',
        '!./node_modules/bootstrap/dist/css/bootstrap-reboot*'
    ])
        .pipe(gulp.dest('./public/bootstrap'));

    // jQuery
    gulp.src([
        './node_modules/jquery/dist/*',
        '!./node_modules/jquery/dist/core.js'
    ])
        .pipe(gulp.dest('./public/jquery'));

    cb();

});

// BrowserSync
function browserSync(done) {
    browsersync.init({
        server: {
            baseDir: "./"
        }
    });
    done();
}

// BrowserSync Reload
function browserSyncReload(done) {
    browsersync.reload();
    done();
}

// Watch files
function watchFiles() {
    gulp.watch("./css/*", browserSyncReload);
    gulp.watch("./**/*.html", browserSyncReload);
}

gulp.task("default", gulp.parallel('public'));

// dev task
gulp.task("dev", gulp.parallel(watchFiles, browserSync));
