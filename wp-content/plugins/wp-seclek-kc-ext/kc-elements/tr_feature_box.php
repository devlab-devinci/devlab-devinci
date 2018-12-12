<?php
/*ADDon Name: Service Box  */
global $kc;

$kc->add_map(
    array(
        'tr_feature_box' => array(
		    'name' => __('Service Box', 'seclek'),
		    'description' => __('Display single icon', 'seclek'),
		    'icon' => 'et-briefcase',
		    'category' => 'By Seclek',
		    'is_container' => true,
		    'params' => array(
		    	'general' => array(		    		
			        array(
			            'name' => 'fb_title',
			            'label' => __('Title', 'seclek'),
			            'type' => 'text',
			            'description' => __('Enter Title here.', 'seclek'),
			        ), 
			        array(
			            'name' => 'content',
			            'label' => __('Content', 'seclek'),
			            'type' => 'textarea_html',
			            'description' => __('Enter Content here.', 'seclek'),
			        ),
			        array(
			            'name' => 'css_class',
			            'label' => __('Extra Class', 'seclek'),
			            'type' => 'text',
			        ),
		    	),
		    	'styling' => array(
					array(
						'name'    => 'css_custom',
						'type'    => 'css',
						'options' => array(
							array(
								"screens" => "any,1024,999,767,479",
								'Title' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.feature-title'),
									array('property' => 'background-color', 'label' => 'Title Border Color', 'selector' => '.feature-title span'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.feature-title'),
									array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.feature-title'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.feature-title'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.feature-title'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.feature-title'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.feature-title'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.feature-title'),
								),
								'Content' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.feature-contents'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.feature-contents'),
									array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.feature-contents'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.feature-contents'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.feature-contents'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.feature-contents'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.feature-contents'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.feature-contents'),
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

add_shortcode( 'tr_feature_box', 'tr_feature_box_sc' );
function tr_feature_box_sc( $atts, $content ){
	$fb_title = $content = $css_class = '';
	extract( $atts );
	
	if( isset( $fb_title ) && $fb_title != '' ) :
		$title = $fb_title;
	else :
		$title = '';
	endif;

	$wrapper_class	= apply_filters( 'kc-el-class', $atts );
	$wrapper_class[] = $css_class;

	$output = '<div class="' . implode( " ", $wrapper_class ) . '">';
		$output .= '<div class="feature">';
			$output .= '<span class="feature-title"><span></span>'. esc_html( $title ) .'</span>';
			$output .= '<div class="feature-contents">'. $content .'</div>';
		$output .= '</div>';
	$output .= '</div>';
	?>
	<?php
	return $output;
}
