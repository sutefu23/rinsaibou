<?php
get_header();
?>

<main class="main">
	<section class="section">
		<div class="container">
			<header class="heading">
				<h1 class="heading__main">お探しのページは見つかりませんでした</h1>
				<p class="heading__sub">404 Not Found</p>
			</header>
			<p class="section__sentence">申し訳ございません。お探しのページは見つかりませんでした。</p>
			<div class="section__btn">
				<a href="<?= home_url('/') ?>" class="btn">トップページへ</a>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
