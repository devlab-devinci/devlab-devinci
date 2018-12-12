<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Seclek
 */

global $seclekOptions;
$page_meta_data = get_post_meta(get_the_ID(), '_folio_information', true );
if( !isset( $page_meta_data['page_sidebar'] ) && NULL ==  $page_meta_data['page_sidebar'] ){       
    if ( isset( $seclekOptions['cr_folio_sidebar'] ) && !empty( $seclekOptions['cr_folio_sidebar'] ) ) :
        $sideBar = $seclekOptions['cr_folio_sidebar'];                
    endif;
} elseif( isset( $page_meta_data['page_sidebar'] ) &&  $page_meta_data['page_sidebar'] == 1 ){                     
    $sideBar = "enable";
} else {                
    $sideBar = "disable";           
} 
$rowClasses = ( $sideBar == 'enable' ) ? 'col-md-8 col-lg-9 order-md-8 order-lg-9' : 'col-md-12';

get_header(); ?>

	<div class="seclek-content-area blog-content blog-details portfolio-details">
		<div class="container">
			<div class="row">
				<div class="<?php echo esc_attr( $rowClasses ); ?>">		
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', 'folio' ); ?>
						<?php if ( ( get_previous_posts_link() != '0' && !empty( get_previous_posts_link() ) ) || ( get_next_posts_link() != '0' && !empty( get_next_posts_link() ) ) ) : ?>
							<div class="prev-next tr-section">
								<div class="pull-left">
									<?php previous_post_link( '%link', '<i class="fa fa-long-arrow-left"></i> ' . esc_html__( 'Previous Post', 'seclek' ) ); ?>
								</div>
								<div class="pull-right">
									<?php next_post_link( '%link', esc_html__( 'Next Post', 'seclek' ) . ' <i class="fa fa-long-arrow-right"></i>' ); ?>
								</div>
							</div>
							<?php endif; ?>
					<?php endwhile; ?>
				</div>					
				<?php if ( $sideBar == 'enable' ) : ?>				
				<div class="col-md-4 col-lg-3 order-md-4 order-lg-3">
					<?php if ( is_active_sidebar( 'sidebar-folio' ) ) { 
						dynamic_sidebar( 'sidebar-folio' );
					}
					?>		
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php
get_footer();
