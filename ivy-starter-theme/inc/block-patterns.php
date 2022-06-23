<?php
/**
 * Block Patterns
 * 
 * Documentation:
 * https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/
 * 
 * Escape Strings:
 * https://www.freeformatter.com/json-escape.html
 * 
 * Then Replace "\/" with "/"
 *
 * @package      IvyStarter
 * @author       Landon Dorrier
 * @since        1.0.0
 * @license      GPL-2.0+
 **/


/**
 * Remove Default Block Patterns
 */
remove_theme_support( 'core-block-patterns' );


/**
 * Register Custom Block Patterns
 */
function ivy_register_block_patterns() {

    register_block_pattern(
        'ivy/two-buttons-centered',
        array(
            'title'       => __( 'Two buttons centered', 'ivy' ),
            'description' => _x( 'Two horizontal buttons, the left button is filled in, and the right button is outlined.', 'Block pattern description', 'ivy' ),
            'categories'  => array( 'buttons' ),
            'content'     => "<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html__( 'Button One', 'ivy' ) . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\">" . esc_html__( 'Button Two', 'ivy' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->",
        )
    );

    register_block_pattern(
        'ivy/three-equal-height-columns-background',
        array(
            'title'       => __( 'Three equal height columns with background color', 'ivy' ),
            'description' => _x( 'Three columns that have a background color and are equal height regardless of content.', 'Block pattern description', 'ivy' ),
            'categories'  => array( 'design' ),
            'content'     => "<!-- wp:columns {\"className\":\"is-style-equal-height\"} -->\n<div class=\"wp-block-columns is-style-equal-height\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group {\"backgroundColor\":\"light-grey\"} -->\n<div class=\"wp-block-group has-light-grey-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"level\":3} -->\n<h3>" . esc_html__( 'Column', 'ivy' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"className\":\"is-style-default\"} -->\n<p class=\"is-style-default\">" . esc_html__( 'Painting should do one thing. It should put happiness in your heart. I sincerely wish for you every possible joy life could bring.', 'ivy' ) . "</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group {\"backgroundColor\":\"light-grey\"} -->\n<div class=\"wp-block-group has-light-grey-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"level\":3} -->\n<h3>" . esc_html__( 'Column', 'ivy' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>" . esc_html__( 'You have to make almighty decisions when you\'re the creator. I thought today we would do a happy little picture.', 'ivy' ) . "</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group {\"backgroundColor\":\"light-grey\"} -->\n<div class=\"wp-block-group has-light-grey-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"level\":3} -->\n<h3>" . esc_html__( 'Column', 'ivy' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>" . esc_html__( 'You\'re meant to have fun in life. You can create beautiful things - but you have to see them in your mind first.', 'ivy' ) . "</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
        )
    );

    register_block_pattern(
        'ivy/two-equal-height-columns-background',
        array(
            'title'       => __( 'Two equal height columns with background color', 'ivy' ),
            'description' => _x( 'Two columns that have a background color and are equal height regardless of content.', 'Block pattern description', 'ivy' ),
            'categories'  => array( 'design' ),
            'content'     => "<!-- wp:columns {\"className\":\"is-style-equal-height\"} -->\n<div class=\"wp-block-columns is-style-equal-height\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group {\"backgroundColor\":\"light-grey\"} -->\n<div class=\"wp-block-group has-light-grey-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"level\":3} -->\n<h3>" . esc_html__( 'Column', 'ivy' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"className\":\"is-style-default\"} -->\n<p class=\"is-style-default\">" . esc_html__( 'Painting should do one thing. It should put happiness in your heart. I sincerely wish for you every possible joy life could bring.', 'ivy' ) . "</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group {\"backgroundColor\":\"light-grey\"} -->\n<div class=\"wp-block-group has-light-grey-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"level\":3} -->\n<h3>" . esc_html__( 'Column', 'ivy' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>" . esc_html__( 'You\'re meant to have fun in life. You can create beautiful things - but you have to see them in your mind first. I thought today we would do a happy little picture.', 'ivy' ) . "</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n",
        )
    );

}
add_action( 'init', 'ivy_register_block_patterns' );


/**
 * Unregister Block Patterns
 */
/*function ivy_unregister_block_patterns() {
    unregister_block_pattern( 'ivy/two-buttons-centered' );
}
add_action( 'init', 'ivy_unregister_block_patterns' );*/


/**
 * Register Block Pattern Categories
 */
function ivy_register_block_pattern_categories() {
    register_block_pattern_category(
        'buttons',
        array( 'label' => __( 'Buttons', 'ivy' ) )
    );
    register_block_pattern_category(
        'design',
        array( 'label' => __( 'Design', 'ivy' ) )
    );
}
add_action( 'init', 'ivy_register_block_pattern_categories' );


/**
 * Unregister Block Pattern Categories
 */
/*function ivy_register_block_pattern_categories() {
    unregister_block_pattern_category( 'buttons' );
}
add_action( 'init', 'ivy_unregister_block_pattern_categories' );*/