<?php

/**
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('ringyo-mokuzai-style', get_stylesheet_uri(), [], _S_VERSION);

	wp_enqueue_script(
		'daiso-theme-js',
		TEMPLATE_URL . '/js/theme.js',
		['jquery'],
		_S_VERSION,
		true
	);
});
