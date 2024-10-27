<?php
// カスタムフィルドから値を抽出
$html_code = get_field('html_code');
$css_code = get_field('css_code');
$js_code = get_field('js_code');
    // コード入力がない場合はスペースとする(if文で判定）
    if (!$html_code) {
    $html_code = '';
    }
    if (!$css_code) {
        $css_code = '';
    }
    if (!$js_code) {
        $js_code = '';
    }
?>
<div class="code-result">
    <?php echo $html_code; ?>
    <style><?php echo $css_code; ?></style>
    <script><?php echo $js_code; ?></script>
</div>

