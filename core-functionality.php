<?php
/**
 * Plugin Name: Core Functionality
 * Description: This contains all your site's core functionality so that it is theme independent. <strong>It should always be activated</strong>.
 * Version:     1.0
 * Author:      Landon Dorrier
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 2, as published by the
 * Free Software Foundation.  You may NOT assume that you can use any other
 * version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.
 *
 * @package    CoreFunctionality
 * @since      1.0.0
 * @copyright  Copyright (c) 2019, Landon Dorrier
 * @license    GPL-2.0+
 */


/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );


/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array  Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}


/* Remove "Category:" and "Tag:" from get_the_archive_title() */
add_filter( 'get_the_archive_title', function ($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} 
	elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} 
	elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	}
	elseif ( is_year() ) {
        $title = get_the_date( _x( 'Y', 'yearly archives date format' ) );
	}
	return $title;
});


/*******************************************
 * BEGIN ACF *
 ******************************************/

/**
 * ACF Theme Options page
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title'	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-options'
	));
}

/********************************************************************
 * ACF Blocks (PLACEHOLDER)
 *******************************************************************/
/*
function pha_register_blocks() {
	
	// check function exists.
    if( function_exists('acf_register_block') ) {
		
		// register a Properties block
		acf_register_block(array(
			'name'				=> 'properties',
			'title'				=> __('Properties'),
			'description'		=> __('A block that display your properties.'),
			'icon'				=> 'admin-multisite',
			'keywords'			=> array( 'property', 'housing', 'rentals' ),
			'mode' 				=> 'preview',
			'category'			=> 'widgets',
			'render_template'   => 'blocks/properties/properties.php',
		));
    }
}
add_action('acf/init', 'pha_register_blocks' );
*/

/********************************************************************
 * Custom Post Types
 *******************************************************************/
/**
 * Custom Post Type Taxonomy - Properties
 */
/*	
function create_properties_taxonomies() {
    register_taxonomy(
		'properties_category',
		'properties',
		array(
			'labels' => array(
				'name' => 'Properties Categories',
				'add_new_item' => 'Add New Category',
				'new_item_name' => 'New Category'
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'show_admin_column' => true,
			'hierarchical' => true,
			'show_in_rest' => true,
		)
	);
}
add_action('init', 'create_properties_taxonomies');

/**
 * Adds Custom Post Type - Properties
 */

/* 
add_action('init', 'properties_register');
function properties_register() {
	$labels = array(
		'name' => _x('Properties', 'post type general name'),
		'singular_name' => _x('Property', 'post type singular name'),
		'add_new' => _x('Add New', 'Property'),
		'add_new_item' => __('Add New Property'),
		'edit_item' => __('Edit Property'),
		'new_item' => __('New Property'),
		'all_items' => __('All Properties'),
		'view_item' => __('View Property'),
		'search_items' => __('Search Properties'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => false,
		'show_ui' => true,
		'query_var' => true,
		'show_in_nav_menus' => false,
		'hierarchical' => true,
		'menu_position' => null,
		'supports' => array('title', 'thumbnail', 'page-attributes'),
		'has_archive' => false,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-admin-multisite',
	  );  
	register_post_type( 'properties' , $args );
}
*/