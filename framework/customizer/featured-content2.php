<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 3/13/2018
 * Time: 2:01 PM
 */
function protopress_customize_register_featured_content2( $wp_customize )
{

    // CREATE THE FCA PANEL
    $wp_customize->add_panel('protopress_fca_panel', array(
        'priority' => 40,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => 'Featured Content Areas',
        'description' => '',
    ));


    //SQUARE BOXES
    $wp_customize->add_section(
        'protopress_fc_boxes',
        array(
            'title' => 'Square Boxes',
            'priority' => 10,
            'panel' => 'protopress_fca_panel'
        )
    );

    $wp_customize->add_setting(
        'protopress_box_enable',
        array(
            'sanitize_callback' => 'protopress_sanitize_checkbox',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'protopress_box_enable', array(
            'settings' => 'protopress_box_enable',
            'label' => __('Enable Square Boxes & Posts Slider.', 'protopress'),
            'section' => 'protopress_fc_boxes',
            'type' => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'protopress_box_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'     => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'protopress_box_title', array(
            'settings' => 'protopress_box_title',
            'label' => __('Title for the Boxes', 'protopress'),
            'section' => 'protopress_fc_boxes',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'protopress_box_cat',
        array('sanitize_callback' => 'protopress_sanitize_category')
    );

    $wp_customize->add_control(
        new WP_Customize_Category_Control(
            $wp_customize,
            'protopress_box_cat',
            array(
                'label' => 'Category For Square Boxes.',
                'settings' => 'protopress_box_cat',
                'section' => 'protopress_fc_boxes'
            )
        )
    );


    //SLIDER
    $wp_customize->add_section(
        'protopress_fc_slider',
        array(
            'title' => __('Posts Slider', 'protopress'),
            'priority' => 10,
            'panel' => 'protopress_fca_panel',
            'description' => 'This is the Posts Slider, displayed along with square boxes.',
        )
    );


    $wp_customize->add_setting(
        'protopress_slider_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'protopress_slider_title', array(
            'settings' => 'protopress_slider_title',
            'label' => __('Title for the Slider', 'protopress'),
            'section' => 'protopress_fc_slider',
            'type' => 'text',
        )
    );


    /*
        // SETTING TO BE ADDED IN A FUTURE UPDATE.
    
        $wp_customize->add_setting(
            'slider_type'
            array( 'sanitize_callback' => 'protopress_sanitize_slidertype' )
        );
    
        $wp_customize->add_control(
                'slider_type', array(
                'settings' => 'slider_type',
                'label'    => __( 'Choose Slider' ),
                'section'  => 'fc_slider',
                'type'     => 'select',
                'choices'  => array(
                                '3d' => '3D Slider',
                                'bx' => 'BX Slider'),
            )
        );
    */

    $wp_customize->add_setting(
        'protopress_slider_count',
        array('sanitize_callback' => 'protopress_sanitize_positive_number')
    );

    $wp_customize->add_control(
        'protopress_slider_count', array(
            'settings' => 'protopress_slider_count',
            'label' => __('No. of Posts(Min:3, Max: 10)', 'protopress'),
            'section' => 'protopress_fc_slider',
            'type' => 'range',
            'input_attrs' => array(
                'min' => 3,
                'max' => 10,
                'step' => 1,
                'class' => 'test-class test',
                'style' => 'color: #0a0',
            ),
        )
    );

    $wp_customize->add_setting(
        'protopress_slider_cat',
        array('sanitize_callback' => 'protopress_sanitize_category')
    );

    $wp_customize->add_control(
        new WP_Customize_Category_Control(
            $wp_customize,
            'protopress_slider_cat',
            array(
                'label' => __('Category For Slider.', 'protopress'),
                'settings' => 'protopress_slider_cat',
                'section' => 'protopress_fc_slider'
            )
        )
    );
}
add_action( 'customize_register', 'protopress_customize_register_featured_content2' );