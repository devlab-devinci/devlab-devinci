<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Seclek
 */

global $wp_query, $seclekOptions;
$sideBar = ( !isset( $seclekOptions['cr_blog_sidebar'] ) || ( isset( $seclekOptions['cr_blog_sidebar'] ) && $seclekOptions['cr_blog_sidebar'] == 'enable' ) ) ? 'enable' : 'disable';

if ( isset($seclekOptions['tr_blog_layout']) && $seclekOptions['tr_blog_layout'] == 'grid' ) $blog_style = 'blog-content';
else $blog_style = 'blog-content blog-two';

if ( $seclekOptions['grid_column'] == '4' ) $grid_col = 'col-lg-3';
elseif ( $seclekOptions['grid_column'] == '3' ) $grid_col = 'col-lg-4';
else $grid_col = 'col-lg-6';

$rowClasses = ( $sideBar == 'enable' && !is_active_sidebar( 'default-sidebar' ) != 1 ) ? 'col-md-8 col-lg-9 order-md-8 order-lg-9' : 'col-md-12';
$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

get_header(); ?>
<div class="<?php echo esc_attr( $blog_style ); ?>">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr( $rowClasses ); ?>">
				<?php if ( $seclekOptions['tr_blog_layout'] == 'grid' ) : ?>
					<div class="row">
				<?php endif; ?>	
					<?php if ( have_posts() ) : ?>
						<?php if ( is_home() && ! is_front_page() ) : ?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
						<?php endif; ?>

						<?php while ( have_posts() ) : the_post(); ?>
							<?php if ( $seclekOptions['tr_blog_layout'] == 'grid' ) : ?>
								<div class="<?php echo esc_attr( $grid_col ); ?>">
									<?php get_template_part( 'template-parts/content', 'grid' ); ?>
								</div>
							<?php else : ?>
								<?php get_template_part( 'template-parts/content', 'list' ); ?>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php 
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif; ?>
				<?php if ( $seclekOptions['tr_blog_layout'] == 'grid' ) : ?>
					</div>
				<?php endif; ?>	
				<?php
					$dataArray = array(
						'current'	   => $current,
						'max_page_num' => $wp_query->max_num_pages,
					);
					echo seclek_pagination( $dataArray );								
				?>
			</div>
			<?php if ( $sideBar == 'enable' || !is_active_sidebar( 'default-sidebar' ) ) : ?>				
				<div class="col-md-4 col-lg-3 order-md-4 order-lg-3">
					<?php get_sidebar(); ?>		
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php
get_footer();
