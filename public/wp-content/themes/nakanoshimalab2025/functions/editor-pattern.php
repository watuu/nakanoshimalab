<?php

// -------------------------------------------------------
//    エディター設定 パターン
// -------------------------------------------------------

/*
 * 投稿画面タイトルプレースホルダー書き換え
 */
add_action('init', function () {

    register_block_pattern(
        'custom/cm-post-report',
        [
            'title'       => 'イベントレポート',
            'description' => 'イベントレポート専用レイアウト',
            'categories'  => ['text'],
            'content'     => '
<!-- wp:group {"className":"cm-post-report"} -->
<div class="wp-block-group cm-post-report">

    <!-- wp:group {"className":"cm-post-report__head"} -->
    <div class="wp-block-group cm-post-report__head">

        <!-- wp:paragraph {"className":"cm-post-report__label"} -->
        <p class="cm-post-report__label">Event Report</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"className":"cm-post-report__no"} -->
        <p class="cm-post-report__no"><span>vol.35</span></p>
        <!-- /wp:paragraph -->

    </div>
    <!-- /wp:group -->

    <!-- wp:heading {"level":2,"className":"cm-post-report__title"} -->
    <h2 class="cm-post-report__title">レポートのタイトルが入ります。レポートのタイトル(h2)</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":"cm-post-report__author"} -->
    <p class="cm-post-report__author">執筆：執筆者名（スポット名）</p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"className":"cm-post-report__body"} -->
    <div class="wp-block-group cm-post-report__body">

        <!-- wp:heading {"level":3} -->
        <h3>見出し見出し(h3)</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。</p>
        <!-- /wp:paragraph -->

        <!-- wp:image {"id":1334,"sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full"><img src="https://820e.net/CIN/wp-content/uploads/2025/01/kokusaikaigijo01.jpg" alt="" class="wp-image-1334"/></figure>
        <!-- /wp:image -->

        <!-- wp:paragraph -->
        <p>レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。</p>
        <!-- /wp:paragraph -->

    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
'
        ]
    );

});





