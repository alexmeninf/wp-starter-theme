<?php
/**
 * Add HTML5 theme support.
 */
function wp_after_setup_theme() {
  add_theme_support( 'html5', array( 'search-form', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'wp_after_setup_theme' );


/*
 * Remove meta tag generator 
 * Vulnerabilidade que mostra a versão do WP
 */
remove_action('wp_head', 'wp_generator');


function enable_preload_fonts() {  ?>
		<link rel="preload" crossorigin="anonymous" href="<?= THEMEROOT ?>/assets/plugins/fontawesome/webfonts/fa-regular-400.woff2" as="font">
		<link rel="preload" crossorigin="anonymous" href="<?= THEMEROOT ?>/assets/plugins/fontawesome/webfonts/fa-duotone-900.woff2" as="font">
		<link rel="preload" crossorigin="anonymous" href="<?= THEMEROOT ?>/assets/plugins/fontawesome/webfonts/fa-light-300.woff2" as="font">
		<link rel="preload" crossorigin="anonymous" href="<?= THEMEROOT ?>/assets/plugins/fontawesome/webfonts/fa-brands-400.woff2" as="font">
	<?php
} 
add_action('wp_head', 'enable_preload_fonts', 2);


/**
 * remove some styles
 */
function wc_remove_block_library_css(){
	if (!is_admin()) {
		wp_dequeue_style( 'wc-block-style' );
		wp_dequeue_style( 'wp-block-library' );
	}
} 
add_action( 'wp_enqueue_scripts', 'wc_remove_block_library_css' );


/**
 * Supost Thumbnals
*/
add_theme_support( 'post-thumbnails' );


/*====================================
=            OPTIONS PAGE            =
====================================*/
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title'  => 'Opções do site',
		'menu_title'  => 'Opções do site',
		'menu_slug'   => 'opcoes',
		'capability'  => 'edit_posts',
		'redirect'    => false
	));
}


/**
 * Show the page name
 */
function the_title_page() {
	if ( is_404() ) {
		echo 'Página não encontrada';

	} elseif ( is_tag() ) {
		single_tag_title();
		
	} elseif ( is_category() ) {
		single_cat_title();

	} elseif ( is_tax() ) {
		$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		echo $term->name;

	} elseif ( is_day() ) {
		echo "Arquivo de " . get_the_time('j \d\e F \d\e Y');

	} elseif ( is_month() ) {
		echo "Arquivo de " . get_the_time('F \d\e Y');

	} elseif ( is_year() ) {
		echo "Arquivo de " . get_the_time('Y');

	} elseif ( is_author() ) {
		echo "Arquivo do autor";

	} elseif (isset($_GET['p']) && !empty($_GET['p'])) {
		echo "Arquivo do blog";

	} elseif ( is_search() ) {
		echo "Resultados da pesquisa";
		
	} else {
		the_title();
	}
}


/**
 * Support Facebook comments
 */
function support_comments_facebook($order = 'footer', $url = '') {
	if ($url == '') {
		$url = get_permalink();
	}

	if ($order == 'post') : ?>

		<style>
			.fb_iframe_widget_fluid_desktop iframe { width: 100% !important; }.color-facebook {color: #0554c9;}
		</style>
		<?php if (strstr($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'], 'iPad') || strstr($_SERVER['HTTP_USER_AGENT'], 'Mac')) : ?>
		  <p class="text-dark ms-2" style="font-size:15px">
			<i class="fab fa-facebook color-facebook me-1"></i> Não consegue comentar? <a href="https://facebook.com/home.php" target="_blank" rel="noreferrer" title="Conecte ao facebook" class="text-decoration-none color-facebook">Conecte aqui à sua conta do Facebook</a> em outra página e volte.
		  </p>
		<?php endif; ?>
		<div class="comment-box">
			<div class="fb-comments" data-order-by="reverse_time" data-href="<?php echo $url ?>" data-width="100%" data-numposts="10"></div>
		</div>  

	<?php elseif ($order == 'footer') : ?>

		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0" nonce="zjk2iiq5"></script>
				
	<?php endif;
}


/**
 * get_pagination
 * 
 * @version 1.1
 *
 * @param  mixed $current_page
 * @param  mixed $pages_count
 * @param  mixed $maxLinks
 * @return void
 */
function get_pagination($current_page, $pages_count, $maxLinks = 2) {
  wp_reset_query();

  $args = "?";
  $firstRun = true;

  foreach ($_GET as $key => $val) {
    // Remove duplicate 'pg' parameter
    $check_pg = ('pg' != $key);

    if ($key != $parameter) {
      if (!$firstRun && $check_pg) {
        $args .= "&";
      } else {
        $firstRun = false;
      }

      if ($check_pg) {
        $args .= $key . "=" . $val;
      }
    }
  }

  if (is_search()) {
    $args .= (!array_key_exists("s", $_GET)) ? 's=' . get_search_query() : '';
    $url = get_bloginfo('url');

  } elseif (is_category()) {
    $url = get_category_link(get_queried_object()->term_id);

  } elseif (is_tax()) {
    $url = get_term_link(get_queried_object()->term_id);

  } elseif (is_tag()) {
    $url = get_tag_link(get_queried_object()->term_id);

  } elseif (is_day()) {
    $url = get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'));

  } elseif (is_month()) {
    $url = get_month_link(get_the_time('Y'), get_the_time('m'));

  } elseif (is_year()) {
    $url = get_year_link(get_the_time('Y'));

  } elseif (is_author()) {
    $url = get_author_posts_url(get_queried_object()->term_id);
    
  } else {
    $url  = get_the_permalink(get_the_ID());
  }

  $url = esc_url($url) . $args;

  if ($pages_count > 0) : ?>
    <style>
      a[disabled] {pointer-events: none;opacity: .5;user-select: none;}
    </style>

    <nav aria-label="Page navigation">
      <ul class="pagination">
        <?php
        // Check if the first page 
        $disable_link = ($current_page == 1) ? 'disabled' : '';

        echo '<li class="page-item">';
        echo '<a class="page-link" aria-label="Previous" title="Página anterior" '. $disable_link .' href="' . $url . '&pg=1"><span>&laquo;</span></a>';
        echo '</li>';

        // Previous pages
        for ($i = $current_page - $maxLinks; $i <= $current_page - 1; $i++) :
          if ($i >= 1) :
            echo '<li>';
            echo '<a class="page-link" href="' . $url . '&pg=' . $i . '">' . $i . '</a>';
            echo '</li>';
          endif;
        endfor;

        // Current page
        echo '<li class="page-item active"><a class="page-link" href="' . $url . '&pg=' . $current_page . '"> ' . $current_page . '</a></li>';

        // Next pages        
        $displaying_the_last = false;

        for ($i = $current_page + 1; $i <= $current_page + $maxLinks; $i++) :
          if ($i <= $pages_count) :
            echo '<li class="page-item">';
            echo '<a class="page-link" href="' . $url . '&pg=' . $i . '">' . $i . '</a>';
            echo '</li>';
          endif;

          // check if the last page is shown
          if ( $i == $pages_count-1 || $i == $pages_count ) $displaying_the_last = true;
        endfor;

        // Show the last page
        if ( $current_page != $pages_count && !$displaying_the_last ) :
          echo '<li class="page-item"><a class="page-link" disabled>...</a></li>';
          echo '<li class="page-item">';
          echo '<a class="page-link" href="' . $url . '&pg=' . $pages_count . '">' . $pages_count . '</a>';
          echo '</li>';
        endif;

        // Check if the last page 
        $disable_link = ($current_page == $pages_count) ? 'disabled' : 'title="Próxima página"';

        echo '<li class="page-item">';
        echo '<a class="page-link" aria-label="Next" '. $disable_link .' href="' . (($current_page != $pages_count ) ? ($url . '&pg=' . ($current_page + 1)) : '' ) . '"><span>&raquo;</span></a>';
        echo '</li>';
        ?>
      </ul>
    </nav>
<?php endif;
}



 /**
 * input
 *
 * @param  mixed $name
 * @param  mixed $type
 * @param  mixed $id
 * @return void
 */
function input($name, $id, $type, $is_required = false, $value = '') { 
	$value = (trim($value) != '') ? ' value="' .$value. '"' : '';
	$required = $is_required ? 'required' : ''; 

	if ($type == 'hidden') : ?>
		<input type="<?= $type ?>" id="<?= $id ?>" name="<?= $id ?>"<?= $value ?>>

	<?php elseif ($type == 'textarea') : ?>
		<label class="form-group">
			<textarea id="<?= $id ?>" name="<?= $id ?>"<?= $value ?> placeholder="&nbsp;" <?= $required ?>></textarea>
			<span class="txt">
				<?= $name ?> 
				<?= $is_required ? '<sup class="text-danger">*</sup>' : '' ?>
			</span>
			<span class="bar"></span>
		</label>

	<?php else: ?>
		<label class="form-group">
			<input type="<?= $type ?>" id="<?= $id ?>" name="<?= $id ?>"<?= $value ?> placeholder="&nbsp;" <?= $required ?>>
			<span class="txt">
				<?= $name ?> 
				<?= $is_required ? '<sup class="text-danger">*</sup>' : '' ?>
			</span>
			<span class="bar"></span>
		</label>
<?php
	endif;
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function menin_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Widget principal esquedo', 'menin' ),
    'id'            => 'sidebar-2',
    'description'   => __( 'Adicione widgets aqui, para aparecer no seu layout.', 'menin' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'menin_widgets_init' );


/**
 * callback_theme_logo
 * Exiba uma logo com CEO na página.
 *
 * @param  mixed $args
 * @return void
 */
function callback_theme_logo($args)
{
  $img_uri     = $args['img'];
  $max_height  = isset($args['max_height']) ? $args['max_height'] : '';
  $custom_name = isset($args['title']) ? $args['title'] : get_bloginfo('name');
  $enable_link = isset($args['link']) ? true : false;
  ?>

  <style>
    .logo-theme-page {
      max-height: calc(<?= $max_height ?> / 1.4);
    }

    @media (min-width: 992px) {
      .logo-theme-page {
        max-height: <?= $max_height ?>;
      }
    }
  </style>

  <h1 class="mb-4 text-center">
    <?= $enable_link ? '<a href="' . get_bloginfo('url') . '" class="d-inline-block">' : '' ?>
    <img src="<?= $img_uri  ?>" alt="Logo <?= $custom_name ?>" title="<?= $custom_name ?>" class="img-fluid logo-theme-page">
    <span class="visually-hidden"><?= $custom_name ?></span>
    <?= $enable_link ? '</a>' : '' ?>
  </h1>
<?php }

add_filter('logo_theme', 'callback_theme_logo', 10, 1); ?>
