<?php
namespace WLC\Components;

class Header {

	/**
	 * Integrate hooks with WordPress.
	 */
	public function hooks() {
		add_action( 'wlc_header', array( get_class( $this ), 'logo' ), 7 );
		add_action( 'wlc_header', array( get_class( $this ), 'primary_menu' ), 9 );
	}

	/**
	 * Add header wrapper for logo, menu and actions buttons
	 */
	public static function header_wrapper_open() {
		?>
			<div class="container">
			<?php
	}

	/**
	 * Display link with logo
	 */
	public static function logo() {
		?>
			<div class="logo_menu">
				<a href="<?php echo esc_html( home_url() ); ?>"><img src="<?php echo get_field( 'logo', 'option' ); ?>" alt=""></a>
			</div>
			<?php
	}

	/**
	 * Display primary menu
	 */
	public static function primary_menu() {
		wp_nav_menu(
			array(
				'theme_location'  => 'header_menu',
				'container_class' => 'site-header__navigation',
				'menu_id'         => '',
			)
		);
	}



}
