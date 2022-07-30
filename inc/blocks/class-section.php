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
class Section extends Abstract_Block {

	/**
	 * Simple block constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Section', 'publicacademy' );
		$this->description = __( 'Simple section with different background colors.', 'publicacademy' );
		$this->icon        = 'welcome-widgets-menus';
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
				'align'           => array( 'full' ),
				'icon'            => $this->icon,
				'render_callback' => array( $this, 'render_frontend' ),
				'enqueue_assets'  => array( $this, 'enqueue_assets' ),
				'supports'        => array(
					'align'         => array( 'full' ),
					'align_content' => false,
					'anchor'        => true,
					'color'         => array(
						'background' => true,
					),
					'jsx'           => true,
				),
			);

			acf_register_block_type( $block );
		}
	}



	/**
	 * Enqueue assets for this block.
	 */
	public function enqueue_assets() {
		$this->enqueue_style( 'block_section', 'blocks/section.css' );
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
		$data             = explode( '_', $block['id'] )[1];
		$id               = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$background_color = isset( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
		$class            = $this->get_block_class( $block, array( $background_color ) );

		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<div class="container">
				<InnerBlocks />
			</div>
		</section>
		<?php
	}

}
