<?php get_header(); ?>
    <div class="p-contact">
        <div class="l-container">
            <div class="cm-section-header">
                <div class="cm-section-header__bc">
                    <ul class="c-link-bc">
                        <li><a href="<?= home_url() ?>/">Top</a></li>
                        <li><span>お問い合わせ</span></li>
                    </ul>
                </div>
                <div class="cm-section-header__title">
                    <div class="c-heading-page c-heading-page--sm">
                        <h1 class="c-heading-page__title">お問い合わせ</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="l-container l-container--md">
            <section class="p-contact-form">
                <div class="p-contact-form__head">
                    <h2 class="c-heading-txt-sm">お問い合わせフォーム</h2>
                    <p class="p-contact-form__headEx"><span class="_required">*</span><span>は必須項目です。</span></p>
                </div>
                <div class="p-contact-form__body">
                    <div class="cm-form">
                        <?php the_content(); ?>
                    </div>
                </div>
            </section>
            <section class="p-contact-tel">
                <div class="p-contact-tel__head">
                    <h2 class="c-heading-txt-sm">電話・FAXでのお問い合わせ</h2>
                </div>
                <div class="p-contact-tel__body">
                    <p class="c-paragraph">クリエイティブアイランド中之島実行委員会 事務局</p>
                    <p class="c-paragraph">アートエリアB1（受付時間12:00-19:00／月曜休館、祝日の場合は翌日休）</p>
                    <p class="c-paragraph">〒530-0005<br/>大阪市北区中之島1-1-1 京阪電車なにわ橋駅地下1F<br/>TEL 06-6226-4006／FAX 06-6226-7299</p>
                </div>
            </section>
        </div>
    </div>
<?php get_footer(); ?>