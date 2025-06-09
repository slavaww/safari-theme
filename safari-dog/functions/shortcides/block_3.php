<?php
/**
 * Shortcode "Block 3"
 * Можно выводить больше блоков (и меньше)
 * ограничений нет. Тройка это по умолчанию
 * и для названия самого блока.
 * 
 * [block3 posts_id="35,22,26"]
 * 
 * Есть проверка на дубли - удаляются.
 * 
 */


/**
 * @head Заголовок секции
 * @class class of header
 */
function block3_shortcode( $atts ) {
    $atts = shortcode_atts( [
                  'posts_id' => ''
            ], $atts );

  if ( ! $atts['posts_id'] ) {
    return '';
  }

  // Перевод из переменной to array
  $my_array = explode(",", $atts['posts_id']);

  // Kill duplicates
  $my_array = array_unique($my_array);

  // Start html
  ob_start();
  ?>
  <section class="content-3">
              <?php
              // The main while
              foreach ($my_array as $key) { 
                $post = get_post( $key );
                if (get_post_status($key) == "publish") {
                  # Check if post exists?>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <?php 
                            $attr = array(
                            'class'	=> 'img-fluid rounded mx-auto wp-image-' . $key,
                            'srcset' => wp_get_attachment_image_url( get_post_thumbnail_id($key), 'safari-460x270' ) . ' 460w, ' .
                                        wp_get_attachment_image_url( get_post_thumbnail_id($key), 'safari-540x310' ) . ' 540w, ' .
                                        wp_get_attachment_image_url( get_post_thumbnail_id($key), 'safari-610x300') . ' 610w, ',
                            'fetchpriority' => "low",
                            'loading' => 'lazy'
                            );
                            echo get_the_post_thumbnail( $key, 'safari-1296x345', $attr ); ?>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="content-3__text position-relative">
                                <div class="content-3__text-txt g-col-12">
                                    <h4><?php echo $post->post_title; ?></h4>
                                    <p><?php echo $post->post_excerpt; ?></p>
                                </div>
                                <div class="content-3__more row g-col-12 position-absolute bottom-0">
                                    <div class="col-8">
                                        <p class="date">
                                            <?php echo date('d.m.Y', strtotime($post->post_date));?>, <?= get_the_author();?>
                                        </p>
                                    </div>
                                    <div class="col-4 text-end"><a href="<?php echo get_permalink($key);?>" class="btn btn-outline-warning">Далее...</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
              <?php } 
              } ?>
  </section>
  <?php
  return ob_get_clean();
}
add_shortcode( 'block3', 'block3_shortcode' );