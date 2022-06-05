// plugin
const path = require('path');
const gulp = require('gulp');
const { watch } = require('fs');
const gulpSass = require('gulp-sass')(require('sass'));
// const postcss = require('postcss');
// const gulpPostcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');



/* ------------------
variables 
------------------ */
// root
const WEBROOT_DIRECTORY = path.resolve('../cakephp/app/webroot');
const CSS_DIRECTORY = path.resolve(WEBROOT_DIRECTORY + '/css');
const SCSS_DIRECTORY = path.resolve('../scss');

// flg
let buildMode = true;

/* ------------------
functions
------------------ */
// scssCompile
const scssCompile_taskFunction = ()=>
{
	return (
		gulp
			//対象ファイル取得
			.src(SCSS_DIRECTORY + '/*.scss')
			// コンパイルを実行
			.pipe(gulpSass({
				outputStyle: buildMode ? 'expanded' : 'compressed',
				includePaths: [
					SCSS_DIRECTORY,
				]
			})).on("error", gulpSass.logError)
			// IEは10以上、Androidは4.4以上
			// .pipe(gulpPostcss(autoprefixer()))
			// cssフォルダー以下に保存
			.pipe(gulp.dest(CSS_DIRECTORY))
	);
}

// watch
const scssWatch_taskFunction = () =>
{
	return (
		gulp.watch(SCSS_DIRECTORY + '/**/*', scssCompile_taskFunction)
	);
}


/* ------------------
tasks
------------------ */
exports.scss_watch = scssWatch_taskFunction;