var gulp        = require('gulp'),
    codecept    = require('gulp-codeception'),
    watch       = require('gulp-watch'),
    browserSync = require('browser-sync');

var src = {
    tests : './tests/**/*.php',
    views : './app/views/**/*.blade.php'
}
gulp.task('browser-sync', function() {
    browserSync({
        proxy: {
            host: "urlshortener.dev"
        }
    });
});

gulp.task('codecept', function() {
    var options = {flags: ' --colors --steps'};
    gulp.src(src.tests)
        .pipe(codecept('', options))
        .pipe(browserSync.reload({stream:true}));
});

gulp.task('bs-reload', function () {
    browserSync.reload();
});

gulp.task('watch', function() {
    gulp.watch(src.tests, ['codecept']);
    gulp.watch(src.views, ['bs-reload']);
});

gulp.task('default', ['watch', 'browser-sync']);