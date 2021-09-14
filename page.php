<?php get_header(); ?>
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>


<section class="<?php echo section_class() ?>">
  <div class="container<?= is_active_sidebar( 'sidebar-2' ) ? '-fluid' : '' ?>">
    <div class="row justify-content-center">
      
      <?php if ( is_active_sidebar( 'sidebar-2' )  ) : ?>
        <div class="col-md-4 col-lg-3 col-xxl-2 widget-area" role="complementary">
          
          <?php dynamic_sidebar( 'sidebar-2' ); ?>
          
        </div>
      <?php endif; ?>
      
      <div class="<?= is_active_sidebar( 'sidebar-2' ) ? 'col-md-8 col-lg-9 col-xxl-10' : '10' ?>">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>


<?php endwhile; endif; ?>
<?php get_footer(); ?>
