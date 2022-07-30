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
class Page_Header extends Abstract_Block {

	/**
	 * Simple block constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Page header', 'publicacademy' );
		$this->description = __( 'Full width page header', 'publicacademy' );
		$this->icon        = 'format-image';
		$this->align       = 'full';
	}



	/**
	 * Load ACF Field array into block configuration.
	 */
	public function add_local_field_group() {

	}

	/**
	 * Enqueue assets for this block.
	 */
	public function enqueue_assets() {
		$this->enqueue_style( 'block_page_header', 'blocks/page_header.css' );
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
	 * Render frontend template.
	 *
	 * @param array  $block block.
	 * @param string $content content.
	 * @param false  $is_preview preview switch.
	 * @param int    $post_id ID post.
	 */
	public function render_frontend( array $block, $content = '', $is_preview = false, $post_id = 0 ) {

		$content = get_field( $this->block_name );
		$images  = get_field( $this->block_name . '-images' );
		$data    = explode( '_', $block['id'] )[1];
		$id      = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$class   = $this->get_block_class( $block, array( 'height-' . $content['height'] ) );

		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<div class="container-wide page-header__container">
				<?php if ( isset( $content['subheading'] ) && strlen( $content['subheading'] ) > 0 ) : ?>
					<span class="subheading"><?php echo esc_html( $content['subheading'] ); ?></span>
				<?php endif; ?>
				<?php if ( isset( $content['heading'] ) ) : ?>
					<h1 class="heading has-dot"><?php echo esc_html( $content['heading'] ); ?></h1>
				<?php endif; ?>
				<div class="body">
					<?php if ( isset( $content['body'] ) ) : ?>
						<?php echo wp_kses_post( $this->add_class_to_paragraphs( $content['body'], $content['body_font_size'] ) ); ?>
					<?php endif; ?>
				</div>
			</div>
			<?php if ( isset( $images['desktop'] ) ) : ?>
				<picture class="page-header__background">
					<?php if ( $images['mobile'] ) : ?>
						<source srcset="<?php echo esc_url( $images['mobile']['url'] ); ?>" media="(max-width: 769px)">
					<?php endif; ?>
					<img src="<?php echo esc_url( $images['desktop']['url'] ); ?>" alt="<?php echo esc_attr( $images['desktop']['description'] ); ?>" />
				</picture>
			<?php endif; ?>
			<div class="page-header__circle"></div>
		</section>
		<?php
	}

}
