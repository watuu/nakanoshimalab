<?php get_header(); ?>
    <div class="p-news">
        <div class="l-container">
            <div class="cm-section-header">
                <div class="cm-section-header__bc">
                    <ul class="c-link-bc">
                        <li><a href="<?= home_url() ?>/">Top</a></li>
                        <li><span>News</span></li>
                    </ul>
                </div>
            </div>
            <?php
            $query_object = get_queried_object();
            $current_term = $query_object->slug?? '';
            $settings = [
                'categories' => get_terms(['taxonomy' => 'category', 'parent' => 0]),
                'tags' => get_terms(['taxonomy' => 'post_tag', 'hide_empty' => false]),
            ];

            ?>
            <div class="p-news__head">
                <div class="cm-nav-category">
                    <div class="cm-nav-category__title">
                        <div class="c-heading-page">
                            <h1 class="c-heading-page__title">News</h1>
                            <span class="c-heading-page__count"><?= $wp_query->found_posts ?></span>
                        </div>
                    </div>
                    <div class="cm-nav-category__list">
                        <ul class="cm-nav-category__tags">
                            <?php
                            foreach ($settings['categories'] as $term) {
                                $class = $term->slug == $current_term? ' is-current': '';
                                echo sprintf('<li><a class="%s" href="%s">#%s</a></li>',
                                    $class,
                                    get_term_link($term),
                                    $term->name
                                );
                            }
                            ?>
                        </ul>
                        <p class="todo">TODO: 文化カテゴリーの作成</p>
                        <ul class="cm-nav-category__category">
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
            </div>
            <div class="p-news__list">
                <ul class="c-event-ex">
                    <li><svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.976 12.736H13.714V17.202C13.714 18.56 13.238 19.05 11.152 19.05C10.802 19.05 10.396 19.036 9.934 19.008C9.934 19.008 9.836 18.224 9.43 17.538C10.214 17.608 10.774 17.65 11.166 17.65C12.076 17.65 12.16 17.44 12.16 16.95V12.736C10.326 12.75 8.296 12.764 6.798 12.806V11.308C7.554 11.322 8.492 11.35 9.5 11.364C10.508 11.378 11.586 11.378 12.594 11.392C11.642 10.734 10.536 10.062 9.444 9.474L10.578 8.648C9.71 8.662 8.828 8.676 8.058 8.704V7.248C9.808 7.304 12.51 7.318 14.232 7.318H15.884C16.08 7.318 16.178 7.304 16.374 7.178C16.416 7.15 16.472 7.136 16.528 7.136C16.584 7.136 16.64 7.15 16.696 7.178C17.046 7.374 17.466 7.654 17.76 7.892C17.816 7.948 17.844 7.99 17.844 8.032C17.844 8.228 17.368 8.382 17.214 8.494C16.15 9.292 15.114 10.006 13.882 10.734L14.386 11.112L13.924 11.392H17.452C17.62 11.392 17.732 11.364 17.872 11.266C17.928 11.238 17.97 11.224 18.012 11.224C18.152 11.224 19.272 11.896 19.272 12.106C19.272 12.274 18.838 12.4 18.754 12.554C18.124 13.506 17.452 14.402 16.626 15.34C16.626 15.34 15.982 14.906 15.212 14.668C15.94 13.982 16.584 13.268 16.976 12.736ZM10.648 8.648C11.278 8.998 11.964 9.432 12.664 9.908C13.616 9.46 14.344 9.054 14.974 8.634C14.974 8.634 12.608 8.634 10.648 8.648Z" fill="#084CC2"/>
                            <g style="mix-blend-mode:multiply">
                                <path d="M13.16 25.3199C19.8758 25.3199 25.32 19.8757 25.32 13.1599C25.32 6.44413 19.8758 1 13.16 1C6.44422 1 1 6.44413 1 13.1599C1 19.8757 6.44422 25.3199 13.16 25.3199Z" stroke="#0073FF" stroke-width="2" stroke-miterlimit="10"/>
                            </g></svg><span>開催予定</span>
                    </li>
                    <li><svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.052 19.05H15.66C15.66 19.05 15.618 18.28 15.198 17.552C15.632 17.594 15.982 17.608 16.234 17.608C16.948 17.608 17.06 17.44 17.06 16.992V11.868H13.266V7.318H18.502V17.16C18.502 18.728 17.872 19.05 16.052 19.05ZM9.024 19.05H7.414C7.484 16.586 7.498 12.19 7.498 9.544V7.318H12.566V11.868H8.94C8.954 14.318 8.968 17.314 9.024 19.05ZM15.016 18.35H13.588C13.616 17.622 13.644 16.768 13.644 15.956H12.272C12.02 16.964 11.572 17.65 10.634 18.322C10.634 18.322 10.228 17.65 9.626 17.258C10.354 16.922 10.732 16.502 10.914 15.97C10.48 15.984 9.906 15.998 9.472 16.012V14.724C10.004 14.752 10.606 14.766 11.138 14.78C11.18 14.43 11.18 14.066 11.18 13.688C10.774 13.688 10.382 13.702 9.976 13.716V12.442C11.054 12.498 12.048 12.526 13.042 12.526C14.036 12.526 15.044 12.498 16.136 12.442V13.716C15.73 13.702 15.324 13.688 14.932 13.688V14.766C15.45 14.766 15.982 14.752 16.5 14.724V16.012L14.946 15.97C14.96 16.782 14.988 17.636 15.016 18.35ZM17.06 9.068V8.424H14.61V9.068H17.06ZM11.222 9.068V8.424H8.94V9.068H11.222ZM17.06 10.762V10.048H14.61V10.762H17.06ZM11.222 10.762V10.048H8.94V10.762H11.222ZM13.672 13.66H12.454C12.454 14.038 12.44 14.43 12.412 14.794H13.658C13.658 14.332 13.672 14.01 13.672 13.66Z" fill="#ED668A"/>
                            <path d="M13.16 25.3199C19.8758 25.3199 25.32 19.8757 25.32 13.1599C25.32 6.44413 19.8758 1 13.16 1C6.44422 1 1 6.44413 1 13.1599C1 19.8757 6.44422 25.3199 13.16 25.3199Z" stroke="#ED668A" stroke-width="2" stroke-miterlimit="10"/></svg><span>開催中</span>
                    </li>
                </ul>
                <div class="cm-section-masonry">
                    <?php if (have_posts()) : ?>
                        <?php get_template_part('template/loop-post') ?>
                    <?php  endif; ?>

                </div>
            </div>
            <div class="p-news__pagination">
                <?php theme_posts_pagination(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>