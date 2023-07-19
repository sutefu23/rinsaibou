<?php

/**
 * 抜粋の文字数・省略記号
 */
add_filter('excerpt_length', function () {
	return 35;
});

add_filter('excerpt_more', function () {
	return '……';
});
