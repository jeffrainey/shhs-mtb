<?php
use function Genesis\CustomBlocks\add_block;
function add_testimonies_block() {
    add_block(
        'testimonies',
        array(
            'title' => 'testimonies',
            'category' => 'common',
            'icon' => 'account_circle',
            'fields' => array(
                'testimony' => array(
                    'name' => 'testimony',
                    'label' => 'Testimony',
                    'control' => 'repeater',
                    'sub_fields' => array(
                        'image' => array(
                            'name' => 'image',
                            'label'   => 'Image',
                            'control' => 'image',
                            'parent' => 'testimony'
                        ),
                        'highlight' => array(
                            'name' => 'highlight',
                            'label'   => 'Highlight',
                            'control' => 'text',
                            'parent' => 'testimony'
                        ),
                        'description' => array(
                            'name' => 'description',
                            'label'   => 'Description',
                            'control' => 'text',
                            'parent' => 'testimony'
                        ),
                        'author' => array(
                            'name' => 'author',
                            'label'   => 'Author',
                            'control' => 'text',
                            'parent' => 'testimony'
                        ),
                    ),
                ),
            ),
        ),
    );

}

add_action( 'genesis_custom_blocks_add_blocks', 'add_testimonies_block');