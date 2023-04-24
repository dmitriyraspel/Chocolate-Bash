<?php
/**
 * Chocolate-Bash Theme Customizer
 *
 * @package rspl_base
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rspl_theme_customize_register( $wp_customize ) {

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
