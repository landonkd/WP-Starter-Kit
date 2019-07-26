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


if ( ! function_exists( 'core_functionality_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function core_functionality_setup() {
		
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'css/editor-style.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small' ),
					'shortName' => __( 'S' ),
					'size'      => 14,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal' ),
					'shortName' => __( 'N' ),
					'size'      => 18,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large' ),
					'shortName' => __( 'L' ),
					'size'      => 36,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge' ),
					'shortName' => __( 'XL' ),
					'size'      => 54,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Black' ),
					'slug'  => 'black',
					'color' => '#000',
				),
				array(
					'name'  => __( 'White' ),
					'slug'  => 'white',
					'color' => '#fff',
				),
			)
		);
		
		// Disable the custom color picker
		add_theme_support( 'disable-custom-colors' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'core_functionality_setup' );


/**
 * Enque script in the WP Editor
 */
function editor_script_enqueue($hook) {
    // Only add to the post.php admin page.
    // See WP docs.
    if ('post.php' !== $hook) {
        return;
    }
    wp_enqueue_script('theme-editor-js', get_template_directory_uri() . '/js/editor.js', array(), '', true);
}
add_action('admin_enqueue_scripts', 'editor_script_enqueue');


/**
 * Set the content width wider in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function core_wider_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'core_wider_content_width', 768 );
}
add_action( 'after_setup_theme', 'core_wider_content_width', 0 );


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


/**
 * Custom Image Sizes
 */
//add_image_size( 'medium', 960, 540, true ); // width, height, crop


/**
 * Custom WP Login Logo
 */
function core_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
			height: 110px;
			width: 320px;
			background-repeat: no-repeat;
			padding-bottom: 40px;
			background-size: contain;
			margin-bottom: 40px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'core_login_logo' );

function core_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'core_login_logo_url' );

function core_login_logo_url_title() {
    return 'Organization Name';
}
add_filter( 'login_headertitle', 'core_login_logo_url_title' );


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


/**
 * Filter the excerpt length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function core_short_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'core_short_excerpt_length', 999 );


/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function core_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'core_excerpt_more' );
