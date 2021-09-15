<?php get_header(); ?>
<?php if( have_posts() ) : while( have_posts() ) : the_post(); 

// Format date
$lang             = get_bloginfo("language"); 
$format_date_attr = ($lang == 'pt-BR') ? get_the_date('d/m/Y') : get_the_date('Y/m/d'); 
$format_date      = ($lang == 'pt-BR') ? get_the_date('d \d\e F, Y') : get_the_date('F d, Y'); 

?>


<section class="<?php echo section_class('post-single') ?>">
  <div class="container">
    <div class="row">
      <main class="col-lg-8 col-xxl-9">
        <article>
          
          <h2 class="title"><?php the_title(); ?></h2>
          
          <time class="pub-date" pubdate title="<?php printf(__('Publicado em %s', 'menin'), $format_date_attr) ?>">
            <i class="far fa-clock"></i> <?= $format_date ?>
          </time>
          
          <?php get_template_part('template-parts/post/get_categories'); ?>

          <?php if (has_post_thumbnail()) : ?>
            <?php echo get_the_post_thumbnail(get_the_ID(), 'large', ['class' => 'img-fluid single-image', 'alt' => 'single image']); ?>
          <?php endif; ?>

          <div class="content-single">
            <?php the_content(); ?>
          </div>

          <?php get_template_part('template-parts/post/get_tags'); ?>

          <?php get_template_part('template-parts/post/get_share-post'); ?>

          <div class="author-post">
            <?php echo get_avatar( get_the_author_meta('user_email'), 60 ); ?>
            <p class="author-title" rel="author"><b><?php _e('Publicado por', 'menin') ?> </b><?php echo get_the_author_meta('first_name') != '' ? get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name') : get_the_author_meta('user_nicename') ?></p>
          </div>

          <?php get_template_part('template-parts/post/get_prev-next-posts'); ?>

          <div class="comments">
            <h2><i class="fal fa-comments"></i> <?php _e('Comentários', 'menin') ?></h2>
            <?php support_comments_facebook('post'); ?>
          </div>

        </article>
      </main> <!-- /.col-lg-8 -->
      
      <?php get_sidebar() ?>
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</section> <!-- /.post-single -->


<?php endwhile; endif; ?>
<?php get_footer(); ?>
