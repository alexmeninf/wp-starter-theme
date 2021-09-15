<div class="col-lg-4 col-xxl-3">
  <aside class="sidebar">

    <div class="widget">
      <h2><?php _e('Buscar no site', 'menin') ?></h2>
      <?php get_search_form(); ?>
    </div>

    <div class="widget">
      <h2><?php _e('Categorias', 'menin') ?></h2>
      <?php get_template_part('template-parts/sidebar/get_categories'); ?>
    </div>

    <div class="widget">
      <h2><?php _e('Tags', 'menin') ?></h2>
      <?php get_template_part('template-parts/sidebar/get_tags'); ?>
    </div>

    <div class="widget">
      <h2><?php _e('Registros', 'menin') ?></h2>
      <?php get_template_part('template-parts/sidebar/get_archives'); ?>
    </div>

  </aside> <!-- /.sidebar -->
</div>