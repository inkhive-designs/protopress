<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 3/13/2018
 * Time: 1:47 PM
 */
//layouts
function protopress_customize_register_layouts( $wp_customize ){

    // Layout and Design
    $wp_customize->add_panel( 'protopress_design_panel', array(
        'priority'       => 3,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Design & Layout','protopress'),
    ) );

    $wp_customize->add_section(
        'protopress_design_options',
        array(
            'title'     => __('Blog Layout','protopress'),
            'priority'  => 0,
            'panel'     => 'protopress_design_panel'
        )
    );


    $wp_customize->add_setting(
        'protopress_blog_layout',
        array( 'sanitize_callback' => 'protopress_sanitize_blog_layout' )
    );

    function protopress_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('grid','grid_2_column','grid_3_column') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'protopress_blog_layout',array(
            'label' => __('Select Layout','protopress'),
            'settings' => 'protopress_blog_layout',
            'section'  => 'protopress_design_options',
            'type' => 'select',
            'choices' => array(
                'grid' => __('Basic Blog Layout','protopress'),
                'grid_2_column' => __('Grid - 2 Column','protopress'),
                'grid_3_column' => __('Grid - 3 Column','protopress'),
            )
        )
    );

    $wp_customize->add_section(
        'protopress_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','protopress'),
            'priority'  => 0,
            'panel'     => 'protopress_design_panel'
        )
    );

    $wp_customize->add_setting(
        'protopress_disable_sidebar',
        array( 'sanitize_callback' => 'protopress_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'protopress_disable_sidebar', array(
            'settings' => 'protopress_disable_sidebar',
            'label'    => __( 'Disable Sidebar Everywhere.','protopress' ),
            'section'  => 'protopress_sidebar_options',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'protopress_disable_sidebar_home',
        array( 'sanitize_callback' => 'protopress_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'protopress_disable_sidebar_home', array(
            'settings' => 'protopress_disable_sidebar_home',
            'label'    => __( 'Disable Sidebar on Home/Blog.','protopress' ),
            'section'  => 'protopress_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'protopress_show_sidebar_options',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'protopress_disable_sidebar_front',
        array( 'sanitize_callback' => 'protopress_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'protopress_disable_sidebar_front', array(
            'settings' => 'protopress_disable_sidebar_front',
            'label'    => __( 'Disable Sidebar on Front Page.','protopress' ),
            'section'  => 'protopress_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'protopress_show_sidebar_options',
            'default'  => false
        )
    );


    $wp_customize->add_setting(
        'protopress_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'protopress_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'protopress_sidebar_width', array(
            'settings' => 'protopress_sidebar_width',
            'label'    => __( 'Sidebar Width','protopress' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','protopress'),
            'section'  => 'protopress_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'protopress_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function protopress_show_sidebar_options($control) {

        $option = $control->manager->get_setting('protopress_disable_sidebar');
        return $option->value() == false ;

    }

    class Protopress_Custom_CSS_Control extends WP_Customize_Control {
        public $type = 'textarea';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="8" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
            <?php
        }
    }

    $wp_customize-> add_section(
        'protopress_custom_codes',
        array(
            'title'			=> __('Custom CSS','protopress'),
            'description'	=> __('Enter your Custom CSS to Modify design.','protopress'),
            'priority'		=> 11,
            'panel'			=> 'protopress_design_panel'
        )
    );

    $wp_customize->add_setting(
        'protopress_custom_css',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'protopress_sanitize_text'
        )
    );

    $wp_customize->add_control(
        new Protopress_Custom_CSS_Control(
            $wp_customize,
            'protopress_custom_css',
            array(
                'section' => 'protopress_custom_codes',
                'settings' => 'protopress_custom_css'
            )
        )
    );

    function protopress_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }

    $wp_customize-> add_section(
        'protopress_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','protopress'),
            'description'	=> __('Enter your Own Copyright Text.','protopress'),
            'priority'		=> 11,
            'panel'			=> 'protopress_design_panel'
        )
    );

    $wp_customize->add_setting(
        'protopress_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'protopress_footer_text',
        array(
            'section' => 'protopress_custom_footer',
            'settings' => 'protopress_footer_text',
            'type' => 'text'
        )
    );
}
add_action( 'customize_register', 'protopress_customize_register_layouts' );