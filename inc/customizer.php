<?php
/**
 * rspl base Theme Customizer
 *
 * @package rspl_base
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rspl_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'rspl_theme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'rspl_theme_customize_partial_blogdescription',
			)
		);
	}

	/* Add panel for theme settings ---------------- */
	$wp_customize->add_section( 
		'rspl_theme_settings_section', 
		array(
			'title'      => __( 'Theme Settings', 'rspl_theme' ),
			'priority'   => 30,
		)
 	);

	/* Disable global styles in header WP 5.9 ---------------- */
	$wp_customize->add_setting(
		'disable-global-styles',
		array(
			'default'	=> '',
			'transport'            => 'refresh',
			'type'                 => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'disable-global-styles',
		array(
			'type'        => 'checkbox',
			'section'     => 'rspl_theme_settings_section',
			'priority'    => 5,
			'label'       => __( 'Disable Global Style in Head', 'rspl_theme' ),
		)
	);
}
add_action( 'customize_register', 'rspl_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function rspl_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function rspl_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rspl_theme_customize_preview_js() {
	wp_enqueue_script( 'rspl_theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), RSPL_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'rspl_theme_customize_preview_js' );
