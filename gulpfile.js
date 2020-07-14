//
// All compiling task minifys all files

const gulp = require('gulp');
const sass = require('gulp-sass');
const maps = require('gulp-sourcemaps');
const uglify = require('gulp-uglify-es').default;
const concat = require('gulp-concat');
const rename = require('gulp-rename');

// Compile Custom Sass Files To CSS Minified Directory
gulp.task('compile-custom-sass', function(){
    return gulp.src("./src/scss/main.scss")
    .pipe(maps.init())
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(rename('main.min.css'))
    .pipe(maps.write('./'))
    .pipe(gulp.dest('./dist/css'));
});

gulp.task('javascript', () => {
   return gulp.src('./src/js/**.*')
       .pipe(uglify())
       .pipe(concat('scripts.min.js'))
       .pipe(gulp.dest('./dist/js'));
});

// If you add a new file to either bootstrap 4 or custom dir,
// run compile-boostrap OR custom-sass first then this task
// gulp.task('watchFile', ['compile-custom-sass', 'compile-amp-sass', 'compile-dt2-sass', 'compile-dwna-sass', 'criticalcss'], function() {
//     gulp.watch('./src/scss/**/**.*', ['compile-custom-sass', 'compile-amp-sass', 'compile-dt2-sass', 'compile-dwna-sass', 'criticalcss']);
//     gulp.watch('./src/js/**.*', ['javascript']);
// });
gulp.task('watchFile', ['compile-custom-sass'], function() {
    gulp.watch('./src/scss/**/**.*', ['compile-custom-sass']);
    gulp.watch('./src/js/**.*', ['javascript']);
});

gulp.task('default', ['watchFile']);