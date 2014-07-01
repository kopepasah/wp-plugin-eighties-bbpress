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
				tasks: ['less:compress', 'shell:grunt'],
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
							'!releases/**',
							'!assets/**'
						]
					}
				]
			},
		},
		makepot: {
			target: {
				options: {
					domainPath: '/languages',
					potFilename: 'eighties-bbpress-en_US.pot',
					exclude: [
						'assets/.*',
						'template/css/.*',
						'template/js/.*',
						'template/less/.*',
						'languages/.*',
						'releases/.*',
						'gruntfile.js',
						'license.txt',
						'package.json'
					],
					processPot: function( pot, options ) {
						pot.headers['report-msgid-bugs-to'] = 'http://github.com/kopepasah/eighties-bbpress/issues';
						delete pot.headers['x-generator'];

						return pot;
					},
					type: 'wp-plugin'
				}
			}
		},
		shell: {
			grunt: {
				command: 'afplay ~/Library/Sounds/Grunt.aiff'
			}
		}
	});

	// Load tasks
	grunt.loadNpmTasks( 'grunt-contrib-less' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-contrib-compress' );
	grunt.loadNpmTasks( 'grunt-wp-i18n' );
	grunt.loadNpmTasks( 'grunt-shell' );

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