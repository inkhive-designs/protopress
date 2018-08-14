<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 3/13/2018
 * Time: 1:45 PM
 */
//Fonts
function protopress_customize_register_fonts( $wp_customize ){
    $wp_customize->add_section(
        'protopress_typo_options',
        array(
            'title'     => __('Google Web Fonts','protopress'),
            'priority'  => 41,
            'panel'     => 'protopress_design_panel'

        )
    );

    $font_array = array('Raleway','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo 13px','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans');
    $fonts = array_combine($font_array, $font_array);

    $wp_customize->add_setting(
        'protopress_title_font',
        array(
            'default'=> 'Raleway',
            'sanitize_callback' => 'protopress_sanitize_gfont',
            'transport' => 'postMessage'
        )
    );

    function protopress_sanitize_gfont( $input ) {
        if ( in_array($input, array('Raleway','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo 13px','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'protopress_title_font',array(
            'label' => __('Title','protopress'),
            'settings' => 'protopress_title_font',
            'section'  => 'protopress_typo_options',
            'type' => 'select',
            'choices' => $fonts,
        )
    );

    $wp_customize->add_setting(
        'protopress_body_font',
        array(
            'default'=> 'Khula',
            'sanitize_callback' => 'protopress_sanitize_gfont',
            'transport'     => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'protopress_body_font',array(
            'label' => __('Body','protopress'),
            'settings' => 'protopress_body_font',
            'section'  => 'protopress_typo_options',
            'type' => 'select',
            'choices' => $fonts
        )
    );

}
add_action( 'customize_register', 'protopress_customize_register_fonts' );
