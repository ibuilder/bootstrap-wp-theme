<?php
// Sidebar template for the Bootstrap WordPress theme

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <aside id="secondary" class="widget-area">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </aside><!-- #secondary -->
<?php endif; ?>