<?php
get_header();
?>

<main class="code-stock-page">
    <?php
    while (have_posts()) :
        the_post();

        $html_code = get_field('html_code');
        $css_code = get_field('css_code');
        $sass_code = get_field('sass_code');
        $js_code = get_field('js_code');
        $description = get_field('code_description');
        $url = get_field('code_url');
    ?>


    <div class="code-sample">
        <div class="code-sample-wrapper">
            <h3>実装結果 :</h3>
            <?php
                get_template_part('template-parts/get-code-results');
            ?>

        </div>

        <?php if ($description) : ?>
        <div class="code-sample-wrapper">
            <h3>説明 :</h3>
            <div class="code-description"><?php echo $description; ?></div>
        </div>
        <?php endif; ?>
        
        <?php if ($url) : ?>
        <div class="code-sample-wrapper">
            <h3>URL :</h3>
            <a href="<?php echo $url; ?>" class="code-url" target="_blank"><?php echo $url; ?></a>
        </div>
        <?php endif; ?>
        
        <div class="code-sample-wrapper">
            <h3>コード全量 : </h3>
            <button class="copy-button" data-target="all-code">コピー</button>
            <?php
            if ($sass_code) {
                $all_code = 
                $html_code . 
                "\n<style>\n" . 
                $sass_code . 
                "\n</style>\n" . 
                "\n<script>\n" . 
                $js_code . 
                "\n</script>";
            } else {
                $all_code = 
                $html_code . 
                "\n<style>\n" . 
                $css_code . 
                "\n</style>\n" . 
                "\n<script>\n" . 
                $js_code . 
                "\n</script>";
            }
            ?>

<pre class="u-hidden-visually"><code id="all-code" class="language-all"><?php echo esc_html($all_code); ?></code></pre>
        </div>

        <div class="code-sample-wrapper">
            <h3>HTML : </h3>
            <button class="copy-button" data-target="html-code">コピー</button>
            <details class="c-details">
                <summary class="c-summary js-summary">コードを見る</summary>
                <div class="c-summary__container">
<pre><code id="html-code" class="language-html"><?php echo esc_html($html_code); ?></code></pre>
                </div>
            </details>
        </div>

        <?php if ($css_code) : ?>
        <div class="code-sample-wrapper">
            <h3>CSS : </h3>
            <button class="copy-button" data-target="css-code">コピー</button>
            <details class="c-details">
                <summary class="c-summary js-summary">コードを見る</summary>
                <div class="c-summary__container">
<pre><code id="css-code" class="language-css"><?php echo esc_html($css_code); ?></code></pre>
                </div>
            </details>
        </div>
        <?php endif; ?>

        <?php if ($sass_code) : ?>
        <div class="code-sample-wrapper">
            <h3>Sass : </h3>
            <button class="copy-button" data-target="sass-code">コピー</button>
            <details class="c-details">
                <summary class="c-summary js-summary">コードを見る</summary>
                <div class="c-summary__container">
<pre><code id="sass-code" class="language-scss"><?php echo esc_html($sass_code); ?></code></pre>
                </div>
            </details>
        </div>
        <?php endif; ?>

        <?php if ($js_code) : ?>
        <div class="code-sample-wrapper">
            <h3>JavaScript : </h3>
            <button class="copy-button" data-target="js-code">コピー</button>
            <details class="c-details">
                <summary class="c-summary js-summary">コードを見る</summary>
                <div class="c-summary__container">
<pre><code id="js-code" class="language-javascript"><?php echo esc_html($js_code); ?></code></pre>
                </div>
            </details>
        </div>
        <?php endif; ?>

    </div>
    <?php endwhile;?>     
    <!-- 一覧に戻るボタン -->
    <div class="codestock-back-btn">
        <a class="c-btn" href="<?php echo get_post_type_archive_link('code_stock'); ?>" >一覧に戻る</a>
    </div>

    
</main>

<?php
get_footer();
?>