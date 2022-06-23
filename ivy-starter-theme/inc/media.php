<?php

/**
 * Custom Image Sizes
 * 
 * add_image_size( 'name', value, value, true ); // width, height, crop
 */

add_filter( 'intermediate_image_sizes', function( $sizes )
{
    return array_filter( $sizes, function( $val )
    {
        return 'medium_large' !== $val; // Filter out 'medium_large'
    } );
} );

remove_image_size( '1536x1536' );
remove_image_size( '2048x2048' );

add_image_size( 'featured-sm', 480, 270, true );
