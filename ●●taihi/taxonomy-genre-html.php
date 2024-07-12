<?php get_header(); ?>

<?php if (function_exists('bcn_display')) : ?>
<!-- breadcrumb -->
<div class="bread-crumb">
	<?php bcn_display(); // BreadcrumbNavXTのパンくずを表示するための記述 ?>
</div><!-- /breadcrumb -->
<?php endif; ?>

<section class="l-section p-archive-study">
  <div class="l-container p-archive-study__container">
    <h2 class="c-section-title">htmlの学習一覧</h2>

    <?php
      // クエリ引数の設定
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
          'post_type' =>        'coding',// 投稿タイプ
          'posts_per_page' => 10,// 1ページあたりの投稿数
          'post_status' => 'publish',// 公開済みの投稿のみ
          'orderby' => 'modified',// 更新日で並べ替え
          'order' => 'DESC',// 降順
          'paged' => $paged,// ページネーション
          'tax_query' => array(
            array(
                'taxonomy' => 'genre', // タクソノミー名
                'field' => 'slug',
                'terms' => 'html',
            ),
        ),
      );
      // WP_Queryオブジェクトを作成 
      $study_query = new WP_Query($args);
      if ($study_query->have_posts()): // 投稿が存在するか確認 
    ?>

    <ul class="p-archive-study__list">
      <?php
        while ($study_query->have_posts()) : $study_query->the_post();  // 投稿をループで取得
        $study_terms = get_the_terms(get_the_ID(), 'html');    // 投稿に関連付けられたstudyタームを取得（ここでは有無確認レベル）
        $term_name = !is_wp_error($study_terms) && $study_terms ? esc_html($study_terms[0]->name) : '未分類'; // ターム名を取得（aiを取得、なければ未分類）
      ?>
        <li class="p-archive-study__item">
          <a href="<?php echo esc_url(get_permalink()); ?>" class="p-archive-study__link">
            <div class="p-archive-study__image">
              <?php
                if (has_post_thumbnail()) : // サムネイル画像があるか確認
                    the_post_thumbnail(
                      'thumbnail', // サムネイル画像のサイズ（thumbnailはWordPress標準のサイズ）
                      array('alt' =>get_the_title(),
                      'class' => 'p-archive-study__thumbnail'
                      )
                    ); 
                else :
                  echo '<img
                    src="' . esc_url(get_template_directory_uri()) . '/assets/img/ai.png"
                    alt="AI"
                    class="p-archive-study__thumbnail"
                  />'; 
                endif;
              ?>
            </div>
            <div class="p-archive-study__content">
              <span class="p-archive-study__term"><?php echo $term_name; ?></span>
              <h3 class="p-archive-study__item-title"><?php echo esc_html(get_the_title()); ?></h3>
              <time class="p-archive-study__date" datetime="<?php the_modified_time('c'); ?>"><?php the_modified_time('Y.m.d'); ?></time>
            </div>
          </a>
        </li>
      <?php 
        endwhile; 
      ?>
    </ul>


    <!-- ページネーション -->
    <div class="c-pagination">
      <?php
        echo paginate_links(
          array(
            'total' => $study_query->max_num_pages, 
            'prev_text' => __('« Prev'), 
            'next_text' => __('Next »'), 
          )
        );
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


<?php get_footer(); ?>