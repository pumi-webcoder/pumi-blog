<!DOCTYPE html>

<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- nodndexの記載 -->
    <meta name="robots" content="noindex" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
    
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
							 href="
							 <?php echo get_post_type_archive_link('ai'); ?>
							 ">
							 生成系AI
							</a>
						</li>
						<li class="p-header__nav--item">
							 <!-- カスタム投稿codingのアーカイブ -->
							 <a class="p-header__nav--link hover__underline--from-left" 
							 href="
							 <?php echo get_post_type_archive_link('coding'); ?>
							 ">
							 WEB制作
							</a>
						</li>
						<li class="p-header__nav--item">
							<a class="p-header__nav--link hover__underline--from-left" href="https://twitter.com/pumi_webcoder" target="_blank">Twitter(X)</a>
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
			<nav class="p-drawer__nav">
				<ul class="drawer__nav--list">
					<li class="p-drawer__nav--item">
						<!-- カスタム投稿aiのアーカイブ -->
						<a class="p-drawer__nav--link" href="
						<?php echo get_post_type_archive_link('ai'); ?>
						">
						生成系AI
						</a>
					</li>
					<li class="p-drawer__nav--item">
						<!-- カスタム投稿codingのアーカイブ -->
						<a class="p-drawer__nav--link" href="
						<?php echo get_post_type_archive_link('coding'); ?>
						">
						WEB制作
						</a>
					</li>
					<li class="p-drawer__nav--item">
						<a class="p-drawer__nav--link" href="https://twitter.com/pumi_webcoder">Twitter(X)</a>
					</li>	
				</ul>
			</nav>
		</div>
	</header>

