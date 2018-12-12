<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Seclek
 */

global $seclekOptions;
$sidebar_position = $sidebar_align = '';
$sideBar = 'enable';
$page_meta_data = get_post_meta(get_the_ID(), '_page_information', true );

if( !is_array( $page_meta_data )  ){       
    if ( isset( $seclekOptions['cr_blog_details_sidebar'] ) && !empty( $seclekOptions['cr_blog_details_sidebar'] ) ) :
        $sideBar = $seclekOptions['cr_blog_details_sidebar'];  
    endif;
} elseif( is_array($page_meta_data) &&  $page_meta_data['page_sidebar'] == 0 ){                     
    $sideBar = "disable";
} else {                
    $sideBar = "enable";           
} 

if( isset( $page_meta_data['siderbar_position'] ) && $page_meta_data['siderbar_position'] != '' ) :
	$sidebar_align = $page_meta_data['siderbar_position'];
else : 
	$sidebar_align = 'left';
endif;
$row_sidebar_position = ( $sidebar_align == 'left' ) ? 'order-md-8 order-lg-9' : ''; 
$sidebar_position = ( $sidebar_align == 'left' ) ? 'order-md-4 order-lg-3' : 'sidebar-right'; 
$rowClasses = ( $sideBar == 'enable' && !is_active_sidebar( 'default-sidebar' ) != 1 ) ? 'col-md-8 '. $row_sidebar_position  : 'col-md-12';

get_header(); ?>

	<div class="seclek-content-area blog-content blog-details">
		<div class="container">
			<div class="row">
				<div class="<?php echo esc_attr( $rowClasses ); ?>">		
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
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
						<?php if ( comments_open() || get_comments_number() ) : ?>
							<?php comments_template(); ?>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>					
				<?php if ( $sideBar == true || !is_active_sidebar( 'default-sidebar' ) ) : ?>
				<div id="sidebar" class="col-md-4 col-lg-3 <?php echo esc_attr( $sidebar_position ) ?>">
					<?php get_sidebar(); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php
get_footer();
