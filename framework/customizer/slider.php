<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 3/13/2018
 * Time: 1:51 PM
 */

function protopress_customize_register_slider( $wp_customize ) {
// SLIDER PANEL
$wp_customize->add_panel( 'protopress_slider_panel', array(
    'priority'       => 35,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Main Slider',
) );

$wp_customize->add_section(
    'protopress_sec_slider_options',
    array(
        'title'     => 'Enable/Disable',
        'priority'  => 0,
        'panel'     => 'protopress_slider_panel'
    )
);


$wp_customize->add_setting(
    'protopress_main_slider_enable',
    array( 'sanitize_callback' => 'protopress_sanitize_checkbox' )
);

$wp_customize->add_control(
    'protopress_main_slider_enable', array(
        'settings' => 'protopress_main_slider_enable',
        'label'    => __( 'Enable Slider.', 'protopress' ),
        'section'  => 'protopress_sec_slider_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'protopress_main_slider_count',
    array(
        'default' => '0',
        'sanitize_callback' => 'protopress_sanitize_positive_number'
    )
);

// Select How Many Slides the User wants, and Reload the Page.
$wp_customize->add_control(
    'protopress_main_slider_count', array(
        'settings' => 'protopress_main_slider_count',
        'label'    => __( 'No. of Slides(Min:0, Max: 10)' ,'protopress'),
        'section'  => 'protopress_sec_slider_options',
        'type'     => 'number',
        'description' => __('Save the Settings, and Reload this page to Configure the Slides.','protopress'),

    )
);
    if ( get_theme_mod('protopress_main_slider_count') > 0 ) :
        $slides = get_theme_mod('protopress_main_slider_count');

        for ( $i = 1 ; $i <= $slides ; $i++ ) :

            //Create the settings Once, and Loop through it.

            $wp_customize->add_setting(
                'protopress_slide_img'.$i,
                array( 'sanitize_callback' => 'esc_url_raw' )
            );

            $wp_customize->add_control(
                new WP_Customize_Image_Control(
                    $wp_customize,
                    'protopress_slide_img'.$i,
                    array(
                        'label' => '',
                        'section' => 'protopress_slide_sec'.$i,
                        'settings' => 'protopress_slide_img'.$i,
                    )
                )
            );


            $wp_customize->add_section(
                'protopress_slide_sec'.$i,
                array(
                    'title'     => 'Slide '.$i,
                    'priority'  => $i,
                    'panel'     => 'protopress_slider_panel'
                )
            );

            $wp_customize->add_setting(
                'protopress_slide_title'.$i,
                array( 'sanitize_callback' => 'sanitize_text_field' )
            );

            $wp_customize->add_control(
                'protopress_slide_title'.$i, array(
                    'settings' => 'protopress_slide_title'.$i,
                    'label'    => __( 'Slide Title','protopress' ),
                    'section'  => 'protopress_slide_sec'.$i,
                    'type'     => 'text',
                )
            );

            $wp_customize->add_setting(
                'protopress_slide_desc'.$i,
                array( 'sanitize_callback' => 'sanitize_text_field' )
            );

            $wp_customize->add_control(
                'protopress_slide_desc'.$i, array(
                    'settings' => 'protopress_slide_desc'.$i,
                    'label'    => __( 'Slide Description','protopress' ),
                    'section'  => 'protopress_slide_sec'.$i,
                    'type'     => 'text',
                )
            );



            $wp_customize->add_setting(
                'protopress_slide_CTA_button'.$i,
                array( 'sanitize_callback' => 'sanitize_text_field' )
            );

            $wp_customize->add_control(
                'protopress_slide_CTA_button'.$i, array(
                    'settings' => 'protopress_slide_CTA_button'.$i,
                    'label'    => __( 'Custom Call to Action Button Text(Optional)','protopress' ),
                    'section'  => 'protopress_slide_sec'.$i,
                    'type'     => 'text',
                )
            );

            $wp_customize->add_setting(
                'protopress_slide_url'.$i,
                array( 'sanitize_callback' => 'esc_url_raw' )
            );

            $wp_customize->add_control(
                'protopress_slide_url'.$i, array(
                    'settings' => 'protopress_slide_url'.$i,
                    'label'    => __( 'Target URL','protopress' ),
                    'section'  => 'protopress_slide_sec'.$i,
                    'type'     => 'url',
                )
            );

        endfor;


    endif;
}
add_action( 'customize_register', 'protopress_customize_register_slider' );