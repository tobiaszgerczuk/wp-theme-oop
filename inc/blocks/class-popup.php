<?php

namespace WLC\Blocks;

use WLC\Core\Abstract_Block;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

class Popup extends Abstract_Block {

	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Popup', 'publicacademy' );
		$this->description = __( 'Popup', 'publicacademy' );
		$this->icon        = 'welcome-learn-more';
		$this->align       = 'full';
	}

	public function add_local_field_group() {
		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group(
				array(
					'key'                   => 'group_62a0651e118f1',
					'title'                 => 'Popup',
					'fields'                => array(
						array(
							'key'               => 'field_62a06525532b2',
							'label'             => 'Popup',
							'name'              => 'popup',
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
							'key'               => 'field_62a981d60082b',
							'label'             => 'Popup big heading',
							'name'              => 'popup_header',
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
							'key'               => 'field_62a982030082c',
							'label'             => 'Popup button',
							'name'              => 'popup_button',
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
						array(
							'key'               => 'field_62a9820f0082d',
							'label'             => 'Under button text',
							'name'              => 'under_button_text',
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
							'key'               => 'field_62a6d1d42f3b5',
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
							'key'               => 'field_62a6d2062f3b6',
							'label'             => 'Subheading',
							'name'              => 'subheading',
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
							'key'               => 'field_62a6d2102f3b7',
							'label'             => 'Acceptance text',
							'name'              => 'acceptance_text',
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
							'key'               => 'field_62a0654c532b4',
							'label'             => 'Popup shortcode',
							'name'              => 'popup_shortcode',
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
					'location'              => array(
						array(
							array(
								'param'    => 'block',
								'operator' => '==',
								'value'    => 'acf/popup',
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
	 * Enqueue assets for this block.
	 */
	public function enqueue_assets() {
		$this->enqueue_style( 'popup', 'blocks/popup.css' );
	}

	public function render_frontend( array $block, $content = '', $is_preview = false, $post_id = 0 ) {
		$content           = get_field( 'popup' );
		$data              = explode( '_', $block['id'] )[1];
		$id                = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$class             = $this->get_block_class( $block );
		$popup_header      = get_field( 'popup_header' );
		$popup_button      = get_field( 'popup_button' );
		$under_button_text = get_field( 'under_button_text' );
		$heading           = get_field( 'heading' );
		$subheading        = get_field( 'subheading' );
		$popup_shortcode   = get_field( 'popup_shortcode' );
		$acceptance_text   = get_field( 'acceptance_text' );
		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?> popup_form">
			<div id="popup__modal" class="popup__popup-dialog">
				<div class="popup__content">
					<a class="popup__content-close " id="close_popup" href="#">
						<img src="<?php echo get_svg_uri(); ?>/close.svg" alt="">
					</a>
					<?php if ( $popup_header ) : ?>
						<h2><?php echo esc_html( $popup_header ); ?></h2>
					<?php endif; ?>
					<?php if ( $popup_button ) : ?>
						<a target="_blank" class="wp-block-button__link" href="
						<?php
						if ( $popup_button['url'] ) :
							echo esc_html( $popup_button['url'] );
						endif;
						?>
						">
						<?php
						if ( $popup_button['title'] ) :
							echo esc_html( $popup_button['title'] );
						endif;
						?>
						</a>
					<?php endif; ?>
					<?php if ( $under_button_text ) : ?>
						<p class="popup_under_button"><?php echo esc_html( $under_button_text ); ?></p>
					<?php endif; ?>
					<?php if ( $heading ) : ?>
						<h3><?php echo esc_html( $heading ); ?></h3>
					<?php endif; ?>
					<?php if ( $subheading ) : ?>
						<div class="popup_form_subheading">
							<?php echo esc_html( $subheading ); ?>
						</div>
					<?php endif; ?>
					<?php if ( $popup_shortcode ) : ?>
						<?php echo $popup_shortcode; ?>
					<?php endif; ?>
					<?php if ( $acceptance_text ) : ?>
						<div class="acceptance_form">
							<?php echo $acceptance_text; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<?php
	}

}
