<?php
/**
 * Theme basic setup
 *
 * @package ehh
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'ehh_setup' );

if ( ! function_exists( 'ehh_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ehh_setup() {


		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'ehh' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		
	}
}

add_image_size('Side Cover', 1067, 1600, true);

add_filter( 'excerpt_more', 'ehh_custom_excerpt_more' );

if ( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

if ( ! function_exists( 'ehh_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function ehh_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}

add_filter( 'wp_trim_excerpt', 'ehh_all_excerpts_get_more_link' );

if ( ! function_exists( 'ehh_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function ehh_all_excerpts_get_more_link( $post_excerpt ) {
		if ( ! is_admin() ) {
			$post_excerpt = $post_excerpt . ' [...]<p><a class="btn btn-secondary ehh-read-more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read More...',
			'ehh' ) . '</a></p>';
		}
		return $post_excerpt;
	}
}

/*
 * Admin bar customizations
 *
 */
function admin_bar_render() {
	
    global $wp_admin_bar;
	$wp_admin_bar->remove_menu('customize');
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_menu('new-post');
    $wp_admin_bar->remove_menu('search');
    $wp_admin_bar->remove_menu('themes');
    $wp_admin_bar->remove_menu('widgets');
    $wp_admin_bar->remove_node('updates');
    $wp_admin_bar->remove_menu('searchwp');
    $wp_admin_bar->remove_menu('delete-cache');
	$wp_admin_bar->remove_menu('litespeed-menu');
	
}
add_action( 'wp_before_admin_bar_render', 'admin_bar_render' );

/*
 * Remove unused dashboard widgets
 *
 */
function remove_dashboard_widgets() {
	
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);

}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

/*
 * Hide admin notifications for non-admins
 *
 */
function hide_update_msg_non_admins(){
	
	if ( !current_user_can( 'manage_options' ) ) { // non-admin users
    	
    	echo '<style>#setting-error-tgmpa>.updated settings-error notice is-dismissible, .update-nag, .updated { display: none; }</style>';
        
	}
}
add_action( 'admin_head', 'hide_update_msg_non_admins');

/*
 * Add custom favicon to admin pages
 *
 */
function add_login_favicon() {
	
	$favicon_url = get_stylesheet_directory_uri() . '/favicon.png';

	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
	
}
add_action('login_head', 'add_login_favicon');
add_action('admin_head', 'add_login_favicon');
add_action('wp_head', 'add_login_favicon');

// Bootstrap styles
add_filter( 'gform_field_content', 'bootstrap_styles_for_gravityforms_fields', 10, 5 );

function bootstrap_styles_for_gravityforms_fields($content, $field, $value, $lead_id, $form_id){

	if ( !is_admin() ) {
		
		// Currently only applies to most common field types, but could be expanded.
	
		if ( $field["type"] != 'hidden' && $field["type"] != 'list' && $field["type"] != 'multiselect' && $field["type"] != 'checkbox' && $field["type"] != 'fileupload' && $field["type"] != 'date' && $field["type"] != 'html' && $field["type"] != 'address' ) {
			
			$content = str_replace('class=\'medium', 'class=\'form-control medium', $content);
		
		}
	
		if ( $field["type"] == 'name' || $field["type"] == 'address' ) {
			
			$content = str_replace('<input ', '<input class=\'form-control\' ', $content);
		
		}
	
		if ( $field["type"] == 'textarea' ) {
			
			$content = str_replace('class=\'textarea', 'class=\'form-control textarea', $content);
		
		}
	
		if ( $field["type"] == 'checkbox' ) {
			
			$content = str_replace('li class=\'', 'li class=\'form-check ', $content);
			$content = str_replace('<input ', '<input class="custom-control-input" style=\'margin-top:-2px\' ', $content);
			
		}
	
		if ( $field["type"] == 'select' ) {
			
			$content = str_replace('large gfield_select', 'custom-select custom-select-lg', $content);
		
		}
		
		if ( $field["type"] == 'product' ) {
	
			$content = str_replace("<div class='ginput_container ginput_container_product_price'>", '', $content);
			$content = str_replace('</div>', '', $content);
		}
		
		if ( $field["type"] == 'radio' ) {
			
			$content = str_replace('li class=\'', 'li class=\'radio ', $content);
			$content = str_replace('<input ', '<input style=\'margin-left:1px;\' ', $content);
		
		}
		
		if ($field["type"] == 'password' ) {

			$content = str_replace("class='form-control medium'", '', $content);
			
		}
	
	}

	return $content;

} 

// End bootstrap_styles_for_gravityforms_fields()
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );

function form_submit_button($button, $form){

    return "<button class='button btn btn-primary' id='gform_submit_button_{$form["id"]}'><span>{$form["button"]["text"]}</span></button>";

}

// Edit gravity form field containers
add_filter( 'gform_field_container', 'add_bootstrap_container_class', 10, 6 );

function add_bootstrap_container_class( $field_container, $field, $form, $css_class, $style, $field_content ) {
	
	$id = $field->id;
	
	$field_id = is_admin() || empty( $form ) ? "field_{$id}" : 'field_' . $form['id'] . "_$id";
	
	if ( !is_admin() ) {

		if ( $field->type == 'product' && $field->inputType != 'calculation' && $field->inputType != 'singleproduct' ) {
			
			// Setup monthly post input for Amor 365
			if ( $form['id'] == 20 ) {
				
				return '<li id="' . $field_id . '" class="' . $css_class . '"><div id="' . $field_id . '" class="' . $css_class . ' input-group input-group-lg"><div class="input-group-prepend"><span class="input-group-text">$</span></div>{FIELD_CONTENT}<span id="post-amount" class="postinput">USD/MONTH</span></div></li>';


			} else {
				
				return '<li id="' . $field_id . '" class="' . $css_class . '"><div id="' . $field_id . '" class="' . $css_class . ' input-group input-group-lg"><div class="input-group-prepend"><span class="input-group-text">$</span></div>{FIELD_CONTENT}<span id="post-amount" class="postinput">USD</span></div></li>';

			}
			
		} else if ( $field->type == 'checkbox' ) {
			
			return '<li id="' . $field_id . '" class="' . $css_class . '"><div class="custom-control custom-checkbox">{FIELD_CONTENT}</div></li>';
		
		} else {
			
			return '<li id="' . $field_id . '" class="' . $css_class . ' form-group">{FIELD_CONTENT}</li>';
			
		}
		
	} else {
		
		return '<li id="' . $field_id . '" class="' . $css_class . ' form-group">{FIELD_CONTENT}</li>';
		
	}
}
// Change spinner
add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 );

function spinner_url( $image_src, $form ) {
    return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';

}