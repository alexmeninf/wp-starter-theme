<?php 
  $categories = get_the_category();
  $separator  = ', ';
  $output     = '';

  if ( ! empty( $categories ) ) {
    foreach( $categories as $category ) {
      $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'Visualizar todos os posts em %s', 'menin' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
    } ?>
    <div class="categories-post">
      <span><i class="fal fa-layer-group"></i> Categorias: </span>
      <div class="list">
        <?php echo trim( $output, $separator ); ?>
      </div>
    </div>
  <?php
  }
?>