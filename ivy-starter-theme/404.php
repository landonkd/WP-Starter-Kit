<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ivy-starter-theme
 */

get_header(); ?>

<div class="wrap">
	
	<main id="primary" class="site-main">

		<div class="entry-content error-404">

			<header class="entry-header alignfull">
                <div class="entry-header__inner-container">
					<h1 class="page-title">Sorry, that page wasn't found</h1>
                </div><!-- .entry-header__inner-container -->
            </header><!-- .entry-header -->

			<p class="has-large-font-size">The link you followed may be broken, or the page may have been removed.</p>


			<?php get_search_form(); ?>

		</siv><!-- .entry-content.error-404 -->

	</main><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
