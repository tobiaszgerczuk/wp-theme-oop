<?php
/**
 * Courses Overview
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
 * Courses Overview structure and content.
 */
class Courses_Overview extends Abstract_Block {

	/**
	 * Simple block constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Courses Overview', 'publicacademy' );
		$this->description = __( 'Grid with latest courses overview', 'publicacademy' );
		$this->icon        = 'welcome-learn-more';
		$this->align       = 'full';
	}



	/**
	 * Enqueue assets for this block.
	 */
	public function enqueue_assets() {
		$this->enqueue_style( 'courses-overview', 'blocks/courses_overview.css' );
	}



	/**
	 * Get CPT courses
	 *
	 * @return array|false Get published courses with its details.
	 */
	private function get_courses() {
		$posts = get_posts(
			array(
				'numberposts' => -1,
				'post_type'   => 'course',
				'post_status' => 'publish',
				'orderby'     => 'date',
				'order'       => 'DESC',
			)
		);
		if ( $posts ) {
			return $this->prepare_courses( $posts );
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
	private function prepare_courses( $posts ) : array {
		$courses = array();
		foreach ( $posts as $post ) {
			$courses[ $post->ID ]['title']      = $post->post_title;
			$courses[ $post->ID ]['url']        = get_permalink( $post->ID );
			$courses[ $post->ID ]['thumbnail']  = get_the_post_thumbnail( $post->ID );
			$courses[ $post->ID ]['education']  = get_field( 'education', $post->ID );
			$courses[ $post->ID ]['duration']   = get_field( 'duration', $post->ID );
			$courses[ $post->ID ]['additional'] = get_field( 'additional', $post->ID );
		}
		return $courses;
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
		$background_color = isset( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
		$class            = $this->get_block_class( $block, array( $background_color ) );
		$courses          = $this->get_courses();

		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<div class="container-wide content">
				<?php if ( isset( $content['subheading'] ) ) : ?>
					<span class="content__subheading subheading"><?php echo esc_html( $content['subheading'] ); ?></span>
				<?php endif; ?>
				<?php if ( isset( $content['heading'] ) ) : ?>
					<h1 class="content__heading heading"><?php echo esc_html( $content['heading'] ); ?></h1>
				<?php endif; ?>
				<?php if ( $courses ) : ?>
					<div class="content__courses">
						<?php foreach ( $courses as $course ) : ?>
							<a class="course-item" href="<?php echo esc_url( $course['url'] ); ?>">
								<?php if ( $course['thumbnail'] ) : ?>
									<figure class="course-item__thumbnail">
										<?php echo wp_kses_post( $course['thumbnail'] ); ?>
									</figure>
								<?php endif; ?>
								<h3 class="course-item__title"><?php echo esc_html( $course['title'] ); ?></h3>
								<?php if ( $course['education'] ) : ?>
									<span class="course-item__education"><?php echo esc_html( $course['education'] ); ?></span>
								<?php endif; ?>
								<?php if ( $course['duration'] ) : ?>
									<span class="course-item__duration"><?php echo esc_html( $course['duration'] ); ?></span>
								<?php endif; ?>
								<?php if ( $course['additional'] ) : ?>
									<span class="course-item__additional"><?php echo esc_html( $course['additional'] ); ?></span>
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
