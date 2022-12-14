<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package shhsmbt
 */

get_header(); ?>

	<main id="primary" class="entry-content site-main">
	<?php
	while ( have_posts() ) : the_post();
        ?>

        <?php
		get_template_part( 'template-parts/content', get_post_type() );

	endwhile; // End of the loop.
	?>

	</main><!-- #primary -->

<?php
get_footer();
