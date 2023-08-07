<?php
get_header();
the_post();
the_content();
?>
<main>
	<article class="semiart">
		<section class="semiart__box">
			<header class="semiart__title">
				<div class="semiart__titleimg">
					<img src="<?= IMG ?>/common/semi_img.webp" alt="セミナーイメージ">
				</div>
				<div class="container">
					<div class="semiart__inner">
						<h1><?php the_title(); ?></h1>
						<div class="semiart__btns">
							<div class="semiart__btn">
								<a href="<?php echo wp_get_attachment_url(SCF::get('lesson_pdf')); ?>" class="btn -apply">申込書PDF</a>
							</div>
							<div class="semiart__btn">
								<a href="<?php echo wp_get_attachment_url(SCF::get('lesson_contentpdf')); ?>" class="btn -content">開催要領PDF</a>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div class="semiart__body">
				<div class="container">
					<div class="semiart__content">
						<p>
							<span class="u-font-bold">開催日</span><br>
							<?php $start_lesson = strtotime(SCF::get('start_lesson'));
							$end_lesson = strtotime(SCF::get('end_lesson')); ?>
							<?= date('n月j日', $start_lesson) ?>
							<?php if ($start_lesson !== $end_lesson) { ?>
								〜
								<?= date('n月j日', $end_lesson) ?> (<?= date('j日', ($end_lesson - $start_lesson)) ?>間）
							<?php } ?>
							<br>
							<span class="u-font-bold">講習会の種類</span><br>
							<?= SCF::get('lesson_select') ?><br><br>
							<span class="u-font-bold">開催場所</span><br>
							<?php
							$lesson_prace =
								SCF::get('lesson_prace');
							$lesson_praceday =
								SCF::get('lesson_praceday');
							if (count($lesson_praceday) > 1) {
								for ($i = 0; $i < count($lesson_praceday); $i++) { ?>
									<?= $lesson_praceday[$i]; ?>
									<?= $lesson_prace[$i]; ?>
									<?php if (SCF::get('lesson_map')[$i]) { ?>
										(<a href="<?php echo SCF::get('lesson_map')[$i]; ?>">GoogleMap</a>)
									<?php } ?>
									<br>
								<?php } ?>
							<?php } else {
								echo $lesson_prace[0];
							} ?>
							<br><br>
							<span class="u-font-bold">講習時間</span><br>
							<?= SCF::get('lesson_time'); ?><br><br>
							<span class="u-font-bold">定員</span><br>
							<?= SCF::get('lesson_count'); ?>名<br><br>
							<span class="u-font-bold">受講料（税込）</span><br>
							<?= SCF::get('lesson_money'); ?>円<br><br>
							<span class="u-font-bold">開催要領</span>
							<?= SCF::get('lesson_detail'); ?>
							<br><br>
						</p>
						<div class="semiart__btns -content">
							<div class="semiart__btn">
								<a href="#" class="btn -apply">申込書PDF</a>
							</div>
							<div class="semiart__btn">
								<a href="#" class="btn -content">開催要領PDF</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</article>
</main>
<?php
get_footer();
