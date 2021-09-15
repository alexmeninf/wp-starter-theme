<?php 
/**
 * Documentation URl: https://developer.wordpress.org/reference/functions/wp_get_archives/
 */

$args = array(
	'type'            => 'monthly',
	'limit'           => '',
	'format'          => 'html', 
	'before'          => '',
	'after'           => '',
	'show_post_count' => true,
	'echo'            => 1,
	'order'           => 'DESC'
); ?>

<ul class="sidebar-archives">
  <?php wp_get_archives( $args ); ?>
</ul>