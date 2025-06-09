<?php
/**
 * Shortcode "Nata"
 * [nata head="value" class="h1" img_src="/upload/.../img.jpg" link=""] Content [/nata]
 * 
 * @head Заголовок секции
 * @class class of header
 * @img_src src or image
 * @link Ссылка на страницу с подробной информацией. 
 *        Если не установлена, то и кнопка будет отсутствовать
 */
function nata_shortcode( $atts, $content){
    $atts = shortcode_atts( [
		'head' => 'Be the first with us',
        'class' => 'h1',
        'img_src' => '/wp-content/themes/safari-dog/assets/images/pic540x310.png',
        'link' => ''
	], $atts );
	ob_start();
	?>
   <!-- Block посвящение -->
<section class="gap-div nata">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12 d-flex align-items-center">
        <div class="clearfix">
          <h2 class="<?php echo $atts['class']; ?>"><?php echo $atts['head']; ?></h2>
          <p class="mute"><?php echo $content; ?></p>
          <?php if ( $atts['link'] ) : ?>
          <a href="<?php echo $atts['link']; ?>" role="button" class="btn btn-warning">Наташа...</a>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="d-flex justify-content-end">
          <img class="img-fluid" src="<?php echo $atts['img_src']; ?>" alt="" width="636" height="355" loading="lazy" fetchpriority= "low">
        </div>
      </div>
    </div>
</section><!-- /Block посвящение -->
    <?php
	return ob_get_clean();
}
add_shortcode( 'nata', 'nata_shortcode' );
