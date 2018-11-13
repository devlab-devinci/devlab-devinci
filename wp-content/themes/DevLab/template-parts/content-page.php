<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Seclek
 */
$page_meta_data = get_post_meta(get_the_ID(), '_page_information', true );
$title = '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	if( !is_array( $page_meta_data ) ){  
		$title = '';
    } elseif( is_array( $page_meta_data )  &&  $page_meta_data['_show_breadcrumb'] == 1 ){
		$title = '';
    } else {               
    	$title = '<header class="entry-header"><h1 class="entry-title">'. get_the_title() .'</h1></header>';
    }

    echo wp_specialchars_decode( esc_html( $title ), ENT_QUOTES );

	?>	

	<?php seclek_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'seclek' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'seclek' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
