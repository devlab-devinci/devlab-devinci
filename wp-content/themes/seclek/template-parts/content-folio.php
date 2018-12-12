<?php
/**
 * Template part for displaying portfolio
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
$post_meta_data = get_post_meta(get_the_ID(), '_folio_information', true );
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
			        	<?php echo seclek_image_buffer( 'full' ); ?>
					</div>
			</div><!-- /.entry-header -->
    	<?php endif; ?>			

		<div class="<?php echo esc_attr( $contentClass ); ?>">
			<?php
			if ( is_single() ) :
				if( NULL ==  $post_meta_data['_show_breadcrumb'] && isset( $seclekOptions['cr_folio_breadcrumb'] ) && !empty( $seclekOptions['cr_folio_breadcrumb'] ) ){ 
					if( isset( $seclekOptions['cr_folio_bc_title'] ) && !empty( $seclekOptions['cr_folio_bc_title'] ) ) {
                    	$title = '<h2 class="entry-title">'. get_the_title() .'</h2>';
					} else {
						$title = '';
					}
	            } elseif( isset( $post_meta_data['_show_breadcrumb'] ) &&  $post_meta_data['_show_breadcrumb'] == 1 ){
	                if( $seclekOptions['cr_folio_breadcrumb'] == 'enable' && isset( $seclekOptions['cr_folio_bc_title'] ) && !empty( $seclekOptions['cr_folio_bc_title'] ) ) {
                    	$title = '<h2 class="entry-title">'. get_the_title() .'</h2>';
					} else {
						$title = '';
					}
	            } else {               
	                $title = '<h2 class="entry-title">'. get_the_title() .'</h2>';          
	            }
	            echo wp_specialchars_decode( esc_html( $title ), ENT_QUOTES );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			<?php seclek_folio_entry_meta(); ?>
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'seclek' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'seclek' ),
					'after'  => '</div>',
				) );
			?>				
		</div><!-- /.entry-content -->
	</div><!-- #post-## -->