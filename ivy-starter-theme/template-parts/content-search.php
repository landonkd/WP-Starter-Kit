<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ivy-starter-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<div class="entry-meta">
			<?php if ( 'post' === get_post_type() ) :
				//ivy_starter_theme_posted_on();
			endif; 
			echo '<p class="permalink"><a href="' . esc_url( get_the_permalink() ) . '">' . esc_url( get_the_permalink() ) . '</a></p>'; ?>
		</div><!-- .entry-meta -->
	</header>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-<?php the_ID(); ?> -->
