<?php
/**
 * Load assets handler.
 *
 * @package BrubakerDesignServices\BDSStarterTheme
 * @since   1.0.0
 * @author  Dan Brubaker
 * @link    https://brubakerservices.org/
 * @license GPL-2.0+
 */

namespace BrubakerDesignServices\BDSStarterTheme;

/**
 * Enqueue Scripts and Styles
 *
 * @since 1.0.0
 */
add_action(
	'wp_enqueue_scripts',
	function() {

		wp_enqueue_style(
			genesis_get_theme_handle() . '-fonts',
			'//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700|Roboto+Slab:400,700',
			array(),
			genesis_get_theme_version()
		);

		wp_enqueue_style( 'dashicons' );

		wp_enqueue_script(
			genesis_get_theme_handle() . '-font-awesome',
			'https://kit.fontawesome.com/7c37585a60.js',
			array(),
			genesis_get_theme_version(),
			false,
		);

		wp_enqueue_style(
			genesis_get_theme_handle() . '-main',
			CHILD_URL . '/assets/css/main.css',
			array(),
			genesis_get_theme_version()
		);

		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
		wp_enqueue_script(
			'genesis-sample-responsive-menu',
			CHILD_URL . '/assets/js/responsive-menus.js',
			array( 'jquery' ),
			genesis_get_theme_version(),
			true
		);

		wp_localize_script(
			'genesis-sample-responsive-menu',
			'genesis_responsive_menu',
			genesis_sample_responsive_menu_settings()
		);

		wp_enqueue_script(
			genesis_get_theme_handle() . '-scripts',
			CHILD_URL . '/assets/js/main.js',
			array( 'jquery' ),
			genesis_get_theme_version(),
			true
		);
	}
);

/**
 * Enqueue Editor Styles.
 *
 * @see https://developer.wordpress.org/block-editor/developers/themes/theme-support/#enqueuing-the-editor-style
 * @since 2.2.0
 */
add_editor_style( 'assets/css/editor.css' );
