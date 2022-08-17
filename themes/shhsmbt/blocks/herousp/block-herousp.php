<?php
use function Genesis\CustomBlocks\add_block;

function add_herousp_block() {
    add_block(
        'herousp',
        array(
            'title'    => 'Hero USP Box',
            'category' => 'complex',
            'icon'     => 'account_circle',
            'fields'   => array(
                'block' => array(
                    'name' => 'block',
                    'label'   => 'Block',
                    'control' => 'inner_blocks',
                )
            ),
        ),
    );
}
add_action( 'genesis_custom_blocks_add_blocks', 'add_herousp_block');