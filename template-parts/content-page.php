<?php
/**
 * Template part for displaying a single page's content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bootstrap_WP_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content();

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php
        // Display post meta information if needed
        ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->