<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shhsmbt
 */

get_header(); ?>

	<main id="primary" class="site-main">
		<div class="entry-content">
		<?php
		//template_display_modules();
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.

		echo '</div>';


    echo '</main><!-- #primary -->';

get_footer();

