<?php while (have_posts()) : the_post(); ?>
    <?php
    $eyeCatch = esc_url(get_the_post_thumbnail_url(null, 'thumbnail'));
    $eyeCatch = $eyeCatch? $eyeCatch:
        sprintf('%s/assets/img/500x500.webp', get_stylesheet_directory_uri());
    $settings = [
        'categories'   => get_the_terms(null, 'category'),
        'cultures'     => get_the_terms(null, 'culture_cat'),
        'tags'         => get_the_terms(null, 'post_tag'),
        'category'     => [],
        'date_open'    => get_field('date_open'),
        'date_end'     => get_field('date_end'),
        'today'        => date('Ymd'),
        'status'       => "",
        'status_class' => "",
        'status_char'  => "",
        'is-animation'  => isset($args['is-animation'])??'',
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
    <div class="c-card-event <?= $settings['status_class'] ?>" <?= $settings['is-animation']? 'data-animated="false"': ''; ?>>
        <a class="c-card-event__link" href="<?= get_the_permalink() ?>">
            <div class="c-card-event__meta">
                <p class="c-card-event__type"><?= $settings['category']->name ?></p>
                <ul class="c-card-event__category">
                    <?php if ($settings['cultures']): foreach ($settings['cultures'] as $term): ?>
                        <li><?= $term->name ?></li>
                    <?php break; endforeach; endif; ?>
                </ul>
            </div>
            <?php if ($settings['status_char']): ?>
                <p class="c-card-event__status"><?= $settings['status_char'] ?></p>
            <?php endif; ?>
            <figure class="c-card-event__pic"><img src="<?= $eyeCatch ?>" alt=""/></figure>
            <h3 class="c-card-event__title"><?= get_the_title() ?></h3>
            <ul class="c-card-event__place">
                <?php if ($settings['tags']): foreach($settings['tags'] as $term): ?>
                    <li><?= $term->name ?></li>
                <?php endforeach; endif; ?>
            </ul>
        </a>
    </div>
<?php endwhile; ?>
