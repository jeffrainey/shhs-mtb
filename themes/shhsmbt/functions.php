<?php

/**
 * template functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shhsmbt
 */

require('inc/custom-post-types.php');

require('inc/render-module-ui.php');

//include('inc/customizer.php');

use function Genesis\CustomBlocks\add_block;

if (!function_exists('shhsmbt_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function shhsmbt_setup()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on template, use a find and replace
		 * to change 'template' to the name of your theme in all the template files.
		 */
        load_theme_textdomain('shhsmbt', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feedlinks');

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Header Primary', 'shhsmbt'),
            'menu-2' => esc_html__('Mobile', 'shhsmbt'),
            'menu-3' => esc_html__('Footer Primary', 'shhsmbt'),
        ));


        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));



        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));

        // Adding support for core block visual styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for custom color scheme.
        add_theme_support('editor-color-palette', array(
            array(
                'name'  => __('Gray', 'shhsmbt'),
                'slug'  => 'gray',
                'color' => '#707070',
            ),
            array(
                'name'  => __('Orange', 'shhsmbt'),
                'slug'  => 'orange',
                'color' => '#E07405',
            ),
            array(
                'name'  => __('Light Blue', 'shhsmbt'),
                'slug'  => 'blue-light',
                'color' => '#5A91B2',
            ),
            array(
                'name'  => __('Dark Blue', 'shhsmbt'),
                'slug'  => 'blue-dark',
                'color' => '#406E91',
            ),
            array(
                'name'  => __('Green', 'shhsmbt'),
                'slug'  => 'green',
                'color' => '#6B9C2B',
            ),
            array(
                'name'  => __('Dark Brown', 'shhsmbt'),
                'slug'  => 'brown-dark',
                'color' => '#5A3B01',
            ),
            array(
                'name'  => __('Light Brown', 'shhsmbt'),
                'slug'  => 'brown-light',
                'color' => '#9C5A26',
            ),
        ));

        add_image_size('shhsmbt-square', 664, 664, array('center', 'top'));
        add_image_size('shhsmbt-landscape', 500, 300, array('center', 'top'));
    }
endif;
add_action('after_setup_theme', 'shhsmbt_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shhsmbt_content_width()
{
    $GLOBALS['content_width'] = apply_filters('shhsmbt_content_width', 640);
}
add_action('after_setup_theme', 'shhsmbt_content_width', 0);




/**
 * Enqueue scripts and styles.
 */

function shhsmbt_scripts()
{
    
    wp_enqueue_style('main-stylesheet', get_stylesheet_directory_uri() . '/dist/css/styles.min.css', array(), '', 'all');
    wp_enqueue_script('shhsmbt-scripts', get_template_directory_uri() . '/dist/js/app.js', array(), '0.1', true);
    wp_enqueue_script( 'flickity', get_template_directory_uri() . '/vendor-files/flickity/flickity.js', array(), '2.2.1', true );
    wp_enqueue_style( 'flickity-stylesheet', get_template_directory_uri() . '/vendor-files/flickity/flickity.css', array(), '2.2.1', 'all' );
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'shhsmbt_scripts');

function enqueue_admin_scripts()
{

    //    wp_enqueue_script( 'template_admin_script',  '/wp-content/themes/shhsmbt/inc/admin/admin.js' );
    wp_enqueue_style('admin-stylesheet', '/wp-content/themes/shhsmbt/inc/admin/admin.css');
}
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

function filter_media_comment_status($open, $post_id)
{
    $post = get_post($post_id);
    if ($post->post_type == 'attachment') {
        return false;
    }
    return $open;
}
add_filter('comments_open', 'filter_media_comment_status', 10, 2);

/**
 * Add support for SVGs in the media library.
 */

function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

function add_additional_class_on_a($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

function mytheme__menu_anchors_add_css($atts, $item, $args)
{

    $menuClassMap = [
        'menu-2' => 'my-footer-menu-link-class',
    ];

    $additionalClassName = $menuClassMap[$args->menu->slug] ?? '';

    if ($additionalClassName) {
        if (!array_key_exists('class', $atts)) {
            $atts['class'] = '';
        }
        $classList = explode(' ', $atts['class']);
        $classList[] = $additionalClassName;
        $atts['class'] = implode(' ', $classList);
    }
    return $atts;
}

add_filter('nav_menu_link_attributes', 'mytheme__menu_anchors_add_css', 10, 3);

function createWidget($menuName)
{
    $css_class = 'has-mega-menu';
    $locations = get_nav_menu_locations();

    if (isset($locations[$menuName])) {
        $menu = get_term($locations[$menuName], 'nav_menu');
        if ($items = wp_get_nav_menu_items($menu->name)) {
            foreach ($items as $item) {
                if (in_array($css_class, $item->classes)) {
                    $classes = implode(" ", ($item->classes));
                    register_sidebar(array(
                        'id'   => 'mega-menu-widget-area-' . $item->ID,
                        'name' => $item->title . ' - Mega Menu',
                        'before_widget' => '<div class="' . $classes . '">',
                        'after_widget'  => '</div>',
                    ));
                }
            }
        }
    }
}

//add_filter( 'use_widgets_block_editor', '__return_false' );


// Include the Genesis Custom Blocks here
// Includes all genesis blocks imports that are in /blocks
foreach (glob(get_template_directory() . "/blocks/*/block-*.php") as $file) {
    require $file;
}


add_action('customize_register', 'my_theme_options');

function my_theme_options($wp_customize)
{

    //Phone Number Item
    $wp_customize->add_section(
        'phonenumber',
        array(
            'title'       => __('Phone Number', 'mytheme'),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
        )
    );
    $wp_customize->add_setting(
        'phonenumber',
        array(
            'default' => ''
        )
    );
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'phonenumber',
        array(
            'label'    => __('Phone Number', 'mytheme'),
            'section'  => 'phonenumber',
            'settings' => 'phonenumber',
            'priority' => 10,
        )
    ));


    //Email Item
    $wp_customize->add_section(
        'email',
        array(
            'title'       => __('Email Address', 'mytheme'),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
        )
    );
    $wp_customize->add_setting(
        'email',
        array(
            'default' => ''
        )
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'email',
        array(
            'label'    => __('Email Address', 'mytheme'),
            'section'  => 'email',
            'settings' => 'email',
            'priority' => 10,
        )
    ));

    //About Footer Item
    $wp_customize->add_section(
        'footer-about',
        array(
            'title'       => __('Footer About Us', 'mytheme'),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
        )
    );
    $wp_customize->add_setting(
        'footer-about',
        array(
            'default' => ''
        )
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'footer-about',
        array(
            'label'    => __('Footer About Us', 'mytheme'),
            'section'  => 'footer-about',
            'settings' => 'footer-about',
            'priority' => 10,
            'type'      => 'textarea',
        )
    ));

    //CTA Button Item
    $wp_customize->add_section(
        'ctabutton',
        array(
            'title'       => __('Call to Action Button', 'mytheme'),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
        )
    );
    $wp_customize->add_setting(
        'ctabutton_buttontext',
        array(
            'default' => 'Reserve Now!'
        )
    );
    $wp_customize->add_setting(
        'ctabutton_buttonlink',
        array(
            'default' => '/contact-us'
        )
    );
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'buttontext',
        array(
            'label'    => __('Button Text', 'mytheme'),
            'section'  => 'ctabutton',
            'settings' => 'ctabutton_buttontext',
            'priority' => 10,
        )
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'buttonlink',
        array(
            'label'    => __('Button Link', 'mytheme'),
            'section'  => 'ctabutton',
            'settings' => 'ctabutton_buttonlink',
            'priority' => 10,
        )
    ));


    //Address Item
    $wp_customize->add_section(
        'address',
        array(
            'title'       => __('Address', 'mytheme'),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
        )
    );
    $wp_customize->add_setting(
        'address_street',
        array(
            'default' => ''
        )
    );
    $wp_customize->add_setting(
        'address_city',
        array(
            'default' => ''
        )
    );
    $wp_customize->add_setting(
        'address_state',
        array(
            'default' => ''
        )
    );
    $wp_customize->add_setting(
        'address_zip',
        array(
            'default' => ''
        )
    );
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'street',
        array(
            'label'    => __('Street', 'mytheme'),
            'section'  => 'address',
            'settings' => 'address_street',
            'priority' => 10,
        )
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'city',
        array(
            'label'    => __('City', 'mytheme'),
            'section'  => 'address',
            'settings' => 'address_city',
            'priority' => 10,
        )
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'state',
        array(
            'label'    => __('State', 'mytheme'),
            'section'  => 'address',
            'settings' => 'address_state',
            'priority' => 10,
        )
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'zip',
        array(
            'label'    => __('Zip Code', 'mytheme'),
            'section'  => 'address',
            'settings' => 'address_zip',
            'priority' => 10,
        )
    ));

    //Hours Item
    $wp_customize->add_section(
        'hours',
        array(
            'title'       => __('Hours', 'mytheme'),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
        )
    );
    $wp_customize->add_setting(
        'hours_weekday',
        array(
            'default' => ''
        )
    );
    $wp_customize->add_setting(
        'hours_weekend',
        array(
            'default' => ''
        )
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'weekday',
        array(
            'label'    => __('Weekday Hours', 'mytheme'),
            'section'  => 'hours',
            'settings' => 'hours_weekday',
            'priority' => 10,
        )
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'weekend',
        array(
            'label'    => __('Weekend Hours', 'mytheme'),
            'section'  => 'hours',
            'settings' => 'hours_weekend',
            'priority' => 10,
        )
    ));


    //Social Media Item
    $wp_customize->add_section(
        'socialmedia',
        array(
            'title'       => __('Social Media Tags', 'mytheme'),
            'priority'    => 100,
            'capability'  => 'edit_theme_options',
        )
    );
    $wp_customize->add_setting(
        'facebook',
        array(
            'default' => ''
        )
    );
    $wp_customize->add_setting(
        'facebook-footer',
        array(
            'default' => ''
        )
    );
    $wp_customize->add_setting(
        'twitter',
        array(
            'default' => ''
        )
    );
    $wp_customize->add_setting(
        'instagram',
        array(
            'default' => ''
        )
    );


    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'facebook',
        array(
            'label'    => __('Facebook', 'mytheme'),
            'section'  => 'socialmedia',
            'settings' => 'facebook',
            'priority' => 10,
        )
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'facebook-footer',
        array(
            'label'    => __('Enable Facebook Feed in Footer', 'mytheme'),
            'section'  => 'socialmedia',
            'settings' => 'facebook-footer',
            'priority' => 10,
            'type'     => 'radio',
            'choices'  => array(
                '0' => __( 'None' ),
                '1' => __( 'Column 1' ),
                '2' => __( 'Column 2' ),
                '3' => __( 'Column 3' ),
            )
        )
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'twitter',
        array(
            'label'    => __('Twitter', 'mytheme'),
            'section'  => 'socialmedia',
            'settings' => 'twitter',
            'priority' => 10,
        )
    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'instagram',
        array(
            'label'    => __('Instagram', 'mytheme'),
            'section'  => 'socialmedia',
            'settings' => 'instagram',
            'priority' => 10,
        )
    ));
};

// QoL functions for devs
function add_to_admin_bar(){
    global $wp_admin_bar;
    //get server info, add warning to admin bar
    $tld = pathinfo($_SERVER['SERVER_NAME'], PATHINFO_EXTENSION);
    if ($tld == 'local' || $tld == 'test') {

        $wp_admin_bar->add_node(array(
            'id'    => 'local-site-copy',
            'title' => 'LOCAL DEV SITE COPY',
        ));
    }
}
add_action('wp_before_admin_bar_render', 'add_to_admin_bar');

function admin_style(){
    //get info about server & page, hide upload theme and style admin bar warning
    $tld = pathinfo($_SERVER['SERVER_NAME'], PATHINFO_EXTENSION);
    $page = pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME);
    if($page == 'themes' && ($tld == 'local' || $tld == 'test')){
        echo '<style> .page-title-action{display:none!important;}</style>';
    }
    echo '
        <style>
            #wp-admin-bar-local-site-copy>div{
                color:red!important;
                font-weight:500;
            }
            #wp-admin-bar-local-site-copy{
                background-color:#fff!important;
                border: 1px solid red;
            }
        </style>
    ';
}
add_action('admin_head', 'admin_style');
