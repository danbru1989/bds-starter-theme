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

add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme', 15 );
/**
 * Setup child theme. This loads after Genesis with a priority of 15.
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup_child_theme() {
	// Set Localization (do not remove).
	load_child_theme_textdomain( CHILD_THEME_TEXT_DOMAIN, apply_filters( 'child_theme_textdomain', CHILD_THEME_DIR . '/assets/languages', CHILD_THEME_TEXT_DOMAIN ) );

	configure_theme_supports();
	configure_image_sizes();

	genesis_gutenberg_support();
	add_editor_style( '/assets/css/editor-styles.css' );

	delayed_genesis_modifications();
}

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
			'header',
			'footer-widgets',
		),
		'genesis-custom-logo'             => array(
			'height'      => 120,
			'width'       => 700,
			'flex-height' => true,
			'flex-width'  => true,
		),
		'genesis-menus'                   => array(
			'primary'   => __( 'Main Menu', CHILD_THEME_TEXT_DOMAIN ),
			'secondary' => __( 'Footer Menu', CHILD_THEME_TEXT_DOMAIN ),
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
				'name'  => __( 'White', CHILD_THEME_TEXT_DOMAIN ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => __( 'Grey', CHILD_THEME_TEXT_DOMAIN ),
				'slug'  => 'grey',
				'color' => '#bebebe',
			),
			array(
				'name'  => __( 'Black', CHILD_THEME_TEXT_DOMAIN ),
				'slug'  => 'black',
				'color' => '#303030',
			),
		),
		'editor-font-sizes'               => array(
			array(
				'name' => __( 'Small', CHILD_THEME_TEXT_DOMAIN ),
				'slug' => 'small',
				'size' => 14,
			),
			array(
				'name' => __( 'Normal', CHILD_THEME_TEXT_DOMAIN ),
				'slug' => 'normal',
				'size' => 18,
			),
			array(
				'name' => __( 'Large', CHILD_THEME_TEXT_DOMAIN ),
				'slug' => 'large',
				'size' => 24,
			),
			array(
				'name' => __( 'Largest', CHILD_THEME_TEXT_DOMAIN ),
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
	unregister_sidebar( 'sidebar-alt' );
}

add_action( 'genesis_site_title', 'the_custom_logo', 0 );

add_action( 'genesis_theme_settings_metaboxes', __NAMESPACE__ . '\remove_metaboxes' );
/**
 * Removes output of unused admin settings metaboxes.
 *
 * @since 1.0.0
 *
 * @param string $_genesis_admin_settings The admin screen to remove meta boxes from.
 */
function remove_metaboxes( $_genesis_admin_settings ) {
	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_admin_settings, 'main' );
	remove_meta_box( 'genesis-theme-settings-blogpage', $_genesis_admin_settings, 'main' );
	remove_meta_box( 'genesis-theme-settings-adsense', $_genesis_admin_settings, 'main' );
}

/**
 * Defines responsive menu settings.
 *
 * @since 1.0.0
 */
function genesis_sample_responsive_menu_settings() {
	$settings = array(
		'mainMenu'         => __( 'Menu', CHILD_THEME_TEXT_DOMAIN ),
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Submenu', CHILD_THEME_TEXT_DOMAIN ),
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
 * Adds Gutenberg features.
 *
 * @since 1.0.0
 */
function genesis_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	include_once CHILD_DIR . '/includes/components/gutenberg/init.php';
}

add_filter( 'body_class', __NAMESPACE__ . '\add_page_body_class' );
/**
 * Adds body class on pages.
 *
 * @param array $classes Body classes.
 *
 * return array Body classes.
 */
function add_page_body_class( $classes ) {
	if ( is_page() ) {
		global $post;

		$classes[] = $post->post_name . '-page';
	}

	return $classes;
}
