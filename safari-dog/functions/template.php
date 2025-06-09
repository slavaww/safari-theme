<?php
/**
 * This file for template functions
 * 
 */


if ( ! function_exists( 'has_children' ) ) :
    /**
     * This function check if is some children pages
     * of this page
     * @return bool
     */
    function has_children()
    {
        return (bool)get_pages(array(
            'child_of' => get_the_ID(),
            'number' => 1
        ));
    }
endif;


if ( ! function_exists( 'we_blog_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 * @todo Доделать размеры и указать почти все миниатюры.
	 */
	function we_blog_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			$attr = array(
				'class'	=> 'img-fluid rounded mx-auto wp-image-' . get_post_thumbnail_id(),
				'srcset' =>	wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium' ) . ' 300w, ' .
							wp_get_attachment_image_url( get_post_thumbnail_id(), 'safari-460x300' ) . ' 540w, ' .
							wp_get_attachment_image_url( get_post_thumbnail_id(), 'safari-540x310' ) . ' 610w, ' .
							wp_get_attachment_image_url( get_post_thumbnail_id(), 'safari-610x300') . ' 940w, ' .
							wp_get_attachment_image_url( get_post_thumbnail_id(), 'safari-940x250') . ' 1024w, ' .
							wp_get_attachment_image_url( get_post_thumbnail_id(), 'large' ) . ' 1296w, ' .
							wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' ) . ' 1400w',
				'fetchpriority' => "low",
				'loading' => 'lazy'
			  );
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail($size = 'post-thumbnail', $attr); ?>
				<div class="img_text"><?php the_post_thumbnail_caption(); ?></div>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<!--<a class="post-thumbnail" href="<?php // the_permalink(); ?>" aria-hidden="true" tabindex="-1"> -->
			<div class="entry-image">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</div>
			<!-- </a> -->

			<?php
		endif; // End is_singular().
	}
endif;
