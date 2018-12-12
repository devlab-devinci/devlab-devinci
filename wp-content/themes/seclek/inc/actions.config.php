<?php
/**
 * The template for requried actions hooks.
 *
 * @package Seclek
 * @since 1.0
 */

// Seclek Preloader
if ( !function_exists('seclek_preloader_output') ){
    function seclek_preloader_output() {
        global $seclekOptions;

        $output = $plImage = '';

        $plImage = ( isset( $seclekOptions['cr_pre_loader']['url'] ) ) ? $seclekOptions['cr_pre_loader']['url'] : '';
        if ( isset( $seclekOptions['cr_pl_en'] ) && $seclekOptions['cr_pl_en'] == 'enable' ) :
            $output .= '<div id="preloader">';
            if ( $plImage != '' ) :
                $output .= '<img src="'. esc_url( $plImage ) .'" alt="'. esc_attr( 'Preloader', 'seclek' ) .'" class="icon img-fluid">';
            endif;
            $output .= '</div>';
            echo wp_specialchars_decode( esc_html( $output ), ENT_QUOTES );
        else :
            echo wp_specialchars_decode( esc_html( $output ), ENT_QUOTES );
        endif;
    }
    add_action( 'seclek_preloader', 'seclek_preloader_output' );

}

// Seclek Favicon
if ( !function_exists('seclek_favicon_output') ){
	function seclek_favicon_output() {
		global $seclekOptions;
		$output = '';
	    if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :
			if ( !empty( $seclekOptions['cr_favicon']['url'] ) ) :
				$output .= '<link rel="shortcut icon" href="'. esc_url( $seclekOptions["cr_favicon"]["url"] ) .'">';
			endif;
			if ( !empty( $seclekOptions['cr_apple_fav_144']['url'] ) ) :
				$output .= '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="'. esc_url( $seclekOptions["cr_apple_fav_144"]["url"]  ).'">';
			endif;
			if ( !empty( $seclekOptions['cr_apple_fav_114']['url'] ) ) :
				$output .= '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'. esc_url( $seclekOptions["cr_apple_fav_114"]["url"] ) .'">';
			endif;
			if ( !empty( $seclekOptions['cr_apple_fav_72']['url'] ) ) :
				$output .= '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'. esc_url( $seclekOptions["cr_apple_fav_72"]["url"] ) .' ">';
			endif;
			if ( !empty( $seclekOptions['cr_apple_fav_57']['url'] ) ) :
				$output .= '<link rel="apple-touch-icon-precomposed" href="'. esc_url( $seclekOptions["cr_apple_fav_57"]["url"] ) .'">';
			endif;
			printf( '%s', $output );
		endif;
	}
    add_action( 'seclek_favicon', 'seclek_favicon_output' );

}

// Seclek Pagination
if ( !function_exists( 'seclek_pagination' ) ) {
    function seclek_pagination( $dataArray ) {
        $paginate = '';
        $pagination = paginate_links(array(
            @add_query_arg('paged','%#%'),
            'format'        => '?paged=%#%',
            'current'       => $dataArray['current'],
            'total'         => $dataArray['max_page_num'],
            'type'          => 'array',
            'prev_text'     => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
            'next_text'     => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        ));

        if ( ! empty( $pagination ) ) {
            $paginate .= '<div class="tr-pagination tr-section text-center">';
                    $paginate .= '<ul class="pagination">';
                    foreach ( $pagination as $key => $page_link ) :
                        if ( strpos( $page_link, 'current' ) !== false ) $active = ' active';
                        else $active = ''; 
                        $paginate .= '<li class="page-item'. $active . '">' . $page_link . '</li>';
                    endforeach;
                    $paginate .= '</ul>';
            $paginate .= '</div>';
        }

        return $paginate;
    }
}

// limiting the excerpt
if ( !function_exists('seclek_get_excerpt') ){
    function seclek_get_excerpt($limit){        
        if ( has_post_format( array( 'aside', 'audio', 'chat', 'link', 'quote', 'status', 'video' ) ) ) {

            $excerpt = the_content();
            return $excerpt;

        } else {
            $excerpt = get_the_content();
            $excerpt = preg_replace(" ([.*?])",'',$excerpt);
            $excerpt = strip_shortcodes($excerpt);
            $excerpt = strip_tags($excerpt);
            $excerpt = substr($excerpt, 0, $limit);
            $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
            $excerpt = $excerpt.' [...]';
            return $excerpt;
        }
        
    }
}

// Seclek Feature image call
if ( !function_exists('seclek_feature_image') ) {
	function seclek_feature_image( $size ){
		if( has_post_thumbnail() ) :
	        $url_thumbpost = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $size );
	        $buffer = '<img width="'. esc_attr( $url_thumbpost[1] ) .'" height="'. esc_attr( $url_thumbpost[2] ) .'" class="img-fluid" src="'. esc_url( $url_thumbpost[0] ) .'" alt="'. get_the_title() .'">';
	    	return $buffer;
	    endif;
	}
}

if ( !function_exists( 'seclek_mod_main_query' ) ){
    function seclek_mod_main_query( $query ) {
        global $seclekOptions;
        
        if ( isset($seclekOptions['cr_blog_page_content_num']) && !empty( $seclekOptions['cr_blog_page_content_num'] ) ) $posts_per_page = $seclekOptions['cr_blog_page_content_num'];
        else $posts_per_page = 10;
        if ( isset($seclekOptions['cr_blog_order']) && !empty( $seclekOptions['cr_blog_order'] ) ) $posts_order = $seclekOptions['cr_blog_order'];
        else $posts_order = 'DESC';

        if ( $query->is_home() && $query->is_main_query() ) { 
            $query->query_vars['posts_per_page'] = $posts_per_page;
            $query->query_vars['order'] = $posts_order;
        }
    }
    add_action( 'pre_get_posts', 'seclek_mod_main_query' );
}

// Seclek buffer image call
if ( !function_exists('seclek_image_buffer') ) {
    function seclek_image_buffer( $size ){
        $url_thumbpost = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $size );
        $buffer = '<img width="'. esc_attr( $url_thumbpost[1] ) .'" height="'. esc_attr( $url_thumbpost[2] ) .'" class="img-fluid" src="'. esc_url( $url_thumbpost[0] ) .'" alt="'. get_the_title() .'">';
        return $buffer;
    }
}

if( !function_exists('seclek_time_ago') ) {
    function seclek_time_ago( $type = 'post' ) {
        $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
        return human_time_diff($d('U'), current_time('timestamp')) . " " . esc_html__('ago','seclek');
    }
}


if ( !function_exists( 'seclek_get_term_options' ) ) {
    function seclek_get_term_options( $field ) {
        $args = $field->args( 'get_terms_args' );
        $args = is_array( $args ) ? $args : array();

        $args = wp_parse_args( $args, array( 'taxonomy' => 'slider_cat' ) );

        $taxonomy = $args['taxonomy'];

        $terms = (array) cmb2_utils()->wp_at_least( '4.5.0' )
            ? get_terms( $args )
            : get_terms( $taxonomy, $args );

        // Initate an empty array
        $term_options = array();
        if ( ! empty( $terms ) ) {
            foreach ( $terms as $term ) {
                $term_options[ $term->slug ] = $term->name;
            }
        }

        return $term_options;
    }
}

if ( !function_exists( 'seclek_search_filter_form' ) ) {
    
    function seclek_search_filter_form( $form ) {
        $form = '<form role="search" method="get" id="search-form" class="search-form" action="' . home_url( '/' ) . '" >
            <label>
            <input type="search" class="search-field" value="' . get_search_query() . '" name="s" id="s" />
            </label>
            <input type="submit" class="search-submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'seclek' ) .'" />
            </form>';
        
        return $form;
    } 
    add_filter( 'get_search_form', 'seclek_search_filter_form' );
}

if( !function_exists('update_ads_slug')){
    function update_ads_slug( $args, $post_type ) {
        global $seclekOptions;
        if( isset( $seclekOptions['cr_folio_slug'] ) && $seclekOptions['cr_folio_slug'] != '' ):
            if ( 'folio' === $post_type ) {
                $my_args = array(
                    'rewrite' => array( 'slug' => $seclekOptions['cr_folio_slug'], 'with_front' => true )
                );
                return array_merge( $args, $my_args );
            }
        endif;
        return $args;
    }

    add_filter( 'register_post_type_args', 'update_ads_slug', 10, 2 );
}



/**
 * @param $width
 *
 * @since 4.2
 * @return bool|string
 */
function tr_wpb_translateColumnWidthToSpan( $width ) {
    preg_match( '/(\d+)\/(\d+)/', $width, $matches );

    if ( ! empty( $matches ) ) {
        $part_x = (int) $matches[1];
        $part_y = (int) $matches[2];
        if ( $part_x > 0 && $part_y > 0 ) {
            $value = ceil( $part_x / $part_y * 12 );
            if ( $value > 0 && $value <= 12 ) {
                $width = 'vc_col-lg-' . $value;
            }
        }
    }

    return $width;
}

function seclek_woo_loop_columns() {
    global $seclekOptions;
    $productCol = $seclekOptions['tr_grid_column'];
    return $productCol;
}
add_filter( 'loop_shop_columns', 'seclek_woo_loop_columns' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function seclek_woo_products_per_page() {

    global $seclekOptions;
    if( isset( $seclekOptions['tr_shop_page_content_num'] ) && $seclekOptions['tr_shop_page_content_num'] != '' )
        return $seclekOptions['tr_shop_page_content_num'];
}
add_filter( 'loop_shop_per_page', 'seclek_woo_products_per_page' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function seclek_woo_related_products_args( $args ) {
    $defaults = array(
        'posts_per_page' => 3,
        'columns'        => 3,
    );

    $args = wp_parse_args( $defaults, $args );

    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'seclek_woo_related_products_args' );

if ( ! function_exists( 'seclek_woocommerce_cart_link_fragment' ) ) {
    /**
     * Cart Fragments.
     *
     * Ensure cart contents update when products are added to the cart via AJAX.
     *
     * @param array $fragments Fragments to refresh via AJAX.
     * @return array Fragments to refresh via AJAX.
     */
    function seclek_woocommerce_cart_link_fragment( $fragments ) {
        ob_start();
        seclek_woocommerce_cart_link();
        $fragments['a.cr_cart'] = ob_get_clean();

        ob_start();
        ?>
        <div class="tr-dropdown-menu">
            <?php woocommerce_mini_cart();  ?>
        </div>
        <?php   
        $fragments['div.tr-dropdown-menu'] = ob_get_clean();


        return $fragments;
    }
}
add_filter( 'woocommerce_add_to_cart_fragments', 'seclek_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'seclek_woocommerce_cart_link' ) ) {
    /**
     * Cart Link.
     *
     * Displayed a link to the cart including the number of items present and the cart total.
     *
     * @return void
     */
    function seclek_woocommerce_cart_link() {
        global $woocommerce;
        ?>
        <a class="cr_cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
            <i class="fa fa-shopping-basket"></i>
            <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'seclek'),
            $woocommerce->cart->cart_contents_count);?>  -
            <?php echo wp_specialchars_decode( esc_html( $woocommerce->cart->get_cart_total() ), ENT_QUOTES ); ?>
        </a>
        <?php
    }
}

if ( ! function_exists( 'seclek_woocommerce_header_cart' ) ) {
    /**
     * Display Header Cart.
     *
     * @return void
     */
    function seclek_woocommerce_header_cart() {
        $class = 'cart-content tr-dropdown';
        ?>
        <div class="<?php echo esc_attr( $class ); ?>">
            <?php seclek_woocommerce_cart_link(); ?>
            <div class="tr-dropdown-menu">
                <?php woocommerce_mini_cart();  ?>
            </div>
        </div>
        <?php
    }
}

if ( ! function_exists( 'seclek_widget_shopping_cart_button_view_cart' ) ) {

    /**
     * Output the view cart button.
     *
     * @subpackage  Cart
     */
    function seclek_widget_shopping_cart_button_view_cart() {
        echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="btn btn-primary cart-button">' . esc_html__( 'View Cart', 'seclek' ) . '</a>';
    }
}

if ( ! function_exists( 'seclek_widget_shopping_cart_proceed_to_checkout' ) ) {

    /**
     * Output the proceed to checkout button.
     *
     * @subpackage  Cart
     */
    function seclek_widget_shopping_cart_proceed_to_checkout() {
        echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="btn btn-primary">' . esc_html__( 'Checkout', 'seclek' ) . '</a>';
    }
}