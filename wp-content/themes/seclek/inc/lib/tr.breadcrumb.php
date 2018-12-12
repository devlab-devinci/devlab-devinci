<?php
/**
 * Seclek breadcrumb optoions
 *
 * @package Seclek
 * @since 1.0
 */

if ( !function_exists( 'seclek_breadcrumb_output' ) ) {

    function seclek_breadcrumb_output(){

        global $seclekOptions;
        
        $output             = '';
        $bcImg              = '';
        $bcTitle            = '';
        $postTitle          = '';
        $bcSubtitle         = '';
        $bcTitleColor       = '#fff';
        $bcSubtitleColor    = '#fff';
        $bcSwitch           = 'enable';
        
        if ( class_exists('WooCommerce') && is_shop() ) : 

            if ( isset( $seclekOptions['tr_shop_breadcrumb'] ) && !empty( $seclekOptions['tr_shop_breadcrumb'] ) ) :
                $bc = $seclekOptions['tr_shop_breadcrumb'];
            elseif( get_post_meta( get_the_ID(), '_tr_page_breadcrumb', 'true' ) ):
                $bc = get_post_meta( get_the_ID(), '_tr_page_breadcrumb', 'true' );
            endif;

            if ( isset( $seclekOptions['tr_shop_bc_img']['url'] ) && !empty( $seclekOptions['tr_shop_bc_img']['url'] ) ) :
                $bcImg = "background-image:url('".$seclekOptions['tr_shop_bc_img']['url']."')";
            elseif ( !empty( get_post_meta( get_the_ID(), '_tr_page_bg', 'true' ) ) ) :
                $bcImg = get_post_meta( get_the_ID(), '_tr_page_bg', 'true' );
            else : 
                $bcImg = "";
            endif;

            if ( isset( $seclekOptions['tr_shop_bc_title'] ) && !empty( $seclekOptions['tr_shop_bc_title'] ) ) :
                $bcTitle = $seclekOptions['tr_shop_bc_title'];
            elseif ( !empty( get_post_meta( get_the_ID(), '_tr_page_title', 'true' ) ) ) :
                $bcTitle = get_post_meta( get_the_ID(), '_tr_page_title', 'true' );
            else : 
                $bcTitle = woocommerce_page_title(false);
            endif;

            if ( isset( $seclekOptions['tr_shop_bc_subtitle'] ) && !empty( $seclekOptions['tr_shop_bc_subtitle'] ) ) :
                $bcSubtitle = $seclekOptions['tr_shop_bc_subtitle'];
            elseif ( !empty( get_post_meta( get_the_ID(), '_tr_page_subtitle', 'true' ) ) ) :
                $bcSubtitle = get_post_meta( get_the_ID(), '_tr_page_subtitle', 'true' );
            else : 
                $bcSubtitle = "";
            endif;
            
            if ( isset( $seclekOptions['cr_sc_shop_title_color'] ) && !empty( $seclekOptions['cr_sc_shop_title_color'] ) ) :
                $bcTitleColor = $seclekOptions['cr_sc_shop_title_color'];
            else : 
                $bcTitleColor = "#ffffff";
            endif;

            if ( isset( $seclekOptions['cr_sc_shop_subtitle_color'] ) && !empty( $seclekOptions['cr_sc_shop_subtitle_color'] ) ) :
                $bcSubtitleColor = $seclekOptions['cr_sc_shop_subtitle_color'];
            else : 
                $bcSubtitleColor = "#ffffff";
            endif;
        
        elseif ( is_singular('post') ) :

            $page_meta_data = get_post_meta(get_the_ID(), '_page_information', true );
            if( !is_array( $page_meta_data ) && isset( $seclekOptions['cr_blog_details_breadcrumb'] ) && !empty( $seclekOptions['cr_blog_details_breadcrumb'] ) ){  
                    $bcSwitch = $seclekOptions['cr_blog_details_breadcrumb'];
            } elseif( is_array( $page_meta_data ) &&  $page_meta_data['_show_breadcrumb'] == 0 ){
                $bcSwitch = "disable";
            } else {                
                $bcSwitch = "enable";         
            } 

            if( !is_array( $page_meta_data ) && isset( $seclekOptions['cr_single_blog_bc_img']['url'] ) && !empty( $seclekOptions['cr_single_blog_bc_img']['url'] ) ){
                    $bcImg = "background-image:url('".$seclekOptions['cr_single_blog_bc_img']['url']."')";
            } elseif( isset( $page_meta_data['_page_backgroud'] ) &&  $page_meta_data['_page_backgroud'] != '' ){
                $bcImg = "background-image:url('".$page_meta_data['_page_backgroud']."')";
            } else {
                $bcImg = "";
            } 

            if( is_array( $page_meta_data ) &&  $page_meta_data['_page_title'] != '' ){         
                $bcTitle = $page_meta_data['_page_title'];
            } elseif( !is_array( $page_meta_data ) && ( $seclekOptions['cr_blog_details_breadcrumb'] == 'enable' &&  isset( $seclekOptions['cr_single_blog_bc_title'] ) && $seclekOptions['cr_single_blog_bc_title'] != '' ) ){ 
                $bcTitle = $seclekOptions['cr_single_blog_bc_title']; 
            } else { 
                if( $seclekOptions['cr_blog_details_breadcrumb'] == 'enable' &&  isset( $seclekOptions['cr_single_blog_bc_title'] ) && $seclekOptions['cr_single_blog_bc_title'] != '' ) {
                    $bcTitle = $seclekOptions['cr_single_blog_bc_title']; 
                } else {
                    $bcTitle = get_the_title(); 
                }             
            }

            if( !is_array( $page_meta_data )  && $seclekOptions['cr_blog_details_breadcrumb'] == 'enable' &&   isset( $seclekOptions['cr_single_blog_bc_subtitle'] ) && !empty( $seclekOptions['cr_single_blog_bc_subtitle'] ) ){
                    $bcSubtitle = $seclekOptions['cr_single_blog_bc_subtitle'];
            } elseif( isset( $page_meta_data['_page_subtitle'] ) &&  $page_meta_data['_page_subtitle'] != '' ){                     
                $bcSubtitle = $page_meta_data['_page_subtitle'];
            } else {                
               if( $seclekOptions['cr_blog_details_breadcrumb'] == 'enable' &&  isset( $seclekOptions['cr_single_blog_bc_subtitle'] ) && $seclekOptions['cr_single_blog_bc_subtitle'] != '' ) {
                    $bcSubtitle = $seclekOptions['cr_single_blog_bc_subtitle'];
                } else {
                    $bcSubtitle = '';
                }       
            }

            if( !is_array( $page_meta_data ) &&  isset( $seclekOptions['cr_sc_blog_title_color'] ) && !empty( $seclekOptions['cr_sc_blog_title_color'] ) ) {
                    $bcTitleColor = $seclekOptions['cr_sc_blog_title_color'];
            } elseif( isset( $page_meta_data['page_title_color'] ) &&  $page_meta_data['page_title_color'] != '' ){                     
                $bcTitleColor = $page_meta_data['page_title_color'];
            } else {  
                if( $seclekOptions['cr_blog_details_breadcrumb'] == 'enable' &&  isset( $seclekOptions['cr_sc_blog_title_color'] ) && $seclekOptions['cr_sc_blog_title_color'] != '' ) {
                    $bcTitleColor = $seclekOptions['cr_sc_blog_title_color'];
                } else {              
                    $bcTitleColor = ''; 
                }         
            }

            if( !is_array( $page_meta_data ) && isset( $seclekOptions['cr_sc_blog_subtitle_color'] ) && !empty( $seclekOptions['cr_sc_blog_subtitle_color'] ) ){
                    $bcSubtitleColor = $seclekOptions['cr_sc_blog_subtitle_color'];
            } elseif( isset( $page_meta_data['page_subtitle_color'] ) &&  $page_meta_data['page_subtitle_color'] != '' ){                     
                $bcSubtitleColor = $page_meta_data['page_subtitle_color'];
            } else { 
                if( $seclekOptions['cr_blog_details_breadcrumb'] == 'enable' &&  isset( $seclekOptions['cr_sc_blog_subtitle_color'] ) && $seclekOptions['cr_sc_blog_subtitle_color'] != '' ) {
                    $bcSubtitleColor = $seclekOptions['cr_sc_blog_subtitle_color'];
                } else {                
                    $bcSubtitleColor = '';
                }          
            }

        elseif ( is_home() || ( is_home() && is_frontpage() ) ) :

            if ( isset( $seclekOptions['cr_blog_breadcrumb'] ) && !empty( $seclekOptions['cr_blog_breadcrumb'] ) ) :
                $bcSwitch = $seclekOptions['cr_blog_breadcrumb'];
            else : 
                $bcSwitch = "enable";
            endif;

            if ( isset( $seclekOptions['cr_blog_bc_img']['url'] ) && !empty( $seclekOptions['cr_blog_bc_img']['url'] ) ) :
                $bcImg = "background-image:url('".$seclekOptions['cr_blog_bc_img']['url']."')";
            else : 
                $bcImg = "";
            endif;

            if ( isset( $seclekOptions['cr_blog_bc_title'] ) && !empty( $seclekOptions['cr_blog_bc_title'] ) ) :
                $preptitle =  ( get_option('page_for_posts', true) == 0 ) ? esc_html__( 'Blog', 'seclek' ) : get_the_title( get_option('page_for_posts', false) );
                $bcTitle = $seclekOptions['cr_blog_bc_title'];
                $postTitle = $preptitle; 
            else : 
                $preptitle =  ( get_option('page_for_posts', true) == 0 ) ? esc_html__( 'Blog', 'seclek' ) : get_the_title( get_option('page_for_posts', false) );
                $bcTitle = $preptitle;
                $postTitle = $preptitle; 
            endif;

            if ( isset( $seclekOptions['cr_blog_bc_subtitle'] ) && !empty( $seclekOptions['cr_blog_bc_subtitle'] ) ) :
                $bcSubtitle = $seclekOptions['cr_blog_bc_subtitle'];
            else : 
                $bcSubtitle = "";
            endif;
            
            if ( isset( $seclekOptions['cr_blog_title_color'] ) && !empty( $seclekOptions['cr_blog_title_color'] ) ) :
                $bcTitleColor = $seclekOptions['cr_blog_title_color'];
            else : 
                $bcTitleColor = "#ffffff";
            endif;

            if ( isset( $seclekOptions['cr_blog_subtitle_color'] ) && !empty( $seclekOptions['cr_blog_subtitle_color'] ) ) :
                $bcSubtitleColor = $seclekOptions['cr_blog_subtitle_color'];
            else : 
                $bcSubtitleColor = "#ffffff";
            endif;

        elseif( is_archive() || is_category() || is_tag() ) :

            if ( isset( $seclekOptions['cr_archive_bc_img']['url'] ) && !empty( $seclekOptions['cr_archive_bc_img']['url'] ) ) :
                $bcImg = "background-image:url('".$seclekOptions['cr_archive_bc_img']['url']."')";
            else : 
                $bcImg = "";
            endif;
            
            if ( isset( $seclekOptions['cr_archive_title_color'] ) && !empty( $seclekOptions['cr_archive_title_color'] ) ) :
                $bcTitleColor = $seclekOptions['cr_archive_title_color'];
            else : 
                $bcTitleColor = "#ffffff";
            endif;

            if ( isset( $seclekOptions['cr_archive_subtitle_color'] ) && !empty( $seclekOptions['cr_archive_subtitle_color'] ) ) :
                $bcSubtitleColor = $seclekOptions['cr_archive_subtitle_color'];
            else : 
                $bcSubtitleColor = "#ffffff";
            endif;

            $bcTitle = get_the_archive_title();
            $postTitle = get_the_archive_title(); 
            $bcSubtitle = get_the_archive_description();

        elseif( is_search() ) :

            if ( isset( $seclekOptions['cr_archive_bc_img']['url'] ) && !empty( $seclekOptions['cr_archive_bc_img']['url'] ) ) :
                $bcImg = "background-image:url('".$seclekOptions['cr_archive_bc_img']['url']."')";
            else : 
                $bcImg = "";
            endif;

            if ( isset( $seclekOptions['cr_archive_title_color'] ) && !empty( $seclekOptions['cr_archive_title_color'] ) ) :
                $bcTitleColor = $seclekOptions['cr_archive_title_color'];
            else : 
                $bcTitleColor = "#ffffff";
            endif;

            if ( isset( $seclekOptions['cr_archive_subtitle_color'] ) && !empty( $seclekOptions['cr_archive_subtitle_color'] ) ) :
                $bcSubtitleColor = $seclekOptions['cr_archive_subtitle_color'];
            else : 
                $bcSubtitleColor = "#ffffff";
            endif;

            $bcTitle = esc_html__( 'Search Results for: ', 'seclek' ) . '<span>' . get_search_query() . '</span>';
            
        elseif ( is_page() ) :
            $page_meta_data = get_post_meta(get_the_ID(), '_page_information', true );
            $bcSwitch = ( isset( $page_meta_data['_show_breadcrumb'] ) && null !== $page_meta_data['_show_breadcrumb'] ) ? $page_meta_data['_show_breadcrumb'] : 1 ;
            if ( $bcSwitch == 1 ) $bcSwitch = 'enable';
            else $bcSwitch = 'disable';
            $bcImg = ( isset( $page_meta_data['_page_backgroud'] ) && null !== $page_meta_data['_page_backgroud'] ) ? $page_meta_data['_page_backgroud'] : '';
            if ( null !== $bcImg ) :
                $bcImg = "background-image:url('".$bcImg."')";
            else : 
                $bcImg = "";
            endif;
            $bcTitle = ( isset( $page_meta_data['_page_title'] ) && $page_meta_data['_page_title'] != '' ) ? $page_meta_data['_page_title'] : get_the_title();
            $bcSubtitle = ( isset( $page_meta_data['_page_subtitle'] ) && null !== $page_meta_data['_page_subtitle'] ) ? $page_meta_data['_page_subtitle'] : '';
            $bcTitleColor = ( isset($page_meta_data['page_title_color']) && null !== $page_meta_data['page_title_color'] ) ? $page_meta_data['page_title_color'] : '#ffffff';
            $bcSubtitleColor = ( isset($page_meta_data['page_subtitle_color']) && null !== $page_meta_data['page_subtitle_color'] ) ? $page_meta_data['page_subtitle_color'] : '#ffffff' ;

        elseif ( is_singular('folio') ) :
            $page_meta_data = get_post_meta(get_the_ID(), '_folio_information', true );
            if(  NULL ==  $page_meta_data['_show_breadcrumb'] && isset( $seclekOptions['cr_folio_breadcrumb'] ) && !empty( $seclekOptions['cr_folio_breadcrumb'] ) ){              
                $bcSwitch = $seclekOptions['cr_folio_breadcrumb']; 
            } elseif( isset( $page_meta_data['_show_breadcrumb'] ) &&  $page_meta_data['_show_breadcrumb'] == 1 ){                     
                $bcSwitch = "enable";
            } else {                
                $bcSwitch = "disable";           
            } 

            if( NULL == $page_meta_data['_page_backgroud'] && isset( $seclekOptions['cr_folio_bc_img']['url'] ) && !empty( $seclekOptions['cr_folio_bc_img']['url'] ) ){
                $bcImg = "background-image:url('".$seclekOptions['cr_folio_bc_img']['url']."')";
            } elseif( isset( $page_meta_data['_page_backgroud'] ) &&  $page_meta_data['_page_backgroud'] != '' ){
                $bcImg = "background-image:url('".$page_meta_data['_page_backgroud']."')";
            } else {
                $bcImg = "";
            } 

            if( NULL ==  $page_meta_data['_page_title'] && $seclekOptions['cr_folio_breadcrumb'] == 'enable' && isset( $seclekOptions['cr_folio_bc_title'] ) && !empty( $seclekOptions['cr_folio_bc_title'] ) ){
                    $bcTitle = $seclekOptions['cr_folio_bc_title'];
            } elseif( isset( $page_meta_data['_page_title'] ) &&  $page_meta_data['_page_title'] != '' ){                     
                $bcTitle = $page_meta_data['_page_title'];
            } else {                
                $bcTitle = get_the_title();          
            } 

            if( NULL ==  $page_meta_data['_page_subtitle'] && $seclekOptions['cr_folio_breadcrumb'] == 'enable' && isset( $seclekOptions['cr_folio_bc_subtitle'] ) && !empty( $seclekOptions['cr_folio_bc_subtitle'] ) ){
                    $bcSubtitle = $seclekOptions['cr_folio_bc_subtitle'];
            } elseif( isset( $page_meta_data['_page_subtitle'] ) &&  $page_meta_data['_page_subtitle'] != '' ){                     
                $bcSubtitle = $page_meta_data['_page_subtitle'];
            } else {                
                $bcSubtitle = '';          
            }

            if( NULL ==  $page_meta_data['page_title_color'] && isset( $seclekOptions['cr_folio_title_color'] ) && !empty( $seclekOptions['cr_folio_title_color'] ) ){
                $bcTitleColor = $seclekOptions['cr_folio_title_color'];
            } elseif( isset( $page_meta_data['page_title_color'] ) &&  $page_meta_data['page_title_color'] != '' ){                     
                $bcTitleColor = $page_meta_data['page_title_color'];
            } else {                
                $bcTitleColor = '';          
            }

            if( NULL ==  $page_meta_data['page_subtitle_color'] && isset( $seclekOptions['cr_folio_subtitle_color'] ) && !empty( $seclekOptions['cr_folio_subtitle_color'] ) ){
                $bcSubtitleColor = $seclekOptions['cr_folio_subtitle_color'];
            } elseif( isset( $page_meta_data['page_subtitle_color'] ) &&  $page_meta_data['page_subtitle_color'] != '' ){
                $bcSubtitleColor = $page_meta_data['page_subtitle_color'];
            } else {                
                $bcSubtitleColor = '';          
            }

        elseif ( class_exists('WooCommerce') && is_product() ) :

            if ( isset( $seclekOptions['tr_single_shop_details_breadcrumb'] ) && !empty( $seclekOptions['tr_single_shop_details_breadcrumb'] ) ) :
                $bcSwitch = 'enable';
            endif;

            if ( isset( $seclekOptions['tr_single_shop_bc_img']['url'] ) && !empty( $seclekOptions['tr_single_shop_bc_img']['url'] ) ) :
                $bcImg = "background-image:url('".$seclekOptions['tr_single_shop_bc_img']['url']."')";
            else : 
                $bcImg = "";
            endif;

            if ( isset( $seclekOptions['tr_single_shop_bc_title'] ) && !empty( $seclekOptions['tr_single_shop_bc_title'] ) ) :
                $bcTitle = $seclekOptions['tr_single_shop_bc_title'];
            else : 
                $bcTitle = get_the_title();
            endif;

            if ( isset( $seclekOptions['tr_single_shop_bc_subtitle'] ) && !empty( $seclekOptions['tr_single_shop_bc_subtitle'] ) ) :
                $bcSubtitle = $seclekOptions['tr_single_shop_bc_subtitle'];
            else : 
                $bcSubtitle = "";
            endif;
            
            if ( isset( $seclekOptions['tr_sc_shop_title_color'] ) && !empty( $seclekOptions['tr_sc_shop_title_color'] ) ) :
                $bcTitleColor = $seclekOptions['tr_sc_shop_title_color'];
            else : 
                $bcTitleColor = "#ffffff";
            endif;

            if ( isset( $seclekOptions['tr_sc_shop_subtitle_color'] ) && !empty( $seclekOptions['tr_sc_shop_subtitle_color'] ) ) :
                $bcSubtitleColor = $seclekOptions['tr_sc_shop_subtitle_color'];
            else : 
                $bcSubtitleColor = "#ffffff";
            endif;
        
        endif;

        if ( $bcSwitch == 'enable' ) :
        $output .= '<div class="tr-breadcrumb">';
            $output .= '<div class="breadcrumb-content section-before text-center bg-image" style="'. $bcImg .'">';
                $output .= '<div class="breadcrumb-middle">';
                    $output .= '<div class="breadcrumb-info">';
                        $output .= '<div class="page-title">';
                                $output .= "<h1 style='color:".$bcTitleColor."'>$bcTitle</h1>";
                        $output .= "</div>";
                            if ( !empty( $bcSubtitle ) ) :
                                $output .= "<p style='color:".$bcSubtitleColor."'>$bcSubtitle</p>";
                            endif;
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';    
        $output .= '</div>';
        endif;
        echo wp_specialchars_decode( esc_html( $output ), ENT_QUOTES );

    }
    add_action( 'seclek_breadcrumb', 'seclek_breadcrumb_output', 999 );
}