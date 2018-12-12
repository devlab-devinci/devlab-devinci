<?php
/*ADDon Name:Logo Slider*/
global $kc;

$kc->add_map(
    array(
        'tr_logo_slider' => array(
		    'name' => __('Logo Slider', 'seclek'),
		    'description' => __('Display logo slider', 'seclek'),
		    'icon' => 'et-pictures',
		    'category' => 'By Seclek',
		    'is_container' => true,
		    'params' => array(
		    	'general' => array(  		
			        array(
                        'name' => 'image',
                        'label' => __( 'Upload Images', 'seclek' ),
                        'type' => 'attach_images',
                        'admin_label' => true,
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

add_shortcode( 'tr_logo_slider', 'tr_logo_slider_sc' );
function tr_logo_slider_sc( $atts, $content ){
	$image = $css_class = '';
	$img_size 	= 'full';
	extract( $atts );

	$wrapper_class	= apply_filters( 'kc-el-class', $atts );

	$wrapper_class[] = 'brand-content';

	if ( !empty( $css_class ) )
		$wrapper_class[] = $css_class;


	if( !empty( $image ) )
		$image 	= explode( ',', $image );

	if ( is_array( $image ) && !empty( $image ) ) {

		foreach( $image as $image_id ){
			$attachment_data[] 		= wp_get_attachment_image_src( $image_id, $img_size );
		}
	} else{

		echo '<div class="kc-carousel_images align-center" style="border:1px dashed #ccc;"><br /><h3>Logo Images: '.__( 'No images upload', 'kingcomposer' ).'</h3></div>';
		return;

	}

	$output = '<div class="' . implode( " ", $wrapper_class ) . '">';
	 	$output .='<div class="brand-slider">';
       	foreach( $attachment_data as $image ){
		    $output .='<div class="brand">';	
                $output .='<img src="' . esc_url( $image[0] ) .'" alt="" />';
            $output .='</div>';
		} 
        $output .='</div>';
	$output .= '</div>';

	return $output;
}
