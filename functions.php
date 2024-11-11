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
 * 年度／登録期限設定
 */
require TEMPLATE_PATH . '/inc/limit-option.php';

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
		'seminars',
		array(
			'labels' => $labels,
			'has_archive' => true,
			'public' => true,
			'supports' => ['title'],
			'taxonomies' => ['seminar-type'],
			'exclude_from_search' => false,
			'capability_type' => 'post',
		)
	);
	register_taxonomy('seminar-type', 'seminars', [
		'label' => '講習会カテゴリー',
		'hierarchical' => true,
		'default_term' => [
			'name' => 'その他',
			'slug' => 'others',
		],
	]);
}
add_action('init', 'lc_create_post_type');


/**
 * 最新のseminarsの投稿を取得する関数
 * 
 * @param string $term_slug seminar-typeのtermのスラグ（government、skill、safety、othersのいずれか）
 * @return WP_Query
 */
function query_latest_seminar_by_term($term_slug) {
	$args = array(
			'post_type' => 'seminars',
			'tax_query' => array(
					array(
							'seminars' => 'seminar-type',
							'field'    => 'slug',
							'terms'    => $term_slug,
					),
			),
			'posts_per_page' => 1,
			'meta_key' => 'start_lesson',    // PostMetaのキー名を指定
			'orderby' => 'meta_value',       // meta_valueで並び替え
			'meta_type' => 'DATE',           // メタ値の型を指定
			'order' => 'DESC',               // 降順（最新が先）
	);

	return new WP_Query($args);
}
/**
 * セミナーのあるなしを判定する関数
 * 
 * @return bool
 */
function has_any_seminar(){
	$seminar_count = 0;
	foreach (['skill', 'safety', 'government', 'others'] as $term_slug){
		$query = query_latest_seminar_by_term($term_slug);
		$seminar_count = $seminar_count + $query->post_count;
	}
	return $seminar_count > 0;
}

/**
 * 最新のseminarsの投稿のpermalinkを取得する関数
 * 
 * @param string $term_slug seminar-typeのtermのスラグ（government、skill、safety、othersのいずれか）
 * @return string|false 投稿が見つかればそのpermalinkを返し、それ以外はfalseを返す
 */
function get_latest_seminar_permalink_by_term($term_slug) {
	$query = query_latest_seminar_by_term($term_slug);
	if($query->have_posts()) {
			$latest_seminar = $query->posts[0];
			return get_permalink($latest_seminar->ID);
	} else {
			return false;
	}
}

/**
 * オプションで指定した講習会年度を取得する関数
 * 
 * @return string 講習会年度
 * */
function get_current_seminar_year() {
	$options = get_option( 'rsb_limit_option' );
	if(count($options) > 0 && $options['term']){
		return $options['term'];
	}
}

/**
 * オプションで指定した講習会年度を取得する関数
 * 
 * @return string 講習会年度
 * */
function get_current_registration_limit() {
	$options = get_option( 'rsb_limit_option' );
	date_default_timezone_set('Asia/Tokyo');
	if(count($options) > 0 && $options['limit_date']){
		$limit_date = new DateTime($options['limit_date']);
		return $limit_date->format('Y年m月d日');
	}
}

/**
 * seminars投稿一覧にseminar-typeカラムを追加
 */
function add_seminar_type_column($columns) {
	$new_columns = array();
	
	foreach($columns as $key => $value) {
			if ($key == 'date') {
					// dateカラムの前に新しいカラムを追加
					$new_columns['seminar_type'] = 'セミナー種別';
			}
			$new_columns[$key] = $value;
	}
	
	return $new_columns;
}
add_filter('manage_seminars_posts_columns', 'add_seminar_type_column');

/**
* セミナー種別カラムの内容を表示
*/
function display_seminar_type_column($column_name, $post_id) {
	if ($column_name == 'seminar_type') {
			$terms = get_the_terms($post_id, 'seminar-type');
			
			if (!empty($terms) && !is_wp_error($terms)) {
					$term_names = array();
					foreach ($terms as $term) {
							$term_names[] = $term->name;
					}
					echo implode(', ', $term_names);
			} else {
					echo '未分類';
			}
	}
}
add_action('manage_seminars_posts_custom_column', 'display_seminar_type_column', 10, 2);
