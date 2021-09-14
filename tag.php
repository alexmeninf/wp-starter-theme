<?php
get_header();

$tag = get_queried_object();

/*----------  PAGINATION  ----------*/
$posts_total    = new WP_Query(array('post_type' => 'post', 'tag' => $tag->slug, 'posts_per_page' => -1));
$posts_count    = $posts_total->post_count;//total de posts
$posts_per_page = 9;
$pages_count    = ceil($posts_count / $posts_per_page);
$current_page   = ( isset($_GET['pg']) && $_GET['pg'] > 1 && $_GET['pg'] <= $pages_count ) ? $_GET['pg'] : 1;

$args = array(
  'post_type'      => 'post', 
  'tag'            => $tag->slug, 
  'posts_per_page' => $posts_per_page, 
  'order'          => 'DESC',
  'paged'          => $current_page
);
$query = new WP_Query($args);
?>


<section class="<?php echo section_class() ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <?php
        if ( $query->have_posts() ) : 
          while ( $query->have_posts() ) : 
          $query->the_post(); ?>

            <?php get_template_part('template-parts/post/content-post') ?>

          <?php endwhile; 
        endif;
        ?>

        <?php get_pagination($current_page, $pages_count) ?>
      </div>
      
      <?php get_sidebar(); ?>
    </div>
  </div>    
</section>


<?php get_footer(); ?>