<?php
get_header(); ?>

<div class="container">
    <h1 class="page-title"><?php the_archive_title(); ?></h1>
    <div class="archive-description"><?php the_archive_description(); ?></div>

    <?php if ( have_posts() ) : ?>
        <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                            </a>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h5>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php esc_html_e('Read More', 'bootstrap-wp-theme'); ?></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?php the_posts_navigation(); ?>
    <?php else : ?>
        <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>