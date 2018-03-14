<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 3/13/2018
 * Time: 1:49 PM
 */

function protopress_customize_register_social( $wp_customize ) {
// Social Icons
$wp_customize->add_section('protopress_social_section', array(
    'title' => __('Social Icons','protopress'),
    'priority' => 44 ,
    'panel'    => 'protopress_header_panel'
));

$social_networks = array( //Redefinied in Sanitization Function.
    'none' => __('-','protopress'),
    'facebook' => __('Facebook','protopress'),
    'twitter' => __('Twitter','protopress'),
    'google-plus' => __('Google Plus','protopress'),
    'instagram' => __('Instagram','protopress'),
    'rss' => __('RSS Feeds','protopress'),
    'vine' => __('Vine','protopress'),
    'vimeo-square' => __('Vimeo','protopress'),
    'youtube' => __('Youtube','protopress'),
    'flickr' => __('Flickr','protopress'),
);

$social_count = count($social_networks);

for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

    $wp_customize->add_setting(
        'protopress_social_'.$x, array(
        'sanitize_callback' => 'protopress_sanitize_social',
        'default' => 'none'
    ));

    $wp_customize->add_control( 'protopress_social_'.$x, array(
        'settings' => 'protopress_social_'.$x,
        'label' => __('Icon ','protopress').$x,
        'section' => 'protopress_social_section',
        'type' => 'select',
        'choices' => $social_networks,
    ));

    $wp_customize->add_setting(
        'protopress_social_url'.$x, array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'protopress_social_url'.$x, array(
        'settings' => 'protopress_social_url'.$x,
        'description' => __('Icon ','protopress').$x.__(' Url','protopress'),
        'section' => 'protopress_social_section',
        'type' => 'url',
        'choices' => $social_networks,
    ));

endfor;

function protopress_sanitize_social( $input ) {
    $social_networks = array(
        'none' ,
        'facebook',
        'twitter',
        'google-plus',
        'instagram',
        'rss',
        'vine',
        'vimeo-square',
        'youtube',
        'flickr'
    );
    if ( in_array($input, $social_networks) )
        return $input;
    else
        return '';
}
}
add_action( 'customize_register', 'protopress_customize_register_social' );