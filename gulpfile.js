'use strict'

var gulp = require('gulp');
var gutil = require('gulp-util')
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var cssnano = require('gulp-cssnano');
var uglify = require('gulp-uglify');
var notify = require('gulp-notify');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync');
var runSequence = require('run-sequence');

// directories
var sassDir = 'src/sass';
var sassCacheDir = 'src/storage/.sass-cache';
var cssDir = 'assets/public/css';
var cssDirAdmin = 'assets/admin/css';
var jsDir = 'assets/public/js';
var jsDirAdmin = 'assets/admin/js';

// Gulp admin sass to css compile
gulp.task('admin-css', function () {
  return gulp.src(sassDir + '/admin/main.scss')
    .pipe(sourcemaps.init().on('error', gutil.log))
    .pipe(sass({cacheLocation: sassCacheDir, lineNumbers: true}).on('error', sass.logError))
    .pipe(concat('main.css'))
    .pipe(cssnano()) 
    .pipe(sourcemaps.write('maps'))   
    .pipe(gulp.dest(cssDirAdmin))
    .pipe(browserSync.stream())
    .pipe(notify({ message: "Admin CSS Processed"}));
});

// Gulp public sass to css compile
gulp.task('public-css', function () {
  return gulp.src(sassDir + '/public/main.scss')
    .pipe(sourcemaps.init().on('error', gutil.log))
    .pipe(sass({cacheLocation: sassCacheDir, lineNumbers: true}).on('error', sass.logError))
    .pipe(concat('main.css'))
    .pipe(cssnano()) 
    .pipe(sourcemaps.write('maps'))
    .pipe(gulp.dest(cssDir))
    .pipe(browserSync.stream())
    .pipe(notify({ message: "Public CSS Processed"}));
});


// Collate the css tasks
gulp.task('all-css', ['admin-css', 'public-css'], function() {
    
});

gulp.task('font-awesome', function() {
  return gulp.src('node_modules/font-awesome/fonts/*')
    .pipe(gulp.dest('assets/fonts'))
})

// Gulp Admin Scripts
gulp.task('admin-script', function() {
  return gulp.src('src/scripts/admin/*.js')
    .pipe(sourcemaps.init().on('error', gutil.log))
    .pipe(uglify())
    .pipe(sourcemaps.write('maps'))
    .pipe(gulp.dest(jsDirAdmin))
    .pipe(notify({ message: "Admin Js Processed" }));
 });

 // Gulp Public Scripts
gulp.task('public-script', function() {
  return gulp.src('src/scripts/public/*.js')
    .pipe(sourcemaps.init().on('error', gutil.log)) 
    .pipe(uglify())
    .pipe(sourcemaps.write('maps'))
    .pipe(gulp.dest(jsDir))
    .pipe(notify({ message: "Public Js Processed" }));
 });

// Watchers
gulp.task('watch', function () {
  gulp.watch(sassDir+'/**/*.scss', ['all-css']);
  //gulp.watch('src/scripts/admin/*.js', ['admin-script']);
  gulp.watch('src/scripts/public/*.js', ['public-script']);
});

// Default task
gulp.task('default', function (callback) {
  //runSequence(['all-css', 'admin-script'], 'watch');
  runSequence(['all-css', 'public-script'], 'watch');
});

