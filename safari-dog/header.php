<?php
/**
 * The header.
 * This header is include two differnt files.
 * One is for front page, second one for others&
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="yandex-verification" content="23e1b50cac9a74f0" />
	<link rel="icon" href="/favicon.ico" sizes="any">
	<link rel="icon" href="/icon.svg" type="image/svg+xml">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	<link rel="manifest" href="/manifest.webmanifest" crossorigin="use-credentials">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<?php if ( is_front_page() ) : ?>
		<?php get_template_part( 'template-parts/header', 'front' ); ?>
	<?php else : ?>
		<!-- noindex -->
		<?php get_template_part( 'template-parts/header', 'other' ); ?>
		<!-- /noindex -->
	<?php endif;