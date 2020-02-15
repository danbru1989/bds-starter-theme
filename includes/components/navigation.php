<?php
/**
 * Navigation modifications.
 *
 * @package BrubakerDesignServices\BDSStarterTheme
 * @since   1.0.0
 * @author  Dan Brubaker
 * @link    https://brubakerservices.org/
 * @license GPL-2.0+
 */

namespace BrubakerDesignServices\BDSStarterTheme;

/**
 * Output navigation inside the site header.
 */
add_action( 'genesis_header', 'genesis_do_nav', 15 );

/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 1.0.0
 *
 * @param  array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
add_filter(
	'wp_nav_menu_args',
	function( $args ) {
		if ( 'secondary' !== $args['theme_location'] ) {
			return $args;
		}

		$args['depth'] = 1;
		return $args;
	}
);
