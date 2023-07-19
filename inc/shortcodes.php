<?php

/**
 * ショートコード集
 */

/**
 * home_url
 */
add_shortcode('home_url', function ($atts) {
	return home_url($atts['path'] ?? '/');
});

/**
 * 画像パス
 */
add_shortcode('img', function () {
	return IMG;
});
