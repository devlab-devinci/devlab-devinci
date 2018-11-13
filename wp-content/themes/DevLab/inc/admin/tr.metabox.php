<?php

if(!function_exists('seclek_metabox_options')){

    function seclek_metabox_options( $options ){

        $options      = array();
        global $post;

        // -----------------------------------------
        // Page Metabox Options                    -
        // -----------------------------------------
        $options[]    = array(

            'id'        => '_page_information',
            'title'     => esc_html__('Page Options', 'seclek'),
            'post_type' => array( 'page', 'post' ),
            'context'   => 'normal',
            'priority'  => 'default',
            'sections'  => array(
                
                array(
                    'name'  => 'page_layout_info',
                    'title' => esc_html__('General Options', 'seclek'),
                    'icon'  => 'fa fa-th-large',
                    'fields' => array(
                        array(
                            'id'    => 'page_sidebar',
                            'type'  => 'switcher',
                            'title' => esc_html__('Enable Sidebar', 'seclek'),
                            'default' => true
                        ),
                        array(
                            'id'    => 'siderbar_position',
                            'type'  => 'select',
                            'title' => esc_html__('Sidebar Position', 'seclek'),
                            'options'    => array(
                                'left'      => esc_html__( 'Left', 'seclek'),
                                'right'     => esc_html__( 'Right', 'seclek'),
                            ),
                            'default'    => 'left',
                            'dependency' => array( 'page_sidebar', '==', 'true' )
                        ),
                    ),
                ),

                array(
                    'name'  => 'page_header_info',
                    'title' => esc_html__('Breadcrumb', 'seclek'),
                    'icon'  => 'fa fa-arrow-circle-o-up',
                    'fields' => array(
                        array(
                            'id'    => '_show_breadcrumb',
                            'type'  => 'switcher',
                            'title' => esc_html__('Show Breadcrumb', 'seclek'),
                            'default' => true
                        ),
                        array(
                            'id'    => '_page_title',
                            'type'  => 'text',
                            'title' => esc_html__('Title', 'seclek'),
                            'dependency' => array( '_show_breadcrumb', '==', 'true' )
                        ),
                        array(
                            'id'    => '_page_subtitle',
                            'type'  => 'text',
                            'title' => esc_html__('Subtitle', 'seclek'),
                            'dependency' => array( '_show_breadcrumb', '==', 'true' )
                        ),
                        array(
                            'id'    => '_page_backgroud',
                            'type'  => 'upload',
                            'title' => esc_html__('Background Image', 'seclek'),
                            'dependency' => array( '_show_breadcrumb', '==', 'true' )
                        ),
                        array(
                            'title'          => esc_html__( 'Page Title Color', 'seclek' ),
                            'id'            => 'page_title_color',
                            'type'          => 'color_picker',
                            'default'       => '#ffffff',
                            'dependency' => array( '_show_breadcrumb', '==', 'true' )
                        ),
                        array(

                            'title'          => esc_html__( 'Page Subtitle Color', 'seclek' ),
                            'id'            => 'page_subtitle_color',
                            'type'          => 'color_picker',
                            'default'       => '#ffffff',
                            'dependency' => array( '_show_breadcrumb', '==', 'true' )
                        ),
                    ),
                ), 
                array(
                    'name'  => 'page_other_info',
                    'title' => esc_html__('Headers Options', 'seclek'),
                    'icon'  => 'fa fa-th-large',
                    'post_type'     => 'page',
                    'fields' => array(                        
                        array(
                            'id'             => 'sk_menu_id',
                            'type'           => 'select',
                            'title'          => esc_html__( 'Select Menu', 'seclek' ),
                            'options'        => 'categories',
                            'query_args'     => array(
                                'taxonomy'     => 'nav_menu',
                                'orderby'      => 'name',
                                'order'        => 'DESC',
                            ),
                            'default_option' => 'Select a Menu',
                        ),
                        array(
                            'id'       => 'sk_btn_mini',
                            'type'     => 'select',
                            'title'    => esc_html__( 'Select Button / Mini Cart Here', 'seclek' ),
                            'options'  => array(
                                'button'    => 'Button',
                                'mini-cart' => 'Mini Cart',
                            ),
                            'default'  => 'button',
                            ),

                    ),
                ),               
            ),
        );   

        // -----------------------------------------
        // Folio Metabox Options                    -
        // -----------------------------------------
        $options[]    = array(

            'id'        => '_folio_information',
            'title'     => esc_html__('Portfolio Options', 'seclek'),
            'post_type' => array( 'folio' ),
            'context'   => 'normal',
            'priority'  => 'default',
            'sections'  => array(
                
                array(
                    'name'  => 'page_layout_info',
                    'title' => esc_html__('General Options', 'seclek'),
                    'icon'  => 'fa fa-th-large',
                    'fields' => array(
                        array(
                            'id'    => 'page_sidebar',
                            'type'  => 'switcher',
                            'title' => esc_html__('Enable Sidebar', 'seclek'),
                            'default' => true
                        ),
                    ),
                ),

                array(
                    'name'  => 'page_header_info',
                    'title' => esc_html__('Breadcrumb', 'seclek'),
                    'icon'  => 'fa fa-arrow-circle-o-up',
                    'fields' => array(
                        array(
                            'id'    => '_show_breadcrumb',
                            'type'  => 'switcher',
                            'title' => esc_html__('Show Breadcrumb', 'seclek'),
                            'default' => true
                        ),
                        array(
                            'id'    => '_page_title',
                            'type'  => 'text',
                            'title' => esc_html__('Title', 'seclek'),
                            'dependency' => array( '_show_breadcrumb', '==', 'true' )
                        ),
                        array(
                            'id'    => '_page_subtitle',
                            'type'  => 'text',
                            'title' => esc_html__('Subtitle', 'seclek'),
                            'dependency' => array( '_show_breadcrumb', '==', 'true' )
                        ),
                        array(
                            'id'    => '_page_backgroud',
                            'type'  => 'upload',
                            'title' => esc_html__('Background Image', 'seclek'),
                            'dependency' => array( '_show_breadcrumb', '==', 'true' )
                        ),
                        array(
                            'title'          => esc_html__( 'Page Title Color', 'seclek' ),
                            'id'            => 'page_title_color',
                            'type'          => 'color_picker',
                            'default'       => '#ffffff',
                            'dependency' => array( '_show_breadcrumb', '==', 'true' )
                        ),
                        array(

                            'title'          => esc_html__( 'Page Subtitle Color', 'seclek' ),
                            'id'            => 'page_subtitle_color',
                            'type'          => 'color_picker',
                            'default'       => '#ffffff',
                            'dependency' => array( '_show_breadcrumb', '==', 'true' )
                        ),
                    ),
                ),
                array(
                    'name'  => 'folio_info',
                    'title' => esc_html__('Portfolio Information', 'seclek'),
                    'icon'  => 'fa fa-address-book-o',
                    'fields' => array(
                        array(
                            'id'    => '_folio_client',
                            'type'  => 'text',
                            'title' => esc_html__('Client', 'seclek'),
                        ),
                        array(
                            'id'    => '_folio_budget',
                            'type'  => 'text',
                            'title' => esc_html__('Budget', 'seclek'),
                        ),
                    ),
                ),                                
            ),
        );        

        return $options;
    }
}
add_filter( 'cs_metabox_options', 'seclek_metabox_options' );
