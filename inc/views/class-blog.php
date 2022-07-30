<?php
/**
 * View blog class file.
 *
 * @package wlc-starter.
 * @author  Mateusz Major
 * @link    https://whitelabelcoders.com/
 */

namespace WLC\Views;

use WLC\Core\Enqueue;

/**
 * Extended index view class.
 * Home page posts template.
 */
class Blog extends Index {

	/**
	 * Integrate with WordPress actions and filters hooks
	 */
	public function hooks() {
		parent::hooks();
		add_action( 'pre_get_posts', array( $this, 'main_query_filter' ) );
	}


	/**
	 * Custom posts per page number.
	 *
	 * @param \WP_Query $query WordPress query obj.
	 */
	public function main_query_filter( $query ) {
		$query->set( 'posts_per_page', 12 );
	}



	/**
	 * Here you can add hooks only releted with current view.
	 */
	public function view_hooks() {
		parent::view_hooks();
		if ( is_home() ) {
			add_action( 'wlc_before_content', array( __CLASS__, 'blog_title' ), 2 );
			add_action( 'wlc_before_content', array( __CLASS__, 'blog_filters' ), 4 );
			add_action( 'wlc_before_loop', array( __CLASS__, 'open_container' ), 10 );
			add_action( 'wlc_after_loop', array( __CLASS__, 'close_container' ), 20 );
			add_action( 'wlc_after_loop', array( __CLASS__, 'blog_pagination' ), 25 );
			add_action( 'wlc_entry', array( $this, 'loop_entry' ), 5 );
		}
	}



	/**
	 * Add archive title
	 */
	public static function blog_title() {
		?>
			<h1 class="site-title"><?php echo esc_html( single_post_title() ); ?></h1>
		<?php
	}



	/**
	 * Add archive filters
	 */
	public static function blog_filters() {
		if ( shortcode_exists( 'facetwp' ) ) {
			?>
			<div class="site-filters">
				<?php echo do_shortcode( '[facetwp facet="categories"]' ); ?>
				<?php echo do_shortcode( '[facetwp facet="pagination"]' ); ?>
			</div>
			<?php
		}
	}



	/**
	 * Open container for post loop
	 */
	public static function open_container() {
		?>
		<div class="posts-grid">
		<?php
	}



	/**
	 * Close container for post loop
	 */
	public static function close_container() {
		?>
		</div>
		<?php
	}



	/**
	 * Bottom pagination
	 */
	public static function blog_pagination() {
		if ( shortcode_exists( 'facetwp' ) ) {
			?>
			<div class="site-pagination">
				<?php echo do_shortcode( '[facetwp facet="pagination"]' ); ?>
			</div>
			<?php
		}
	}


	/**
	 * Get post thumbnail.
	 *
	 * @param int $post_id Post ID.
	 *
	 * @return void
	 */
	public function post_thumbnail( $post_id ) {
		$thumbnail = get_the_post_thumbnail( $post_id, 'large' );
		if ( $thumbnail ) {
			?>
			<figure class="post-item__thumbnail">
				<?php echo wp_kses_post( $thumbnail ); ?>
			</figure>
			<?php
		}
	}



	/**
	 * Post categories.
	 *
	 * @param int $post_id Post ID.
	 *
	 * @return void
	 */
	public function post_categories( $post_id ) {
		$categories = wp_get_post_categories( $post_id, array( 'fields' => 'names' ) );
		if ( $categories ) {
			?>
			<div class="post-item__categories subheading">
				<?php echo esc_html( implode( ', ', $categories ) ); ?>
			</div>
			<?php
		}
	}



	/**
	 * Display single post within the loop from template file
	 */
	public function loop_entry() {
		?>
		<a class="post-item" href="<?php the_permalink(); ?>">
			<?php $this->post_thumbnail( get_the_ID() ); ?>
			<?php $this->post_categories( get_the_ID() ); ?>
			<?php the_title( '<h2 class="post-item__title h3">', '</h2>' ); ?>
		</a>
		<?php
	}
}
