<?php
/*ADDon Name:Testimonnial*/
global $kc;

$kc->add_map(
    array(
        'tr_testimonial' => array(
		    'name' => __('Testimonial', 'seclek'),
		    'description' => __('Display single icon', 'seclek'),
		    'icon' => 'et-quote',
		    'category' => 'By Seclek',
		    'is_container' => true,
		    'params' => array(
		    	'general' => array(  		
			        array(
						'type'			=> 'group',
						'label'			=> __('Testimonials', 'seclek'),
						'name'			=> 'testimonial_info',
						'description'	=> __( 'Repeat this fields with each item created, Each item corresponding processbar element.', 'seclek' ),
						'options'		=> array('add_text' => __('Add new testimonial', 'seclek')),
						'value' => base64_encode( json_encode(array(
							"1" => array(
								"tes_name" => "Jake Blare",
								"tes_position" => "CEO",
								"tes_heading" => "Our Core Values",
							),
						) ) ),
						'params' => array(
							array(
								'type' => 'text',
								'label' => __( 'Name', 'seclek' ),
								'name' => 'tes_name',
							),
							array(
								'type' => 'text',
								'label' => __( 'Position', 'seclek' ),
								'name' => 'tes_position',
							),
							array(
								'type' => 'text',
								'label' => __( 'Heading', 'seclek' ),
								'name' => 'tes_heading',
							),
							array(
								'type' => 'textarea',
								'label' => __( 'Content', 'seclek' ),
								'name' => 'tes_content',
							),
						),
					),
					array(
						'type' => 'text',
						'label' => __( 'Extra Class', 'seclek' ),
						'name' => 'css_class',
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

add_shortcode( 'tr_testimonial', 'tr_testimonial_sc' );
function tr_testimonial_sc( $atts, $content ){
	$css_class = '';
	extract( $atts );

	$wrapper_class	= apply_filters( 'kc-el-class', $atts );

	$wrapper_class[] = 'testimonial-info';

	if ( !empty( $css_class ) )
		$wrapper_class[] = $css_class;

	$output = '<div class="' . implode( " ", $wrapper_class ) . '">';
		$output .= '<div class="testimonial-icon"><i class="fa fa-quote-right" aria-hidden="true"></i></div>';
		 	$output .='<div class="testimonial-slider">';
           	foreach( $atts['testimonial_info'] as $key => $item ){
			    $output .='<div class="testimonial">';
			    if( !empty( $item->tes_heading ) ) :	
	                $output .='<h1>'. esc_html( $item->tes_heading ) .'</h1>';
	            endif;
	            if( !empty( $item->tes_content ) ) :
	            	$output .='<p>“'. esc_html( $item->tes_content ) .'”</p>';
	        	endif;
	            $output .='<div class="testimonial-title">';
	            if( !empty( $item->tes_name ) ) :
	                $output .='<h2>'. esc_html( $item->tes_name ) .'</h2>';
	            endif;
	            if( !empty( $item->tes_position ) ) :
	                $output .='<span>'. esc_html( $item->tes_position ) .'</span>';
	            endif;
	            $output .='</div>';
	            $output .='</div>';
			}
		$output .='</div>';  
	$output .= '</div>';

	return $output;
}
