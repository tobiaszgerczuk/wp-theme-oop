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
class Submenu extends Abstract_Block {

	/**
	 * Simple block constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Submenu', 'publicacademy' );
		$this->description = __( 'Create submenu with anchor to page section', 'publicacademy' );
		$this->icon        = 'menu-alt3';
	}


	/**
	 * Enqueue assets for this block.
	 */
	public function enqueue_assets() {
		$this->enqueue_style( 'block_submenu', 'blocks/submenu.css' );
		$this->enqueue_script( 'block_submenu', 'blocks/submenu.js' );
	}



	/**
	 * Prepares buttons from buttons array.
	 *
	 * @param array $buttons Buttons configuration.
	 *
	 * @return void
	 */
	public function render_buttons( $buttons ) {
		foreach ( $buttons as $button ) {
			switch ( $button['target'] ) {
				case 'email':
					$prefix = 'mailto:';
					break;
				case 'tel':
					$prefix = 'tel:';
					break;
				default:
					$prefix = '';
					break;
			}
			?>
			<div class="wp-block-button <?php echo esc_attr( $button['style'] ); ?>">
				<a id="btn_popup" href="<?php echo esc_attr( $prefix ) . esc_attr( $button[ 'target_' . $button['target'] ] ); ?>" class="wp-block-button__link "><?php echo esc_html( $button['label'] ); ?></a>
			</div>
			<?php
		}
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
		$items   = get_field( $this->block_name );
		$buttons = get_field( $this->block_name . '-buttons' );
		$data    = explode( '_', $block['id'] )[1];
		$id      = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$class   = $this->get_block_class( $block );

		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<div class="container-wide submenu__container">
				<?php if ( $items ) : ?>
					<nav class="menu">
						<div class="menu__trigger">
							<?php esc_html_e( 'Navigeer naar', 'publicacademy' ); ?>
						</div>
						<?php foreach ( $items as $item ) : ?>
							<a class="menu__item" href="<?php echo esc_attr( $item['anchor'] ); ?>"><?php echo esc_html( $item['title'] ); ?></a>
						<?php endforeach; ?>
					</nav>
				<?php endif; ?>
				<?php if ( $buttons ) : ?>
					<div class="buttons wp-block-buttons">
						<?php $this->render_buttons( $buttons ); ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
		<?php
	}

}
