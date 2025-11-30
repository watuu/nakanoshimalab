<?php get_header(); ?>
    <div class="p-top">
        <section class="p-top-mv">
            <picture>
                <source srcset="<?= get_stylesheet_directory_uri() ?>/assets/img/p-top-mv-sp.webp" media="(max-width: 1023px)"/><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/p-top-mv.webp" alt=""/>
            </picture>
        </section>
        <section class="p-top-news">
            <picture class="p-top-news__bg">
                <source srcset="<?= get_stylesheet_directory_uri() ?>/assets/img/p-top-news-bg-sp.webp" media="(max-width: 1023px)"/><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/p-top-news-bg.webp" alt=""/>
            </picture>
            <div class="l-container l-container--md">
                <div class="p-top-creative__wrap">
                    <div class="p-top-creative__head">
                        <div class="c-heading-section">
                            <h2 class="c-heading-section__ja">ニュース</h2>
                            <div class="c-heading-section__en">
                                <p><span class="_o"></span><span>News</span></p>
                            </div>
                            <p class="c-heading-section__desc">
                                <svg width="17" height="24"><use href="#ico-heading-line"></use></svg><span>中之島で行われている<br/>展示会やイベント</span>
                            </p>
                        </div>
                    </div>
                    <p class="todo">TODO: 日付でのクエリーに時間がかかってそう</p>
                    <div class="p-top-creative__list">
                        <div class="cm-section-masonry">
                            <?php
                            $today = date('Ymd');
                            $args = [
                                'post_type'      => 'post',
                                // 'posts_per_page' => 20,
                                'meta_query'     => [
                                    'relation' => 'OR',
                                    // ① date_end が設定されている投稿：date_end >= today
                                    [
                                        'relation' => 'AND',
                                        [
                                            'key'     => 'date_end',
                                            'compare' => 'EXISTS',
                                        ],
                                        [
                                            'key'     => 'date_end',
                                            'value'   => $today,
                                            'compare' => '>=',
                                            'type'    => 'NUMERIC',
                                        ]
                                    ],
                                    // ② date_end が空の場合：date_open >= today を満たす投稿
                                    [
                                        'relation' => 'AND',
                                        [
                                            'key'     => 'date_end',
                                            'compare' => 'NOT EXISTS',
                                        ],
                                        [
                                            'key'     => 'date_open',
                                            'value'   => $today,
                                            'compare' => '>=',
                                            'type'    => 'NUMERIC',
                                        ]
                                    ],
                                ],
                                'orderby' => 'meta_value_num',
                                'meta_key' => 'date_open',
                                'order' => 'ASC',
                            ];
                            $wp_query = new WP_Query($args);
                            ?>
                            <?php get_template_part('template/loop-post') ?>
                            <?php wp_reset_query(); ?>
                        </div>
                    </div>
                    <div class="p-top-creative__more1"><a class="c-btn-more" href="<?= home_url() ?>/posts/">
                            <div class="c-btn-more__ico"><i class="c-btn-more__circle"></i><i class="c-btn-more__arrow">
                                    <svg class="js-clone" width="26" height="26"><use href="#ico-arrow"></use></svg></i></div><span class="c-btn-more__txt">NEWS一覧へ</span></a></div>
                    <div class="p-top-creative__more2"><a class="c-btn-square" href="<?= home_url() ?>/posts/"><span class="c-btn-square__bg"></span><span class="c-btn-square__txt">もっと見る</span></a></div>
                </div>
            </div>
            <p class="todo">TODO: 文化カテゴリーの作成</p>
            <div class="p-top-creative__category">
                <ul>
                    <li><a href="#">アート</a></li>
                    <li><a href="#">写真</a></li>
                    <li><a href="#">建築</a></li>
                    <li><a href="#">パフォーマンス</a></li>
                    <li><a href="#">陶芸</a></li>
                    <li><a href="#">音楽</a></li>
                    <li><a href="#">デザイン</a></li>
                    <li><a href="#">都市デザイン</a></li>
                    <li><a href="#">グラフィック</a></li>
                </ul>
            </div>
        </section>
        <section class="p-top-about">
            <div class="l-container">
                <div class="p-top-about__wrap">
                    <div class="c-heading-about c-heading-about--top">
                        <h2 class="c-heading-about__title">創造的<span class="u-char-circle">な</span>実験島</h2>
                        <p class="c-heading-about__en">About Creative Island</p>
                    </div>
                    <div class="p-top-about__body">
                        <p><span>大阪市北区に位置する中之島は、</span>堂島川と土佐堀川に挟まれた東西約3kmの中州です。重層的な歴史文化を有し大阪市北区に位置する中之島は、堂島川と土佐堀川に挟まれた東西約3kmの中州です。重層的な歴史文化を有しながら都市の機能が集積する中之島は、パリのシテ島、 ルリンのムゼウムス・インゼルなど、世界に類する都心の中州（島）の可能性に満ちています。 このプロジェクトでは、“中之島” エリアを、持続可能な芸術文化環境をそなえた「創造的な研究所（クリエイティブ・ラボ）」として見立て、様々な思考実験を繰り広げます。</p>
                    </div>
                    <div class="p-top-about__more"><a class="c-btn-more" href="<?= home_url() ?>/aboutus/">
                            <div class="c-btn-more__ico"><i class="c-btn-more__circle"></i><i class="c-btn-more__arrow">
                                    <svg class="js-clone" width="26" height="26"><use href="#ico-arrow"></use></svg></i></div><span class="c-btn-more__txt">私たちについて</span></a></div>
                </div>
            </div>
        </section>
        <section class="p-top-creative">
            <div class="l-container">
                <div class="p-top-creative__head">
                    <div class="c-heading-section">
                        <h2 class="c-heading-section__ja">クリエイティブコンテンツ</h2>
                        <div class="c-heading-section__en">
                            <p><span class="_o"></span><span>Creative</span></p>
                            <p><span>C</span><span class="_o">o</span><span>ntents</span></p>
                        </div>
                        <p class="c-heading-section__desc">
                            <svg width="17" height="24"><use href="#ico-heading-line"></use></svg><span>中之島で生まれたモノやコト</span>
                        </p>
                    </div>
                </div>
                <div class="p-top-creative__items">
                    <div class="p-top-creative-item">
                        <a class="p-top-creative-item__link" href="<?= home_url() ?>/creative/creative_cat/exchange-program/">
                            <figure class="p-top-creative-item__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/p-top-creative-exchange.webp" alt="エクスチェンジプログラム"/></figure>
                            <div class="p-top-creative-item__btn c-btn-more">
                                <div class="c-btn-more__ico"><i class="c-btn-more__circle"></i><i class="c-btn-more__arrow">
                                        <svg class="js-clone" width="26" height="26"><use href="#ico-arrow"></use></svg></i></div>
                            </div>
                            <p class="p-top-creative-item__desc c-paragraph">エクスチェンジプログラムってどういう意味エクスチェンジプログラムってどういう意味エクスチェンジプログラムってどういう意味</p>
                        </a>
                    </div>
                    <div class="p-top-creative-item">
                        <a class="p-top-creative-item__link" href="<?= home_url() ?>/creative/creative_cat/meeting-point/">
                            <figure class="p-top-creative-item__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/p-top-creative-meeting.webp" alt="ミーティングポイント"/></figure>
                            <div class="p-top-creative-item__btn c-btn-more">
                                <div class="c-btn-more__ico"><i class="c-btn-more__circle"></i><i class="c-btn-more__arrow">
                                        <svg class="js-clone" width="26" height="26"><use href="#ico-arrow"></use></svg></i></div>
                            </div>
                            <p class="p-top-creative-item__desc c-paragraph">エクスチェンジプログラムってどういう意味エクスチェンジプログラムってどういう意味エクスチェンジプログラムってどういう意味</p>
                        </a>
                    </div>
                    <div class="p-top-creative-item">
                        <a class="p-top-creative-item__link" href="<?= home_url() ?>/creative/creative_cat/promotion/">
                            <figure class="p-top-creative-item__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/p-top-creative-promotion.webp" alt="中之島プロモーション"/></figure>
                            <div class="p-top-creative-item__btn c-btn-more">
                                <div class="c-btn-more__ico"><i class="c-btn-more__circle"></i><i class="c-btn-more__arrow">
                                        <svg class="js-clone" width="26" height="26"><use href="#ico-arrow"></use></svg></i></div>
                            </div>
                            <p class="p-top-creative-item__desc c-paragraph">エクスチェンジプログラムってどういう意味エクスチェンジプログラムってどういう意味エクスチェンジプログラムってどういう意味</p>
                        </a>
                    </div>
                    <div class="p-top-creative-item">
                        <a class="p-top-creative-item__link" href="<?= home_url() ?>/creative/creative_cat/artist-research/">
                            <figure class="p-top-creative-item__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/p-top-creative-artist.webp" alt="アーティストリサーチ"/></figure>
                            <div class="p-top-creative-item__btn c-btn-more">
                                <div class="c-btn-more__ico"><i class="c-btn-more__circle"></i><i class="c-btn-more__arrow">
                                        <svg class="js-clone" width="26" height="26"><use href="#ico-arrow"></use></svg></i></div>
                            </div>
                            <p class="p-top-creative-item__desc c-paragraph">エクスチェンジプログラムってどういう意味エクスチェンジプログラムってどういう意味エクスチェンジプログラムってどういう意味</p>
                        </a>
                    </div>
                </div>
                <div class="p-top-creative__more"><a class="c-btn-square" href="<?= home_url() ?>/creative/"><span class="c-btn-square__bg"></span><span class="c-btn-square__txt">全てを見る</span></a></div>
            </div>
        </section>
        <p class="todo">TODO: スポットとイベントの紐付けなど</p>
        <section class="p-top-map">
            <div class="p-top-map__wrap">
                <div class="p-top-map__head">
                    <h2 class="p-top-map__title">Map</h2>
                    <p class="p-top-map__desc">Creative Island Nakanoshima</p>
                </div>
                <div class="p-top-map-area">
                    <div class="p-top-map-area__wrap">
                        <ul class="p-top-map-area__list">
                            <li>
                                <button class="p-top-map-area__btn" aria-label="詳細を見る" data-micromodal-trigger="modal-spot" data-spot-id="1">1</button>
                            </li>
                            <li>
                                <button class="p-top-map-area__btn" aria-label="詳細を見る" data-micromodal-trigger="modal-spot" data-spot-id="2">2</button>
                            </li>
                            <li>
                                <button class="p-top-map-area__btn" aria-label="詳細を見る" data-micromodal-trigger="modal-spot" data-spot-id="3">3</button>
                            </li>
                            <li>
                                <button class="p-top-map-area__btn" aria-label="詳細を見る" data-micromodal-trigger="modal-spot" data-spot-id="4">4</button>
                            </li>
                            <li>
                                <button class="p-top-map-area__btn" aria-label="詳細を見る" data-micromodal-trigger="modal-spot" data-spot-id="5">5</button>
                            </li>
                            <li>
                                <button class="p-top-map-area__btn" aria-label="詳細を見る" data-micromodal-trigger="modal-spot" data-spot-id="6">6</button>
                            </li>
                            <li>
                                <button class="p-top-map-area__btn" aria-label="詳細を見る" data-micromodal-trigger="modal-spot" data-spot-id="7">7</button>
                            </li>
                            <li>
                                <button class="p-top-map-area__btn" aria-label="詳細を見る" data-micromodal-trigger="modal-spot" data-spot-id="8">8</button>
                            </li>
                            <li>
                                <button class="p-top-map-area__btn" aria-label="詳細を見る" data-micromodal-trigger="modal-spot" data-spot-id="9">9</button>
                            </li>
                            <li>
                                <button class="p-top-map-area__btn" aria-label="詳細を見る" data-micromodal-trigger="modal-spot" data-spot-id="10">10</button>
                            </li>
                            <li>
                                <button class="p-top-map-area__btn" aria-label="詳細を見る" data-micromodal-trigger="modal-spot" data-spot-id="11">11</button>
                            </li>
                            <li>
                                <button class="p-top-map-area__btn" aria-label="詳細を見る" data-micromodal-trigger="modal-spot" data-spot-id="12">12</button>
                            </li>
                        </ul>
                        <div class="p-top-map-area__map"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/p-top-map.svg" alt=""/></div>
                    </div>
                </div>
                <div class="p-top-map__spots">
                    <div class="cm-modal" id="modal-spot" aria-hidden="true">
                        <div class="cm-modal-spot">
                            <button class="cm-modal-spot__close c-btn-close" aria-label="閉じる" data-micromodal-close=""><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/btn-close.svg"/></button>
                            <div class="cm-modal-spot__ctrl">
                                <button class="c-btn-arrow c-btn-arrow--outline" id="btnSpotPrev">
                                    <svg class="js-clone" width="26" height="26"><use href="#ico-arrow"></use></svg>
                                </button>
                                <button class="c-btn-arrow c-btn-arrow--outline" id="btnSpotNext">
                                    <svg class="js-clone" width="26" height="26"><use href="#ico-arrow"></use></svg>
                                </button>
                            </div>
                            <div class="cm-modal-spot-card">
                                <div class="cm-modal-spot-card__head">
                                    <div class="cm-modal-spot-card__no">
                                        <p>Spot</p>
                                        <p class="_no" id="spot_no">1</p>
                                    </div>
                                    <p class="cm-modal-spot-card__name">
                                        <span id="spot_name"></span>
                                        <small id="spot_name2"></small>
                                    </p>
                                </div>
                                <figure class="cm-modal-spot-card__pic"><img src="" id="spot_pic"/></figure>
                                <p class="cm-modal-spot-card__desc" id="spot_desc"></p>
                                <div class="cm-modal-spot-card__info">
                                    <dl>
                                        <dt>Address</dt>
                                        <dd id="spot_address"></dd>
                                    </dl>
                                    <dl>
                                        <dt>Te<span class="_c4"></span>l</dt>
                                        <dd id="spot_tel"></dd>
                                    </dl>
                                    <dl>
                                        <dt>Ope<span class="_c3"></span>n</dt>
                                        <dd id="spot_open"></dd>
                                    </dl>
                                    <dl>
                                        <dt>We<span class="_c3"></span>b</dt>
                                        <dd id="spot_web"></dd>
                                    </dl>
                                    <dl>
                                        <dt>SN<span class="_c3"></span>S</dt>
                                        <dd>
                                            <ul class="cm-modal-spot-card__sns" id="spot_sns">
                                                <li id="spot_x"><a href="" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-x.svg" alt=""/></a></li>
                                                <li id="spot_instagram"><a href="" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-instagram.svg" alt=""/></a></li>
                                                <li id="spot_facebook"><a href="" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-facebook.svg" alt=""/></a></li>
                                                <li id="spot_youtube"><a href="" target="_blank"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/ico-youtube.svg" alt=""/></a></li>
                                            </ul>
                                        </dd>
                                    </dl>
                                </div>
                                <div class="cm-modal-spot-card__more">
                                    <a class="c-btn-top-creative" href="#" id="spot_event"><span class="c-btn-top-creative__txt">関連イベントを見る</span><i class="c-btn-top-creative__arrow">
                                            <svg class="js-clone" width="26" height="26"><use href="#ico-arrow"></use></svg></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
$spots = get_posts([
    'post_type'      => 'spots',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);

$data = [];

if ($spots) {
    foreach ($spots as $i => $post) {
        setup_postdata($post);

        // アイキャッチ
        $pic = get_the_post_thumbnail_url($post->ID, 'thumbnail');
        if (!$pic) {
            $pic = get_stylesheet_directory_uri() . '/assets/img/600x300.webp';
        }

        $content = wp_strip_all_tags(get_the_content());
        $desc = mb_substr($content, 0, 100);

        $data[] = [
            "no"        => $i + 1,
            "name"      => get_the_title($post->ID),
            "name2"     => "",
            "pic"       => $pic,
            "desc"      => $desc,
            "address"   => get_field('住所', $post->ID),
            "tel"       => get_field('電話番号', $post->ID),
            "open"      => get_field('営業時間', $post->ID),
            "web"       => get_field('webサイト', $post->ID),
            "facebook"  => get_field('facebook-url', $post->ID),
            "x"         => get_field('x-url', $post->ID),
            "instagram" => get_field('instagram-url', $post->ID),
            "youtube"   => get_field('youtube-url', $post->ID),
            "event"     => "",
        ];
    }
    wp_reset_postdata();
}
?>

    <script id="spotData" type="application/json">
<?= json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<?php get_footer(); ?>