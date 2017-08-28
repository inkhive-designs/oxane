<?php
function oxane_customize_register_motion_bar($wp_customize){
    //MOTION BAR

    $wp_customize->add_section(
        'oxane_motionbar_section',
        array(
            'title'     => __('Motion Bar','oxane'),
            'priority'  => 35,
        )
    );

    $wp_customize->add_setting(
        'oxane_motionbar_title_set',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'oxane_motionbar_title_set', array(
            'settings' => 'oxane_motionbar_title_set',
            'section'  => 'oxane_motionbar_section',
            'label'    => __( 'Enter Title Text', 'oxane' ),
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'oxane_motionbar_content_cat',
        array( 'sanitize_callback' => 'oxane_sanitize_category' )
    );


    $wp_customize->add_control(
        new Oxane_WP_Customize_Category_Control(
            $wp_customize,
            'oxane_motionbar_content_cat',
            array(
                'label'    => __('Category For Motion Bar Contents','oxane'),
                'settings' => 'oxane_motionbar_content_cat',
                'section'  => 'oxane_motionbar_section'
            )
        )
    );
}
add_action('customize_register', 'oxane_customize_register_motion_bar');