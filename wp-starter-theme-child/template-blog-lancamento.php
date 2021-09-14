<?php
/**
 * 
 * Template name: Blog de lançamento
 * 
 * */

get_header();

if (have_posts()) : while (have_posts()) : the_post(); ?>


<section class="<?php echo section_class('', true, false) ?>">
  <div class="container">
    <div class="row justify-content align-items">
      <div class="col-12">
        <?php 
          // vídeo da cpl, já com embed
          $iframe         = get_field('embed_video');
          $date_published = get_field('publication_data');
          $img            = get_field('thumbnail_video');
          the_embed_video($iframe, $date_published, $img);

          // btn com link do material de apoio
          the_support_material(); 

          // botão para matrículas abertas
          the_sales_button();
        ?>
      </div>
    </div>
  </div>
</section>


<?php 
endwhile; endif; 

get_footer(); ?>