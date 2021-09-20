<?php
$wp_starter_css = array();
$wp_starter_use_css = array();
$wp_starter_condition_css = array();


/**
 * new_css
 * Registrar CSS
 *
 * @param  string $name - Nome único para o estilo.
 * @param  string $path - Caminho do arquivo.
 * @param  boolean $footer - Se deseja carregar o arquivo no fim do HTML.
 * @param  boolean $child_dir - Defina TRUE se deseja que o diretório do arquivo não seja limitado ao tema pai.
 * 
 * @return array
 */
function new_css($name = '', $path = '', $footer = false, $child_dir = false)
{
	global $wp_starter_css;

	if ($name != '' and $path != '') {
		$wp_starter_css[$name] = $path;

		if ($footer == true) {
			$wp_starter_css[$name . '_footer'] = true;
		} else {
			$wp_starter_css[$name . '_footer'] = false;
		}

		if ($child_dir === true) {
			$wp_starter_css[$name . '_dir'] = STYLESHEET;
		} else {
			$wp_starter_css[$name . '_dir'] = THEMEROOT;
		}
	}
}


/**
 * use_css
 * Exibir o estilo
 *
 * @param  string $name - Nome do estilo registrado.
 * @param  string $condition - Nome da função WP para validar a exibição nas páginas.
 * @param  mixed $validate - ID das páginas.
 * 
 * @return array
 */
function use_css($name = '', $condition = '', $validate = '')
{
	global $wp_starter_css, $wp_starter_use_css, $wp_starter_condition_css;

	if ($name != '') {
		if ($condition != '') { // If have a condition to insert the CSS
			$generate_id = uniqid(); // Get a New ID
			$wp_starter_condition_css[$generate_id]['name']      = $name . $generate_id;
			$wp_starter_condition_css[$generate_id]['original']  = $name;
			$wp_starter_condition_css[$generate_id]['condition'] = $condition;
			$wp_starter_condition_css[$generate_id]['validate']  = $validate;
		} else { // Don't have any conditions
			$generate_id = uniqid(); // Get a New ID
			$wp_starter_use_css[$generate_id]['name'] = $name . $generate_id;
			$wp_starter_use_css[$generate_id]['path'] = $wp_starter_css[$name];
		}

		$wp_starter_use_css[$generate_id]['_dir'] = $wp_starter_css[$name . '_dir'];
	}
}



/* ===============================================================
INSERT ON HEAD
=============================================================== */
add_action('wp_enqueue_scripts', 'wp_starter_css_styles');
function wp_starter_css_styles()
{
	global $wp_starter_css, $wp_starter_use_css;

	/* Register Styles */
	foreach ($wp_starter_use_css as $key => $css) {
		$name = $css['name'];
		$path = $css['path'];
		$dir = $css['_dir'];

		if (!strstr($path, 'http://') and !strstr($path, 'https://')) {
			$path = $dir . '/' . $path;
		} // Verifying if have http:// or https:// if not, add the template directory url to the path
		wp_register_style($name, $path);
	}

	/* Enqueue Styles */
	foreach ($wp_starter_use_css as $name) {
		wp_enqueue_style($name);
	}
}



/* ===============================================================
INSERT IN HEAD WITH CONDITION
=============================================================== */
add_action('wp', 'use_css_condition');
function use_css_condition()
{
	global $wp_starter_condition_css;

	foreach ($wp_starter_condition_css as $css) {
		$css_name      = $css['name'];
		$css_original  = $css['original'];
		$css_condition = $css['condition'];
		$css_validate  = $css['validate'];

		/* -- IS HOME -- */
		if ($css_condition == 'is_home') {
			if (is_home()) {
				use_css($css_original);
			}

			/* -- IS FRONT PAGE -- */
		} else if ($css_condition == 'is_front_page') {
			if (is_front_page()) {
				use_css($css_original);
			}

			/* -- IS SINGLE -- */
		} else if ($css_condition == 'is_single') {
			if ($css_validate != '') {
				if (is_single($css_validate)) {
					use_css($css_original);
				}
			} else {
				if (is_single()) {
					use_css($css_original);
				}
			}

			/* -- IS SINGULAR -- */
		} else if ($css_condition == 'is_singular') {
			if (is_singular($css_validate)) {
				use_css($css_original);
			}

			/* -- IS CATEGORY -- */
		} else if ($css_condition == 'is_category') {
			if (is_category($css_validate)) {
				use_css($css_original);
			}

			/* -- IS ARCHIVE -- */
		} else if ($css_condition == 'is_archive') {
			if (is_archive()) {
				use_css($css_original);
			}

			/* -- IS PAGE -- */
		} else if ($css_condition == 'is_page') {
			if (is_page($css_validate)) {
				use_css($css_original);
			}

			/* -- IS PAGE TEMPLATE -- */
		} else if ($css_condition == 'is_page_template') {
			if (is_page_template($css_validate)) {
				use_css($css_original);
			}

			/* -- IS SEARCH -- */
		} elseif ($css_condition == 'is_search') {
			if (is_search()) {
				use_css($css_original);
			}

			/* -- IS ADMIN -- */
		} else if ($css_condition == 'is_admin') {
			if (is_admin()) {
				use_css($css_original);
			}
		}
	}
}
