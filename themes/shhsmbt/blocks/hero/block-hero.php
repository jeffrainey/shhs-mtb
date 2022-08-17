<?php
/**
 * Plugin Name: My Teammate Block
 * Plugin URI: https://wpengine.com/genesis/
 * Description: A plugin that extends Genesis Custom Blocks to add a custom teammate block
 * Version: 1.0.0
 * Author: WP Engine
 * Author URI: https://wpengine.com/genesis/
 * Text Domain: gcb
 * Domain Path: /i18n/languages/
 * Requires at least: 5.5
 * Requires PHP: 7.0
 */

use function Genesis\CustomBlocks\add_block;


function add_hero_block() {

    // One long array with lots defined.
    add_block(
        'hero',
        array(
            'title'    => 'Hero',
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
add_action( 'genesis_custom_blocks_add_blocks', 'add_hero_block');