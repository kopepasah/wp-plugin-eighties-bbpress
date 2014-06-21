module.exports = function(grunt) {

	grunt.initConfig({
		less: {
			compress: {
				files: {
					'template/css/bbpress.min.css' : 'template/css/bbpress.less' 
				},
				options: {
					compress: true,
				}
			},
			standard: {
				files: {
					'template/css/bbpress.css' : 'template/css/bbpress.less'
				}
			}
		},
		watch: {
			css: {
				files: ['template/css/bbpress.less','template/less/*.less'],
				tasks: ['less:compress'],
				options: {
					livereload: true,
				}
			}
		}
	});

	// Load tasks
	grunt.loadNpmTasks( 'grunt-contrib-less' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );

	// Register tasks
	grunt.registerTask( 'default', [
		'less',
		'watch'
	]);
};