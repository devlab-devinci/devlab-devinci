<?php 
/*ADDon Name:Blog Post*/
global $kc;

$kc->add_map(
    array(
        'tr_blog_post' => array(
		    'name' => __('Blog Posts', 'seclek'),
		    'description' => __('Display recent blog post', 'seclek'),
		    'icon' => 'et-edit',
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

add_shortcode( 'tr_blog_post', 'tr_blog_post_sc' );
function tr_blog_post_sc( $atts, $content ){
	$post_column = $cat_list = $order = $list_posts = $css_class = $output = $post_number = '';
	extract( $atts );

	$wrapper_class	= apply_filters( 'kc-el-class', $atts );	

	if( !empty( $post_column ) && $post_column == '2' ) :
		$post_column = 'sk-col-2';
	elseif( !empty( $post_column ) && $post_column == '4' ) :
		$post_column = 'sk-col-4';
	else :
		$post_column = 'sk-col-3';
		
	endif;

	$wrapper_class[] = 'tr-post';
	$wrapper_class[] = 'tr-post-grid';


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
		'post_type' 		=> 'post',
		'posts_per_page' 	=> $post_number,
		'order' 			=> $order,
	);
	$the_query = new WP_Query( $args );

	$output .= '<div class="sk-row sk-post-sc">';
	while( $the_query->have_posts() ):
		$the_query->the_post();
		$output .= '<div class="'. $post_column .'">';
			$output .= '<div class="' . implode( " ", $wrapper_class ) . '">';
		        if( has_post_thumbnail() ) : 
		        	$output .= '<div class="entry-header">';
						$output .= '<div class="entry-thumbnail">';
					        $url_thumbpost = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'seclek_blog_thumb' );
	        				$output .= '<img width="'. esc_attr( $url_thumbpost[1] ) .'" height="'. esc_attr( $url_thumbpost[2] ) .'" class="img-fluid" src="'. esc_url( $url_thumbpost[0] ) .'" alt="'. get_the_title() .'">';
						$output .= '</div>';
					$output .= '</div>';
				endif;	
				$output .= '<div class="entry-content">';
					$dates = get_the_date('d M');
					$grid_date = explode(' ', $dates);
					$output .= '<div class="post-time">';
							$output .= '<span><strong>'. $grid_date[0] .'</strong>'. $grid_date[1] .'</span>';
					$output .= '</div>';
					$output .= '<h2 class="entry-title"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">'. get_the_title() .'</a></h2>';
					$output .=  '<p>' . seclek_get_excerpt(120) . '</p>';		
				$output .='</div>';
			$output .= '</div>';
		$output .= '</div>';
	endwhile;
	$output .= '</div>';
	return $output;
}