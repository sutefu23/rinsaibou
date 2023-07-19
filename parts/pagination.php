<?php
$max_num = ($args['query'] ?? $wp_query)->max_num_pages;

if ($max_num > 1) {
	$paged = get_query_var('paged');
?>
	<div class="pagination">
		<?php
		if ($paged > 1) {
		?>
			<div class="pagination__prev">
				<a href="<?= get_previous_posts_page_link() ?>">&lt;</a>
			</div>
		<?php
		} else {
		?>
			<div class="pagination__prev -disabled">
				<span>&lt;</span>
			</div>
		<?php
		}
		$mid_size = $paged > 1 && $paged < $max_num ? 1 : 2;

		echo paginate_links([
			'prev_next' => false,
			'current' => max(1, $paged),
			'total' => $max_num,
			'type' => 'list',
			'mid_size' => $mid_size,
		]);

		if ($next_link = get_next_posts_page_link($max_num)) {
		?>
			<div class="pagination__next<?= $next_link ? '' : ' -disabled' ?>">
				<a href="<?= $next_link ?>">&gt;</a>
			</div>
		<?php
		} else {
		?>
			<div class="pagination__next -disabled">
				<span>&gt;</span>
			</div>
		<?php
		}
		?>
	</div>
<?php
}
