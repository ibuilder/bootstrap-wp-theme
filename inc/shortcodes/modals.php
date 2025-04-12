<?php
/**
 * Modal shortcodes
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Modal shortcode
 * Usage: [modal id="myModal" title="Modal Title" button="Open Modal"]Modal Content[/modal]
 */
function bootstrap_wp_modal_shortcode($atts, $content = null) {
    // Default attributes
    $atts = shortcode_atts(array(
        'id'            => 'modal-' . rand(100, 999),
        'title'         => '',
        'button'        => 'Open Modal',
        'button_type'   => 'primary',
        'size'          => '', // sm, lg, xl for Bootstrap modal sizes
        'centered'      => 'false',
    ), $atts, 'modal');

    // Sanitize attributes
    $id = sanitize_html_class($atts['id']);
    $title = sanitize_text_field($atts['title']);
    $button = sanitize_text_field($atts['button']);
    $button_type = sanitize_html_class($atts['button_type']);
    $size = sanitize_html_class($atts['size']);
    $centered = filter_var($atts['centered'], FILTER_VALIDATE_BOOLEAN);

    // Add unique ID to ensure no conflicts
    $unique_id = 'modal-' . wp_unique_id($id);
    
    // Build modal HTML
    $output = sprintf(
        '<button type="button" class="btn btn-%1$s" data-bs-toggle="modal" data-bs-target="#%2$s">%3$s</button>',
        esc_attr($button_type),
        esc_attr($unique_id),
        esc_html($button)
    );

    $output .= sprintf(
        '<div class="modal fade" id="%1$s" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog %2$s %3$s">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">%4$s</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">%5$s</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>',
        esc_attr($unique_id),
        $size ? 'modal-' . esc_attr($size) : '',
        $centered ? 'modal-dialog-centered' : '',
        esc_html($title),
        wp_kses_post($content)
    );

    return $output;
}
add_shortcode('modal', 'bootstrap_wp_modal_shortcode');
?>