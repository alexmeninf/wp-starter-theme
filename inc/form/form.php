<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
  exit;

/**  
 * 
 * Register Custom Post Type
 * 
 */
function post_type_menin_form()
{
  $labels = array(
    'name'                  => _x('Formulários', 'Post Type General Name', 'menin'),
    'singular_name'         => _x('Formulário', 'Post Type Singular Name', 'menin'),
    'menu_name'             => __('Formulários', 'menin'),
    'all_items'             => __('Todos os formulários', 'menin'),
    'add_new_item'          => __('Adicionar novo formulário', 'menin'),
    'new_item'              => __('Novo formulário', 'menin'),
    'edit_item'             => __('Editar formulário', 'menin'),
    'update_item'           => __('Atualizar formulário', 'menin'),
    'search_items'          => __('Buscar formulário', 'menin'),
  );

  $args = array(
    'label'                 => __('Formulário', 'menin'),
    'description'           => __('Adicione um novo formulário de envio.', 'menin'),
    'labels'                => $labels,
    'supports'              => array('title', 'custom-fields'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 80,
    'menu_icon'             => THEMEROOT . '/assets/img/icons/admin-icon-form.png',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'rewrite'               => false,
    'capability_type'       => 'post',
  );

  register_post_type('menin_form', $args);
}

add_action('init', 'post_type_menin_form', 0);


/**
 * 
 * Display custom column shortcode 
 * 
 * */
add_filter('manage_menin_form_posts_columns', 'set_custom_edit_menin_form_columns');
add_action('manage_menin_form_posts_custom_column', 'custom_menin_form_column', 10, 2);

function set_custom_edit_menin_form_columns($columns)
{
  $columns['shortcode'] = __('Shortcode', 'menin');

  return $columns;
}

function custom_menin_form_column($column, $post_id)
{
  switch ($column) {
    case 'shortcode':
      echo '<input type="text" onfocus="this.select();" readonly="readonly" value="[mf_template id=' . esc_attr($post_id) . ']" class="code">';
      break;
  }
}


/**
 * 
 * Register shortcode
 * 
 */
function theme_form_shortcode($atts, $content = null, $tag)
{
  extract(shortcode_atts(array(
    'id' => null
  ), $atts));

  $args = array(
    'post_type'      => 'menin_form',
    'p'              => $id,
    'posts_per_page' => 1,
  );

  $query = new  WP_Query($args);

  if ($query) :
    while ($query->have_posts()) :
      $query->the_post();

      get_template_part('inc/form/template-form');

    endwhile;

    
    mf_js_scripts();

  endif;

  wp_reset_query();
}

add_shortcode('mf_template', 'theme_form_shortcode');


/**
 * 
 * Verifica a quantidade de shortcodes na página
 * 
 */
function mf_count_shortcode_in_page()
{
  global $page;
  static $i = 1;

  $spp = 100; // Limite de shortcodes na página.  
  $ii = $i + (($page - 1) * $spp);
  $quantity = $ii;
  $i++;

  return $quantity;
}


/**
 * 
 * Scripts necessários para envio e validação.
 * 
*/
function mf_js_scripts() { 
  
  if (mf_count_shortcode_in_page() == 1) :
  ?>

  <script>
    function clear_form_elements(parentClass) {
      $(parentClass).find(':input').each(function() {
        switch (this.type) {
          case 'password':
          case 'text':
          case 'textarea':
          case 'file':
          case 'select-one':
          case 'select-multiple':
          case 'date':
          case 'number':
          case 'tel':
          case 'email':
            $(this).val('');
            break;
          case 'checkbox':
          case 'radio':
            this.checked = false;
            break;
        }
      });
    }
  </script>

  <?php
  endif;
}


/**
 * 
 * Generate input
 * 
 */
function input($name, $id, $type, $is_required = false, $value = '', $custom_class = '', $radio_name = '') { 
	$value = (trim($value) != '') ? ' value="' .$value. '"' : '';
	$required = $is_required ? 'required' : ''; 

	if ($type == 'hidden') : ?>
		<input type="<?= $type ?>" id="<?= $id ?>" name="<?= $id ?>"<?= $value ?>>

	<?php elseif ($type == 'textarea') : ?>
		<label class="form-group">
			<textarea id="<?= $id ?>" name="<?= $id ?>"<?= $value ?> placeholder="&nbsp;" <?= $required ?> class="<?= $custom_class ?>"></textarea>
			<span class="txt">
				<?= $name ?> 
				<?= $is_required ? '<sup class="text-danger">*</sup>' : '' ?>
			</span>
			<span class="bar"></span>
		</label>
	
  <?php elseif ($type == 'radio') : ?>
		<div class="form-check radio">
      <input type="<?= $type ?>" id="<?= $id ?>" name="<?= $radio_name ?>"<?= $value ?> placeholder="&nbsp;" class="form-check-input <?= $custom_class ?>">
			<label class="form-check-label" for="<?= $id ?>">
				<?= $name ?>
			</label>
		</div>

	<?php else: ?>
		<label class="form-group">
			<input type="<?= $type ?>" id="<?= $id ?>" name="<?= $id ?>"<?= $value ?> placeholder="&nbsp;" <?= $required ?> class="<?= $custom_class ?>">
			<span class="txt">
				<?= $name ?> 
				<?= $is_required ? '<sup class="text-danger">*</sup>' : '' ?>
			</span>
			<span class="bar"></span>
		</label>
<?php
	endif;
}