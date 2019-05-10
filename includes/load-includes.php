<?php
/**
 * Loads up all the theme files.
 *
 * @package BrubakerDesignServices\BDSStarterTheme
 * @since   1.0.0
 * @author  Dan Brubaker
 * @link    https://brubakerservices.org/
 * @license GPL-2.0+
 */

namespace BrubakerDesignServices\BDSStarterTheme;

load_non_admin_files();
/**
 * Loads non-admin files
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_non_admin_files() {
	$filenames = array(
		'setup.php',
		'load-assets.php',

		'components/customizer/css-handler.php',
		'components/customizer/helper-functions.php',
		'components/gutenberg/init.php',
		'components/woocommerce/woocommerce-setup.php',
		'components/woocommerce/woocommerce-output.php',
		'components/woocommerce/woocommerce-notice.php',
		'components/simple-social-icons/simple-social-icons.php',

		'partials/navigation.php',
		'partials/comments.php',
		'partials/author-box.php',
		'partials/footer.php',
	);

	load_specified_files( $filenames );
}



add_action( 'admin_init', __NAMESPACE__ . '\load_admin_files' );
/**
 * Load admin files
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_admin_files() {
	$filenames = array(
		'components/customizer/customizer.php',
	);

	load_specified_files( $filenames );
}



/**
 * Load each of the specified files
 *
 * @since 1.0.0
 *
 * @param array  $filenames Names of the files.
 * @param string $folder_root Location of the files.
 *
 * @return void
 */
function load_specified_files( array $filenames, $folder_root = '' ) {
	$folder_root = $folder_root ?: CHILD_THEME_DIR . '/includes/';

	foreach ( $filenames as $filename ) {
		include $folder_root . $filename;
	}
}
