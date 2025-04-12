<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php esc_html_e( 'Page Not Found', 'bootstrap-wp-theme' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="container text-center">
        <h1 class="display-1"><?php esc_html_e( '404', 'bootstrap-wp-theme' ); ?></h1>
        <h2><?php esc_html_e( 'Oops! That page can’t be found.', 'bootstrap-wp-theme' ); ?></h2>
        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'bootstrap-wp-theme' ); ?></p>
        <?php get_search_form(); ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Return Home', 'bootstrap-wp-theme' ); ?></a>
    </div>
    <?php wp_footer(); ?>
</body>
</html>