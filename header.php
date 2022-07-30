<?php
/**
 * Default header template
 * Header template is required by WordPress!
 *
 * This template is based on Genesis Theme hooks,
 * You can use such hooks from this guide https://genesistutorials.com/visual-hook-guide/,
 * just replace 'genesis_' prefix with 'il_'.
 *
 * @package wlc-starter
 * @version 1.0.0.
 * @author  Mateusz Major
 * @link    https://whitelabelcoders.com/
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php do_action( 'wlc_before' ); ?>

<div class="site-container">

	<?php do_action( 'wlc_before_header' ); ?>

	<header class="site-header">
		<div class="main_header container-wide header_desktop">
			<?php do_action( 'wlc_header' ); ?>
		</div>
		<div class="header_mobile">
			<div class="logo_menu">
				<a href="<?php echo esc_html( home_url() ); ?>"><img src="<?php echo get_field( 'logo', 'option' ); ?>" alt=""></a>
			</div>
			<div id="nav-toggle"><span></span><div class="name_menu_mobile">Menu</div></div>
		</div>
		<div class="mobile_main_menu">
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'header_menu',
					'container_class' => 'site-header__navigation',
					'menu_id'         => '',
				)
			);
			?>
		</div>
	</header>

	<?php do_action( 'wlc_after_header' ); ?>
