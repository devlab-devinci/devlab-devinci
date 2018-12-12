<?php
/**
* Plugin Name: KC Extension For Seclek
* Plugin URI: https://themeforest.net/user/themeregion/portfolio
* Description: KC Extension for Seclek theme. Without this plugin seclek kc element will not load.
* Version:  1.1
* Author: ThemeRegion Team
* Author URI: https://themeregion.com/
* License:  GPL2
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You should not be here' );
}

// Define Constants
defined( 'TR_PATH' ) or define( 'TR_PATH', plugin_dir_path( __FILE__ ) );
defined( 'TR_URL' ) or define( 'TR_URL',  plugin_dir_url( __FILE__ ) );
defined( 'TR_KC_CONFIG' ) or define( 'TR_KC_CONFIG', TR_PATH . 'kc-config/' );
defined( 'TR_KC_ELEMENT' ) or define( 'TR_KC_ELEMENT', TR_PATH . 'kc-elements/' );
defined( 'TR_VERSION' ) or define( 'TR_VERSION', '1.1' );

if ( ! class_exists( 'Seclek_KC_EXT' ) ) {

	class Seclek_KC_EXT {

		public function __construct() {			

			// checking if visual composer is active
			if( !function_exists('is_plugin_active') ) {			
				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );				
			}

			if ( ! is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
				set_transient( 'tr_kc_notice', true, 5 );				
				add_action( 'admin_notices',  array( $this, 'tr_kc_plugin_activate_notice' ) );
			} else {
			    $this->seclek_load_kc_ext();
				$this->seclek_load_kc_ext_textdomain();
				add_action('init', array( $this, 'tr_kc_template_path' ) );
			}
		}

		public function tr_kc_plugin_activate_notice(){
 
		    /* Check transient, if available display notice */
		    if( get_transient( 'tr_kc_notice' ) ){
		    	$class = 'notice notice-error';
				$message = __( 'This plugin requires King Composer plugin activated to work. Please activate your King Composer plugin first.', 'seclek' );

				printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 

		        /* Delete transient, only display this notice once. */
		        delete_transient( 'tr_kc_notice' );
		    }
		}
		 
		public function tr_kc_template_path(){
		 
			global $kc;
			$kc->add_content_type( array( 'folio', 'post' ) );
			$kc->set_template_path( plugin_dir_path( __FILE__ ) .'/kc-elements/' );		 
		}

		public function seclek_load_kc_ext() {

			$dir = TR_KC_ELEMENT; 
			$files = scandir( $dir, 1 ); 
			foreach ( $files as $file ) { 
				if ( '.' !== $file && '..' !== $file ) { 
					if ( is_file( TR_KC_ELEMENT . $file ) ) { 
						require_once TR_KC_ELEMENT . $file; 
					} 
				} 
			}
		}

		/**
		 * Load plugin textdomain.
		 */
		public function seclek_load_kc_ext_textdomain() {
		  	load_plugin_textdomain( 'seclek', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}
	}

	new Seclek_KC_EXT;
}
 