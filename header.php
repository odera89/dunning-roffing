<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header class="site-header" role="banner">
		<div class="top-header text-center medium-text-right">
			<div class="row">
				<div class="medium-12 columns">
					<?php the_field('top_header_content', 'option'); ?>
				</div>
			</div>
		</div>

		<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle() ?>>
			<span class="site-mobile-title title-bar-title">
				<a href="<?php echo esc_url (home_url('/')); ?>"><img src="<?php echo get_theme_mod( 'theme_logo' ); ?>" alt="logo" ></a>
			</span>
			<button class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
		</div>

		<nav class="site-navigation top-bar" role="navigation">
			<div class="row">
				<div class="medium-12 columns">
					<div class="top-bar-left">
						<div class="site-desktop-title top-bar-title">
							<a href="<?php echo esc_url (home_url('/')); ?>"><img src="<?php echo get_theme_mod( 'theme_logo' ); ?>" alt="logo" ></a>
						</div>
					</div>
					<div class="top-bar-right">
						<?php foundationpress_top_bar_r(); ?>

						<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
							<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<?php do_action( 'foundationpress_after_header' );
