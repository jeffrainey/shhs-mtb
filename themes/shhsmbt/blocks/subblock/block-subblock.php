<?php

use function Genesis\CustomBlocks\add_block;


function add_subblock_block() {

    // One long array with lots defined.
    add_block(
        'subblock',
        array(
            'title'    => 'Sub Block',
            'category' => 'complex',
            'icon'     => 'account_circle',
            'fields'   => array(
                'block' => array(
                    'name' => 'block',
                    'label'   => 'Sub Block',
                    'control' => 'inner_blocks',
                )
            ),
        ),
    );
}
add_action( 'genesis_custom_blocks_add_blocks', 'add_subblock_block');