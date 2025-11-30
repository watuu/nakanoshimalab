<?php
if ( is_tax( 'tax-type' ) ) {
    require_once( get_stylesheet_directory() . '/archive-type.php' );
    exit;
}
require_once ( get_stylesheet_directory() . '/archive.php');

