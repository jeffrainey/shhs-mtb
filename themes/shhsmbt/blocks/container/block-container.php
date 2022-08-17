<?php
use function Genesis\CustomBlocks\add_block;

function add_container_block() {

    // One long array with lots defined.
    add_block(
        'container',
        array(
            'title'    => 'Container',
            'category' => 'complex',
            'icon'     => 'account_circle',
            'fields'   => array(
                'background' => array(
                    'name' => 'background',
                    'label'   => 'Add background image',
                    'control' => 'image',
                ),
                'block' => array(
                    'name' => 'block',
                    'label'   => 'Block',
                    'control' => 'inner_blocks',
                )
            ),
        ),
    );
}
add_action( 'genesis_custom_blocks_add_blocks', 'add_container_block');