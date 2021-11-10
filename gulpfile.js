var gulp            = require( 'gulp' );
var sass            = require( 'gulp-sass' )( require( 'sass' ) );
//var watch           = require( 'gulp-watch' );
var debug           = require( 'gulp-debug' );
var rename          = require( 'gulp-rename' );
var sassInheritance = require( 'gulp-sass-inheritance' );
var sourcemaps      = require( 'gulp-sourcemaps' );


var scss_dir = 'scss/**/*.scss';
var css_dir  = 'assets/css';

gulp.task( 'sass', function () {
	return gulp.src( scss_dir )
		.pipe( sassInheritance( { dir: './scss/' } ) )
		.pipe( sourcemaps.init() )
		.pipe( sass( {  outputStyle: 'expanded' } ).on( 'error', sass.logError ) )
		.pipe( rename( function( path ) {
			path.extname = '.css';
		} ) )
		.pipe( sourcemaps.write() ) 
		.pipe( gulp.dest( css_dir ) )
		.pipe( debug( { title: '[sass] Compiled' } ) )
		.pipe( sass( { outputStyle: 'compressed' } ).on( 'error', sass.logError ) )
		.pipe( rename( function ( path ) {
			path.extname = '.min.css';
		} ) )
		.pipe( gulp.dest( css_dir ) )
		.pipe( debug( { title: '[sass] Minified' } ) );

});

gulp.task( 'watch', function () {
	gulp.watch( 'scss/**/*.scss', gulp.series( 'sass' ) );
});

gulp.task('default', function(){
	
});