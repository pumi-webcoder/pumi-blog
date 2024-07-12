<?php 
// 基本的な設定を読み込む
function my_setup() {
    // アイキャッチ画像を使用する
    add_theme_support('post-thumbnails');
    // 自動フィードリンクをサポートする
    add_theme_support('automatic-feed-links');
    // headタグのtitleタグ、descriptionをWordPressの管理画面から変更できるようにする
    add_theme_support('title-tag');
    // HTML5の要素をサポートする
    add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ));
}
add_action("after_setup_theme", "my_setup");

// CSS、JSを読み込む
function my_script_init() {
    wp_enqueue_style("wow-css", get_template_directory_uri() . "/assets/css/animate.css", array(), filemtime(get_theme_file_path('/assets/css/animate.css')), "all");
    wp_enqueue_style("my-css", get_template_directory_uri() . "/style.css", array(), filemtime(get_theme_file_path('style.css')), "all");
    wp_enqueue_script("wow-js", get_template_directory_uri() . "/assets/js/wow.min.js", array(), filemtime(get_theme_file_path('/assets/js/wow.min.js')), true);
    wp_enqueue_script("gsap-cdn-js", "https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js", array(), "3.12.5", true);
    wp_enqueue_script("app-js", get_template_directory_uri() . "/assets/js/app.min.js", array(), filemtime(get_theme_file_path('/assets/js/app.min.js')), true);
    wp_enqueue_script("my-js", get_template_directory_uri() . "/assets/js/script.js", array("jquery"), filemtime(get_theme_file_path('/assets/js/script.js')), true);
   
}
add_action("wp_enqueue_scripts", "my_script_init");

// 前の記事・次の記事リンクは、専用関数で作成できるけどクラス名をつけれないので、フィルターフックを使ってクラス名を追加する
function add_class_to_previous_post_link($output) {
    $class = 'blog-post__blog-pagenation--prev'; // 追加したいクラス名
    $output = str_replace('<a href=', '<a class="' . $class . '" href=', $output);
    return $output;
}
add_filter('previous_post_link', 'add_class_to_previous_post_link');

function add_class_to_next_post_link($output) {
    $class = 'blog-post__blog-pagenation--next'; // 追加したいクラス名
    $output = str_replace('<a href=', '<a class="' . $class . '" href=', $output);
    return $output;
}
add_filter('next_post_link', 'add_class_to_next_post_link');
