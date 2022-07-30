<?php
/**
 * Team block
 *
 * @package Marsmedia PublicAcademy
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
class Team extends Abstract_Block {

	/**
	 * Simple block constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Team', 'publicacademy' );
		$this->description = __( 'Team description', 'publicacademy' );
		$this->icon        = 'groups';
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
		$this->enqueue_style( 'block_team', 'blocks/team.css' );
	}

	/**
	 * Get CPT Team members
	 *
	 * @return array|false Get team members with meta.
	 */
	private function get_members() {
		$posts = get_posts(
			array(
				'numberposts' => - 1,
				'post_type'   => 'team',
				'post_status' => 'publish',
				'order'       => 'ASC',
			)
		);
		if ( $posts ) {
			return $this->set_posts( $posts );
		}
		return false;
	}



	/**
	 * Prepare an array of courses details
	 *
	 * @param \WP_Post[] $posts Posts array
	 *
	 * @return array
	 */
	private function set_posts( $posts ) : array {
		$team = array();
		foreach ( $posts as $post ) {
			$team[ $post->ID ]['title']        = $post->post_title;
			$team[ $post->ID ]['url']          = get_permalink( $post->ID );
			$team[ $post->ID ]['thumbnail']    = get_the_post_thumbnail( $post->ID );
			$team[ $post->ID ]['position']     = get_field( 'position', $post->ID );
			$team[ $post->ID ]['linkedin_url'] = get_field( 'linkedin_url', $post->ID );
		}
		return $team;
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

		if ( 'four' === $content['view'] ) {
			$bootstrap_class = 'col-md-3 col-xs-6';
		} else {
			$bootstrap_class = 'col-md-4 col-6';
		}

		if ( ! empty( $content['member'] ) ) {
			$members = $this->set_posts( $content['member'] );
		} else {
			$members = $this->get_members();
		}

		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<div class="container-wide team--container">
				<div class="row">
					<div class="col-md-12">
						<h1><?php echo $content['header']; ?></h1>
					</div>
				</div>
				<div class="row">
					<?php if ( $members ) : ?>
						<?php foreach ( $members as $member ) : ?>
							<div class="member--container <?php echo $bootstrap_class; ?>">
								<div class="member--photo"><?php echo $member['thumbnail']; ?></div>
								<h3 class="member--name"><?php echo $member['title']; ?></h3>
								<p class="member--position"><?php echo $member['position']; ?></p>
								<div class="member--linkedin">
									<a class="member--linkedin__link" href="<?php echo $member['linkedin_url']; ?>">
										<img src="<?php echo get_svg_uri() . '/logo_linkedin.svg'; ?>" alt="<?php echo $member['title']; ?> LinkedIn" />
										<p class="member--linkedin__link-txt">LinkedIn</p>
									</a>

								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<?php
	}

}
