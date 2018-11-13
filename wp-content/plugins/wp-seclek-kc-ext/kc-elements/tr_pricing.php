<?php
/*ADDon Name: Pricing Plan*/
global $kc;

$kc->add_map(
    array(
        'tr_pricing' => array(
		    'name' => __('Pricing Plan', 'seclek'),
		    'description' => __('Display single icon', 'seclek'),
		    'icon' => ' et-presentation',
		    'category' => 'By Seclek',
		    'is_container' => true,
		    'params' => array(
		    	'general' => array( 
		    		array(
						'type'			=> 'select',
						'label'			=> __( 'Select image/icon', 'seclek' ),
						'name'			=> 'layout',
						'admin_label'	=> true,
						'options'		=> array(
							'0'	=> 'None',
							'1'	=> 'Image',
							'2'	=> 'Icon',
						),
						'value'			=> '0',
					),
					array(
                        'name'    => 'featured',
                        'label'   => __('Make Featured', 'seclek'),
                        'type'    => 'checkbox',
                        'options' => array(
                            'feature' => 'Featured',
                        )
                    ),	    		
			        array(
			            'name' => 'title',
			            'label' => __('Title', 'seclek'),
			            'type' => 'text',
			            'description' => __('Enter Title here.', 'seclek'),
			        ),
			        array(
			            'name' => 'price',
			            'label' => __('Price', 'seclek'),
			            'type' => 'text',
			            'description' => __('Enter Price here.', 'seclek'),
			        ),
			        array(
			            'name' => 'cur',
			            'label' => __('Currency', 'seclek'),
			            'type' => 'text',
			            'description' => __('Enter Currency here.Exp. $', 'seclek'),
			        ),
			        array(
						'type'			=> 'select',
						'label'			=> __( 'Duration', 'seclek' ),
						'name'			=> 'duration',
						'admin_label'	=> true,
						'options'		=> array(
							'mo'	=> 'Monthly',
							'yr'	=> 'Yearly',
						),
						'value'			=> 'mo',
					),
					array(
						'name'		=> 'image',
						'label'		=> __( 'Upload Image', 'seclek' ),
						'type'		=> 'attach_image',
						'relation'	=> array(
							'parent'	=> 'layout',
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
							'parent'	=> 'layout',
							'show_when'	=> array( '2' )
						)
					),
					array(
						'name'		=> 'show_button',
						'label'		=> __( 'Display Button', 'seclek' ),
						'type'		=> 'toggle',
						'value'		=> 'yes',
					),
					array(
						'name'		=> 'button_text',
						'label'		=> __( 'Text Button', 'seclek' ),
						'type'		=> 'text',
						'value'		=> 'Read more',
						'relation'	=> array(
							'parent'	=> 'show_button',
							'show_when'	=> 'yes'
						)
					),
					array(
						'name'		=> 'button_link',
						'label'		=> __( 'Link Button', 'seclek' ),
						'type'		=> 'link',
						'value'		=> '#',
						'relation'	=> array(
							'parent'	=> 'show_button',
							'show_when'	=> 'yes'
						)
					),
					array(
			            'name' => 'css_class',
			            'label' => __('Extra Class', 'seclek'),
			            'type' => 'text',
			        ),
		    	),
		    	'Pricing List' => array(		    		 		
			        array(
						'type'			=> 'group',
						'label'			=> __('Pricing List', 'seclek'),
						'name'			=> 'price_list',
						'description'	=> __( 'Repeat this fields with each item created, Each item corresponding processbar element.', 'seclek' ),
						'options'		=> array('add_text' => __('Add new price list', 'seclek')),
						'value' => base64_encode( json_encode(array(
							"1" => array(
								"list" => "Unlimited Videos To Upload",
							),
						) ) ),
						'params' => array(
							array(
								'type' => 'text',
								'label' => __( 'List', 'seclek' ),
								'name' => 'list',
							),
						),
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
									array('property' => 'color', 'label' => 'Color', 'selector' => '.pricing-title'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.pricing-title'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.pricing-title'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.pricing-title'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.pricing-title'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.pricing-title'),
									array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.pricing-title'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.pricing-title'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.pricing-title'),
								),
								'Price' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.pricing-price'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.pricing-price'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.pricing-price'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.pricing-price'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.pricing-price'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.pricing-price'),
									array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.pricing-price'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.pricing-price'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.pricing-price'),
								),
								'Icon' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.pricing-icon i'),
									array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+:hover .pricing-icon i'),
									array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.pricing-icon'),
									array('property' => 'background-color', 'label' => 'BG Color Hover', 'selector' => '+:hover .pricing-icon'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.pricing-icon i'),
									array('property' => 'height', 'label' => 'Height', 'selector' => '.pricing-icon'),
									array('property' => 'width', 'label' => 'Width', 'selector' => '.pricing-icon'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.pricing-icon'),
									array('property' => 'border', 'label' => 'Border', 'selector' => '.pricing-icon'),
									array('property' => 'border-color', 'label' => 'Hover Border', 'selector' => '+:hover .pricing-icon'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.pricing-icon'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.pricing-icon'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.pricing-icon'),
								),
								'Image' => array(
									array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.icon'),
									array('property' => 'width', 'label' => 'Width', 'selector' => '.icon'),
									array('property' => 'border', 'label' => 'Border', 'selector' => '.icon img'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.icon'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.icon'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.icon'),
								),
								'Button' => array(
									array('property' => 'color', 'label' => 'Text Color', 'selector' => '.pricing-button a'),
									array('property' => 'color', 'label' => 'Text Hover Color', 'selector' => '.pricing-button a:hover'),
									array('property' => 'background-color', 'label' => 'BG Color', 'selector' => '.pricing-button a'),
									array('property' => 'background-color', 'label' => 'BG Hover Color', 'selector' => '.pricing-button a:hover'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.pricing-button a'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.pricing-button a'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.pricing-button a'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.pricing-button a'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.pricing-button a'),
									array('property' => 'border', 'label' => 'Border', 'selector' => '.pricing-button a'),
									array('property' => 'border-color', 'label' => 'Border Color Hover', 'selector' => '.pricing-button a:hover'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.pricing-button a'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.pricing-button a'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.pricing-button a')
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

add_shortcode( 'tr_pricing', 'tr_pricing_sc' );
function tr_pricing_sc( $atts, $content ){
	$layout = $title = $featured = $active = $icon = $image =  $show_button = $button_text = $button_title = $button_target = $button_href = $button_link = $css_class = $data_img = $data_icon = $data_title = $data_desc = $data_button = $duration = $price = $cur = $data_price = '';
	extract( $atts );

	$wrapper_class	= apply_filters( 'kc-el-class', $atts );
	$wrapper_class[] = 'pricing-content';
	$wrapper_class[] = 'text-center';

	if ( !empty( $css_class ) )
		$wrapper_class[] = $css_class;

	if ( !empty( $title ) ) {

		$data_title .= '<span class="pricing-title">';
			$data_title .= $title;
		$data_title .= '</span>';

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

	$data_icon .= '<div class="pricing-icon">';
		$data_icon .= '<i class="'. $icon .'"></i>';
	$data_icon .= '</div>';

	if( !empty( $featured ) && $featured == 'feature' ) :
		$active = 'active';
	endif;

	if ( $show_button == 'yes' ) {
		$button_link	= ( '||' === $button_link ) ? '' : $button_link;
		$button_link	= kc_parse_link($button_link);
		
		if ( strlen( $button_link['url'] ) > 0 ) {
			$button_href 	= $button_link['url'];
			$button_title 	= $button_link['title'];
			$button_target 	= strlen( $button_link['target'] ) > 0 ? $button_link['target'] : '_self';
		}

		$data_button .= '<div class="pricing-button">';
			$data_button .= '<a class="btn btn-primary" href="'. esc_url( $button_href ) .'" target="'. $button_target .'" title="'. $button_title .'">'. $button_text .'</a>';
		$data_button .= '</div>';

	}

	if( !empty( $price ) || !empty($cur) || !empty($duration) ) :
		$data_price .= '<div class="pricing-price">';
			$data_price .= '<h1><sup>'. esc_html( $cur ) .'</sup>'. esc_html( $price ) .'<sub>/ '. esc_html( $duration ) .'</sub></h1>';
		$data_price .= '</div>';
	endif;

	$output = '<div class="' . implode( " ", $wrapper_class ) . '">';
	    $output .='<div class="price '. $active .'">';
		if( $layout == '1' ){	
			$output .= $data_img;
		} elseif( $layout == '2' ){	
			$output .= $data_icon;
		} else {
			$output .= '';
		}			
			$output .= $data_title;
		    $output .='<div class="pricing-list">';
			foreach( $atts['price_list'] as $key => $item ){
			    $output .='<ul class="global-list">';
			    if( !empty( $item->list ) ) :	
	                $output .='<li>'. esc_html( $item->list ) .'</li>';
	            endif;
	            $output .='</ul>';
			}
            $output .='</div>';
			$output .= $data_price;
			$output .= $data_button;
		$output .= '</div>';
	$output .= '</div>';
	return $output;
}
