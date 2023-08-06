<?php
get_header();
?>

<main>
	<section class="infos">
		<header class="infos__title">
			<div class="container">
				<h1>お知らせ</h1>
			</div>
			<div class="infos__img">
				<img src="<?= IMG ?>/common/infotop.webp" alt="製材のイメージ">
			</div>
		</header>
		<div class="infos__menu">
			<div class="container">
				<?php if (have_posts()) { ?>
					<ul class="infos__list">
						<?php
						while (have_posts()) {
							the_post();
						?>
							<li class="infos__item">
								<div class="infos__name">
									<time><?php the_time('Y年m月d日'); ?></time>
									<h3><?php the_title(); ?></h3>
								</div>
								<div class="infos__nameimg">
									<img src="<?= IMG ?>/common/info_name.svg" alt="木のイメージ">
								</div>
								<?php the_excerpt(); ?>
								<div class="infos__btn">
									<a href="<?php the_permalink(); ?>" class="btn -arrow">詳細</a>
								</div>
							</li>
						<?php } ?>
					</ul>
				<?php } else { ?>
					<p>お知らせがありません。</p>
				<?php } ?>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
