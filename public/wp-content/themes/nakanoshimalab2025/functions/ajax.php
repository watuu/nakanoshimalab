<?php

// -------------------------------------------------------
//    ajax
// -------------------------------------------------------

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_more_posts() {

    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;

    $args = [
        'post_type'      => 'post',
        'paged'          => $paged,
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            get_template_part('template/loop-post-ajax', null, ['is-animation' => true]);
        endwhile;
    endif;

    wp_reset_postdata();
    wp_die();
}


