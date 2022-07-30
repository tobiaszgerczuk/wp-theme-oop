<?php

namespace WLC\Components;

class Footer {


	/**
	 * Integrate hooks with WordPress.
	 */
	public function hooks() {
		add_action( 'wlc_before_footer', array( __CLASS__, 'wrapper_footer_open' ), 5 );
		add_action( 'wlc_before_footer', array( __CLASS__, 'brand' ), 10 );
		add_action( 'wlc_before_footer', array( __CLASS__, 'footer_main_menu' ), 15 );
		add_action( 'wlc_before_footer', array( __CLASS__, 'footer_secondary_menu' ), 20 );
		add_action( 'wlc_before_footer', array( __CLASS__, 'footer_third_menu' ), 25 );
		add_action( 'wlc_before_footer', array( __CLASS__, 'wrapper_footer_copy' ), 25 );
		add_action( 'wlc_before_footer', array( __CLASS__, 'wrapper_footer_close' ), 30 );
		add_action( 'wp_footer', array( __CLASS__, 'gravityforms_materialdesigne_field' ), 350 );
	}

	public static function wrapper_footer_open() {
		?>
		<footer class="footer">
		<div class="container-wide">
		<div class="row">

		<?php
	}

	public static function gravityforms_materialdesigne_field() {
		?>
		<script type="text/javascript">
			if(typeof jQuery !== 'undefined') {
				jQuery(document).on('gform_post_render', function(event, form_id, current_page){
					document.querySelectorAll('.gfield').forEach((link) => {
						var input = link.querySelector('input[type="text"], input[type="email"]')
						if(input) {
							if(input.value.length > 0) {
								link.classList.add('active_input')
							}
						}
					})
				})
			}
		</script>
		<?php
	}

	public static function brand() {
		?>
		<div class="col-md-3 pl-0 pr-0">
			<?php if ( is_active_sidebar( 'block_footer_1' ) ) : ?>
				<div class="main_block_footer" role="complementary">
					<?php dynamic_sidebar( 'block_footer_1' ); ?>
				</div>
			<?php endif; ?>
		</div>

		<?php
	}

	public static function footer_main_menu() {
		$menu_locations = get_nav_menu_locations();
		$menu1          = wp_get_nav_menu_object( $menu_locations['footer_menu1'] );
		if ( $menu1 ) :
			$footer_menu1 = wp_get_nav_menu_items( $menu1->term_id );
			?>
		<div class="col-md-3 pl-0 pr-0 menu1_footer footer_accordion">
			<h2 class="footer_subheading subheading"><?php echo $menu1->name; ?></h2>
			<div class=" footer_menu_footer">
				<ul>
					<?php foreach ( $footer_menu1 as $nav_item ) { ?>
						<?php echo '<li><a href=" ' . $nav_item->url . ' " title=" ' . $nav_item->title . ' ">' . $nav_item->title . '</a></li> '; ?>
					<?php } ?>
				</ul>
			</div>
		</div>
		<?php endif; ?>
		<?php
	}

	public static function footer_secondary_menu() {
		$menu_locations = get_nav_menu_locations();
		$menu2          = wp_get_nav_menu_object( $menu_locations['footer_menu2'] );
		if ( $menu2 ) :
			$footer_menu2 = wp_get_nav_menu_items( $menu2->term_id );
			?>
			<div class="col-md-3 pl-0 pr-0 menu2_footer footer_accordion">
				<h2 class="footer_subheading subheading"><?php echo $menu2->name; ?></h2>
				<div class=" footer_menu_footer">
					<ul>
				<?php foreach ( $footer_menu2 as $nav_item ) { ?>
							<?php echo '<li><a href=" ' . $nav_item->url . ' " title=" ' . $nav_item->title . ' ">' . $nav_item->title . '</a></li> '; ?>
				<?php } ?>
					</ul>
				</div>
			</div>
		<?php endif; ?>
		<?php
	}

	public static function footer_third_menu() {
		$menu_locations = get_nav_menu_locations();
		$menu3          = wp_get_nav_menu_object( $menu_locations['footer_menu3'] );
		if ( $menu3 ) :
			$footer_menu3 = wp_get_nav_menu_items( $menu3->term_id );
			?>
			<div class="col-md-3 pl-0 pr-0 menu3_footer footer_accordion">
				<h2 class="footer_subheading subheading"><?php echo $menu3->name; ?></h2>
				<div class=" footer_menu_footer">
					<ul>
						<?php foreach ( $footer_menu3 as $nav_item ) { ?>
							<?php echo '<li><a href=" ' . $nav_item->url . ' " title=" ' . $nav_item->title . ' ">' . $nav_item->title . '</a></li> '; ?>
						<?php } ?>
					</ul>
				</div>
				<div class="hr_footer"></div>
			</div>
			<?php endif; ?>
			<?php
	}

	public static function wrapper_footer_copy() {
		?>
		<div class="row bottom_footer justify_end">
			<div class="col-md-9 footer_copyrights bottom_footer_content">
				<div class="footer_copyrights__content">
					<div class="footer_copyrights__text">
						© 2021 Public Academy
					</div>
					<?php
					$menu_locations = get_nav_menu_locations();
					$menu4          = wp_get_nav_menu_object( $menu_locations['copyrights_menu'] );
					if ( $menu4 ) :
						$copyrights_menu = wp_get_nav_menu_items( $menu4->term_id );
						?>
					<div class="footer_copyrights__links">
						<ul>
							<?php foreach ( $copyrights_menu as $nav_item ) { ?>
								<?php echo '<li><a href=" ' . $nav_item->url . ' " title=" ' . $nav_item->title . ' ">' . $nav_item->title . '</a></li> '; ?>
							<?php } ?>
						</ul>
					</div>
					<?php endif ?>
					<div class="footer_copyrights__design">
						<a href="https://www.marsmedia.nl/web-design/">Web design</a> by <a href="https://www.marsmedia.nl">Marsmedia</a>
					</div>
				</div>

			</div>
		</div>

		<?php
	}

	public static function wrapper_footer_close() {
		?>
		</div>
		</div>
		</footer>
		<?php
	}

}
