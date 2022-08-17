<?php

use function Genesis\CustomBlocks\add_block;


function add_carousel_block() {

    // One long array with lots defined.
    add_block(
        'carousel',
        array(
            'title'    => 'Carousel Block',
            'category' => 'common',
            'icon'     => 'account_circle',
            'fields' => array(
                'cell' => array(
                    'name' => 'cell',
                    'label' => 'Cell',
                    'control' => 'repeater',
                    'sub_fields' => array(
                        'review' => array(
                            'name' => 'review',
                            'label'   => 'Review',
                            'control' => 'textarea',
                            'parent' => 'cell'
                        ),
                        'author' => array(
                            'name' => 'author',
                            'label'   => 'Author',
                            'control' => 'text',
                            'parent' => 'cell'
                        ),
                    ),
                ),
            ),
        ),
    );
}
add_action( 'genesis_custom_blocks_add_blocks', 'add_carousel_block');