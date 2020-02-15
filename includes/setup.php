<?php
/**
 * Sets up the child by adding theme supports, image sizes, theme defaults, etc...
 *
 * @package BrubakerDesignServices\BDSStarterTheme
 * @since   1.0.0
 * @author  Dan Brubaker
 * @link    https://brubakerservices.org/
 * @license GPL-2.0+
 */

namespace BrubakerDesignServices\BDSStarterTheme;

/**
 * Setup child theme. This loads after Genesis with a priority of 15.
 *
 * @since 1.0.0
 *
 * @return void
 */
add_action(
	'genesis_setup',
	function() {

		// Set Localization (do not remove).
		load_child_theme_textdomain( genesis_get_theme_handle(), apply_filters( 'child_theme_textdomain', CHILD_THEME_DIR . '/assets/languages', genesis_get_theme_handle() ) );

		configure_theme_supports();
		configure_image_sizes();

		delayed_genesis_modifications();
	},
	15
);

/**
 * Configure theme supports
 *
 * @since 1.0.0
 *
 * @return void
 */
function configure_theme_supports() {
	$config = array(
		'html5'                           => array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		),
		'genesis-accessibility'           => array(
			'404-page',
			'drop-down-menu',
			'headings',
			'search-form',
			'skip-links',
		),
		'genesis-structural-wraps'        => array(
			'footer-widgets',
		),
		'genesis-custom-logo'             => array(
			'height'      => 120,
			'width'       => 700,
			'flex-height' => true,
			'flex-width'  => true,
		),
		'genesis-menus'                   => array(
			'primary'   => __( 'Main Menu', genesis_get_theme_handle() ), //phpcs:ignore
			'secondary' => __( 'Footer Menu', genesis_get_theme_handle() ), //phpcs:ignore
		),
		'genesis-responsive-viewport'     => null,
		'genesis-after-entry-widget-area' => null,
		'genesis-footer-widgets'          => 3,
		'editor-styles'                   => null,
		'align-wide'                      => null,
		'responsive-embeds'               => null,
		'disable-custom-colors'           => null,
		'disable-custom-font-sizes'       => null,
		'editor-color-palette'            => array(
			array(
				'name'  => __( 'Blue', genesis_get_theme_handle() ), //phpcs:ignore
				'slug'  => 'primary',
				'color' => 'rgb(60, 150, 210)',
			),
			array(
				'name'  => __( 'Orange', genesis_get_theme_handle() ), //phpcs:ignore
				'slug'  => 'secondary',
				'color' => 'rgb(235,125,60)',
			),
			array(
				'name'  => __( 'White', genesis_get_theme_handle() ), //phpcs:ignore
				'slug'  => 'tertiary',
				'color' => 'rgb(255,255,255)',
			),
			array(
				'name'  => __( 'Light Grey', genesis_get_theme_handle() ), //phpcs:ignore
				'slug'  => 'quaternary',
				'color' => 'rgb(240,240,240)',
			),
			array(
				'name'  => __( 'Grey', genesis_get_theme_handle() ), //phpcs:ignore
				'slug'  => 'quinary',
				'color' => 'rgb(190,190,190)',
			),
			array(
				'name'  => __( 'Black', genesis_get_theme_handle() ), //phpcs:ignore
				'slug'  => 'senary',
				'color' => 'rgb(48,48,48)',
			),
		),
		'editor-font-sizes'               => array(
			array(
				'name' => __( 'Small', genesis_get_theme_handle() ), //phpcs:ignore
				'slug' => 'small',
				'size' => 14,
			),
			array(
				'name' => __( 'Normal', genesis_get_theme_handle() ), //phpcs:ignore
				'slug' => 'normal',
				'size' => 18,
			),
			array(
				'name' => __( 'Large', genesis_get_theme_handle() ), //phpcs:ignore
				'slug' => 'large',
				'size' => 24,
			),
			array(
				'name' => __( 'Largest', genesis_get_theme_handle() ), //phpcs:ignore
				'slug' => 'largest',
				'size' => 32,
			),
		),
	);

	foreach ( $config as $feature => $args ) {
		add_theme_support( $feature, $args );
	}
}

/**
 * Configure custom images sizes
 *
 * @since 1.0.0
 *
 * @return void
 */
function configure_image_sizes() {
	$config = array(
		'featured-image'   => array(
			'width'  => 720,
			'height' => 400,
			'crop'   => true,
		),
		'sidebar-featured' => array(
			'width'  => 75,
			'height' => 75,
			'crop'   => true,
		),
	);

	foreach ( $config as $name => $args ) {
		$crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;
		add_image_size( $name, $args['width'], $args['height'], $crop );
	}
}

/**
 * Delayed Genesis Modifications. Because the child theme loads before Genesis, these must be loaded after Genesis has started. Setup_child_theme() has pritority 15 to accomodate this.
 *
 * @since 1.0.0
 *
 * @return void
 */
function delayed_genesis_modifications() {

	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	remove_action( 'genesis_after_header', 'genesis_do_subnav' );
	remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
	remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );

	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );

	unregister_sidebar( 'header-right' );
	//phpcs:ignore
	// unregister_sidebar( 'sidebar' );
	unregister_sidebar( 'sidebar-alt' );
}

/**
 * Defines responsive menu settings.
 *
 * @since 1.0.0
 */
function genesis_sample_responsive_menu_settings() {
	$settings = array(
		'mainMenu'         => __( 'Menu', genesis_get_theme_handle() ), //phpcs:ignore
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Submenu', genesis_get_theme_handle() ), //phpcs:ignore
		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

/**
 * Adds body class on pages.
 *
 * @param array $classes Body classes.
 *
 * return array Body classes.
 */
add_filter(
	'body_class',
	function( $classes ) {
		if ( is_page() ) {
			global $post;

			$classes[] = $post->post_name . '-page';
		}

		return $classes;
	}
);
