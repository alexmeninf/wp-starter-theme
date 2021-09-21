<?php

/**
 * Definições do tema e funcionalidades 
 */

// Habilitar preload nas páginas
define('THEME_ENABLE_PRELOAD', false);

// Gerar meta preload na requisição das fontes do tema
define('THEME_ENABLE_NAVBAR', true);

// Gerar meta preload na requisição das fontes do tema
define('THEME_ENABLE_PRELOAD_FONT', false);

// Suporte para troca de cor do tema
define('ENABLE_COLOR_SCHEME_MODE', false);


/**
 * Require functions
 */
include 'inc/_framework/framework.php';
include 'inc/theme.php';
include 'inc/page-details-cpl.php';
include 'inc/form/form.php';
include 'inc/dark-mode.php';