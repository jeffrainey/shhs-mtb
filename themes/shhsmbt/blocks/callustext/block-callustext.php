<?php
use function Genesis\CustomBlocks\add_block;

function add_callustext_block() {
    add_block(
        'callustext',
        array(
            'title'    => 'Call Us',
            'category' => 'complex',
            'icon'     => 'account_circle',
            'fields'   => array(
                'text' => array(
                    'name' => 'text',
                    'label'   => 'CTA Text',
                    'control' => 'text',
                ),
                'phone' => array(
                    'name' => 'phone',
                    'label'   => 'Override Phone Number',
                    'control' => 'text',
                ),
            ),
        ),
    );
}
add_action( 'genesis_custom_blocks_add_blocks', 'add_callustext_block');