<?php
if ( ! defined('THEMEROOT') )
  define('THEMEROOT', get_template_directory_uri());

if ( ! defined('STYLESHEET') )
  define('STYLESHEET', get_stylesheet_directory_uri());

  
if (!function_exists('new_js') && !function_exists('new_css')) {
  require('wp-enqueue-styles.php');
  require('wp-enqueue-scripts.php');
}
