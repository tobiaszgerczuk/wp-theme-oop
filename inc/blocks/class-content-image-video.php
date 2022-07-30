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
class Content_Image_Video extends Abstract_Block {

	/**
	 * Simple block constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Content Image Video', 'publicacademy' );
		$this->description = __( 'Content Image description', 'publicacademy' );
	}

	/**
	 * Enqueue assets for this block.
	 */
	public function enqueue_assets() {
		$this->enqueue_style( 'block_content_image', 'blocks/content_image_video.css' );
	}

	/**
	 * Prepares buttons from buttons array.
	 *
	 * @param array $buttons Buttons configuration.
	 *
	 * @return void
	 */
	public function render_button( $button, $label ) {
		$button_url    = $button['url'] ?? '#';
		$button_target = $button['target'] ?? '';
		?>
		<?php if ( is_page( 'over-ons' ) ) : ?>
			<a class="over_link" href="<?php echo esc_html( $button_url ); ?>" target="<?php echo esc_html( $button_target ); ?>"><?php echo esc_html( $label ); ?></a>
		<?php else : ?>
			<div class="wp-block-button">
				<a href="<?php echo esc_html( $button_url ); ?>" target="<?php echo esc_html( $button_target ); ?>" class="wp-block-button__link"><?php echo esc_html( $label ); ?></a>
			</div>
			<?php
		endif;
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
	 * Render frontend template.
	 *
	 * @param array  $block block.
	 * @param string $content content.
	 * @param false  $is_preview preview switch.
	 * @param int    $post_id ID post.
	 */
	public function render_frontend( array $block, $content = '', $is_preview = false, $post_id = 0 ) {
		$content                    = get_field( $this->block_name );
		$data                       = explode( '_', $block['id'] )[1];
		$id                         = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$settings_structure_classes = 'left' === esc_html( $content['media_position'] ) ? 'image-left' : 'image-right';
		$background_color           = isset( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
		$class                      = $this->get_block_class( $block, array( $settings_structure_classes ) );
		$class_bg                   = $this->get_block_class( $block, array( $background_color ) );
		$button_li                  = get_field( 'button_link' );
		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?> <?php echo esc_attr( $class_bg ); ?>">
			<div class="container-wide  <?php echo esc_attr( $settings_structure_classes ); ?>">
				<div class="row justify-content-between align-items__center container-images-video">
					<div class="col-md-6 col-left">
						<div class="content_image__media--wrapper">
							<?php if ( false === $content['media_type'] ) : ?>
								<a href="#" id="popup__btn" class="content_image__media--button">
									<svg width="47" height="48" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse cx="23.5" cy="23.633" rx="23.458" ry="23.489" fill="#0072FF"/><path d="M18.37 29.645V17.62c0-.273.286-.45.53-.329l12.009 6.012c.27.136.27.521 0 .657L18.9 29.973a.367.367 0 0 1-.532-.328Z" fill="#fff"/></svg>
								</a>
							<?php endif; ?>
							<?php echo wp_get_attachment_image( $content['image']['ID'], 'default-image-content' ); ?>
						</div>
					</div>
					<div class="col-md-6 col-right">
						<p class="content_image__content--subheading"><?php echo esc_html( $content['subheading'] ?? '' ); ?></p>
						<?php if ( false === $content['with_content'] ) : ?>
							<h2><?php echo esc_html( $content['header'] ?? '' ); ?></h2>
						<?php else : ?>
							<h3><?php echo esc_html( $content['header'] ?? '' ); ?></h3>
							<div class="text">
								<?php echo wp_kses_post( $content['content'] ?? '' ); ?>
							</div>
						<?php endif; ?>
						<?php if ( isset( $content['with_button'] ) && true === $content['with_button'] && isset( $content['button_text'] ) && ! empty( $content['button_text'] ) ) : ?>
							<div class="cta__buttons wp-block-buttons">
								<?php $this->render_button( $content['button_link'], $content['button_text'] ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>


			<?php if ( false === $content['media_type'] ) : ?>
				<div class="popup popup_video">
					<div id="popup__modal" class="popup__popup-dialog">
						<div class="popup__content">
							<a class="popup__content-close" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/svg/close.svg" alt=""></a>
							<?php echo $content['content_video']; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</section>
		<?php
	}

}
