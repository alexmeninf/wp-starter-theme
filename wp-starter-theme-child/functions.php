<?php

/**
 * 
 * Template filho customizado
 * 
 * Template parent: wp-starter-theme/functions.php
 * Documentation URL: https://developer.wordpress.org/themes/advanced-topics/child-themes/
 * 
 * @version 1.0.0
 * 
 */


/**
 * Chamada do estilo do tema pai
 */
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

function enqueue_parent_styles()
{
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}