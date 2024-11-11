<?php
get_header();
?>

<main class="main">
	<section class="top">
		<div class="container">
			<h2>林業・木材製造業（林材業）に働く人々の<span class="u-inline-block">安全と健康のために</span><br>
				私たちがお手伝いします。</h2>
		</div>
	</section>
	<section class="toptext">
		<div class="toptext__left">
			<img src="<?= IMG ?>/common/top_textbg2l.webp" alt="木のイメージ">
		</div>
		<div class="container">
			<p>私たちの協会では、長年にわたり林材業の労働災害防止対策について取り組みを続け、安全衛生教育、技能講習、集団指導会等の実施や安全衛生技術情報、労働災害情報の提供などを通じて、全国の林材業の現場で労働災害防止活動が着実に実践されるよう、さまざまな事業活動を展開しています。</p>
		</div>
		<div class="toptext__right">
			<img src="<?= IMG ?>/common/top_textbg2r.webp" alt="木のイメージ">
		</div>
	</section>
	<?php
	$q = new WP_Query(['posts_per_page' => 3]);
	if ($q->have_posts()) {
	?>
		<section class="info">
			<div class="container">
				<div class="info__box">
					<header class="toptitle">
						<div class="toptitle__icon">
							<img src="<?= IMG ?>/common/icon_info.svg" alt="お知らせ">
						</div>
						<h2>お知らせ</h2>
					</header>
					<ul class="info__list">
						<?php
						while ($q->have_posts()) {
							$q->the_post();
						?>
							<li>
								<time><?php the_time('Y年m月d日'); ?></time>
								<a href="<?php the_permalink(); ?>">
									<p><?php the_title(); ?></p>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="info__bgimgs">
				<div class="info__bgone">
					<img src="<?= IMG ?>/common/info_bg1.svg" alt="草のイメージ">
				</div>
				<div class="info__bgtwo">
					<img src="<?= IMG ?>/common/info_bg2.webp" alt="草刈りのイメージ">
				</div>
			</div>
		</section>
	<?php
		wp_reset_postdata();
	}
	?>
	<div class="toples">
		<div class="container">
			<div class="toples__contents">
				<div class="toples__left">
					<p>林災防福岡県支部は</p>
					<ul>
						<li>木材加工用機械作業主任者技能講習</li>
						<li>伐木等の業務特別教育</li>
						<li>刈払機取扱作業者安全衛生教育</li>
					</ul>
					<p>3つの講習を開催しています。</p>
					<div class="toples__btn">
						<a href="/seminar" class="btn -arrow">講習会の案内と説明はこちら</a>
					</div>
				</div>
				<div class="toples__right">
					<img src="<?= IMG ?>/common/top_lessons.svg" alt="講習の写真">
				</div>
			</div>
			<section class="topsche">
				<header class="toptitle">
					<div class="toptitle__icon">
						<img src="<?= IMG ?>/common/icon_lessons.svg" alt="ヘルメットアイコン">
					</div>
					<h2 id="seminar">講習会開催日程</h2>
				</header>
				<div class="topsche__box">
					<div class="topsche__sub">
						<h4><?php echo get_current_seminar_year();?>
						</h4>
						<small>技能講習登録：福岡労働局 登録期限：<?php echo get_current_registration_limit();?></small>
					</div>
					<table>
						<thead>
							<tr>
								<th>開催日</th>
								<th>講習会の種類</th>
								<th>開催場所</th>
								<th>定員</th>
								<th>受講料<br>(税込)</th>
								<th>申込期限</th>
								<th>申込書</th>
							</tr>
						</thead>
						<tbody>
							<?php

								# code...
							$args = array(
								'post_type' => 'seminars',
								'posts_per_page' => -1,
								'meta_key' => 'start_lesson',//lesson_apply_limit
								'orderby' => 'meta_value',
								'meta_type' => 'DATE',
								'order' => 'ASC'
							);

							$p = new WP_Query($args);
							if ($p->have_posts()) {
							?>
								<!-- 1 -->
								<?php
								while ($p->have_posts()) {
									$p->the_post();
								?>
									<tr>
										<td>
											<p u-hidden-pc>開催日</p><time>
												<?php $start_lesson = strtotime(SCF::get('start_lesson'));
												$end_lesson = strtotime(SCF::get('end_lesson')); ?>
												<?= date('n月j日', $start_lesson) ?>
												<br>
												<?php if ($start_lesson !== $end_lesson) { ?>
													〜
													<?= date('n月j日', $end_lesson) ?><br>(<?= date('j日', ($end_lesson - $start_lesson)) ?>間）
												<?php } ?>
											</time>
										</td>
										<td>
											<p u-hidden-pc>講習会の種類</p><?php echo post_custom('lesson_select'); ?><div><a href="<?php the_permalink(); ?>">詳細</a></div>
										</td>
										<td>
											<p u-hidden-pc>開催場所</p>
											<?php
											$lesson_prace =
												SCF::get('lesson_prace');
											$lesson_praceday =
												SCF::get('lesson_praceday');
											if (count($lesson_praceday) > 1) {
												for ($i = 0; $i < count($lesson_praceday); $i++) { ?>
													<span class="u-block">
														<?= $lesson_praceday[$i]; ?>
														<br>
														<?= $lesson_prace[$i]; ?>
													</span>
												<?php } ?>
											<?php } else {
												echo $lesson_prace[0];
											} ?>
										</td>
										<td>
											<p u-hidden-pc>定員</p>
											<?php if (SCF::get('lesson_full')) { ?>
												<span>―</span>
											<?php } else { ?>
												<?= SCF::get('lesson_count'); ?>名
											<?php } ?>
										</td>
										<td>
											<p u-hidden-pc>受講料(税込)</p>
											<?php echo SCF::get('lesson_money'); ?>円
										</td>
										<td>
											<p u-hidden-pc>申込期限</p>
											<?php if (!SCF::get('lesson_full') && SCF::get('lesson_apply_limit')) { ?>
												<?= date('n月j日', strtotime(SCF::get('lesson_apply_limit'))); ?>
												<div style="font-size: 0.8em;">※定員になり次第終了</div>
											<?php } ?>
										</td>
										<td>
											<p u-hidden-pc>申込書</p>
											<?php if(SCF::get('lesson_pdf')):?>
												<?php if(!SCF::get('lesson_full')):?>
												<a href="<?php echo wp_get_attachment_url(SCF::get('lesson_pdf')); ?>">PDF</a>
												<?php else:?>
													申込終了
												<?php endif;?>
											<?php else:?>
												<div>申込開始前</div>
											<?php endif;?>
										</td>
									</tr>
								<?php } ?>
							<?php
								wp_reset_postdata();
							}
							?>
						</tbody>
					</table>
					<?php if(!has_any_seminar()):?>
								<p>現在予定されている講習会はありません。</p>
							<?php endif;?>
					<div class="topsche__btn">
<!-- 						<a href="tel:0927142061" class="btn -topsche -arrow">
							<p>電話で様式を申請する<span class="u-inline-block">方はこちら</span></p>
						</a> -->
					</div>
				</div>
			</section>
		</div>
	</div>
</main>

<?php
get_footer();
