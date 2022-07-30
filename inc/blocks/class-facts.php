<?php
namespace WLC\Blocks;

use WLC\Core\Abstract_Block;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

class Facts extends Abstract_Block {

	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Facts', 'publicacademy' );
		$this->description = __( 'Facts description', 'publicacademy' );
	}

	public function add_local_field_group() {
		if ( function_exists( 'acf_add_local_field_group' ) ) :

			acf_add_local_field_group(
				array(
					'key'                   => 'group_629602725ce45',
					'title'                 => 'Facts',
					'fields'                => array(
						array(
							'key'               => 'field_6296027577923',
							'label'             => 'Facts',
							'name'              => 'facts',
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
							'sub_fields'        => array(),
						),
						array(
							'key'               => 'field_62984cfda2c62',
							'label'             => 'Number color',
							'name'              => 'number_color',
							'type'              => 'color_picker',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'default_value'     => '#080811',
							'enable_opacity'    => 0,
							'return_format'     => 'string',
						),
						array(
							'key'               => 'field_62984d0aa2c63',
							'label'             => 'Content color',
							'name'              => 'content_color',
							'type'              => 'color_picker',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'default_value'     => '#6D6F76',
							'enable_opacity'    => 0,
							'return_format'     => 'string',
						),
						array(
							'key'               => 'field_6296028b77924',
							'label'             => 'Facts',
							'name'              => 'facts',
							'type'              => 'repeater',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'collapsed'         => '',
							'min'               => 0,
							'max'               => 0,
							'layout'            => 'table',
							'button_label'      => '',
							'sub_fields'        => array(
								array(
									'key'               => 'field_6296029577925',
									'label'             => 'Number',
									'name'              => 'number',
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
									'key'               => 'field_6298451b4215c',
									'label'             => 'Content',
									'name'              => 'content',
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
							),
						),
					),
					'location'              => array(
						array(
							array(
								'param'    => 'block',
								'operator' => '==',
								'value'    => 'acf/facts',
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
		$content          = get_field( $this->block_name );
		$data             = explode( '_', $block['id'] )[1];
		$id               = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$class            = $this->get_block_class( $block );
		$background_color = isset( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
		$class            = $this->get_block_class( $block, array( $background_color ) );
		$number_color     = get_field( 'number_color' );
		$content_color    = get_field( 'content_color' );
		?>
		<section id="faqs_block" class="
		<?php
		echo esc_attr( $class );
		?>
		"
		>
			<div class="container-wide">
				<div class="facts_facts_block row">
					<?php
					if ( have_rows( 'facts' ) ) :
						while ( have_rows( 'facts' ) ) :
							the_row();
							?>
							<div class="facts_facts_block_fact col">
								<h1
									<?php
									if ( $number_color ) {
										echo "style='color: " . $number_color . "'";
									}
									?>
										akhi="<?php echo get_sub_field( 'number' ); ?>"
										class="number_facts"
								>
									0
								</h1>
								<p
									<?php
									if ( $content_color ) {
										echo "style='color: " . $content_color . "'";
									}
									?>
								>
									<?php
									echo get_sub_field( 'content' );
									?>
								</p>
							</div>
							<?php
						endwhile;
					else :
					endif;
					?>
				</div>
			</div>
		</section>
		<?php
	}

}
