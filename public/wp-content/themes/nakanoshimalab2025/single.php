<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
    $eyeCatch = esc_url(get_the_post_thumbnail_url(null, 'full'));
    $eyeCatch = $eyeCatch? $eyeCatch:
        sprintf('%s/assets/img/500x500.webp', get_stylesheet_directory_uri());
    $settings = [
        'categories'    => get_the_terms(null, 'category'),
        'cultures'      => get_the_terms(null, 'culture_cat'),
        'tags'          => get_the_terms(null, 'post_tag'),
        'tags_has_logo' => [],
        'category'      => [],
        'date_open'     => get_field('date_open'),
        'date_end'      => get_field('date_end'),
        'today'         => date('Ymd'),
        'status'        => "",
        'status_class'  => "",
        'status_char'   => "",
        'outline'       => get_field('開催概要'),
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
    foreach ($settings['tags'] as $term) {
        $logo = get_field('スポットロゴ', 'category_' . $term->term_id);
        if ($logo) {
            $settings['tags_has_logo'][] = [
                'term' => $term,
                'pic' => $logo,
                'src' => $logo['sizes']['resize'],
            ];
        }
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
                            <?php if ($settings['cultures']): ?>
                            <ul class="cm-post-meta__category">
                                <?php if($settings['cultures']): foreach($settings['cultures'] as $term): ?>
                                    <li><a href="<?= get_term_link($term) ?>"><?= $term->name ?></a></li>
                                <?php endforeach; endif; ?>
                            </ul>
                            <?php endif; ?>
                            <ul class="cm-post-meta__place">
                                <?php if($settings['tags']): foreach($settings['tags'] as $term): ?>
                                    <li><?= $term->name ?></li>
                                <?php endforeach; endif; ?>
                            </ul>
                            <?php if ($settings['tags_has_logo']): ?>
                                <ul class="cm-post-meta__logo">
                                    <?php foreach ($settings['tags_has_logo'] as $logo): ?>
                                        <li><img src="<?= $logo['src'] ?>"/></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="cm-post-editor">
                            <?php the_content(); ?>
                        </div>
                        <?php if ($settings['outline']): ?>
                            <div class="cm-post-outline">
                                <h3 class="c-heading-txt">開催概要</h3>
                                <div class="cm-post-outline__list">
                                    <?php foreach ($settings['outline'] as $item): ?>
                                        <dl>
                                            <dt><?= $item['項目'] ?></dt>
                                            <dd><?= nl2br($item['内容']) ?></dd>
                                        </dl>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
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