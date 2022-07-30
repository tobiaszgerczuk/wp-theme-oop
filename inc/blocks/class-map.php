<?php
/**
 * Simple block structure and content.
 *
 * @package wlc-starter
 * @author  Mateusz Major
 * @link    https://whitelabelcoders.com/
 */

namespace WLC\Blocks;

use WLC\Core\Abstract_Block;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

/**
 * Simple block structure and content.
 */
class Map extends Abstract_Block {

	/**
	 * Simple block constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Map', 'publicacademy' );
		$this->description = __( 'Simple block with map', 'publicacademy' );
		$this->icon        = 'location-alt';
		$this->align       = 'full';
	}



	/**
	 * Enqueue assets for this block.
	 */
	public function enqueue_assets() {
		$this->enqueue_style( 'block-map', 'blocks/map.css' );
		$this->enqueue_script( 'block-map', 'blocks/map.js', array( 'google-map' ) );
		wp_localize_script(
			'block-map',
			'WLC',
			array(
				'icon' => get_images_uri() . 'pin.png',
			)
		);
		$this->enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBjkahlmBqlimhXligShf62OyQiTvtRWWg' );
	}



	/**
	 * Render frontend template.
	 *
	 * @param array  $block block.
	 * @param string $content content.
	 * @param false  $is_preview preview switch.
	 * @param int    $post_id ID post.
	 */
	public function render_frontend( array $block, $content = '', $is_preview = false, $post_id = 0 ) {
		$content = get_field( $this->block_name );
		$image   = get_field( $this->block_name . '-image' );
		$data    = explode( '_', $block['id'] )[1];
		$id      = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$class   = $this->get_block_class( $block );

		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<?php if ( $image ) : ?>
				<figure class="map__image">
					<?php echo wp_get_attachment_image( $image, 'full' ); ?>
				</figure>
			<?php endif; ?>
			<div id="map" class="map__canvas"
				data-latidude = "<?php echo ( isset( $content['latitude'] ) ? esc_attr( $content['latitude'] ) : '' ); ?>"
				data-longtude = "<?php echo ( isset( $content['longtude'] ) ? esc_attr( $content['longtude'] ) : '' ); ?>"
				data-zoom = "<?php echo ( isset( $content['zoom'] ) ? esc_attr( $content['zoom'] ) : '' ); ?>"
			></div>
		</section>
		<?php
	}

}
