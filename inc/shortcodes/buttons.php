<?php
/**
 * Button shortcodes
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Button shortcode
 * Usage: [button type="primary" url="https://example.com" target="_blank" size="lg"]Button Text[/button]
 */
function bootstrap_wp_button_shortcode($atts, $content = null) {
    // Default attributes
    $atts = shortcode_atts(array(
        'type'   => 'primary',
        'url'    => '#',
        'target' => '_self',
        'size'   => '',
        'block'  => 'false',
        'class'  => '',
    ), $atts, 'button');

    // Sanitize attributes
    $type = sanitize_html_class($atts['type']);
    $url = esc_url($atts['url']);
    $target = in_array($atts['target'], array('_self', '_blank', '_parent', '_top')) ? $atts['target'] : '_self';
    $size = sanitize_html_class($atts['size']);
    $block = filter_var($atts['block'], FILTER_VALIDATE_BOOLEAN) ? 'd-block w-100' : '';
    $class = sanitize_html_class($atts['class']);

    // Validate type (only allow Bootstrap button types)
    $allowed_types = array('primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark', 'link');
    $type = in_array($type, $allowed_types) ? $type : 'primary';

    // Build size class
    $size_class = '';
    if (!empty($size)) {
        $allowed_sizes = array('sm', 'lg');
        if (in_array($size, $allowed_sizes)) {
            $size_class = 'btn-' . $size;
        }
    }

    // Build button HTML
    $button = sprintf(
        '<a href="%1$s" target="%2$s" class="btn btn-%3$s %4$s %5$s %6$s">%7$s</a>',
        $url,
        $target,
        $type,
        $size_class,
        $block,
        $class,
        wp_kses_post($content)
    );

    return $button;
}
add_shortcode('button', 'bootstrap_wp_button_shortcode');
?>