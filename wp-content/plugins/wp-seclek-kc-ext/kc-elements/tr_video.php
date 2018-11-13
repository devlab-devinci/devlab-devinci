<?php
/*ADDon Name: Video Player*/
global $kc;

$kc->add_map(
    array(
        'tr_video' => array(
		    'name' => __('Video Player', 'seclek'),
		    'description' => __('Display video content', 'seclek'),
		    'icon' => 'et-video',
		    'category' => 'By Seclek',
		    'is_container' => true,
		    'params' => array(
		    	'general' => array(  		
			        array(
			            'name' => 'video_link',
			            'label' => __('Video Link', 'seclek'),
			            'type' => 'text',
			            'description' => __('Enter Video link here. Ex: https://www.youtube.com/watch?v=O687sp1-FnE', 'seclek'),
			        ),
					array(
						'name'		=> 'image',
						'label'		=> __( 'Upload Preview Video Image', 'seclek' ),
						'type'		=> 'attach_image',
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

add_shortcode( 'tr_video', 'tr_video_sc' );
function tr_video_sc( $atts, $content ){
	$image = $css_class = $video_link = '';
	extract( $atts );

	$wrapper_class	= apply_filters( 'kc-el-class', $atts );

	$wrapper_class[] = 'tr-video';

	if ( !empty( $css_class ) )
		$wrapper_class[] = $css_class;

	if ( !empty( $video_link ) ) {
			$video_link = $video_link;
	}

	if ( !empty( $image ) ) {
		$img_link = wp_get_attachment_image_src( $image, 'full' );
	}

	$output = '<div class="' . implode( " ", $wrapper_class ) . '" style="background-image: url('. esc_url( $img_link[0] ) .');">';
		 $output .= '<div class="video-content">';
            $output .= '<a class="video-link" href="'. esc_url( $video_link ) .'"><span><i class="fa fa-play" aria-hidden="true"></i></span></a>';
        $output .='</div><!-- /.video-content -->';	
	$output .= '</div>';
	?>
	<?php
	return $output;
}
