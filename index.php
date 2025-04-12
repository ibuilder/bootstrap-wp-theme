<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/theme.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php get_header(); ?>

    <main id="main" class="site-main" role="main">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content', get_post_type() );
            endwhile;
        else :
            get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>
    </main>

    <?php get_sidebar(); ?>
    <?php get_footer(); ?>
    <?php wp_footer(); ?>
</body>
</html>