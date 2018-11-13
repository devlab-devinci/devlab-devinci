<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Seclek
 */

get_header();
global $wp_query, $seclekOptions;
$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
?>
	<div class="seclek-content-area blog-content blog-two">
		<div class="container">
			<div class="row">				
				<div class="col-md-8 col-lg-9 order-md-8 order-lg-9">
					<?php if ( have_posts() ) : ?>
						<div class="row">									
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
							<?php endwhile; ?>
						</div>
						<?php
							$dataArray = array(
								'current'	   => $current,
								'max_page_num' => $wp_query->max_num_pages,
							);
							echo seclek_pagination( $dataArray );								
						?>
					<?php else : ?>
					<div class="search-content-wrapper blog-content">
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					</div>
					<?php endif; ?>					
				</div>
				<div class="col-md-4 col-lg-3 order-md-4 order-lg-3">
					<?php get_sidebar(); ?>		
				</div>
			</div>
		</div>
	</div>

<?php
get_footer();
