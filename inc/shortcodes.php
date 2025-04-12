<?php
// This file registers all shortcodes defined in the theme.

function bootstrap_wp_theme_register_shortcodes() {
    // Include shortcodes
    include_once 'shortcodes/buttons.php';
    include_once 'shortcodes/icons.php';
    include_once 'shortcodes/modals.php';
    
    // Register shortcodes
    add_shortcode('bootstrap_button', 'bootstrap_wp_theme_button_shortcode');
    add_shortcode('bootstrap_icon', 'bootstrap_wp_theme_icon_shortcode');
    add_shortcode('bootstrap_modal', 'bootstrap_wp_theme_modal_shortcode');
}

add_action('init', 'bootstrap_wp_theme_register_shortcodes');
?>