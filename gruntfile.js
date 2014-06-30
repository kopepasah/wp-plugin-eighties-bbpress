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
		},
		compress: {
			main: {
				options: {
					mode: 'zip',
					archive: function() {
						return 'releases/' + name + '.zip';
					}
				},
				files: [
					{
						expand: true,
						src: [
							'**',
							'!.gitignore',
							'!.DS_Store',
							'!template/css/bbpress.less',
							'!package.json',
							'!gruntfile.js',
							'!.git/**',
							'!template/less/**',
							'!node_modules/**',
							'!releases/**'
						]
					}
				]
			},
		}
	});

	// Load tasks
	grunt.loadNpmTasks( 'grunt-contrib-less' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-contrib-compress' );

	grunt.registerTask( 'zip', 'Make a zip file for the project.', function( name ){
		if ( name ) {
		    grunt.log.writeln( 'Zipping up the project with the name "' + name + '".');
			global.name = name;
		    grunt.task.run( 'compress' );
		} else {
			grunt.fail.fatal( 'No project name provided for the zip. Please run "grunt zip:name".' );
		}
	});

	// Register tasks
	grunt.registerTask( 'default', [
		'less'
	]);
};