<?php
/**
 * View index class file.
 *
 * @package wlc-starter.
 * @author  Mateusz Major
 * @link    https://whitelabelcoders.com/
 */

namespace WLC\Views;

use WLC\Core\Enqueue_Trait;


/**
 * Primary view class (index).
 */
class Index {
	use Enqueue_Trait;

	/**
	 * Integrate with WordPress actions and filters hooks
	 */
	public function hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'global_assets' ) );
		add_action( 'template_redirect', array( $this, 'view_hooks' ) );
	}



	/**
	 * Enqueue global assets
	 */
	public function global_assets() {
		$this->enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap' );
		$this->enqueue_style( 'global', 'global.css' );
		$this->enqueue_script( 'app', 'app.js' );
		wp_localize_script(
			'app',
			'WLC',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			)
		);
	}



	/**
	 * Here you can add hooks only related with current view.
	 */
	public function view_hooks() {
		if ( is_singular() ) {
			add_action( 'wlc_entry', array( __CLASS__, 'page_content' ), 5 );
		}
	}



	/**
	 * Page content.
	 */
	public static function page_content() {
		the_content();
	}
}
