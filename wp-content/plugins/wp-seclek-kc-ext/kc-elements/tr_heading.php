<?php
/*ADDon Name: Heading  */
global $kc;

$kc->add_map(
    array(
        'tr_heading' => array(
		    'name' => __('Heading', 'seclek'),
		    'description' => __('Display single icon', 'seclek'),
		    'icon' => 'et-pencil',
		    'category' => 'By Seclek',
		    'is_container' => true,
		    'params' => array(
		    	'general' => array(		    		
			        array(
			            'name' => 'title',
			            'label' => __('Title', 'seclek'),
			            'type' => 'text',
			            'description' => __('Enter Title here.', 'seclek'),
			        ),
			        array(
						'name'	  => 'type',
						'label'   => __(' Type'),
						'type'	  => 'select',
						'admin_label' => true,
						'options' => array(
							'h1'  => 'H1',
							'h2'  => 'H2',
							'h3'  => 'H3',
							'h4'  => 'H4',
							'h5'  => 'H5',
							'h6'  => 'H6',
							'div'  => 'div',
							'span'  => 'Span',
							'p'  => 'P'
						)
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
									array('property' => 'color', 'label' => 'Color', 'selector' => '.tr-heading'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.tr-heading'),
									array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.tr-heading'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.tr-heading'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.tr-heading'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.tr-heading'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.tr-heading'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.tr-heading'),
								),
								'Content' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.heading-content'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.heading-content'),
									array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.heading-content'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.heading-content'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.heading-content'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.heading-content'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.heading-content'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.heading-content'),
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

add_shortcode( 'tr_heading', 'tr_heading_sc' );
function tr_heading_sc( $atts, $content ){
	$title = $content = $type = $class_title = $css_class = '';
	extract( $atts );

	$wrapper_class	= apply_filters( 'kc-el-class', $atts );
	if( !empty( $css_class ) ){
		$wrapper_class[] = $css_class;
	}
	
	if( isset( $title ) && $title != '' ) :
		$title = $title;
	else :
		$title = '';
	endif;

	if( empty( $type ) )
		$type = 'h1';

	if ( !empty( $class ) )
		$class_title = $class;


	$output = '<div class="section-title ' . implode( " ", $wrapper_class ) . '">';
			$output .= '<'. $type .' class="tr-heading '. $class_title .'">'. esc_html( $title ) .'</'. $type .'>';
			$output .= '<div class="heading-content">'. $content .'</div>';
	$output .= '</div>';
	?>
	<?php
	return $output;
}
