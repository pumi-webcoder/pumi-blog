<section id="blog" class="l-section p-study">
  <div class="l-container">
    <h2 class="c-section-title">AI関連の学習</h2>

    <?php
    // クエリ引数の設定
    $args = array(
      'post_type' =>        'study',// 投稿タイプ
      'posts_per_page' => 3,// 1ページあたりの投稿数
      'post_status' => 'publish',// 公開済みの投稿のみ
      'orderby' => 'modified',// 更新日で並べ替え
      'order' => 'DESC',// 降順
      'paged' => $paged,// ページネーション
      'tax_query' => array(
        array(
            'taxonomy' => 'ai', // タクソノミー名
            'field' => 'slug',
            'terms' => 'ai実践道場',
        ),
      ),
    );

    // WP_Queryオブジェクトを作成
    $study_query = new WP_Query($args);

    // 投稿が存在するか確認
    if ($study_query->have_posts()) :
    ?>
    <ul class="p-study__list">
    <?php
        while ($study_query->have_posts()) : $study_query->the_post();  // 投稿をループで取得
        $study_terms = get_the_terms(get_the_ID(), 'ai');    // 投稿に関連付けられたstudyタームを取得（ここでは有無確認レベル）
        $term_name = !is_wp_error($study_terms) && $study_terms ? esc_html($study_terms[0]->name) : '未分類'; // ターム名を取得（aiを取得、なければ未分類）
      ?>
      <li class="p-study__item">
        <a href="<?php echo esc_url(get_permalink()); ?>" class="p-study__link">
          <div class="p-study__image">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail(
                  'thumbnail', 
                array('alt' => get_the_title(), 
                'class' => 'p-study__thumbnail'
              ));
            } else {
              echo '<img
              src="' . esc_url(get_template_directory_uri()) . '/assets/img/ai.png"
              alt="AI"
                  class="p-archive-study__thumbnail"
                />';
            }
            ?>
          </div>
          <div class="p-study__content">
            <span class="p-study__term"><?php echo $term_name; ?></span>
            <h3 class="p-study__item-title"><?php echo esc_html(get_the_title()); ?></h3>
            <time class="p-study__date" datetime="<?php the_modified_time('c'); ?>"><?php the_modified_time('Y.m.d'); ?></time>
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
    
    <div class="p-study__more">
      <?php
      $term = get_term_by('slug', 'ai実践道場', 'ai'); // 'ai実践道場'タームを取得
      if ($term && !is_wp_error($term)) :
      ?>
          <a href="<?php echo esc_url(get_term_link($term)); ?>" 
          class="c-button c-button--primary"
          >
          もっと見る
          </a>
      <?php else : ?>
          <p>タクソノミーのリンクが見つかりませんでした。</p>
      <?php endif; ?>
    </div>


  </div>
</section>
