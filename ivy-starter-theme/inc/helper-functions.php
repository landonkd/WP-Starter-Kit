<?php

/**
 * Recursively searches content for h1 blocks.
 *
 * @link https://www.billerickson.net/building-a-header-block-in-wordpress/
 *
 * @param array $blocks
 * @return bool
 */
function has_h1_block( $blocks = array() ) {
	foreach ( $blocks as $block ) {

		if( ! isset( $block['blockName'] ) )
			continue;

		// Custom header block
		if( 'acf/header' === $block['blockName'] ) {
			return true;

		// Heading block
		} elseif( 'core/heading' === $block['blockName'] && isset( $block['attrs']['level'] ) && 1 === $block['attrs']['level'] ) {
			return true;

		// Scan inner blocks for headings
		} elseif( isset( $block['innerBlocks'] ) && !empty( $block['innerBlocks'] ) ) {
			$inner_h1 = has_h1_block( $block['innerBlocks'] );
			if( $inner_h1 )
				return true;
		}
	}
	return false;
}


/**
 * Ivy Page Title
 * Returns the <h1> Page Title only if it's not entered within the body as a block
 * 
 * @link https://www.billerickson.net/building-a-header-block-in-wordpress/
 */
function ivy_page_title() {
	global $post;
	$blocks = parse_blocks( $post->post_content );
	if ( ! has_h1_block( $blocks ) ) :
		return '<h1 class="entry-title">' . get_the_title() . '</h1>';
	else :
		return false;
	endif;
}
add_action( 'tha_entry_top', 'ivy_page_title' );


/**
 * Filter the excerpt length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function ivy_short_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'ivy_short_excerpt_length', 999 );


/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function ivy_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'ivy_excerpt_more' );


/**
 * Remove "Category:" and "Tag:" from get_the_archive_title()
 *
 */ 
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
 * Numbered Pagination
 *
 */
function numbered_pagination() {
	global $wp_query;
	$big = 999999999; // need an unlikely integer

	echo '<nav id="numbered-pagination">';
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages
	) );
	echo '</nav>';
}