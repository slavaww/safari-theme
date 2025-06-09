<?php
/**
 * The template for displaying all single page
 *
 */

get_header(); ?>

<div class="container">
    <div class="row">

<?php

// The next three lines check if the page has a child
global $post;
$p_child = false;   
$children = get_pages( array( 'child_of' => $post->ID ) );
if ( is_page() && ($post->post_parent || count( $children ) > 0  ) && (is_active_sidebar( 'right_side' ) || has_nav_menu('side') || has_nav_menu('Dog-training')) ) {
    // Display sidebar and suiteble width of content 
    $p_child = true; ?>
    <div class="col-12 col-md-8 col-lg-9">
<?php
} else {?>
    <div class="col-12">
<?php
} ?>

<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content', 'page' );
endwhile; // End of the loop. ?>
    </div><!--  /col-12 content -->
<?php
if ($p_child) {
            // Display sidebar and suiteble width of content ?>
            <div class="col-12 col-md-4 col-lg-3">
                <section class="sidebar type-page" aria-label="widget">
                    <?php dynamic_sidebar( 'right_side' ); ?>
                <?php
                $args_arr = array(
                    'theme_location'   => '',
                    'menu_id'          => 'primary-menu',
                    'menu_class'       => 'list-group list-group-flush',
                    'container_class'  => 'navbar-collapse',
                    'container_id'     => 'navbarNav',
                    'list_item_class'  => 'list-group-item',
                    'link_class'       => 'nav-link',
                    'items_wrap'       => '<ul id="%1$s" class="%2$s">%3$s</ul>' // . $m_buttons
                ); 
                if (is_page('getting-a-dog') || 35 == $post->post_parent) {
                    echo "<h2>Завести собаку</h2>";
                    echo '<hr class="d-none d-md-block my-2">';
                    wp_nav_menu(
                        $args_arr + ['menu' => 'Getting a dog',]
                    ); 
                } elseif (is_page('dog-training') || 33 == $post->post_parent) {
                    echo "<h2>Дрессировка собак</h2>";
                    echo '<hr class="d-none d-md-block my-2">';
                    wp_nav_menu($args_arr +
                        ['menu' => 'Dog-training']
                    );
                } ?>
                </section>
            </div>
<?php
} ?>
        </div><!-- / grid-container -->
    </div><!-- / row -->
</div><!-- / container -->
<?php
get_footer();