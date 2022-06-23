<?php
/**
 * ivy-starter-theme functions and definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package ivy-starter-theme
 * @since      2.0.0
 * @copyright  Copyright (c) 2020, Landon Dorrier
 * @license    GPL-2.0+
 */

if ( ! function_exists( 'ivy_starter_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ivy_starter_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ivy-starter-theme, use a find and replace
		 * to change 'ivy-starter-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ivy-starter-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-primary' => esc_html__( 'Primary', 'ivy-starter-theme' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		add_editor_style( 'css/scss/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'ivy_starter_theme_setup' );


/**
 * Disable the Block Directory
 * This prevents users from installing unknown/untested blocks from the directory introduced in WP 5.5
 */
add_action( 'admin_init', function() {
	remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
});


/**
 * Make 'private' pages selectable as 'Parent' pages
 *
 */
add_filter( 'rest_page_query', 'test_rest_page_query', 10, 2);
function test_rest_page_query( $args, $request ) {
    // please add your own logic such as screen id check logic
    $args['post_status'] = array( 'publish', 'private' );
    return $args;
}


/**
 * Register External Fonts
 */
function ivy_starter_theme_fonts_url() {
	return false;
}


/**
 * Enqueue editor scripts and styles.
 *
 */
function ivy_starter_theme_editor_scripts() {
	
	//wp_enqueue_style( 'ivy-starter-theme-fonts', ivy_starter_theme_fonts_url() );

	wp_enqueue_script( 'ivy-starter-theme-editor', get_template_directory_uri() . '/js/editor.js', array( 'wp-blocks', 'wp-dom' ), filemtime( get_template_directory() . '/js/editor.js' ), true );
}
add_action( 'enqueue_block_editor_assets', 'ivy_starter_theme_editor_scripts' );


/**
 * Enqueue scripts and styles.
 */
function ivy_starter_theme_scripts() {

	//wp_enqueue_style( 'ivy-starter-theme-fonts', ivy_starter_theme_fonts_url() );
	
	wp_enqueue_style( 'ivy-starter-theme-style', get_template_directory_uri() . '/css/scss/main.css', array(), filemtime( get_template_directory() . '/css/scss/main.css' ) );

	wp_enqueue_style( 'animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css' );

	/* VUE.JS
	wp_enqueue_script( 'vue-js', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js', array(), '', true );
	*/
	
	wp_enqueue_script( 'ivy-starter-theme-script', get_template_directory_uri() . '/js/theme.js', array(), filemtime( get_template_directory() . '/js/theme.js' ), true );

	wp_enqueue_script( 'ivy-starter-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ivy-starter-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	/* Disable Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}*/
}
add_action( 'wp_enqueue_scripts', 'ivy_starter_theme_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Customize the WP Login screen
 */
require get_template_directory() . '/inc/login-logo.php';

/**
 * Advanced Custom Fields - theme options page, register blocks, etc.
 */
require get_template_directory() . '/inc/acf.php';

/**
 * Helper Functions
 */
require get_template_directory() . '/inc/helper-functions.php';

/**
 * Media - such as image sizes
 */
require get_template_directory() . '/inc/media.php';

/**
 * Block Patterns
 */
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Block Templates
 */
require get_template_directory() . '/inc/block-templates.php';

/**
 * WordPress Cleanup
 */
require get_template_directory() . '/inc/wordpress-cleanup.php';