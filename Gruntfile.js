module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        less: {
            production: {
                options: {
                    yuicompress: true,
                    report: "gzip"
                },
                files: {
                    "assets/build/css/style.css": ["assets/dev/css/bootstrap.less", "assets/dev/css/style.less"]
                }
            }
        }
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-less');

    // Default task(s).
    grunt.registerTask('default', ['less']);

};