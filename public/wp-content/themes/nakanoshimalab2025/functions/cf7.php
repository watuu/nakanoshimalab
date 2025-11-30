<?php

// -------------------------------------------------------
//    CF7の設定
// -------------------------------------------------------

add_filter('wpcf7_form_elements', function($html) {

    // 置換する送信ボタンの HTML
    $custom_button = '
    <button class="c-btn-square c-btn-square--contact">
        <span class="c-btn-square__bg"></span>
        <span class="c-btn-square__txt">送信する</span>
    </button>
    ';

    // CF7 のデフォルトの submit を置き換え
    $html = preg_replace(
        '/<input[^>]*type="submit"[^>]*>/i',
        $custom_button,
        $html
    );

    return $html;
});

