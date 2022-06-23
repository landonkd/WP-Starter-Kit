<?php
/**
 * Block Name: Card
 *
 * This is the template that inserts a card.
 */

global $post;

// create id attribute for specific styling
$id = 'cards-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF
$image = get_field('image');
$size = 'featured-sm';

$heading = get_field('heading'); // required
$excerpt = get_field('excerpt');
$link = get_field('link'); 

?>

<article id="<?php echo $id; ?>" class="card">

    <?php
    // Setup Link Data
    if( $link ): 
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
    endif; 

    // Image
    if ($image) :
        if( $link ): ?>
            <div class="post-image"><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo wp_get_attachment_image( $image, $size ); ?></a></div><?php
        else : ?>
            <div class="post-image"><?php echo wp_get_attachment_image( $image, $size ); ?></div><?php
        endif;
    endif; 

    // Heading
    if( $link ): ?>
        <h3><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo $heading; ?></a></h3><?php
    else :
        echo '<h3>'.$heading.'</h3>';
    endif; 

    // Excerpt
    if ($excerpt) : ?>
        <div class="excerpt"><?php echo $excerpt; ?></div>
    <?php endif; ?>
		
</article><!-- .card -->