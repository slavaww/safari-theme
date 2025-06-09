<?php
/**
 * Shortcode "Block 1"
 * [block1 post_id="35"]
 * 
 */


/**
 * @head Заголовок секции
 * @class class of header
 */
function block1_shortcode( $atts ){
    $atts = shortcode_atts( [
		    'post_id' => ''
	], $atts );

  if ( ! $atts['post_id'] ) {
    return '';
  }

  $html = wp_cache_get($atts['post_id'], 'block1');

  if (false === $html) {

      $post = get_post( $atts['post_id'] );
    
      if ( $post != '' ) {
    
        ob_start();
        ?>
       <!-- Block 1 -->
       <section class="content-one text-center">
        <div class="row">
            <div class="col-12 text-center">
                    <?php 
                    $attr = array(
                        'class'	=> 'img-fluid rounded mx-auto wp-image-' . $atts['post_id'],
                        'srcset' => wp_get_attachment_image_url( get_post_thumbnail_id($atts['post_id']), 'safari-460x270' ) . ' 460w, ' .
                                    wp_get_attachment_image_url( get_post_thumbnail_id($atts['post_id']), 'safari-540x310' ) . ' 540w, ' .
                                    wp_get_attachment_image_url( get_post_thumbnail_id($atts['post_id']), 'safari-610x300') . ' 610w, ' .
                                    wp_get_attachment_image_url( get_post_thumbnail_id($atts['post_id']), 'safari-940x250') . ' 940w',
                        'fetchpriority' => "low",
                        'loading' => 'lazy'
                    );
                    echo get_the_post_thumbnail( $atts['post_id'], 'safari-1296x345', $attr ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col col-12 col-xl-10 col-xxl-8 gy-3 gy-lg-4 mx-auto">
                <h2 class="display-4"><?php echo $post->post_title; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="date"><?= get_the_author() ?>, <?php echo date('d.m.Y', strtotime($post->post_modified));?></p>
            </div>
        </div>
        <div class="row">
            <div class="col col-12 col-xl-10 col-xxl-8 gy-3 gy-lg-4 mx-auto">
                <p><?php echo $post->post_excerpt; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="<?php echo get_permalink( $atts['post_id'] ); ?>" class="btn btn-outline-warning">Подробнее...</a>
            </div>
        </div>
    </section><!-- /Block 1 -->
        <?php 
        }
        $html =ob_get_clean();

        wp_cache_set($atts['post_id'], 'block1', WEEK_IN_SECONDS * 4);
  }

	return $html;
}
add_shortcode( 'block1', 'block1_shortcode' );