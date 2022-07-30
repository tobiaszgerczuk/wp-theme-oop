<?php
namespace WLC\Views;

class Single_Post extends Index {

	/**
	 * Integrate with WordPress actions and filters hooks
	 */
	public function hooks() {
		parent::hooks();
	}



	/**
	 * Here you can add hooks only related with current view.
	 */
	public function view_hooks() {
		parent::view_hooks();
		if ( is_singular( 'post' ) ) {
			remove_action( 'wlc_entry', array( 'WLC\Views\Index', 'page_content' ), 5 );
			add_action( 'wlc_entry', array( __CLASS__, 'post_details' ), 5 );
			add_action( 'wlc_post_details', array( __CLASS__, 'post_date' ), 5 );
			add_action( 'wlc_post_details', array( __CLASS__, 'post_categories' ), 10 );
			add_action( 'wlc_entry', array( __CLASS__, 'post_title' ), 10 );
			add_action( 'wlc_entry', array( __CLASS__, 'post_featured_image' ), 15 );
			add_action( 'wlc_entry', array( __CLASS__, 'post_content' ), 20 );
			add_action( 'wlc_entry', array( __CLASS__, 'post_footer' ), 25 );
		}
	}



	/**
	 * Post details wrapper.
	 */
	public static function post_details() {
		?>
		<div class="post__details subheading">
			<?php do_action( 'wlc_post_details' ); ?>
		</div>
		<?php
	}


	/**
	 * Post date
	 */
	public static function post_date() {
		?>
		<time class="post__details__date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) . ' ' . get_post_time( 'H:i' ) ); ?>"><?php the_date(); ?></time>
		<?php
	}



	/**
	 * Post details wrapper.
	 */
	public static function post_categories() {
		$categories = wp_get_post_categories( get_the_ID(), array( 'fields' => 'names' ) );
		if ( $categories ) {
			?>
			<div class="post__categories">
				<?php echo esc_html( implode( ', ', $categories ) ); ?>
			</div>
			<?php
		}
	}



	/**
	 * Post title
	 */
	public static function post_title() {
		the_title( '<h1 class="post__title h2">', '</h1>' );
	}



	/**
	 * Post featured image.
	 */
	public static function post_featured_image() {
		the_post_thumbnail( 'large', array( 'class' => 'post__image' ) );
	}



	/**
	 * Post content
	 */
	public static function post_content() {
		the_content();
	}

	/**
	 * Post footer
	 */
	public static function post_footer() {
		?>
		<div class="post__footer">
			<div class="share">
				<span class="share__title">
					<?php esc_html_e( 'Deel dit artikel', 'publicacademy' ); ?>:
				</span>
				<a class="share__icon icon--facebook" href="#" title="Facebook"></a>
				<a class="share__icon icon--linkedin" href="#" title="LinkedIn"></a>
				<a class="share__icon icon--whatsapp" href="#" title="WhatsApp"></a>
				<a class="share__icon icon--twitter" href="#" title="twitter"></a>
				<a class="share__icon icon--mail" href="#" title="Mail"></a>
			</div>
			<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php esc_html_e( 'Terug naar het overzicht', 'publicacademy' ); ?></a>
		</div>
		<?php
	}
}
