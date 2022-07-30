<?php
/**
 * FAQ structure and content.
 */

namespace WLC\Blocks;

use WLC\Core\Abstract_Block;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

/**
 * FAQ structure and content.
 */
class Faq extends Abstract_Block {
	/**
	 * FAQ constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'FAQ', 'publicacademy' );
		$this->description = __( 'Frequently asked questions block', 'publicacademy' );
	}

	public function enqueue_assets() {
		$this->enqueue_style( 'faq', 'blocks/faq.css' );
		$this->enqueue_script( 'faq', 'blocks/faq.js' );
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
		$content = get_field( 'faq' );
		$data    = explode( '_', $block['id'] )[1];
		$id      = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$class   = $this->get_block_class( $block );

		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<div class="container faq-container">
				<div class="row">
					<div class="col-12">
						<h2><?php echo get_field( 'header' ); ?></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="top-border"></div>
					</div>
				</div>
				<?php foreach ( $content as $value ) : ?>
					<div class="row">
						<div class="col-12">
							<button class="faq-btn">
								<h3>
									<?php echo esc_html( $value['question'] ?? '' ); ?>
								</h3>
								<div class="plus-icon-animation closed">
									<div class="horizontal"></div>
									<div class="vertical"></div>
								</div>
							</button>
							<div class="faq-content">
									<?php echo $value['answer'] ?? ''; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}

}
