<?php
/**
 * Genesis Simple Social Icons.
 *
 * @package BrubakerDesignServices\BDSStarterTheme
 * @since   1.0.0
 * @author  Dan Brubaker
 * @link    https://brubakerservices.org/
 * @license GPL-2.0+
 */

namespace BrubakerDesignServices\BDSStarterTheme;

add_filter( 'simple_social_default_styles', 'social_default_styles' );
/**
 * Set Simple Social Icon defaults.
 *
 * @since 1.0.0
 *
 * @param array $defaults Social style defaults.
 * @return array Modified social style defaults.
 */
function social_default_styles( $defaults ) {

	$args = array(
		'alignment'              => 'alignleft',
		'background_color'       => '#f5f5f5',
		'background_color_hover' => '#333333',
		'border_radius'          => 3,
		'border_width'           => 0,
		'icon_color'             => '#333333',
		'icon_color_hover'       => '#ffffff',
		'size'                   => 40,
	);

	$args = wp_parse_args( $args, $defaults );

	return $args;

}
