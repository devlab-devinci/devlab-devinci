<?php
/*ADDon Name: Countdown*/
global $kc, $skDate;

$kc->add_map(
    array(
        'tr_countdown' => array(
		    'name' => __('Coundown', 'seclek'),
		    'description' => __('Display countdown', 'seclek'),
		    'icon' => 'et-clock',
		    'category' => 'By Seclek',
		    'is_container' => true,
		    'params' => array(
		    	'general' => array(  		
			        array(
						'type'			=> 'date_picker',
						'label'			=> __( 'Date time', 'seclek' ),
						'name'			=> 'datetime',
						'description'	=> __( 'Target date For Countdown.', 'seclek' ),
						'admin_label'	=> true
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
								'Countdown' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.countdown-list li'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.countdown-list li'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.countdown-list li'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.countdown-list li'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.countdown-list li'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.countdown-list'),
									array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.countdown-list'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.countdown-list'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.countdown-list'),
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

add_shortcode( 'tr_countdown', 'tr_countdown_sc' );
function tr_countdown_sc( $atts, $content ){
	global $skDate;
	$output = $css_class = $datetime = '';
	extract( $atts );

	$wrapper_class	= apply_filters( 'kc-el-class', $atts );

	$wrapper_class[] = 'tr-coundown';
	$wrapper_class[] = $css_class;

	 if( isset( $datetime ) && $datetime != '' ) {
        $datetime = date("d M Y H:i:s", strtotime($datetime));
    } 

	$output .= '<div class="' . implode( " ", $wrapper_class ) . '" >';
		$output .= '<ul class="global-list countdown-list" id="countdown">';
	        $output .= '<li>';                  
	            $output .= '<span class="days">00</span>';
	            $output .= '<p>days</p>';
	        $output .= '</li>';
	        $output .= '<li>';
	            $output .= '<span class="hours">00</span>';
	            $output .= '<p>hours</p>';
	        $output .= '</li>';
	        $output .= '<li>';
	            $output .= '<span class="minutes">00</span>';
	            $output .= '<p>minutes</p>';
	        $output .= '</li>';
	        $output .= '<li>';
	            $output .= '<span class="seconds">00</span>';
	            $output .= '<p>seconds</p>';
	        $output .= '</li>';               
	    $output .= '</ul>';  
    $output .= '</div>';

    $skDate = $datetime;

    add_action( 'wp_footer', 'seclek_countdown_cb', PHP_INT_MAX );

	return $output;
}

function seclek_countdown_cb(){

	global $skDate;

	$script = '';	
    $script .= '<script>';
		$script .= 'jQuery(function ($) {';
	    	$script .= 'jQuery("#countdown").countdown({';
	    		$script .= 'date: "'. $skDate .'",';
	    		$script .= 'format: "on"';
	    	$script .= '});';
	    $script .= '}());';
    $script .= '</script>';

    echo $script;
}