'use strict'

var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var cssnano = require('gulp-cssnano');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync');
var connect = require('gulp-connect-php');
var runSequence = require('run-sequence');

// Gulp Sass
gulp.task('sass', function () {
  return gulp.src('assets/public/src/scss/style.scss')
    .pipe(sourcemaps.init())
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(concat('app.css'))
    .pipe(sourcemaps.write())
    .pipe(cssnano())
    .pipe(gulp.dest('assets/public/dist/css'))
    .pipe(browserSync.stream());
});

// Gulp Script
gulp.task('scripts', function() {
  return gulp.src('assets/public/src/js/**/*.js')
    .pipe(concat('app.js'))
    .pipe(uglify())
    .pipe(gulp.dest('assets/public/dist/js'));
});

// Start browserSync
gulp.task('connect-sync', function() {
  connect.server({}, function (){
    browserSync({
      proxy: '127.0.0.1/kirulads'
    });
  });
 
  gulp.watch('application/views/public/**/*.php').on('change', function () {
    browserSync.reload();
  });
});

// Watchers
gulp.task('watch', function () {
  gulp.watch('assets/public/src/scss/**/*.scss', ['sass']);
  gulp.watch('assets/public/src/js/**/*.js', ['scripts']);
});

// Default task
gulp.task('default', function (callback) {
  runSequence(['sass', 'scripts', 'connect-sync'], 'watch');
});

