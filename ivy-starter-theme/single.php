<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ivy-starter-theme
 */

get_header(); ?>

	<div class="wrap">

		<main id="primary" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				// if a single blog post
				if ( get_post_type() == 'post' ) :
					get_template_part( 'template-parts/content-post-single' );
					
				// else
				else :
					get_template_part( 'template-parts/content', get_post_type() );
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #primary -->

	</div><!-- .wrap -->

<?php
get_footer();
