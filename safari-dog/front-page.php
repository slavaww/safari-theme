<?php
/**
 * This template only for front page
 */
get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', 'front' );
            endwhile; // End of the loop. ?>
        </div><!--  /col-12 content -->
    </div><!-- / row -->
</div><!-- / container -->
<?php
get_footer();