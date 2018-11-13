<?php
/*ADDon Name: Content Box  */
global $kc;

$kc->add_map(
    array(
        'tr_content_box' => array(
		    'name' => __('Content Box', 'seclek'),
		    'description' => __('Display Content with image or icon.', 'seclek'),
		    'icon' => 'et-book-open',
		    'category' => 'By Seclek',
		    'is_container' => true,
		    'params' => array(
		    	'general' => array(
		    		array(
						'type'			=> 'radio_image',
						'label'			=> __( 'Select Template', 'seclek' ),
						'name'			=> 'content_layout',
						'admin_label'	=> true,
						'options'		=> array(
							'1'	=> KC_URL . '/assets/frontend/images/feature_box/layout-1.png',
							'2'	=> KC_URL . '/assets/frontend/images/feature_box/layout-5.png'
						),
						'value'			=> '1'
					),
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
						'relation'	=> array(
							'parent'	=> 'content_layout',
							'show_when'	=> array( '1' )
						)
					),	    		
			        array(
			            'name' => 'title',
			            'label' => __('Title', 'seclek'),
			            'type' => 'text',
			            'description' => __('Enter Title here.', 'seclek'),
			        ),
			        array(
						'type'	=> 'textarea',
						'name'	=> 'desc',
						'label'	=> __( 'Description', 'seclek' ),
						'value'	=> base64_encode('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')
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
		    	'styling'	=> array(
					array(
						'name'		=> 'css_custom',
						'type'		=> 'css',
						'options'	=> array(
							array(
								"screens" => "any,1024,999,767,479",
								'Title' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.service-title'),
									array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+:hover .service-title'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.service-title'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.service-title'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.service-title'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.service-title'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.service-title'),
									array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.service-title'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.service-title'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.service-title'),
								),
								'Desc' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.service-desc'),
									array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+:hover .service-desc'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.service-desc'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.service-desc'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.service-desc'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.service-desc'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.service-desc'),
									array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.service-desc'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.service-desc'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.service-desc'),
								),
								'Icon' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.service-icon i'),
									array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+:hover .service-icon i'),
									array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.service-icon'),
									array('property' => 'background-color', 'label' => 'BG Color Hover', 'selector' => '+:hover .service-icon'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.service-icon i'),
									array('property' => 'height', 'label' => 'Height', 'selector' => '.service-icon'),
									array('property' => 'width', 'label' => 'Width', 'selector' => '.service-icon'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.service-icon'),
									array('property' => 'border', 'label' => 'Border', 'selector' => '.service-icon'),
									array('property' => 'border-color', 'label' => 'Hover Border', 'selector' => '+:hover .service-icon'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.service-icon'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.service-icon'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.service-icon'),
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
									array('property' => 'color', 'label' => 'Text Color', 'selector' => '.service-button a'),
									array('property' => 'color', 'label' => 'Text Hover Color', 'selector' => '.service-button a:hover'),
									array('property' => 'background-color', 'label' => 'BG Color', 'selector' => '.service-button a'),
									array('property' => 'background-color', 'label' => 'BG Hover Color', 'selector' => '.service-button a:hover'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.service-button a'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.service-button a'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.service-button a'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.service-button a'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.service-button a'),
									array('property' => 'border', 'label' => 'Border', 'selector' => '.service-button a'),
									array('property' => 'border-color', 'label' => 'Border Color Hover', 'selector' => '.service-button a:hover'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.service-button a'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.service-button a'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.service-button a')
								),
								'Boxes' => array(
									array('property' => 'background'),
									array('property' => 'background-color', 'label' => 'BG Color Hover', 'selector' => '+:hover'),
									array('property' => 'margin', 'label' => 'Margin'),
									array('property' => 'padding', 'label' => 'Padding'),
								)
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

add_shortcode( 'tr_content_box', 'tr_content_box_sc' );
function tr_content_box_sc( $atts, $content ){
	$content_layout = $layout = $title = $desc = $icon = $image =  $show_button = $button_text = $button_title = $button_target = $button_href = $button_link = $css_class = $data_img = $data_icon = $data_title = $data_desc = $data_button = '';
	extract( $atts );

	$wrapper_class	= apply_filters( 'kc-el-class', $atts );
	$content_layout = ( $content_layout == '1') ? 'service' : 'experience';
	$wrapper_class[] = $content_layout;

	if ( !empty( $css_class ) )
		$wrapper_class[] = $css_class;

	if ( !empty( $title ) ) {

		$data_title .= '<h2 class="service-title">';
			$data_title .= $title;
		$data_title .= '</h2>';

	}

	if ( !empty( $desc ) ) {

		$data_desc .= '<p class="service-desc">';
			$data_desc .= $desc;
		$data_desc .= '</p>';

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

	$data_icon .= '<div class="service-icon">';
		$data_icon .= '<i class="'. $icon .'"></i>';
	$data_icon .= '</div>';

	if ( $show_button == 'yes' ) {
		$button_link	= ( '||' === $button_link ) ? '' : $button_link;
		$button_link	= kc_parse_link($button_link);
		
		if ( strlen( $button_link['url'] ) > 0 ) {
			$button_href 	= $button_link['url'];
			$button_title 	= $button_link['title'];
			$button_target 	= strlen( $button_link['target'] ) > 0 ? $button_link['target'] : '_self';
		}

		$data_button .= '<div class="service-button">';
			$data_button .= '<a href="'. esc_url( $button_href ) .'" target="'. $button_target .'" title="'. $button_title .'">'. $button_text .'</a>';
		$data_button .= '</div>';

	}

	$output = '<div class="' . implode( " ", $wrapper_class ) . '">';
		if( $layout == '1' ){	
			$output .= $data_img;
		} elseif( $layout == '2' ){	
			$output .= $data_icon;
		} else {
			$output .= '';
		}			
			$output .= $data_title;
			$output .= $data_desc;
			$output .= $data_button;
	$output .= '</div>';
	return $output;
}