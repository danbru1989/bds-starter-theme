<?php
/**
 * Footer modifications.
 *
 * @package BrubakerDesignServices\BDSStarterTheme
 * @since   1.0.0
 * @author  Dan Brubaker
 * @link    https://brubakerservices.org/
 * @license GPL-2.0+
 */

namespace BrubakerDesignServices\BDSStarterTheme;

add_filter( 'genesis_footer_creds_text', __NAMESPACE__ . '\footer_credits' );
/**
 * Change Footer text.
 *
 * @since 1.0.0
 *
 * @param string $creds Builds the credits string.
 */
function footer_credits( $creds ) {
	$creds = 'Designed & Maintained  by <a href="https://brubakerservices.org" target="_blank" title="Brubaker Design Services">Brubaker Design Services</a><div class="admin-login">[footer_loginout]</div>[footer_copyright before="Copyright "] – ';
	$creds = $creds . get_bloginfo( 'name' );
	return $creds;
}
