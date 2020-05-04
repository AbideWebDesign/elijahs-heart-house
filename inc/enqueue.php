<?php
/**
 * ehh enqueue scripts
 *
 * @package ehh
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'ehh_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function ehh_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'ehh-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );
		
		wp_enqueue_style( 'ehh-font-sans', 'https://use.typekit.net/njo8rca.css', array() );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'ehh-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
	}
} // endif function_exists( 'ehh_scripts' ).

add_action( 'wp_enqueue_scripts', 'ehh_scripts' );
