<?php

use function Genesis\CustomBlocks\add_block;


function add_instahandle_block() {

    // One long array with lots defined.
    add_block(
        'instahandle',
        array(
            'title'    => 'Instagram Handle',
            'category' => 'complex',
            'icon'     => 'account_circle',
            'fields'   => array(
                'background' => array(
                    'name' => 'background',
                    'label'   => 'Background Image',
                    'control' => 'image',
                ),
                'instafeed' => array(
                    'name' => 'instafeed',
                    'label'   => 'Instagram Feed',
                    'control' => 'rich_text',
                ),
            ),
        ),
    );
}
add_action( 'genesis_custom_blocks_add_blocks', 'add_instahandle_block');