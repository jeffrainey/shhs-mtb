<?php

?>
<div class="carousel" data-flickity='{"draggable": true, "prevNextButtons": false }'>
    <?php
    if (block_rows('cell')) :

        while (block_rows('cell')) :
            block_row('cell');
            ?>
            <div class="review-container carousel-cell">
                <div class="review-info__con">
                    <p class="review"> <?php block_sub_field('review') ?> </p>
                    <p class="author"> <?php block_sub_field('author') ?> </p>
                    <img src="/wp-content/themes/shhsmbt/dist/images/5star_icon.png">
                </div>
            </div>

        <?php endwhile;
    endif;

    reset_block_rows('cell');
    ?>
</div>