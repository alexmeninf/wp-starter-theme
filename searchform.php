<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <label>
    <span class="screen-reader-text"><?php echo _e( 'Buscar por:', 'menin' ) ?></span>
    <input type="search" class="search-field" 
      placeholder="<?php echo esc_attr_e( 'Pesquisar...', 'menin' ) ?>" 
      value="<?php echo get_search_query() ?>"
      title="<?php echo esc_attr_e( 'Buscar por:', 'menin' ) ?>"
      name="s">
  </label>
  <button type="submit" class="search-submit" value="<?php echo esc_attr_e( 'Buscar', 'menin' ) ?>"><i class="far fa-search"></i></button>
</form>
