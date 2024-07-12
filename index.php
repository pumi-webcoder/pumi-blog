<!DOCTYPE html>
<html lang="ja">
<!-- head -->
<!-- prettier-ignore -->

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<!-- nodndexの記載 -->
	<meta name="robots" content="noindex" />

	<!-- twitterｶｰﾄﾞ,OGP -->
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@pumiWebcoder" />
	<meta property="og:url" content="https://pumiwebcoder.xsrv.jp/" />
	<meta property="og:title" content="Pumi&#39;s Blog" />
	<meta property="og:description" content="WEBコーダーpumiの技術ブログです。" />
	<meta property="og:image" content="./assets/img/OGP.webp" />
	<meta property="og:image" content="./assets/img/favicon.webp" />
	<link rel="icon" href="./assets/img/favicon.webp" type="image/webp" />

	<!-- title,description -->
	<title>Pumi&#39;s Blog</title>
	<meta name="description" content="WEBコーダーpumiの技術ブログです。" />

	<!-- GoogleFonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;600&amp;family=Oswald:wght@400;500&amp;display=swap" rel="stylesheet" />

	<!-- font-awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
	<!-- wow -->
	<link rel="stylesheet" href="./assets/css/animate.css" />
	<!-- css読み込み -->
	<link rel="stylesheet" href="./style.css" />
</head>

<body>
	<!-- header -->
	<!-- prettier-ignore -->
	<header class="l-header p-header">
		<div class="l-inner">
			<!-- ロゴ、グローバルナビ、ハンバーガーメニュー -->
			<div class="p-header__container">
				<!-- ロゴ -->
				<h1 class="c-logo">
					<a href="./index.html">Pumi's<br />Blog</a>
				</h1>
				<!-- グローバルナビ -->
				<nav class="p-header__nav">
					<ul class="p-header__nav--list">
						<div class="p-header__nav--item">
							<a class="p-header__nav--link hover__underline--from-left" href="./#blog" target="_self">blog</a>
						</div>
						<div class="p-header__nav--item">
							<a class="p-header__nav--link hover__underline--from-left" href="https://twitter.com/pumi_webcoder" target="_blank">Twitter(X)</a>
						</div>
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
				<ul class="header__nav--list">
					<div class="p-drawer__nav--item">
						<a class="p-drawer__nav--link" href="./#blog">blog</a>
					</div>
					<div class="p-drawer__nav--item">
						<a class="p-drawer__nav--link" href="https://twitter.com/pumi_webcoder">Twitter(X)</a>
					</div>
				</ul>
			</nav>
		</div>
	</header>

	<main class="main">
		<!-- blog -->
		<!-- prettier-ignore -->
		<section id="blog" class="l-section p-study-ai">
			<div class="l-container">
				<h2 class="c-section-title">AI関連の学習</h2>

				<?php
    // クエリ引数の設定
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'      => 'daytra',
        'posts_per_page' => 10,
        'orderby'        => 'modified',
        'order'          => 'DESC',
        'paged'          => $paged,
        'tax_query'      => array(
            array(
                'taxonomy' => 'study',
                'field'    => 'slug',
                'terms'    => 'ai', // AIに関連する投稿のみを取得
            ),
        ),
    );

    // WP_Queryオブジェクトを作成
    $study_query = new WP_Query($args);

    // 投稿が存在するか確認
    if ($study_query->have_posts()) :
    ?>
				<ul class="p-study-ai__list">
					<?php
      // 投稿をループで表示
      while ($study_query->have_posts()) : $study_query->the_post();
          // 投稿に関連付けられたstudyタームを取得
          $study_terms = get_the_terms(get_the_ID(), 'study');
          $term_name = $study_terms ? esc_html($study_terms[0]->name) : '未分類';
      ?>
					<li class="p-study-ai__item">
						<a href="<?php echo esc_url(get_permalink()); ?>" class="p-study-ai__link">
							<div class="p-study-ai__image">
								<?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('thumbnail', array('alt' => get_the_title(), 'class' => 'p-study-ai__thumbnail'));
            } else {
                echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/no-image.png" alt="No Image" class="p-study-ai__thumbnail" />';
            }
            ?>
							</div>
							<div class="p-study-ai__content">
								<span class="p-study-ai__term"><?php echo $term_name; ?></span>
								<h3 class="p-study-ai__item-title"><?php echo esc_html(get_the_title()); ?></h3>
								<time class="p-study-ai__date" datetime="<?php the_modified_time('c'); ?>"><?php the_modified_time('Y.m.d'); ?></time>
							</div>
						</a>
					</li>
					<?php endwhile; ?>
				</ul>

				<!-- ページネーション -->
				<div class="c-pagination">
					<?php
      echo paginate_links(array(
          'total' => $study_query->max_num_pages,
          'prev_text' => __('« Prev'),
          'next_text' => __('Next »'),
      ));
      ?>
				</div>

				<?php
    // ループ終了後、グローバルな投稿データをリセット
    wp_reset_postdata();
    else :
        echo '該当する投稿が見つかりませんでした。';
    endif;
    ?>
			</div>
		</section>
		<!-- footer -->
		<!-- prettier-ignore -->

		<footer class="p-footer">
			<div class="l-inner">
				<div class="p-footer__contents">
					<small class="p-footer__copyright">&copy;Pumi's Portfolio All rights reserved.</small>
				</div>
			</div>
		</footer>
		<!-- to-top -->
		<!-- prettier-ignore -->

		<div class="p-to-top">
			<a href="#" aria-label="Go to top">
				<svg width="56" height="56" viewBox="0 0 56 56" fill="none">
					<path d="M54 28C54 42.3594 42.3594 54 28 54C13.6406 54 2 42.3594 2 28C2 13.6406 13.6406 2 28 2C42.3594 2 54 13.6406 54 28V28Z" fill="white" stroke="#7777FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M38.4001 28.0001L28.0001 17.6001L17.6001 28.0001" stroke="#7777FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M28 38.4001V17.6001" stroke="#7777FF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</a>
		</div>
	</main>
</body>

</html>