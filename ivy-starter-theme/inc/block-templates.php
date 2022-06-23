<?php
/**
 * Block template for posts
 * @link https://www.billerickson.net/gutenberg-block-templates/
 * @link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-templates/
 *
*/
function ivy_post_block_template() {

  $post_type_object = get_post_type_object( 'post' );
  $post_type_object->template = array(
    array( 'core/cover', array(
        'lock' => array(
          'move' => true,
          'remove' => true,
        ),
        'useFeaturedImage' => true,
        'dimRatio' => 50,
        'overlayColor' => 'primary',
      ),
      array( array( 'core/paragraph', array(
          'align' => 'center',
          'fontSize' => 'large',
          'placeholder' => 'Locked block within block template'
        )
      )),
    ),
    array( 'core/paragraph' ),
  );
}
add_action( 'init', 'ivy_post_block_template' );