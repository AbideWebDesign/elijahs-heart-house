<?php 
	

add_action('acf/init', 'ehh_acf_init');

function ehh_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a banner block
		acf_register_block(array(
			'name'				=> 'banner',
			'title'				=> __('Banner'),
			'description'		=> __(''),
			'render_callback'	=> 'ehh_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'align-left',
		));
		
		// register a text block
		acf_register_block(array(
			'name'				=> 'text',
			'title'				=> __('Text'),
			'description'		=> __(''),
			'render_callback'	=> 'ehh_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'align-center',
		));
		
		// register a cta block
		acf_register_block(array(
			'name'				=> 'cta',
			'title'				=> __('Call to Action'),
			'description'		=> __(''),
			'render_callback'	=> 'ehh_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'megaphone',
		));
		
		// register a card block
		acf_register_block(array(
			'name'				=> 'card',
			'title'				=> __('Card'),
			'description'		=> __(''),
			'render_callback'	=> 'ehh_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'media-document',
		));
	}
}

function ehh_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/blocks" folder
	if( file_exists( get_theme_file_path("/template-parts/blocks/content-{$slug}.php") ) ) {
		
		include( get_theme_file_path("/template-parts/blocks/content-{$slug}.php") );
	
	}
}

add_filter( 'allowed_block_types', 'ehh_allowed_block_types' );
 
function ehh_allowed_block_types( $allowed_blocks ) {

	return array(
		'acf/banner',
		'acf/text',
		'acf/cta',
		'acf/card',
	);
 
}