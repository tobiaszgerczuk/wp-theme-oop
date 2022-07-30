<?php
/**
 * Page header block
 *
 * @package Marsmedia PublicAcademy
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
class Call_To_Action extends Abstract_Block {

	/**
	 * Simple block constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Call to Action', 'publicacademy' );
		$this->description = __( 'Section with Call to Action heading and buttons', 'publicacademy' );
		$this->icon        = 'megaphone';
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
		$this->enqueue_style( 'block_call_to_action', 'blocks/call_to_action.css' );
	}


	/**
	 * Add WordPress Editor class to paragraph.
	 *
	 * @param string $body  Content
	 * @param string $class CSS class to be added
	 *
	 * @return string
	 */
	public function add_class_to_paragraphs( string $body, string $class ) : string {
		return str_replace( '<p>', '<p class="has-' . $class . '-font-size">', $body );
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
				<a href="<?php echo esc_attr( $prefix ) . esc_attr( $button[ 'target_' . $button['target'] ] ); ?>" class="wp-block-button__link"><?php echo esc_html( $button['label'] ); ?></a>
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

		$content          = get_field( $this->block_name );
		$buttons          = get_field( $this->block_name . '-buttons' );
		$data             = explode( '_', $block['id'] )[1];
		$id               = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$background_color = isset( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
		$class            = $this->get_block_class( $block, array( $background_color ) );

		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<div class="container-wide call-to-action__container cta">
				<?php if ( isset( $content['subheading'] ) ) : ?>
					<span class="cta__subheading subheading"><?php echo esc_html( $content['subheading'] ); ?></span>
				<?php endif; ?>
				<span class="cta__heading <?php echo esc_attr( $content['heading_size'] ); ?>"><?php echo esc_html( $content['heading'] ); ?></span>
				<?php if ( isset( $content['body'] ) ) : ?>
					<?php echo wp_kses_post( $this->add_class_to_paragraphs( $content['body'], 'medium' ) ); ?>
				<?php endif; ?>
				<?php if ( $buttons ) : ?>
					<div class="cta__buttons wp-block-buttons">
						<?php $this->render_buttons( $buttons ); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="call-to-action__circle"></div>
		</section>
		<?php
	}

}
