<?php 
/**
 * The main template file
 * 
 * @todo Form comment
 * @todo Previous/next page navigation
 */

get_header();


if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
		echo "<!-- " . get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) . " -->";
	}

	// Previous/next page navigation.
    // @todo it
	//twenty_twenty_one_the_posts_navigation();

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content-none' );

} 

    
        // Форма комментариев
        // @todo this form
        // If comments are open or we have at least one comment, load up the comment template.
        //if ( comments_open() || get_comments_number() ) :
        //    comments_template();
        // endif;

get_footer();