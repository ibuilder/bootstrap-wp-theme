<?php
get_header(); ?>

<div class="container">
    <h1 class="mt-5"><?php printf( esc_html__( 'Search Results for: %s', 'bootstrap-wp-theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

    <?php if ( have_posts() ) : ?>
        <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php esc_html_e( 'Read More', 'bootstrap-wp-theme' ); ?></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <?php get_template_part( 'template-parts/content', 'none' ); ?>
    <?php endif; ?>

    <?php the_posts_navigation(); ?>
</div>

<?php
get_footer();