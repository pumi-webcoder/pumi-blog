<!--カテゴリ投稿全体のアーカイブ -->
<?php
    $title_name1 = 'コードストック';
    $title_name2 = 'の一覧';
    $post_type_name = 'code_stock';
    $taxonomy_name = 'code_genre';
    $term_name = 'code_stock';
    $thumbnail_url = get_template_directory_uri() . '/assets/img/coding.webp';
?>
<?php get_header(); ?>

<div class="u-separete--header"></div>

<?php if (function_exists('bcn_display')) : ?>
<!-- breadcrumb -->
<div class="l-bread-crumb c-bread-crumb">
	<?php bcn_display(); // BreadcrumbNavXTのパンくずを表示するための記述 ?>
</div><!-- /breadcrumb -->
<?php endif; ?>

<section class="l-section p-archive-post <?php echo $section_loading_class; ?>">
  <div class="l-container p-archive-post__container">
  <h2 class="c-section-title"><?php echo $title_name1; ?><span class="u-hidden-pc"><br></span><?php echo $title_name2; ?></h2>

    <?php
      // クエリ引数の設定
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
          'post_type' => $post_type_name,// 投稿タイプ
          'posts_per_page' => 50,// 1ページあたりの投稿数
          'post_status' => 'publish',// 公開済みの投稿のみ
          'orderby' => 'modified',// 更新日で並べ替え
          'order' => 'DESC',// 降順
          'paged' => $paged,// ページネーション
      );
      // WP_Queryオブジェクトを作成 
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()): // 投稿が存在するか確認 
    ?>

    <ul class="p-archive-post__list">
      <?php
        while ($the_query->have_posts()) : $the_query->the_post();  // 投稿をループで取得
           ?>
        <li class="p-archive-post__item">
          <a href="<?php echo esc_url(get_permalink()); ?>" class="p-archive-post__link">
            <div class="p-archive-post__image">
              <?php $image = get_field('image'); ?>
              <?php if($image) : ?>
                <?php $mime_type = $image['mime_type']; ?>
                <?php  if(strpos($mime_type, 'video') !== false) : ?>
                  <video 
                    autoplay
                    muted
                    loop
                    controls 
                    width="100%" 
                    preload="metadata"
                    playsinline>
                    <source src="<?php echo esc_url($image['url']); ?>" type="video/mp4">
                    お使いのブラウザは動画プレーヤーをサポートしていません。
                  </video>
                  
                <?php elseif(strpos($mime_type, 'image') !== false) : ?>
                  <img
                    src="<?php echo esc_url($image['url']); ?>"
                    alt="<?php echo esc_attr($image['alt']); ?>"
                    class="p-archive-post__thumbnail"
                  /> 
                <?php endif; ?>
              <?php else : ?>
                <img
                  src="http://pumi-webcoder.com/wp-content/uploads/2024/07/coding.webp"
                  alt="コードストックのサムネイル"
                  class="p-archive-post__thumbnail"
                />
              <?php endif; ?>
            </div>
            <div class="p-archive-post__content">
              <?php $term_name = get_the_terms(get_the_ID(), $taxonomy_name);
                  $term_name = $term_name[0]->name;
              ?>
              <div class="p-archive__label">
                <span class="p-archive-post__term"><?php echo $term_name; ?></span>
              </div>
              <h3 class="p-archive-post__item-title"><?php echo esc_html(get_the_title()); ?></h3>
              <time class="p-archive-post__date" datetime="<?php the_modified_time('c'); ?>"><?php the_modified_time('Y.m.d'); ?></time>
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
        get_template_part('template-parts/pagination');
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