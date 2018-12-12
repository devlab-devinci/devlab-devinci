<?php
/*
 * Register sidebar.
 */
 if ( ! function_exists( 'seclek_widgets_init' ) ) {
     function seclek_widgets_init() {
     	global $seclekOptions;
     	$col = ( isset( $seclekOptions['widget_layout'] ) && !empty( $seclekOptions['widget_layout'] ) ) ? $seclekOptions['widget_layout'] : 4;
     	
     	register_sidebar( array(
            'name'          => esc_html__( 'Sidebar', 'seclek' ),
            'id'            => 'default-sidebar',
            'description'   => esc_html__( 'This is the general sidebar area which will load on blogs & pages', 'seclek' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget_title">',
            'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Portfolio Sidebar', 'seclek' ),
            'id'            => 'sidebar-folio',
            'description'   => esc_html__( 'This is portfolio sidebar area which will load on single portfolio pages.', 'seclek' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget_title">',
            'after_title'   => '</h3>',
        ) );
        
        if( class_exists( 'WooCommerce' ) ) :
            register_sidebar( array(
                'name'          => esc_html__( 'Shop Sidebar', 'seclek' ),
                'id'            => 'sidebar-shop',
                'description'   => esc_html__( 'This is shop sidebar area which will load on shop pages.', 'seclek' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget_title">',
                'after_title'   => '</h3>',
            ) );
        endif;

        if( isset( $seclekOptions['cr_en_widget'] ) && $seclekOptions['cr_en_widget'] == 'enable' ) :
            for( $i=1; $i<=$col; $i++ ) {
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Widget Area ', 'seclek' ) . $i,
                    'id'            => 'footer-widget-area-' . $i,
                    'description'   => esc_html__( 'This is footer widget area. Add footer widgets based on your settings.', 'seclek' ),
                    'before_widget' => '<div id="%1$s" class="%2$s">',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h3>',
                    'after_title'   => '</h3>',
                ) );
            }
        endif;
     }
    add_action( 'widgets_init', 'seclek_widgets_init' );
}