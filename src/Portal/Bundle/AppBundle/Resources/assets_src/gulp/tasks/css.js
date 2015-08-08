var gulp   = require('gulp');
var sass   = require('gulp-ruby-sass');
var cssmin = require('gulp-cssmin');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var config = require('../config');
var _      = require('lodash');

gulp.task('css', _.map(config.groups.css, function (files, name) {
    var taskName = 'css:' + name;
    gulp.task(taskName, function () {
        gulp.src(_.map(files, function (file) {
                return config.source + '/scss/' + file;
            }))
            .pipe(sass({
                // isolate each group files
                // because the plugin puts all
                // generated css in a single tmp dir
                container: name
            }))
            .pipe(concat('portal.' + name + '.css'))
            .pipe(gulp.dest(config.dest))
            .pipe(cssmin())
            .pipe(rename({ suffix: '.min' }))
            .pipe(gulp.dest(config.dest));
    });

    return taskName;
}));