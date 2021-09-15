<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
      <?php the_post_thumbnail('medium', ['class' => 'img-fluid', 'alt' => 'Feature image']); ?>
    </a>
  <?php endif; ?>
  <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
</div>