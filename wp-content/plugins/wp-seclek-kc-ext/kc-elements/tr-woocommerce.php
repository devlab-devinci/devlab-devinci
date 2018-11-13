<?php 
/*ADDon Name:Blog Post*/
global $kc;

$kc->add_map(
    array(
        'tr_woocommerce' => array(
		    'name' => __('Woocommerce Shortcode', 'seclek'),
		    'description' => __('Display woocommerce products here', 'seclek'),
		    'icon' => 'et-edit',
		    'category' => 'By Seclek',
		    'is_container' => true,
		    'params' => array(
		    	'general' => array(  		
			        array(
			            'name' => 'woo_sc',
			            'label' => __('Select Shortcode', 'seclek'),
			            'type' => 'select',
			            'options' => array( 
							'1' => 'Random Sale Items',
							'2' => 'Newest Products',
							'3' => 'Featured Products',
							'4' => 'Best Selling Products',
							'5' => 'Specific Categories',
						),
						'value'	=> '1',
			        ),
			        array(
						'type'			=> 'text',
						'label'			=> __( 'Categories', 'seclek' ),
						'name'			=> 'product_taxonomy',
						'description'	=> __( 'Enter Product categories slug name. Seperat with comma (,)', 'seclek' ),
						'relation' 	=> array(
							'parent'	=> 'woo_sc',
							'show_when'		=> '5'
						)
					),
			        array(
			            'name' => 'woo_col',
			            'label' => __('Select Column', 'seclek'),
			            'type' => 'select',
			            'options' => array( 
							'2' => 'Column 2',
							'3' => 'Column 3',
							'4' => 'Column 4',
						),
						'value'	=> '3',
			        ),
			         array(
						'name'			=> 'num_of_post',
						'label'			=> __( 'Number of Post', 'seclek' ),
						'type'			=> 'number_slider',
						'value'			=> '3',
						'description'	=> __(' Specify number of post that you want to show. Set 0 to get all team', 'seclek'),
						'options'		=> array(
							'min'			=> 0,
							'max'			=> 15,
							'unit'			=> '',
							'show_input'	=> false
						)
					),
			        array(
			            'name' => 'css_class',
			            'label' => __('Extra Class', 'seclek'),
			            'type' => 'text',
			        ),
		    	),
		        'animate' => array(
					array(
						'name'    => 'animate',
						'type'    => 'animate'
					)
				),
		    )
		),

    )
); // End add map

add_shortcode( 'tr_woocommerce', 'tr_woocommerce_sc' );
function tr_woocommerce_sc( $atts, $content ){
	$woo_col = $woo_sc = $list_posts = $css_class = $output = $shortcode = '';
	extract( $atts );

	$wrapper_class	= apply_filters( 'kc-el-class', $atts );	

	$wrapper_class[] = 'tr-post';
	$wrapper_class[] = 'tr-post-grid';

	if ( !empty( $css_class ) )
		$wrapper_class[] = $css_class;

	if( $atts['num_of_post'] == 0 ){
		$post_number = -1;
	} else {
		$post_number = $atts['num_of_post'];
	}
	if( $woo_sc == '1' ){
		$shortcode = '[products limit="'. $post_number .'" columns="'. $woo_col .'" orderby="popularity" class="quick-sale" on_sale="true"]';
	}elseif( $woo_sc == '2' ){
		$shortcode = '[products limit="'. $post_number .'" columns="'. $woo_col .'" orderby="id" order="DESC" visibility="visible"]';
	}elseif( $woo_sc == '3' ){
		$shortcode = '[products limit="'. $post_number .'" columns="'. $woo_col .'" visibility="featured"]';
	}elseif( $woo_sc == '4' ){
		$shortcode = '[products limit="'. $post_number .'" columns="'. $woo_col .'" best_selling="true"]';
	}elseif( $woo_sc == '5' ){
		$shortcode = '[products limit="'. $post_number .'" columns="'. $woo_col .'" category="'. $product_taxonomy .'"]';
	}

	return do_shortcode( $shortcode );
}