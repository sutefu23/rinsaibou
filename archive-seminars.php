<?php
get_header();
?>

<main>
	<section class="semitop">
		<div class="container">
			<div class="semitop__title">
				<div class="semitop__hel">
					<img src="<?= IMG ?>/common/semitop_hel.svg" alt="ヘルメットアイコン">
				</div>
				<h1>講習会一覧</h1>
				<div class="semitop__imgs">
					<div class="semitop__img"><img src="<?= IMG ?>/common/semitop_one.svg" alt="木材加工機械"></div>
					<div class="semitop__img"><img src="<?= IMG ?>/common/semitop_two.svg" alt="チェーンソー"></div>
					<div class="semitop__img"><img src="<?= IMG ?>/common/semitop_three.svg" alt="刈払機"></div>
					<div class="semitop__img"><img src="<?= IMG ?>/common/semitop_four.svg" alt="安全"></div>
				</div>
			</div>
		</div>
	</section>
	<section class="infos">
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
