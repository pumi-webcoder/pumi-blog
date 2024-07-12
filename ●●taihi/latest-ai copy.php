<!--最新の投稿 -->
<?php
    $title_name = '生成系AIの記事';
    $post_type_name = 'ai';
    $taxonomy_name = 'study';
    $term_name = 'ai実践道場';
    $thumbnail_url = get_template_directory_uri() . '/assets/img/ai.webp';
?>
<section class="l-section p-latest-post js-first-view">
    <div class="l-container">
        <h2 class="c-section-title"><?php echo $title_name; ?></h2>
    
        <!-- クエリ引数の設定 -->
        <?php
        $args = array(
            'post_type'      => $post_type_name, // 投稿タイプ
            'posts_per_page' => 3,               // 1ページあたりの投稿数
            'post_status'    => 'publish',       // 公開済みの投稿のみ
            'orderby'        => 'modified',      // 更新日で並べ替え
            'order'          => 'DESC',          // 降順
            'paged'          => $paged,          // ページネーション
            'tax_query'      => array(
                array(
                    'taxonomy' => $taxonomy_name,
                    'field'    => 'slug',
                    'terms'    => $term_name,
                ),
            ),
        );
        // WP_Queryオブジェクトを作成
        $the_query = new WP_Query($args);

        // 投稿が存在するか確認
        if ($the_query->have_posts()) :
        ?>
            <ul class="p-latest-post__list">
                <?php
                while ($the_query->have_posts()) : $the_query->the_post();  // 投稿をループで取得
                ?>
                    <li class="p-latest-post__item">
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="p-latest-post__link">
                            <div class="p-latest-post__image">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail(
                                        'thumbnail',
                                        array(
                                            'alt'   => get_the_title(),
                                            'class' => 'p-latest-post__thumbnail'
                                        )
                                    );
                                } else {
                                    echo '<img
                                    src="' . $thumbnail_url . '"
                                    alt="AI"
                                    class="p-latest-post__thumbnail"
                                    />';
                                }
                                ?>
                            </div>
                            <div class="p-latest-post__content">
                                <span class="p-latest-post__term"><?php echo $term_name; ?></span>
                                <h3 class="p-latest-post__item-title"><?php echo esc_html(get_the_title()); ?></h3>
                                <time class="p-latest-post__date" datetime="<?php the_modified_time('c'); ?>"><?php the_modified_time('Y.m.d'); ?></time>
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
        <!-- 一覧ページへのボタンを追加 -->
        <div class="p-latest-post__more">
            <?php
            $term = get_term_by('slug', $term_name, $taxonomy_name); // 'ai実践道場'タームを取得
            if ($term && !is_wp_error($term)) :
            ?>
                <a href="<?php echo esc_url(get_term_link($term)); ?>" class="c-button c-button--primary">
                    もっと見る
                </a>
            <?php else : ?>
                <p>タクソノミーのリンクが見つかりませんでした。</p>
            <?php endif; ?>
        </div>
    </div>
</section>