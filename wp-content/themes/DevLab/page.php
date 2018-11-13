<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Seclek
 */
$sidebar_position = $sidebar_align = '';
$page_meta_data = get_post_meta(get_the_ID(), '_page_information', true );
if( isset( $page_meta_data['page_sidebar'] ) && null !== $page_meta_data['page_sidebar'] ):
	$enable_sidebar =  $page_meta_data['page_sidebar'];
else :
	$enable_sidebar = true;
endif;

if( isset( $page_meta_data['siderbar_position'] ) && $page_meta_data['siderbar_position'] != '' ) :
	$sidebar_align = $page_meta_data['siderbar_position'];
else :
	$sidebar_align = 'left';
endif;

$row_sidebar_position = ( $sidebar_align == 'left' ) ? 'order-md-8' : ''; 
$sidebar_position = ( $sidebar_align == 'left' ) ? 'order-md-4' : 'sidebar-right'; 
$col_class = ( $enable_sidebar == true && !is_active_sidebar( 'default-sidebar' ) != 1 ) ? 'col-md-8 '. $row_sidebar_position : 'col-md-12';
get_header();
?>

	<div id="main" class="clearfix padding">
		<div class="container">
			<div class="row">
				<div class="<?php echo esc_attr( $col_class ); ?>">
					<div id="content" class="site-content">

						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
					</div>
				</div>
				<?php if ( $enable_sidebar == true || !is_active_sidebar( 'default-sidebar' ) ) : ?>
				<div id="sidebar" class="col-md-4 <?php echo esc_attr( $sidebar_position ) ?>">
					<?php get_sidebar(); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div><!-- #main -->

<?php
get_footer();
