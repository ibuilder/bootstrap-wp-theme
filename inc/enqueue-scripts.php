<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

function bootstrap_wp_enqueue_scripts() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
        array(),
        '5.3.2'
    );
    
    // Enqueue Bootstrap Icons
    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css',
        array(),
        '1.11.0'
    );
    
    // Enqueue theme stylesheet
    wp_enqueue_style(
        'bootstrap-wp-style',
        get_stylesheet_uri(),
        array('bootstrap-css'),
        wp_get_theme()->get('Version')
    );
    
    // Enqueue Bootstrap JS
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
        array('jquery'),
        '5.3.2',
        true
    );
    
    // Enqueue theme scripts
    wp_enqueue_script(
        'bootstrap-wp-js',
        get_template_directory_uri() . '/assets/js/theme.js',
        array('jquery', 'bootstrap-js'),
        wp_get_theme()->get('Version'),
        true
    );

    // Add comment-reply JS
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bootstrap_wp_enqueue_scripts');
?>