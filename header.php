<!DOCTYPE html>

<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- nodndexの記載 -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
	<meta name="google-site-verification" content="UIjvrE7ExkDIHMMpmfqzkcTC-Fd7-HsNI62bfQaP-0w" />
    <?php wp_head(); ?>
    <!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-TH0ZJ6GEBB"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-TH0ZJ6GEBB');
	</script>
  </head>

  <body>
    <!-- header -->
    <header class="l-header p-header">
		<div class="l-inner">
			<!-- ロゴ、グローバルナビ、ハンバーガーメニュー -->
			<div class="p-header__container">
				<!-- ロゴ -->
				<h1 class="c-logo">
					<a href="<?php echo home_url(); ?>">Pumi's<br />Blog</a>
				</h1>
				<!-- グローバルナビ -->
				<nav class="p-header__nav">
					<ul class="p-header__nav--list">
						<li class="p-header__nav--item">
							 <!-- カスタム投稿aiのアーカイブ -->
							 <a class="p-header__nav--link hover__underline--from-left" 
							 href="<?php echo get_post_type_archive_link('ai'); ?>">
							 生成系AI
							</a>
						</li>
						<li class="p-header__nav--item">
							 <!-- カスタム投稿codingのアーカイブ -->
							 <a class="p-header__nav--link hover__underline--from-left" 
							 href="<?php echo get_post_type_archive_link('coding'); ?>">
							 WEB制作
							</a>
						</li>
						<li class="p-header__nav--item">
							<!-- ポートフォリオ -->
							<a class="p-header__nav--link hover__underline--from-left" 
							href="<?php echo esc_url(home_url('/')); ?>portfolio/" 
							target="_blank">
							Portfolio
							</a>
						</li>
						<li class="p-header__nav--item">
							<!-- Twitter（X)へのリンク -->
							<a class="p-header__nav--link hover__underline--from-left" 
							href="https://twitter.com/pumi_webcoder" 
							target="_blank">
							Twitter(X)
							</a>
						</li>
						<li class="p-header__nav--item l-header__nav--contact">
							<!-- お問い合わせ -->
							<a class="p-header__nav--link hover__underline--from-left" 
							href="<?php echo esc_url(home_url('/')); ?>contact/">
							お問い合わせ
							</a>
						</li>
					</ul>
				</nav>
				<!-- ハンバーガーメニュー -->
				<div class="p-header__hamburger--button">
					<button id="js-drawer__btn" class="c-hamburger-btn" aria-label="ハンバーガーメニュー">
						<span class="c-hamburger-bar"></span>
						<span class="c-hamburger-bar"></span>
						<span class="c-hamburger-bar"></span>
					</button>
				</div>
			</div>
			<!-- ドロワーメニュー（ヘッダーコンテナの外） -->
			<nav class="l-drawer__nav p-drawer__nav">
				<ul class="drawer__nav--list">
					<li class="p-drawer__nav--item">
						<!-- カスタム投稿aiのアーカイブ -->
						<a class="p-drawer__nav--link" 
						href="<?php echo get_post_type_archive_link('ai'); ?>">
						生成系AI
						</a>
					</li>
					<li class="p-drawer__nav--item">
						<!-- カスタム投稿codingのアーカイブ -->
						<a class="p-drawer__nav--link hover__underline--from-left" 
						href="<?php echo get_post_type_archive_link('coding'); ?>">
						WEB制作
						</a>
					</li>
					<li class="p-drawer__nav--item">
						<!-- ポートフォリオ -->
						<a class="p-drawer__nav--link" 
						href="<?php echo esc_url(home_url('/')); ?>portfolio/"
						target="_blank">
						Portfolio
						</a>
					</li>
					<li class="p-drawer__nav--item">
						<!-- Twitter（X)へのリンク -->
						<a class="p-drawer__nav--link" 
						href="https://twitter.com/pumi_webcoder">
						Twitter(X)
						</a>
					</li>	
					<li class="p-drawer__nav--item">
						<!-- お問い合わせ -->
						<a class="p-drawer__nav--link" 
						href="<?php echo esc_url(home_url('/')); ?>contact/">
						お問い合わせ
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

