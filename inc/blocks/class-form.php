<?php

namespace WLC\Blocks;

use WLC\Core\Abstract_Block;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

class Form extends Abstract_Block {
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Form', 'publicacademy' );
		$this->description = __( 'Form block', 'publicacademy' );
		$this->icon        = 'format-status';
		$this->align       = 'full';
	}

	public function add_local_field_group() {
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'                   => 'group_62a1951f001b8',
					'title'                 => 'Form',
					'fields'                => array(
						array(
							'key'               => 'field_62a19523578df',
							'label'             => 'Form',
							'name'              => 'form',
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
									'key'               => 'field_62a1957d578e1',
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
								array(
									'key'               => 'field_62a19588578e2',
									'label'             => 'Form shortcode',
									'name'              => 'form_shortcode',
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
									'key'               => 'field_62b16a9e90431',
									'label'             => 'Padding from top?',
									'name'              => 'padding_from_top',
									'type'              => 'true_false',
									'instructions'      => 'If this is a first section - then you can add padding for good visibility with the main menu',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'message'           => '',
									'default_value'     => 0,
									'ui'                => 0,
									'ui_on_text'        => '',
									'ui_off_text'       => '',
								),
							),
						),
					),
					'location'              => array(
						array(
							array(
								'param'    => 'block',
								'operator' => '==',
								'value'    => 'acf/form',
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
				)
			);
		}
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
	 * Enqueue assets for this block.
	 */
	public function enqueue_assets() {
		$this->enqueue_style( 'form', 'blocks/form.css' );
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

		$content          = get_field( 'form' );
		$data             = explode( '_', $block['id'] )[1];
		$id               = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$background_color = isset( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
		$class            = $this->get_block_class( $block, array( $background_color ) );
		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?> form_block">
			<div class="container-form"
			<?php if ( $content['padding_from_top'] ) : ?>
				<?php echo " style=' padding-top: 208px; ' "; ?>
			<?php endif; ?>
			>
				<div class="row justify-space-between">
					<div class="col-md-6 form_content">
						<?php
						if ( $content['content'] ) :
							echo $content['content'];
						endif;
						?>
					</div>
					<div class="col-md-5">
						<?php
						if ( $content['form_shortcode'] ) :
							echo $content['form_shortcode'];
						endif;
						?>
					</div>
				</div>
			</div>

		</section>

		<?php
	}

}
