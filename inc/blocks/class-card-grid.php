<?php
/**
 * Card Grid structure and content.
 *
 * @package wlc-starter
 * @link    https://whitelabelcoders.com/
 */

namespace WLC\Blocks;

use WLC\Core\Abstract_Block;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Simple block structure and content.
 */
class Card_Grid extends Abstract_Block {


	/**
	 * Array of images used in blocks.
	 *
	 * @var array
	 */
	public $image = array();

	/**
	 * Simple block constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Card Grid', 'publicacademy' );
		$this->description = __( 'Card Grid Description', 'publicacademy' );
	}

	/**
	 * Register block
	 */
	public function register_block_type() {
		if ( function_exists( 'acf_register_block_type' ) ) {
			$block = array(
				'name'            => $this->block_name,
				'title'           => $this->title,
				'description'     => $this->description,
				'keywords'        => '',
				'category'        => $this->category,
				'align'           => $this->align,
				'icon'            => $this->icon,
				'render_callback' => array( $this, 'render_frontend' ),
				'enqueue_assets'  => array( $this, 'enqueue_assets' ),
				'supports'        => array(
					'align'         => $this->supports_align,
					'align_content' => true,
					'anchor'        => true,
					'color'         => array(
						'background' => true,
						'text'       => false,
					),
				),
			);

			acf_register_block_type( $block );
		}
	}

	/**
	 * Add CSS into block.
	 */
	public function enqueue_assets() {
		$this->enqueue_style( 'block_card_grid', 'blocks/card_grid.css' );
	}

	/**
	 * Render frontend template.
	 *
	 * @param array $block block.
	 * @param string $content content.
	 * @param false $is_preview preview switch.
	 * @param int $post_id ID post.
	 */
	public function render_frontend( array $block, $content = '', $is_preview = false, $post_id = 0 ) {
		$content              = get_field( $this->block_name );
		$data                 = explode( '_', $block['id'] )[1];
		$id                   = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$background_color     = isset( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
		$class                = $this->get_block_class( $block, array( $background_color ) );
		$image_placeholder    = get_images_uri() . 'placeholder_card_grid.png';
		$this->image['left']  = ! empty( $content['left_card']['image'] ) ? $content['left_card']['image'] : $image_placeholder;
		$this->image['right'] = ! empty( $content['right_card']['image'] ) ? $content['right_card']['image'] : $image_placeholder;
		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<div class="container-wide">
				<div class="row">
					<div class="col-md-6">
						<div class="single-card" style="background-image: url(<?php echo esc_html( $this->image['left'] ); ?>)">
							<div class="single-card__content">
								<div>
									<p class="single-card__content--subheading"><?php echo esc_html( $content['left_card']['subheading'] ?? '' ); ?></p>
									<h3><?php echo esc_html( $content['left_card']['heading'] ?? '' ); ?></h3>
									<a href="<?php echo esc_html( $content['left_card']['button_link'] ?? '' ); ?>" class="single-card__content--button<?php echo ( 'white' === $content['left_card']['link_color'] ) ? '-white' : ''; ?>"><?php echo esc_html( $content['left_card']['button_text'] ?? '' ); ?></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="single-card" style="background-image: url(<?php echo esc_html( $this->image['right'] ); ?>)">
							<div class="single-card__content">
								<div>
									<p class="single-card__content--subheading"><?php echo esc_html( $content['right_card']['subheading'] ?? '' ); ?></p>
									<h3><?php echo esc_html( $content['right_card']['heading'] ?? '' ); ?></h3>
									<a href="<?php echo esc_html( $content['right_card']['button_link'] ?? '' ); ?>" class="single-card__content--button<?php echo ( 'white' === $content['right_card']['link_color'] ) ? '-white' : ''; ?>"><?php echo esc_html( $content['right_card']['button_text'] ?? '' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}

}
