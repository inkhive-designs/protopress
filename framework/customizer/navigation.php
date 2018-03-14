<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 3/13/2018
 * Time: 1:56 PM
 */


function protopress_customize_register_nav( $wp_customize )
{


//Settings for Nav Area
    $wp_customize->add_section(
        'protopress_menu_basic',
        array(
            'title' => __('Menu Settings', 'protopress'),
            'priority' => 0,
            'panel' => 'nav_menus'
        )
    );

    $wp_customize->add_setting('protopress_disable_nav_desc', array(
        'default' => true,
        'sanitize_callback' => 'protopress_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'protopress_disable_nav_desc', array(
        'label' => __('Disable Description of Menu Items', 'protopress'),
        'section' => 'protopress_menu_basic',
        'settings' => 'protopress_disable_nav_desc',
        'type' => 'checkbox'
    ));

    $wp_customize->add_setting('protopress_disable_active_nav', array(
        'default' => true,
        'sanitize_callback' => 'protopress_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'protopress_disable_active_nav', array(
        'label' => __('Disable Highlighting of Current Active Item on the Menu.', 'protopress'),
        'section' => 'nav',
        'settings' => 'protopress_disable_active_nav',
        'type' => 'checkbox'
    ));
}
add_action( 'customize_register', 'protopress_customize_register_nav' );
