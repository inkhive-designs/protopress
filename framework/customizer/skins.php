<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 3/13/2018
 * Time: 1:48 PM
 */

function protopress_customize_register_protopress_skins( $wp_customize ){

//Replace Header Text Color with, separate colors for Title and Description
    //Override protopress_site_titlecolor
    $wp_customize->get_section('colors')->title = __('Theme Skins & Colors', 'protopress');
    $wp_customize->get_section('colors')->panel = 'protopress_design_panel';
    
    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_setting('header_textcolor');
    $wp_customize->add_setting('protopress_site_titlecolor', array(
        'default'     => '#e10d0d',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'     => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'protopress_site_titlecolor', array(
            'label' => __('Site Title Color','protopress'),
            'section' => 'colors',
            'settings' => 'protopress_site_titlecolor',
            'type' => 'color'
        ) )
    );

    $wp_customize->add_setting('protopress_header_desccolor', array(
        'default'     => '#777',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'     => 'postMessage'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'protopress_header_desccolor', array(
            'label' => __('Site Tagline Color','protopress'),
            'section' => 'colors',
            'settings' => 'protopress_header_desccolor',
            'type' => 'color'
        ) )
    );

    // Protopress skins
//    //Select the Default Theme Skin
//      $wp_customize->add_setting(
//        'protopress_skin',
//        array(
//            'default' => 'default',
//            'sanitize_callback' => 'protopress_sanitize_skin'
//        )
//    );
//
//    $skins = array('default' => __('Default(Red & White)', 'protopress'),
//        'red' => __('Roman', 'protopress'),
//        'pink' => __('Sweet Pink', 'protopress'),
//        'caribbean-green' => __('Caribbean Green', 'protopress'),
//
//    );
//
//    $wp_customize->add_control(
//        'protopress_skin', array(
//            'settings' => 'protopress_skin',
//            'section' => 'colors',
//            'label' => __('Choose from the Skins Below', 'protopress'),
//            'type' => 'select',
//            'choices' => $skins,
//        )
//    );
//

    function protopress_sanitize_skin($input)
    {
        if (in_array($input, array('default', 'red', 'caribbean-green','pink')))
            return $input;
        else
            return '';
    }
    //Skins
    $wp_customize->add_setting(
        'protopress_skins',
        array(
            'default'	=> 'default',
            'sanitize_callback' => 'protopress_sanitize_skin',
            'transport'	=> 'refresh'
        )
    );

    if(!function_exists('protopress_skin_array')){
        function protopress_skin_array(){
            return array(
                '#e10d0d' => 'default',
                '#e35d5b' => 'red',
                '#00bf8f' => 'caribbean-green',
                '#F29492' => 'pink',
            );
        }
    }

    $protopress_skin_array = protopress_skin_array();


    $wp_customize->add_control(
        new Protopress_Skin_Chooser(
            $wp_customize,
            'protopress_skins',
            array(
                'settings'		=> 'protopress_skins',
                'section'		=> 'colors',
                'label'			=> __( 'Select Skins', 'protopress' ),
                'type'			=> 'skins',
                'choices'		=> $protopress_skin_array,
            )
        )
    );
}
add_action( 'customize_register', 'protopress_customize_register_protopress_skins' );