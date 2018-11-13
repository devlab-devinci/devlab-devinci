<?php

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'seclek_enqueue_scripts' ) ) {
	function seclek_enqueue_scripts() {

		// seclek theme options
		$seclek = wp_get_theme();
		global $seclekOptions;
		// general settings
		if ( ( is_admin() ) ) {
			return;
		}

        $seclekCSS = array( 'bootstrap.min', 'font-awesome.min', 'magnific-popup', 'slick', 'structure', 'main', 'default', 'responsive' );
        $seclekJS = array( 'bootstrap.min', 'slick.min', 'jquery.nav', 'countdown', 'counterup.min', 'magnific-popup.min', 'inview.min', 'jarallax.min', 'jquery.nav', 'popper.min', 'waypoints.min', 'main', 'navigation', 'skip-link-focus-fix' );

        wp_enqueue_style( 'seclek-style', get_stylesheet_uri() );        
        foreach( $seclekCSS as $cssFiles ) {
        	$cssLabel = str_replace( '.', '-', $cssFiles );
        	wp_enqueue_style( $cssLabel, SECLEK_CSSDIR . $cssFiles . '.css', '', apply_filters( 'tr_version_filter', $seclek->get( 'Version' ) ) );
        }

        // Add TinyMCE style
        add_editor_style();
		
		// Default Google Fonts
		wp_enqueue_style( 'seclek-fonts', seclek_fonts(), array(), apply_filters( 'tr_version_filter', $seclek->get( 'Version' ) ) );

        // Custom CSS
        if ( isset( $seclekOptions['cr_skin'] ) && $seclekOptions['cr_skin'] == 'custom' ) :
            wp_enqueue_style( 'seclek-custom-skin-style', admin_url( 'admin-ajax.php' ) . '?action=seclek_custom_skin_css', '', true, 'all' );
        endif;

        if ( $seclekOptions['cr_rtl'] == 'enable' ) :
        wp_enqueue_style( 'tr-rtl', SECLEK_URI . '/style-rtl.css', '', apply_filters( 'tr_version_filter', $seclek->get( 'Version' ) ) );
        endif;

        wp_enqueue_style( 'seclek-dynamic-style', admin_url( 'admin-ajax.php' ) . '?action=seclek_dynamic_css', '', true, 'all' );
        
		// including jQuery plugins
		wp_localize_script( 'jquery', 'get',
            array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'siteurl' => get_template_directory_uri(),
            )
        );

        wp_enqueue_script ( 'jquery' );
        wp_enqueue_script( 'html5shiv', SECLEK_JSDIR . 'html5shiv.min.js', array( '' ), apply_filters( 'tr_version_filter', $seclek->get( 'Version' ) ), false );
        wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

        wp_enqueue_script( 'html5shiv', SECLEK_JSDIR . 'respond.min.js', array( '' ), apply_filters( 'tr_version_filter', $seclek->get( 'Version' ) ), false );
        wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

        $jsFinder = '(function(html){html.className = html.className.replace(/\bno-js\b/,"js")})(document.documentElement);';
        wp_add_inline_script( 'jquery', $jsFinder );

        foreach( $seclekJS as $jsFiles ) {
        	$jsLabel = str_replace( '.', '-', $jsFiles );
        	wp_enqueue_script( $jsLabel, SECLEK_JSDIR . $jsFiles . '.js', 'jquery', apply_filters( 'tr_version_filter', $seclek->get( 'Version' ) ), true );
        }

        if ( $seclekOptions['cr_rtl'] == 'enable' ) :
        wp_enqueue_script( 'tr-sliders-rtl', SECLEK_JSDIR . 'sliders-rtl.js', array( 'jquery' ), apply_filters( 'tr_version_filter', $seclek->get( 'Version' ) ), false );
        else: 
        wp_enqueue_script( 'tr-sliders', SECLEK_JSDIR . 'sliders.js', array( 'jquery' ), apply_filters( 'tr_version_filter', $seclek->get( 'Version' ) ), false );
        endif;

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

        /* Add Custom JS */
		if ( !empty( $seclekOptions['cr_js_editor_header'] ) ) {
			wp_add_inline_script( 'jquery-migrate', $seclekOptions['cr_js_editor_header'] );
		}
        if ( !empty( $seclekOptions['cr_js_editor_footer'] ) ) {
			wp_add_inline_script( 'tr-main', $seclekOptions['cr_js_editor_footer'] );
		}
	}

    add_action( 'wp_enqueue_scripts', 'seclek_enqueue_scripts', 9999 );
}

// Custom row styles for onepage site type+-.
if ( ! function_exists('seclek_dynamic_css' ) ) {
    function seclek_dynamic_css() {
        require_once get_template_directory() . '/assets/css/dynamic.css.php';
        wp_die();
    }
	add_action( 'wp_ajax_nopriv_seclek_dynamic_css', 'seclek_dynamic_css' );
	add_action( 'wp_ajax_seclek_dynamic_css', 'seclek_dynamic_css' );
}

// Custom skin style
if ( ! function_exists('seclek_custom_skin_css' ) ) {
    function seclek_custom_skin_css() {
        require_once get_template_directory() . '/assets/css/custom.skin.css.php';
        wp_die();
    }
	add_action( 'wp_ajax_nopriv_seclek_custom_skin_css', 'seclek_custom_skin_css' );
	add_action( 'wp_ajax_seclek_custom_skin_css', 'seclek_custom_skin_css' );
}

// Carrito Fonts URL
if ( !function_exists('seclek_fonts') ){
	function seclek_fonts() {
	    $font_url = '';

	    if ( 'off' !== _x( 'on', 'Google font: on or off', 'seclek' ) ) {
	        $font_url = add_query_arg( 'family', urlencode( 'Nunito:300,400,600,700,800' ), "//fonts.googleapis.com/css" );
	    }
	    return $font_url;
	}
}