<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gutenbergtheme
 */

if ( !empty( get_the_content() ) ) {
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
			the_post_thumbnail();

			if(get_the_post_thumbnail()) {
				the_title('<h1>', '</h1>');
			}
			
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gutenbergtheme' ),
				'after'  => '</div>',
			) );

		?>
</article><!-- #post-<?php the_ID(); ?> -->
	<?php }

