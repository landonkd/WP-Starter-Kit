<?php
/**
 * Plugin Name: Theme Functionality
 * Description: This contains all of the functions that are directly connected to this theme.
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
 * @package    ThemeFunctionality
 * @since      1.0.0
 * @copyright  Copyright (c) 2019, Landon Dorrier
 * @license    GPL-2.0+
 */


if ( ! function_exists( 'theme_functionality_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function theme_functionality_setup() {
		
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
					'size'      => 16,
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
add_action( 'after_setup_theme', 'theme_functionality_setup' );


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
 * Enqueue scripts and styles.
 */
function theme_scripts() {
	
	wp_enqueue_style( 'theme-style', get_template_directory_uri(). '/css/main.css' );
	
	wp_enqueue_script( 'theme-js', get_template_directory_uri(). '/js/theme.js', array(), false, true );

}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


/**
 * Set the content width wider in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_wider_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'theme_wider_content_width', 768 );
}
add_action( 'after_setup_theme', 'theme_wider_content_width', 0 );


/**
 * Custom WP Login Logo
 */
function theme_login_logo() { ?>
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
add_action( 'login_enqueue_scripts', 'theme_login_logo' );

function theme_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'theme_login_logo_url' );

function theme_login_logo_url_title() {
    return 'Organization Name';
}
add_filter( 'login_headertitle', 'theme_login_logo_url_title' );


/**
 * Filter the excerpt length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function theme_short_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'theme_short_excerpt_length', 999 );


/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function theme_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'theme_excerpt_more' );


/**
 * Custom Image Sizes
 */
//add_image_size( 'medium', 960, 540, true ); // width, height, crop
