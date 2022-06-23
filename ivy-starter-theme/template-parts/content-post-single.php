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
	
    <div class="entry-content">

        <header class="entry-header alignfull">
            <div class="entry-header__inner-container">

                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

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
                    <div class="date-posted"><?php the_time('F j, Y') ?></div>

                </div><!-- .post-meta -->
            </div><!-- .entry-header__inner-container -->
        </header><!-- .entry-header -->

        <?php the_content(); ?>

    </div><!-- .entry-content -->
            	
</article><!-- #post-<?php the_ID(); ?> -->




