<?php
/**
 * Block Name: Card Container
 *
 * This is the template that inserts a container for Card blocks.
 */

global $post;

// create id attribute for specific styling
$id = 'card-container-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF
$count = get_field('columns');
$style = get_field('select_style');

$block_template = array(
    array( 'acf/card' )
);

// DON'T WORK
// 'core/reusableBlock'
// 'core/block'
$allowed_blocks = array( 'acf/card', 'core/paragraph', 'core/block' );
?>

<div id="<?php echo $id; ?>" class="card-container <?php echo $style; echo ' col-'.$count.''; echo ' '.$align_class; ?>">
    
    <?php echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $block_template ) ) . '" />'; ?>

    <?php //echo '<InnerBlocks template="' . esc_attr( wp_json_encode( $block_template ) ) . '" />'; ?>
		
</div><!-- .card-container -->