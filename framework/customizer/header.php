<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 3/13/2018
 * Time: 1:55 PM
 */


function protopress_customize_register_header_settings( $wp_customize )
{
    $wp_customize->get_section( 'header_image' )->panel  = 'protopress_header_panel';

    $wp_customize->add_panel( 'protopress_header_panel', array(
        'priority'       => 2,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header Settings','protopress'),
    ) );
//Logo Settings
    $wp_customize->add_section('title_tagline', array(
        'title' => __('Title, Tagline & Logo', 'protopress'),
        'priority' => 30,
        'panel'    => 'protopress_header_panel'
    ));

    $wp_customize->add_setting('protopress_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'protopress_logo',
            array(
                'label' => __('Upload Logo', 'protopress'),
                'section' => 'title_tagline',
                'settings' => 'protopress_logo',
                'priority' => 5,
            )
        )
    );

    $wp_customize->add_setting('protopress_logo_resize', array(
        'default' => 100,
        'sanitize_callback' => 'protopress_sanitize_positive_number',
    ));
    $wp_customize->add_control(
        'protopress_logo_resize',
        array(
            'label' => __('Resize & Adjust Logo', 'protopress'),
            'section' => 'title_tagline',
            'settings' => 'protopress_logo_resize',
            'priority' => 6,
            'type' => 'range',
            'active_callback' => 'protopress_logo_enabled',
            'input_attrs' => array(
                'min' => 30,
                'max' => 200,
                'step' => 5,
            ),
        )
    );

    function protopress_logo_enabled($control)
    {
        $option = $control->manager->get_setting('protopress_logo');
        return $option->value() == true;
    }


//Settings for Header Image
    $wp_customize->add_setting('protopress_himg_style', array(
        'default' => true,
        'sanitize_callback' => 'protopress_sanitize_himg_style'
    ));

    /* Sanitization Function */
    function protopress_sanitize_himg_style($input)
    {
        if (in_array($input, array('contain', 'cover')))
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'protopress_himg_style', array(
        'label' => __('Header Image Arrangement', 'protopress'),
        'section' => 'header_image',
        'settings' => 'protopress_himg_style',
        'type' => 'select',
        'choices' => array(
            'contain' => __('Contain', 'protopress'),
            'cover' => __('Cover Completely', 'protopress'),
        )
    ));

    $wp_customize->add_setting('protopress_himg_align', array(
        'default' => true,
        'sanitize_callback' => 'protopress_sanitize_himg_align'
    ));

    /* Sanitization Function */
    function protopress_sanitize_himg_align($input)
    {
        if (in_array($input, array('center', 'left', 'right')))
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'protopress_himg_align', array(
        'label' => __('Header Image Alignment', 'protopress'),
        'section' => 'header_image',
        'settings' => 'protopress_himg_align',
        'type' => 'select',
        'choices' => array(
            'center' => __('Center', 'protopress'),
            'left' => __('Left', 'protopress'),
            'right' => __('Right', 'protopress'),
        )

    ));

    $wp_customize->add_setting('protopress_himg_repeat', array(
        'default' => true,
        'sanitize_callback' => 'protopress_sanitize_checkbox'
    ));

    $wp_customize->add_control(
        'protopress_himg_repeat', array(
        'label' => __('Repeat Header Image', 'protopress'),
        'section' => 'header_image',
        'settings' => 'protopress_himg_repeat',
        'type' => 'checkbox',
    ));


//Settings For Logo Area

    $wp_customize->add_setting(
        'protopress_hide_title_tagline',
        array('sanitize_callback' => 'protopress_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'protopress_hide_title_tagline', array(
            'settings' => 'protopress_hide_title_tagline',
            'label' => __('Hide Title and Tagline.', 'protopress'),
            'section' => 'title_tagline',
            'type' => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'protopress_branding_below_logo',
        array('sanitize_callback' => 'protopress_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'protopress_branding_below_logo', array(
            'settings' => 'protopress_branding_below_logo',
            'label' => __('Display Site Title and Tagline Below the Logo.', 'protopress'),
            'section' => 'title_tagline',
            'type' => 'checkbox',
            'active_callback' => 'protopress_title_visible'
        )
    );

    function protopress_title_visible($control)
    {
        $option = $control->manager->get_setting('protopress_hide_title_tagline');
        return $option->value() == false;
    }

    $wp_customize->add_setting(
        'protopress_center_logo',
        array('sanitize_callback' => 'protopress_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'protopress_center_logo', array(
            'settings' => 'protopress_center_logo',
            'label' => __('Center Align.', 'protopress'),
            'section' => 'title_tagline',
            'type' => 'checkbox',
        )
    );
}
add_action( 'customize_register', 'protopress_customize_register_header_settings' );