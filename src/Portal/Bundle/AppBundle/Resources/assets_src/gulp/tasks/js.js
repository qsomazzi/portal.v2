var gulp   = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var config = require('../config');
var _      = require('lodash');

gulp.task('js', _.map(config.groups.js, function (files, name) {
    var taskName = 'js:' + name;
    var deps     = [];
    gulp.task(taskName, deps, function () {
        gulp.src(_.map(files, function (file) {
                return config.source + '/' + file;
            }))
            .pipe(concat('portal.' + name + '.js'))
            .pipe(gulp.dest(config.dest))
            .pipe(uglify())
            .pipe(rename({ suffix: '.min' }))
            .pipe(gulp.dest(config.dest));
    });

    return taskName;
}));