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
		},
		makepot: {
			target: {
				options: {
					domainPath: '/languages',
					potFilename: 'eighties-en_US.pot',
					mainFile: 'eighties-bbpress.php',
					exclude: [
						'template/css/.*',
						'template/js/.*',
						'template/less/.*',
						'languages/.*',
						'releases/.*',
					],
					processPot: function( pot, options ) {
						pot.headers['report-msgid-bugs-to'] = 'http://github.com/kopepasah/eighties/issues';
						pot.headers['last-translator'] = 'Justin Kopepasah <justin@kopepasah.com>';
						pot.headers['language-team'] = '';
						pot.headers['language'] = 'en_US';
						pot.headers['x-poedit-basepath'] = '..';
						pot.headers['x-poedit-sourcecharset'] = 'UTF-8';
						pot.headers['x-poedit-keywordslist'] = '__;_e;_n:1,2;_x:1,2c;_ex:1,2c;_nx:4c,1,2;esc_attr__;esc_attr_e;esc_attr_x:1,2c;esc_html__;esc_html_e;esc_html_x:1,2c;_n_noop:1,2;_nx_noop:3c,1,2;__ngettext_noop:1,2';
						pot.headers['plural-forms'] = 'nplurals=2; plural=(n != 1);';
						return pot;
					},
					type: 'wp-plugin'
				}
			}
		}
	});

	// Load tasks
	grunt.loadNpmTasks( 'grunt-contrib-less' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-contrib-compress' );
	grunt.loadNpmTasks( 'grunt-wp-i18n' );

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