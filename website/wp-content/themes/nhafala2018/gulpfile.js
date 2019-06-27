'use strict';

var gulp = require('gulp');

var rootDir = './';
var targetDir = rootDir + 'assets/';
var sourceDir = rootDir + 'assets-src/';

// CSS related plugins.
var less = require('gulp-less');
var autoprefixer = require('gulp-autoprefixer');
var cleanCss = require('gulp-clean-css');

// JS related plugins.
var concat = require('gulp-concat');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var babel = require('gulp-babel');
// Images related plugins
var imagemin = require('gulp-imagemin');

// Utility related plugins.
var rename = require('gulp-rename');
var notify = require('gulp-notify');
var livereload = require('gulp-livereload');

gulp.task('less', function() {
	gulp
		.src(sourceDir + 'less/style.less')
		.pipe(less())
		.pipe(
			autoprefixer({
				browsers: [ 'last 2 versions' ],
				cascade: false
			})
		)
		.pipe(
			cleanCss({
				keepSpecialComments: 0
			})
		)
		.pipe(gulp.dest(targetDir + 'css'))
		.pipe(livereload());
});

gulp.task('js', function() {
	gulp
		.src([
      'node_modules/social-likes/dist/social-likes.min.js',
      'node_modules/swipebox/src/js/jquery.swipebox.min.js',
			sourceDir + 'js/script.js'
		])
		.pipe(jshint())
		.pipe(concat('script.js'))
		.pipe(
			babel({
				presets: [ 'latest' ]
			})
		)
		.pipe(uglify())
		.pipe(gulp.dest(targetDir + 'js'))
		.pipe(livereload());
});

gulp.task('php', function() {
	gulp.src(sourceDir).pipe(livereload());
});

gulp.task('images', function() {
	gulp.src(targetDir + 'images/*').pipe(imagemin()).pipe(gulp.dest(targetDir + 'images'));
});

gulp.task('watch', function() {
	livereload.listen();
	gulp.watch(sourceDir + 'less/**/*.less', [ 'less' ]);
	gulp.watch(sourceDir + 'js/**/*.js', [ 'js' ]);
	gulp.watch(rootDir + '**/*.php', [ 'php' ]);
});

gulp.task('default', [
  // 'images',
  'less',
  'js',
  'watch'
]);
