<?php
/*ADDon Name: Counter */
global $kc;

$kc->add_map(
    array(
        'tr_counter' => array(
		    'name' => __('Counter', 'seclek'),
		    'description' => __('Display Counter', 'seclek'),
		    'icon' => 'et-strategy',
		    'category' => 'By Seclek',
		    'is_container' => true,
		    'params' => array(
		    	'general' => array(
		    		array(
						'type'			=> 'select',
						'label'			=> __( 'Select image/icon', 'seclek' ),
						'name'			=> 'counter_style',
						'admin_label'	=> true,
						'options'		=> array(
							'1'	=> 'Image',
							'2'	=> 'Icon',
						),
						'value'			=> '1',
					),	    		
			        array(
			            'name' => 'title',
			            'label' => __('Title', 'seclek'),
			            'type' => 'text',
			            'description' => __('Enter Title here.', 'seclek'),
			        ),
			        array(
						'type'	=> 'text',
						'name'	=> 'counter',
						'label'	=> __( 'Counter', 'seclek' ),
					),
					array(
						'type'	=> 'text',
						'name'	=> 'counter_del',
						'label'	=> __( 'Delimeter', 'seclek' ),						
						'description'	=> __( 'Enter counter delimeter. Such as: + , %', 'seclek' ),
					),
					array(
						'name'		=> 'image',
						'label'		=> __( 'Upload Image', 'seclek' ),
						'type'		=> 'attach_image',
						'relation'	=> array(
							'parent'	=> 'counter_style',
							'show_when'	=> array( '1' )
						)
					),
					array(
						'name'			=> 'icon',
						'label'			=> __( 'Select Icon', 'seclek' ),
						'type'			=> 'icon_picker',
						'description'	=> __( 'Select icon display in box', 'seclek' ),
						'value'			=> 'et-envelope',
						'relation'		=> array(
							'parent'	=> 'counter_style',
							'show_when'	=> array( '2' )
						)
					),					
			        array(
			            'name' => 'css_class',
			            'label' => __('Extra Class', 'seclek'),
			            'type' => 'text',
			        ),
		    	),
		    	'styling'	=> array(
					array(
						'name'		=> 'css_custom',
						'type'		=> 'css',
						'options'	=> array(
							array(
								"screens" => "any,1024,999,767,479",
								'Title' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.counter-title'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.counter-title'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.counter-title'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.counter-title'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.counter-title'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.counter-title'),
									array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.counter-title'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.counter-title'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.counter-title'),
								),
								'Counter' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.counter-number'),
									array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+:hover .counter-number'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.counter-number'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.counter-number'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.counter-number'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.counter-number'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.counter-number'),
									array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.counter-number'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.counter-number'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.counter-number'),
								),
								'Icon' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.counter-icon i'),
									array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+:hover .counter-icon i'),
									array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.counter-icon'),
									array('property' => 'background-color', 'label' => 'BG Color Hover', 'selector' => '+:hover .counter-icon'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.counter-icon i'),
									array('property' => 'height', 'label' => 'Height', 'selector' => '.counter-icon'),
									array('property' => 'width', 'label' => 'Width', 'selector' => '.counter-icon'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.counter-icon'),
									array('property' => 'border', 'label' => 'Border', 'selector' => '.counter-icon'),
									array('property' => 'border-color', 'label' => 'Hover Border', 'selector' => '+:hover .counter-icon'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.counter-icon'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.counter-icon'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.counter-icon'),
								),
								'Image' => array(
									array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.icon'),
									array('property' => 'width', 'label' => 'Width', 'selector' => '.icon'),
									array('property' => 'border', 'label' => 'Border', 'selector' => '.icon img'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.icon'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.icon'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.icon'),
								),
							)
						)
					)
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

add_shortcode( 'tr_counter', 'tr_counter_sc' );
function tr_counter_sc( $atts, $content ){
	$counter_style = $title = $counter = $counter_del = $icon = $image = $css_class = $data_img = $data_icon = $data_title = $data_desc = '';
	extract( $atts );

	$wrapper_class	= apply_filters( 'kc-el-class', $atts );
	$wrapper_class[] = 'fun-facts';

	if ( !empty( $css_class ) )
		$wrapper_class[] = $css_class;

	if ( !empty( $title ) ) {

		$data_title .= '<p class="counter-title">';
			$data_title .= $title;
		$data_title .= '</p>';

	}

	if ( !empty( $counter ) || !empty( $counter_del ) ) {

		$data_desc .= '<span><span class="counter">';
			$data_desc .= $counter;
			$data_desc .= '</span>';
			$data_desc .= $counter_del;
		$data_desc .= '</span>';

	}

	if ( !empty( $image ) ) {

		$img_link = wp_get_attachment_image_src( $image, 'full' );
		$alttext = get_post_meta( $image, '_wp_attachment_image_alt', true);
		$data_img .= '<div class="icon">';
			$data_img .= '<img src="'. $img_link[0] .'" alt="'. $alttext .'">';
		$data_img .= '</div>';

	}

	if( empty($icon) || $icon == '__empty__')
		$icon = 'et-envelope';

	$data_icon .= '<div class="counter-icon">';
		$data_icon .= '<i class="'. $icon .'"></i>';
	$data_icon .= '</div>';

	$output = '<div class="' . implode( " ", $wrapper_class ) . '">';
		if( $counter_style == '1' ){	
			$output .= $data_img;
		} elseif( $counter_style == '2' ){	
			$output .= $data_icon;
		} else {
			$output .= '';
		}			
			$output .= $data_title;
			$output .= $data_desc;
	$output .= '</div>';
	?>
	<?php
	return $output;
}