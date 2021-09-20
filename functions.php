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


/**
 * Require functions
 */
include 'inc/theme.php';
include 'inc/page-details-cpl.php';
include 'inc/form/form.php';