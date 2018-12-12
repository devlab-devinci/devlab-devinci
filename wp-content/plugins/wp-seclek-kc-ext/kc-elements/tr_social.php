<?php
/*ADDon Name: Social Links*/
global $kc;

$kc->add_map(
    array(
        'tr_social' => array(
		    'name' => __('Social List', 'seclek'),
		    'description' => __('Display social links.', 'seclek'),
		    'icon' => 'et-global',
		    'category' => 'By Seclek',
		    'is_container' => true,
		    'params' => array(
		    	'general' => array(
					array(
						'type'			=> 'text',
						'name'			=> 'custom_class',
						'label'			=> __( 'Class', 'seclek' ),
						'description'	=> __( 'Extra CSS class', 'seclek' )
					),
					array(
						'type'			=> 'group',
						'label'			=> __(' Icons', 'seclek'),
						'name'			=> 'icons',
						'description'	=> __( 'Repeat this fields with each item created, Each item corresponding an icon element.', 'seclek' ),
						'options'		=> array('add_text' => __(' Add new icon', 'seclek')),

						'value' => base64_encode( json_encode(array(
							"1" => array(
								"label" => "Facebook",
								"icon" => "fab-facebook-f",
								"link" => "",
								"color" => "",
								"bg_color" => "",
							),
							"2" => array(
								"label" => "Twitter",
								"icon" => "fab-twitter",
								"link" => "",
								"color" => "",
								"bg_color" => "",
							),
							"3" => array(
								"label" => "Google+",
								"icon" => "fab-google-plus-g",
								"link" => "",
								"color" => "",
								"bg_color" => "",
							),

						) ) ),
						'params' => array(
							array(
								'type' => 'text',
								'label' => __( 'Label', 'seclek' ),
								'name' => 'label',
								'description' => __( 'Enter text used as title of the icon.', 'seclek' ),
								'admin_label' => true,
							),
							array(
								'name' => 'icon',
								'label' => 'Icon',
								'type' => 'icon_picker',
								'description' => __(' Choose an icon to display', 'seclek'),
							),
							array(
								'name'     => 'link',
								'label'    => __(' Icon Link', 'seclek'),
								'type'     => 'link',
								'description' => __(' The URL which icon assigned to. You can select page/post or other post type', 'seclek')
							),
							array(
								'name'     => 'color',
								'label'    => __(' Icon Color', 'seclek'),
								'type'     => 'color_picker',
								'description' => __(' The color for this icon. You can set color for all icon from Styling tab.', 'seclek')
							),
							array(
								'name'     => 'bg_color',
								'label'    => __(' Icon BG Color', 'seclek'),
								'type'     => 'color_picker',
								'description' => __(' The background color for this icon. You can set background color for all icon from Styling tab.', 'seclek')
							),
						),
					),

				),
				'styling' => array(
					array(
						'name'    => 'css_custom',
						'type'    => 'css',
						'options' => array(
							array(
								"screens" => "any,1024,999,767,479",
								'Icon Style' => array(
									array('property' => 'color', 'label' => 'Icon Color', 'selector' => 'i'),
									array('property' => 'background-color', 'label' => 'Icon BG Color', 'selector' => 'a'),
									array('property' => 'font-size', 'label' => 'Icon Size', 'selector' => 'i'),
									array('property' => 'text-align', 'label' => 'Icon Align', 'selector' => 'a'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => 'i'),
									array('property' => 'width', 'label' => 'Width', 'selector' => 'a'),
									array('property' => 'height', 'label' => 'Height', 'selector' => 'a'),
									array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => 'a'),
									array('property' => 'border', 'label' => 'Icon Border', 'selector' => 'a'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => 'a'),
									array('property' => 'padding', 'label' => 'Icon Padding', 'selector' => 'a'),
									array('property' => 'margin-right', 'label' => 'Icon gap', 'selector' => 'a'),
								),
								'Icon Hover' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => 'a:hover i'),
									array('property' => 'background-color', 'label' => 'BG Color', 'selector' => 'a:hover'),
									array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => 'a:hover'),
									array('property' => 'border-color', 'label' => 'Border Color', 'selector' => 'a:hover'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => 'a:hover'),
								),
								'Box' => array(
									array('property' => 'text-align', 'label' => 'Icon Align'),
									array('property' => 'display', 'label' => 'Display'),
									array('property' => 'padding', 'label' => 'Padding'),
									array('property' => 'margin', 'label' => 'Margin'),
								)
							),
						),
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

add_shortcode( 'tr_social', 'tr_social_sc' );
function tr_social_sc( $atts, $content ){
	$output = $custom_class = $icons = '';

extract( $atts );

$css_class 		= apply_filters( 'kc-el-class', $atts );
$css_class[] 	= 'social';

if ( !empty( $custom_class ) )
	$css_class[] = $custom_class;


$output .= '<div class="'. esc_attr( implode( " ", $css_class ) ) .'">';
	$output .= '<ul class="global-list">';
	foreach( $icons as $item ):
		$link_att       = array();
		$icon           = $item->icon;
		$label          = $item->label;
		$link           = $item->link;		
		$color          = isset($item->color) ? $item->color : '';
		$bg_color       = isset($item->bg_color) ? $item->bg_color : '';
		
		if( empty( $icon ) )
			$icon = 'fa-leaf';
		
		$link     = ( '||' === $link ) ? '' : $link;
		$link     = kc_parse_link( $link );
		$link_att = array();
		$icon_att = array();
		
		$link_target    = '_blank';
		$link_url       = '#';
		$link_title     = $label;
		
		if ( strlen( $link['url'] ) > 0 ) {
			$link_target    = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
			$link_url       = esc_attr( $link['url'] );
			$link_title     = esc_attr( $link['title'] );
		}
		
		$link_att[] = 'href="' . esc_attr( $link_url ) . '"';
		$link_att[] = 'target="' . esc_attr( $link_target ) . '"';
		$link_att[] = 'title="' . esc_attr( $link_title ) . '"';
		
		$link_att[] = 'class="seclec-icons-link seclek-icons' . $icon . '"';
		
		$style = '';
		
		
		
		if( !empty( $bg_color ))
			$link_att[] = 'style="background-color:' . $bg_color .';"';
		
		$class_icon = array( $icon );
		
		$icon_att[] = 'class="' . esc_attr( implode( " ", $class_icon ) ) . '"';
		
		if( !empty( $color ))
			$icon_att[] = 'style="color:' . $color .';"';

		$output .= '<li><a '. implode(' ', $link_att) .'>';
			$output .= '<i '. implode(' ', $icon_att).'></i>';
		$output .= '</a></li>';

	endforeach;
	$output .= '</ul>';
$output .= '</div>';
	return $output;
}
