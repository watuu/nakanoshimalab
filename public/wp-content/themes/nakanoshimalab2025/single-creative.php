<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
        $eyeCatch = esc_url(get_the_post_thumbnail_url(null, 'large'));
        $settings = [
            'categories' => get_the_terms(null, 'creative_cat'),
            'tags'       => get_the_terms(null, 'creative_tag'),
            'category'   => [],
        ];
        $settings['category'] = $settings['categories']? $settings['categories'][0]: [];
    ?>
    <div class="p-creative-single">
        <div class="l-container">
            <div class="cm-section-header">
                <div class="cm-section-header__bc">
                    <ul class="c-link-bc">
                        <li><a href="<?= home_url() ?>/">Top</a></li>
                        <li><a href="<?= home_url() ?>/creative/">Creative Contents</a></li>
                        <li><span><?= get_the_title() ?></span></li>
                    </ul>
                </div>
            </div>
            <div class="p-creative-single__wrap">
                <div class="p-creative-single__main">
                    <div class="cm-post cm-post--creative">
                        <h1 class="c-heading-post"><?= get_the_title() ?></h1>
                        <div class="cm-post-meta">
                            <p class="cm-post-meta__date"><span>2025.06.21</span><span>-</span><span>2025.08.30</span></p>
                            <ul class="cm-post-meta__category">
                                <?php foreach ($settings['categories'] as $term): ?>
                                    <li><a href="<?= get_term_link($term) ?>"><?= $term->name ?></a></li>
                                <?php break; endforeach; ?>
                            </ul>
                            <ul class="cm-post-meta__place">
                                <?php foreach ($settings['tags'] as $term): ?>
                                    <li><a href="<?= get_term_link($term) ?>"><?= $term->name ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php if (0): ?>
                            <figure class="cm-post__eyeCatch"><img src="<?= $eyeCatch ?>" alt=""/></figure>
                        <?php endif; ?>
                        <div class="cm-post-editor">
                            <?php the_content(); ?>
                        </div>
                        <p class="todo">TODO: カスタムフィールドOR ブロックの作成</p>
                        <div class="cm-post-report">
                            <div class="cm-post-report__head">
                                <p class="cm-post-report__label">Event Report</p>
                                <p class="cm-post-report__no"><span>vol.35</span></p>
                            </div>
                            <h2 class="cm-post-report__title">レポートのタイトルが入ります。レポートのタイトル(h2)</h2>
                            <p class="cm-post-report__author">執筆：小林仁（大阪市立東洋陶磁美術館）</p>
                            <div class="cm-post-report__body">
                                <h3>見出し見出し(h3)</h3>
                                <p>ガラス張りのエントランスホールは、grafのファニチャーによって特別な茶会の空間へと変貌しました。黄安希氏（中国茶會無茶空茶 主宰）と川西まり氏（TE tea and eating 主宰）が茶事を担当した「禾（のぎ）」と題する茶会では、「紅三選」の迎茶から始まり、米の花香が感じられる「稲花香単叢」（広東省鳳凰山 2017）という樹齢の高い老木の烏龍茶、新嘗祭にちなんだ「秋実おこわ」の点心、さらに「霍山黄芽」（安徽省霍山2024）という珍しい黄茶、そして茶菓に「棗挾核桃」が供され、参加者はその独特な味わいに舌鼓を打ちました。</p>
                                <figure><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/dummy-post3.webp" alt=""/>
                                    <figcaption>2024年11月20日「中之島15の場所での物語」トーク＆リーディング<br/>撮影：仲川あい</figcaption>
                                </figure>
                                <p>後半には黄安希氏と筆者によるトークショーが行われ、開催中の展覧会の見どころや展示品の茶器などについてさまざまな話題が展開しました。参加者からの質疑も交えながら、終始和やかな雰囲気の中でプログラムは無事終了しました。新たな美術館の空間で、中国文化と陶磁器の魅力を五感で堪能する一夜限りの特別な体験となり、参加者の表情からも満足感が伝わってきました。</p>
                                <div class="wp-block-gallery">
                                    <figure><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/dummy-post3.webp" alt=""/>
                                        <figcaption>トークショーの様子<br/>撮影：仲川あい</figcaption>
                                    </figure>
                                    <figure><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/dummy-post3.webp" alt=""/>
                                        <figcaption>2024年11月20日「中之島15の場所での物語」トーク＆リーディング<br/>撮影：仲川あい</figcaption>
                                    </figure>
                                </div>
                                <p>後半には黄安希氏と筆者によるトークショーが行われ、開催中の展覧会の見どころや展示品の茶器などについてさまざまな話題が展開しました。参加者からの質疑も交えながら、終始和やかな雰囲気の中でプログラムは無事終了しました。新たな美術館の空間で、中国文化と陶磁器の魅力を五感で堪能する一夜限りの特別な体験となり、参加者の表情からも満足感が伝わってきました。</p>
                            </div>
                        </div>
                        <div class="cm-post-archive">
                            <h3 class="c-heading-txt-sm">アーカイブ</h3>
                            <div class="cm-post-archive__movie"><iframe width="560" height="315" src="https://www.youtube.com/embed/pp2gBUw46hw?si=1PSeZGkZg-zuVza5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div>
                            <div class="cm-post-archive__list">
                                <dl>
                                    <dt>名称</dt>
                                    <dd>回遊型プロジェクト「ARでめぐる『中之島15の場所での物語』」</dd>
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
                    </div>
                </div>
            </div>
            <?php
            $pages = [
                'prev' => get_previous_post(),
                'next' => get_next_post()
            ];
            ?>
            <div class="p-creative-single__pager">
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
                        <a class="cm-nav-page-link" href="<?= home_url() ?>/creative/">
                            <span class="cm-nav-page-link__txt">Creative Contents一覧に戻る</span>
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
                    'post_type' => 'creative',
                    'paged' => 1,
                    'posts_per_page' => 4,
                    'post__not_in' => [get_the_ID()],
                    'tax_query' => [
                        [
                            'taxonomy' => 'creative_cat',
                            'field' => 'term_id',
                            'terms' => [$settings['category']->term_id],
                        ],
                    ]
                ];
                $wp_query = new WP_Query($args);
            ?>
                <div class="p-creative-single__more">
                    <div class="cm-section-relative">
                        <h3 class="c-heading-txt"><?= $settings['category']->name ?></h3>
                        <div class="cm-section-relative__list">
                            <?php get_template_part('template/loop-creative') ?>
                        </div>
                    </div>
                </div>
            <?php endif; wp_reset_query(); ?>
        </div>
    </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>