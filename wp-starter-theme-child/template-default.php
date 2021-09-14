<?php
/**
 * 
 * Template name: Nome de exemplo
 * 
 * */

get_header();

if (have_posts()) : while (have_posts()) : the_post(); ?>


section.min-vh-100.d-flex.align-items-center.spacing>.container>.row.justify-content-center.align-items-center>.col-12|c

<?php apply_filters('logo_theme', array('img' => THEMEROOT . '/assets/img/logo.png')); ?>

<?php 
endwhile; endif; 

get_footer(); ?>
