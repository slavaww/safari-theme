<?php
/**
 * The template for displaying all single posts
 *
 */

get_header(); ?>

<div class="container">
    <div class="row">

<?php
if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/content', 'page' );

	}

	// Previous/next page navigation.
    // @todo it
	//twenty_twenty_one_the_posts_navigation();

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content-none' );

} 
?>
    </div><!-- / row -->
</div><!-- / container -->
<?php
get_footer();