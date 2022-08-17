<?php
use function Genesis\CustomBlocks\add_block;

function add_contactinfo_block() {

    // One long array with lots defined.
    add_block(
        'contactinfo',
        array(
            'title'    => 'contactinfo',
            'category' => 'complex',
            'icon'     => 'account_circle',
            'fields'   => array(
                'phone' => array(
                    'name' => 'phone',
                    'label'   => 'Override Phone Number',
                    'control' => 'text',
                ),'email' => array(
                    'name' => 'email',
                    'label'   => 'Override Email Address',
                    'control' => 'text',
                ),'address' => array(
                    'name' => 'address',
                    'label'   => 'Override Address',
                    'control' => 'text',
                ),
            ),
        ),
    );
}
add_action( 'genesis_custom_blocks_add_blocks', 'add_contactinfo_block');