<?php
/**
 * Shortcode "Block 4"
 * [block4 head="The fancy head" class="class_head" posts_id="35,22,26,71"]
 * 
 * Есть проверка на количество. Всё что больше 4-х будет удалено. Также есть
 * проверка на дубли статей (номеров) - удаляются.
 * 
 */


/**
 * @head Заголовок секции
 * @class class of header
 */
function block4_shortcode( $atts ) {
    $atts = shortcode_atts( [
                  'posts_id' => '',
                  'head'     => '',
                  'class'    => 'display-3'
            ], $atts );

  if ( ! $atts['posts_id'] ) {
    return '';
  }
  $atts_string = implode('_', $atts);
  $html = wp_cache_get($atts_string, 'block4');

  if (false === $html) {
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
    <section class="content-4">
        <div class="row gy-5">
            <div class="text-center col-lg-12"><h2 class="<?php echo $atts['class']; ?>"><?php echo $atts['head']; ?></h2></div>
                <?php
                // The main while
                foreach ($my_array as $key) { 
                  $post = get_post( $key );
                  if (get_post_status($key) == "publish") {
                    # Check if post exists?>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card-4">
                          <?php 
                          $attr = array(
                            'class'	=> 'img-fluid rounded mx-auto wp-image-' . $key,
                            'fetchpriority' => "low",
                            'loading' => 'lazy'
                          );
                          echo get_the_post_thumbnail( $key, 'safari-460x270', $attr ); ?>
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $post->post_title;?></h3>
                                <p class="date"><?php echo date('d.m.Y', strtotime($post->post_date));?>, <?= get_the_author();?></p>
                                <p class="card-text"><?php echo $post->post_excerpt; ?></p>
                                <a href="<?php echo get_permalink($key);?>" class="btn btn-outline-warning">Подробнее...</a>
                            </div>
                        </div>
                    </div>
                <?php } 
                } ?>
        </div>
    </section>
    <?php
    $html = ob_get_clean();

    wp_cache_set($atts_string, 'block4', WEEK_IN_SECONDS * 4);

  }

  return $html;
}
add_shortcode( 'block4', 'block4_shortcode' );