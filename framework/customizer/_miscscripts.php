<?php
function oxane_customize_register_miscscripts($wp_customize){
    $wp_customize->add_section(
        'oxane_sec_pro',
        array(
            'title'     => __('Important Links','oxane'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'oxane_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Oxane_WP_Customize_Upgrade_Control(
            $wp_customize,
            'oxane_pro',
            array(
                'description'	=> '<a class="oxane-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'oxane').'</a>
                                    <a class="oxane-important-links" href="https://inkhive.com/documentation/oxane" target="_blank">'.__('Oxane Documentation', 'oxane').'</a>
                                    <a class="oxane-important-links" href="https://demo.inkhive.com/oxane-plus/" target="_blank">'.__('Oxane Plus Live Demo', 'oxane').'</a>
                                    <a class="oxane-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'oxane').'</a>
                                    <a class="oxane-important-links" href="https://wordpress.org/support/theme/oxane/reviews" target="_blank">'.__('Review Oxane on WordPress', 'oxane').'</a>',
                'section' => 'oxane_sec_pro',
                'settings' => 'oxane_pro',
            )
        )
    );
}
add_action('customize_register', 'oxane_customize_register_miscscripts');