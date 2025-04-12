<?php
/**
 * Icon shortcodes using Bootstrap Icons
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Bootstrap Icon shortcode
 * Usage: [icon name="bookmark" size="2x" color="#ff0000"]
 */
function bootstrap_wp_icon_shortcode($atts) {
    // Default attributes
    $atts = shortcode_atts(array(
        'name'  => 'star',
        'size'  => '',
        'color' => '',
        'class' => '',
    ), $atts, 'icon');

    // Sanitize attributes
    $name = sanitize_html_class($atts['name']);
    $size = sanitize_html_class($atts['size']);
    $class = sanitize_html_class($atts['class']);
    
    // Build style attribute
    $style = array();
    
    if (!empty($size)) {
        $numeric_size = intval(substr($size, 0, 1));
        if ($numeric_size > 0 && $numeric_size <= 5) {
            $style[] = 'font-size: ' . $numeric_size . 'em';
        }
    }
    
    if (!empty($atts['color'])) {
        // Simple color validation
        if (preg_match('/^#([a-fA-F0-9]{3}){1,2}$/', $atts['color']) || 
            preg_match('/^[a-zA-Z]+$/', $atts['color'])) {
            $style[] = 'color: ' . $atts['color'];
        }
    }
    
    $style_attr = !empty($style) ? ' style="' . esc_attr(implode('; ', $style)) . '"' : '';

    // Build icon HTML
    $icon = sprintf(
        '<i class="bi bi-%1$s %2$s"%3$s aria-hidden="true"></i>',
        $name,
        $class,
        $style_attr
    );

    return $icon;
}
add_shortcode('icon', 'bootstrap_wp_icon_shortcode');
?>