<?php
if ( is_tax( 'tax-type' ) ) {
    require_once( get_stylesheet_directory() . '/archive-type.php' );
    exit;
}
if ( is_tax( 'creative_cat' ) || is_tax( 'creative_tag' ) ) {
    require_once( get_stylesheet_directory() . '/archive-creative.php' );
    exit;
}

require_once ( get_stylesheet_directory() . '/archive.php');

