<?php
/*ADDon Name:Testimonnial*/
global $kc;

$kc->add_map(
    array(
        'tr_contact_info' => array(
		    'name' => __('Contact Info', 'seclek'),
		    'description' => __('Display contact information.', 'seclek'),
		    'icon' => 'et-map',
		    'category' => 'By Seclek',
		    'is_container' => true,
		    'params' => array(
		    	'phone' => array( 
		    		array(
						'name'			=> 'phone_icon',
						'label'			=> __( 'Select Icon', 'seclek' ),
						'type'			=> 'icon_picker',
						'description'	=> __( 'Select icon display in box', 'seclek' ),
					), 		
			        array(
						'type'			=> 'group',
						'label'			=> __('Phone Numbers', 'seclek'),
						'name'			=> 'phone_numbers',
						'description'	=> __( 'Repeat this fields with each item created, Each item corresponding processbar element.', 'seclek' ),
						'options'		=> array('add_text' => __('Add new phone numbers', 'seclek')),
						'value' => base64_encode( json_encode(array(
							"1" => array(
								"phone" => "+30 864 7554 327",
							),
						) ) ),
						'params' => array(
							array(
								'type' => 'text',
								'label' => __( 'Phone Number', 'seclek' ),
								'name' => 'phone',
							),
						),
					),
		    	),
		    	'email' => array(
		    		array(
						'name'			=> 'email_icon',
						'label'			=> __( 'Select Icon', 'seclek' ),
						'type'			=> 'icon_picker',
						'description'	=> __( 'Select icon display in box', 'seclek' ),
					),  		
			        array(
						'type'			=> 'group',
						'label'			=> __('Emails', 'seclek'),
						'name'			=> 'email_list',
						'description'	=> __( 'Repeat this fields with each item created, Each item corresponding processbar element.', 'seclek' ),
						'options'		=> array('add_text' => __('Add new emails', 'seclek')),
						'value' => base64_encode( json_encode(array(
							"1" => array(
								"email" => "denis@getcraftwork.com",
							),
						) ) ),
						'params' => array(
							array(
								'type' => 'text',
								'label' => __( 'Email', 'seclek' ),
								'name' => 'email',
							),
						),
					),
		    	),
		    	'address' => array( 
		    		array(
						'name'			=> 'add_icon',
						'label'			=> __( 'Select Icon', 'seclek' ),
						'type'			=> 'icon_picker',
						'description'	=> __( 'Select icon display in box', 'seclek' ),
					), 		
			        array(
						'type'			=> 'group',
						'label'			=> __('Address', 'seclek'),
						'name'			=> 'address_list',
						'description'	=> __( 'Repeat this fields with each item created, Each item corresponding processbar element.', 'seclek' ),
						'options'		=> array('add_text' => __('Add new addresses', 'seclek')),
						'value' => base64_encode( json_encode(array(
							"1" => array(
								"address" => "124 North Street, <br> New York, NY 36264",
							),
						) ) ),
						'params' => array(
							array(
								'type' => 'textarea',
								'label' => __( 'Address', 'seclek' ),
								'name' => 'address',
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
								'Phone' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.phones'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.phones'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.phones'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.phones'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.phones'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.phones'),
									array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.phones'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.phones'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.phones'),
								),
								'Email' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.emails'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.emails'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.emails'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.emails'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.emails'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.emails'),
									array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.emails'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.emails'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.emails'),
								),
								'Address' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.address'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.address'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.address'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.address'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.address'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.address'),
									array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.address'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.address'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.address'),
								),
								'Icon' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.icon i'),
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

add_shortcode( 'tr_contact_info', 'tr_contact_info_sc' );
function tr_contact_info_sc( $atts, $content ){
	$pdata_icon = $edata_icon = $adata_icon = '';
	extract( $atts );

	$wrapper_class	= apply_filters( 'kc-el-class', $atts );

	$wrapper_class[] = 'contact-info';

	if( empty($phone_icon) || $phone_icon == '__empty__')
		$phone_icon = 'fa fa-phone';

	if( empty($email_icon) || $email_icon == '__empty__')
		$email_icon = 'fa fa-envelope';

	if( empty($add_icon) || $add_icon == '__empty__')
		$add_icon = 'fa fa-map-marker';

	$pdata_icon .= '<i class="'. $phone_icon .'" ></i>';
	$edata_icon .= '<i class="'. $email_icon .'"></i>';
	$adata_icon .= '<i class="'. $add_icon .'"></i>';

	$output = '<div class="' . implode( " ", $wrapper_class ) . '">';
		$output .= '<div class="row">';	
			$output .='<div class="col-sm-4">';
				$output .='<div class="icon">'. $pdata_icon .'</div>';
	           	foreach( $atts['phone_numbers'] as $key => $item ){
				    $output .='<span class="phones">';
				    if( !empty( $item->phone ) ) :	
		                $output .= esc_html( $item->phone );
		            endif;
		            $output .='</span>';
				}
			$output .= '</div>';
			$output .='<div class="col-sm-4">';
				$output .='<div class="icon">'. $edata_icon .'</div>';
	           	foreach( $atts['email_list'] as $key => $item ){
				    $output .='<span class="emails">';
				    if( !empty( $item->email ) ) :	
		                $output .= esc_html( $item->email );
		            endif;
		            $output .='</span>';
				}
			$output .= '</div>';
			$output .='<div class="col-sm-4">';
				$output .='<div class="icon">'. $adata_icon .'</div>';
	           	foreach( $atts['address_list'] as $key => $item ){
				    $output .='<span class="address">';
				    if( !empty( $item->address ) ) :	
		                $output .= $item->address;
		            endif;
		            $output .='</span>';
				}
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</div>';

	return $output;
}
