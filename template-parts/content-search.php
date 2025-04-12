<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <div class="search-result">
            <h2 class="search-result-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="search-result-excerpt">
                <?php the_excerpt(); ?>
            </div>
        </div>
    <?php endwhile;
else : ?>
    <div class="no-results">
        <h2><?php esc_html_e( 'No results found', 'bootstrap-wp-theme' ); ?></h2>
        <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'bootstrap-wp-theme' ); ?></p>
    </div>
<?php endif; ?>