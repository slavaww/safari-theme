<?php
/**
 * Customize filds
 */

/**
 * Footer сайта
 * @param $wp_customize
 */
function safari_footer( $wp_customize ) {
    // как обновлять превью сайта:
	// 'refresh'     - перезагрузкой фрейма (можно полностью отказаться от JavaScript)
	// 'postMessage' - отправкой AJAX запроса
    $transport = 'postMessage';
    if ( $section = "footer_options" ) {
        $wp_customize->add_section( $section, array(
            'title'       => __( 'Footer options', 'safari' ),
            'priority' => 30,
        ));
    
        $setting = 'footer_left_txt';
        $wp_customize->add_setting( $setting, array(
            'default'        => 'Receive special offers and  get our latest updates.',
            'capability'     => 'edit_theme_options',
        ));
    
        $wp_customize->add_control( $setting, array(
            'type'       => 'textarea',
            'label'      => __('Footer left text', 'safari'),
            'section'    => $section
        ));

        $setting = 'footer_copy';
        $wp_customize->add_setting( $setting, array(
            'default'           => 'All rights reserved.',
            'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $transport
        ));
    
        $wp_customize->add_control( $setting, array(
            'type'       => 'text',
            'label'      => __('Copyright text', 'safari'),
            'section'    => $section
        ));

        $setting = 'footer_address';
        $wp_customize->add_setting( $setting, array(
            'default'           => '1772 Nevskaya Street NW, Suite 21389, Atlanta, GA 902344',
            'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $transport
        ));
    
        $wp_customize->add_control( $setting, array(
            'type'       => 'text',
            'label'      => __('Address', 'safari'),
            'section'    => $section
        ));

        $setting = 'footer_phone';
        $wp_customize->add_setting( $setting, array(
            'default'           => '+1 789 123456',
            'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $transport
        ));
    
        $wp_customize->add_control( $setting, array(
            'type'       => 'text',
            'label'      => __('Phone', 'safari'),
            'section'    => $section
        ));

        $setting = 'footer_email';
        $wp_customize->add_setting( $setting, array(
            'default'           => 'mail@safari-dog.ru',
            'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $transport
        ));
    
        $wp_customize->add_control( $setting, array(
            'type'       => 'text',
            'label'      => __('E-mail', 'safari'),
            'section'    => $section
        ));
    }
}

add_action('customize_register', 'safari_footer');