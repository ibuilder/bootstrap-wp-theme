<?php
// Footer section of the theme
?>

<footer class="footer bg-light text-center">
    <div class="container">
        <p class="text-muted">&copy; <?php echo date("Y"); ?> Your Site Name. All rights reserved.</p>
        <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'container' => false)); ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>