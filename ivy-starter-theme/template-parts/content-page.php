<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ivy-starter-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<?php 
        if ( ivy_page_title() ) : ?>
        
            <header class="entry-header alignfull">
                <div class="entry-header__inner-container">
					<?php 
					if ( has_post_thumbnail() ) :
						the_post_thumbnail();
					endif;
					echo ivy_page_title(); ?>
                </div><!-- .entry-header__inner-container -->
            </header><!-- .entry-header -->

        <?php endif;

		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ivy-starter-theme' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
