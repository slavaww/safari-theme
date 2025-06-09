<?php 
/**
 * The template for Mailooet subscribtion
 * 
 * @todo Form comment
 */


add_filter( 'wp_robots', function ( $robots ) {
		// Close for robots
			$robots['nofollow'] = true;
			$robots['noindex'] = true;

			return $robots;
		}
);


get_header();


if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post(); ?>
		<div <?php post_class('container'); ?>>
			<div class="row">
				<div class="col-12">
					<article id="post-<?php the_ID(); ?>">
						<?php
						//wr_breadcrumbs();
						?>
						<header class="entry-header mailpoet_title">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->

						<?php we_blog_post_thumbnail(); ?>

						<div class="entry-content">
							<?php
							the_content();

							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'we-blog' ),
									'after'  => '</div>',
								)
							);
							?>
						</div><!-- .entry-content -->

					</article><!-- #post-<?php the_ID(); ?> -->
				</div>
			</div>
		</div>
	<?php	
	}

} 
get_footer();