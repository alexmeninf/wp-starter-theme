module.exports = function (grunt) {
  // Project configuration.
  grunt.initConfig({
    concat: {
      js: {
        src: [
          "assets/plugins/jquery/jquery.min.js",
          "assets/plugins/util.js",
          // 'assets/plugins/bootstrap/js/bootstrap.min.js',
          // 'assets/plugins/jquery-mask/js/jquery.mask.min.js',
          // "assets/plugins/lazyload.min.js",
          "assets/plugins/smooth-scroll.js",
          // 'assets/plugins/sweetalert/sweetalert2.all.min.js',
          // "assets/plugins/wow/js/wow.min.js",
          // 'assets/plugins/countdown.js',
          // 'assets/plugins/swiped-events.min.js',
        ],
        dest: "assets/js/built.js",
      },
    },
    uglify: {
      options: {
        mangle: {
          reserved: ['jQuery']
        }
      },  
      my_target: {
        files: {
          'assets/js/built.min.js': ['assets/js/built.js']
        }
      }
    },
    watch: {
      js: {
        files: ["assets/**/**/*.js"],
        tasks: ["concat:js"],
      },
    },
  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks("grunt-contrib-concat");
  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.registerTask("default", ["concat", "uglify", "watch"]);
};
