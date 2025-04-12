<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php 
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    }
    ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'navbar-nav',
                    'fallback_cb' => '__return_false',
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    'depth' => 2,
                    'walker' => new Bootstrap_Navwalker()
                ) );
                ?>
            </div>
        </nav>
    </header>