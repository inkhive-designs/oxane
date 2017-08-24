<?php

function oxane_customize_register_header($wp_customize){
    //Logo Settings
    $wp_customize->add_section( 'title_tagline' , array(
        'title'      => __( 'Title, Tagline & Logo', 'oxane' ),
        'priority'   => 30,
    ) );


    $wp_customize->add_setting( 'oxane_logo_resize' , array(
        'default'     => 100,
        'sanitize_callback' => 'oxane_sanitize_positive_number',
    ) );
    $wp_customize->add_control(
        'oxane_logo_resize',
        array(
            'label' => __('Resize & Adjust Logo','oxane'),
            'section' => 'title_tagline',
            'settings' => 'oxane_logo_resize',
            'priority' => 6,
            'type' => 'range',
            'active_callback' => 'oxane_logo_enabled',
            'input_attrs' => array(
                'min'   => 30,
                'max'   => 200,
                'step'  => 5,
            ),
        )
    );

    function oxane_logo_enabled($control) {
        $option = $control->manager->get_setting('custom_logo');
        return $option->value() == true;
    }


//
//    //Replace Header Text Color with, separate colors for Title and Description
//    //Override oxane_site_titlecolor
//    $wp_customize->remove_control('display_header_text');
//    $wp_customize->remove_setting('header_textcolor');
//    $wp_customize->add_setting('oxane_site_titlecolor', array(
//        'default'     => '#000',
//        'sanitize_callback' => 'sanitize_hex_color',
//    ));
//
//    $wp_customize->add_control(new WP_Customize_Color_Control(
//            $wp_customize,
//            'oxane_site_titlecolor', array(
//            'label' => __('Site Title Color','oxane'),
//            'section' => 'colors',
//            'settings' => 'oxane_site_titlecolor',
//            'type' => 'color'
//        ) )
//    );
//
//    $wp_customize->add_setting('oxane_header_desccolor', array(
//        'default'     => '#000',
//        'sanitize_callback' => 'sanitize_hex_color',
//    ));
//
//    $wp_customize->add_control(new WP_Customize_Color_Control(
//            $wp_customize,
//            'oxane_header_desccolor', array(
//            'label' => __('Site Tagline Color','oxane'),
//            'section' => 'colors',
//            'settings' => 'oxane_header_desccolor',
//            'type' => 'color'
//        ) )
//    );

    //Settings for Header Image
    $wp_customize->add_setting( 'oxane_himg_style' , array(
        'default'     => 'cover',
        'sanitize_callback' => 'oxane_sanitize_himg_style'
    ) );

    /* Sanitization Function */
    function oxane_sanitize_himg_style( $input ) {
        if (in_array( $input, array('contain','cover') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'oxane_himg_style', array(
        'label' => __('Header Image Arrangement','oxane'),
        'section' => 'header_image',
        'settings' => 'oxane_himg_style',
        'type' => 'select',
        'choices' => array(
            'contain' => __('Contain','oxane'),
            'cover' => __('Cover Completely (Recommended)','oxane'),
        )
    ) );

    $wp_customize->add_setting( 'oxane_himg_align' , array(
        'default'     => 'center',
        'sanitize_callback' => 'oxane_sanitize_himg_align'
    ) );

    /* Sanitization Function */
    function oxane_sanitize_himg_align( $input ) {
        if (in_array( $input, array('center','left','right') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'oxane_himg_align', array(
        'label' => __('Header Image Alignment','oxane'),
        'section' => 'header_image',
        'settings' => 'oxane_himg_align',
        'type' => 'select',
        'choices' => array(
            'center' => __('Center','oxane'),
            'left' => __('Left','oxane'),
            'right' => __('Right','oxane'),
        )
    ) );

    $wp_customize->add_setting( 'oxane_himg_repeat' , array(
        'default'     => true,
        'sanitize_callback' => 'oxane_sanitize_checkbox'
    ) );

    $wp_customize->add_control(
        'oxane_himg_repeat', array(
        'label' => __('Repeat Header Image','oxane'),
        'section' => 'header_image',
        'settings' => 'oxane_himg_repeat',
        'type' => 'checkbox',
    ) );


    //Settings For Logo Area

    $wp_customize->add_setting(
        'oxane_hide_title_tagline',
        array( 'sanitize_callback' => 'oxane_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'oxane_hide_title_tagline', array(
            'settings' => 'oxane_hide_title_tagline',
            'label'    => __( 'Hide Title and Tagline.', 'oxane' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'oxane_branding_below_logo',
        array( 'sanitize_callback' => 'oxane_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'oxane_branding_below_logo', array(
            'settings' => 'oxane_branding_below_logo',
            'label'    => __( 'Display Site Title and Tagline Below the Logo.', 'oxane' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
            'active_callback' => 'oxane_title_visible'
        )
    );

    function oxane_title_visible( $control ) {
        $option = $control->manager->get_setting('oxane_hide_title_tagline');
        return $option->value() == false ;
    }
}
add_action('customize_register','oxane_customize_register_header');