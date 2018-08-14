<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 3/13/2018
 * Time: 2:04 PM
 */

function protopress_customize_register_featured_content1( $wp_customize ){

    //IMAGE GRID

    $wp_customize->add_section(
        'protopress_fc_grid',
        array(
            'title'     => __('Image Grid','protopress'),
            'priority'  => 10,
            'panel'     => 'protopress_fca_panel'
        )
    );

    $wp_customize->add_setting(
        'protopress_grid_enable',
        array(
            'sanitize_callback' => 'protopress_sanitize_checkbox',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'protopress_grid_enable', array(
            'settings' => 'protopress_grid_enable',
            'label'    => __( 'Enable Grid.', 'protopress' ),
            'section'  => 'protopress_fc_grid',
            'type'     => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'protopress_grid_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'protopress_grid_title', array(
            'settings' => 'protopress_grid_title',
            'label'    => __( 'Title for the Grid', 'protopress' ),
            'section'  => 'protopress_fc_grid',
            'type'     => 'text',
        )
    );



    $wp_customize->add_setting(
        'protopress_grid_cat',
        array( 'sanitize_callback' => 'protopress_sanitize_category' )
    );


    $wp_customize->add_control(
        new WP_Customize_Category_Control(
            $wp_customize,
            'protopress_grid_cat',
            array(
                'label'    => __('Category For Image Grid','protopress'),
                'settings' => 'protopress_grid_cat',
                'section'  => 'protopress_fc_grid'
            )
        )
    );

    $wp_customize->add_setting(
        'protopress_grid_rows',
        array( 'sanitize_callback' => 'protopress_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'protopress_grid_rows', array(
            'settings' => 'protopress_grid_rows',
            'label'    => __( 'Max No. of Posts in the Grid. Enter 0 to Disable the Grid.', 'protopress' ),
            'section'  => 'protopress_fc_grid',
            'type'     => 'number',
            'default'  => '0'
        )
    );
}
add_action( 'customize_register', 'protopress_customize_register_featured_content1' );