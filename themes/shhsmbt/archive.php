<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shhsmbt
 */

get_header(); ?>

	<main id="primary" class="site-main blog-posts">
		<div class="entry-content">

			<div class="articles">
				<div class="template-posts">
					<?php
                    the_archive_title( '<h1>', '</h1>' );

					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							$img = get_the_post_thumbnail_url();
                            ?>
                            <div class="large-tiles">
                                <a href="<?php echo get_the_permalink() ?>">
									<?php the_post_thumbnail(''); ?>
                                    <div class="content">
                                        <p><?php echo get_the_category()[0]->name; ?></p>
										<?php the_title('<h2>', '</h2>'); ?>
                                        <p>
											<?php echo wp_strip_all_tags(substr(get_the_content(), 0, 200)); ?>
                                            ...
                                        </p>
                                        <p> Posted <?php echo get_the_date( 'M j, Y' ); ?> |
                                            By <?php echo get_the_author(); ?></p>
                                    </div>
                                </a>
                            </div>

						<?php
						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				</div>
			</div>
			<aside>
				<?php
					dynamic_sidebar( 'primary' );
				?>
			</aside>
		</div>


	</main><!-- #primary -->

<?php
get_footer();

