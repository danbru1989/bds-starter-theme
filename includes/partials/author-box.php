<?php
/**
 * Author Box modifications.
 *
 * @package BrubakerDesignServices\BDSStarterTheme
 * @since   1.0.0
 * @author  Dan Brubaker
 * @link    https://brubakerservices.org/
 * @license GPL-2.0+
 */

namespace BrubakerDesignServices\BDSStarterTheme;

add_filter( 'genesis_author_box_gravatar_size', __NAMESPACE__ . '\author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param  int $size Original icon size.
 * @return int Modified icon size.
 */
function author_box_gravatar( $size ) {
	return 90;
}
