<?php
/**
 * Block Name: Callout
 *
 * This is the template that inserts a callout.
 */

global $post;

// create id attribute for specific styling
$id = 'callout-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF
//$icon = get_field('icon');
$block_template = array(
    array( 'core/paragraph', array(
        'content' => 'Start typing...',
    ) )
);
$allowed_blocks = array( 'core/paragraph' );

?>

<div id="<?php echo $id; ?>" class="callout-block <?php echo $align_class; ?>">
	
	<div class="callout-block__inner-container">
        
        <div class="icon">
            <svg aria-hidden="true" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" color="#000"><path d="M13 7.5a1 1 0 11-2 0 1 1 0 012 0zm-3 3.75a.75.75 0 01.75-.75h1.5a.75.75 0 01.75.75v4.25h.75a.75.75 0 010 1.5h-3a.75.75 0 010-1.5h.75V12h-.75a.75.75 0 01-.75-.75z"></path><path fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z"></path></svg>
        </div><!-- .icon -->

        <div class="message">
            <?php echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $block_template ) ) . '" />'; ?>
        </div><!-- .message -->
		
	</div><!-- .callount__inner-container -->
		
</div><!-- .callout-block -->