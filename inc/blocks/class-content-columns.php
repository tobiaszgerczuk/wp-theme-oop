<?php
namespace WLC\Blocks;

use WLC\Core\Abstract_Block;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

/**
 * Content columns structure and content.
 */
class Content_Columns extends Abstract_Block {

	/**
	 * Content columns constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Content columns', 'publicacademy' );
		$this->description = __( 'Content columns description', 'publicacademy' );
	}



	/**
	 * Load ACF Field array into block configuration.
	 */
	public function add_local_field_group() {
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'                   => 'group_6295bacfc3670',
					'title'                 => 'Content columns',
					'fields'                => array(
						array(
							'key'               => 'field_6295bb29c53c8',
							'label'             => 'Content columns',
							'name'              => 'content_columns',
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
							'key'               => 'field_6295bb33c53c9',
							'label'             => 'Small title',
							'name'              => 'small_title',
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
							'key'               => 'field_6295c07cba40d',
							'label'             => 'First line heading',
							'name'              => 'first_line_heading',
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
							'key'               => 'field_6295c086ba40e',
							'label'             => 'Second line heading',
							'name'              => 'second_line_heading',
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
							'key'               => 'field_6295d19eaff33',
							'label'             => 'Number of columns',
							'name'              => 'number_of_columns',
							'type'              => 'radio',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'choices'           => array(
								'three' => 'Three',
								'four'  => 'Four',
							),
							'allow_null'        => 0,
							'other_choice'      => 0,
							'default_value'     => 'three',
							'layout'            => 'vertical',
							'return_format'     => 'value',
							'save_other_choice' => 0,
						),
						array(
							'key'               => 'field_6295c099ba40f',
							'label'             => 'Columns',
							'name'              => 'columns',
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
									'key'               => 'field_6295c0afba411',
									'label'             => 'Title',
									'name'              => 'title',
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
									'key'               => 'field_6295c18dba416',
									'label'             => 'Icon',
									'name'              => 'icon_button',
									'type'              => 'radio',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'choices'           => array(
										'none' => 'None',
										'icon' => 'Icon',
										'dot'  => 'Dot',
									),
									'allow_null'        => 0,
									'other_choice'      => 0,
									'default_value'     => 'None',
									'layout'            => 'vertical',
									'return_format'     => 'value',
									'save_other_choice' => 0,
								),
								array(
									'key'               => 'field_6295c13bba414',
									'label'             => 'Icon',
									'name'              => 'icon',
									'type'              => 'image',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => array(
										array(
											array(
												'field'    => 'field_6295c18dba416',
												'operator' => '==',
												'value'    => 'icon',
											),
										),
									),
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'return_format'     => 'array',
									'preview_size'      => 'medium',
									'library'           => 'all',
									'min_width'         => '',
									'min_height'        => '',
									'min_size'          => '',
									'max_width'         => '',
									'max_height'        => '',
									'max_size'          => '',
									'mime_types'        => '',
								),
								array(
									'key'               => 'field_6295c0baba412',
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
									'key'               => 'field_6295c0c2ba413',
									'label'             => 'Link',
									'name'              => 'link',
									'type'              => 'link',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'return_format'     => 'array',
								),
							),
						),
					),
					'location'              => array(
						array(
							array(
								'param'    => 'block',
								'operator' => '==',
								'value'    => 'acf/content-columns',
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
		$this->enqueue_style( 'block_content_columns', 'blocks/content_columns.css' );
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
		$content             = get_field( $this->block_name );
		$data                = explode( '_', $block['id'] )[1];
		$id                  = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$background_color    = isset( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
		$class               = $this->get_block_class( $block, array( $background_color ) );
		$small_title         = get_field( 'small_title' );
		$first_line_heading  = get_field( 'first_line_heading' );
		$second_line_heading = get_field( 'second_line_heading' );
		$number_of_columns   = get_field( 'number_of_columns' );
		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="
		<?php
		echo esc_attr( $class );
		?>
		<?php if ( ! $first_line_heading ) : ?>
			<?php echo ' smaller_padding '; ?>
		<?php endif; ?>
		">
			<div class="container-wide">
			<?php if ( $small_title ) : ?>
				<h3 class="subheading"><?php echo $small_title; ?></h3>
			<?php endif; ?>
			<?php if ( $first_line_heading ) : ?>
				<h2><?php echo $first_line_heading; ?></h2>
			<?php endif; ?>
			<?php if ( $second_line_heading ) : ?>
				<h2 class="no_dot"><?php echo $second_line_heading; ?></h2>
			<?php endif; ?>
			<div class="content-columns_content_column row">
			<?php
			if ( have_rows( 'columns' ) ) :
				while ( have_rows( 'columns' ) ) :
					the_row();
					$dot  = get_sub_field( 'icon_button' );
					$icon = get_sub_field( 'icon' );
					?>
					<div class="content-columns_content_column__columns_block
					<?php if ( 'four' === $number_of_columns ) : ?>
						col-md-3
					<?php else : ?>
						col-md-4
					<?php endif; ?>
					<?php if ( 'dot' === $dot ) : ?>
						with_dot
					<?php endif; ?>
					">
					<?php if ( $icon ) : ?>
					<div class="content-columns_icon">
						<img alt="<?php echo $icon['alt']; ?>" src="<?php echo $icon['url']; ?>">
					</div>
					<?php endif; ?>
					<?php if ( get_sub_field( 'title' ) ) : ?>
					<div class="content-columns_description">
						<h3><?php echo get_sub_field( 'title' ); ?></h3>
						<?php if ( get_sub_field( 'content' ) ) : ?>
							<?php echo get_sub_field( 'content' ); ?>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					<?php if ( get_sub_field( 'link' ) ) : ?>
						<a href="<?php echo get_sub_field( 'link' )['url']; ?>"><?php echo get_sub_field( 'link' )['title']; ?></a>
					<?php endif; ?>
					</div>
					<?php
				endwhile;
				?>
			</div>
			<?php else : ?>
			<?php endif; ?>
		</div>
		</section>
		<?php
	}

}
