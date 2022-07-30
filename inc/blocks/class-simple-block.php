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
class Simple_Block extends Abstract_Block {

	/**
	 * Simple block constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Simple block', 'WLC' );
		$this->description = __( 'Simple block description', 'WLC' );
	}



	/**
	 * Load ACF Field array into block configuration.
	 */
	public function add_local_field_group() {
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'                   => 'group_628c971b6f3ea',
					'title'                 => 'Simple block',
					'fields'                => array(
						array(
							'key'               => 'field_628c972760528',
							'label'             => 'Simple block',
							'name'              => 'simple-block',
							'type'              => 'group',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'layout'            => 'block',
							'sub_fields'        => array(
								array(
									'key'               => 'field_628c974d60529',
									'label'             => 'Heading',
									'name'              => 'heading',
									'type'              => 'text',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'placeholder'       => '',
									'prepend'           => '',
									'append'            => '',
									'maxlength'         => '',
								),
								array(
									'key'               => 'field_628c98176b935',
									'label'             => 'Content',
									'name'              => 'content',
									'type'              => 'wysiwyg',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'tabs'              => 'all',
									'toolbar'           => 'full',
									'media_upload'      => 1,
									'delay'             => 0,
								),
							),
						),
					),
					'location'              => array(
						array(
							array(
								'param'    => 'block',
								'operator' => '==',
								'value'    => 'acf/simple-block',
							),
						),
					),
					'menu_order'            => 0,
					'position'              => 'normal',
					'style'                 => 'default',
					'label_placement'       => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen'        => '',
					'active'                => true,
					'description'           => '',
					'show_in_rest'          => 0,
				)
			);
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
		$content = get_field( $this->block_name );
		$data    = explode( '_', $block['id'] )[1];
		$id      = isset( $block['anchor'] ) ?? $data;
		$class   = $this->get_block_class( $block );

		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<div class="container">
				<h2><?php echo esc_html( $content['heading'] ?? '' ); ?></h2>
				<div class="text">
					<?php echo wp_kses_post( $content['content'] ?? '' ); ?>
				</div>
			</div>
		</section>
		<?php
	}

}
