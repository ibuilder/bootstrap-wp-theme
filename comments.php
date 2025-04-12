<?php
/**
 * The template for displaying comments
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area my-4">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
                $comment_count = get_comments_number();
                printf(
                    esc_html(_nx(
                        '%1$s comment on "%2$s"',
                        '%1$s comments on "%2$s"',
                        $comment_count,
                        'comments title',
                        'bootstrap-wp-theme'
                    )),
                    number_format_i18n($comment_count),
                    '<span>' . esc_html(get_the_title()) . '</span>'
                );
            ?>
        </h2>

        <ol class="comment-list list-unstyled">
            <?php
                wp_list_comments(array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size'=> 50,
                    'max_depth'  => 5,
                    'callback'   => 'bootstrap_comment_callback',
                ));
            ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation" role="navigation">
                <ul class="pagination">
                    <li class="page-item"><?php previous_comments_link(esc_html__('&larr; Older Comments', 'bootstrap-wp-theme')); ?></li>
                    <li class="page-item"><?php next_comments_link(esc_html__('Newer Comments &rarr;', 'bootstrap-wp-theme')); ?></li>
                </ul>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php
        comment_form(array(
            'class_form'      => 'comment-form needs-validation',
            'title_reply'     => '<h3>' . esc_html__('Leave a Reply', 'bootstrap-wp-theme') . '</h3>',
            'title_reply_to'  => '<h3>' . esc_html__('Leave a Reply to %s', 'bootstrap-wp-theme') . '</h3>',
            'class_submit'    => 'btn btn-primary',
            'label_submit'    => esc_html__('Submit', 'bootstrap-wp-theme'),
            'comment_field'   => '<div class="form-group mb-3"><label for="comment">' . esc_html__('Comment', 'bootstrap-wp-theme') . '</label><textarea id="comment" name="comment" class="form-control" rows="5" required aria-required="true"></textarea></div>',
            'fields'          => array(
                'author' => '<div class="form-group mb-3"><label for="author">' . esc_html__('Name', 'bootstrap-wp-theme') . '</label><input id="author" name="author" class="form-control" type="text" required aria-required="true" /></div>',
                'email'  => '<div class="form-group mb-3"><label for="email">' . esc_html__('Email', 'bootstrap-wp-theme') . '</label><input id="email" name="email" class="form-control" type="email" required aria-required="true" /></div>',
                'url'    => '<div class="form-group mb-3"><label for="url">' . esc_html__('Website', 'bootstrap-wp-theme') . '</label><input id="url" name="url" class="form-control" type="url" /></div>',
            ),
            'comment_notes_before' => '<p class="small text-muted">' . esc_html__('Your email address will not be published.', 'bootstrap-wp-theme') . '</p>',
        ));
    ?>
</div>