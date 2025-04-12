<?php
/**
 * Theme setup functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function bootstrap_wp_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'bootstrap-wp-theme'),
        'footer'  => esc_html__('Footer Menu', 'bootstrap-wp-theme'),
    ));
}
add_action('after_setup_theme', 'bootstrap_wp_theme_setup');

/**
 * Register widget areas
 */
function bootstrap_wp_theme_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'bootstrap-wp-theme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here to appear in your sidebar.', 'bootstrap-wp-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Register footer widget areas
    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'bootstrap-wp-theme'),
        'id'            => 'footer-1',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'bootstrap_wp_theme_widgets_init');

/**
 * Bootstrap comment callback
 */
function bootstrap_comment_callback($comment, $args, $depth) {
    $tag = ('div' === $args['style']) ? 'div' : 'li';
?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class('media mb-4', empty($args['has_children']) ? '' : 'parent'); ?>>
        <?php if (0 != $args['avatar_size']) : ?>
        <div class="me-3">
            <?php echo get_avatar($comment, $args['avatar_size'], '', '', array('class' => 'img-fluid rounded')); ?>
        </div>
        <?php endif; ?>
        
        <div class="media-body">
            <h5 class="mt-0"><?php echo get_comment_author_link(); ?></h5>
            <p class="text-muted small">
                <time datetime="<?php comment_time('c'); ?>">
                    <?php
                        /* translators: 1: comment date, 2: comment time */
                        printf(esc_html__('%1$s at %2$s', 'bootstrap-wp-theme'), 
                            get_comment_date('', $comment),
                            get_comment_time()
                        );
                    ?>
                </time>
                <?php edit_comment_link(esc_html__('Edit', 'bootstrap-wp-theme'), ' <span class="edit-link">', '</span>'); ?>
            </p>

            <?php if ('0' == $comment->comment_approved) : ?>
            <div class="alert alert-warning mb-2">
                <?php esc_html_e('Your comment is awaiting moderation.', 'bootstrap-wp-theme'); ?>
            </div>
            <?php endif; ?>

            <?php comment_text(); ?>
            
            <?php
                comment_reply_link(array_merge($args, array(
                    'add_below' => 'div-comment',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<div class="reply">',
                    'after'     => '</div>',
                    'reply_text'=> '<span class="btn btn-sm btn-outline-secondary">' . esc_html__('Reply', 'bootstrap-wp-theme') . '</span>'
                )));
            ?>
        </div>
<?php
}
?>