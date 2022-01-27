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
	
	/*acf_add_options_page(array(
		'page_title'	=> 'Site Options',
		'menu_title'	=> 'Site Options',
		'menu_slug' 	=> 'site-options'
	));*/
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
