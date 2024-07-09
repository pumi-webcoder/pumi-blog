<section id="blog" class="l-section p-study-ai">
  <div class="l-container">
    <h2 class="c-section-title">AI関連の学習</h2>

    <?php
    // クエリ引数の設定
    $args = array(
        'post_type'      => 'daytra',
        'posts_per_page' => 6,
        'orderby'        => 'modified',
        'order'          => 'DESC',
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
    <?php
    // ループ終了後、グローバルな投稿データをリセット
    wp_reset_postdata();
    else :
        echo '該当する投稿が見つかりませんでした。';
    endif;
    ?>
    <!-- 一覧ページへのボタンを追加（studyのaiに限定） -->
    <div class="p-study-ai__more">
        <a href="<?php echo esc_url(home_url('/study?study=ai')); ?>" class="c-button c-button--primary">もっと見る</a>
    </div>
  </div>
</section>