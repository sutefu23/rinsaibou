<?php

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

// テンプレートパス・URL
define('TEMPLATE_URL', get_template_directory_uri());
define('TEMPLATE_PATH', get_template_directory());

// 画像パス・URL
define('IMG_PATH', TEMPLATE_PATH . '/img');
define('IMG', TEMPLATE_URL . '/img');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
require TEMPLATE_PATH . '/inc/setup.php';

/**
 * ショートコード集
 */
require TEMPLATE_PATH . '/inc/shortcodes.php';

/**
 * Enqueue scripts and styles.
 */
require TEMPLATE_PATH . '/inc/enqueue-scripts.php';

/**
 * クエリ制御
 */
require TEMPLATE_PATH . '/inc/query-controller.php';

/**
 * 抜粋の文字数・省略記号
 */
require TEMPLATE_PATH . '/inc/excerpt.php';
