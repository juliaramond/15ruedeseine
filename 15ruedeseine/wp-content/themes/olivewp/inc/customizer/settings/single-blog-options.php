<?php
/**
 * Single Blog Options Customizer Customizer
 *
 * @package OliveWP Theme
*/

function olivewp_single_blog_customizer($wp_customize) {

    $wp_customize->add_section('olivewp_single_blog_section',
        array(
            'title'     => esc_html__('Single Post', 'olivewp' ),
            'panel'     => 'olivewp_theme_panel',
            'priority'  => 2
        )
    );


    /* ====================
    * Meta Hide Show 
    ==================== */
    $wp_customize->add_setting('olivewp_enable_single_post_date',
        array(
            'default'           => true,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control($wp_customize, 'olivewp_enable_single_post_date',
        array(
            'label'     => esc_html__('Hide/Show Date', 'olivewp' ),
            'type'      => 'toggle',
            'section'   => 'olivewp_single_blog_section',
            'priority'  => 4
        )
    ));

    $wp_customize->add_setting('olivewp_enable_single_post_category',
        array(
            'default'           => true,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control($wp_customize, 'olivewp_enable_single_post_category',
        array(
            'label'     => esc_html__('Hide/Show Category', 'olivewp' ),
            'type'      => 'toggle',
            'section'   => 'olivewp_single_blog_section',
            'priority'  => 5
        )
    )); 

    $wp_customize->add_setting('olivewp_enable_single_post_comment',
        array(
            'default'           => true,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control($wp_customize, 'olivewp_enable_single_post_comment',
        array(
            'label'     => esc_html__('Hide/Show Comments', 'olivewp' ),
            'type'      => 'toggle',
            'section'   => 'olivewp_single_blog_section',
            'priority'  => 6
        )
    )); 

    $wp_customize->add_setting('olivewp_enable_single_post_tag',
        array(
            'default'           => true,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control($wp_customize, 'olivewp_enable_single_post_tag',
        array(
            'label'     => esc_html__('Hide/Show Tag', 'olivewp' ),
            'type'      => 'toggle',
            'section'   => 'olivewp_single_blog_section',
            'priority'  => 7
        )
    ));

    $wp_customize->add_setting('olivewp_enable_single_post_admin_details',
        array(
            'default'           => true,
            'sanitize_callback' => 'olivewp_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Olivewp_Toggle_Control($wp_customize, 'olivewp_enable_single_post_admin_details',
        array(
            'label'     => esc_html__('Hide/Show Author Details', 'olivewp' ),
            'type'      => 'toggle',
            'section'   => 'olivewp_single_blog_section',
            'priority'  => 8
        )
    ));
}

add_action('customize_register', 'olivewp_single_blog_customizer');
