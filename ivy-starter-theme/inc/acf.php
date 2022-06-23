<?php
/**
 * Advanced Custom Fields Customizations
 *
 * @package      IvyStarter
 * @author       Landon Dorrier
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

/**
 * ACF Theme Options page
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Header Settings',
	// 	'menu_title'	=> 'Header',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
}

/**
 * ACF Register Blocks
 */
function ivy_register_blocks() {
	
	// check function exists.
    if( function_exists('acf_register_block') ) {
		
		// register an Accordion block
		acf_register_block(array(
			'name'				=> 'accordion',
			'title'				=> __('Accordion'),
			'description'		=> __('A block that displays an expand/collapse accordion.'),
			'icon'				=> 'sort',
			'keywords'			=> array( 'accordion', 'expand', 'collapse' ),
			'mode' 				=> 'preview',
			'category'			=> 'widgets',
			'supports' 			=> array( 
				'align' => false,
				'jsx' => true,
			),
			'render_template'   => 'blocks/accordion/accordion.php',
		));

		// register a Callout block
		acf_register_block(array(
			'name'				=> 'callout',
			'title'				=> __('Callout'),
			'description'		=> __('A block that displays a callout.'),
			'icon'				=> 'info',
			'keywords'			=> array( 'callout', 'notice', 'important' ),
			'mode' 				=> 'preview',
			'category'			=> 'widgets',
			'supports' 			=> array( 
				'align' => array( 'wide' ),
				'jsx' => true,
			),
			'render_template'   => 'blocks/callout/callout.php',
		));

		// register a Card block
		acf_register_block(array(
			'parent' 			=> [ 'acf/card-container' ],
			'name'				=> 'card',
			'title'				=> __('Card'),
			'description'		=> __('A block that displays a card.'),
			'icon'				=> 'cover-image',
			'keywords'			=> array( 'card', 'feature', 'box' ),
			'mode' 				=> 'preview',
			'category'			=> 'widgets',
			'supports' 			=> array( 
				'align' => false,
				'jsx' => true,
			),
			'render_template'   => 'blocks/card/card.php',
		));

		// register a Card Container block
		acf_register_block(array(
			'name'				=> 'card-container',
			'title'				=> __('Card Container'),
			'description'		=> __('A block that wraps Card blocks in a container.'),
			'icon'				=> 'grid-view',
			'keywords'			=> array( 'container', 'cards', 'holder' ),
			'mode' 				=> 'preview',
			'category'			=> 'widgets',
			'supports' 			=> array( 
				'align' => array( 'wide' ),
				'jsx' => true,
			),
			'render_template'   => 'blocks/card-container/card-container.php',
		));

	}
}
add_action('acf/init', 'ivy_register_blocks' );
