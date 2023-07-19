<?php

/**
 * クエリ制御
 */
add_action('pre_get_posts', function (WP_Query $query) {
	if (is_admin() || !$query->is_main_query()) {
		return;
	}
});
