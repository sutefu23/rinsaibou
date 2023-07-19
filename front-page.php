<?php
get_header();
?>

<main class="main">
	トップページ
	<?php
	the_post();
	the_content();
	?>
</main>

<?php
get_footer();
