<?php
namespace WLC\Core;

class Theme {

	/**
	 * Integrate with WordPress hooks and filters
	 */
	public function hooks() {
		add_action( 'init', array( new Svg_Support(), 'enable' ) );
		add_action( 'after_setup_theme', array( new ACF(), 'hooks' ) );
		add_action( 'after_setup_theme', array( $this, 'theme_support' ) );
		add_action( 'after_setup_theme', array( $this, 'image_sizes' ) );
		add_action( 'after_setup_theme', array( $this, 'register_menus' ) );
		add_action( 'widgets_init', array( $this, 'register_sidebars' ) );
		add_action( 'acf/init', array( $this, 'theme_settings' ) );
		add_action( 'init', array( $this, 'register_custom_post_types' ) );
		add_action( 'init', array( $this, 'register_custom_taxonomies' ) );
		add_action( 'template_redirect', array( $this, 'categories_archive_redirection' ) );
	}



	/**
	 * Theme support for custom logo.
	 */
	public function theme_support() {
		add_theme_support( 'align-wide' );
		add_theme_support( 'core-block-patterns' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'dark-editor-style' );
		add_theme_support( 'editor-color-palette' );
		add_theme_support( 'editor-gradient-presets' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'featured-content' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'widgets' );
		add_theme_support( 'widgets-block-editor' );
		add_theme_support( 'woocommerce' );
	}


	/**
	 * Theme support for custom image sizes.
	 */
	public function image_sizes() {
		add_image_size( 'default-image-content', 560, 400 );
		add_image_size( 'quotes', 412, 442 );
	}

	/**
	 * Register nav menus
	 */
	public function register_menus() {
		register_nav_menus(
			array(
				'header_menu'     => __( 'Header Menu', 'WLC' ),
				'footer_menu1'    => __( 'Footer Menu 1', 'WLC' ),
				'footer_menu2'    => __( 'Footer Menu 2', 'WLC' ),
				'footer_menu3'    => __( 'Footer Menu 3', 'WLC' ),
				'copyrights_menu' => __( 'Copyrights menu', 'WLC' ),
			)
		);
	}



	/**
	 * Register widget areas
	 */
	public function register_sidebars() {
		register_sidebar(
			array(
				'name'          => __( 'Block footer 1 ', 'WLC' ),
				'id'            => 'block_footer_1',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => __( 'Block footer 2 ', 'WLC' ),
				'id'            => 'block_footer_2',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => __( 'Block footer 3 ', 'WLC' ),
				'id'            => 'block_footer_3',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => __( 'Block footer 4 ', 'WLC' ),
				'id'            => 'block_footer_4',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
			)
		);
	}



	/**
	 * Add options page with theme settings
	 */
	public function theme_settings() {
		if ( function_exists( 'acf_add_options_sub_page' ) ) {
			acf_add_options_sub_page(
				array(
					'page_title'  => __( 'Theme Settings', 'WLC' ),
					'menu_title'  => __( 'Theme Settings', 'WLC' ),
					'parent_slug' => 'themes.php',
				)
			);
		}
	}




	/**
	 * Class loader
	 */
	public function class_loader( array $classes ) {
		foreach ( $classes as $class ) {
			$object = new $class;
			$object->hooks();
			if ( method_exists( $object, 'init' ) ) {
				$object->init();
			}
		}
	}



	/**
	 * Register Custom Post Types
	 */
	public function register_custom_post_types() {
		register_post_type(
			'course',
			array(
				'labels'             => array(
					'name'          => __( 'Courses', 'publicacademy' ),
					'singular_name' => __( 'Course', 'publicacademy' ),
				),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'menu_icon'          => 'dashicons-welcome-learn-more',
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'course' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'show_in_rest'       => true,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'thumbnail' ),
			)
		);
		register_post_type(
			'maat',
			array(
				'labels'             => array(
					'name'          => __( 'Maats', 'publicacademy' ),
					'singular_name' => __( 'Maat', 'publicacademy' ),
				),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'menu_icon'          => 'dashicons-groups',
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'maat' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'show_in_rest'       => true,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),

			)
		);
		register_post_type(
			'jobs',
			array(
				'labels'             => array(
					'name'          => __( 'Jobs', 'publicacademy' ),
					'singular_name' => __( 'Job', 'publicacademy' ),
				),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'menu_icon'          => 'dashicons-pressthis',
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'job' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'show_in_rest'       => true,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'thumbnail' ),
			)
		);
		register_post_type(
			'team',
			array(
				'labels'             => array(
					'name'          => __( 'Team', 'publicacademy' ),
					'singular_name' => __( 'Team', 'publicacademy' ),
				),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'menu_icon'          => 'dashicons-admin-users',
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'team' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'show_in_rest'       => true,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			)
		);

	}



	/**
	 * Register custom taxonomies, mainly for jobs
	 *
	 * @uses register_taxonomy()
	 */
	public function register_custom_taxonomies() {
		register_taxonomy(
			'jobs_categories',
			'jobs',
			array(
				'label'             => __( 'Categories', 'publicacademy' ),
				'labels'            => array(
					'name'          => __( 'Categories', 'publicacademy' ),
					'singular_name' => __( 'Category', 'publicacademy' ),
					'add_new_item'  => __( 'Add new category', 'publicacademy' ),
				),
				'public'            => true,
				'rewrite'           => false,
				'hierarchical'      => false,
				'show_admin_column' => true,
				'query_var'         => true,
				'show_in_rest'      => true,
			)
		);
		register_taxonomy(
			'jobs_sector',
			'jobs',
			array(
				'label'             => __( 'Sectors', 'publicacademy' ),
				'labels'            => array(
					'name'          => __( 'Sectors', 'publicacademy' ),
					'singular_name' => __( 'Sector', 'publicacademy' ),
					'add_new_item'  => __( 'Add new sector', 'publicacademy' ),
				),
				'public'            => true,
				'rewrite'           => false,
				'hierarchical'      => false,
				'show_admin_column' => true,
				'query_var'         => true,
				'show_in_rest'      => true,
			)
		);
		register_taxonomy(
			'jobs_location',
			'jobs',
			array(
				'label'             => __( 'Locations', 'publicacademy' ),
				'labels'            => array(
					'name'          => __( 'Locations', 'publicacademy' ),
					'singular_name' => __( 'Location', 'publicacademy' ),
					'add_new_item'  => __( 'Add new location', 'publicacademy' ),
				),
				'public'            => true,
				'rewrite'           => false,
				'hierarchical'      => false,
				'show_admin_column' => true,
				'query_var'         => true,
				'show_in_rest'      => true,
			)
		);
		register_taxonomy(
			'jobs_tags',
			'jobs',
			array(
				'label'             => __( 'Tags', 'publicacademy' ),
				'labels'            => array(
					'name'          => __( 'Tags', 'publicacademy' ),
					'singular_name' => __( 'Tag', 'publicacademy' ),
					'add_new_item'  => __( 'Add new tag', 'publicacademy' ),
				),
				'public'            => true,
				'rewrite'           => false,
				'hierarchical'      => false,
				'show_admin_column' => true,
				'query_var'         => true,
				'show_in_rest'      => true,
			)
		);
	}



	/**
	 * Redirect categories archive to the post's page with appropriate param.
	 *
	 * @return void
	 */
	public function categories_archive_redirection() {
		if ( is_category() ) {
			$category    = get_queried_object();
			$archive_url = get_post_type_archive_link( 'post' );
			if ( $archive_url ) {
				wp_safe_redirect( $archive_url . '?_categories=' . $category->slug, 301 );
				exit();
			}
		}
	}

}


