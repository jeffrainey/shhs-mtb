<?php

use function Genesis\CustomBlocks\add_block;


function add_callout_block() {

    // One long array with lots defined.
    add_block(
        'callout',
        array(
            'title'    => 'Callout',
            'category' => 'complex',
            'icon'     => 'account_circle',
            'fields'   => array(
                'background' => array(
                    'name' => 'background',
                    'label'   => 'Background Image',
                    'control' => 'image',
                ),
                'header' => array(
                    'name' => 'header',
                    'label'   => 'Header',
                    'control' => 'text',
                ),
                'body' => array(
                    'name' => 'body',
                    'label'   => 'Body Text',
                    'control' => 'textarea',
                )
            ),
        ),
    );
}
add_action( 'genesis_custom_blocks_add_blocks', 'add_callout_block');