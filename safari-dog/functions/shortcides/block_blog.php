<?php
/**
 * Shortcode "Block bolg"
 * [block_blog head="The fancy head" class="class_head" lead="37" posts_id="35,22,26,71"]
 * class - is class of the head
 */


/**
 * @head Заголовок секции
 * @class class of header
 */
function blockb_shortcode( $atts ) {
    $atts = shortcode_atts( [
                'lead'     => '',
                'posts_id' => '',
                'head'     => '',
                'class'    => 'display-4'
            ], $atts );

  if ( ! $atts['posts_id'] ) {
    return '';
  }

  // Перевод из переменной to array
  $my_array = explode(",", $atts['posts_id']);

  // Kill duplicates
  $my_array = array_unique($my_array);

  // Kill the last pages_id if they more than 4
  $count = count($my_array);
  if ( $count > 4 ) {
    for ( $i = $count; $i > 4; $i-- ) {
      array_pop($my_array);
    }
  }
  // Start html
  ob_start();
  ?>
  <section class="content-blog">
    <div class="row">
            <div class="col-12 text-center">
                <h2 class="<?php echo $atts['class']; ?>"><?php echo $atts['head']; ?></h2>
            </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12">
                <div class="content-blog__wrap">
                    <?php 
                    $attr = array(
                        'class'	=> 'img-fluid rounded mx-auto wp-image-' . $atts['lead'],
                        'fetchpriority' => "low",
                        'loading' => 'lazy',
                      );
                    echo get_the_post_thumbnail( $atts['lead'], 'safari-460x300', $attr ); 
                    
                    $post = get_post( $atts['lead'] );
                    ?>
                    
                    <div class="content-blog__text">
                        <h4><a class="content-blog__link" href="<?php echo get_permalink($atts['lead']);?>"><?php echo $post->post_title;?></a></h4>
                        <p class="date"><?php echo date('d M', strtotime($post->post_date));?></p>
                    </div>
                </div>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
              <?php
              // The main while
              foreach ($my_array as $key) { 
                $post = get_post( $key );
                if (get_post_status($key) == "publish") {
                  # Check if post exists?>
                  <div class="col-lg-3 col-md-6 col-xs-12">
                      <div class="blog__item_sm">
                        <?php 
                        $attr = array(
                            'class'	=> 'img-fluid rounded mx-auto d-block wp-image-' . $key,
                            'fetchpriority' => "low",
                            'loading' => 'lazy',
                          );
                        echo get_the_post_thumbnail( $key, 'safari-220x159', $attr ); ?>
                          <div class="card-body">
                            <h5 class="h5">
                                <a class="content-blog__link" href="<?php echo get_permalink($key);?>"><?php echo $post->post_title;?></a>
                            </h4>
                            <p class="date"><?php echo date('d.m.Y', strtotime($post->post_date));?></p>
                          </div>
                      </div>
                  </div>
              <?php } 
              } ?>
            </div>
        </div>
    </div>
  </section>
  <?php
  return ob_get_clean();
}
add_shortcode( 'block_blog', 'blockb_shortcode' );