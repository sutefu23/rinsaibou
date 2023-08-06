<?php
get_header();
?>
<main>
	<div class="infoart">
		<div class="container">
			<article class="infoart__article">
				<section class="infoart__box">
					<header class="infoart__title">
						<time><?php the_time('Y年m月d日'); ?></time>
						<h1><?php the_title(); ?></h1>
					</header>
					<div class="infoart__content">
						<?php the_content(); ?>
					</div>
					<div class="infoart__btn">
						<a href="<?= home_url('/info/') ?>" class="btn -info -arrow">お知らせ一覧に戻る</a>
					</div>
					<div class="infoart__btn">
						<a href="<?= home_url('/') ?>" class="btn -info -arrow">TOPに戻る</a>
					</div>
					<div class="infoart__car">
						<img src="<?= IMG ?>/common/infoart_car.webp" alt="林業機械" class="infoart__carimg">
					</div>
					<div class="u-hidden-sp">
						<img src="<?= IMG ?>/common/info_name.svg" alt="木のイメージ">
					</div>
				</section>
			</article>
		</div>
		<div class="infoart__imgs">
			<div class="infoart__img -left">
			</div>
			<div class="infoart__img -right">
			</div>
		</div>
	</div>
</main>
<?php
get_footer();
