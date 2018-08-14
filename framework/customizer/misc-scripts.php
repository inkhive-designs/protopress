<?php
/**
 * protopress Theme Customizer
 *
 * @package protopress
 */

function protopress_customize_register_misc( $wp_customize ) {

    //Important Links
    $wp_customize->add_section(
        'protopress_sec_premsupport',
        array(
            'title'     => __('Important Links','protopress'),
            'priority'  => 1,
        )
    );

    $wp_customize->add_setting(
        'protopress_important_links',
        array(
            'sanitize_callback' => 'protopress_sanitize_text'
        )
    );

    $wp_customize->add_control(
        new Protopress_WP_Customize_Upgrade_Control(
            $wp_customize,
            'protopress_important_links',
            array(
                'settings'		=> 'protopress_important_links',
                'section'		=> 'protopress_sec_premsupport',
                'description'	=> '<a class="protopress-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'protopress').'</a>
                                    <a class="protopress-important-links" href="https://demo.inkhive.com/protopress-plus/" target="_blank">'.__('Protopress Live Demo', 'protopress').'</a>
                                    <a class="protopress-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'protopress').'</a>
                                    <a class="protopress-important-links" href="https://wordpress.org/support/theme/protopress/reviews" target="_blank">'.__('Review Us', 'protopress').'</a>'
            )
        )
    );
}
add_action( 'customize_register', 'protopress_customize_register_misc' );