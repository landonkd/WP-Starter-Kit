<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ivy-starter-theme
 */

get_header(); ?>

	<div class="wrap">

	<main id="primary" class="site-main">

		<div class="entry-content">

		<?php
		if ( have_posts() ) : ?>

			<header class="entry-header alignfull">
				<div class="entry-header__inner-container">
					<h1 class="page-title">Search Results</h1>
					<p class="has-large-font-size">for <strong><?php echo get_search_query(); ?></strong></p>
				</div><!-- .entry-header__inner-container -->
			</header><!-- .entry-header -->

			<?php get_search_form(); ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template/parts/content', 'search' );

			endwhile;

			numbered_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div><!-- .entry-content -->

		</main><!-- #primary -->

	</div><!-- .wrap -->

<?php
get_footer();
