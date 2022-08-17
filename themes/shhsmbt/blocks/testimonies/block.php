<div class="testimonials">
        <?php
        if (block_rows('testimony')) :

            while (block_rows('testimony')) :
                block_row('testimony');
        ?>
        <div class="testimonials-container">
            <div class="testimony">
                <div class="testimony-image">
                    <img src="<?php block_sub_field('image'); ?>">
                </div>
                <div class="testimony-body">
                    <h2 class="highlight"><?php block_sub_field('highlight'); ?></h2>
                    <p class="description"><?php block_sub_field('description'); ?></p>
                    <p class="author">- <?php block_sub_field('author'); ?></p>
                </div>
            </div>

            <hr class="testimony-sep">
        </div>
    <?php endwhile;
    endif;

    reset_block_rows('testimony');
    ?>
</div>