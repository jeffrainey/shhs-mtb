<?php

?>
<!--<img src="--><?php //block_field('background');  ?><!--">-->
<div style="background-image: url(<?php block_field('background') ?>)">
    <?php if( get_theme_mod('address_street') ) : ?>
        <h>Address</h>
        <p><?php echo get_theme_mod('address_street') . ', ' . get_theme_mod('address_city') . ', ' . get_theme_mod('address_state') .' ' . get_theme_mod('address_zip') ?></p>
    <?php endif;

    if( get_theme_mod('hours_weekday') ) : ?>
        <h>Hours</h>
        <p><?php echo get_theme_mod('hours_weekday') . ' | ' . get_theme_mod('hours_weekend') ?></p>
    <?php endif;?>

    <div>
        <?php block_field('instafeed'); ?>
    </div>
</div>