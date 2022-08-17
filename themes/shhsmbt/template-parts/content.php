<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gutenbergtheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <!-- Just grabbing the first category off of the top. -->
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			if ( has_post_thumbnail() ) :
				the_post_thumbnail('full');
			endif;
		endif;

		if ( 'post' === get_post_type() ) :
            $post_date = get_the_date( 'l, M j, Y' );
            $author = get_the_author();
            ?>
		<div class="entry-meta mt-1">
            <p>
                <span class="date">Posted <?php echo $post_date; ?></span> |
                <span class="author"> by <?php echo $author; ?> </span>
            </p>
            <p class="mt-2 mb-3">
                <a class="email-share-button"
                   href="mailto:?subject=<?php echo get_the_title(); ?>&body=<?php echo get_the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20.638" height="15.478"><path data-name="Icon awesome-envelope" d="M20.247 5.111a.243.243 0 0 1 .391.189v8.243a1.935 1.935 0 0 1-1.938 1.935H1.935A1.935 1.935 0 0 1 0 13.543V5.3a.241.241 0 0 1 .391-.189c.9.7 2.1 1.592 6.211 4.579.85.621 2.285 1.927 3.716 1.919 1.439.012 2.9-1.322 3.72-1.919 4.113-2.983 5.306-3.878 6.209-4.579Zm-9.928 5.208c.935.016 2.281-1.177 2.959-1.669 5.349-3.882 5.756-4.22 6.989-5.188a.965.965 0 0 0 .371-.762v-.765A1.935 1.935 0 0 0 18.7 0H1.935A1.935 1.935 0 0 0 0 1.935V2.7a.97.97 0 0 0 .371.762C1.6 4.426 2.011 4.768 7.36 8.65c.677.492 2.024 1.685 2.959 1.669Z" fill="#5a5c62"/></svg>
                    Share</a>

                <a class="twitter-share-button"
                   href="https://twitter.com/intent/tweet?text=<?php echo get_the_title() . '%20-%20' .  get_the_permalink(); ?>"
                   target="_blank"
                   rel="noreferrer noopener"><svg xmlns="http://www.w3.org/2000/svg" width="19.058" height="15.478"><path data-name="Icon awesome-twitter" d="M17.1 3.857c.012.169.012.339.012.508A11.037 11.037 0 0 1 6 15.478a11.038 11.038 0 0 1-6-1.753 8.08 8.08 0 0 0 .943.048 7.822 7.822 0 0 0 4.849-1.669A3.913 3.913 0 0 1 2.14 9.396a4.926 4.926 0 0 0 .738.06 4.131 4.131 0 0 0 1.028-.137A3.906 3.906 0 0 1 .774 5.49v-.049a3.934 3.934 0 0 0 1.765.5A3.912 3.912 0 0 1 1.33.713 11.1 11.1 0 0 0 9.384 4.8a4.409 4.409 0 0 1-.1-.895 3.91 3.91 0 0 1 6.76-2.672A7.69 7.69 0 0 0 18.523.29a3.9 3.9 0 0 1-1.717 2.152 7.83 7.83 0 0 0 2.249-.6A8.4 8.4 0 0 1 17.1 3.857Z" fill="#5a5c62"/></svg>
                    Tweet</a>

                <a class="facebook-share-button"
                   href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>"
                   target="_blank"
                   rel="noreferrer noopener"><svg xmlns="http://www.w3.org/2000/svg" width="15.572" height="15.478"><path data-name="Icon awesome-facebook" d="M15.572 7.786a7.786 7.786 0 1 0-9 7.692v-5.441H4.591V7.786h1.978V6.07A2.747 2.747 0 0 1 9.51 3.037a11.983 11.983 0 0 1 1.743.152v1.919h-.982a1.125 1.125 0 0 0-1.269 1.216v1.462h2.159l-.345 2.251H9.002v5.441a7.789 7.789 0 0 0 6.57-7.692Z" fill="#5a5c62"/></svg>
                    Share</a>
            </p>
		</div>
		
		<?php endif; ?>
	</header>

	<div class="entry-content">
<!--        <div class="image-feature">-->
            <?php the_post_thumbnail( 'full', 'class=image-feature' ); ?>
<!--        </div>-->
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gutenbergtheme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gutenbergtheme' ),
				'after'  => '</div>',
			) );
		?>

<!--		<div class="post-tags">-->
<!--			--><?php //$post_tags = get_the_tags();
//				if ( $post_tags ) { ?>
<!---->
<!--				<h3> Tags </h3>-->
<!---->
<!--					--><?php //foreach( $post_tags as $tag ) { ?>
<!--	-->
<!--					<div class="tag">	-->
<!--						--><?php //echo $tag->name; ?><!--  -->
<!--					</div>-->
<!---->
<!--					--><?php //}
//				} ?>
<!--		</div>-->

		<!--share article button-->
<!--		<div class="light-button-container">-->
<!--        	<a class="btn btn-transition light-btn" href="#"> Share this article </a>-->
<!--   		 </div>-->

	</div><!-- .entry-content -->



	<!-- <footer class="entry-footer">
		<?php gutenbergtheme_entry_footer(); ?>
	</footer> -->
	<!-- .entry-footer -->
</article>

<!-- related articles section -->
<?php $args = array(
    'category__in' => wp_get_post_categories( get_queried_object_id() ),
    'posts_per_page' => 3,
    'orderby'       => 'date',
    'post__not_in' => array( get_queried_object_id() )
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) : ?>
    <div class="three-col-feature">
        <h2 class="three-col-heading">
            Related Articles
        </h2>
        <div class="feature-content">

            <!-- posts loop -->
            <?php
            $i=0;
            while ( $the_query->have_posts() ) : $the_query->the_post();
                $background_img = get_the_post_thumbnail_url();
                $bg_color[0] = '#ff7800';
                $bg_color[1] = '#E61E49';
                $bg_color[2] = '#8C408E';
                ?>
                <a
                    href="<?php echo get_the_permalink() ?>"
                    class="column"
                    <?php echo ( $background_img )
                        ? 'style="background: url(' . get_the_post_thumbnail_url() . ')"'
                        : 'style="background: ' . $bg_color[$i] . '"';
                    ?>
                >
                        <?php the_title( '<h3>', '</h3>' ); ?>
                </a>
            <?php
            $i++;
            endwhile; ?>
            <!-- end loop -->
        </div>
    </div>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>
<!-- end of articles section -->
