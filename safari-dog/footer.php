<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the body and html.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Safari-dog
 */

?>

<?php get_template_part( 'template-parts/footer-widgets' ); ?>
<?php if ( ! is_front_page() ) : ?>
<!-- noindex -->
<?php endif; ?>
<!-- Footer start -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-sm-12">
				<p><?php echo get_theme_mod('footer_left_txt') ?></p>
			</div>
			<?php //if ( has_nav_menu( 'footer' ) ) : ?>

			<div class="col-lg-2 col-sm-12">
				<hr class="footer__hr">
				<?php
					wp_nav_menu( [
						'theme_location'  => '',
						'menu'            => 'footer',
						'container'       => 'nav',
						'container_class' => 'nav flex-column',
						'container_id'    => '',
						'menu_class'      => 'menu list-unstyled',
						'list_item_class'  => 'nav-item',
						'link_class'      => 'nav-link',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => '',
					] );
					?>
			</div>
			<?php //endif; ?>
			<div class="col-lg-3 col-sm-12">
				<hr class="footer__hr">
				<dl class="row">
					<dt class="address col-sm-1"></dt>
					<dd class="col-sm-11"><?php echo get_theme_mod('footer_address') ?></dd>
					<dt class="phone col-sm-1"></dt>
					<dd class="col-sm-11 nav"><a href="tel:<?php echo get_theme_mod('footer_phone') ?>" class="nav-link pt-zero"><?php echo get_theme_mod('footer_phone') ?></a></dd>
					<dt class="email col-sm-1"></dt>
					<dd class="col-sm-11 nav"><a href="mailto:<?php echo get_theme_mod('footer_email', '') ?>" class="nav-link pt-zero"><?php echo get_theme_mod('footer_email', '') ?></a></dd>
				</dl>
			</div>
			<div class="col-lg-3 col-sm-12">
				<hr class="footer__hr">
				<?php if ( !is_user_logged_in() ) : ?>
					<?php dynamic_sidebar( 'foot_freg' ); ?>
					<?php /*
				<div class="row">
					<p>Подпишитесь на новости нашего клуба и получайте уведомления о выходе новых материалов.</p>
				</div>
				<form class="row g-3">
					<div class="col-auto">
						<label for="floatingInputValue" class="visually-hidden">E-mail</label>
						<input type="email" size="13" class="form-control" id="floatingInputValue" placeholder="name@example.ru" value="">
					</div>
					<div class="col-auto form-floating">
						<button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#getTouchModal" data-bs-whatever="gettouch">Подписаться</button>
					</div>
				</form> */?>
				<?php else : ?>
				<div class="row">
					<p>Cпасибо что остаётесь с нами на связи!</p>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<hr class="footer__hr">
				<p class="copyright">Copyright <?php bloginfo( 'name' ); ?> &copy; <?php echo date('Y'); ?>. <?php echo get_theme_mod('footer_copy') ?></p>
			</div>
		</div>
	</div>
</footer><!-- /Footer -->
<?php get_template_part( 'template-parts/reg' ,'form'); ?>
<?php //get_template_part( 'template-parts/reg', 'get' ); ?>
<?php if ( ! is_front_page() ) : ?>
	<!-- /noindex -->
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>