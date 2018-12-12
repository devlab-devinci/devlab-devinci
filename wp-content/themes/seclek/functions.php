<?php
/**
 * Seclek functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Seclek
 */
defined( 'SECLEK_URI' ) or define( 'SECLEK_URI', get_template_directory_uri() );
defined( 'SECLEK_PATH' ) or define( 'SECLEK_PATH', get_template_directory() );
defined( 'SECLEK_INC_PATH' ) or define( 'SECLEK_INC_PATH', get_template_directory() . '/inc/' );
defined( 'SECLEK_LIB_PATH' ) or define( 'SECLEK_LIB_PATH', get_template_directory() . '/inc/lib/' );
defined( 'SECLEK_PLUGINS' ) or define( 'SECLEK_PLUGINS', get_template_directory() . '/inc/plugins/' );
defined( 'SECLEK_ADMIN_PATH' ) or define( 'SECLEK_ADMIN_PATH', get_template_directory() . '/inc/admin/' );
defined( 'SECLEK_VC_PATH' ) or define( 'SECLEK_VC_PATH', get_template_directory() . '/inc/admin/vc-custom' );
defined( 'SECLEK_CSSDIR' ) or define( 'SECLEK_CSSDIR', SECLEK_URI . '/assets/css/' );
defined( 'SECLEK_JSDIR' ) or define( 'SECLEK_JSDIR', SECLEK_URI . '/assets/js/' );
defined( 'SECLEK_IMGDIR' ) or define( 'SECLEK_IMGDIR', SECLEK_URI . '/assets/images/' );

if ( ! function_exists( 'seclek_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function seclek_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Seclek, use a find and replace
		 * to change 'seclek' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'seclek', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary-nav' => esc_html__( 'Primary', 'seclek' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'seclek_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_image_size( 'seclek_blog_thumb', 800, 492, true );
		add_image_size( 'seclek_folio_thumb', 750, 578, true );
		
		// Add WooCommerce Support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
endif;
add_action( 'after_setup_theme', 'seclek_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function seclek_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'seclek_content_width', 640 );
}
add_action( 'after_setup_theme', 'seclek_content_width', 0 );

/**
 * Include custom files for TR theme
 */
require SECLEK_LIB_PATH . 'tr.enqueue.php';
require SECLEK_LIB_PATH . 'tr.breadcrumb.php';
require SECLEK_INC_PATH . 'actions.config.php';
require SECLEK_INC_PATH . 'custom.header.php';
require SECLEK_INC_PATH . 'template.tags.php';
require SECLEK_INC_PATH . 'template.functions.php';
require SECLEK_INC_PATH . 'comments.callback.php';
require SECLEK_INC_PATH . 'customizer.php';
require SECLEK_LIB_PATH . 'tr.navwalker.php';
require SECLEK_LIB_PATH . 'tr.sidebar.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require SECLEK_INC_PATH . 'jetpack.php';
}

/**
 * Include admin options for tr theme
 */
if ( class_exists('Seclek_Core') ) {
	require SECLEK_ADMIN_PATH . 'tr.metabox.php';
	require SECLEK_LIB_PATH . 'tr.demo.importer.php';
}
if ( class_exists('ReduxFrameworkPlugin') ) {
	require SECLEK_ADMIN_PATH . 'tr.options.php';
}
require SECLEK_LIB_PATH . 'tr.sidebar.php';
/*
 * Seclek TGMPA Integration
 */
require SECLEK_LIB_PATH . 'class-tgm-plugin-activation.php';
require SECLEK_ADMIN_PATH . 'tr.required.plugins.php';