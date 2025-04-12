<?php
get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content', 'page' );
                endwhile;
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
        </div>
    </div>
</div>

<?php
get_footer();