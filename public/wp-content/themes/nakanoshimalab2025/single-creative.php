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
                            <!--<p class="cm-post-meta__date"><span>2025.06.21</span><span>-</span><span>2025.08.30</span></p>-->
                            <ul class="cm-post-meta__category">
                                <?php if($settings['categories']): foreach ($settings['categories'] as $term): ?>
                                    <li><a href="<?= get_term_link($term) ?>"><?= $term->name ?></a></li>
                                <?php break; endforeach; endif; ?>
                            </ul>
                            <ul class="cm-post-meta__place">
                                <?php if($settings['tags']): foreach ($settings['tags'] as $term): ?>
                                    <li><a href="<?= get_term_link($term) ?>"><?= $term->name ?></a></li>
                                <?php endforeach; endif; ?>
                            </ul>
                        </div>
                        <?php if (0): ?>
                            <figure class="cm-post__eyeCatch"><img src="<?= $eyeCatch ?>" alt=""/></figure>
                        <?php endif; ?>
                        <div class="cm-post-editor">
                            <?php the_content(); ?>
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