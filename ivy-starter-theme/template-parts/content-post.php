<?php
/**
 * Template part for displaying page content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tnc
 */

?>

<article id="post-<?php the_ID(); ?>" class="post">
	
	<?php
	if ( has_post_thumbnail() && get_the_post_thumbnail() !== '' ) : ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<div class="post-image"><?php the_post_thumbnail('featured-sm'); ?></div>
		</a>
	<?php endif; ?>

	<div class="post-meta">
		<?php
		$categories = get_the_category();
		$separator = ' &middot; ';
		$output = '';
		if ( ! empty( $categories ) ) {
			foreach( $categories as $category ) {

				$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;

			}
		}
		?>
		<div class="category"><?php echo trim( $output, $separator ); ?></div>
	</div><!-- .post-meta -->

	<h2 class="post-title">
		<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
	</h2>

	<p><?php the_excerpt(); ?></p>

	<div class="post-meta">
		<div class="date-posted"><?php the_time('F j, Y') ?></div>
	</div><!-- .post-meta -->
	
</article><!-- #post-<?php the_ID(); ?> -->




