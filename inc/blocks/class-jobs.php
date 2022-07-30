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
class Jobs extends Abstract_Block {

	/**
	 * Simple block constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->title       = __( 'Jobs', 'publicacademy' );
		$this->description = __( 'Jobs listing with filters and sorting', 'publicacademy' );
		$this->icon        = 'pressthis';
		$this->align       = 'full';
	}



	/**
	 * Enqueue assets for this block.
	 */
	public function enqueue_assets() {
		$this->enqueue_style( 'block_jobs', 'blocks/jobs.css' );
		$this->enqueue_script( 'block_jobs', 'blocks/jobs.js' );
	}



	/**
	 * Run single job listing hooks to render item
	 */
	public function init() {
		add_action( 'wlc_jobs_listing_single', array( __CLASS__, 'job_wrapper_open' ), 5 );
		add_action( 'wlc_jobs_listing_single', array( __CLASS__, 'job_logo' ), 10 );
		add_action( 'wlc_jobs_listing_single', array( __CLASS__, 'job_title' ), 15 );
		add_action( 'wlc_jobs_listing_single', array( __CLASS__, 'job_details' ), 20 );
		add_action( 'wlc_jobs_listing_single_details', array( __CLASS__, 'job_featured_badge' ), 5 );
		add_action( 'wlc_jobs_listing_single_details', array( __CLASS__, 'job_erly_badge' ), 10 );
		add_action( 'wlc_jobs_listing_single_details', array( __CLASS__, 'job_categories' ), 15 );
		add_action( 'wlc_jobs_listing_single_details', array( __CLASS__, 'job_company' ), 20 );
		add_action( 'wlc_jobs_listing_single_details', array( __CLASS__, 'job_tags' ), 25 );
		add_action( 'wlc_jobs_listing_single', array( __CLASS__, 'job_wrapper_close' ), 25 );
	}

	/**
	 * Jobs listing single item wrapper (link).
	 */
	public static function job_wrapper_open() {
		?>
			<a class="single-job" href="<?php the_permalink(); ?>">
		<?php
	}

	/**
	 * Get listing single item image (logo)
	 */
	public static function job_logo() {
		if ( has_post_thumbnail( get_the_ID() ) ) {
			the_post_thumbnail( 'post-thumbnail', array( 'class' => 'single-job__logo' ) );
		} else {
			if ( get_field( 'erly_vacature', get_the_ID() ) ) {
				?>
				<img class="single-job__logo" src="<?php echo esc_url( get_images_uri() ); ?>jobs-erly.png" alt="<?php echo esc_attr( get_the_title() ); ?>">
				<?php
			} else {
				?>
				<img class="single-job__logo" src="<?php echo esc_url( get_images_uri() ); ?>jobs-placeholder.png" alt="<?php echo esc_attr( get_the_title() ); ?>">
				<?php
			}
		}
	}

	/**
	 * Jobs listing single item title
	 */
	public static function job_title() {
		the_title( '<h2 class="single-job__title h3">', '</h2>' );
	}

	/**
	 * Jobs listing single item details wrapper
	 */
	public static function job_details() {
		?>
		<div class="single-job__details"><?php do_action( 'wlc_jobs_listing_single_details' ); ?></div>
		<?php
	}

	/**
	 * Jobs listing single featured badge
	 */
	public static function job_featured_badge() {
		if ( get_field( 'featured', get_the_ID() ) ) {
			?>
			<span class="badge badge--featured">
				<?php esc_html_e( 'Uitgelichte vacature', 'publicacademy' ); ?>
			</span>
			<?php
		}
	}

	/**
	 * Jobs listing single erly vacancy badge
	 */
	public static function job_erly_badge() {
		if ( get_field( 'erly_vacature', get_the_ID() ) ) {
			?>
			<span class="badge badge--erly">
				<?php esc_html_e( 'ERLY vacature', 'publicacademy' ); ?>
			</span>
			<?php
		}
	}

	/**
	 * Jobs listing single item categories
	 */
	public static function job_categories() {
		$categories = get_the_terms( get_the_ID(), 'jobs_categories' );
		if ( $categories ) {
			foreach ( $categories as $category ) {
				?>
				<span class="category">
					<?php echo esc_html( $category->name ); ?>
				</span>
				<?php
			}
		}
	}

	/**
	 * Jobs listing single item company name
	 */
	public static function job_company() {
		$company = get_field( 'company', get_the_ID() );
		if ( $company ) {
			?>
			<span class="company">
					<?php echo esc_html( $company ); ?>
				</span>
			<?php
		}
	}

	/**
	 * Jobs listing single item tags
	 */
	public static function job_tags() {
		$tags = get_the_terms( get_the_ID(), 'jobs_tags' );
		if ( $tags ) {
			foreach ( $tags as $tag ) {
				?>
				<span class="tag">
					<?php echo esc_html( $tag->name ); ?>
				</span>
				<?php
			}
		}
	}

	/**
	 * Jobs listing single item wrapper (link).
	 */
	public static function job_wrapper_close() {
		?>
			</a>
		<?php
	}



	/**
	 * Get CPT Jobs
	 *
	 * @return \WP_Query Jobs posts.
	 */
	private function get_jobs() {
		return new \WP_Query(
			array(
				'posts_per_page' => 12,
				'post_type'      => 'jobs',
				'post_status'    => 'publish',
				'meta_query'     => array(
					'relation' => 'OR',
					array(
						'key'     => 'featured',
						'compare' => 'EXISTS',
					),
					array(
						'key'     => 'featured',
						'compare' => 'NOT EXISTS',
					),
				),
				'meta_key'       => 'featured',
				'orderby'        => array(
					'meta_value' => 'DESC',
					'date'       => 'DESC',
				),
			)
		);
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

		$content       = get_field( $this->block_name );
		$data          = explode( '_', $block['id'] )[1];
		$id            = isset( $block['anchor'] ) ? $block['anchor'] : $data;
		$class         = $this->get_block_class( $block );
		$jobs          = $this->get_jobs();
		$check_facetwp = shortcode_exists( 'facetwp' );

		?>
		<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">

			<?php if ( $content['heading'] || $content['subheading'] ) : ?>
				<div class="container-wide content content--top">
					<?php if ( isset( $content['subheading'] ) ) : ?>
						<span class="content__subheading subheading"><?php echo esc_html( $content['subheading'] ); ?></span>
					<?php endif; ?>
					<?php if ( isset( $content['heading'] ) ) : ?>
						<h1 class="content__heading"><?php echo esc_html( $content['heading'] ); ?></h1>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( $jobs ) : ?>
				<div class="container-wide content">
					<div class="jobs__trigger" id="jobs-filter-trigger">
						<?php echo esc_html_e( 'Filter & sorteer', 'publicacademy' ); ?>
					</div>
					<aside class="jobs__filters">
						<div class="filter jobs__listing__navigation">
							<?php echo $check_facetwp ? do_shortcode( '[facetwp facet="jobs_sorting"]' ) : ''; ?>		
						</div>
						<div class="filter">
							<span class="filter__title h3"><?php esc_html_e( 'Categorie', 'publicacademy' ); ?></span>
							<?php echo do_shortcode( '[facetwp facet="jobs_categories"]' ); ?>
						</div>
						<div class="filter">
							<span class="filter__title h3"><?php esc_html_e( 'Sector', 'publicacademy' ); ?></span>
							<?php echo do_shortcode( '[facetwp facet="jobs_sectors"]' ); ?>
						</div>
						<div class="filter">
							<span class="filter__title h3"><?php esc_html_e( 'Locatie', 'publicacademy' ); ?></span>
							<?php echo $check_facetwp ? do_shortcode( '[facetwp facet="jobs_location"]' ) : ''; ?>
						</div>
						<div class="filter">
							<span class="filter__title h3"><?php esc_html_e( 'Soort', 'publicacademy' ); ?></span>
							<?php echo $check_facetwp ? do_shortcode( '[facetwp facet="jobs_erly"]' ) : ''; ?>
						</div>
					</aside>

					<div class="jobs__listing">

						<div class="jobs__listing__navigation navigation--top">
							<?php echo $check_facetwp ? do_shortcode( '[facetwp facet="jobs_sorting"]' ) : ''; ?>
							<?php echo $check_facetwp ? '<div class="site-pagination">' . do_shortcode( '[facetwp facet="pagination"]' ) . '</div>' : ''; ?>
						</div>

						<div class="jobs__listing__items">
						<?php while ( $jobs->have_posts() ) : ?>
							<?php $jobs->the_post(); ?>
							<?php do_action( 'wlc_jobs_listing_single' ); ?>
						<?php endwhile; ?>
						</div>

						<div class="jobs__listing__navigation  navigation--bottom">
							<?php echo $check_facetwp ? '<div class="site-pagination">' . do_shortcode( '[facetwp facet="pagination"]' ) . '</div>' : ''; ?>
						</div>

					</div>
				</div>

			<?php endif; ?>

		</section>
		<?php
	}


}
