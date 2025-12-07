<?php while (have_posts()) : the_post(); ?>
    <?php
    $eyeCatch = esc_url(get_the_post_thumbnail_url(null, 'thumbnail'));
    $eyeCatch = $eyeCatch? $eyeCatch:
        sprintf('%s/assets/img/500x500.webp', get_stylesheet_directory_uri());
    $categories = get_the_terms(null, 'creative_cat');
    $terms = get_the_terms(null, 'creative_tag');
    ?>
    <div class="c-card-event c-card-event--square">
        <a class="c-card-event__link" href="<?= get_the_permalink() ?>">
            <figure class="c-card-event__pic"><img src="<?= $eyeCatch ?>" alt=""/></figure>
            <ul class="c-card-event__category">
                <?php if($categories): foreach ($categories as $category): ?>
                    <li><?= $category->name ?></li>
                <?php break; endforeach; endif; ?>
            </ul>
            <h3 class="c-card-event__title"><?= get_the_title() ?></h3>
            <?php if ($terms): ?>
            <ul class="c-card-event__place">
                <?php if($terms): foreach($terms as $term): ?>
                    <li><?= $term->name ?></li>
                <?php endforeach; endif; ?>
            </ul>
            <?php endif; ?>
        </a>
    </div>
<?php endwhile; ?>
