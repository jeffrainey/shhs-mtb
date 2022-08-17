<?php
use function Genesis\CustomBlocks\add_block;
function add_boxgrid_block() {
    add_block(
        'boxgrid',
        array(
            'title' => 'Box Grid',
            'category' => 'common',
            'icon' => 'account_circle',
            'fields' => array(
                'heading' => array(
                    'name' => 'heading',
                    'label'   => 'Want to have the block heading?',
                    'control' => 'toggle',
                ),
                'boxgrid' => array(
                    'name' => 'boxgrid',
                    'label' => 'Box Grid',
                    'control' => 'repeater',
                    'sub_fields' => array(
                        'heading' => array(
                            'name' => 'heading',
                            'label'   => 'Heading',
                            'control' => 'text',
                            'parent' => 'boxgrid'
                        ),
                        'description' => array(
                            'name' => 'description',
                            'label'   => 'Description',
                            'control' => 'text',
                            'parent' => 'boxgrid'
                        ),
                        'buttontext' => array(
                            'name' => 'buttontext',
                            'label'   => 'Button Text',
                            'control' => 'text',
                            'parent' => 'boxgrid'
                        ),
                        'buttonurl' => array(
                            'name' => 'buttonurl',
                            'label'   => 'Button URL',
                            'control' => 'text',
                            'parent' => 'boxgrid'
                        ),
                        'color' => array(
                            'name' => 'color',
                            'label'   => 'Overlay Color',
                            'control' => 'radio',
                            'options' => array(
                                0 => array('value' => 'darkblue',
                                            'label'=> 'Dark Blue'),
                                1 => array('value' => 'lightblue',
                                            'label'=> 'Light Blue'),
                                2 => array('value' => 'green',
                                            'label'=> 'Green'),
                                3 => array('value' => 'orange',
                                            'label'=> 'Orange'),
                            ),
                            'parent' => 'boxgrid'
                        ),
                    ),
                ),
            ),
        ),
    );

}

add_action( 'genesis_custom_blocks_add_blocks', 'add_boxgrid_block');
