<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Seclek
 */

if( has_post_thumbnail() ){
	$contentClass = 'entry-content';
} else {
	$contentClass = 'entry-content no-thumb';	
}
global $seclekOptions;
$post_meta_data = get_post_meta(get_the_ID(), '_page_information', true );
$title = '';
?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('tr-post'); ?>>
		<?php if( has_post_thumbnail() ) : ?>
			<div class="entry-header">
					<div class="entry-thumbnail">
						<?php if( is_sticky() ) : ?>
							<div class="tr-sticky-post">
							    <i class="fa fa-sticky-note-o"></i> <?php _e( 'Sticky', 'seclek' ); ?>
							</div>
						<?php endif; ?>
					<?php if ( is_single() ) : ?>
			        	<?php echo seclek_image_buffer( 'full' ); ?>
			        <?php else : ?>
			        	<?php echo seclek_image_buffer( 'seclek_blog_thumb' ); ?>
					<?php endif; ?>
					</div>
			</div><!-- /.entry-header -->
    	<?php endif; ?>			

		<div class="<?php echo esc_attr( $contentClass ); ?>">
			<?php
			if ( is_single() ) :
				if( !is_array( $post_meta_data )  && isset( $seclekOptions['cr_blog_details_breadcrumb'] ) && $seclekOptions['cr_blog_details_breadcrumb'] == 'enable' ){  
					if( isset( $seclekOptions['cr_single_blog_bc_title'] ) && !empty( $seclekOptions['cr_single_blog_bc_title'] ) ) {
                    	$title = '<h2 class="entry-title">'. get_the_title() .'</h2>';
					} else {
						$title = '';
					}
	            } elseif( is_array( $post_meta_data )  &&  $post_meta_data['_show_breadcrumb'] == 1 ){
	                if( $seclekOptions['cr_blog_details_breadcrumb'] == 'enable' && isset( $seclekOptions['cr_single_blog_bc_title'] ) && !empty( $seclekOptions['cr_single_blog_bc_title'] ) ) {
                    	$title = '<h2 class="entry-title">'. get_the_title() .'</h2>';
					} else {
						$title = '';
					}
	            } elseif( ( isset( $seclekOptions['cr_blog_details_breadcrumb'] ) && $seclekOptions['cr_blog_details_breadcrumb'] == 'disable' ) ||  ( is_array($post_meta_data) && $post_meta_data['_show_breadcrumb'] == 0 ) ){
                	$title = '<h2 class="entry-title">'. get_the_title() .'</h2>';
	            } else {               
	                $title = '';          
	            }

	            echo wp_specialchars_decode( esc_html( $title ), ENT_QUOTES );        
					
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
			<?php if( is_single() ) : ?>
				<div class="entry-meta">
					<?php seclek_blog_entry_meta(); ?>	
				</div>
				<div class="entry-footer-meta">
					<?php seclek_single_footer_meta(); ?>
				</div>
			<?php else : ?>
			<?php seclek_post_entry_meta(); ?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
		<?php endif; ?>
		</div><!-- /.entry-content -->
	</div><!-- #post-## -->