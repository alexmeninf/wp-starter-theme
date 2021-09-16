<form role="search" method="get" class="search-form material-form outlined-basic" action="<?php echo home_url( '/' ); ?>">
  <label class="form-group">
    <input type="search" class="search-field" 
      placeholder="&nbsp;" 
      value="<?php echo get_search_query() ?>"
      title="<?php echo esc_attr_e( 'Buscar por:', 'menin' ) ?>"
      name="s">
    <span class="screen-reader-text txt"><?php echo _e( 'Buscar por:', 'menin' ) ?></span>
    <span class="bar"></span>
    <button type="submit" class="search-submit" value="<?php echo esc_attr_e( 'Buscar', 'menin' ) ?>" aria-label="Search button"><i class="far fa-search"></i></button>
  </label>
</form>
