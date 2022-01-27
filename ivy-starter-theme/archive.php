<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</div><!-- .entry-header__inner-container -->
			</header><!-- .entry-header -->

			<div class="post-container">
				
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
						* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

			?></div><!-- .post-container --><?php
			numbered_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div><!-- .entry-content -->

	</main><!-- #primary -->

</div><!-- .wrap -->

<?php
get_footer();
