<style>
    .boxgrid-grid .darkblue {
        background: #406E91;
    }
    .boxgrid-grid .lightblue {
        background: #5A91B2;
    }
    .boxgrid-grid .green {
        background: #6B9C2B;
    }
    .boxgrid-grid .orange {
        background: #E07405;
    }
    .boxgrid-grid .darkblue a{
        color: #406E91;
    }
    .boxgrid-grid .lightblue a{
        color: #5A91B2;
    }
    .boxgrid-grid .green a{
        color: #6B9C2B;
    }
    .boxgrid-grid .orange a{
        color: #E07405;
    }
    
</style>

<?
    if (block_sub_field('buttontext')){
        $buttonText = block_sub_field('buttontext');
    }else{
        $buttonText = 'Learn More';
    }
    if (block_sub_field('buttonurl')){
        $buttonLink = block_sub_field('buttonurl');
    }else{
        $buttonLink = '/contact';
    }
?>

<div class="boxgrid-section">
    <div class="boxgrid-grid">
        <?php
        if (block_rows('boxgrid')) :

            while (block_rows('boxgrid')) :
                block_row('boxgrid');
        ?>
                <div class="grid-item <?php block_sub_field('color'); ?>">
                    <div class="item-content">
                        <h2><?php block_sub_field('heading'); ?></h2>
                        <p><?php block_sub_field('description'); ?></p>
                        <a href="<?php echo $buttonLink; ?>"> <?php echo $buttonText; ?> </a>
                    </div>
                </div>
                    
        <?php endwhile;
        endif;

        reset_block_rows('boxgrid');
        ?>
    </div>
</div>