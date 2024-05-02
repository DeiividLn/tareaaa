<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * After setup theme hook
 */
function epic_construction_theme_setup(){

    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'epic-construction', get_stylesheet_directory() . '/languages' );
    
    /**
     * Image size as per needed
     */
    add_image_size( 'epic-construction-portfolio', 282, 368, true );
    add_image_size( 'epic-construction-about', 350, 230, true );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "title-tag" );
}
add_action( 'after_setup_theme', 'epic_construction_theme_setup', 100 );

/**
 * Load assets.
 *
 */
function epic_construction_enqueue_styles_and_scripts() {
    $my_theme = wp_get_theme();
    $version = $my_theme['Version'];
    
    wp_enqueue_style( 'construction-landing-page-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'epic-construction-style', get_stylesheet_directory_uri() . '/style.css', array( 'construction-landing-page-style' ), $version );

    wp_enqueue_style( 'epic-construction-google-fonts', epic_construction_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'epic_construction_enqueue_styles_and_scripts' );

/**
 * Dequeue scripts from parent theme
 */
function epic_construction_dequeue_parent_theme_styles_and_scripts(){
    wp_dequeue_style( 'construction-landing-page-google-fonts' );
    wp_deregister_style( 'construction-landing-page-google-fonts' );
}
add_action( 'wp_enqueue_scripts', 'epic_construction_dequeue_parent_theme_styles_and_scripts', 100 );

function epic_construction_remove_parent_filters(){
    remove_action( 'customize_register', 'construction_landing_page_customizer_demo_content' );
}
add_action( 'init', 'epic_construction_remove_parent_filters' );

/**
 * Implementing parent theme functions to the child theme.
 */
require get_stylesheet_directory() . '/inc/parent-functions.php';

/**
 * Implementing new child theme functions to the child theme.
 */
require get_stylesheet_directory() . '/inc/child-functions.php';

/**
 * Implementing new child theme functions to the child theme.
 */
require get_stylesheet_directory() . '/inc/fontawesome.php';