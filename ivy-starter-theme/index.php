<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>

				<header class="entry-header alignfull">
					<div class="entry-header__inner-container">
						<?php single_post_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</div><!-- .entry-header__inner-container -->
				</header><!-- .entry-header -->

			<?php 
			else : 
				echo ivy_page_title();
			endif; ?>

			
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
