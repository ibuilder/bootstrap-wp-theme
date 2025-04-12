<?php
// Template part for displaying post content

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if ( is_single() ) : ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php else : ?>
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h2>
        <?php endif; ?>
    </header>

    <div class="entry-content">
        <?php
        the_content();

        // If there are any shortcodes, they will be processed here
        ?>
    </div>

    <footer class="entry-footer">
        <?php
        // Display post meta information, such as categories and tags
        ?>
        <div class="entry-meta">
            <?php the_category(', '); ?>
            <?php the_tags('<span class="tags-links">', ', ', '</span>'); ?>
        </div>
    </footer>
</article>