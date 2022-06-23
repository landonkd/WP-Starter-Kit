<?php
/**
 * Core Functionality Plugin
 * 
 * @package    CoreFunctionality
 * @since      2.0.0
 * @copyright  Copyright (c) 2020, Landon Dorrier
 * @license    GPL-2.0+
 */

/**
 * Alert Banner
 *
 * This file registers the alert banner custom post type
 * and setups the various functions and items it uses.
 *
 * @since 1.0.0
 */
class IVY_Alert_Banner {

	/**
	 * Initialize all the things
	 *
	 * @since 1.0.0
	 */
	function __construct() {
		
		// Actions
		add_action( 'init', array( $this, 'register_cpt' ) );

	}

	/**
	 * Register the custom post type
	 *
	 * @since 1.0.0
	 */
	function register_cpt() {

		$labels = array( 
			'name' => _x('Alert Banner', 'post type general name'),
            'singular_name' => _x('Alert Banner', 'post type singular name'),
            'add_new' => _x('Add New', 'Alert Banner item'),
            'add_new_item' => __('Add New Alert Banner'),
            'edit_item' => __('Edit Alert Banner'),
            'new_item' => __('New Alert Banner'),
            'all_items' => __('All Alert Banners'),
            'view_item' => __('View Alert Banner'),
            'search_items' => __('Search Alert Banner'),
            'not_found' =>  __('Nothing found'),
            'not_found_in_trash' => __('Nothing found in Trash'),
            'parent_item_colon' => ''
		);

		$args = array( 
			'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'query_var'          => true,
            'rewrite'            => true,
            'capability_type'    => 'post',
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title'),
            'has_archive'        => false,
			'menu_icon'          => 'dashicons-megaphone', // https://developer.wordpress.org/resource/dashicons/
		);

		register_post_type( 'alert_banner', $args );

	}
	
}
new IVY_Alert_Banner();