module.exports = function(grunt) {
	grunt.loadNpmTasks('grunt-contrib-uglify'); //uglify minifies js upon save
	grunt.loadNpmTasks('grunt-contrib-watch'); //watch keeps an eye out for saves
	grunt.loadNpmTasks('grunt-contrib-compass'); //compass preprocesses scss files
	grunt.initConfig({
		uglify: {
			my_target: {
				files: {
					'_scripts/scripts.js': ['components/js/*.js']
				} //files
			} //my_target
		}, //uglify
		compass: {
			dev: {
				options: {
					config: 'config.rb'
				} //options
			} //dev
		}, //compass
		watch: { 
			options: { livereload: true }, //keeping an eye on files and updating Chrome upon save of any file
			scripts: {
				files: ['components/js/*js'],
				tasks: ['uglify']
			}, //scripts
			sass: {
				files: ['components/sass/*.scss'],
				tasks: ['compass:dev']
			}, //sass	
			hypertext: {
				files: ['*.php','*.htm']
			} //php
		} //watch
	}) //initConfig
	grunt.registerTask('default', 'watch'); //allows you to do everything above when you run grunt from command line
} //exports