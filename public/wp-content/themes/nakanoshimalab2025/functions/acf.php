<?php

// -------------------------------------------------------
//    ACFの設定
// -------------------------------------------------------

/**
 * ACF GoogleMap キー設定
 *
 */
function acf__googlemap( $api ){
    $api['key'] = GOOGLE_MAP_KEY;
    return $api;
}
add_filter('acf/fields/google_map/api', 'acf__googlemap');


/*
 * ACFオプションページ
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page([
        'page_title' => 'サイト設定',
        'menu_title' => 'サイト設定',
        'menu_slug' => 'option-page',
        'capability' => 'edit_posts',
        'redirect' => false
    ]);
}
get_field('field', 'option');

/*
 * クリエイティブコンテンツにパターンをついか
 */
add_action('acf/input/admin_enqueue_scripts', function () {
    wp_enqueue_script(
        'acf-report-trigger',
        get_stylesheet_directory_uri() . '/assets/js/acf-report-trigger.js',
        ['jquery'],
        false,
        true
    );
});
