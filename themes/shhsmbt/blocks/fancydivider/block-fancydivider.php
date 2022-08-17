<?php
use function Genesis\CustomBlocks\add_block;

function add_fancydivider_block() {
    add_block(
        'fancydivider',
        array(
            'title'    => 'Fancy Divider',
            'category' => 'complex',
            'icon'     => 'account_circle',
            'fields'   => array(
            ),
        ),
    );
}
add_action( 'genesis_custom_blocks_add_blocks', 'add_fancydivider_block');