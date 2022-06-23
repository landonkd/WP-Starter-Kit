<?php
/**
 * WordPress Cleanup
 * 
 * Remove WordPress bloat, disable updates, etc.
 *
 * @package      IvyStarter
 * @author       Landon Dorrier
 * @since        2.0.0
 * @license      GPL-2.0+
 **/


/**
 * Disable Core, Theme, and Plugin update notifications
 * 
 * Uses ACF Options page
 */
$updates = get_field('update_notifications', 'option');
$core = $updates['core'];
$theme = $updates['theme'];
$plugin = $updates['plugin'];

// Disable the wordpress core update notifications
if (!$core) :
	add_action( 'after_setup_theme', 'remove_core_updates' );

	function remove_core_updates() {
		if ( ! current_user_can( 'update_core' ) ) {
			return;
		}
		//fadd_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
		add_filter( 'pre_option_update_core', '__return_null' );
		add_filter( 'pre_site_transient_update_core', '__return_null' );
	}
endif;

// Disable the wordpress theme update notifications
if (!$theme) :
	remove_action( 'load-update-core.php', 'wp_update_themes' );
	add_filter( 'pre_site_transient_update_themes', '__return_null' );
endif;

// Disable the wordpress plugin update notifications.
if (!$plugin) :
	remove_action( 'load-update-core.php', 'wp_update_plugins' );
	add_filter( 'pre_site_transient_update_plugins', '__return_null' );
endif;


/**
 * Remove unwanted WP Dashboard menu items 
 */
function remove_menus(){
	remove_menu_page( 'edit-comments.php' ); //Comments
	//remove_menu_page( 'edit.php' ); //Posts
}
add_action( 'admin_menu', 'remove_menus' );


/**
 * Disable AUTOMATIC updates for plugins and themes 
 */
add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );


/**
 * Disable Autosave in WP Editor
 */ 
function disable_autosave() {
	wp_deregister_script( 'autosave' );
}
add_action( 'admin_init', 'disable_autosave' );


/**
 * Disable fullscreen editor view by default
 */ 
if (is_admin()) { 
	function ivy_disable_editor_fullscreen_by_default() {
	    $script = "window.onload = function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } }";
		wp_add_inline_script( 'wp-blocks', $script );
	}
	add_action( 'enqueue_block_editor_assets', 'ivy_disable_editor_fullscreen_by_default' );
}


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