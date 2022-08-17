<?php
?>
<div class="interiorhead-block" style="background-image: url(<? block_field('background'); ?>)">
    <div class="interiorhead-content">
        <h1 class="interior-head-text"><?php
            if (block_value('title') != '') {
                block_field('title');
            }else{
                wp_title('');
            }
            ?></h1>
            <? if (block_value('subtitle') != ''){ ?> <h2 class="interior-sub-text"><? echo block_field('subtitle'); ?></h2>
                <? } ?>
    </div>
</div>