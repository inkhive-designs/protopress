<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 3/13/2018
 * Time: 1:27 PM
 */

/**
 * Enqueue scripts and styles.
 */
function protopress_scripts() {
    wp_enqueue_style( 'protopress-style', get_stylesheet_uri() );

    wp_enqueue_style('protopress-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", get_theme_mod('protopress_title_font', 'Raleway') ).':100,300,400,700' );

    wp_enqueue_style('protopress-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", get_theme_mod('protopress_body_font', 'Khula') ).':100,300,400,700' );

    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/fontawesome-all.min.css' );

    wp_enqueue_style( 'protopress-nivo-style', get_template_directory_uri() . '/assets/css/nivo-slider.css' );

    wp_enqueue_style( 'protopress-nivo-skin-style', get_template_directory_uri() . '/assets/css/nivo-default/default.css' );

    wp_enqueue_style( 'protopress-bootstrap-style', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );

    wp_enqueue_style( 'protopress-fleximage-style', get_template_directory_uri() . '/assets/css/jquery.flex-images.css' );

    wp_enqueue_style( 'protopress-hover-style', get_template_directory_uri() . '/assets/css/hover.min.css' );

    wp_enqueue_style( 'protopress-slicknav', get_template_directory_uri() . '/assets/css/slicknav.css' );

    wp_enqueue_style( 'protopress-3dslider-style', get_template_directory_uri() . '/assets/css/slicebox.css' );

    wp_enqueue_style( 'protopress-main-theme-style', get_template_directory_uri() . '/assets/theme-styles/css/'.get_theme_mod('protopress_skin', 'default').'.css', array(), esc_url( get_template_directory() . '/assets/theme-styles/css/'.get_theme_mod('protopress_skin', 'default').'.css' ) );

    wp_enqueue_script( 'protopress-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'protopress-externaljs', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

    wp_enqueue_script( 'protopress-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'protopress-custom-js', get_template_directory_uri() . '/js/custom.js' );
}
add_action( 'wp_enqueue_scripts', 'protopress_scripts' );