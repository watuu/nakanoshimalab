<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
    $eyeCatch = esc_url(get_the_post_thumbnail_url(null, 'full'));
    $eyeCatch = $eyeCatch? $eyeCatch:
        sprintf('%s/assets/img/500x500.webp', get_stylesheet_directory_uri());
    $settings = [
        'categories'   => get_the_terms(null, 'category'),
        'tags'         => get_the_terms(null, 'post_tag'),
        'category'     => [],
        'date_open'    => get_field('date_open'),
        'date_end'     => get_field('date_end'),
        'today'        => date('Ymd'),
        'status'       => "",
        'status_class' => "",
        'status_char'  => "",
    ];
    $settings['category'] = $settings['categories']? $settings['categories'][0]: [];
    $settings['date_end'] = $settings['date_end']?: $settings['date_open'];
    if ($settings['today'] < $settings['date_open']) {
        $settings['status'] = "開催予定";
        $settings['status_class'] = "c-card-event--teaser";
        $settings['status_char'] = "予";
    } elseif ($settings['today'] >= $settings['date_open'] && $settings['today'] <= $settings['date_end']) {
        $settings['status_class'] = "c-card-event--open";
        $settings['status'] = "開催中";
        $settings['status_char'] = "開";
    } else {
        $settings['status'] = "終了";
    }
    ?>
    <div class="p-news-single">
        <div class="l-container">
            <div class="cm-section-header">
                <div class="cm-section-header__bc">
                    <ul class="c-link-bc">
                        <li><a href="<?= home_url() ?>/">Top</a></li>
                        <li><a href="<?= home_url() ?>/posts/">News</a></li>
                        <li><span><?= get_the_title() ?></span></li>
                    </ul>
                </div>
            </div>
            <div class="p-news-single__wrap">
                <figure class="p-news-single__pic"><img src="<?= $eyeCatch ?>" alt=""/></figure>
                <div class="p-news-single__main">
                    <div class="cm-post">
                        <h1 class="c-heading-post"><?= get_the_title() ?></h1>
                        <div class="cm-post-meta">
                            <p class="cm-post-meta__date">
                                <span><?= date('Y.m.d', strtotime($settings['date_open'])) ?></span><?php if (get_field('date_end')): ?><span>-</span><span><?= date('Y.m.d', strtotime($settings['date_end'])) ?></span><?php endif; ?>
                            </p>
                            <p class="todo">TODO: 文化カテゴリーの作成</p>
                            <ul class="cm-post-meta__category">
                                <li><a href="#">アート</a></li>
                            </ul>
                            <ul class="cm-post-meta__place">
                                <?php foreach($settings['tags'] as $term): ?>
                                    <li><?= $term->name ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <p class="todo">TODO: ロゴの登録</p>
                            <ul class="cm-post-meta__logo">
                                <li><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/dummy-post-logo1.webp"/></li>
                                <li><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/dummy-post-logo2.webp"/></li>
                                <li><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/dummy-post-logo3.webp"/></li>
                            </ul>
                        </div>
                        <div class="cm-post-editor">
                            <?php the_content(); ?>
                        </div>
                        <p class="todo">TODO: カスタムフィールドの作成</p>
                        <div class="cm-post-outline">
                            <h3 class="c-heading-txt">開催概要</h3>
                            <div class="cm-post-outline__list">
                                <dl>
                                    <dt>名称</dt>
                                    <dd><?= get_the_title() ?></dd>
                                </dl>
                                <dl>
                                    <dt>会期</dt>
                                    <dd>ミーティングポイント設置の15か所</dd>
                                </dl>
                                <dl>
                                    <dt>場所</dt>
                                    <dd>(中之島センタービル／グランキューブ大阪／リーガロイヤルホテル大阪／大阪大学中之島センター／大阪中之島美術館／国立国際美術館／大阪市立科学館／graf studio／中之島フェスティバルタワー／中之島フェスティバルタワー・ウエスト／大阪府立中之島図書館／大阪市中央公会堂／大阪市立東洋陶磁美術館／こども本の森 中之島／アートエリアB1)</dd>
                                </dl>
                                <dl>
                                    <dt>場所</dt>
                                    <dd>各施設の開館時間に準ずる</dd>
                                </dl>
                                <dl>
                                    <dt>作品制作</dt>
                                    <dd>金氏徹平、菅野歩美、小林健太、contact Gonzo、MANTLE（伊阪柊＋中村壮志）、STYLYクリエイター、公募参加のみなさま</dd>
                                </dl>
                                <dl>
                                    <dt>共催</dt>
                                    <dd>金氏徹平、菅野歩美、小林健太、contact Gonzo、MANTLE（伊阪柊＋中村壮志）、STYLYクリエイター、公募参加のみなさま</dd>
                                </dl>
                                <dl>
                                    <dt>特別協力</dt>
                                    <dd>株式会社STYLY ／ 吉田山（floating alps）</dd>
                                </dl>
                                <dl>
                                    <dt>委託</dt>
                                    <dd>令和7年度日本博2.0 事業（委託型）</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="cm-post-list">
                            <h3 class="c-heading-txt-sm">出店者一覧</h3>
                            <div class="cm-post-editor">
                                <p>中之島に点在する15施設に設置のミーティングポイントで、各作品をご覧いただけます。</p>
                                <ul>
                                    <li>箇条書き</li>
                                    <li>箇条書き</li>
                                    <li>箇条書き</li>
                                    <li>箇条書き</li>
                                </ul>
                                <p>中之島に点在する15施設に設置のミーティングポイントで、各作品をご覧いただけます。</p>
                                <ol>
                                    <li>「三十一階」<a href="#">中之島センタービル</a></li>
                                    <li>「プラザ。」<a href="#">大阪府立国際会議場（グランキューブ大阪）</a></li>
                                    <li>「リーチバー」<a href="#">リーガロイヤルホテル</a></li>
                                    <li>「旧緒方洪庵住宅（適塾）より」<a href="#">大阪大学中之島センター</a></li>
                                    <li>「空き地」<a href="#">大阪中之島美術館</a></li>
                                    <li>「B4F」<a href="#">国立国際美術館</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $pages = [
                'prev' => get_previous_post(),
                'next' => get_next_post()
            ];
            ?>
            <div class="p-news-single__pager">
                <div class="cm-nav-page">
                    <div class="cm-nav-page__ctrl">
                        <?php if ($pages['next']): ?>
                            <a class="cm-nav-page-link" href="<?= get_the_permalink($pages['next']->ID) ?>">
                                <i class="cm-nav-page-link__arrow"><svg class="js-clone" width="26" height="26"><use href="#ico-arrow"></use></svg></i>
                                <span class="cm-nav-page-link__txt">前の記事</span>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="cm-nav-page__index">
                        <a class="cm-nav-page-link" href="<?= home_url() ?>/posts/">
                            <span class="cm-nav-page-link__txt">News一覧に戻る</span>
                        </a>
                    </div>
                    <div class="cm-nav-page__ctrl">
                        <?php if ($pages['prev']): ?>
                            <a class="cm-nav-page-link" href="<?= get_the_permalink($pages['prev']->ID) ?>">
                                <span class="cm-nav-page-link__txt">前の記事</span>
                                <i class="cm-nav-page-link__arrow"><svg class="js-clone" width="26" height="26"><use href="#ico-arrow"></use></svg></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php wp_reset_query(); ?>
            <?php
            if ($settings['category']):
                $args = [
                    'post_type' => 'post',
                    'paged' => 1,
                    'posts_per_page' => 4,
                    'post__not_in' => [get_the_ID()],
                    'tax_query' => [
                        [
                            'taxonomy' => 'category',
                            'field' => 'term_id',
                            'terms' => [$settings['category']->term_id],
                        ],
                    ]
                ];
                $wp_query = new WP_Query($args);
            ?>
                <div class="p-news-single__more">
                    <div class="cm-section-relative">
                        <h3 class="c-heading-txt">同じカテゴリーのNEWS</h3>
                        <div class="cm-section-relative__list">
                            <?php get_template_part('template/loop-post') ?>
                        </div>
                    </div>
                </div>
            <?php endif; wp_reset_query(); ?>
        </div>
    </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>