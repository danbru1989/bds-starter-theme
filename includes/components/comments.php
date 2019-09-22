<?php
/**
 * Comments modifications.
 *
 * @package BrubakerDesignServices\BDSStarterTheme
 * @since   1.0.0
 * @author  Dan Brubaker
 * @link    https://brubakerservices.org/
 * @license GPL-2.0+
 */

namespace BrubakerDesignServices\BDSStarterTheme;

add_filter( 'genesis_comment_list_args', __NAMESPACE__ . '\genesis_sample_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param  array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function genesis_sample_comments_gravatar( $args ) {
	$args['avatar_size'] = 60;
	return $args;
}
