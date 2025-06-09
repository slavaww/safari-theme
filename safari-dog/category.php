<?php
/**
 * The template for displaying category of posts
 *
 */

 get_header();
 ?>
	 <main class="site-main">
		<div class="container">
		<div class="row">

		<?php if (is_active_sidebar( 'sidebar-right' )): ?>
			 <div class="col-9">
		<?php else : ?>
			<div class="col-12">
		 <?php endif; ?>
		 <?php
		 if ( have_posts() ) :
 
			 if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) :
				 ?>
				 <header>
					 <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				 </header>
				 <?php
			 endif;
 
			 /* Start the Loop */
			 while ( have_posts() ) :
				 the_post();
 
				 /*
				  * Include the Post-Type-specific template for the content.
				  * If you want to override this in a child theme, then include a file
				  * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				  */
				  if (get_post_type() == 'post') {
					  // Show onle excerpt
					 $part = 'excerpt';
				 } else {
					 $part = get_post_type();
				 }
				 get_template_part( 'template-parts/content', $part );
 
			 endwhile;

			 // @TODO Make the pagination
			 //echo_posts_pagination();
 
		 else :
 
			 get_template_part( 'template-parts/content', 'none' );
 
		 endif;
		 ?>
		 </div><!-- /col-(9|12) -->
		 <?php if (is_active_sidebar( 'sidebar-right' )): ?>
			 
			 <div class="col-3">
			 <?php get_sidebar('sidebar-right'); ?>
			 </div>
		 </div>
		 <?php endif; ?>
		</div><!-- /row -->
		 </div><!-- /container -->
	 </main><!-- /main -->
 
 <?php
 get_footer();