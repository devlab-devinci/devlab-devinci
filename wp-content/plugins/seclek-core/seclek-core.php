<?php
/**
* Plugin Name: Seclek Core
* Plugin URI: https://themes.themeregion.com/seclek
* Description: Core frameworks of Seclek theme. The theme's functionalities depends on this plugin.
* Version:  1.1
* Author: ThemeRegion Team
* Author URI: https://themeregion.com/
* License:  GPL2
*/

// Define Constants
defined( 'TR_ROOT' ) or define( 'TR_ROOT', dirname( __FILE__ ) );
defined( 'TR_INC' ) or define( 'TR_INC', dirname( __FILE__ ) . '/inc/' );
defined( 'TR_LIB' ) or define( 'TR_LIB', dirname( __FILE__ ) . '/lib/' );
defined( 'TR_DIR' ) or define( 'TR_DIR',  plugin_dir_url( __FILE__ ) );
defined( 'TR_URI' ) or define( 'TR_URI', get_template_directory_uri() );
defined( 'TR_IMGDIR' ) or define( 'TR_IMGDIR', TR_URI . '/assets/images/' );
defined( 'TR_WIE_PATH' ) or define( 'TR_WIE_PATH', TR_INC . 'widgets/' );
defined( 'TR_VERSION' ) or define( 'TR_VERSION', '1.0' );

define( 'CS_ACTIVE_FRAMEWORK', false );
define( 'CS_ACTIVE_TAXONOMY', false );
define( 'CS_ACTIVE_SHORTCODE', false );
define( 'CS_ACTIVE_CUSTOMIZE', false );

if ( ! class_exists( 'Seclek_Core' ) ) {

	class Seclek_Core {

		public function __construct() {
			$this->seclek_load_theme_backbone();
			add_action( 'admin_head', array( $this, 'seclek_admin_scripts' ) );
			add_action( 'admin_menu', array( $this, 'seclek_dash_menu' ) );
			$this->seclek_load_core_textdomain();
		}

		// SECLEK DASH MENU
		public function seclek_dash_menu() {
		    add_menu_page(
		        __( 'Seclek', 'seclek' ),
		        __( 'Seclek', 'seclek' ),
		        'manage_options',
		        'seclek-core/seclek-dashboard.php',
		        '',
		        TR_IMGDIR . '/ico/favicon.png',
		        6
		    );

		    add_submenu_page(
		        'seclek-core/seclek-dashboard.php',
		        __( 'Install Plugins', 'seclek' ),
		        __( 'Install Plugins', 'seclek' ),
		        'manage_options',
		        'install-plugins',
		        array( $this, 'seclek_install_plugins_callback' )
		    );

		    add_submenu_page(
		        'seclek-core/seclek-dashboard.php',
		        __( 'Import Demo', 'seclek' ),
		        __( 'Import Demo', 'seclek' ),
		        'manage_options',
		        'tr-import-demo',
		        array( $this, 'seclek_import_demo_callback' )
		    );

		}

		public function seclek_install_plugins_callback() {
			wp_redirect( admin_url('themes.php?page=seclek-install-plugins') );
		}	

		public function seclek_import_demo_callback() {
			wp_redirect( admin_url('themes.php?page=tr-demo-import') );
		}	

		public function seclek_load_theme_backbone() {
			require_once TR_LIB . '/cs-framework/cs-framework.php';
			require_once TR_LIB . '/demo-importer/demo-importer.php';
			require_once TR_INC . 'post-types/post_types.php';

			/** 
			 * Include Seclek Custom Widgets
			 */
			require TR_WIE_PATH . 'tr.social.php';
			require TR_WIE_PATH . 'tr.image.title.php';
			require TR_WIE_PATH . 'tr.mailchimp.php';
			require TR_WIE_PATH . 'tr.portfolio.widget.php';

			// Enable shortcodes in text widgets
			add_filter( 'widget_text', 'do_shortcode' );
		}

		public function seclek_admin_scripts() {
			wp_enqueue_style( 'seclek-admin-style', TR_DIR . 'assets/seclek-admin.css' );
			wp_enqueue_script( 'seclek-admin-script', TR_DIR . 'assets/seclek-admin.js', array() , '1.0' , true );
		}

		/**
		 * Load plugin textdomain.
		 */
		public function seclek_load_core_textdomain() {
		  	load_plugin_textdomain( 'seclek', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

	}

	$core = new Seclek_Core;
}
