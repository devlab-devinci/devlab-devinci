<?php

if( has_post_thumbnail() ){
	$contentClass = 'entry-content';
} else {
	$contentClass = 'entry-content no-thumb';	
}

?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class('tr-post tr-post-grid'); ?>>
		<?php if( has_post_thumbnail() ) : ?>
			<div class="entry-header">
					<div class="entry-thumbnail">
						<?php if( is_sticky() ) : ?>
							<div class="tr-sticky-post">
							    <i class="fa fa-sticky-note-o"></i> <?php _e( 'Sticky', 'seclek' ); ?>
							</div>
						<?php endif; ?>
			        	<?php echo seclek_image_buffer( 'seclek_blog_thumb' ); ?>
					</div>
			</div><!-- /.entry-header -->
    	<?php endif; ?>			

		<div class="<?php echo esc_attr( $contentClass ); ?>">
			<?php seclek_post_grid_date(); ?>
			<?php
			if ( is_single() ) :
				the_title( '<h2 class="entry-title">', '</h2>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			<?php
			if ( is_single() ) :
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'seclek' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'seclek' ),
					'after'  => '</div>',
				) );
			else :
				echo seclek_get_excerpt(120);
			endif;
			?>			
		</div><!-- /.entry-content -->
	</div><!-- #post-## -->
