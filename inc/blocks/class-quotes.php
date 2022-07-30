<?php
/**
 * Quotes block
 *
 * @package Marsmedia PublicAcademy
 * @link    https://whitelabelcoders.com/
 */

namespace WLC\Blocks;

use WLC\Core\Abstract_Block;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

/**
 * Quotes structure and content.
 */
class Quotes extends Abstract_Block {

	/**
	 * Quotes constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Quotes', 'publicacademy' );
		$this->description = __( 'Quotes description', 'publicacademy' );
		$this->icon        = 'quote';
		$this->align       = 'full';
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
					),
				),
			);

			acf_register_block_type( $block );
		}
	}



	/**
	 * Enqueue assets for this block.
	 */
	public function enqueue_assets() {
		$this->enqueue_style( 'block_quote', 'blocks/quote.css' );
		$this->enqueue_script( 'swiper', get_vendor_uri() . 'swiper-bundle.min.js', array(), '8.2.2' );
		$this->enqueue_script( 'block_quote', 'blocks/quotes.js' );
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
		$content          = get_field( $this->block_name );
		$content          = $content['quotes'];
		$buttons          = get_field( $this->block_name . '-buttons' );
		$data             = explode( '_', $block['id'] )[1];
		$id               = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$background_color = isset( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
		$class            = $this->get_block_class( $block, array( $background_color ) );

		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">

			<div class="row block-quotes quote--container">
				<div class="col-md-12">
					<div class="swiper mySwiper">
						<div>
							<div class="quote--oval-bg"></div>
						</div>
						<div class="swiper-wrapper">
							<?php foreach ( $content as $quote ) : ?>
								<div class="swiper-slide">
									<div class="row">
										<div class="col-md-3 quote-image--container" style="background-image: url(<?php echo $quote['photo']['sizes']['quotes']; ?>); background-repeat: no-repeat; background-size: cover; background-position: center center;"></div>
										<div class="col-md-9">
											<div class="quote-wrapper">
												<h3 class="quote-text">
													<?php echo $quote['quote']; ?>
												</h3>
												<p class="quote-author"><?php echo $quote['name']; ?> | <?php echo $quote['positioncompany']; ?> | <a href="<?php echo $quote['link_url']; ?>"><?php echo $quote['link_text']; ?></a></p>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}

}
