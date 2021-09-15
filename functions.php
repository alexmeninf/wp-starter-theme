<?php

/**
 * Definições do tema e funcionalidades 
 */

// Habilitar preload nas páginas
define('THEME_ENABLE_PRELOAD', false);

// Gerar meta preload na requisição das fontes do tema
define('THEME_ENABLE_NAVBAR', true);

// Gerar meta preload na requisição das fontes do tema
define('THEME_ENABLE_PRELOAD_FONT', false);


/**
 * Require functions
 */
include 'inc/_framework/framework.php';
include 'inc/theme.php';
include 'inc/page-details-cpl.php';
include 'inc/form/form.php';


/**
 * CSS Files
 */
new_css('animate-default', 'assets/plugins/wow/css/animate.css');
new_css('bootstrap-grid', 'assets/css/bootstrap/bootstrap-grid.css');
new_css('bootstrap-reboot', 'assets/css/bootstrap/bootstrap-reboot.css');
new_css('bootstrap-utilities', 'assets/css/bootstrap/bootstrap-utilities.css');
new_css('bootstrap', 'assets/css/bootstrap/bootstrap.css');
new_css('fontawesome-default', 'assets/plugins/fontawesome/css/all.min.css');
new_css('lightgallery-default', 'assets/plugins/lightgallery/css/lightgallery.min.css');
new_css('owl-carousel-default', 'assets/plugins/owl-carousel/css/owl.carousel.min.css');
new_css('main-default', 'assets/css/main.css');
new_css('style-default', 'style.css');

/**
 * Use CSS Default
 */
// use_css('animate-default');
// use_css('bootstrap-grid');
// use_css('bootstrap-reboot');
// use_css('bootstrap-utilities');
use_css('bootstrap');
use_css('fontawesome-default');
// use_css('lightgallery-default');
// use_css('owl-carousel-default');
use_css('main-default');
use_css('style-default');


/**
 * Scripts Files 
 */
new_js('jquery-default', 'assets/plugins/jquery/jquery.min.js', true);
new_js('utilities', 'assets/js/util.js', true);
new_js('popper-default', 'assets/plugins/popper.min.js', true);
new_js('bootstrap-default', 'assets/plugins/bootstrap/js/bootstrap.min.js', true);
new_js('jarallax', 'assets/plugins/jarallax/jarallax.min.js', true);
new_js('jquery.mask-default', 'assets/plugins/jquery-mask/js/jquery.mask.min.js', true);
new_js('lazyload-default', 'assets/plugins/lazyload.min.js', true);
new_js('lightgallery-default', 'assets/plugins/lightgallery/js/lightgallery.min.js', true);
new_js('owl-carousel-default', 'assets/plugins/owl-carousel/js/owl.carousel.min.js', true);
new_js('sweetalert-default', 'assets/plugins/sweetalert/sweetalert2.all.min.js', true);
new_js('tilt.js', 'assets/plugins/tilt.js/tilt.jquery.min.js', true);
new_js('wow-default', 'assets/plugins/wow/js/wow.min.js', true);
new_js('smooth-scroll', 'assets/plugins/smooth-scroll.js', true);
new_js('countdown', 'assets/js/countdown.js', true);
new_js('swiped-events', 'assets/js/swiped-events.min.js', true);
new_js('main-default', 'assets/js/main.js', true);

/**
 * Use JS Default
 */
use_js('jquery-default');
//use_js('utilities');
// use_js('popper-default');
// use_js('bootstrap-default');
// use_js('jarallax');
// use_js('jquery.mask-default');
// use_js('lazyload-default');
// use_js('lightgallery-default');
// use_js('owl-carousel-default');
// use_js('sweetalert-default');
// use_js('tilt.js');
// use_js('wow-default');
use_js('smooth-scroll');
// use_js('countdown');
//use_js('swiped-events');
use_js('main-default');