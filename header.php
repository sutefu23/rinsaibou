<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="header">
		<div class="header__first">
			<div class="header__inner">
				<div class="header__title">
					<div class="header__logo">
						<a href="/"><img src="./assets/img/logo.svg" alt="ヘッダーロゴ" /></a>
					</div>
					<a href="#">林業・木材製造業労働災害防止協会　<span class="u-inline-block">福岡県支部</span></a>
				</div>
				<div class="header__btn u-hidden-sp">
					<a href="tel:0927142061" class="btn -header"><span class="u-hidden-sp">092-714-2061</span></a>
				</div>

				<div class="header__sp-menu">
					<button class="sp-menu" id="drawer_btn">
						<span class="sp-menu__bar-1"></span>
						<span class="sp-menu__bar-2"></span>
						<span class="sp-menu__bar-3"></span>
					</button>
				</div>
				<nav class="drawer" id="drawer">
					<ul class="drawer__list">
						<li><a href="" class="drawer__link">ホーム</a></li>
						<li><a href="about.html" class="drawer__link">組織概要</a></li>
						<li><a href="seminor.html" class="drawer__link">講習会案内</a></li>
						<li><a href="info.html" class="drawer__link">お知らせ</a></li>
						<li><a href="contact.html" class="drawer__link">お問い合わせ</a></li>
						<li>
						</li>
					</ul>
					<div class="drawer__tel">
						<a href="tel:0927142061" class="btn -header"><span>092-714-2061</span></a>
					</div>
				</nav>
				<div class="drawer__shade" id="drawer_shade"></div>
			</div>
		</div>
		<div class="header__second u-hidden-sp">
			<div class="header__inner">
				<nav class="header__nav">
					<ul class="header__list">
						<li><a href="" class="header__link">ホーム</a></li>
						<li><a href="about.html" class="header__link">組織概要</a></li>
						<li><a href="seminor.html" class="header__link">講習会案内</a></li>
						<li><a href="info.html" class="header__link">お知らせ</a></li>
						<li><a href="contact.html" class="header__link">お問い合わせ</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
