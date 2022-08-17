<?php

use function Genesis\CustomBlocks\add_block;


function add_interiorhead_block() {

    // One long array with lots defined.
    add_block(
        'interiorhead',
        array(
            'title'    => 'Interior Header',
            'category' => 'complex',
            'icon'     => 'account_circle',
            'fields'   => array(
                'background' => array(
                    'name' => 'background',
                    'label'   => 'Background Image',
                    'control' => 'image',
                ),
                'title' => array(
                    'name' => 'title',
                    'label'   => 'Title (Leave blank to use page title)',
                    'control' => 'text',
                ),
                'subtitle' => array(
                    'name' => 'subtitle',
                    'label'   => 'Sub Title',
                    'control' => 'text',
                )
            ),
        ),
    );
}
add_action( 'genesis_custom_blocks_add_blocks', 'add_interiorhead_block');