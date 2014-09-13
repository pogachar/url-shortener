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
       .pipe(codecept('', options));
});

gulp.task('reload', function () {
    browserSync.reload();
});

gulp.task('default', ['browser-sync'], function() {
    //gulp.watch(src.tests, ['codecept']);
    gulp.watch(src.views, ['reload', 'codecept']);
});