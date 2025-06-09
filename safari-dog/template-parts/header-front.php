<?php
/**
 * Front header
 */
?>
<!-- header on main page -->
<div class="container">
		<header class="header header-main">
			<?php get_template_part( 'template-parts/nav-main' ); ?>
			<div class="m-header d-block position-relative">
				<div class="position-absolute top-50 start-0 row">
					<div class="col-lg-6 row slogan">
						<h1 class="h1"><?php bloginfo(); ?></h1>
						<p class="gy-5 mute"><?php bloginfo('description'); ?></p>
					</div>
				</div>
			</div>
		</header>
</div><!-- /header -->