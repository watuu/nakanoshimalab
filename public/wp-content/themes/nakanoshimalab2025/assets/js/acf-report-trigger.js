(function ($) {

    const waitForEditor = setInterval(() => {
        if (typeof wp !== 'undefined' && wp.data) {
            clearInterval(waitForEditor);
            init();
        }
    }, 300);

    function init() {

        $(document).on('change', '[data-name="レポートを追加する"] input[type="checkbox"]', function () {

            const checked = $(this).prop('checked');
            if (!checked) return;

            const blocks = wp.data.select('core/block-editor').getBlocks();

            const exists = blocks.some(block =>
                block.attributes?.className?.includes('cm-post-report')
            );

            if (exists) return;

            const pattern = wp.blocks.parse(`
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
        <figure class="wp-block-image size-full"><img src="http://localhost/nakanoshimalab/public/wp-content/uploads/2025/01/kokusaikaigijo01.jpg" alt="" class="wp-image-1334"/></figure>
        <!-- /wp:image -->

        <!-- wp:paragraph -->
        <p>レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。レポートの内容が入ります。</p>
        <!-- /wp:paragraph -->

    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
`);

            // ✅ 末尾に追加
            wp.data.dispatch('core/block-editor').insertBlocks(pattern);

        });
    }

})(jQuery);
