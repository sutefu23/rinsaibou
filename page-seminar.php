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
				<h1>講習会案内</h1>
				<div class="semitop__imgs">
					<div class="semitop__img"><img src="<?= IMG ?>/common/semitop_one.svg" alt="木材加工機械"></div>
					<div class="semitop__img"><img src="<?= IMG ?>/common/semitop_two.svg" alt="チェーンソー"></div>
					<div class="semitop__img"><img src="<?= IMG ?>/common/semitop_three.svg" alt="刈払機"></div>
					<div class="semitop__img"><img src="<?= IMG ?>/common/semitop_four.svg" alt="安全"></div>
				</div>
			</div>
		</div>
	</section>
	<section class="semitext">
		<div class="container">
			<p>
				林災防福岡県支部では下記の講習会等を開催しております。<br>
				詳しくは講習会一覧をご覧ください。<br>
				※新型コロナウイルス感染症の感染拡大防止のため、感染対策を実施して講習会を開催しておりますので、
				なにとぞご理解くださいますようお願いいたします。
			</p>
		</div>
	</section>
	<section class="seminors">
		<div class="seminors__img">
			<img src="<?= IMG ?>/common/seminors_img.webp" alt="製材機械">
		</div>
		<div class="container">
			<ul class="seminors__list">
				<li class="seminors__item">
					<div class="seminors__left">
						<div class="seminors__book">
							<img src="<?= IMG ?>/common/book1.webp" alt="木材加工の本">
						</div>
						<div class="seminors__image">
							<img src="<?= IMG ?>/common/semiitem1.svg" alt="木材加工機械">
						</div>
					</div>
					<div class="seminors__text">
						<h3>技能講習</h3>
						<p>木材加工用機械作業主任者
							技能講習を行っています。<br>
							技能講習登録：福岡労働局 登録期限：<?php echo get_current_registration_limit();?></p>
						<div class="seminors__btn">
						<?php if(get_latest_seminar_permalink_by_term('skill')):?>
							<a href="<?php echo get_latest_seminar_permalink_by_term('skill');?>" class="btn -flat -arrow">最新の講習会はこちら</a>
						<?php endif;?>
						</div>
					</div>
				</li>
				<li class="seminors__item">
					<div class="seminors__left">
						<div class="seminors__book">
							<img src="<?= IMG ?>/common/book2.webp" alt="安全ナビの本">
						</div>
						<div class="seminors__image -two">
							<img src="<?= IMG ?>/common/semiitem2.svg" alt="チェーンソー">
						</div>
					</div>
					<div class="seminors__text -two">
						<h3>安全衛生特別教育</h3>
						<p>伐木・チェーンソー作業従事者特別教育を行っています。</p>
						<div class="seminors__btn">
						<?php if(get_latest_seminar_permalink_by_term('safety')):?>
							<a href="<?php echo get_latest_seminar_permalink_by_term('safety');?>" class="btn -flat -arrow">最新の講習会はこちら</a>
						<?php endif;?>
						</div>
					</div>
				</li>
				<li class="seminors__item">
					<div class="seminors__left">
						<div class="seminors__book">
							<img src="<?= IMG ?>/common/book3.webp" alt="安全な刈払機作業の本">
						</div>
						<div class="seminors__image">
							<img src="<?= IMG ?>/common/semiitem3.svg" alt="刈払機">
						</div>
					</div>
					<div class="seminors__text -three">
						<h3>行政通達に基づく安全衛生教育等</h3>
						<p>刈払機取り扱い作業者安全衛生教育を行っています。</p>
						<div class="seminors__btn">
						<?php if(get_latest_seminar_permalink_by_term('government')):?>
							<a href="<?php echo get_latest_seminar_permalink_by_term('government');?>" class="btn -flat -arrow">最新の講習会はこちら</a>
						<?php endif;?>
						</div>
					</div>
				</li>
				<li class="seminors__item">
					<div class="seminors__left">
						<div class="seminors__book">
							<img src="<?= IMG ?>/common/book4.webp" alt="リスクアセスメントの本">
						</div>
					</div>
					<div class="seminors__text -four">
						<h3>その他、補助事業による講習、研修（本部実施等）</h3>
						<p>安全巡回指導、振動障害巡回特殊健診、
							実践的リスクアセスメント導入のための集団指導会を行っています。</p>
						<div class="seminors__btn">
						<?php if(get_latest_seminar_permalink_by_term('others')):?>
							<a href="<?php echo get_latest_seminar_permalink_by_term('others');?>" class="btn -flat -arrow">最新の講習会はこちら</a>
						<?php endif;?>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</section>
	<section class="low">
		<div class="container">
			<header>
				<h2>関連法令</h2>
			</header>
			<div class="low__box">
				<ol>
					<li>木材加工用機械作業主任者技能講習<span><a href="">労働安全衛生法施行令第6条第6号</a> および<br>
							<a href="#">木材加工用機械作業主任者技能講習規程（昭和47年9月30日労働省告示）</a></span></li>
					<li>伐木等の業務特別教育<span><a href="">労働安全衛生規則第36条第8号</a> および<br><a href="#">安全衛生特別教育規程（昭和47年9月30日労働省告示第92号）</a> 第10条</span></li>
					<li>刈払機取扱作業者に対する安全衛生教育<span><a href="#">H12年2月16日付基発第66号</a></span></li>
				</ol>
				<div class="low__img">
					<img src="<?= IMG ?>/common/low_img.webp" alt="刈払機講習">
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
