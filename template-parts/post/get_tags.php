<?php
$post_tags = get_the_tags();

if ( $post_tags ) { 
  $numItems = count($post_tags);
  $i = 0;
?>

<div class="single-tags">
  <span><i class="fal fa-tags"></i> <?php _e('Tags', 'menin') ?>:</span>
  <ul>
    <?php 
    foreach ( $post_tags as $tag ) {
      echo '<li><a href="'.get_tag_link($tag->term_id).'">#'.$tag->name . '</a></li>';
      
      if(++$i !== $numItems) {
        echo ', ';
      }
    } ?>
  </ul>
</div>
<?php } ?>