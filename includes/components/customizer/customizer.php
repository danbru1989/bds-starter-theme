<?php
/**
 * Customizer handler
 *
 * @package BrubakerDesignServices\BDSStarterTheme\Customizer
 * @since   1.0.0
 * @author  Dan Brubaker
 * @link    https://brubakerservices.org/
 * @license GPL-2.0+
 */

namespace BrubakerDesignServices\BDSStarterTheme\Customizer;

use WP_Customize_Color_Control;

add_action( 'customize_register', __NAMESPACE__ . '\register_with_customizer' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function register_with_customizer() {
	$prefix = get_settings_prefix();

	global $wp_customize;

	$wp_customize->add_setting(
		'_link_color',
		array(
			'default'           => get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$prefix . '_link_color',
			array(
				'description' => __( 'Change the default color for linked titles, menu links, post info links and more.', CHILD_THEME_TEXT_DOMAIN ),
				'label'       => __( 'Link Color', CHILD_THEME_TEXT_DOMAIN ),
				'section'     => 'colors',
				'settings'    => $prefix . '_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		$prefix . '_accent_color',
		array(
			'default'           => get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$prefix . '_accent_color',
			array(
				'description' => __( 'Change the default hover color for button links, the menu button, and submit buttons. This setting does not apply to buttons created with the Buttons block.', CHILD_THEME_TEXT_DOMAIN ),
				'label'       => __( 'Accent Color', CHILD_THEME_TEXT_DOMAIN ),
				'section'     => 'colors',
				'settings'    => $prefix . '_accent_color',
			)
		)
	);

	$wp_customize->add_setting(
		$prefix . '_logo_width',
		array(
			'default'           => 350,
			'sanitize_callback' => 'absint',
		)
	);

	// Add a control for the logo size.
	$wp_customize->add_control(
		$prefix . '_logo_width',
		array(
			'label'       => __( 'Logo Width', CHILD_THEME_TEXT_DOMAIN ),
			'description' => __( 'The maximum width of the logo in pixels.', CHILD_THEME_TEXT_DOMAIN ),
			'priority'    => 9,
			'section'     => 'title_tagline',
			'settings'    => $prefix . '_logo_width',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 100,
			),

		)
	);

}

add_filter( 'genesis_customizer_theme_settings_config', 'remove_customizer_settings' );
/**
 * Removes output of header and front page breadcrumb settings in the Customizer.
 *
 * @since 1.0.0
 *
 * @param  array $config Original Customizer items.
 * @return array Filtered Customizer items.
 */
function remove_customizer_settings( $config ) {
	unset( $config['genesis']['sections']['genesis_header'] );
	unset( $config['genesis']['sections']['genesis_breadcrumbs']['controls']['breadcrumb_front_page'] );
	return $config;

}
