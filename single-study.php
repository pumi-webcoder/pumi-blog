<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'textdomain'),
                    'after'  => '</div>',
                ));
                ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
                <?php
                // カテゴリーやタグの表示
                the_category();
                the_tags('<span class="tag-links">', '', '</span>');
                ?>
            </footer><!-- .entry-footer -->
        </article><!-- #post-<?php the_ID(); ?> -->

        <?php
        // コメントテンプレートの読み込み
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>
</main><!-- #main -->

<?php get_footer(); ?>