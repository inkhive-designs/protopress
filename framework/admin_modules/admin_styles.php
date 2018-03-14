<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 3/13/2018
 * Time: 1:24 PM
 */
/**
 * Enqueue Scripts for Admin
 */
function protopress_custom_wp_admin_style() {
    wp_enqueue_style( 'protopress-admin_css', get_template_directory_uri() . '/assets/theme-styles/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'protopress_custom_wp_admin_style' );