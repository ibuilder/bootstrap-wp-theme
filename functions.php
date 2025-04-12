<?php
/**
 * Bootstrap WP Theme functions and definitions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Enqueue styles and scripts
require get_template_directory() . '/inc/enqueue-scripts.php';

// Theme setup
require get_template_directory() . '/inc/theme-setup.php';

// Shortcodes
require get_template_directory() . '/inc/shortcodes.php';

// Custom nav walker
require get_template_directory() . '/inc/class-bootstrap-navwalker.php';

// Include shortcodes for buttons, icons, and modals
require get_template_directory() . '/inc/shortcodes/buttons.php';
require get_template_directory() . '/inc/shortcodes/icons.php';
require get_template_directory() . '/inc/shortcodes/modals.php';
?>