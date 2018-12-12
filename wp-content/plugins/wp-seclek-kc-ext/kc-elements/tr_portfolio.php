<?php 
/*ADDon Name:Blog Post*/
global $kc;

$kc->add_map(
    array(
        'tr_portfolio' => array(
		    'name' => __('Portfolio List', 'seclek'),
		    'description' => __('Display porfolio here', 'seclek'),
		    'icon' => 'et-pictures',
		    'category' => 'By Seclek',
		    'is_container' => true,
		    'params' => array(
		    	'general' => array(  		
			        array(
			            'name' => 'post_column',
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
			            'name' => 'order',
			            'label' => __('Order', 'seclek'),
			            'type' => 'select',
			            'options' => array( 
							'ASC' => 'ASC',
							'DESC' => 'DESC',
						)
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

add_shortcode( 'tr_portfolio', 'tr_portfolio_sc' );
function tr_portfolio_sc( $atts, $content ){
	$post_column = $cat_list = $order = $list_posts = $css_class = $output = $post_number = '';
	extract( $atts );

	$wrapper_class	= apply_filters( 'kc-el-class', $atts );	

	if( !empty( $post_column ) && $post_column == '2' ) :
		$post_column = 'kc_column_inner kc_col-sm-6';
	elseif( !empty( $post_column ) && $post_column == '4' ) :
		$post_column = 'kc_column_inner kc_col-sm-3';
	else :
		$post_column = 'kc_column_inner kc_col-sm-4';
	endif;

	$wrapper_class[] = 'portfolio text-center';


	if ( !empty( $css_class ) )
		$wrapper_class[] = $css_class;

	if ( empty( $order ) )
		$order = 'DESC';

	if( $atts['num_of_post'] == 0 ){
		$post_number = -1;
	} else {
		$post_number = $atts['num_of_post'];
	}


	$args = array(
		'post_type' 		=> 'folio',
		'posts_per_page' 	=> $post_number,
		'order' 			=> $order,
	);
	$the_query = new WP_Query( $args );

	$output .= '<div class="kc_row kc_row_inner">';
	while( $the_query->have_posts() ):
		$the_query->the_post();
		$output .= '<div class="'. $post_column .'">';
			$output .= '<div class="' . implode( " ", $wrapper_class ) . '">';
		        if( has_post_thumbnail() ) : 
					$output .= '<div class="portfolio-image">';
				        $url_thumbpost = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'seclek_folio_thumb' );
        				$output .= '<img width="'. esc_attr( $url_thumbpost[1] ) .'" height="'. esc_attr( $url_thumbpost[2] ) .'" class="img-fluid" src="'. esc_url( $url_thumbpost[0] ) .'" alt="'. get_the_title() .'">';
					$output .= '</div>';
				endif;	
				$output .= '<div class="portfolio-info">';
					$output .= '<h2 class="entry-title"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">'. get_the_title() .'</a></h2>';
					$cat_list = get_the_terms( get_the_ID(), 'folio_category' );
					foreach ($cat_list as $value) {
						$output .= '<span>' . $value->name . '</span>';
					}		
				$output .='</div>';
			$output .= '</div>';
		$output .= '</div>';
	endwhile;
	$output .= '</div>';
	return $output;
}