<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 3/13/2018
 * Time: 1:58 PM
 */

function protopress_customize_register_misc( $wp_customize )
{
    $wp_customize->add_section(
        'protopress_sec_upgrade',
        array(
            'title' => __('Discover ProtoPress Pro', 'protopress'),
            'priority' => 1,
        )
    );

    $wp_customize->add_setting(
        'protopress_upgrade',
        array('sanitize_callback' => 'esc_textarea')
    );

    $wp_customize->add_control(
        new WP_Customize_Upgrade_Control(
            $wp_customize,
            'protopress_upgrade',
            array(
                'label' => __('More of Everything', 'protopress'),
                'description' => __('ProtoPress Pro has more of Everything. More New Features, More Options, More Colors, More Fonts, More Layouts, Configurable Slider, Inbuilt Advertising Options, Multiple Skins, More Widgets, and a lot more options and comes with Dedicated Support. To Know More about the Pro Version, click here: <a href="http://rohitink.com/product/protopress-pro/">Upgrade to Pro</a>.', 'protopress'),
                'section' => 'protopress_sec_upgrade',
                'settings' => 'protopress_upgrade',
            )
        )
    );
}

add_action( 'customize_register', 'protopress_customize_register_misc' );
