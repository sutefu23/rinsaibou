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

/**
 * MW FORM のビジュアル無効化
 */
function visual_editor_off()
{
	global $typenow;
	if (in_array($typenow, array('page', 'mw-wp-form'))) {
		add_filter('user_can_richedit', 'off_visual_editor');
	}
}
function off_visual_editor()
{
	return false;
}
add_action('load-post.php', 'visual_editor_off');
add_action('load-post-new.php', 'visual_editor_off');


/**
 * カスタム投稿タイプの追加
 */
// register custom post type to work with
function lc_create_post_type()
{
	// set up labels
	$labels = array(
		'name' => '講習会案内',
		'singular_name' => '講習会案内',
		'add_new' => '講習会案内を新しく追加する',
		'add_new_item' => '講習会案内を新しく追加する',
		'edit_item' => '講習会案内を編集する',
		'new_item' => '新しい講習会案内',
		'all_items' => '講習会案内一覧',
		'view_item' => '講習会案内を見る',
		'search_items' => '講習会案内の中から探す',
		'not_found' => '講習会案内が見つかりません',
		'not_found_in_trash' => '講習会案内がゴミ箱の中にありません',
		'parent_item_colon' => '',
		'menu_name' => '講習会案内',
	);
	//register post type
	register_post_type(
		'event',
		array(
			'labels' => $labels,
			'has_archive' => true,
			'public' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
			'taxonomies' => array('post_tag', 'category'),
			'exclude_from_search' => false,
			'capability_type' => 'post',
			'rewrite' => array('slug' => 'events'),
		)
	);
}
add_action('init', 'lc_create_post_type');
