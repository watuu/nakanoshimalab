<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
    'post_type' => 'post',
    'paged' => $paged,
    // 'posts_per_page' => 20,
];
$wp_query = new WP_Query($args);

require_once ( get_stylesheet_directory() . '/archive.php');
