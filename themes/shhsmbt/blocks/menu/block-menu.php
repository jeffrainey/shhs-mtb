<?php

use function Genesis\CustomBlocks\add_block;


function add_menu_block() {

    // One long array with lots defined.
    add_block(
        'menu',
        array(
            'title'    => 'Menu',
            'category' => 'complex',
            'icon'     => 'account_circle',
            'fields'   => array(
                'block' => array(
                    'name' => 'block',
                    'label'   => 'Menu Block',
                    'control' => 'inner_blocks',
                )
            ),
        ),
    );
}
add_action( 'genesis_custom_blocks_add_blocks', 'add_menu_block');