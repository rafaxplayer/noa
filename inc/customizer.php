<?php
/**
 * noa Theme Customizer
 *
 * @package noa
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function noa_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control( 'header_textcolor' );



	$wp_customize->add_section( 'noa_social_section' , array(
		'title'       => __( 'Social icons', 'noa' ),
		'priority'    => 40,
		'description' => __('Set url for social icons footer, with hidde icon set empty value.','noa'),
	) );
  
	/*Instagram*/     
	$wp_customize->add_setting( 'noa_instagram_url', 
		array( 
			'sanitize_callback' => 'esc_url_raw'
		) 
	);

	$wp_customize->add_control( 'noa_instagram_url_control', array(
		'label'      => esc_html__( 'Instagram Url', 'noa' ),
        'section'    => 'noa_social_section',
        'settings'    => 'noa_instagram_url',
		
	));
	
	/* Pinterest*/
	$wp_customize->add_setting( 'noa_pinterest_url', 
		array( 
			'sanitize_callback' => 'esc_url_raw'
		) 
	);

	$wp_customize->add_control( 'noa_pinterest_url_control', array(
		'label'      => esc_html__( 'Pinterest Url', 'noa' ),
        'section'    => 'noa_social_section',
        'settings'    => 'noa_pinterest_url',
		
    ));

	/* Facebook*/
	$wp_customize->add_setting( 'noa_facebook_url', 
		array( 
			'sanitize_callback' => 'esc_url_raw'
		) 
	);

	$wp_customize->add_control( 'noa_facebook_url_control', array(
		'label'      => esc_html__( 'Facebook Url', 'noa' ),
        'section'    => 'noa_social_section',
        'settings'    => 'noa_facebook_url',
		
    ));

	/* Twitter*/
	$wp_customize->add_setting( 'noa_twitter_url', 
	array( 
		'sanitize_callback' => 'esc_url_raw'
	) 
	);

	$wp_customize->add_control( 'noa_twitter_url_control', array(
	'label'      => esc_html__( 'Twitter Url', 'noa' ),
	'section'    => 'noa_social_section',
	'settings'    => 'noa_twitter_url',

	));

	/* Linkedin*/
	$wp_customize->add_setting( 'noa_linkedin_url', 
	array( 
		'sanitize_callback' => 'esc_url_raw'
	) 
	);

	$wp_customize->add_control( 'noa_linkedin_url_control', array(
	'label'      => esc_html__( 'Linkedin Url', 'noa' ),
	'section'    => 'noa_social_section',
	'settings'    => 'noa_linkedin_url',

	));

	/* Whatsapp*/
	$wp_customize->add_setting( 'noa_whatsapp_number', 
	array( 
		'sanitize_callback' => 'absint'
	) 
	);

	$wp_customize->add_control( 'noa_whatsapp_number_control', array(
	'label'      => esc_html__( 'Whatsapp Phone number', 'noa' ),
	'section'    => 'noa_social_section',
	'settings'    => 'noa_whatsapp_number',

	));

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'noa_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'noa_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'noa_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function noa_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function noa_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function noa_customize_preview_js() {
	wp_enqueue_script( 'noa-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'noa_customize_preview_js' );
