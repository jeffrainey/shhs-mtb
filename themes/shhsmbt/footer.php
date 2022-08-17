<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shhsmbt
 */

?>
        <footer id="footer" class="mt-20">
            <div class="footer-wrap">
                <div class="col col-1">
                    <h2>Our Facebook</h2>
                    <? //fb section appearance depends on customizer selection
                        if ( get_theme_mod('facebook') && ( get_theme_mod('facebook-footer') == 1 ) ){
                            ?>
                            <div class="fb-page" data-href="<? echo get_theme_mod('facebook') ?>" data-lazy="true" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
                            <?
                        }
                    ?>
                </div>
                <div class="col col-2">
                    <h2>About Us</h2>
                    <? //fb section appearance depends on customizer selection
                        if ( get_theme_mod('facebook') && ( get_theme_mod('facebook-footer') == 2 ) ){
                            ?>
                            <div class="fb-page" data-href="<? echo get_theme_mod('facebook') ?>" data-lazy="true" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
                            <?
                        }
                    ?>
                    <?php if( get_theme_mod('footer-about')) : ?>
                        <p><?php echo get_theme_mod('footer-about') ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="pz-fanfare">
                <img src="<? echo get_stylesheet_directory_uri(); ?>/dist/images/PZ_Logo.png">
            </div>
        </footer><!-- #footer -->
    </div><!-- #page -->
    <?php wp_footer(); ?>
</body>
</html>

