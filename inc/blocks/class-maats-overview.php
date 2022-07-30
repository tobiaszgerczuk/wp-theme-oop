<?php
/**
 * Maat Overview
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
 * Maats Overview structure and content.
 */
class Maats_Overview extends Abstract_Block {

	/**
	 * Simple block constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Maats Overview', 'publicacademy' );
		$this->description = __( 'Grid with latest Maat Overview', 'publicacademy' );
		$this->icon        = 'welcome-learn-more';
		$this->align       = 'full';
	}

	/**
	 * Load ACF Field array into block configuration.
	 */
	public function add_local_field_group() {
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'                   => 'group_629d924a9aacb',
					'title'                 => 'Maats Overview',
					'fields'                => array(
						array(
							'key'               => 'field_629d924aa551d',
							'label'             => 'Maats Overview',
							'name'              => 'maats-overview',
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
									'key'               => 'field_629d9358f64df',
									'label'             => 'Heading',
									'name'              => 'heading',
									'type'              => 'text',
									'instructions'      => '',
									'required'          => 1,
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
								'value'    => 'acf/maats-overview',
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
		$this->enqueue_style( 'maats-overview', 'blocks/maats_overview.css' );
	}



	/**
	 * Get CPT maats
	 *
	 * @return array|false Get published maats with its details.
	 */
	private function get_maats() {
		$posts = get_posts(
			array(
				'numberposts' => -1,
				'post_type'   => 'maat',
				'post_status' => 'publish',
				'orderby'     => 'date',
				'order'       => 'DESC',
			)
		);
		if ( $posts ) {
			return $this->prepare_maats( $posts );
		}
		return false;
	}


	/**
	 * Prepare an array of maats details
	 *
	 * @param \WP_Post[] $posts Posts array
	 *
	 * @return array
	 */
	private function prepare_maats( $posts ) : array {
		$maats = array();
		foreach ( $posts as $post ) {
			$maats[ $post->ID ]['title']        = $post->post_title;
			$maats[ $post->ID ]['url']          = get_permalink( $post->ID );
			$maats[ $post->ID ]['thumbnail']    = get_the_post_thumbnail( $post->ID );
			$maats[ $post->ID ]['post_excerpt'] = get_the_excerpt( $post->ID );
		}
		return $maats;
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

		$content          = get_field( 'maats-overview' );
		$data             = explode( '_', $block['id'] )[1];
		$id               = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$background_color = isset( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
		$class            = $this->get_block_class( $block, array( $background_color ) );
		$maats            = $this->get_maats();
		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<div class="container-wide content">
				<?php if ( isset( $content['heading'] ) ) : ?>
					<h2 class="content__heading heading"><?php echo esc_html( $content['heading'] ); ?></h2>
				<?php endif; ?>
				<?php if ( $maats ) : ?>
					<div class="content__maats">
						<?php foreach ( $maats as $maat ) : ?>
							<a class="maat-item" href="<?php echo esc_url( $maat['url'] ); ?>">
								<?php if ( $maat['thumbnail'] ) : ?>
									<figure class="maat-item__thumbnail">
										<?php echo wp_kses_post( $maat['thumbnail'] ); ?>
									</figure>
								<?php endif; ?>
								<h3 class="maat-item__title"><?php echo esc_html( $maat['title'] ); ?></h3>
								<?php if ( $maat['post_excerpt'] ) : ?>
									<p class="maat-item__excerpt">
										<?php echo $maat['post_excerpt']; ?>
									</p>
								<?php endif; ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>

		<?php
	}

}
