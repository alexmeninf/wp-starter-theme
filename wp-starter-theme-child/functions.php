<?php

include get_template_directory() . '/inc/_framework/framework.php';
include get_stylesheet_directory() . '/inc/custom-theme.php';

/**
 * CSS Files
 */
new_css('animate-default', 'assets/plugins/wow/css/animate.css');
new_css('bootstrap-grid', 'assets/plugins/bootstrap/css/bootstrap-grid.css');
new_css('bootstrap-reboot', 'assets/plugins/bootstrap/css/bootstrap-reboot.css');
new_css('bootstrap-utilities', 'assets/plugins/bootstrap/css/bootstrap-utilities.css');
new_css('bootstrap', 'assets/plugins/bootstrap/css/bootstrap.css');
new_css('fontawesome-default', 'assets/plugins/fontawesome/css/all.min.css');
new_css('parent-style', 'style.css');
new_css('main-default', 'assets/css/main.css', false, true);
new_css('child-style', 'style.css', false, true);

/**
 * Use CSS Default
 */
// use_css('animate-default');
// use_css('bootstrap-grid');
// use_css('bootstrap-reboot');
// use_css('bootstrap-utilities');
use_css('bootstrap');
use_css('fontawesome-default');
use_css('parent-style');
use_css('main-default');
// use_css('child-style');


/**
 * Scripts Files 
 */
new_js('jquery-default', 'assets/plugins/jquery/jquery.min.js', false);
new_js('utilities', 'assets/plugins/util.js');
new_js('bootstrap-default', 'assets/plugins/bootstrap/js/bootstrap.min.js');
new_js('jquery.mask-default', 'assets/plugins/jquery-mask/js/jquery.mask.min.js');
new_js('lazyload-default', 'assets/plugins/lazyload.min.js');
new_js('sweetalert-default', 'assets/plugins/sweetalert/sweetalert2.all.min.js');
new_js('wow-default', 'assets/plugins/wow/js/wow.min.js');
new_js('countdown', 'assets/plugins/countdown.js');
new_js('swiped-events', 'assets/plugins/swiped-events.min.js');
new_js('smooth-scroll', 'assets/plugins/smooth-scroll.js');
new_js('main-default', 'assets/js/main.js', true, true);

/**
 * Use JS Default
 */
use_js('jquery-default');
// use_js('utilities');
// use_js('bootstrap-default');
// use_js('jquery.mask-default');
// use_js('lazyload-default');
// use_js('sweetalert-default');
// use_js('wow-default');
// use_js('countdown');
//use_js('swiped-events');
use_js('smooth-scroll');
use_js('main-default');