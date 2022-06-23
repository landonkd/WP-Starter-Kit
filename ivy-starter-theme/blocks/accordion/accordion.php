<?php
/**
 * Block Name: Accordion
 *
 * This is the template that inserts an accordion.
 */

global $post;

// create id attribute for specific styling
$id = 'accordion-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF
$title = get_field('title');
$block_template = array(
    array( 'core/paragraph', array(
        'content' => 'Accordion panel content goes here. <br>(Edit Accordion panel content in Preview mode. Edit Accordion Title in Edit mode or in sidebar Block Settings.)',
    ) )
);

?>

<div id="<?php echo $id; ?>" class="accordion-block">
	
	<button class="accordion" tabindex="0" onclick="toggleAccordion(event)" aria-expanded="false">
		<?php echo $title; ?>
		<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
			<path d="M0 0h24v24H0z" fill="none"/>
			<path class="fill-path" d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z" fill="#757b88"/>
		</svg>
	</button>
	
	<div class="panel">
		<?php echo '<InnerBlocks template="' . esc_attr( wp_json_encode( $block_template ) ) . '" />'; ?>
	</div>
		
</div>
