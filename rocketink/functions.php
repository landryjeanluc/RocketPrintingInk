<?php
/**
 * RocketInk Theme Functions
 * 
 * @package RocketInk
 * @version 1.0.0
 */

// Theme Setup
function rocketink_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo', array(
        'height'      => 200,
        'width'       => 800,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'rocketink_setup');

// Enqueue Styles and Scripts
function rocketink_enqueue_assets() {
    // Main stylesheet
    wp_enqueue_style('rocketink-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Component styles
    wp_enqueue_style('rocketink-components', get_template_directory_uri() . '/assets/css/components.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'rocketink_enqueue_assets');

// Custom Logo Output Function
function rocketink_get_logo() {
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        // Fallback to site name
        echo '<h1 class="site-title">' . get_bloginfo('name') . '</h1>';
    }
}

// Remove admin bar margin
function rocketink_remove_admin_bar_margin() {
    ?>
    <style type="text/css">
        html { margin-top: 0 !important; }
        * html body { margin-top: 0 !important; }
    </style>
    <?php
}
add_action('wp_head', 'rocketink_remove_admin_bar_margin');
