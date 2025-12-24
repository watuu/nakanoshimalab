<?php get_header(); ?>
    <div class="p-creative">
        <div class="l-container">
            <div class="cm-section-header">
                <div class="cm-section-header__bc">
                    <ul class="c-link-bc">
                        <li><a href="<?= home_url() ?>/">Top</a></li>
                        <li><span>Creative Contents</span></li>
                    </ul>
                </div>
            </div>
            <?php
            $query_object = get_queried_object();
            $current_term = $query_object->slug?? '';
            $settings = [
                'categories' => get_terms(['taxonomy' => 'creative_cat', 'hide_empty' => false]),
                'tags' => get_terms(['taxonomy' => 'creative_tag', 'hide_empty' => false]),
            ];

            ?>
            <div class="p-creative__head">
                <?php if ( is_tax( 'creative_cat' ) || is_tax( 'creative_tag' )): ?>
                    <?php $query_object = get_queried_object(); ?>
                    <div class="c-heading-page c-heading-page--sm">
                        <h1 class="c-heading-page__title"><?= $query_object->name ?></h1>
                        <span class="c-heading-page__count"><?= $wp_query->found_posts ?></span>
                    </div>
                <?php else: ?>
                    <div class="cm-nav-category">
                        <div class="cm-nav-category__title">
                            <div class="c-heading-page">
                                <h1 class="c-heading-page__title">Creative Contents</h1>
                                <span class="c-heading-page__count"><?= $wp_query->found_posts ?></span>
                            </div>
                        </div>
                        <div class="cm-nav-category__list">
                            <ul class="cm-nav-category__category">
                                <?php
                                    foreach ($settings['categories'] as $term) {
                                        $class = $term->slug == $current_term? ' is-current': '';
                                        echo sprintf('<li><a class="%s" href="%s">%s</a></li>',
                                            $class,
                                            get_term_link($term),
                                            $term->name
                                        );
                                    }
                                ?>
                            </ul>
                            <ul class="cm-nav-category__place">
                                <?php
                                foreach ($settings['tags'] as $term) {
                                    $class = $term->slug == $current_term? ' is-current': '';
                                    echo sprintf('<li><a class="%s" href="%s">%s</a></li>',
                                        $class,
                                        get_term_link($term),
                                        $term->name
                                    );
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="p-creative__list">
                <div class="cm-section-masonry">
                    <?php if (have_posts()) : ?>
                        <?php get_template_part('template/loop-creative') ?>
                    <?php  endif; ?>
                </div>
            </div>
            <div class="p-creative__pagination">
                <?php theme_posts_pagination(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>