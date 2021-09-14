<?php
/**
 * 
 * Template name: Matriculas abertas
 * 
 * */

get_header();

if (have_posts()) : while (have_posts()) : the_post(); ?>


<section class="<?php echo section_class('', true, false) ?>">
  <div class="container">
    <div class="row justify-content align-items">
      <div class="col-12">
        <?php the_sales_button(); // btn com link para hotmart ?>
      </div>
    </div>
  </div>
</section>


<?php 
endwhile; endif; 

get_footer(); ?>